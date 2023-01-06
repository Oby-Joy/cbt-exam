@extends('layouts.staff')

@section('title', 'Students')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Students List</h1>
    </div>

    <div class="row y-5">
        <div class="col-md-6">
            <select name="year" id="">
                {{ $last= date('Y')-120 }} 
                {{ $now = date('Y') }}
                @for ($i = $now; $i >= $last; $i--)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="col-md-6">
            <select name="course" id="">
                <option value="Course">Course</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-6 col-xs-6 mb-4">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Command</th>
                        <th scope="col">AP/F No.</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Date of Enlistment</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td scope="row">{{ $student->id }}</td>
                            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                            <td>{{ $student->command }}</td>
                            <td>{{ $student->apf }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->date_of_enlistment }}</td>
                            <td><button class="btn btn-primary">View <i class="fas fa-eye"></i></button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

                        

@endsection