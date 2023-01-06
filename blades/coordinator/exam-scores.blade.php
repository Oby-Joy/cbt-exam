@extends('layouts.coordinator')

@section('title', 'Exam Scores')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Exams</h1>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-6 col-xs-6 mb-4">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Powerpoint</th>
                        <th scope="col">Word</th>
                        <th scope="col">Excel</th>
                        <th scope="col">Typing</th>
                        <th scope="col">Security</th>
                        <th scope="col">Database</th>
                        <th scope="col">Ca</th>
                        <th scope="col">Internet</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!--<td scope="row">1</td>
                        <td>Power Point</td>
                        <td><button class="btn btn-primary">Review <i class="fas fa-eye"></i></button></td>-->
                        <td>No data available yet</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

                        

@endsection