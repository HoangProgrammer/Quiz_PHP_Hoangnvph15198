 

@foreach ($subject as $val)
@php
 $name=   $val->name;
 $description=   $val->description;
 $id_sub=  $val->id;
@endphp
@endforeach
@extends('layouts.main')
@section('title', 'Chi Tiết môn học')    
@section('content')
<main>
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">{{$name}}</h1>
        <p class="lead text-muted">{{ $description}}</p>
        <p>
       
          <a href="{{URL}}mon-hoc/quizs/tao-moi/{{$id_sub}}" class="btn btn-primary my-2"> <i class="fa fa-add"></i> Thêm Quiz</a>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        
    @foreach ($Quiz as $val )
        <div class="col">
          <div class="card shadow-sm">
            <div class="card-body">
              <h4 class="card-text">{{ucfirst($val->name)}}</h4>
              <p class="card-text"> Bắt Đầu : {{$val->start_time}}</p>
              <p class="card-text"> Kết Thúc :  {{$val->end_time}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                 <a class="btn text-primary" href="{{URL}}mon-hoc/quizs/chi-tiet-quizs/{{$val->id}}"><i class="fa fa-eye"></i>  Xem</a> 
                <a class="btn text-warning" href="{{URL}}mon-hoc/quizs/cap-nhat/{{$val->id}}/sub/{{$id_sub}}"><i  class="fa fa-edit"></i> Sửa</a> 
                <a class="btn text-danger" onclick="return confirm('bạn có muốn xóa không !')" href="{{URL}}mon-hoc/quizs/xoa/{{$val->id}}/sub/{{$id_sub}}"><i class="far fa-trash-alt"></i> xóa</a> 
                </div>
                <small class="text-muted">{{$val->minutes}} phút</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach 
  
      </div>
    </div>
  </div>

</main>
@endsection
@section('page-script')
<script>
  
</script>
@endsection
