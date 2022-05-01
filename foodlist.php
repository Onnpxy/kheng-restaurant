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
        <link rel="stylesheet" href="foodlist.css">
        <title>รายการอาหาร</title>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <img class='card-img-top img-fluid' id='logo' src="img/kheng.png">
                <h1>รายการอาหาร</h1>
            </div>


            <div class="foodlist">


                <div class="row">
                <?php
                    session_start();
                    include('config.php');
                    if (!isset($_SESSION['user'])) {
                        header("location: login.php");
                    }



                    $query = mysqli_query($conn, "SELECT * FROM food_list ORDER BY id DESC");

                    // while($result = mysqli_fetch_array($query)) {
                    if($query){
                        while($result = mysqli_fetch_assoc($query)) {

                        

                ?>
                
                    <div class="col-4 d-flex align-items-stretch">

                            <div class="card">

                            <form method="post">

                                <img class="card-img-top" id="food" name="food_img" src="<?=$result['food_img']?>">
                                <input type="hidden" name="food_img" value="<?=$result['food_img']?>">
            
                                <div class="card-body d-flex flex-column">
                                    <h2 class="card-title" name="food_name"><?=$result['food_name']?></h2>
                                    <p class="card-text text-center" name="food_detail"><?=$result['food_detail']?></p>
                                    <p class="card-text text-center" name="food_price">ราคา <?=$result['food_price']?> บาท</p>

                                    <input type="hidden" name="food_id" value="<?=$result['id']?>">
                                    <input type="hidden" name="food_name" value="<?=$result['food_name']?>">
                                    <input type="hidden" name="food_detail" value="<?=$result['food_detail']?>">
                                    <input type="hidden" name="food_price" value="<?=$result['food_price']?>">
                                    <input class="quantity" type="number" min="1" name="food_quantity" placeholder="ใส่จำนวน">
                                </div>
                                
                                <div class="card-footer mt-auto">
                                    <input type="submit" class="align-self-end btn btn-dark" name="add_to_cart" value="เพิ่มอาหารลงเข่ง">
                                </div>
                            </form>   


                        </div>
                    </div>

                <?php 
                        };
                    };

                ?>
                </div>

            </div>
               
            <div class="container">
                <div class="bottom">

                <center>
                    <div class="row">
                        <div class="col">
                                <button type="button" class="btn btn-primary" id="check" name="check-cart" onclick="location.href='check_order.php'">เช็คอาหารในเข่ง</button>
                        </div>
                    </div>
                </center>

                    <center><a href="logout.php">ออกจากระบบ</a></center>
                </div>
        </div>
        <?php
            $user_id = $_SESSION['user'];
            $firstname = $_SESSION['firstname'];
            $lastname = $_SESSION['lastname'];
            $date = $_SESSION['date'];
            $time = $_SESSION['time'];
            $person = $_SESSION['person'];
            $table = $_SESSION['table'];
            
            
            error_reporting(0);

            if($_SERVER['REQUEST_METHOD'] == "POST") 
            {
                if (isset($_POST['add_to_cart']))
                {

                    if (isset($_SESSION['cart']))
                    {
                        $myitems = array_column($_SESSION['cart'], 'food_name');

                        if(in_array($_POST['food_name'], $myitems))
                        {
                            echo "<script>alert('อาหารรายการนี้ถูกเพิ่มไปเรียบร้อยแล้ว')</script>";
                        }
                        else
                        {

                            $count=count($_SESSION['cart']);
                            $_SESSION['cart'][$count] = array(

                                'user_id' => $user_id,
                                'firstname' => $firstname,
                                'lastname' => $lastname,
                                'date' => $date,
                                'time' => $time,
                                'person' => $person,
                                'table' => $table,
                                'food_id' => $_POST['food_id'],
                                'food_name' => $_POST['food_name'],
                                'food_detail' => $_POST['food_detail'],
                                'food_img' => $_POST['food_img'],
                                'food_price' => $_POST['food_price'],
                                'food_quantity' => $_POST['food_quantity']
                            );
                            echo "<script>alert('เพิ่มลงเข่งเรียบร้อยแล้ว')</script>";
                            // print_r($_SESSION['cart']);
                        }
                    }
                    else
                    {
                        $_SESSION['cart'][0] = array(

                            'user_id' => $user_id,
                            'firstname' => $firstname,
                            'lastname' => $lastname,
                            'date' => $date,
                            'time' => $time,
                            'person' => $person,
                            'table' => $table,
                            'food_id' => $_POST['food_id'],
                            'food_name' => $_POST['food_name'],
                            'food_detail' => $_POST['food_detail'],
                            'food_img' => $_POST['food_img'],
                            'food_price' => $_POST['food_price'],
                            'food_quantity' => $_POST['food_quantity']
                        );
                    //     print_r($_SESSION['cart']);
                    // var_dump($_SESSION['cart']);
                    }
                }
            };
            



        ?>
        <footer>
            © copyright2022 Kheng Chinese Restaurant
        </footer>
    </body>
</html>
