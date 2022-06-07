@extends('layouts/main');

@section('content')
<style>
    img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
    }
    .kontak {
        display: flex;
        justify-content: center;
        margin-top: 50px;
        text-align: center;
    }
    li {
        list-style: none;
    }
    
</style>
<div class="kontak">
    <div class="container ">
        <div class="row">
        <div class="col mt-5 ">
            <img src="/assets/gw.jpeg" alt="">
            <h2>Christhofer Laurent</h2>
            <li><h7>christhoferljh12@gmail.com</h7></li>
            <li><h7>linkedin/ChristhoferLaurent</h7></li>
        </div>
        <div class="col mt-5">
            <img src="/assets/kevin.png" alt="">
            <h2>Kevin Adrian Manurung</h2>
            <li><h7>kevinadrian@student.telkomuniversity.ac.id</h7></li>
            <li><h7>linkedin/KevinAdrian</h7></li>
        </div>
    </div>
    <div class="row">
        <div class="col mt-5">
            <img src="/assets/imam.jpg" alt="">
            <h2>Imam Rasyidin Saputra</h2>
            <li><h7>imamrasyidin0@gmail.com</h7></li>
            <li><h7>linkedin/ImamRasyidin</h7></li>
        </div>
    </div>
    </div>
</div>

@endsection
