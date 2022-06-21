
@extends('layouts.homepage')
@section('title', 'Chi Tiết chủ Đề')    
@section('content')
<!-- <a href="homepage">Home</a> > <a href="xem-chu-de?id={{$_GET['id'] }}">Quizs</a> > <a href="">{{$data['quiz']->name }}</a> -->
<br>
<br>

@php
    $startTime = $quizStudent->start_time;
    $times = $quiz->minutes . " minute";
    $endTime = strtotime($startTime . '+' . $times);
    $endTime = date("Y-m-d H:i:s", $endTime);
    $duration = strtotime($endTime) - time();

@endphp

<div style="width: 1000px; margin:auto;  " class="d-flex justify-content-center">
    <div id="CountDown" style="width: 200px; " data-timer="{{$duration }}"></div>

</div>

<form style="width: 1000px; margin:auto; padding:10px; border: 1px gray solid;" action="{{URL }}chu-de/nop-bai/{{$_GET['id'] }}/sub/{{$_GET['id_subject']}}" class="form-horizontal justify-content-center" method="post">

    <div class="form-group d-flex justify-content-end">
        <button onclick="return confirm('bạn có chắc nộp bài không !')" name="btn" class="btn btn-dark sticky-right">kết thúc bài kiểm tra</button>

    </div>
    <ul>
   
      @php  $checked = '' @endphp
        @foreach ($Question as $val)
       
            <li>
                <h4>Câu {{ $cau = (isset($_GET['cau-hoi'])) ? $_GET['cau-hoi'] : 1}} </h4>
                <h4>{{$val->name}}</h4>

                @foreach ($answers as $v) 
                    @if ($v->question_id == $val->id) 
 
                        @foreach ($choseAnswer as $c) 
                            @if ($c->answer_id == $v->id) 
                            @php    $checked = $v->id; @endphp
                                
                            @endif
                        @endforeach
                    
                

                        <!-- ss nếu bằng thì thêm attr checked  -->
                       @if ($checked == $v->id) 
                            <p>
                                <label for="" class="control-label col-12">
                                    <input type="radio" checked class="answer" name="{{$v->question_id }}" value="{{$v->id }}"> <span class="text-dark">{{$v->content }}</span>
                                </label>
                            </p>
                        @else 
                            <p>
                                <label for="" class="control-label col-12">
                                    <input type="radio" class="answer" name="{{$v->question_id }}" value="{{$v->id }}"> <span class="text-dark">{{$v->content }}</span>
                                </label>
                            </p>
                        @endif

            </li>
  
                    @endif
                @endforeach
               @endforeach
    </ul>

    <input type="hidden" name="quiz_id" id="quiz_id" value="{{$_GET['id'] }}">
    <input type="hidden" name="id_user" id="id_user" value="{{$_SESSION['user'] }}">
    <input type="hidden" name="end_time" value="{{date('Y-m-d H:i:s') }}">
</form>


<div class="container-fluid ">
    <br>

    <nav class="d-flex justify-content-center">
        <ul class="pagination pagination-sm">

            @for ($i = 1; $i <= $total; $i++) 
                @if ($page== $i) 
            
                    <li class="page-item active" aria-current="page">
                        <a href="{{URL }}chu-de/chi-tiet-chu-de/chi-tiet-quiz/lam-quiz/{{$_GET['id'] }}/sub/{{$_GET['id_subject']}}/cau-hoi/{{$i }}" class="page-link">{{$i }}</a>
                    </li>
                @else
                    <li class="page-item " aria-current="page">
                        <a href="{{URL }}chu-de/chi-tiet-chu-de/chi-tiet-quiz/lam-quiz/{{$_GET['id'] }}/sub/{{$_GET['id_subject']}}/cau-hoi/{{$i }}" class="page-link">{{$i }}</a>
                    </li>
                @endif

            @endfor
        </ul>
    </nav>
</div>


<div id="pagination">

</div>

<input type="hidden" id="quiz_id" value="{{$_GET['id'] }}">
<input type="hidden" id="id_user" value="{{$_SESSION['user'] }}">
@endsection

@section('page-script')
<script>
    $(document).ready(function() {
        $('#CountDown').TimeCircles({
            time: {
                Days: {
                    show: false
                },
                Hours: {
                    show: false
                }
            }
        })

        setInterval(function() {

            var seconds = $('#CountDown').TimeCircles().getTime();

            if (seconds < 1) {

                location.href = "{{URL }}xem-ket-qua?id_quiz={{$_GET['id'] }}"
            }
            
        }, 1000)


        $(document).on('click', '.answer', function() {
            var id_answer = $(this).val();
            var id_question = $(this).attr('name');
            var quiz_id = $('#quiz_id').val();

            $.ajax({
                url: "{{URL }}chu-de/chon-dap-an",
                method: 'POST',
                data: {
                    id_question: id_question,
                    id_answer: id_answer,
                    id_quiz: quiz_id,
                },
                success: function(data) {
                    console.log(data);
                }
            })
        })


    })
</script>
@endsection