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
    input[type=text]{
        width: 40%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        align-items: center;
    }
    input[type=email]{
        width: 40%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        align-items: center;
    }
</style>
<h1>LAB Uygulaması - 2</h1>
<h1>191307026 Onur Akyıldız</h1>
<?php
echo "------------------------------Soru-1------------------------------","<br><br>";
$date1=date_create("2021-12-31");
$date2=date_create("2022-04-18");
$diff=date_diff($date1,$date2);
echo $diff->format("%a Gün");
echo "<br><br>";
?>

<?php
echo "------------------------------Soru-2------------------------------","<br><br>";
echo date("Y-m-d H:i:s");
echo "<br><br>";
?>

<?php
echo "------------------------------Soru-3------------------------------","<br><br>";
function yazdir($sayi)
{
    if($sayi%2 == 1)
    {
        return $sayi;

    }
    else if($sayi%2 == 0)
    {
        return yazdir($sayi-1);
    }
}
?>
<table style="border:2px solid #359116;">
    <?php
    $num = 100;
    for($satir = 0;$satir<10;$satir++)
    {
        ?>
        <tr style="border:2px solid #359116;padding: 2px">
            <?php
                for($sutun = 0;$sutun<10;$sutun++)
                {
                    $x = yazdir($num);
                    if($x%2 == 1)
                    {
                        ?>
                        <td style="border:2px solid #359116;padding: 2px;text-align: center">
                            <?php
                                echo $x;
                                $num--;
                            ?>
                        </td>
                        <?php
                    }
                }
            ?>
        </tr>
    <?php
    }
?>
</table>

<?php
echo "<br>";
echo "------------------------------Soru-4------------------------------","<br><br>";
$num = 14;
function fib($num)
{
    if($num == 0)
    {
        return 0;

    }else if( $num == 1)
    {
        return 1;
    }
    else
    {
        return (fib($num-1) + fib($num-2));
    }
}
for ($i = 0; $i < $num; $i++)
{
    echo fib($i), " ";
}
echo "<br><br>";
?>

<?php
echo "------------------------------Soru-5------------------------------","<br><br>";
function heat($val1, $val2)
{
    if($val1 > $val2)
    {
        $val_back = 'Büyük Değer:'.$val1.' Küçük Değer:'.$val2;
    }
    else
    {
        $val_back = 'Büyük Değer:'.$val2.' Küçük Değer:'.$val1;
    }
    return $val_back;
}

echo heat(45, 26);
echo "<br><br>";
?>

<?php
echo "------------------------------Soru-6------------------------------","<br><br>";
function Hesapla($islem, $deger1, $deger2)
{
    switch ($islem)
    {
        case 0:
            echo $deger1 + $deger2 , "<br>";
            break;
        case 1:
            echo abs($deger1 - $deger2) , "<br>";
            break;
        case 2:
            echo $deger1 * $deger2 , "<br>";
            break;
        case 3:
            if($deger2 != 0)
            {
                echo $deger1 / $deger2 , "<br>";
            }
            else
            {
                echo "0'a bölme hatası var işlem gerçekleşmez!!!" , "<br>";

            }
            break;
    }
}

Hesapla(0,5,7);
Hesapla(1,5,7);
Hesapla(2,5,7);
Hesapla(3,5,0);
echo "<br><br>";
?>

<?php
echo "------------------------------Soru-7------------------------------","<br><br>";


if(isset($_GET['submit'])){
    $name = $_GET['name'];
    $surname = $_GET['surname'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    $birthday = $_GET['birthday'];
    $color = $_GET['color'];

    $_SESSION['user_info'][] = array(
        'name' => $name,
        'surname' => $surname,
        'email' => $email,
        'phone' => $phone,
        'birthday' => $birthday,
        'color' => $color
    );
}

?>
<form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label style="margin-right: 26px">İsim:</label>
    <input type="text" name="name" required><br>

    <label>Soyisim:</label>
    <input type="text" name="surname" required><br>

    <label style="margin-right: 15px">Email:</label>
    <input type="email" name="email" required><br>

    <label style="margin-right: 5px">Telefon:</label>
    <input type="text" name="phone" required><br>

    <label>Doğum Günü:</label>
    <input type="date" name="birthday" required><br><br>

    <label>Favori Renk:</label>
    <input type="color" name="color" required><br><br>

    <input type="submit" name="submit" value="Submit">
</form>
<?php if(isset($_SESSION['user_info'])): ?>
    <table border="1" class="center">
        <tr>
            <th>İsim</th>
            <th>Soyisim</th>
            <th>Email</th>
            <th>Telefom</th>
            <th>Doğum Günü</th>
            <th>Favori Renk</th>
        </tr>
        <?php foreach($_SESSION['user_info'] as $user): ?>
            <tr>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['surname']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['phone']; ?></td>
                <td><?php echo $user['birthday']; ?></td>
                <td style="background-color:<?php echo $user['color']; ?>"><?php echo $user['color']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif;
echo "<br><br>"?>
</body>
</html>

<?php
echo "------------------------------Soru-8------------------------------","<br><br>";
function soru8($dizi, $len)
{
    sort($dizi);
    print_r($dizi);
    echo "<br>";
    $low = $dizi[0];
    $high = $dizi[$len-1];
    $fark = $high - $low;
    echo "En büyük : ",$high, "<br>";
    echo "En küçük : ", $low, "<br>";
    echo "Aradaki fark : ",$fark,  "<br>";

}

$dizi = array(14, 9, 5, 19, 10, 16, 1, 17, 13, 7);
$len = count($dizi);
soru8($dizi, $len);
echo "<br><br>";
?>

