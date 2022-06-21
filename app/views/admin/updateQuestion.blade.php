@extends('layouts.main')
@section('title', 'Cập Nhật Câu Hỏi')
@section('content')

<a title="quay lại" href="{{ URL }}mon-hoc/quizs/chi-tiet-quizs/{{ $_GET['id_quiz'] }}" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
<br>
<br>
<form action="{{ URL }}mon-hoc/questions/luu-cap-nhat/{{ $_GET['id_qs'] }}/quiz/{{$_GET['id_quiz']}}" method="post" enctype="multipart/form-data">

 @if(isset($_SESSION['successFully'])) 
 <div class='alert alert-success'>{{  $_SESSION['successFully'] }}  </div>
  unset($_SESSION['successFully'])   
  @endif

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tên Câu hỏi</label>
    <input type="text" name="name" class="form-control" value="{{$model->name}}">
  </div>

  @php
  $i=0;
  @endphp
  @foreach($Answer as $val)
  <br>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Câu {{$i+=1}}</label>
    <input type="text" name="content[]" class="form-control" value="{{$val->content}}">
    <input type="hidden" name="answer[]" class="form-control" value="{{$val->id}}">
  </div>
  <select name="is_correct[]">
    <option value="0" @if($val->is_correct==0) {{"selected"}} @endif >sai</option>
    <option value="1" @if($val->is_correct==1){{"selected" }} @endif >đúng</option>
  </select>
  <br>
  @endforeach


  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">ảnh</label>
    <input type="file" name="img_question" class="form-control">
    <img width="200px" src="{{ URL }}public/img/{{$model->img}}" alt="không có ảnh">


    @if(!empty($model->img))
    <a class="text-danger" title="xóa ảnh" href="{{URL}}mon-hoc/questions/luu-cap-nhat/{{$model->id}}/{{$_GET['id_quiz']}}"><i class="fas fa-backspace"></i></a>

    @endif
  </div>


  @if(isset($_SESSION['error']))
  <div class='alert alert-danger'>{{$_SESSION['error'] }} </div>
  @unset($_SESSION['error'])
  @endif

  @if(isset($_SESSION['success']))
  <div class='alert alert-success'>{{$_SESSION['success'] }} </div>
  @unset($_SESSION['success'])
  @endif
  <button type="submit" name="btn_question" class="btn btn-primary">Sửa</button>
</form>
@endsection
@section('page-script')
<script></script>
@endsection