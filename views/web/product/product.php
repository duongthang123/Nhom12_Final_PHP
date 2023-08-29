<?php include_once("views/web/layouts/header.php") ?>

<div class="container container__shop">
    <div class="grid wide">
        <div class="row sm-gutter">
            <h1 class="shop__title">ANIPAT SHOP</h1>
        </div>
        
        <div class="row sm-gutter">
            <div class="col l-2 m-0 c-0">
                <nav class="category">
                    <h3 class="category__heading">DANH MỤC</h3>
                    <ul class="category__list">
                        <?php foreach($categories as $category) {?>
                            <li class="category__item">
                                <a href="index.php?controller=shopgrid&action=showProductByCategory&module=web&category_id=<?php echo $category['id'] ?>" class="category__item_link "><?php echo $category['name'] ?></a>
                            </li>
                        <?php }?>
                        
                    </ul>
                </nav>
            </div>

            <div class="col l-10 m-12 c-12">
                <div class="row sm-gutter">
                    <div class="col l-5 m-12 c-12">
                        <div class="shop__detail_left">
                            <img src="<?php echo $target_file.$product['img'] ?>" alt="Meo" class="shop__detail_img">
                        </div>
                    </div>
                    
                    <div class="col l-7 m-12 c-12">
                        <div class="shop__detail_right">
                            <h2 class="shop__detail_name"><?php echo $product['product_name'] ?></h2>
                            <p class="shop__detail_price"><?php echo number_format($product['price'], 0, ".", ",") ?> đ</p>
                            <form action="index.php?controller=cart&action=addToCart&module=web" method="POST" class="shop__detail_quantity">
                                <label>Số Lượng: </label>
                                <div class="quantity">
                                    <span id="quantity_des" class="des qtybtn">-</span>
                                    <input id="quantity_input" type="text" autocomplete="off" min="1" value="1" name="product_qt" class="shop__detail_input">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>" class="shop__detail_input">
                                    <span id="quantity_inc" class="inc qtybtn">+</span>
                                </div>
                                <?php 
                                    if($product['quantity'] > 0){?>
                                    
                                    <button name="btn_addToCart" class="shop__detail_btn btn">Mua Ngay</button>
                                    <?php } else{?>
                                        <p style="font-size: 22px; font-weight: 550 ;color: red;">Hết Hàng</p>
                                    <?php } ?>

                                    
                            </form>
                            <p class="shop__detail_idproduct" >Mã sản phẩm: <?php echo $product['id'] ?></p>
                            <p class="shop__detail_statusproduct">Tình trạng: <?php echo $product['quantity'] > 0 ? "Còn hàng" : "Hết hàng" ?></p>
                            <p class="shop__detail_cateproduct">Danh mục: <?php echo $product['category_name'] ?></p>
                        </div>
                    </div>
                </div>

                <div class="row sm-gutter">
                    <div class="shop__deatil_des">
                        <h3 class="shop__deatil_des-title">Thông tin sản phẩm</h3>
                        <p class="shop__detail_des-content">
                            <?php echo $product['description'] ?>
                        </p>
                    </div>
                </div>

                <div class="row sm-gutter">
                    <div class="shop__deatil_bottom">
                        <h3 class="shop__deatil_bottom-title">SẢN PHẨM TƯƠNG TỰ</h3>
                    </div>
                </div>
                <div class="row sm-gutter">
                    <?php foreach(array_slice($products, 0 ,8) as $product) {?>
                       
                        <div class="col c-6 m-4 l-3">
                            <div class="content__product">
                                <div class="content__product-img">
                                    <img src="<?php echo $target_file.$product['img'] ?>" alt="" class="product__img">
                                    <div class="content__action">
                                        <div class="content__action_click">
                                            <i  class="content__action_like ti-heart"></i>
                                            <i  class="content__action_search ti-search"></i>
                                        </div>
                                        <a href="index.php?controller=product&action=showProductByID&module=web&product_id=<?php echo $product['id'] ?>&category_id=<?php echo $product['category_id'] ?>" class="content__action_btn">Mua Ngay</a>
                                    </div>
                                </div>
        
                                <div class="content__product_info">
                                    <div class="content__product_top">
                                        <h3 class="content__product_id">ID: <?php echo $product['id'] ?></h3>
                                        <div class="content__product_star">
                                            <i class="content__product_star-icon ti-star"></i>
                                            <i class="content__product_star-icon ti-star"></i>
                                            <i class="content__product_star-icon ti-star"></i>
                                            <i class="content__product_star-icon ti-star"></i>
                                            <i class="content__product_star-icon ti-star"></i>
                                        </div>
                                    </div>
                                    <a href="index.php?controller=product&action=showProductByID&module=web&product_id=<?php echo $product['id'] ?>&category_id=<?php echo $product['category_id'] ?>" class="content__product_name"><?php echo $product['name'] ?></a>
                                    <h3 class="content__product_price"><span><?php echo number_format($product['price'], 0, ".", ",") ?></span> đ</h3>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php include_once("views/web/layouts/footer.php") ?>

<script>
    const quantity_inputt = document.getElementById("quantity_input");
    const quantity_des = document.getElementById("quantity_des");
    const quantity_inc = document.getElementById("quantity_inc");

    quantity_inc.addEventListener("click", () =>{
        quantity_inputt.value = parseInt(quantity_inputt.value) + 1;
    });

    quantity_des.addEventListener("click", () =>{
        if(quantity_inputt.value > 1) {
            quantity_inputt.value = parseInt(quantity_inputt.value) - 1;
        }
    });

</script>
