<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <!-- styles -->
    <link rel="stylesheet" href="login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <!-- TH font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai&display=swap" rel="stylesheet">
    <!-- EN font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <div id="logo">
        <center>
            <img src="img/kheng.png" width="35%">
        </center>
    </div>

    <div class="container" style="font-family: 'Poppins', sans-serif;">



        <form style="width: 70%" action="login.php" method="post">

            <div class="form-group">
                <div class="form-group" style="margin-right:2%;">
                    <label for="uname">Username</label>
                    <input id='uname' type="text" class="form-control" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id='password' type="password" class="form-control" name="pass" required>
                </div>





            </div>

            <center>
                <div class="button">
                    <button class="signin" onclick="location.href='register.php'" type="button">สมัครสมาชิก</button>

                    <button class="login" type="submit" name="login_user">เข้าสู่ระบบ</button>
                </div>
                <a href="#" onClick="alert('Contact us : 0123456789')">ลืมรหัสผ่าน</a>
            </center>
        </form>
        <?php 

            include('config.php');
            session_start();



            if (isset($_POST['login_user'])) {



                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $pass = mysqli_real_escape_string($conn, ($_POST['pass']));



                $select = mysqli_query($conn, "SELECT * FROM users WHERE username = '".$username."' AND pass = '".$pass."'");
                
                if (mysqli_num_rows($select) > 0) {
                    // $row = mysqli_fetch_assoc($select);


                    while ($row = mysqli_fetch_assoc($select))
                    {

                        if($row['user_type'] == 'welcome')
                        {
                            $_SESSION['welcome'] = $row['username'];
                            echo "<script>alert('You have successfully login')</script>";
                            header('location: showtable_admin.php');
                        }
                        else if ($row['user_type'] == 'kitchen')
                        {
                            $_SESSION['kitchen'] = $row['username'];
                            echo "<script>alert('You have successfully login')</script>";
                            header('location: showfood_admin.php');
                        }

                        else if ($row['user_type'] == 'user')
                        {
                            $_SESSION['user'] = trim($row['id']);


                            /////////////////////////////////////////
                            $_SESSION['firstname'] = $row['firstname'];
                            $_SESSION['lastname'] = $row['lastname'];
                            ////////////////////////////////////////

                            echo "<script>alert('เข้าสู่ระบบเรียบร้อยแล้ว'); window.location.href='booktable.php';</script>";

                        }
                    }
                }
                else
                {
                    echo "<script>alert('username หรือ password ผิด กรุณาลองใหม่อีกครั้ง')</script>";
                }

            ;}    
            

        
        ?>
    </div>

    <footer>
        © copyright2022 Kheng Chinese Restaurant
    </footer>
</body>

</html>
