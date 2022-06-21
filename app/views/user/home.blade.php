
@extends('layouts.homepage')
@section('title', 'trang chủ FPT-POLY')    
@section('content')

<h3 style="margin-top:30px ; margin-left: 10px;" class="justify-content-start text-secondary">CHUYÊN MỤC</h3>
<div class="list-group list-group-flush border-bottom scrollarea">
  @foreach ($data as $value)
      <a href="{{URL}}chu-de/chi-tiet-chu-de/{{$value->id}}" class="list-group-item list-group-item-action  py-3 lh-tight" aria-current="true">
        <div class=" d-flex w-100 align-items-center justify-content-start">
        <i class="font_i text-dark fas fa-folder-open"></i>
          <strong class="mb-1">{{$value->name}}</strong> 
        </div>
        <!-- <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div> -->
      </a>
   
  @endforeach
    </div>

    @endsection
@section('page-script')
<script></script>
@endsection