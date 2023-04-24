<?php
$cookie_name = 'emailcookie';

$emailDB = '';
$sifreDB = '';
if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $pass = $_POST['sifre'];
    $check = $_POST['hatirla'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "odev5_191307026";

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

    if($email != "" and $pass != "")
    {
        $sql = "SELECT * FROM users191307026 WHERE email='$email' AND sifre='$pass'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
        {
            session_start();
            while($row = $result->fetch_assoc())
            {
                if($row['sifre'] == $pass)
                {
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["kullanici_adi"] = $row["kullanici_adi"];
                    $_SESSION["sifre"] = $row["sifre"];
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["reg_date"] = $row["reg_date"];
                    $_SESSION["status"] = 1;

                    if($check == 1)
                    {
                        $arr = array('mail'=>$row["email"], 'pass'=>$row["sifre"]);
                        $arr = json_encode($arr);
                        setcookie($cookie_name, $arr, time()+60*60);
                    }
                    else
                    {
                        setcookie($cookie_name, '', time()+60*60);
                    }

                }
                echo "<script>alert('Giriş başarılı anasayfaya yönlendiriliyorsunuz');</script>";
                echo "<script>window.location.href = 'index_191307026.php';</script>";
            }
        }
        else
        {
            echo "<script>alert('Hatalı Giriş girişe yönlendiriliyorsunuz');</script>";
            echo "<script>window.location.href = 'login_191307026.php';</script>";
        }
    }
    else
    {
        echo "<script>alert('Kutular Boş Kalamaz girişe yönlendiriliyorsunuz');</script>";
        echo "<script>window.location.href = 'login_191307026.php';</script>";
    }

    $email = "";
    $pass = "";

    $conn->close();
}
if(isset($_COOKIE[$cookie_name]))
{
    session_start();
    $i=0;
    $arr = json_decode($_COOKIE[$cookie_name]);
    foreach ($arr as $x => $x_value)
    {
        if($i == 0)
        {
            if($_SESSION["email"] == $x_value)
            {
                $i++;
            }
        }
        if($i == 1)
        {
            if($_SESSION["sifre"] == $x_value)
            {
                echo "<script>alert('Çerez ile giriş başarılı anasayfaya yönlendiriliyorsunuz');</script>";
                echo "<script>window.location.href = 'index_191307026.php';</script>";
                $i++;
            }
        }
    }
}
