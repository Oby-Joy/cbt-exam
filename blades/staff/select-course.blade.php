@extends('layouts.staff')

@section('title', 'Select Course')

@section('content')
<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Select Course to add answers</h6>
            </div>
            <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Course</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $count = 1; @endphp
                        @foreach($titles as $title)                
                            <tr>
                                <td scope="row">{{$count++}}</td>
                                <td>{{$title->course}}</td>
                                <td><a href="/staff/show-questions/{{$title->id}}"><button class="btn btn-primary">View Questions</button></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                
            </div>
        </div>
    <div>
@endsection