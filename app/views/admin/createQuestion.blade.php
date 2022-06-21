@extends('layouts.main')
@section('title', 'Thêm Câu Hỏi')    
@section('content')


<a title="quay lại" href="<?= URL ?>mon-hoc/quizs/chi-tiet-quizs/<?= $_GET['id_quiz'] ?>" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
<br>
<br>
<form action="<?= URL ?>mon-hoc/questions/luu-tao-moi/<?= $_GET['id_quiz'] ?>" method="post" enctype="multipart/form-data">

  <?= $msg = (isset($_SESSION['successFully'])) ? "<div class='alert alert-success'>" . $_SESSION['successFully'] . " </div>" : "";
  unset($_SESSION['successFully'])   ?>

<?= $msg = (isset($_SESSION['error'])) ? "<div class='alert alert-danger'>" . $_SESSION['error'] . " </div>" : "";
  unset($_SESSION['error'])   ?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tên Câu hỏi</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">ảnh</label>
    <input type="file" name="img_question" class="form-control">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Câu 1</label>
    <input type="text" name="answers[]" class="form-control">
   <br>
    <select name="is_correct[]" >
      <option value="0">sai</option>
      <option value="1">dung</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Câu 2</label>
    <input type="text" name="answers[]" class="form-control">
   <br>
    <select name="is_correct[]" >
      <option value="0">sai</option>
      <option value="1">dung</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Câu 3</label>
    <input type="text" name="answers[]" class="form-control">
   <br>
    <select name="is_correct[]"  >
      <option value="0">sai</option>
      <option value="1">dung</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Câu 4</label>
    <input type="text" name="answers[]" class="form-control">
   <br>
    <select name="is_correct[]"  >
      <option value="0">sai</option>
      <option value="1">dung</option>
    </select>
  </div>

  <button type="submit" name="btn_question" class="btn btn-primary">Thêm</button>
</form>


@endsection
@section('page-script')
<script></script>
@endsection
<!-- <br>
<h2>Thêm Đáp án</h2>
<form style="margin-bottom:100px" action="<?= URL ?>mon-hoc/answers/luu-tao-moi?id_quiz=<?= $_GET['id_quiz'] ?>" method="post" enctype="multipart/form-data">
  <?= $msg = (isset($_SESSION['success'])) ? "<div class='alert alert-success'>" . $_SESSION['success'] . " </div>" : "";
  unset($_SESSION['success'])   ?>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">chọn câu hỏi</label>
    <select name="id_question" class="form-control">
      <?php foreach ($data['data'] as $key => $val) : ?>
        <option value="<?= $val->id ?>"><?= $val->name ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">nội dung đáp án</label>
    <input type="text" name="content" class="form-control">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">ảnh đáp án</label>
    <input type="file" name="img_answer" class="form-control">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">câu trả lời </label>
    <select name="is_correct" id="" class="form-control">
      <option value="">sai</option>
      <option value="1">đúng</option>
    </select>
  </div>

  <button type="submit" name="btn_Answer" class="btn btn-primary">Thêm</button>
</form> -->

<script>
//   $('input[type="checkbox"]').click(function () {
//    $(this).val(1);
// // console.log($(this));
//   })
</script>