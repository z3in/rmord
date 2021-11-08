
var map,marker,quantity;
const getList = () =>{
    fetch(`app/client/cart.php?request=list&user_id=${getCookie('user_id')}`)
        .then(data => data.json())
        .then(data =>{
            let container = document.querySelector('#cart_container')
            let total_price = document.querySelector('#total_order_price')
            container.innerHTML = ""
            
            const menu = new Cart()
            if(!data.hasOwnProperty("list")) {
                return window.location.href = "menu.php"
            }
            quantity = data.list.length
            data.list.map(item =>{
                menu.createCheckout(container,item);
                
            })
            let price_list = data.list.map(item => parseFloat(item.SRP * item.quantity)).reduce((prev, next) => prev + next);
            total_price.innerHTML = price_list.toFixed(2)
            
        })
}

function initMap() {
    navigator.geolocation.getCurrentPosition(function(position) {
        let coords = { lat: position.coords.latitude, lng: position.coords.longitude }
        map = new google.maps.Map(document.getElementById("map"), {
            center: coords,
            zoom: 12,
        });
        marker = new google.maps.Marker({
            position: coords,
            map,
            draggable:true,
            title: "Delivery Address!",
        });
    })
}
const setMap = (coords) =>{
    $("#ifrMaps").attr("src",`"https://maps.google.com/maps/embed/v1/place?key=AIzaSyDKEGwhMZ_UXrD0mlU3RCkCrE03CgVtAFA&q=${coords.lat},${coords.long}`)
}
$(document).ready(()=>{
    getList()
    

    $('#btnLocation').click(()=>{
        initMap()
    })

    if(!getCookie("username")){
        return window.location.href = "loginpage.php"
    }
        
        let searchParams = new URLSearchParams(window.location.search)
        if(searchParams.has('payment')){
            if(searchParams.get('payment') === "success"){
                var source = getCookie("source")
                if(source){
                    checkSource(source)
                }
            }
            if(searchParams.get('payment') === "failed"){
                return alert('Payment has not been authorized! Please Try again or use a different payment')
            }
        }
    })
    
       function checkSource(src){
            getSource(src).then((data)=>{
                if(data.data.attributes.status === "pending"){
                    checkSource(src)
                }
                if(data.data.attributes.status === "chargeable"){
                    chargePayment(src)
                    .then(data =>{
                        data = {
                            payment_ref : data.data.id,
                            status : data.data.attributes.status,
                            coord_lat : marker.position.lat(),
                            coord_long : marker.position.lng(),
                            total_amount : parseFloat($("#total_order_price").text()),
                            quantity : quantity,
                            user_id : getCookie('user_id')
                        }
                        var option = createRequestOption("POST",data)
                        requestURL(`app/client/transactions.php?request=place_order`,option)
                        .then(data => {
                            if(data.response){
                                alert (data.message)
                                return window.location.href="addtocart.php"
                            }
                        })
                    })
                }
            })
       }

        async function chargePayment(id){
            let headers = createHeaders("sk_test_nY9ijCLWys58NrMk5KgP5TkF");
            raw = {
                data : {
                    attributes : {
                        amount : 15000,
                        source : {
                            id : id,
                            type : "source"
                        },
                        currency : "PHP"
                    }
                }
            }
            let data = createRequestOption("POST",raw,headers);
            const pm = await requestURL("https://api.paymongo.com/v1/payments",data);
            return await pm;
        }
        async function getSource(id){
            
            let headers = createHeaders("sk_test_nY9ijCLWys58NrMk5KgP5TkF");
            let data = createRequestOption("GET",null,headers);
            const pm = await requestURL("https://api.paymongo.com/v1/sources/" + id,data);
            return await pm;
        }

        /*helpers*/
        async function requestURL(url,requestOptions){
            const action = await fetch(url,requestOptions)
            .then(response=> response.json())
            .then(data => data);
            return action;
        }

        function createHeaders(key){
            var myHeaders = new Headers();
            myHeaders.append("Authorization", `Basic ${btoa(key)}`);
            myHeaders.append("Content-Type", "application/json");
            return myHeaders;
        }

        function createRequestOption(method,data = null,header = null){
            var requestOptions = {
                method: method
            }
            if(data !== null)
            requestOptions = {
                method: method,
                redirect: "follow",
                body : JSON.stringify(data)
            };

            requestOptions['headers'] = header !== null ? header : null;
            
            let requestOpt = removeEmpty(requestOptions);

            return requestOpt;
        }

        function removeEmpty(obj) {
            return Object.fromEntries(Object.entries(obj).filter(([_, v]) => v != null));
        }

        let key = "sk_test_nY9ijCLWys58NrMk5KgP5TkF"
        let headers = createHeaders(key);

    document.querySelector("#btnPayment").addEventListener("click",async function(event){
        
        let raw =  {
            "data": {
                "attributes" : {
                    type: "gcash",
                    amount : 15000,
                    currency : "PHP",
                    redirect : {
                        success : "http://localhost/rmord/checkout.php?payment=success",
                        failed : "http://localhost/rmord/checkout.php?payment=failed"
                    }
                }
                
            }
           };
       
        let data = createRequestOption("POST",raw,headers);
        const pm = await requestURL("https://api.paymongo.com/v1/sources",data);
        //window.open(pm.data.attributes.redirect.checkout_url,'sample-inline-frame');  display authentication link for user to enter password
        // document.querySelector('#three-ds-container').setAttribute("style","display:block"); 
        document.cookie = `source=${new URL(pm.data.attributes.redirect.checkout_url).searchParams.get('id')}; expires=Fri, 31 Dec 9999 23:59:59 GMT`
        window.location.href = pm.data.attributes.redirect.checkout_url;
        
    })