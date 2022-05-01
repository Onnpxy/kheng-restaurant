<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    include('config.php');

    if (!isset($_SESSION['user'])) {
        header("location: login.php");
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขรายการอาหาร</title>
    <!-- styles -->
    <link rel="stylesheet" href="edit.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <!-- TH font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&display=swap" rel="stylesheet">
    <!-- EN font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <div id="logo">
            <center>
                <img class='card-img-top img-fluid' id='logo' src="img/kheng.png">
            </center>
        </div>

        <center>
            <p class="heading">แก้ไขรายการอาหาร</p>

            <div class="card">
                <table>

                    <?php


                        $user_id = $_SESSION['user'];

                        if (isset($_SESSION['cart'])) {
                                

                            foreach($_SESSION['cart'] as $key => $value)
                            { 

                                echo "
                                    <form method='post'>
                                    <tr>
                                        <td style='width: 12em;' name='food_name'>$value[food_name]</td>
                                        <td style='width: 3em;' name='food_price'>$value[food_price]</td>
                                        
                                        <td>
                                            <input type='hidden' name='food_id' value='$value[food_id]'>
                                        </td>
                                        
                                        <td style='width: 1em;'name='food_quantity'>$value[food_quantity]</td>
            

            
                                        <td style='width: 12em;'>
                                            <button name='remove' id='remove' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                                            <input type='hidden' name='food_name'>
                                        </td>
                                    </tr>
                                </form>
                                ";
                            }
                        }
                ?>



                </table>
            </div>
            <button class="confirm" onclick="location.href='foodlist.php'" type="button">เพิ่มรายการอาหาร</button>
            <button class="confirm" type="button" onclick="location.href='check_order.php'">ยืนยันการแก้ไข</button>
        </center>

        <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {

                if(isset($_POST['remove'])) {

                    foreach ($_SESSION['cart'] as $key => $value)
                    {
                        unset($_SESSION['cart'][$key]);
                        $_SESSION['cart'] = array_values($_SESSION['cart']);
                        echo "<script>alert('รายการถูกลบแล้ว เช็ครายการอาหารอีกครั้งที่หน้ายืนยันการแก้ไข')</script>";
                    }
                    
                };
            }
      

        ?>

    </div>
<footer>
    © copyright2022 Kheng Chinese Restaurant
</footer>
</body>

</html>
