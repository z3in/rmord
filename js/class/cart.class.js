class Cart {

    createRow(container,data = {}){

               container.innerHTML +=       `<div class="item">
                                                <div>
                                                    <input type="checkbox" name="checkbox" id="checkbox_add">
                                                </div>
                                        
                                                <div class="image">
                                                    <img src="${data.photo}" alt="${data.ProductName}" style="width:auto;height:80px" />
                                                </div>
                                        
                                                <div class="description">
                                                    <span>${data.ProductName}</span>
                                                </div>

                                                <div class="price">
                                                    <span>&#8369 ${parseFloat(data.SRP).toFixed(2)}</span>
                                                </div>
                                        
                                                <div class="quantity">
                                                    <button class="plus-btn" type="button" name="button">
                                                    <img src="plus.svg" alt="" />
                                                    </button>
                                                    <input type="text" name="name" value="1">
                                                    <button class="minus-btn" type="button" name="button">
                                                    <img src="minus.svg" alt="" />
                                                    </button>
                                                </div>
                                                <div class="price"><span>&#8369 99.00 </span></div>
                                            </div>
                                        `

    }
}