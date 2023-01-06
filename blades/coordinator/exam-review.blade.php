@extends('layouts.coordinator')

@section('title', 'Exam Review')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Exams</h1>
    </div>
     @if($message = Illuminate\Support\Facades\Session::get('success'))
        <div class="alert alert-success"> 
            {{ $message }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-6 col-xs-6 mb-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course</th>
                        <th scope="col">Date</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Attempt</th>
                        <th scope="col">Available Attempts</th>
                        <th scope="col">Marks</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                            <tr>
                                <td scope="row">{{ $course->id }}</td>
                                <td>{{ $course->course }}</td>
                                <td>{{ $course->date }}</td>
                                <td>{{ $course->duration }}</td>
                                <td>{{ $course->attempt }}</td>
                                <td>{{ $course->attempt_counter }}</td>
                                <td>{{ $course->marks }}</td>
                                <td>           
                                    <a href="/coordinator/view-exam/{{$course->id}}"><button class="btn btn-primary">Review <i class="fas fa-eye"></i></button></a>           
                                </td>
                                
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

                        

@endsection