<?php
session_start();

if(isset($_POST['logout']) and $_SESSION["status"] == 1)
{
    session_destroy();
    setcookie('pass', '', time()+60*60);
    echo "<script>alert('oturum kapatılmıştır girişe yönlendiriliyorsunuz');</script>";
    echo "<script>window.location.href = 'login_191307026.php';</script>";
}
else
{
    echo "<script>alert('oturum açmayı deneyiniz girişe yönlendiriliyorsunuz');</script>";
    echo "<script>window.location.href = 'login_191307026.php';</script>";
}