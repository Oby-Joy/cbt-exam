@extends('layouts.coordinator')

@section('title', 'Courses')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Courses</h1> 
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-6 col-xs-6 mb-4">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                        <th scope="col">Course Title</th>
                        <th scope="col">Lecturer(s)</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($courses) == 0)
                        <tr><td>No courses available</td></tr>
                    @else
                        @foreach($courses as $course)
                            <tr>
                                <td scope="row">{{ $course->id }}</td>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->lecturer }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

                        

@endsection