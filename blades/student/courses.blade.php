@extends('layouts.student')

@section('title', 'Courses')

@section('content')
<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Your Courses</h6>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-6 col-xs-6 mb-4">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Lecturer</th>
                                </tr>
                            </thead>
                            <tbody>
    	                        @foreach($courses as $course)
                                    <tr>
                                        <td scope="row">{{ $course->id }}</td>
                                        <td>{{ $course->title }}</td>
                                        <td>{{ $course->lecturer }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <div>
@endsection