<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="confirm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>ยืนยันการจองโต๊ะและอาหาร</title>
</head> 
<body>  
    <div class="logo1">
        <img src="img/kheng.png" alt="logo" height="120vh" class="center">
    </div>
    <div class="container" id="text">
        <h3><b>ยืนยันการจองโต๊ะและอาหาร</b></h3>
    </div>
    <div class="container-fluid" id="column">
        <div class="row">

            <form method="post">
    
                <?php
                        session_start();
                        include('config.php');
                        if (!isset($_SESSION['user'])) {
                            header("location: login.php");
                        }
                        error_reporting(0);
        

                        $firstname = $_SESSION['firstname'];
                        $lastname = $_SESSION['lastname'];
                        $date = $_SESSION['date'];
                        $time = $_SESSION['time'];
                        $person = $_SESSION['person'];
                        $table = $_SESSION['table'];
         

                ?>

                    <div class="col-xs-3" style="margin-left: 29%;">
                        <img src="img/date.png" alt="" height="30vh" style="margin-bottom: 1%;">
                        <b style="color: #733907;padding-left: 3%;" name="date"><?php echo $date ?></b>

                        <input type="hidden" name="date" value="$date">
                    </div>

                    <div class="col-xs-3" style="margin-left: -15%;">
                        <img src="img/clock.png" alt="" height="30vh" style="margin-bottom: 1%;">
                        <b style="color: #733907;padding-left: 3%;" name="time"><?php echo $time ?><span style="font-family: 'IBM Plex Sans Thai', sans-serif; color: black;"> น.</span></b>

                        <input type="hidden" name="time" value="$time">
                    </div>

                    <div class="col-xs-2" style="margin-left: -16%;">
                        <img src="img/people.png" alt="" height="30vh" style="margin-bottom: 1%;">
                        <b style="color: #733907;padding-left: 7%;" name="person"><?php echo $person ?></b>

                        <input type="hidden" name="person" value="$person">
                    </div>

                    <div class="col-xs-2" style="margin-left: -10%;">
                        <img src="img/table.png" alt="" height="32vh" style="margin-bottom: 1%;">
                        <b style="color: #733907;padding-left: 7%;" name="table"><?php echo $table ?></b>

                        <input type="hidden" name="table" value="$table">
                    </div>

                    <div class="col-xs-2" style="margin-left: -10%;">
                        <img src="img/name.png" alt="" height="30vh" style="margin-bottom: 1%;">
                        <b style="color: #733907;padding-left: 5%;font-family: 'IBM Plex Sans Thai', sans-serif;"><?php echo $firstname ?> <?php echo $lastname ?></b>

                        <?php
                            echo "
                                <input type='hidden' name='firstname' value='$firstname'>
                                <input type='hidden' name='lastname'  value='$lastname'>
                            ";
                        ?>
                    </div>

  



                    </div>
                </div>
                <div class="container" style="margin-top: 2%;">
                    <div>
                        <b style="color: #733907;font-family: 'IBM Plex Sans Thai', sans-serif;font-size: 2vh;font-weight: 700;">รายการอาหาร</b>
                    </div>
                        <div id="rcorners1" style="margin-top: 3%;">
                            <table style="width: 150%;color: #733907;font-size: 75%;margin-left: -26%;">
                                <colgroup>
                                    <col span="1" style="width: 70%;">
                                    <col span="1" style="width: 15%;">
                                    <col span="1" style="width: 15%;">
                                    <col span="1" style="width: 10%;">
                                </colgroup>
                                
                                <?php

                                    $total = $_SESSION['total'];
                                    $user_id = $_SESSION['user'];
                                    if (isset($_SESSION['cart'])) {
                                
                                        foreach($_SESSION['cart'] as $key => $value)
                                        {
                                            echo"
                                            <tr>
            
                                                <input type='hidden' name='food_id[]' value='$value[food_id]'>
                                                <td name='food_name[]'>$value[food_name]</td>
                                                <td name='food_quantity[]'>$value[food_quantity]</td>
                                                <td name='food_price[]'>$value[food_price]</td>
                                                <td>บาท</td>

                                            </tr>
                                            ";
                                            echo"
                                                <input type='hidden' name='user_id' value='$user_id'>
                                                <input type='hidden' name='food_name[]' value='$value[food_name]'>
                                                <input type='hidden' name='food_quantity[]' value='$value[food_quantity]'>
                                                <input type='hidden' name='food_price[]' value='$value[food_price]'>
                                            
                                            ";
                                        }
                                    }
                                ?>


                            </table>
                            <p style="text-align: center;padding-top: 3%;font-size: 75%;color: #733907;"><b>รายการอาหารทั้งหมด <?php echo $total; ?> บาท</b></p>
                            

                        </div>
                </div>
                <div class="container" style="margin-bottom: 4%;">
                    <button type="submit" id="confirm" class="btn btn-lg btn2" name="confirm" ><b style="color: #F4ECE1;font-size: 90%;">ยืนยันการจองโต๊ะและอาหาร</b></button>
                </div>

                <div class="container" style="margin-bottom: 4%;">
                    <a href="logout.php">ออกจากระบบ</a>
                </div>

<footer>
        © copyright2022 Kheng Chinese Restaurant
</footer>
            </form>
    <?php
        
        // echo "<pre>";
        // print_r($_POST);

        if (isset($_POST['confirm'])){

            $user_id = $_SESSION['user'];
            
            $food_id = $_POST['food_id'];
            $food_name = $_POST['food_name'];
            $food_quantity = $_POST['food_quantity'];
            $food_price = $_POST['food_price'];
            
            // echo "<script>window.location.href='payment.php';</script>";


        }

        $list = count($_POST['food_id']);
        
        $confirm = "INSERT INTO confirm(date, time, person, tablee, food_id, user_id, food_name, food_quantity, food_price, firstname, lastname)
        VALUES ";

        // create loop for input fields
        
        for($i=0 ; $i<$list; $i++ ) {

            $confirm .= "('".$date."','".$time."','".$person."','".$table."','".$food_id[$i]."',
            '".$user_id."','".$food_name[$i]."','".$food_quantity[$i]."','".$food_price[$i]."', '".$firstname."', '".$lastname."'),";
        }



        if ($conn->query(substr($confirm, 0, strlen($confirm) - 1) . ";") === TRUE) {
            echo "<script>alert('ยืนยันการจองเรียบร้อยแล้ว'); window.location.href='payment.php';</script>";
            // header("location: payment.php");
        } else {
            // echo "Error: " . $confirm . "<br>" . $conn->error;
            echo "<script>alert('การจองผิดพลาด กรุณาลองใหม่อีกครั้ง'); window.location.href='payment.php';</script>";
        }

    ?>

</body>
</html>
