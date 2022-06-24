@extends('layouts.homepage')
@section('title', 'Thiết Lập')  
@section('content')
<div class="container-fluid">
<a title="quay lại" href="<?=URL?>chi-tiet-quiz?id=<?=$_GET['id_quiz']?>&id_subject=<?=$_GET['id_subject']?>" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
<br>
<br>

@php
// var_dump($data);die;    
@endphp

<form action="<?=URL?>chu-de/luu-thiet-lap/<?=$_GET['id_quiz']?>/subject/<?=$_GET['id_subject']?>" method="post" class="row g-3 needs-validation">
  <div class="mb-3 col-lg-6">
    <label for="exampleInputPassword1" class="form-label">Thời Gian Bắt Đầu</label>
    <input type="datetime-local" name="start_time"  class="form-control" value="<?=$model ->start_time?>">
    <br>
    <input type="text" name="start_default"  value="<?=$model ->start_time?>">
  </div>
  <div class="mb-3  col-lg-6">
    <label for="exampleInputPassword1" class="form-label">Thời Gian kết thúc</label>
    <input type="datetime-local" name="end_time"  class="form-control" value="<?=$model->end_time?>">
    <br>
    <input type="text" name="end_default"  value="<?=$model ->end_time?>">
  </div>
  <div class="mb-3 col-lg-6">
    <label for="exampleInputPassword1" class="form-label">Thời gian làm bài</label>
    <input type="text" name="minutes"  class="form-control" value="<?=$model ->minutes ?>">
    <input type="hidden" name="id_subject" value="<?=$_GET['id_quiz']?>"  class="form-control">
  </div>
  <?=$msg=(isset( $_SESSION['success']))?"<div class='alert alert-success'>". $_SESSION['success']." </div>":""; unset( $_SESSION['success'])   ?>
  <div class="col-12">
  <button type="submit" class="btn btn-primary">lưu</button>

  </div>
</form>
</div>
@endsection