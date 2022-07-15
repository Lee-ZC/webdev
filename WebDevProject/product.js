fetch('server_product.php').then((data)=>{
    return data.json();
}).then((completedata)=>{
    let data1="";
    completedata.map((values)=>{
        
        data1 += `              
                <div class="container2" >
                        <section class="products">
                           <div class="box-container" >
                              <form action="" method="post">
                                <div class="box" style= "background-color: #fefbd8;">
                                <img class="images" src="Admin/uploaded_img/${values.image}" style=" width: 290px; height: 290px;">
                                <h3 class="heading">${values.name}</h3>
                                <div class="price">$${values.price}/-</div>
                                <a href="product.php?id= ${values.id}" type="button" input type="submit" class="btn bg-cart" style= "background: yellow;"  name="add_to_cart"><i class="fa fa-eye mr-2"></i> View Details</a>
                                </div>
                              </form>
                           </div>
                        </section>
                    </div>
                    `;
    });
    document.getElementById("zc").innerHTML=data1;
    
}).catch ((err)=> {
    console.log(err);
});


