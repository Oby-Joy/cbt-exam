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

</head>

<body id="page-top">

    <!-- Begin Page Content -->
    <div class="container my-5 ">
        <div class="card shadow mb-4">
            <div class="card-body">     
                <h3>Select Course</h3><br>

                @foreach($courses as $course)
                    <input type="radio" disabled>
                    <label name="course" for="mathematics"><a href="/student/cbt-exam/{{ $course->id }}" style="text-decoration:none;">{{ $course->course }}</label></a><br>
                @endforeach

                <br><br>
                <button class="btn btn-primary" type="submit">Final Submit</button>
               
            </div>

        </div>
    </div>
</body>

</html>