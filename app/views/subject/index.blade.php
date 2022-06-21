@extends('layouts.main')
@section('title', 'Danh sách môn học')    
@section('content')
<table class="table table-hover">
    <thead>
        <th>ID</th>
        <th>Tên môn học</th>
        <th>Số bài quiz</th>
        <th>
            <a href="">Tạo mới</a>
        </th>
        <tbody>    
            <tr>
                <td>{{$age}}</td>
                <td>{{$name}}</td>             
                <td>
                    <a href="">Sửa</a>
                    <a href="">Xóa</a>
                </td>
            </tr>
   
        </tbody>
    </thead>
</table>
@endsection
@section('page-script')
<script></script>
@endsection
