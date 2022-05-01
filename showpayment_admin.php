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
    <link rel="stylesheet" href="showpayment_admin.css">
    <title>แสดงหลักฐานการชำระเงินสำหรับพนักงาน</title>
</head>

<body>
    <div class="logo1">
        <img src="img/kheng.png" alt="logo" height="120vh" class="center">
    </div>
    <h3><b>หลักฐานการชำระเงิน</b></h3>

    <form class="select" method="post">

        <label class="thai1"><b style="font-size: large;">วันที่</b></label>
        <input type="date" id="day" name="date" min="2022-05-01" max="2023-12-31" required>


        <label for="time" class="thai1"><b style="font-size: large;">เวลาที่จอง</b></label>
        <select style="font-family: 'IBM Plex Sans Thai', sans-serif;font-size: larger;" name='time'>
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
                <col span="1" style="width: 40%;">
                <col span="1" style="width: 55%;">
                <col span="1" style="width: 5%;">
            </colgroup>
            <?php
                include('config.php');
                session_start();
                if (!isset($_SESSION['welcome'])) {
                    header('location: login.php');
                }

                
                    
                if ($_SERVER['REQUEST_METHOD'] == "POST") {

                    if (isset($_POST['search'])) {


                        $date = $_POST['date'];
                        $time = $_POST['time'];

                        
                        $select = mysqli_query($conn, "SELECT * FROM payment WHERE book_date = '".$date."' AND book_time = '".$time."'");

                        if(mysqli_num_rows($select) > 0 ){
                            while($result = mysqli_fetch_assoc($select)) {
                
                ?>
                <tr>
                    <td><?=$result['firstname']?></td>
                    <td><?=$result['lastname']?></td>
                    <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ดูสลิป</button></td>
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                    
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">หลักฐานการชำระเงิน</h4>
                        </div>

                        <div class="modal-body">
                            <p>วันที่ชำระเงิน <?=$result['slip_date']?></p>
                            <p>เวลาที่ชำระเงิน <?=$result['slip_time']?></p>
                            <p>จำนวนเงินที่ชำระ <?=$result['slip_price']?> บาท</p>
                            <p><img src="<?=$result['file']?>" width='450px' height='400px'></p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    
                    </div>
                </div>
                


            <?php
                        }
                    }
                    else
                    {
                        echo "ยังไม่มีการจอง";
                    }
                }
            }
            ?>
 
          </table>

    </div>


    <div class="container">
        <button type="button" id="back" class="btn btn-lg btn2">
            <img src="img/Arrow.png" alt="" width="18%" style="margin-left: -10%;margin-right: 5%;">
            <b style="color: #F4ECE1;font-size: 95%;" onclick="location.href='showtable_admin.php'">กลับสู่หน้าแสดงโต๊ะ</b></button>
    </div>



</body>

<footer>
        © copyright2022 Kheng Chinese Restaurant
</footer>

</html>
