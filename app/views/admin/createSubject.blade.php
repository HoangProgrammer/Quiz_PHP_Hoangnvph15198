@extends('layouts.main')
@section('title', 'Thêm Sản phẩm')    
@section('content')

<form action="{{URL}}mon-hoc/luu-tao-moi" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tên Môn học</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mô tả</label>
    <textarea class="form-control" name="description" id="" cols="30" rows="10">
  </textarea>
    <input type="hidden" name="author_id" value="{{$_SESSION['user']}}" class="form-control" id="exampleInputPassword1">
  </div>
  @if(isset( $_SESSION['error']))
  <div class='alert alert-danger'>{{$_SESSION['error'] }}</div> 
  @unset( $_SESSION['error']) 
  @endif
 
  <button type="submit" class="btn btn-primary">Thêm</button>
</form>

@endsection
@section('page-script')
<script></script>
@endsection
