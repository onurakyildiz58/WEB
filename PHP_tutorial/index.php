<!DOCTYPE html>
<html>
<head>
    <title>PHP deneme</title>
    <style>
        *{
            background: #5fb4ee;
            text-align: start;
            color: #e7f4ff;
        }
        h1{
            text-align: center;
            font-size: 60px;
        }
    </style>
</head>
<body>
    <div>
        <h1>PHP DERSLERİ</h1>
    </div>


    <?php
    echo "hello", "<br>";
    $veri1 = "araba";
    $veri2 = 'okul';
    $veri3 = 70;
    $veri4 = 180;

    echo $veri1, "<br>";
    echo $veri2, "<br>";
    echo $veri3, "<br>";
    echo $veri4, "<br>";
    echo "<br>";

    $kisiler = array("ali", "veli", "ahmet", "mehmet", "cem", 41, 58, 52.4, 0x1A);
    print_r($kisiler);
    echo "<br>";
    var_dump($kisiler);
    echo "<br>";

    echo $isActive = true;
    echo "<br>";
    $tarih = new DateTime();
    echo $tarih->format('d-m-Y H:i:s');
    echo "<br>";
    echo "<br>";


    $veriler = array(
        "1" => "silvia S15",
        "2" => "GTR R34",
        "3" => "mazda RX7",
        "4" => "Focus RS"
    );
    print_r($veriler);
    echo "<br>";
    $verilerr = [
        "1" => "silvia S15",
        "2" => "GTR R34",
        "3" => "mazda RX7",
        "4" => "Focus RS"
    ];
    print_r($verilerr);
    echo "<br>";
    echo "<br>";

    class dersler
    {
        function dersAdi($veri)
        {
            echo $veri;
        }
    }
    $ders = new dersler();
    $ders->dersAdi("Proje B");
    echo "<br>";
    echo "<br>";

    echo $a = 10, "<br>";
    echo $b = $a + 2, "<br>";
    echo $c = $b - 4, "<br>";
    echo $d = $c * 5, "<br>";
    echo $e = $d / 4, "<br><br>";

    $urunAdi = "kahve";
    $urunFiyat = 25.99;
    $urunAdet = 2;
    $KDV = 18;
    $fiyat = $urunFiyat * $urunAdet;
    $tutar = $fiyat + $fiyat*($KDV/100);
    echo "$urunAdi KDV dahil $tutar TL'dir <br><br>";

    $Ad = "onur";
    $Soyad = "akyıldız";
    echo $Ad . $Soyad, "<br>";
    echo $Ad , $Soyad, "<br>";
    echo $Ad ," ", $Soyad, "<br><br>";

    echo "Merhaba dünya ben \"PHP\" sayfasıyım <br><br>";

    define("urun", "bilgisayar");
    define("fiyat", 10000);

    echo urun, "'ın tutarı ", fiyat , " TL'dir <br>";
    echo "tanımlanan ürünler <br>";
    echo defined('urun'), "<br>";// 1 döndürür
    echo defined('fiyat'), "<br>";// 1 döndürür
    if(defined('fiyat')){
        echo fiyat, "<br><br>";
    }

    $dizi = array('id'=>1, 'adi'=>NULL, 'soyadi');
    echo var_dump(isset($dizi)), "<br>";
    echo var_dump(isset($dizi['id'])), "<br>";
    echo var_dump(isset($dizi['adi'])), "<br>";
    echo var_dump(isset($dizi['soyadi'])), "<br><br>";

    echo __LINE__, "<br>";
    echo __FILE__, "<br>";
    echo __DIR__, "<br>";
    echo PHP_VERSION, "<br>";
    echo PHP_OS, "<br>";
    function topla($a, $b){
        echo __FUNCTION__, "<br>";
        return ($a + $b);
    }
    topla(3,1);

    class arabalar{
        function araba($marka){
            echo __METHOD__, "<br>";
            echo __CLASS__, "<br>";
            echo $marka, "<br><br>";
        }
    }
    $marka = new arabalar();
    $marka->araba("Ford Focus RS 2.3L AWD");

    echo $_SERVER['HTTP_USER_AGENT'], "<br>";//tarayıcı tipini verir
    echo $_SERVER['REMOTE_ADDR'], "<br>";//sunucuya erişen ziyaretçi
    echo $_SERVER['HTTP_REFERER'], "<br>";//gelinen sitenin bilgisini veriri
    echo $_SERVER['SERVER_ADDR'], "<br>";//sunucu IP adresini veriri
    echo $_SERVER['SCRIPT_FILENAME'], "<br>";//dosya adı elde edilir
    echo $_SERVER['SERVER_NAME'], "<br>";//sunucu adını verir
    echo $_SERVER['SERVER_PORT'], "<br>";//sunucu port adresini verir
    echo $_SERVER['REQUEST_URI'], "<br>";//URL deki sorgu parametresini verir
    echo $_SERVER['REQUEST_METHOD'], "<br><br>";//istek türünü belirtir GET/POST/PUT

    $value = 3;
    $result = ($value == 3) ? 'eşit' : 'eşit değil';
    echo $result, "<br>";

    $sayi = rand(0, 9);
    $sonuc = ($sayi < 5) ? '5\'ten küçük' : '5\'den büyük';
    echo $sonuc, "<br><br>";



    echo isset($_POST['deger']) ? 'tanımlı' : 'tanımlı değil', "<br>";
    $deger = 5;
    echo is_int($deger) ? 'tamsayı' : 'tamsayı değil', "<br>";
    $chr = '';
    echo empty($chr) ? 'boş' : 'boş değil', "<br>";
    $float = 41.58;
    echo is_float($float) ? 'float' : 'float değil', "<br>";
    //echo is_null($_POST['veri']) ? 'değer yok' : 'değer var', "<br>";
    echo is_numeric($deger) ? 'sayı' : 'sayı değil', "<br><br>";


    $num1 = 41;
    $num2 = 58;
    if($num1 > $num2)
    {
        echo $num1," ", $num2, " den büyüktür", "<br>";
    }
    else
    {
        echo $num2," ", $num1, " den büyüktür", "<br>";
    }

    $not = 85;

    if($not < 50)
    {
        echo "kaldın", "<br>";
    }
    elseif ($not >= 50 and $not <= 55)
    {
        echo "geçtin", "<br>";
    }
    elseif ($not > 55 and $not <= 70)
    {
        echo "orta", "<br>";
    }
    elseif ($not > 70 and $not <= 85)
    {
        echo "iyi", "<br>";
    }
    elseif ($not > 85 and $not <=100)
    {
        echo "çok iyi", "<br>";
    }
    else
    {
        echo "geçerli not giriniz", "<br>";
    }
    echo "<br>";

    $gun = 3;
    switch ($gun){
        case 1:
            echo "pazartesi";
            break;
        case 2:
            echo "salı";
            break;
        case 3:
            echo "çarşamba";
            break;
        case 4:
            echo "perşembe";
            break;
        case 5:
            echo "cuma";
            break;
        case 6:
            echo "cumartesi";
            break;
        case 7:
            echo "pazar";
            break;
        default:
            echo "tanımsız gün";
    }
    echo "<br><br>";

    for($sayac = 0;$sayac<21;$sayac++){
        if(($sayac%2) == 0){
           echo $sayac, "<br>";
        }
    }
    echo "<br>";
    ?>
<table style="border:4px solid #359116;width: 300px;padding: 2px">
    <?php
    for($satir = 0;$satir<5;$satir++)
    {
        ?>
        <tr style="border:2px solid #359116;padding: 2px">
            <?php
            for($sutun = 0;$sutun<2;$sutun++)
            {
                ?>
                <td style="border:2px solid #359116;padding: 2px;text-align: center">
                    <?php echo $satir, ". satır", $sutun, ". sutun", "<br>"?>
                </td>
            <?php
            }
            ?>
        </tr>
    <?php
    }
    echo "<br><br>";
    ?>
</table>
<?php
echo "<br>";
for($x=1;$x<=10;$x++)
{
    for($y=0;$y<$x;$y++)
    {
        echo "*";
    }
    echo "<br>";
}
echo "<br>";
?>



</body>
</html>
