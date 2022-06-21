@extends('layouts.homepage')
@section('title', 'Chi Tiết chủ Đề')    
@section('content')
<div class="container-fluid">
<a href="{{URL}}">{{$subject->name}}</a> >> <a href="xem-chu-de/{{ $_GET['id_sub'] }}">Quizs</a>
</div>

<h3 style="margin-top:30px ; margin-left: 10px;" class="justify-content-start text-secondary">Bài Tập</h3>
<div class="list-group list-group-flush border-bottom">
  @foreach ($quiz as $value)
      <a href="{{URL}}chu-de/chi-tiet-chu-de/chi-tiet-quiz/{{$value->id}}/sub/{{$_GET['id_sub']}}" class="list-group-item list-group-item-action  py-3 lh-tight" aria-current="true">
        <div class=" d-flex w-100 align-items-center justify-content-start">
        <i class="font_i text-warning fas fa-puzzle-piece"></i>
          <strong class="mb-1">{{$value->name}}</strong> 
        </div>
      </a>
   
   @endforeach
    </div>
    @endsection
    @section('page-script')
    <script></script>
    @endsection