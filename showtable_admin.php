<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="showtable_admin.css">
    <title>แสดงหมายเลขโต๊ะสำหรับพนักงาน</title>
</head>

<body>
    <div class="logo1">
        <img src="img/kheng.png" alt="logo" height="120vh" class="center">
    </div>

    <h3><b>แสดงหมายเลขโต๊ะ</b></h3>
    <form class="select" method="POST">
        <label for="date" class="thai1"><b style="font-size: large;">วันที่</b></label>
        <input type="date" id="day" name="date" min="2022-05-01" max="2023-12-31" required>


        <label for="time" class="thai1"><b style="font-size: large;">เวลาที่จอง</b></label>

        <select style="font-family: 'IBM Plex Sans Thai', sans-serif;font-size: larger;" name="time">
            <option selected disabled="disabled" style="font-family: 'IBM Plex Sans Thai', sans-serif;" required>เลือกเวลา</option>
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

        <label for="time" class="thai2"><b style="font-size: large;">น.</b></label>
        <button class="button1" style="font-size: larger;" name='search'><b>ค้นหา</b></button>
    </form>


    <hr class="hr">
    <div class="box">
        <table style="width: 100%;color: #733907;font-size: 75%;margin-top: -4%;">
            <colgroup>
                <col span="1" style="width: 80%;">
                <col span="1" style="width: 20%;">
            </colgroup>

            <?php
                include('config.php');

                if ($_SERVER['REQUEST_METHOD'] == "POST") {

                    if (isset($_POST['search'])) {


                        $date = $_POST['date'];
                        $time = $_POST['time'];


                        $select = mysqli_query($conn, "SELECT * FROM confirm WHERE date = '$date' AND time = '$time' GROUP BY 'firstname'");

                        if (mysqli_num_rows($select) > 0 ) {

                            while($row = $select->fetch_assoc()) {

                                echo "
                                    <tr>
                                        <td id='tdname'>".$row['firstname']."</td>
                                        <td id='tdname'>".$row['lastname']."</td>
                                        <td id='tdtable'>โต๊ะที่ ".$row['tablee']."</td>
                                    </tr>
                                ";

                            }
                            } else {
                            echo "ยังไม่มีการจอง";
                            }
                
                }
            }

            ?>

          </table>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <button type="button" id="return" class="btn btn-lg btn1">
                    <img src="img/Arrow.png" alt="" width="15%" style="margin-left: -10%;margin-right: 5%;">

                    <b style="color: #F4ECE1;font-size: 90%;" onclick="location.href='showfood_admin.php'">ไปหน้าแสดงรายการอาหาร</b></button>
            </div>
            <div class="col-xs-6">
                <button type="button" id="message" class="btn btn-lg btn2">
                    <b style="color: #F4ECE1;font-size: 90%;" onclick="location.href='showpayment_admin.php'">ไปหน้าแสดงหลักฐานการชำระเงิน</b>
                    
                    <img src="img/Arrow.png" alt="" width="15%" style="margin-left: 3%;transform: rotate(180deg);">
                </button>
            </div>

        </div>

    </div>
    <div class="logout1">
        <a href="logout.php">ออกจากระบบ</a>
    </div>
</body>

<footer>
        © copyright2022 Kheng Chinese Restaurant
</footer>

</html>
