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
    input[type=number] {
        width: 80%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        align-items: center;
    }
    .center {
        margin: auto;
        width: 50%;
        font-size: 18px;
    }
    .karşılaştır {
        padding:10px 20px;
        background:#ccc;
        border:0 none;
        cursor:pointer;
        -webkit-border-radius: 5px;
        border-radius: 5px;
        margin: 10px;
        transition-duration: 0.4s;
    }
    .karşılaştır:hover{
        background: #23de43;
        color: azure;
    }
</style>
<h1>LAB Uygulaması - 2</h1>
<h1>191307026 Onur Akyıldız</h1>
<?php
echo "<h2>soru-1</h2>";
?>
<table style="border:2px solid #359116;">
    <?php
    $num = 0;
    for($satir = 0;$satir<10;$satir++)
    {
        ?>
        <tr>
            <?php
            for($sutun = 0;$sutun<10;$sutun++)
            {
                $num++;
                ?>
                <td style="border:1px solid #359116;text-align: center">
                    <?php echo $num, "<br>";?>
                </td>
            <?php
            }
            ?>
        </tr>
    <?php
    }
    echo "<br>";
    ?>
</table>


<?php
echo "<br>";
echo "<h2>soru-2</h2>";
?>
<table style="border:2px solid #359116;">
    <?php
    $num = 1;
    for($satir = 0;$satir<10;$satir++)
    {
        ?>
        <tr style="border:2px solid #359116;padding: 2px">
            <?php
            for($sutun = 0;$sutun<10;$sutun++)
            {
                $num++;
                if($num%2 == 0)
                {
                ?>
                    <td style="border:2px solid #359116;padding: 2px;text-align: center">
                        <?php echo $num, "<br>";?>
                    </td>
                <?php
                }
            }
            ?>
        </tr>
        <?php
    }
    echo "<br>";
    ?>
</table>

<?php
echo "<br>";
echo "<h2>soru-3</h2>";
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
                $num--;
                if($num%2 == 1)
                {
                    ?>
                    <td style="border:2px solid #359116;padding: 2px;text-align: center">
                        <?php echo $num, "<br>";?>
                    </td>
                    <?php
                }
            }
            ?>
        </tr>
        <?php
    }
    echo "<br>";
    ?>
</table>

<?php
echo "<br>";
echo "<h2>soru-4</h2>";


$list = array
(
    array
    (
        '0' => array
        (
            '0'=>array
            (
                '0'=>"1",
                '1'=>"2"
            ),
            '1'=>array
            (
                '0'=>"3",
                '1'=>"4"
            )
        ),
        '1' => array
        (
            '0'=>array
            (
                '0'=>"5",
                '1'=>"6"
            ),
            '1'=>array
            (
                '0'=>"7",
                '1'=>"8"
            )
        )
    )
);
foreach ($list as $item){
    print_r($item);
}
echo "<br>";
?>

<?php
echo "<br>";
echo "<h2>soru-5</h2>";
$list2 = array(
    array(
        'Python' => array(
            'first_release'=>'1991',
            'latest_release'=>'3.8.0',
            'designed_by'=>'GVR',
            'description'=>array(
                'extention'=>'.py',
                'typing_discipline'=>'dynamic',
                'license'=>'PSFL'
            )
        ),
        'PHP' => array(
            'first_release'=>'1995',
            'latest_release'=>'7.0.11',
            'designed_by'=>'RL',
            'description'=>array(
                'extention'=>'.php',
                'typing_discipline'=>'dynamic',
                'license'=>'PHP ZEL'
            )
        )
    )
);
foreach ($list2 as $item){
    print_r($item);
}
?>

<?php
echo "<br>";
echo "<h2>soru-6</h2>";


$liste =
    array(
        '0'=>array("Ad"=>"Elif",   "Soy Ad"=>"Dursun", "Doğum Yeri"=>"Çanakkale", "Yaş"=>23),
        '1'=>array("Ad"=>"Murat",  "Soy Ad"=>"Güner",  "Doğum Yeri"=>"Kocaeli",   "Yaş"=>21),
        '2'=>array("Ad"=>"Kasım",  "Soy Ad"=>"Emir",   "Doğum Yeri"=>"İstanbul",  "Yaş"=>33),
        '3'=>array("Ad"=>"Metin",  "Soy Ad"=>"Güzel",  "Doğum Yeri"=>"İzmir",     "Yaş"=>34),
        '4'=>array("Ad"=>"Hakan",  "Soy Ad"=>"Öner",   "Doğum Yeri"=>"Eskişehir", "Yaş"=>14),
        '5'=>array("Ad"=>"Kenan",  "Soy Ad"=>"Güzel",  "Doğum Yeri"=>"Ankara",    "Yaş"=>25),
        '6'=>array("Ad"=>"Hasan",  "Soy Ad"=>"Yiğit",  "Doğum Yeri"=>"Adana",     "Yaş"=>28),
        '7'=>array("Ad"=>"Burak",  "Soy Ad"=>"Kırıcı", "Doğum Yeri"=>"Sakarya",   "Yaş"=>27),
        '8'=>array("Ad"=>"Bekir",  "Soy Ad"=>"Ören",   "Doğum Yeri"=>"Muğla",     "Yaş"=>28),
        '9'=>array("Ad"=>"Emre",   "Soy Ad"=>"Akçay",  "Doğum Yeri"=>"Tekirdağ",  "Yaş"=>43),
        '10'=>array("Ad"=>"Cansu", "Soy Ad"=>"Kara",   "Doğum Yeri"=>"Aydın",     "Yaş"=>20)
    );

