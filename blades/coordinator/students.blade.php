@extends('layouts.coordinator')

@section('title', 'Students')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Students</h1>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-6 col-xs-6 mb-4">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">State of Origin</th>
                        <th scope="col">Command</th>
                        <th scope="col">AP/F No.</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Date of Enlistment</th>
                        <th scope="col">Qualification</th>
                        <th scope="col">Year</th>
                        <th scope="col">Course Number</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td scope="row">{{ $student->id }}</td>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>{{ $student->state_of_origin }}</td>
                        <td>{{ $student->command }}</td>
                        <td>{{ $student->apf }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->date_of_enlistment }}</td>
                        <td>{{ $student->qualification }}</td>
                        <td>{{ $student->year_of_birth }}</td>
                        <td>{{ $student->course_number }}</td>
                        <td><a href="/coordinator/{{$student->id}}"><button class="btn btn-primary">View <i class="fas fa-eye"></i></button></a> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

                        

@endsection