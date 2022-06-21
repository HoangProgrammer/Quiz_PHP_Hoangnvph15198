<a title="quay lại" href="<?= URL ?>mon-hoc/chi-tiet-quizs?id_quiz=<?= $_GET['id_quiz'] ?>" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
<br>
<br>
<form style="margin-bottom:100px" action="<?= URL ?>mon-hoc/answers/luu-cap-nhat?id=<?=$data['model']->id ?>&id_quiz=<?=$_GET['id_quiz']?>" method="post" enctype="multipart/form-data">
  <?= $msg = (isset($_SESSION['success'])) ? "<div class='alert alert-success'>" . $_SESSION['success'] . " </div>" : "";
  unset($_SESSION['success'])   ?>
  <!-- <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">chọn câu hỏi</label>
    <select name="id_question" class="form-control">
      <?php foreach ($data['data'] as $key => $val) : ?>
        <option value="<?= $val->id ?>"><?= $val->name ?></option>
      <?php endforeach; ?>
    </select>
  </div> -->

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">nội dung đáp án</label>
    <input type="text" name="content" class="form-control" value="<?=$data['model']->content?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">ảnh đáp án</label>
    <input type="file" name="img_answer" class="form-control">
    <br>
    <img width="200px"  src="<?= URL ?>public/img/<?=$data['model']->img?>" alt="không có ảnh">
 
 <?php  
  if(!empty($data['model']->img)){?>
   <a class="text-danger" title="xóa ảnh" href="<?=URL?>mon-hoc/answers/luu-cap-nhat?id_anh=<?=$data['model']->id?>&id_quiz=<?=$_GET['id_quiz']?>"><i class="fas fa-backspace"></i></a>
   <?php } ?>
 
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">câu trả lời </label>
    <select name="is_correct" id="" class="form-control">
      <option <?=$select=($data['model']->is_correct==0)?"selected":""?> value="0" class="text-danger" >sai</option>
      <option  <?=$select=($data['model']->is_correct==1)?"selected":""?> value="1"  class="text-success">đúng</option>
    </select>
  </div>

  <button type="submit" name="btn_Answer" class="btn btn-primary">Sửa</button>
</form>