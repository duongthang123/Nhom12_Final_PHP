
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Modern Admin Dashboard</title>
    <link rel="stylesheet" href="public/assets/admin//css/style.css">
    <link rel="stylesheet" href="public/assets/admin/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
                <h1>Danh Sách Đơn Hàng</h1>
                <small>Home / Dashboard</small>
            </div>
            
            <div class="page-content">

                <div class="records table-responsive">

                    <div class="record-header">
                        <div class="add">
                            <!-- <button id="bntAdd" type="submit">Thêm sản phẩm mới</button> -->
                        </div>

                        <form class="browse" action="index.php?controller=order&action=search&module=admin" method="POST">
                           <input type="search" name="searchValue" placeholder="Search" class="record-search">
                            
                        </form>
                    </div>

                    <div>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th><span class="las la-sort"></span> Tên khách hàng</th>
                                    <th><span class="las la-sort"></span> Địa chỉ</th>
                                    <th><span class="las la-sort"></span> Số điện thoại</th>
                                    <th><span class="las la-sort"></span> Ngày đặt hàng</th>
                                    <th><span class="las la-sort"></span> Tổng tiền</th>
                                    <th><span class="las la-sort"></span> Trạng thái</th>
                                    <th><span class="las la-sort"></span> </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($listOrders as $order) {?>
                                <tr>
                                    <td><?php echo $order['id'] ?></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-info">
                                                <h4><?php echo $order['fullname'] ?></h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?php echo $order['address'] . " - " . $order['city'] ?>
                                    </td>
                                    <td>
                                        <?php echo $order['phoneNumber'] ?>
                                    </td>
                                    <td>
                                        <?php echo $order['oder_date'] ?>
                                    </td>
                                    <td>
                                    <?php echo number_format($order['total_money']) ?>
                                    </td>
                                    <td>
                                    <?php 
                                        if($order['status'] == 'chờ xác nhận'){?>
                                            <span style="color: blue;"><?php echo $order['status'] ?></span>
                                        <?php } if($order['status'] == 'đã hủy đơn') {?>
                                            <span style="color: red;"><?php echo $order['status'] ?></span>
                                        <?php } if($order['status'] == 'đã thành công') {?>
                                            <span style="color: #22baa0;"><?php echo $order['status'] ?></span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <a href="index.php?controller=order&action=seeOrder&module=admin&id=<?php echo $order['id'] ?>">
                                                <span class="ti-eye"></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php }?>
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            
            </div>
            
        </main>
        
    </div>

    <script>
        $id = document.getElementById("bntAdd").addEventListener("click", function() {
            window.location.href = "index.php?controller=product&action=create&module=admin";
        })
        
    </script>
</body>
</html>