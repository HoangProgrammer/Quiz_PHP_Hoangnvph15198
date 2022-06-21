@extends('layouts.homepage')
@section('title', 'Chi Tiết Điểm ')    
@section('content')

<div class="alert alert-light"> <h4>Kết quả Kiểm Tra của {{strtoupper($user->name)}} </h4> </div>
<div class="content">


<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <td>số thứ tự</td>
            <td>Question ID </td>
            <td>Tiêu Đề</td>
            <td>Điểm Tối Đa</td>
            <td>Đạt Điểm</td>
            <td>Phầm trăm làm được</td>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
</div>
<input type="hidden" id="id_quiz" value="{{$_GET['id_quiz']}}">


@endsection
@section('page-script')
<script>
    $(document).ready(function() {
        load_data()
          function load_data() {
              var id_quiz=$('#id_quiz').val();
      
            $.ajax({
                url: "{{ URL }}chu-de/lay-du-lieu",
                method: "POST",
                data: {
                    id_quiz: id_quiz
                },
                success: function(data) {
                    console.log(data);
                    $('tbody').html(data);
                }
            })
        }
    })
      
</script>
@endsection
