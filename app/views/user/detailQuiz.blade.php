@extends('layouts.homepage')
@section('title', 'Chi Tiết Quiz')    
@section('content')

<div class="container-fluid">
	<a href="homepage">{{ $subject->name }}</a> >> <a href="xem-chu-de?id={{ $_GET['id_subject'] }}">Quizs</a> >> <a href="" class="text-primary">{{ $quiz->name }}</a>
</div>
<br>
<br>

@php
$star_Time = (!empty($quizStudent->start_time)) ? $quizStudent->start_time : '';
$startTime = $star_Time;
$times = $quiz->minutes . " minute";
$format = strtotime($startTime . '+' . $times);
$endTime = date("Y-m-d H:i:s", $format);

$duration = strtotime($endTime) - time();
$startDate = strtotime($quiz->start_time);
$endDate =  strtotime($quiz->end_time);

$durationTime = $endDate - strtotime(date('Y-m-d H:i:s'));

@endphp
{{-- {{$durationTime}} --}}

@if($user->role_id==1)
<div class="container-fluid d-flex justify-content-end">
	<div class="dropdown">
		<a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
			Thao Tác
		</a>
		<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			<li><a class="dropdown-item" href="{{ URL }}chu-de/thiet-lap/{{ $_GET['id'] }}/sub/{{$_GET['id_subject']}}/author/{{$_SESSION['user']}}">Thiết Lập</a></li>
		</ul>
	</div>
</div>
@endif 

<br>
<br>
<div class="container-fluid">
	<form action="{{ URL }}chu-de/chi-tiet-chu-de/chi-tiet-quiz/lam-quiz/{{ $quiz->id }}/sub/{{ $_GET['id_subject'] }}" method="post">

		<input type="hidden" name="start_time" value="{{ date('Y-m-d H:i:s') }}" />
		

		@php $end=(!empty($quizStudent->end_time)) ? strtotime( $quizStudent->end_time):'' @endphp
{{-- {{$end}} --}}
		@if ($quiz->status != 0 || $durationTime < 1 )
			<div class="alert alert-secondary">bài kiểm tra  đã kết thúc {{$quiz->end_time}}</div>
		@elseif (!empty($quizStudent->student_id) && $quizStudent->student_id===$_SESSION['user']) 
				<a class="btn btn-primary " href="{{ URL }}chu-de/xem-ket-qua/{{ $_GET['id'] }}/sub/{{ $_GET['id_subject'] }}"> xem kết quả</a>
				{{-- @endif --}}
		@else
			<button class="btn btn-success col-lg-12"> Bắt đầu làm bài</button>

		@endif

		
		
	</form>


	<br>
	<br>
	<div class="ilInfoScreenSec form-horizontal" id="infoscreen_section_2">
		<h3 class="ilHeader">Thuộc tính chung</h3>

		<div class="form-group">
			<span class="form-group">Tác Giả :</span> <span>hoang</span>
		</div>

		<div class="form-group">
			<span class="form-group">Tiêu đề :</span> <span>quiz</span>
		</div>


	</div>
</div>


@endsection
@section('page-script')
<script></script>
@endsection