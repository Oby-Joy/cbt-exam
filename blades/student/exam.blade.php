<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Exam</title>
    
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.js') }}"></script>

</head>

<body id="page-top">
    @php 
        $time = explode(':', $courses->duration);
    @endphp
    <!-- Begin Page Content -->
    <div class="container my-5 ">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">
                    Welcome, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </h6><br>
                <h4 class="text-center">{{ $courses->course }} Exam</h4>
                
            </div>
            <div class="card-body">
            @php  $qcount = 1; @endphp 
                @if($success == true)
                <h1 class="text-right time">{{ $courses->duration }}</h1>
                    <form action="/student/exam-submit" method="POST" id="exam_form" class="mb-5"> 
                        <input type="hidden" name="exam_id" value="{{ $courses->id }}">
                        
                        @csrf 
                        @if($courses->approved == 0)
                            <p>No questions for this course yet</p>
                        @else 
                            
                            @foreach($courses->questions as $question) 
                                                
                                <p class="error" style="font-size:15px;"></p>
                                <h5 class="mb-4">Q{{ $qcount++ }}. {{ $question->question }}</h5>
                                <input type="hidden" name="q[]" value="{{ $question->id }}"> 
                                @php $acount = 1; @endphp
                                @foreach($question->answers as $answers)
                                    <p>{{$acount++}}). {{ $answers->answers }}
                                        <input type="radio" class="select-ans" data-id="{{ $qcount-1 }}" name="radio_{{$qcount-1}}" value="{{ $answers->id }}">
                                    </p>
                                @endforeach  
                                <input type="hidden" name="ans_{{ $qcount-1 }}" id="ans_{{ $qcount-1 }}"> <hr/>                      
                            @endforeach
                            
                            <button class="btn btn-primary">Submit</button> 
                        @endif

                        
                    </form>
                    @else
                        <h2 style="color:red;">{{$msg}}</h2>
                    @endif
                
            </div>

        </div>
    </div>

    
    <script>
        $(document).ready(function(){
            $('.select-ans').click(function(){
                var no = $(this).attr('data-id');
                $('#ans_'+no).val($(this).val());
            });

            var time = @json($time);
            $('.time').text(time[0] + ':' + time[1] + ':00');

            var seconds = 0;
            var hours = parseInt(time[0]);
            var minutes = parseInt(time[1]);

            var timer = setInterval(() => {
                if(hours == 0 && minutes == 0 && seconds == 0){
                    clearInterval(timer);
                    $('#exam_form').submit();
                }
                console.log(hours + '-:-' + minutes + '-:-' + seconds);

                if(seconds <= 0){
                    minutes--;
                    seconds = 59;
                }
                else if(minutes <= 0 && hours != 0){
                    hours--;
                    minutes = 59;
                    seconds = 59;
                }

                let tempHours = hours.toString().length > 1? hours: '0' + hours;
                let tempMinutes = minutes.toString().length > 1? minutes: '0' + minutes;
                let tempSeconds = seconds.toString().length > 1? seconds: '0' + seconds;

                $('.time').text(tempHours + ':' + tempMinutes + ':' + tempSeconds);

                seconds--;
            }, 1000);
        });

        function isValid(){
            var result = true;

            var qlength = parseInt("{{ $qcount }}")-1;

            for(let i = 1; i <= qlength; i++){
                if($('#ans_'+i).val() == ""){
                    result = false;

                    let answer = $('#ans_' + i);
                    answer.parent().append('<span class="error_msg" style="color:red;">Please select an answer</span>');

                    //$('.error').html('<span style="color:red;">Please select an answer</span>');

                    setTimeout(() =>{
                        $('.error').remove();
                    }, 5000);
                }
            }

            return result;
        }

        
    </script>
    

</body>
</html>