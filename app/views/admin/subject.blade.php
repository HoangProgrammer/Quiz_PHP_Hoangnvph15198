@extends('layouts.main')
@section('title','Danh sách môn học')
@section('content')
<div class="table-responsive">
        <table border="1" cellspacing="15" cellpadding="15" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col" class="text-center">stt</th>
              <th scope="col" class="text-center">tên môn</th>
              <th scope="col" class="text-center">Mô tả</th>
              <th scope="col" class="text-center">người thêm</th>
              <th scope="col" colspan='2' class="text-center"><a href="{{URL}}mon-hoc/tao-moi"><i class="fa fa-add"></i> Thêm mới</a></th>
            </tr>
          </thead>
          <tbody>

         
        @php $i=0 @endphp
          @foreach ($subject as $value):
            <tr>
              <td>{{ $i+=1}}</td>
              <td><a href="{{URL}}mon-hoc/chi-tiet/{{$value->id}}">{{$value->name}}</a></td>
              <td>{{$value->description}}</td>
              <td>{{$value->user_name }}</td>
              <td><a href="{{URL}}mon-hoc/cap-nhat/{{$value->id}}" class="btn btn-warning">sửa</a></td>
              <td><a onclick="return confirm('bạn có muốn xóa không')" href=" {{URL}}mon-hoc/xoa/{{$value->id}}" class="btn btn-danger">xóa</a></td>
            </tr>     
            @endforeach 
          </tbody>
        </table>
      </div>
      @endsection

      @section('page-script')
<script></script>
@endsection