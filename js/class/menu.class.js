class Menu {

    createRow(container,data = {}){

               container.innerHTML +=       `<div class="col-md-3 col-sm-6 col-xs-12 cat-2 featured-items isotope-item">
                                                <div class="product-item">
                                                    <img src="${data.photo}" class="img-responsive" width="255" height="322" alt="">
                                                    <div class="sell-meta">
                                                        <a href="#" class="new-item" onclick="addOrder('${data.ID}'')">Add to Order</a>
                                                    </div>
                                                    <div class="product-hover">
                                                        <div class="product-meta">
                                                            <br>
                                                            <a href="#" onclick="addOrder('${data.ID}')"><i class="pe-7s-cart"></i>Add to Cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="product-title">
                                                        
                                                            <h3>${data.ProductName}</h3>
                                                            <span>${parseFloat(data.ProductPrice).toFixed(2)}</span>
                                                 
                                                    </div>
                                                </div>
                                            </div>`

    }
}