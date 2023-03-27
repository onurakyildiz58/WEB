
<?php
if(isset($_GET['islem']))
{
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $islem = $_GET['islem'];

    if(is_numeric($num2) and is_numeric($num1) )
    {
        switch ($islem)
        {
            case 'topla':
                $result = $num1 + $num2;
                break;
            case 'çıkar':
                $result = $num1 - $num2;
                break;
            case 'böl':
                if($num2 != 0)
                {
                    $result = $num1 / $num2;
                }
                else
                {
                    echo "0'a bölme hatası var işlem gerçekleşmez!!!";
                }
                break;
            case 'çarp':
                $result = $num1 * $num2;
                break;
            case 'üs':
                $result = $num1 ** $num2;
                break;
            case 'sıfırla':
                $num1 = "";
                $num2 = "";
                $result = "";
                break;
        }
    }
    else
    {
        echo "sayılar girilmemiş ya da yanlış girilmiştir!!!";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hesap Makinesi</title>
    <!-- kaynakça
    https://www.w3schools.com/css/tryit.asp?filename=trycss_form_padding
    https://www.w3schools.com/css/css_align.asp
    https://www.w3schools.com/css/tryit.asp?filename=trycss_align_text
    https://www.w3schools.com/css/css_form.asp
    https://www.w3schools.com/css/css3_buttons.asp
    https://www.youtube.com/watch?v=AexbvX_2sOA
    -->
    <style>
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
    .islem {
        padding:10px 20px;
        background:#ccc;
        border:0 none;
        cursor:pointer;
        -webkit-border-radius: 5px;
        border-radius: 5px;
        margin: 10px;
        transition-duration: 0.4s;
    }
    .islem:hover{
        background: #23de43;
        color: azure;
    }
    </style>
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
        <h1 style="text-align: center">PHP HESAP MAKİNESİ</h1>
        <div class="center">
            <label for="num1">Birinci sayı</label>
            <input type="number" name="num1" id="num1" value="<?= $num1 ?>">
        </div>
        <div class="center">
            <label for="num2" style="padding-right:8px ">İkinci sayı</label>
            <input type="number" name="num2" id="num2" value="<?= $num2 ?>">
        </div>
        <div class="center">
            <label for="result" style="padding-right:38px ">Sonuç</label>
            <input type="number" id="result" value="<?= $result ?>" disabled>
        </div>
        <div class="center">
            <input type="submit" value="topla"   name="islem" class="islem">
            <input type="submit" value="çıkar"   name="islem" class="islem">
            <input type="submit" value="böl"     name="islem" class="islem">
            <input type="submit" value="çarp"    name="islem" class="islem">
            <input type="submit" value="üs"      name="islem" class="islem">
            <input type="submit" value="sıfırla" name="islem" class="islem">
        </div>
    </form>
</body>
</html>
