@extends('home.layouts.app')

@section('title', 'Thiên Ân Phát - Nơi biến ước mơ thành hiện thực.')
@section('description', 'Thiên Ân Phát tự hào là đơn vị chuyên nghiệp thi công lắp đặt nhôm Xingfa, kính cường lực, cửa nhựa, kính bếp... uy tín.')
@section('css')

<style>
    .mybox{
        display: inline-block;
        width: 28%;
    }
    .popup-btn {
        padding: 7px 19px;
        border-radius: 2px;
        background-color: #2196F3;
        font-size: 20px;
        border: 1px solid #2196F3;
        display: block;
        min-height: 64px;
        text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
        margin: 10px;
        color: white
    }
    .myimg{
        width: 100px;
        height: 100px;
        border-radius: 6px;
    }
    .swal2-container .swal2-popup{
        min-width: 825px ;
    }
    @media only screen and (max-width: 600px) {
        .popup-btn {
            font-size: 13px;
            min-height: 32px;
        }
        .swal2-container .swal2-popup{
            min-width: 100% ;
        }
        .mybox{
            width: 100%;
        }
        .myimg{
            width: 80px;
            height: 80px;
        }
    }
</style>
@endsection
@section('content')

@endsection

@section('js')
@endsection
