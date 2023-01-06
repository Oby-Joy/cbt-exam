@extends('layouts.master')

@section('title', 'View Staff')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Staff</h1>
    </div>

    <div class="row">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
         @endif
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
                        <td>{{ $worker->state_of_origin }}</td>
                        <td>{{ $worker->gender }}</td>
                        <td>{{ $worker->role }}</td>
                        <td>{{ $worker->qualification }}</td>
                        <td>{{ $worker->year_of_birth }}</td>
                        <td>
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="/admin/{{ $worker->id }}/edit-staff"><button class="btn btn-success">Edit <i class="fas fa-edit"></i></button> </a>
                                </div>
                                <div class="col-md-4">
                                    <a href="/admin/{{$worker->id}}"><button class="btn btn-primary">View <i class="fas fa-eye"></i></button> </a>
                                </div>

                                <div class="col-md-4">
                                    <form id="delete-form" action="/admin/{{$worker->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete <i class="fas fa-remove-format"></i></button>
                                    </form>
                                </div>

                            </div>
                        
                        </td>
             
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection