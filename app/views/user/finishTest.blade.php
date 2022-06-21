@extends('layouts.homepage')
@section('title', 'Nop bai ')    
@section('content')

<div class="">
<div class="p-2 bd-highlight">
<img width="500" height="300" src="{{URL}}public/img/gif/giphy.gif" alt=""> 

</div>

<div class="p-2 bd-highlight">
<a href="{{URL}}chu-de/xem-ket-qua/{{$quiz_id}}/sub/{{$_GET['id_subject']}}" class="btn btn-primary">quay lại xem kết quả</a>

</div>

</div>

@endsection
@section('page-script')
<script></script>
@endsection