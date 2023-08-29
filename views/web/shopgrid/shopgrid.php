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
                                <a href="index.php?controller=shopgrid&action=showProductByCategory&module=web&category_id=<?php echo $category['id'] ?>" class="category__item_link"><?php echo $category['name'] ?></a>
                            </li>
                        <?php }?>
                        
                    </ul>
                </nav>
            </div>

            <div class="col l-10 m-12 c-12">
                <div class="row sm-gutter">
                    <h3 class="shop__content_title">
                        <?php
                            if(isset($nameCategory[0]['name'])) {
                                echo $nameCategory[0]['name'];
                            } else if(isset($key)) {
                                echo "Kết quả tìm kiếm: ". $key;
                            } else {
                                echo "Thú Cưng";
                            }
                        ?>
                    </h3>
                </div>
                <div class="row sm-gutter">
                    <div class="shop__content_top">
                        <div class="shop__top_select">
                            <label class="shop__top_lable">Sắp xếp:</label>
                            <select name="sort" id="" class="shop__select_list">
                                <option value="0">Sắp theo giá: Thấp -> Cao</option>
                                <option value="1">Sắp theo giá: Cao -> Thấp</option>
                            </select>
                        </div>

                        <div class="shop__top_quantity">
                            Số sản phẩm: 
                            <?php 
                                $count = 0;
                                foreach($products as $product) {
                                    $count++;
                                }
                                echo $count;
                            ?>
                        </div>
                    </div>
                </div>
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
            </div>
        </div>
        
    </div>
</div>

<?php include("views/web/layouts/footer.php") ?>