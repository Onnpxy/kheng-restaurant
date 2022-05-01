<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ชำระเงิน</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- styles -->
    <link rel="stylesheet" href="payment.css">
    <!-- TH font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&display=swap" rel="stylesheet">
    <!-- EN font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- cdn ของตัว slick slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
</head>

<body>
    <div id="logo">
        <center>
            <img src="img/kheng.png" width="34.7%">
        </center>
    </div>


        <div class="container">
            <div class="row" width="100%">
                <div class="col">
                    <img src="img/qrcode.png" style="margin-top: 10%;border-radius: 10%;">
                </div>
                <div class="col">
                    <div class="heading">
                        <p>การชำระเงิน</p>
                    </div>

                    <?php
                        error_reporting(0);
                        session_start();
                        include('config.php');
                        
                        if (!isset($_SESSION['user'])) {
                            header('location: login.php');
                        }

                        $total = $_SESSION['total'];
                    ?>
                        <div class="total">
                            <label style="margin-bottom:1.25em">ราคารวม</label>
                            <label><?php echo $total; ?></label>
                            <label>บาท</label>
                        </div>

                        <!-- <br> -->
                        <form method="post" enctype="multipart/form-data" action="">
                            <label style="margin:0 0 1.5em 2em">หลักฐานการโอน</label>

                            <input type="file" id="file" name="file" required accept="image/jpeg, image/png, image/jpg">

                            <br>


                            <label>วันที่</label>
                            <input type="date" id="slip_date" name="date" min="2022-05-01" max="2022-06-30" required>

                            <br>

                            <label>เวลาที่โอน</label>
                            <input id='int' type="time" name='time' style="width:54%" required>

                            <br>

                            <label>จำนวนเงิน</label>
                            <input id='bath' name='price' type="text" required>
                            <label>บาท</label>

                            <br>

                            <div class="row">
                                <div class="col">
                                    <button class="confirmSlip" type="submit" name="upload" value="upload">ยืนยันการชำระเงิน</button>
                                </div>
                                <div class="col">
                                    <a href="logout.php">ออกจากระบบ</a>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>


    <!-- <footer>
        © copyright2022 Kheng Chinese Restaurant
    </footer> -->

    <script>
        // slide
        $('.slider').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            speed: 700,
            prevArrow: $('.slick-prev'),
            nextArrow: $('.slick-next'),
        });
    </script>

    <?php

        $user_id = $_SESSION['user'];
        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];
        $book_date = $_SESSION['date'];
        $book_time = $_SESSION['time'];

        if (isset($_POST['upload'])) {

            $filename = $_FILES["file"]["name"];
            $tempname = $_FILES["file"]["tmp_name"];    
            $folder = "uploads/".$filename;
            $slip_date = $_POST['date'];
            $slip_time = $_POST['time'];
            $slip_price = $_POST['price'];
                  
          
            $sql = "INSERT INTO payment (user_id,file,slip_date,slip_time,slip_price,firstname,lastname,book_date,book_time) 
            VALUES ('".$user_id."', '$folder', '".$slip_date."', '".$slip_time."', '".$slip_price."', '".$firstname."', '".$lastname."', '".$book_date."', '".$book_time."')";
          
                
            mysqli_query($conn, $sql);
                  
            if (move_uploaded_file($tempname, $folder))  {
                echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว')</script>";
            }else{
                echo "<script>alert('ข้อมูลผิดพลาด กรุณาลองใหม่อีกครั้ง')</script>";
            }


        };

    ?>
    
    <?php
        // $query_img = "SELECT * FROM image";
        // $query_run = mysqli_query($conn, $query_img);

        // if ($query_run) {
        //     while ($row = mysqli_fetch_array($query_run))
        //     $image = $row['filename'];
        //     {
        ?>
            <!-- <tr>
                <td>
                    <img src=" " width="600" height="450">
                </td>
            </tr> -->
        <?php
        //     }
        // }
    ?>

<footer>
        © copyright2022 Kheng Chinese Restaurant
    </footer>
</body>

</html>
