<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- styles -->
    <link rel="stylesheet" href="register.css">
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

    <div class="container">



        <!-- Form สมัครสมาชิก -->
        <form style="width: 80%;" action="register.php" method="post">

            <div class="form-group">

                <div class="form-group" style="margin-right:2%;">
                    <label for="fname" style="margin-right:6%;">ชื่อจริง</label>
                    <input id='firstname' name='firstname' type="text" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="lname" style="margin-right:3%;">นามสกุล</label>
                    <input id='lastname' name='lastname' type="text" class="form-control" required>
                </div>
            </div>

            <br>

            <div class="form-group">
                <div class="form-group">
                    <label for="tel">เบอร์โทรศัพท์</label>
                    <input id='phone' name='phone' type="text" class="form-control" style="margin-right:4%;" required>
                </div>

                <div class="form-group" style="font-family: 'Poppins', sans-serif;">
                    <label for="email" style="margin-right:4%;">Email</label>
                    <input id='email' name='email' type="text" class="form-control" required>
                </div>
            </div>

            <br>

            <div class="form-group" style="font-family: 'Poppins', sans-serif;">
                <div class="form-group" style="margin-right:2%;">
                    <label for="uname" style="margin-right:1%;">Username</label>
                    <input id='username' name='username' type="text" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id='pass' name='pass' type="password" class="form-control" pattern=".{8,}" required title="8 characters minimum" required>
                </div>
            </div>

            <center>
                <button class='signin' type="submit" name="submit">สมัครสมาชิก</button>
                <!-- onclick="location.href='login.php'" -->
            </center>
        </form>


        <?php

            include('config.php');
            
            session_start();
          

            if(isset($_POST['submit'])) {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $pass = $_POST['pass'];

                $check_duplicate_username = "SELECT username FROM users WHERE username = '$username' ";

                $result = mysqli_query($conn, $check_duplicate_username);
                $count = mysqli_num_rows($result);

                if ($count > 0) {
                    echo "<script>alert('username มีคนใช้แล้ว กรุณาใส่ username อื่น')</script>";
                    return false;
                }
                else {
                    $query = "INSERT INTO users(firstname, lastname, phone, email, username, pass) VALUES('".$firstname."', '".$lastname."', '".$phone."', '".$email."', '".$username."', '".$pass."')";
                    // echo $query;
                    $result = mysqli_query($conn, $query);
                    

                    if ($result) { 
                        echo "<script>alert('สมัครสมาชิกเรียบร้อยแล้ว')";

                        header("location: login.php");
                    } else {
                        echo "<script>alert('เกิดข้อผิดพลาด กรุณาลองสมัครใหม่อีกครั้ง')</script>";
                    }
            }
        }

        ?>

    </div>

    <footer>
        © copyright2022 Kheng Chinese Restaurant
    </footer>

</body>

</html>
