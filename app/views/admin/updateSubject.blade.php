
@extends('layouts.main')
@section('title', 'Cập Nhật môn học')    
@section('content')
<form action="{{URL}}mon-hoc/luu-cap-nhat/{{$_GET['id']}}" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tên Môn học</label>
    <input type="text" name="name" value="{{ $subject->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mô tả</label>
  <textarea class="form-control" name="description" id="" cols="30" rows="10">
  {{$subject->description}}
  </textarea>
    <input type="hidden" name="id" value="{{ $subject->id}}" class="form-control" id="exampleInputPassword1">
  </div>
  
  @if(isset( $_SESSION['error']))
  <div class='alert alert-danger'>{{$_SESSION['error']}}  </div>; 
  @unset( $_SESSION['error'])  
  @endif
  <button type="submit" class="btn btn-primary">Sửa</button>
</form>

@endsection
@section('page-script')
<script></script>
@endsection
