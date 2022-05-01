<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible content="IE-edge>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@200;300&family=Mitr:wght@200&family=Poppins&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200&family=Poppins&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="check_order.css">
        <title>จองอาหาร</title>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <img class='card-img-top img-fluid' id='logo' src="img/kheng.png">
                <h1>เช็ครายการอาหาร</h1>
            </div>
        </div>


        <div class="container">
            <div class="box">

                <div class="row" id="gap">

                    <div class="col-7">
                        <?php
                            session_start();
                            include('config.php');
                            if (!isset($_SESSION['user'])) {
                                header("location: login.php");
                            }
                            $user_id = $_SESSION['user'];



                            if (isset($_SESSION['cart'])) {
                                
                                foreach($_SESSION['cart'] as $key => $value)
                                {
                                    
                                    echo "
                                        <div class='col'>
                                            <div class='row' id='row-food'>

                                                <div class='col-sm-1'>
                                                    <span class='dot'><p id='quan'>$value[food_quantity]</p></span>
                                                </div>

                                                <div class='col-sm-6'>
                                                    <div class='card'>
                                                        <img class='card-img' id='food-order' src='$value[food_img]'>
                                                    </div>
                                                </div>

                                                <div class='col-sm-4' id='description'>
                                                    <h3>$value[food_name]</h3>
                                                    <p>$value[food_detail]</p>
                                                </div>
            

                                                <div class='col-sm-1'>
                                                    <h3>$value[food_price]</h3>
                                                </div>

                                            </div>

                                        </div>
                                        
                                        
                                        ";
                                }
                            }


                            

                        ?>
                        <!-- column list -->
                        <div class="col"> 
                            <!-- border-right -->

                            <div class="row" id="row-food">

                                <!-- Quantity -->
                                <div class="col-sm-1">
                                    
                                </div>

                                <!-- Menu -->
                                <div class="col-sm-6">
                                    <div class="card">
              
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="col-sm-4" id="description">

                                </div>

                                <!-- Price -->
                                <div class="col-sm-1">
                           
                                </div>

                            </div>

                        </div>


                    </div>

                    <div class="col-4"  id="border-left">
                        <div class="top_check">
                            <h2 id="order">My Order</h2>



                        <?php

                            if (isset($_SESSION['cart'])) {

                                $total = 0;

                                foreach($_SESSION['cart'] as $key => $value)

                                {
                                    $price = $value['food_price'];
                                    $quantity = $value['food_quantity'];
                                    $bill = $price * $quantity;
                                    echo "
                                        <div class='row' id='order_title'> 

                                            <div class='col-sm-10' id='food_name'>
                                                <p>$value[food_name]</p>
                                            </div>

                                            <div class='col-sm-2' id='food_bill'>
                                                <p>$bill</p>
                                            </div>

  

                                        </div>
                                ";

                                $total = $total+$bill;

                                }

                            }
                        ?>


                        </div>
                        
                        <div class="bottom_check">
                            <div class="row" id="border-top">
                                <div class="col-7">
                                    <p id="total_price">ราคาทั้งหมด</p>
                                </div>

                                <div class="col-5">
                                    <p id="total_price"><?php echo $total; ?></p>
                                    <input type="hidden" name="grand_total" value=$grand_total>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                    $_SESSION['total'] = $total;
                ?>

                </div> 

            </div>

            <div class="container" style="margin-bottom: 5%;">
                <div class="bottom">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-primary" id="back" onclick="location.href='foodlist.php'">ย้อนกลับ</button>
                        </div>

                        <div class="col">
                            <button type="button" class="btn btn-primary" id="check" onclick="location.href='showbooking.php'">จองอาหาร</button>
                        </div>
                    </div>
                    <center><a href="logout.php" class="logout">ออกจากระบบ</a></center>
                </div>
            </div>

        </div>



    <footer>
        © copyright2022 Kheng Chinese Restaurant
    </footer>


    </body>
</html>
