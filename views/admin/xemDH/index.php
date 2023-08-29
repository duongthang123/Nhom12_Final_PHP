
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Modern Admin Dashboard</title>
    <link rel="stylesheet" href="public/assets/admin/css/style.css">
    <link rel="stylesheet" href="public/assets/admin/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="public/assets/admin/css/addProduct.css">
    <style>
        #bntAdd:hover {
            cursor: pointer;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <input type="checkbox" id="menu-toggle">
    <?php include("views/admin/layouts/sildebar.php") ?>
    
    
    <div class="main-content">
        <?php include("views/admin/layouts/header.php") ?>
        
        
        <main>
            
            <div class="page-header">
                <h1>Đơn hàng mới</h1>
                <small>Home / Dashboard</small>
            </div>
            
            <div class="page-content">

                <div class="records table-responsive">
                    <div class="record-header">
                        <div class="add">
                            <button id="bntAdd" type="submit">Tình trạng các đơn hàng</button>
                            <button style="margin-left: 2px; cursor: pointer;" id="bntAddDS" type="submit">DS đơn hàng</button>
                        </div>
                    </div>
                </div>

                <div class="content__fluid_newoderpd">
                    <ul class="new__order_list">
                        <?php foreach($orders as $order) {?>
                            <form action="index.php?controller=order&action=confirmOrder&module=admin" method="POST">
                                <li class="new__order_item records table-responsive">
                                    <div class="new__order_item-header">
                                        <img src="public/assets/admin/img/logo.jpg" alt="" class="order__item_header_img">
                                        <div class="order__item_header_date">Ngày đặt: <span> <?php echo $order['oder_date'] ?></span></div>
                                    </div>
    
                                    <div class="new__order_item-info">
                                        <div class="order__info">
                                            <div class="order__info-name">Tên Shop: <span>Shop Bán Hàng</span></div>
                                            <div class="order__info_address">
                                                <lable class="order__info_address-name">Địa chỉ cửa hàng:</lable>
                                                <p class="order__info_address-main">Quận Bắc Từ Niêm - Hà Nội</p>
                                            </div>
                                            <div class="order__info-phone">Số điện thoại: <span>098767351</span></div>
                                            <div class="order__info-email">Email: <span>aad@gmail.com</span></div>
                                        </div>
    
                                        <div class="order__info">
                                            <div class="order__info-name">Tên Khách Hàng: <span><?php echo $order['fullname']  ?></span></div>
                                            <div class="order__info_address">
                                                <lable class="order__info_address-name">Địa chỉ khách hàng:</lable>
                                                <p class="order__info_address-main"><?php echo $order['address'] ?> - <?php echo $order['city'] ?></p>
                                            </div>
                                            <div class="order__info-phone">Số điện thoại: <span><?php echo $order['phoneNumber'] ?></span></div>
                                            <div class="order__info-email">Email: <span><?php echo $order['email'] ?></span></div>
                                        </div>
    
                                        <div class="new__order_id">Mã đơn hàng: <span><?php echo $order['id'] ?></span></div>
                                    </div>
    
                                    <div class="new__order_item-table">
                                        <table width="100%" class="order__table">
                                            <thead>
                                                <tr class="order__table-tr">
                                                    <th>Tên Sản Phẩm</th>
                                                    <th>Giá tiền</th>
                                                    <th>Số lượng</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($order['product'] as $iteam) {?> 
                                                    <tr>
                                                        <td><?php echo $iteam['name'] ?></td>
                                                        <td>
                                                            <?php echo number_format($iteam['price'], 0, ".", ",") ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $iteam['quantity'] ?>
                                                        </td>
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
    
                                    <div class="new__order_total">
                                        <div class="order__total_payment">
                                            <h3 class="order__total_payment-tittle">Hình thức thanh toán</h3>
                                            <p class="order__total_payment-main">
                                                Thanh toán bằng thẻ
                                                <i class="iconcheck ti-check"></i>
                                            </p>
                                            <p class="order__total_payment-main">
                                                Thanh toán bằng tiền mặt
                                            </p>
                                        </div>
    
                                        <div class="order__total_price">
                                            <h3 class="order__total_price-tittle">Tổng thanh toán</h3>
                                            <table>
                                                <tr>
                                                    <td class="order__total_title">
                                                        Tổng Giá
                                                        <td class="order__total_pay"><span><?php echo number_format($order['total_money']) ?></span> VND</td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="order__total_title">
                                                        Phí Ship
                                                        <td class="order__total_pay"><span>
                                                        <?php
                                                            $shiping = 50000; 
                                                            echo number_format($shiping);
                                                        ?> </span>VND</td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="order__total_title">
                                                        Tổng Thanh Toán
                                                        <td class="order__total_pay"><span>
                                                        <?php 
                                                            $total = $order['total_money'] + $shiping;
                                                            echo number_format($total);
                                                        ?>
                                                        </span>VND</td>
                                                    </td>
                                                </tr>
                                            </table>
                                            
                                        </div>
                                    </div>
                                    <div class="new__order_btn">
                                        <a type="submit" onclick="history.back()" name="order__btn_print" class="order__btn_succes">Quay Lại</a>
                                        <input type="hidden" name="order_id" value="<?php echo $order['id'] ?>" />
                                        <button type="submit" name="confirm_order" class="order__btn_succes">Xác Nhận</button>
                                    </div>
                                </li>
                            </form>
                        <?php } ?>   
                    </ul>
                </div>
            
            </div>
            
        </main>
        
    </div>

    <script>
        $id = document.getElementById("bntAdd").addEventListener("click", function() {
            window.location.href = "index.php?controller=order&action=statusOrder&module=admin";
        })

        document.getElementById("bntAddDS").addEventListener("click", function() {
            window.location.href = "index.php?controller=order&action=listOrder&module=admin";
        })
        
    </script>
</body>
</html>