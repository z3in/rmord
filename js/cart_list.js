$(document).ready(()=>{
    fetch(`app/client/cart.php?request=list&user_id=${getCookie('user_id')}`)
    .then(data => data.json())
    .then(data =>{
        let container = document.querySelector('#cart_container')
        const menu = new Cart()
        data.list.map(item =>{
            menu.createRow(container,item);
        })
    })
})
