<?php
include "../db.php";

// Function to check if the user has permission to access a specific nav item

global $userPermission;

if(isset($_SESSION['uid'])) {
    $user_info_query = mysqli_query($con, "SELECT permission_id FROM user_info WHERE user_id='" . $_SESSION['uid'] . "'");

    if ($user_info_query) {
        $data = mysqli_fetch_assoc($user_info_query);
        $userPermission = $data['permission_id'];
    }
}

function checkPermission($requiredPermission) {
    global $userPermission;
    return $userPermission >= $requiredPermission;
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Admin page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="assets/css/Material+Icons.css" />
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <link href="assets/css/white-dashboard.css" rel="stylesheet" />

</head>

<body class="dark-edition">
<div class="sidebar" data-color="orange" data-background-color="FFFFFF">
    <div class="logo">
        <a href="" class="simple-text logo-normal">
            Admin
        </a>
    </div>
    <div class="sidebar-wrapper ps-container ps-theme-default" data-ps-id="3a8db1f4-24d8-4dbf-85c9-4f5215c1b29a">
        <ul class="nav">
            <?php
            if (checkPermission(1)) {
                echo '<li class="nav-item active">
                        <a class="nav-link" href="index.php">
                            <i class="material-icons">dashboard</i>
                            <p>Главная</p>
                        </a>
                    </li> ';
            }
            ?>
            <?php
            if (checkPermission(2)) {
                echo '<li class="nav-item">
                    <a class="nav-link" href="adduser.php">
                        <i class="material-icons">person</i>
                        <p>Добавить пользователя</p>
                    </a>
                </li> ';
            }
            ?>
            <?php
            if (checkPermission(1)) {
                echo '<li class="nav-item">
                    <a class="nav-link" href="productlist.php">
                        <i class="material-icons">list</i>
                        <p>Список товаров</p>
                    </a>

                </li>';
            }
            ?>
            <?php
            if (checkPermission(1)) {
                echo '<li class="nav-item">
                    <a class="nav-link" href="orders.php">
                        <i class="material-icons">library_books</i>
                        <p>Заказы</p>
                    </a>
                </li>';
            }
            ?>
            <?php
            if (checkPermission(1)) {
                echo '<li class="nav-item">
                    <a class="nav-link" href="addproduct.php">
                        <i class="material-icons">add</i>
                        <p>Добавить товар</p>
                    </a>
                </li>';
            }
            ?>
            <?php
            if (checkPermission(2)) {
                echo '<li class="nav-item">
                    <a class="nav-link" href="manageuser.php">
                        <i class="material-icons">edit_user</i>
                        <p>Управление пользователями</p>
                    </a>
                </li>';
            }
            ?>
            <?php
            if (checkPermission(0)) {
                echo '<li class="nav-item">
                    <a class="nav-link" href="../index.php">
                        <i class="material-icons">logout</i>
                        <p>Выйти</p>
                    </a>
                </li>';
            }
            ?>
        </ul>
    </div>
</div>
</body>
</html>