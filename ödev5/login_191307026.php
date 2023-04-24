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
        input[type=password], input[type=email], input[type=text] {
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
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<form action="login_info_191307026.php" method="post">
    <h1>LAB Uygulaması - 5</h1>
    <h1>191307026 Onur Akyıldız</h1>
    <div class="center">
        <label for="isim" >Email:</label>
        <input type="email" id="email" name="email" placeholder="Mail adresinizi girin...">
    </div>
    <div class="center">
        <label for="sifre" style="margin-left: 8px">Şifre:</label>
        <input type="password" id="sifre" name="sifre" placeholder="Şifrenizi girin...">
    </div>
    <div class="center">
        <input type="submit" value="Giriş Yap" name="login" class="login" style="margin-right:28px;">
        <a href="register_191307026.php" class="login">Kayıt Ol</a><br>
        <input type="checkbox" onclick="showPassword()" >Şifreyi Göster
        <input type="checkbox" name="hatirla" style="margin-left:20px;" value="1">Beni Hatırla<br><br>
    </div>
</form>
</body>
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
</html>