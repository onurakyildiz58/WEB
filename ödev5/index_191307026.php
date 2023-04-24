<?php
session_start();
if($_SESSION["status"] == 1)
{
    echo "cookie : not:(10 sn sonra silinir veya çıkış yapınca silinir)";
    print_r($_COOKIE);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index_191307026</title>
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
        input[type=submit]{
            text-decoration: none;
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
        .table-con
        {
            border-collapse: collapse;
            margin: 25px 0px;
            min-width: 400px;
            font-size: .85em;
        }
        .table-con thead tr
        {
            color: #0d9882;
            text-align: left;
            font-weight: bold;
        }
        .table-con th,
        .table-con td{
            padding: 12px 15px;
        }
        .table-con tbody tr:last-of-type{
            border-bottom: 2px solid #0d9882;
        }
        table.center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
<h1>LAB Uygulaması - 5</h1>
<h1>191307026 Onur Akyıldız</h1>
<h1 style="padding-bottom: 150px">Ana sayfaya hoş geldiniz</h1>

<table class="table-con center">
    <thead>
        <tr>
            <th>ID</th>
            <th>İsim</th>
            <th>Email</th>
            <th>Şifre</th>
            <th>Kayıt Zamanı</th>
            <th>Durum</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $_SESSION["id"] ?></td>
            <td><?php echo $_SESSION["kullanici_adi"] ?></td>
            <td><?php echo $_SESSION["email"] ?></td>
            <td><?php echo $_SESSION["sifre"] ?></td>
            <td><?php echo $_SESSION["reg_date"] ?></td>
            <td><?php echo ($_SESSION["status"] == "1" ? "Aktif" : "Aktif Değil") ?></td>
            <td>
                <form action="logout_191307026.php" method="post">
                    <input type="submit" name="logout" value="Çıkış yap">
                </form>
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>

<?php
}
else
{
    echo "<script>alert('Oturum açmalısınız girişe yönlendiriliyorsunuz');</script>";
    echo "<script>window.location.href = 'login_191307026.php';</script>";
}
?>

