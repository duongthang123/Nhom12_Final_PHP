
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
                <h1>Danh Mục Sản Phẩm</h1>
                <small>Home / Dashboard</small>
            </div>
            
            <div class="page-content">

                <div class="records table-responsive">

                    <div class="record-header">
                        <div class="add">
                            <button id="bntAdd" type="submit">Thêm danh mục mới</button>
                        </div>

                        <div class="browse">
                           <input type="search" placeholder="Search" class="record-search">
                            
                        </div>
                    </div>

                    <div>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th><span class="las la-sort"></span> Tên danh mục</th>
                                    <th><span class="las la-sort"></span> Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($categories as $category) {?>
                                <tr>
                                    <td><?php echo $category['id'] ?></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-info">
                                                <h4><?php echo $category['name'] ?></h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <a href="index.php?controller=category&action=edit&module=admin&id=<?php echo $category['id'] ?>">
                                                <span  class="ti-pencil"></span>
                                            </a>
                                            <a href="index.php?controller=category&action=delete&module=admin&id=<?php echo $category['id'] ?>">
                                                <span class="ti-trash"></span>
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
            window.location.href = "index.php?controller=category&action=create&module=admin";
        })

        
        
    </script>

</body>
</html>