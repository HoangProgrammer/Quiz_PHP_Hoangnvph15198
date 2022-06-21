@extends('layouts.main')
@section('title', 'Chi tiết Quiz')    
@section('content')

<div class="table-responsive" ondragend="">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
 
              <th scope="col">Câu hỏi & Đáp án</th>
              <th scope="col">ảnh câu hỏi & đáp án</th>
              <th scope="col">là câu đúng</th>
              <th scope="col"><a href="{{URL}}mon-hoc/questions/tao-moi/{{$_GET['id_quiz']}}">Thêm</a></th>
            </tr>
          </thead>
          <tbody>

         @php
         $i=0
         @endphp   
            @foreach ($data as $key => $val) 
          
            <tr>
              <td><h5>{{$val->name }}</h5></td>
              <td><img width="100px" src="{{URL}}public/img/{{$val->img }}" alt=""></td>
              <td></td>
              <td><a href="{{URL}}mon-hoc/questions/cap-nhat/{{$val->id}}/quiz/{{$_GET['id_quiz']}}" class="btn btn-dark">sửa</a></td>
              <td><a  onclick="return confirm('bạn có muốn xóa không !')" href="{{URL}}mon-hoc/questions/xoa/{{$val->id}}/quiz/{{$_GET['id_quiz']}}" class="btn btn-danger">xóa</a></td> 
            </tr>
             
            @foreach($answer as $value)
              @if($value->question_id==$val->id)
            <tr>      
              <td>{{$value->content }}</td>
              <td><img src="./public/img/{{$value->img }}" alt=""></td>
              <td class="text-success">@if(($value->is_correct ==1)) {{'đáp án đúng'}} @endif</td>
              <td>
                <!-- <a href="{{URL}}mon-hoc/answers/cap-nhat?id={{$value->id}}&id_quiz={{$_GET['id_quiz']}}" class="btn btn-warning">sửa</a> -->
              </td>
            </tr>        
              
              @endif
              @endforeach
              @endforeach
              
          </tbody>
        </table>
      </div>
      @endsection
@section('page-script')
<script></script>
@endsection