@extends('layouts.front')

@section('title', 'Bakiye Ekle')

@section('content')
    <style>
        span{
            font-family: 'Poppins', sans-serif;
            margin:0; padding:0;
            box-sizing: border-box;
            outline: none; border: none;
            text-decoration: none;
            text-transform: uppercase;
        }
        .containerr{
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-flow: column;
        }

        .containerr form{
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 10px 15px rgba(0,0,0,.1);
            padding: 20px;
            width: 600px;
            padding-top: 160px;
        }

        .containerr form .inputBox{
            margin-top: 20px;
        }

        .containerr form .inputBox span{
            display: block;
            color:#999;
            padding-bottom: 5px;
        }

        .containerr form .inputBox input,
        .containerr form .inputBox select{
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            border:1px solid rgba(0,0,0,.3);
            color:#444;
        }

        .containerr form .flexbox{
            display: flex;
            gap:15px;
        }

        .containerr form .flexbox .inputBox{
            flex:1 1 150px;
        }

        .containerr form .submit-btn{
            width: 100%;
            background:linear-gradient(45deg, blueviolet, deeppink);
            margin-top: 20px;
            padding: 10px;
            font-size: 20px;
            color:#fff;
            border-radius: 10px;
            cursor: pointer;
            transition: .2s linear;
        }

        .containerr form .submit-btn:hover{
            letter-spacing: 2px;
            opacity: .8;
        }

        .containerr .card-container{
            margin-bottom: -150px;
            position: relative;
            height: 250px;
            width: 400px;
        }

        .containerr .card-container .front{
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0; left: 0;
            background:linear-gradient(45deg, blueviolet, deeppink);
            border-radius: 5px;
            backface-visibility: hidden;
            box-shadow: 0 15px 25px rgba(0,0,0,.2);
            padding:20px;
            transform:perspective(1000px) rotateY(0deg);
            transition:transform .4s ease-out;
        }

        .containerr .card-container .front .image{
            display: flex;
            align-items:center;
            justify-content: space-between;
            padding-top: 10px;
        }

        .containerr .card-container .front .image img{
            height: 50px;
        }

        .containerr .card-container .front .card-number-box{
            padding:30px 0;
            font-size: 22px;
            color:#fff;
        }

        .containerr .card-container .front .flexbox{
            display: flex;
        }

        .containerr .card-container .front .flexbox .box:nth-child(1){
            margin-right: auto;
        }

        .containerr .card-container .front .flexbox .box{
            font-size: 15px;
            color:#fff;
        }

        .containerr .card-container .back{
            position: absolute;
            top:0; left: 0;
            height: 100%;
            width: 100%;
            background:linear-gradient(45deg, blueviolet, deeppink);
            border-radius: 5px;
            padding: 20px 0;
            text-align: right;
            backface-visibility: hidden;
            box-shadow: 0 15px 25px rgba(0,0,0,.2);
            transform:perspective(1000px) rotateY(180deg);
            transition:transform .4s ease-out;
        }

        .containerr .card-container .back .stripe{
            background: #000;
            width: 100%;
            margin: 10px 0;
            height: 50px;
        }

        .containerr .card-container .back .box{
            padding: 0 20px;
        }

        .containerr .card-container .back .box span{
            color:#fff;
            font-size: 15px;
        }

        .containerr .card-container .back .box .cvv-box{
            height: 50px;
            padding: 10px;
            margin-top: 5px;
            color:#333;
            background: #fff;
            border-radius: 5px;
            width: 100%;
        }

        .containerr .card-container .back .box img{
            margin-top: 30px;
            height: 30px;
        }
    </style>
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Robo Raven</a> / Para Ekle
            </h6>
        </div>
    </div>

    <div class="containerr">
        <div class="card-container">
            <div class="front">
                <div class="image">
                    <img src="{{ asset('assets/images/chip.png') }}" alt="">
                    <img src="{{ asset('assets/images/visa.png') }}"  alt="">
                </div>
                <div class="card-number-box">################</div>
                <div class="flexbox">
                    <div class="box">
                        <div class="card-holder-name">full name</div>
                    </div>
                    <div class="box">
                        <div class="expiration">
                            <span class="exp-month">Ay</span>
                            <span class="exp-year">/Yıl</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="back">
                <div class="stripe"></div>
                <div class="box">
                    <span>cvv</span>
                    <div class="cvv-box"></div>
                    <img src="{{ asset('assets/images/visa.png') }}"  alt="">
                </div>
            </div>

        </div>
        <form action="{{ url('save-money') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="inputBox">
                <span>Kart Numarası</span>
                <input type="text" maxlength="16" class="card-number-input">
            </div>
            <div class="inputBox">
                <span>Kart Üzerindeki Ad Soyad</span>
                <input type="text" class="card-holder-input">
            </div>
            <div class="flexbox">
                <div class="inputBox">
                    <span>Ay</span>
                    <select name="" id="" class="month-input">
                        <option value="month" selected disabled>Ay</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>Yıl</span>
                    <select name="" id="" class="year-input">
                        <option value="year" selected disabled>Yıl</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>ccv</span>
                    <input type="text" maxlength="4" class="cvv-input">
                </div>
                <div class="inputBox">
                    <span>Bakiye</span>
                    <input type="text" maxlength="4" class="cvv-input" name="money">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4 float-end">Bakiye Ekle</button>
        </form>

    </div>

@endsection

@section('scripts')
    <script>
        document.querySelector('.card-number-input').oninput = () =>{
            document.querySelector('.card-number-box').innerText = document.querySelector('.card-number-input').value;
        }
        document.querySelector('.card-holder-input').oninput = () =>{
            document.querySelector('.card-holder-name').innerText = document.querySelector('.card-holder-input').value;
        }
        document.querySelector('.month-input').oninput = () =>{
            document.querySelector('.exp-month').innerText = document.querySelector('.month-input').value;
        }
        document.querySelector('.year-input').oninput = () =>{
            document.querySelector('.exp-year').innerText = document.querySelector('.year-input').value;
        }
        document.querySelector('.cvv-input').onmouseenter = () =>{
            document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(-180deg)';
            document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(0deg)';
        }
        document.querySelector('.cvv-input').onmouseleave = () =>{
            document.querySelector('.front').style.transform = 'perspective(1000px) rotateY(0deg)';
            document.querySelector('.back').style.transform = 'perspective(1000px) rotateY(180deg)';
        }
        document.querySelector('.cvv-input').oninput = () =>{
            document.querySelector('.cvv-box').innerText = document.querySelector('.cvv-input').value;
        }
    </script>
@endsection
