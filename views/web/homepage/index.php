
<!-- Header -->
<?php include_once("views/web/layouts/header.php") ?>

<!-- slider -->
<div class="slider">
</div>

<div class="container">
    <div class="grid wide">
        <div class="row sm-gutter">
            <div class="col c-12 m-12 l-12">
                <h1 class="content__title">SẢN PHẨM MỚI</h1>
                <div class="row sm-gutter">
                    <?php foreach($products as $product) {?>
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
                    <?php } ?>
                </div>
                <a href="index.php?controller=shopgrid&action=showProductByCategory&module=web&category_id=<?php echo $product['category_id'] ?>" class="btn">Xem Thêm >></a>
            </div>
        </div>

        <div class="row sm-gutter">
            <div class="col c-12 m-12 l-12">
                <h1 class="content__title">SẢN PHẨM NỔI BẬT</h1>
                <div class="row sm-gutter">
                    <?php foreach($bestSellProducts as $product) {?>
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
                                    <h3 class="content__product_price"><span><?php echo number_format($product['price'], 0, ".", ",")  ?></span> đ</h3>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
                <a href="index.php?controller=shopgrid&action=showProductByCategory&module=web&category_id=<?php echo $product['category_id'] ?>" class="btn">Xem Thêm >></a>
            </div>
        </div>
        
        <div class="row sm-gutter">
            <div class="col c-12 m-12 l-12">
                <h1 class="content__title">SHOP BÁN CHÓ MÈO CẢNH</h1>
                <div class="row sm-gutter">
                    <?php foreach($products as $product) {?>
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
                <a href="index.php?controller=shopgrid&action=showProductByCategory&module=web&category_id=<?php echo $product['category_id'] ?>" class="btn">Xem Thêm >></a>
            </div>
        </div>

        <div class="row sm-gutter">
            <div class="col c-12 m-12 l-12">
                <h1 class="content__title">PHỤ KIỆN THÚ CƯNG</h1>
                <div class="row sm-gutter">
                    <?php foreach($productPk as $product) {?>
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
                <a href="index.php?controller=shopgrid&action=showProductByCategory&module=web&category_id=<?php echo $product['category_id'] ?>" class="btn">Xem Thêm >></a>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<?php include_once("views/web/layouts/footer.php") ?>