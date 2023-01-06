@extends('layouts.coordinator')

@section('title', 'Staff')

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
                        <th scope="col">Email Address</th>
                        <th scope="col">State of Origin</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Role</th>
                        <th scope="col">Qualification</th>
                        <th scope="col">Year of Birth</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($workers as $worker)
                        <tr>
                            <td scope="row">{{ $worker->id }}</td>
                            <td>{{ $worker->first_name }} {{ $worker->last_name }}</td>
                            <td>{{ $worker->email }}</td>
                            <td>{{ $worker->state_of_origin}}</td>
                            <td>{{ $worker->gender }}</td>
                            <td>{{ $worker->role }}</td>
                            <td>{{ $worker->qualification }}</td>
                            <td>{{ $worker->year_of_birth }}</td>
                            <td><button class="btn btn-primary">View <i class="fas fa-eye"></i></button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

                        

@endsection