<?php include("views/web/layouts/header.php") ?>

<div class="container container__shop">
    <div class="grid wide">
        <div class="row sm-gutter">
            <h1 class="shop__title">GIỎ HÀNG</h1>
        </div>
        
        <div class="row sm-gutter cart__scroll">
            <div class="col l-12 m-12 c-12">
                <table class="cart__table">
                    
                    <thead class="cart__table_head">
                        <tr>
                            <th class="cart__title ">Sản Phẩm</th>
                            <th class="cart__title cart__title-price">Giá</th>
                            <th class="cart__title cart__title-quatity">Số Lượng</th>
                            <th class="cart__title cart__title-total">Tổng Tiền</th>
                            <th class="cart__title cart__title-action"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sum = 0;
                        foreach($_SESSION['cart'] as $itemCart) {?>
                            <tr>
                                <td class="cart__title-name">
                                    <img src="<?php echo $target_file.$itemCart['product_img'] ?>" alt="" class="cart__name_img">
                                    <p class="cart__name_name"><?php echo $itemCart['name'] ?></p>
                                </td>
                                <td class="cart__title-price"><?php echo number_format($itemCart['price'], 0, ".", ",") ?></td>
                                <td class="cart__title-quatity">
                                    <form action="index.php?controller=cart&action=updateCart&module=web" method="POST" class="cart__title-quatity-main">
                                        <button>
                                            <span class="des__cart quantity_des_cart">-</span>
                                        </button>
                                        <input  name="quantity" type="text" autocomplete="off" min="1" value="<?php echo $itemCart['quantity']?>" class="cart__input-product quantity_input_cart">
                                        <input type="hidden" name="product_id_input" value="<?php echo $itemCart['product_id'] ?>" />
                                        <button>
                                            <span class="inc__cart quantity_inc_cart">+</span>
                                        </button>
                                        
                                    </form>
                                </td>
                                <td class="cart__title-total">
                                    <?php
                                    $subtotal = $itemCart['quantity']*$itemCart['price'];

                                    echo number_format($subtotal, 0, ".", ",");
                                    
                                    $sum += $subtotal;
                                    
                                    ?>

                                </td>
                                <td class="cart__title-action">
                                    <a href="index.php?controller=cart&action=deleteItem&module=web&product_id=<?php echo $itemCart['product_id'] ?>" id="delete" onclick="removeRow()" class="cart__title-action-link delete" >X</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="row sm-gutter">
            <div class="cart__btn">
                <a href="index.php?controller=shopgrid&action=index&module=web" class="btn cart__btn_continue">Tiếp tục mua hàng</a>
                <a href="index.php?controller=cart&action=index&module=web" class="btn cart__btn_update">Cập nhật cart</a>
            </div>
        </div>

        <div class="row sm-gutter">
            <div class="col l-6 m-7 c-12">

            </div>

            <div class="col l-6 m-4 c-12">
                <div class="cart__plus">
                    <h3 class="cart__plus_heading">Tổng Giỏ Hàng</h3>
                    <div class="cart__toltal">
                        <div class="cart__toltal_subtoal">
                            <p>Tạm Tính:</p>
                            <p><?php echo number_format($sum, 0, ".", ",") ?> đ</p>
                        </div>

                        <div class="cart__total__ship">
                            <p>Phí Ship: </p>
                            <p>Free
                                <?php $shiping = 0; ?>
                            </p>
                        </div>

                        <div class="cart__total__main">
                            <p>Tổng Tiền: </p>
                            <p><?php echo number_format($sum + $shiping, 0, ".", ",") ?> đ</p>
                        </div>

                    </div>
                    <?php if($_SESSION['cart'] == null) {?>
                        <a id="cart__btn_fail" class="btn cart__btn_succes">Thanh Toán</a>
                    <?php } else {?>
                        <a href="index.php?controller=order&action=index&module=web" class="btn cart__btn_succes">Thanh Toán</a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="model" class="model">
    <div id="model__container" class="model__container">
        <div class="model__header">
            <h2 class="model__header_title">Thông Báo</h2>
        </div>

        <div id="close__model" class="model__close">
            <i class="ti-close model__close-icon"></i>
        </div>

        <div class="model__content">
            <h4>Bạn có chắc chắn muốn xóa !</h4>
        </div>

        <a class="btn model__btn">Đồng Ý</a>
    </div>
</div>
<script>

    const quantity_main = document.querySelectorAll(".cart__title-quatity-main");

    quantity_main.forEach(function(quantity_input) {
        const quantity_des = quantity_input.querySelector(".quantity_des_cart");
        const quantity_inc = quantity_input.querySelector(".quantity_inc_cart");
        const quantity_input_cart = quantity_input.querySelector(".quantity_input_cart");
        quantity_inc.addEventListener("click", () =>{
            quantity_input_cart.value = parseInt(quantity_input_cart.value) + 1;
        });

        quantity_des.addEventListener("click", () =>{
        if(quantity_input_cart.value > 1) {
            quantity_input_cart.value = parseInt(quantity_input_cart.value) - 1;
            }
        });
    })

    const cartBntFail = document.getElementById("cart__btn_fail");
    cartBntFail.addEventListener('click', () =>{
        alert("Không có sản phẩm nào trong giỏ hàng!")
    });

    // model

    const deleteItem = document.getElementById("delete");
    const model = document.getElementById("model");
    const closeModel = document.getElementById("close__model");
    const modelContainer = document.getElementById("model__container");
    function showModel() {
        model.classList.add("open");
    }

    function hideModel() {
        model.classList.remove("open");
    }

    deleteItem.addEventListener("click", showModel);

    closeModel.addEventListener('click', hideModel);
    model.addEventListener('click', hideModel);
    modelContainer.addEventListener('click', (e)=> {
        e.stopPropagation();
    })
</script>
<?php include("views/web/layouts/footer.php") ?>