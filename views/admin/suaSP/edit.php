
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Modern Admin Dashboard</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="public/assets/admin/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="./public/assets/admin/css/style.css">
    <link rel="stylesheet" href="public/assets/admin/css/addProduct.css">
</head>
<body>
    <input type="checkbox" id="menu-toggle">

    <!-- sidebar -->
    <?php include("views/admin/layouts/sildebar.php") ?>
    
    <div class="main-content">

        <!-- header -->
    <?php include("views/admin/layouts/header.php") ?>
        
        <main>

            <div class="page-header">
                <h1>Sửa sản phẩm</h1>
                <small>Home / Dashboard</small>
            </div>
            
            <!--  -->
            <div class="page-content">
                <div class="content__fluid-add">
                    <div class="title__add">
                        Sửa SP
                    </div>

                    <form action="index.php?controller=product&action=update&module=admin&id=<?php echo $product['id'] ?>" class="content__form" method="POST" enctype="multipart/form-data">
                        <div class="content__form_box">
                            <h3 class="content__form_titile">Thể loại</h3>
                            <select name="category_id" class="content__form__select">
                                <?php foreach($categories as $category) {?>
                                    <option value="<?php echo $category['id'] ?>" <?php echo $product['category_id'] === $category['id'] ? "selected" : "" ?>><?php echo $category['name'] ?></option>
                                <?php }?>
                            </select>
                            <p id="errors">
                                <?php echo isset($productErrors['category_id']) ? $productErrors['category_id'] : '';?>
                            </p>
                        </div>

                        <div class="content__form_box">
                            <h3 class="content__form_titile">Tên sản phẩm</h3>
                            <input class="content__form_input" placeholder="Nhập tên sản phẩm...." type="text" name="name" value="<?php echo isset($product['name']) ? $product['name'] : '' ?>">
                            <p id="errors">
                                <?php echo isset($productErrors['name']) ? $productErrors['name'] : '';?>
                            </p>
                        </div>

                        <div class="content__form_box">
                            <h3 class="content__form_titile">Mô tả sản phẩm</h3>
                            <textarea class="content__form_text" name="description" id="" cols="30" rows="5"><?php echo isset($product['description']) ? $product['description'] : '' ?></textarea>
                            <p id="errors">
                                <?php echo isset($productErrors['description']) ? $productErrors['description'] : '';?>
                            </p>
                        </div>
                        
                        <div class="content__form_box">
                            <h3 class="content__form_titile">Giá sản phẩm</h3>
                            <input class="content__form_input" placeholder="Nhập giá..." type="text" name="price" value="<?php echo isset($product['price']) ? $product['price'] : '' ?>">
                            <p id="errors">
                                <?php echo isset($productErrors['price']) ? $productErrors['price'] : '';?>
                            </p>
                        </div>

                        <div class="content__form_box">
                            <h3 class="content__form_titile">Số lượng sản phẩm</h3>
                            <input class="content__form_input" placeholder="Nhập số lượng..." type="text" name="quantity" value="<?php echo isset($product['quantity']) ? $product['quantity'] : '' ?>">
                            <p id="errors">
                                <?php echo isset($productErrors['quantity']) ? $productErrors['quantity'] : '';?>
                            </p>
                        </div>

                        <div class="content__form_box">
                            <h3 class="content__form_titile">Chọn ảnh</h3>
                            <input class="content__form_input" type="file" name="img" value="<?php echo $target_file.$product['img'] ?>">
                            <a style="margin-left: 15px; padding-top: 6px;" href="#">
                                <img src="<?php echo $target_file.$product['img'] ?>" width="300px" />
                            </a>
                            <input type="hidden" name="img" value="<?php echo $product['img'] ?>">
                            
                            <p id="errors">
                                <?php echo isset($productErrors['img']['name']) ? $productErrors['img']['name'] : '';?>
                            </p>
                        </div>

                        <button type="submit" name="edit_product" class="content__form_btn">Lưu sản phẩm</button>
                        <button type="button" onclick="history.back()" class="content__form_btn--dis">Hủy</button>
                    </form>

                </div>
                
            
            </div>
            
        </main>
        
    </div>
</body>
</html>
