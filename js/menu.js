
const addOrder = (id) =>{
    if(!getCookie('fullname') || !getCookie('username')){
        window.location.href="loginpage.php"
    }
    fetch(`app/client/cart.php?request=add&product_id=${id}&user_id=${getCookie('user_id')}`)
    .then(data=>data.json())
    .then(data=>{
        if(data.response){
            alert("Product added to cart!")
            return  window.location.href="addcart.php"
        }
        return alert(data.message);
    })
    
}

$(document).ready(()=>{
    fetch('app/client/menu.php')
    .then(data => data.json())
    .then(data =>{
        let container = document.querySelector('#menu_container')
        const menu = new Menu()
        data.list.map(item =>{
            menu.createRow(container,item);
        })
    })
})
