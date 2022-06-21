@extends('layouts.homepage')
@section('title', 'Chi Tiết Điểm ')    
@section('content')


<div class="container-fluid">
<a href="homepage">{{$subject->name}}</a> >> <a href="xem-chu-de/{{$_GET['id_subject'] }}">Quizs</a> >> <a href="" class="text-primary"></a>
</div>

<div class="alert alert-light">
    <h4>Kết quả kiểm tra của {{strtoupper($user->name) }} </h4>
</div>


@if ($result->score < 5) 
    <div class="alert alert-danger"> <i class="fas fa-frown text-danger"></i> bạn đã vượt không vượt qua bài kiểm tra. Điểm kết quả của bạn là: "chưa đạt"</div>

@else
    <div class="alert alert-success"> <i class="fas fa-laugh-squint  text-success"></i> Xin chúc mừng, bạn đã vượt qua bài kiểm tra. Điểm kết quả của bạn là: "đạt"</div>
@endif
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <td>ngày</td>
            <td>Những câu trả lời </td>
            <td>đạt điểm</td>
            <td>phần trăm làm được</td>
        </tr>
    </thead>
    <tbody>


        <tr>
             <td>{{$result->time}}</td>
            <td>{{ $result->sum }} trong 10 </td> 
             <td>{{$result->score }}</td> 
            <td>{{$tong = ($result->score / 10) * 100 }}%</td>
            <td><a href="{{URL }}chu-de/chi-tiet-ket-qua/{{ $result->quiz_id }}" class="text-primary">Hiện chi tiết</a></td>
        </tr>

    </tbody>
</table>

@endsection
@section('page-script')
<script></script>
@endsection