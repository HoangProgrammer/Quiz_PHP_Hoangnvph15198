
@extends('layouts.main')
@section('title', 'Chi Tiết Điểm')    
@section('content')
<div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">stt</th>
              <th scope="col">Môn học</th>
              <th scope="col">Tên quiz</th>
              <th scope="col">Điểm</th>
              <th scope="col">thời gian làm bài</th>
              <th scope="col">thời gian kết thúc</th>
            </tr>
          </thead>

          <tbody>
            @php $i=0;
             @endphp
    
             @foreach ($customers as $val)
            <tr>
              <td>{{$i+=1}}</td>
              <td>{{$val->nameSubject}}</td>
              <td>{{$val->nameQuizs}}</td>  
              <td>{{$val->score}}</td>
              <td>{{$val->start_time}}</td>
              <td>{{$val->end_time}}</td>
              <!-- <td><button class="btn btn-warning">xem chi tiết</button></td> -->
            </tr>
 @endforeach
 
          </tbody>

        </table>
      </div>
      @endsection
@section('page-script')
<script></script>
@endsection
