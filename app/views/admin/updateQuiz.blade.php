@extends('layouts.main')
@section('title', 'Sửa Quiz')    
@section('content')
<a title="quay lại" href="{{URL}}mon-hoc/chi-tiet/{{$_GET['id_sub']}}" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>


<form action="{{URL}}mon-hoc/quizs/luu-cap-nhat/{{$model->id}}/sub/{{$_GET['id_sub']}}" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tên Quiz</label>
    <input type="text" name="name" class="form-control" value="{{$model->name}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Thời Gian Bắt Đầu</label>
    <input type="datetime-local" id="time_start"  name="start_time"  class="form-control" value="{{$model->start_time}}">
    <br>
    <input type="text" name="startDefault"   value="{{$model->start_time}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" id="time_end"  class="form-label">Thời Gian kết thúc</label>
    <input type="datetime-local" name="end_time"  class="form-control" value="{{$model->end_time}}">
    <br>
    <input type="text" name="endDefault"  value="{{$model->end_time}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Thời lượng phút</label>
    <input type="text" name="minutes"  class="form-control" value="{{$model->minutes}}">
    <input type="hidden" name="id_subject" value="{{$model->id}}"  class="form-control">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Trạng thái </label>
<select name="status" id="">
  <option @if($model->status==0){{'selected'}} @endif value="0">Mở</option>
  <option @if($model->status==1){{'selected'}} @endif  value="1">Khóa</option>
</select>
  </div>
  @if(isset( $_SESSION['error']))
  <div class='alert alert-danger'>{{$_SESSION['error']}} </div>
   @unset( $_SESSION['error']) 
   @endif 
  <button onchange type="submit" class="btn btn-primary">Sửa</button>
</form>

@endsection
@section('page-script')
<script>
 
</script>
@endsection