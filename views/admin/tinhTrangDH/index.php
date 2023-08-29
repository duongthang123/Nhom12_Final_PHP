
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Modern Admin Dashboard</title>
    <link rel="stylesheet" href="public/assets/admin//css/style.css">
    <link rel="stylesheet" href="public/assets/admin/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="public/assets/admin/css/addProduct.css">
</head>
<body>
    <input type="checkbox" id="menu-toggle">
    <?php include("views/admin/layouts/sildebar.php") ?>
    
    <div class="main-content">
    <?php include("views/admin/layouts/header.php") ?>
        
        
        <main>
            
            <div class="page-header">
                <h1>Tình trạng đơn hàng</h1>
                <small>Home / Dashboard</small>
            </div>
            
            <div class="page-content">

                <div class="records table-responsive">

                    <div>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Tên và địa chỉ khách</th>
                                    <th>Ngày đặt</th>
                                    <th>Shop chuẩn bị</th>
                                    <th>Đã giao bên vận chuyển</th>
                                    <th>Đang giao hàng</th>
                                    <th>Đã giao</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($orderListConfirm as $iteam) { ?>
                                    <form action="index.php?controller=order&action=statusOrderSuccess&module=admin" method="POST">
                                        <tr>
                                            <td>
                                                <?php echo $iteam['id'] ?>
                                            </td>
                                            <td style="max-width: 400px; padding:0px 12px">
                                                <h3><?php echo $iteam['fullname'] ?></h3>
                                                <span><?php echo $iteam['address'] ?> - <?php echo $iteam['city'] ?></span>
                                            </td>
                                            <td>
                                                <?php echo date("Y-m-d", strtotime($iteam['oder_date']));  ?>
                                            </td>
                                            <td>
                                                <i class="ti-check"></i>
                                            </td>
                                            <td>
                                                <i class="ti-check"></i>
                                            </td>
                                            <td>
                                                <!-- <i class="ti-check"></i> -->
                                            </td>
                                            <td>
                                                <div class="btn__status_product">
                                                    <?php if($iteam['status'] == 'đã xác nhận') {?>
                                                        <input type="hidden" name="order_id" value="<?php echo $iteam['id'] ?>"/>
                                                        <button type="submit" name="status_succes" id="btn__status_succes" class="btn__status_succes">Hoàn Thành</button>
                                                        <button type="submit" name="status_dis" class="btn__status_dis">Hủy Đơn</button>
    
                                                    <?php }else if($iteam['status'] == 'đã thành công') {?>
    
                                                        <p class="btn__statuc_succes-text show">Đơn hàng thành công</p>
    
                                                    <?php }else if($iteam['status'] == 'đã hủy đơn') {?>
                                                        <p class="btn__statuc_dis-text show">Đã hủy đơn hàng</p>
                                                     <?php }?>
                                                </div>
                                            </td>
                                        </tr>
                                    </form>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            
            </div>
            
        </main>
        
    </div>

    <script>
        
        // $succesTatus = document.getElementById("btn__status_succes").addEventListener("click", function() {
        //     window.location.href = "index.php?controller=oder&action=stausOrderSuccess&module=admin";
        // })
    </script>
</body>
</html>