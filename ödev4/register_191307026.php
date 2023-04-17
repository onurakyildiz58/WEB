<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "VT191307026";

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
    telefon VARCHAR(11)
)";


if ($conn->query($sql) === TRUE) {
    echo "Users191307026 tablosu başarılıyla oluşturuldu", "<br>";
} else {
    echo "Users191307026 tablosu oluşturma başarısız : ". $conn->error, "<br>";
}


if(isset($_POST['gonder']))
{
    $name = $_POST['isim'];
    $pass = $_POST['sifre'];
    $phone = $_POST['telefon'];
}
if($name != "" and $pass != "" and $phone != "")
{
    $sql = "SELECT kullanici_adi FROM users191307026 WHERE kullanici_adi='$name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<h1>$name  Kullanıcı adında bi kayıt vardır farklı kullanıcı adı yazınız</h1>";
        }
    }
    else
    {
        $sql = "INSERT INTO users191307026 (kullanici_adi, sifre, telefon)
        VALUES ('$name', '$pass', '$phone')";

        if ($conn->query($sql) === TRUE)
        {
            echo "Kayıt Başarılı Bi Şekilde Oluşturulmuştur", "<br>";
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

}
else
{
    echo "<h1>Lütfen Kullanıcı Bilgilerini Doldurunuz</h1>";
}

$name = "";
$pass = "";
$phone = "";

$conn->close();
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
        input[type=text], input[type=password], input[type=tel] {
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
    </style>
</head>
<body>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <h1>LAB Uygulaması - 4</h1>
    <h1>191307026 Onur Akyıldız</h1>
    <div class="center">
        <label for="isim" style="margin-left: 22px">İsim:</label>
        <input type="text" id="isim" name="isim" placeholder="İsiminizi girin...">
    </div>
    <div class="center">
        <label for="sifre" style="margin-left: 18px">Şifre:</label>
        <input type="password" id="sifre" name="sifre" placeholder="Şifrenizi girin...">
    </div>
    <div class="center">
        <label for="telefon">Telefon:</label>
        <input type="tel" id="telefon" name="telefon" placeholder="Telefon numaranızı girin...">
    </div>
    <div class="center">
        <input type="submit" value="Kayıt Ol" name="gonder" class="gonder">
    </div>
</form>
</body>
</html>