echo "<table border=1><tr><th>kişi İD</th>";
foreach($liste as $kisiler) {
    foreach ($kisiler as $key => $val)
        echo "<th>" . $key . "</th>";
    break;
}
foreach($liste as $key => $values)
{
    echo "<tr><td >".$key."</td>";
    foreach($values as $v) {
        echo "<td>".$v."</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>

<?php
echo "<br>";
echo "<h2>soru-7</h2>";


$rand = range(0, 10);
shuffle($rand );
print_r($rand);
echo "<br>";
foreach ($rand as $key => $val){
    print_r($val);
}

?>

<?php
echo "<br>";
echo "<h2>soru-8</h2>";
$aranan = "Elma nasıl yenir";
$cumle=
    array(
        '0'=>"Dalga havuzunda güvenle sörf yapmak",
        '1'=>"Kahvaltıda en iyi yiyecekler",
        '2'=>"Elma nasıl yenir",
        '3'=>"Haftasonu gezintisi için 25 ipucu",
        '4'=>"Tatiller için en iyi yumurtalı menemen tarifi",
        '5'=>"stiller diziler",
        '6'=>"İşletmede PHP",
        '7'=>"Elma nasıl yenir"
    );
echo "karıştırdıktan önceki hali: ", "<br>";
foreach ($cumle as $key => $val){
    print_r($key);
    echo "  ";
    print_r($val);
    echo "<br>";
}
echo "<br>";
shuffle($cumle);
echo "karıştırdıktan sonraki hali: ", "<br>";
foreach ($cumle as $key => $val){
    print_r($key);
    echo "  ";
    print_r($val);
    echo "<br>";
}
echo "<br>";
$key = array_search($aranan, $cumle);
echo $aranan, " kelimesinin bulunduğu indis : ", $key;
?>

<?php
echo "<br>";
echo "<h2>soru-9</h2>";
$aylar = array(
       '1'=>"Ocak",
       '2'=>"Şubat",
       '3'=>"Mart",
       '4'=>"Nisan",
       '5'=>"Mayıs",
       '6'=>"Haziran",
       '7'=>"Temmuz",
       '8'=>"Ağustos",
       '9'=>"Eylül",
       '10'=>"Ekim",
       '11'=>"Kasım",
       '12'=>"Aralık"
);
$randAy = range(1, 12);
shuffle($randAy );
$randAy = array_slice($randAy ,0,1);
print_r($randAy);
foreach ($randAy as $keu => $val){
    $index = $val;
}
echo "<br>";
echo $aylar[$index];
?>

<?php
echo "<br>";
echo "<h2>soru-10</h2>";
if(isset($_GET['karşılaştır']))
{
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $num3 = $_GET['num3'];
    $nums = array();

    array_unshift($nums, $num1, $num2, $num3);
    if(is_numeric($num2) and is_numeric($num1) and is_numeric($num3))
    {
        if ($num1 == $num2 and $num2 == $num3 and $num3 == $num1){
           echo $num1. " = ". $num2. " = ". $num3;
        }
        else{
            $buyuk = max($nums);
            $kucuk = min($nums);
            $b = array_search($buyuk, $nums);
            $k = array_search($kucuk, $nums);
            unset($nums[$k]);
            unset($nums[$b]);
            foreach ($nums as $key =>$val)
                $left = $val;
            echo "<br><br><br>";
            echo $buyuk .">". $left .">".$kucuk;
        }
    }
    else
    {
        echo "sayılar girilmemiş ya da yanlış girilmiştir!!!";
    }
    $num1 = "";
    $num2 = "";
    $num3 = "";
}
?>

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
    <div class="center">
        <label for="num1" style="padding-right:10px">Birinci sayı</label>
        <input type="number" name="num1" id="num1" value="<?= $num1 ?>">
    </div>
    <div class="center">
        <label for="num2" style="padding-right:18px ">İkinci sayı</label>
        <input type="number" name="num2" id="num2" value="<?= $num2 ?>">
    </div>
    <div class="center">
        <label for="num3" style="padding-right:0px">Üçüncü sayı</label>
        <input type="number" name="num3" id="num3" value="<?= $num3 ?>">
    </div>
    <div class="center">
        <input type="submit" value="karşılaştır" name="karşılaştır" class="karşılaştır">
    </div>
</form>
