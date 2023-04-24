<?php
if(isset($_POST['gonder']))
{
    $name = $_POST['isim'];
    $pass = $_POST['sifre'];
    $passCon = $_POST['sifreconfirm'];
    $email = $_POST['email'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "odev5_191307026";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Bağlantı Başarısız: " . $conn->connect_error);
    }
    echo "Bağlantı Başarılı" , "<br>";

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS $db_name";
    if (mysqli_query($conn, $sql)) {
        echo "Veri Tabanı Başarılı Şekilde Oluşturuldu", "<br>";
    } else {
        echo "Veri Tabanı Oluşturulamadı: " . $conn->error , "<br>";
    }

    // use database
    if (!mysqli_select_db($conn, $db_name)) {
        die("Veritabanı seçim hatası: " . mysqli_error($conn));
    }

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS Users191307026 (
            id INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            kullanici_adi VARCHAR(20) NOT NULL UNIQUE,
            sifre VARCHAR(20) NOT NULL,
            email VARCHAR(50) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";


    if ($conn->query($sql) === TRUE) {
        echo "Users191307026 tablosu başarılıyla oluşturuldu", "<br>";
    } else {
        echo "Users191307026 tablosu oluşturma başarısız : ". $conn->error, "<br>";
    }


    if ($name != "" and $pass != "" and $passCon != "" and $email != "")
    {
        if ($pass == $passCon)
        {
            $sql = "SELECT kullanici_adi FROM users191307026 WHERE kullanici_adi='$name'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    echo "<h1>$name  Kullanıcı adında bi kayıt vardır farklı kullanıcı adı yazınız</h1>";
                    echo "<script>alert('$name  Kullanıcı adında bi kayıt vardır farklı kullanıcı adı yazınız kayıta yönlendiriliyorsunuz');</script>";
                    echo "<script>window.location.href = 'register_191307026.php';</script>";
                }
            }
            else
            {
                $sql = "INSERT INTO users191307026 (kullanici_adi, sifre, email)
                    VALUES ('$name', '$pass', '$email')";

                if ($conn->query($sql) === TRUE)
                {
                    echo "<script>alert('Kayıt Başarılı Bi Şekilde Oluşturulmuştur girişe yönlendiriliyorsunuz');</script>";
                    echo "<script>window.location.href = 'login_191307026.php';</script>";
                }
                else
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        else
        {
            echo "<script>alert('Şifreler Uyuşmuyor kayıta yönlendiriliyorsunuz');</script>";
            echo "<script>window.location.href = 'register_191307026.php';</script>";

        }
    }
    else
    {
        echo "<script>alert('Kutular Boş Kalamaz kayıta yönlendiriliyorsunuz');</script>";
        echo "<script>window.location.href = 'register_191307026.php';</script>";
    }

    $name = "";
    $pass = "";
    $phone = "";

    $conn->close();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register_191307026</title>
    <style>
        *{
            font-family: sans-serif;
            font-size: 16px;
            padding: 2px;
            background: #dfffff;
        }
        h1{
            font-size: 25px;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }
        input[type=text], input[type=password], input[type=email] {
            width: 400px;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        .login
        {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>
<body>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <h1>LAB Uygulaması - 5</h1>
    <h1>191307026 Onur Akyıldız</h1>
    <div class="center">
        <label for="isim" style="margin-left: 10px">İsim:</label>
        <input type="text" id="isim" name="isim" placeholder="İsiminizi girin...">
    </div>
    <div class="center">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Email adresinizi girin...">
    </div>
    <div class="center">
        <label for="sifre" style="margin-left: 6px">Şifre:</label>
        <input type="password" id="sifre" name="sifre" placeholder="Şifrenizi girin...">
    </div>
    <div class="center">
        <label for="sifre" style="margin-left: 6px">Şifre:</label>
        <input type="password" id="sifreconfirm" name="sifreconfirm" placeholder="Şifrenizi girin...">
    </div>

    <div class="center">
        <input type="submit" value="Kayıt Ol" name="gonder" class="gonder">
        <a href="login_191307026.php" name="register" class="login">Giriş Yap</a>
        <input type="checkbox" onclick="showPassword()">Şifreyi Göster<br>
    </div>
</form>
</body>
<script>
    function showPassword() {
        var x = document.getElementById("sifre");
        var y = document.getElementById("sifreconfirm");
        if (x.type === "password") {
            x.type = "text";
            y.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
        }
    }
</script>
</html>
