<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "VT191307026";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Bağlantı Başarısız: " . $conn->connect_error);
}
echo "Bağlantı Başarılı" , "<br>";

// use database
if (!mysqli_select_db($conn, $dbname)) {
    die("Veritabanı seçim hatası: " . mysqli_error($conn));
}

if(isset($_POST['login'])){
    $name = $_POST['isim'];
    $pass = $_POST['sifre'];
}
if($name != "" and $pass != "")
{
    $sql = "SELECT kullanici_adi, sifre FROM users191307026 WHERE kullanici_adi='$name' AND sifre='$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "<h1>Hoş geldiniz, " . $row['kullanici_adi'] . "!</h1>";
        }
    } else {
        echo "<h1>Hatalı Giriş!!!</h1>";
    }
}

$name = "";
$pass = "";

$conn->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login_191307026</title>
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
        <input type="submit" value="Giriş Yap" name="login" class="login">
        <input type="checkbox" onclick="showPassword()">Şifreyi Göster<br><br>
    </div>
</form>
<script>
    function showPassword() {
        var x = document.getElementById("sifre");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
</body>
</html>
