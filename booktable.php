<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('location: login.php');
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จองโต๊ะ</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- styles -->
    <link rel="stylesheet" href="booktable.css">
    <!-- icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- TH font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&display=swap" rel="stylesheet">
    <!-- EN font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- cdn ของตัว slick slider -->
    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.2/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.2/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
    <div id="logo">
        <center>
            <img src="img/kheng.png" width="34.7%">
        </center>
    </div>

    <form method="post">
        <div class="row">
            <div class="col-7 position-relative">
                <!-- arrow -->
                <div class="position-absolute" style="top: 300px; left: 9%;"><i onclick="arrow(-1)" class="material-icons">arrow_back_ios</i></div>
                <div class="position-absolute" style="top: 300px; right: 9%;"><i onclick="arrow(1)" class="material-icons">arrow_forward_ios</i></div>
                <!-- arrow -->
                <div class="container" id="promotepic1">
                    <img src="img/promote1.png">
                </div>
                <div class="container" id="promotepic2">
                    <img src="img/promote2.png">
                </div>
                <div class="container" id="promotepic3">
                    <img src="img/promote3.png">
                </div>
            </div>

            <div class="col-5" style="margin: 3.5% 0 0 0">
                <p class="heading" style="margin-left: -27%">กรุณาเลือกวันที่ เวลา จำนวนที่นั่ง และโต๊ะ</p>

                <label>วันที่</label>
                <input type="date" id="booking_date" name="date" min="2022-05-01" max="2023-12-31" style="width:60%">

                <br>

                <label>เวลาที่จอง</label>
                <select id="booking_time" name="time">
                    <option value="11:00">11:00</option>
                    <option value="12:00">12:00</option>
                    <option value="13:00">13:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                    <option value="17:00">17:00</option>
                    <option value="18:00">18:00</option>
                    <option value="19:00">19:00</option>
                    <option value="20:00">20:00</option>
                </select>
                <label>น.</label>

                <br>

                <label>จำนวนที่นั่ง</label>
                <input id='num' name='person' type="text" style="width:20%; margin-right:5%">

                <label>โต๊ะที่</label>
                <input id='tablee' name='tablee' type="text" style="width:20%">

                <p style="font-size:1.2em">** หากเลือกไปแล้วจะไม่สามารถกลับมาแก้ไขได้อีก</p>

                <a href="logout.php">ออกจากระบบ</a>
                <button class="nextpage" type="submit" name="submit">หน้าต่อไป ></button>
            </div>
        </div>

    </form>

    <footer>
        © copyright2022 Kheng Chinese Restaurant
    </footer>

    <?php
        include('config.php');


        $user_id = $_SESSION['user'];
        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];

        // error_reporting(0);

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            if (isset($_POST['submit'])) {
                $_SESSION['date'] = $_POST['date'];
                $_SESSION['time'] = $_POST['time'];
                $_SESSION['person'] = $_POST['person'];
                $_SESSION['table'] = $_POST['tablee'];

                if ( (empty($_SESSION['date'])) || (empty($_SESSION['time'])) || (empty($_SESSION['person'])) || (empty($_SESSION['date'])) )
                {
                    echo "<script>alert('กรุณากรอกข้อมูลให้ครบ')</script>";
                }
                else
                {
                    echo "<script>alert('เลือกวันที่ เวลา โต๊ะ เรียบร้อยแล้ว')</script>";
                    echo "<script>window.location.href='foodlist.php';</script>";
                }

                
        
            }
        }

    ?>
    <script>
        var tab = 0;

        function arrow(num) {
            tab += num;
            if (tab == -1) {
                tab = 2;
            }
            if (tab == 3) {
                tab = 0;
            }
            if (tab == 0) {
                promote1()
            } else if (tab == 1) {
                promote2()
            } else if (tab == 2) {
                promote3()
            } else {
                tab = 0;
            }
        }

        function promote1() {
            $("#promotepic1").fadeIn(300);
            $("#promotepic2").hide();
            $("#promotepic3").hide();
        }
        promote1()

        function promote2() {
            $("#promotepic1").hide();
            $("#promotepic2").fadeIn(300);
            $("#promotepic3").hide();
        }

        function promote3() {
            $("#promotepic1").hide();
            $("#promotepic2").hide();
            $("#promotepic3").fadeIn(300);
        }
    </script>

</body>

</html>
