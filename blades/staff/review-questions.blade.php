@extends('layouts.staff')

@section('title', 'Review Questions')

@section('content')
<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Ca Exam</h6>
            </div>
            <div class="card-body">
            @if($message = Illuminate\Support\Facades\Session::get('success'))
                    <div class="alert alert-success"> 
                        {{ $message }}
                    </div>
                @endif
                <div class="row y-5">
                    <div class="col-md-1">
                        <select name="year" id="">
                            {{ $last= date('Y')-120 }}
                            {{ $now = date('Y') }}
                            @for ($i = $now; $i >= $last; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-1">
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
                                    <th scope="col">Question</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($questions as $question)
                                    <tr>
                                        <td scope="row">{{ $question->id }}</td>
                                        <td>{{ $question->question }}</td>
                                        <td><button class="btn btn-danger">Pending</button></td>
                                        <td><button class="btn btn-success">Edit <i class="fa fa-pen"></i></button></td>
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