@extends('layouts.main')
@section('title','Danh sách Học Viên')
@section('content')
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">stt</th>
        <th scope="col">Tên sinh viên</th>
        <th scope="col">avatar</th>
        <th scope="col">email</th>
      </tr>
    </thead>
    <tbody>
      @php
      $i=0
      @endphp

      @foreach ($data as $val)
      @if( $val->role_id!=1)
      <tr>
        <td>{{$i+=1}}</td>
        <td>{{$val->name}}</td>
        <td><img width="200px" src="./public/img/{{$val->avatar}}" alt="no img"></td>
        <td>{{$val->email}}</td>
        <td><a class="btn btn-warning" href="{{URL}}hoc-vien/detail/{{$val->id }}">xem chi tiết</a></td>
      </tr>
      @endif
      @endforeach
    </tbody>
  </table>
</div>
@endsection

@section('page-script')
<script></script>
@endsection