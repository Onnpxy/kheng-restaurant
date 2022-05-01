<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="showbooking.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>แสดงข้อมูลการจอง</title>
</head> 
<body>
    <div class="logo1">
        <img src="img/kheng.png" alt="logo" height="120vh" class="center">
    </div>
    <div class="container" id="text">
        <h3><b>รายละเอียดการจอง</b></h3>
    </div>
    <div class="container-fluid" id="column">
        <div class="row">

            <?php
                error_reporting(0);
                session_start();
                include('config.php');
                if (!isset($_SESSION['user'])) {
                    header("location: login.php");
                }
                $user_id = $_SESSION['user'];


                $firstname = $_SESSION['firstname'];
                $lastname = $_SESSION['lastname'];
                $date = $_SESSION['date'];
                $time = $_SESSION['time'];
                $person = $_SESSION['person'];
                $table = $_SESSION['table'];

                    
            ?>     

                            
            <div class='col-xs-3' style='margin-left: 29%;'>
                <img src='img/date.png' height='30vh' style='margin-bottom: 1%;'>
                <b style='color: #733907;padding-left: 3%;'><?php echo $date ?></b>
            </div>

            <div class='col-xs-3' style='margin-left: -15%;'>
                <img src='img/clock.png' height='30vh' style='margin-bottom: 1%;'>
                <b style='color: #733907;padding-left: 3%;'><?php echo $time ?><span style='font-family: 'IBM Plex Sans Thai', sans-serif; color: black;'> น.</span></b>
            </div>

        <div class='col-xs-2' style='margin-left: -16%;'>
            <img src='img/people.png' height='30vh' style='margin-bottom: 1%;'>
            <b style='color: #733907;padding-left: 7%;'><?php echo $person ?></b>
        </div>

        <div class='col-xs-2' style='margin-left: -10%;'>
            <img src='img/table.png' height='32vh' style='margin-bottom: 1%;'>
            <b style='color: #733907;padding-left: 7%;'><?php echo $table ?></b>
        </div>
                            

        <div class="col-xs-2" style="margin-left: -10%;">
            <img src="img/name.png" alt="" height="30vh" style="margin-bottom: 1%;">
            <b style="color: #733907;padding-left: 5%;font-family: 'IBM Plex Sans Thai', sans-serif;"><?php echo $firstname ?> <?php echo $lastname ?></b>
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

                        if (isset($_SESSION['cart'])) {
                                
                            foreach($_SESSION['cart'] as $key => $value)
                            {
                                echo "
                                    <tr>
                                        <td>$value[food_name]</td>
                                        <td>$value[food_quantity]</td>
                                        <td>$value[food_price]</td>
                                        <td>บาท</td>
                                    </tr>
                                
                                
                                ";
                            }
                        }


                    ?>


                  </table>
                  <p style="text-align: center;padding-top: 3%;font-size: 75%;color: #733907;"><b>รายการอาหารทั้งหมด <?php echo $total; ?> บาท</b></p>
            </div>
    </div>
    <div class="container" style="margin-bottom: 4%;">
        <div class="row">
            <div class="col-xs-4">
                <button type="button" id="fix" class="btn btn-lg btn1"><b style="color: #F4ECE1;font-size: 90%;" onclick="location.href='foodlist.php'">เพิ่มรายการอาหาร</b></button>
            </div>
            <div class="col-xs-4">
                <button type="button" id="fix" class="btn btn-lg btn1"><b style="color: #F4ECE1;font-size: 90%;" onclick="location.href='edit.php'">แก้ไขรายการอาหาร</b></button>
            </div>
            <div class="col-xs-4">
                <button type="button" id="confirm" class="btn btn-lg btn2"><b style="color: #F4ECE1;font-size: 90%;" onclick="location.href='confirm.php'">ยืนยันการจองโต๊ะและอาหาร</b></button>
            </div>
            <center><a href="logout.php">ออกจากระบบ</a></center>
        </div>
    </div>
</body>
<footer>
        © copyright2022 Kheng Chinese Restaurant
    </footer>
</html>
