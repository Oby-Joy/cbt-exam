@extends('layouts.master')

@section('title', 'View Course')

@section('content')

    <button class="btn btn-light">Copy</button>
    <button class="btn btn-light">Excel</button>
    <button class="btn btn-light">CSV</button>
    <button class="btn btn-light">PDF</button>
    <button class="btn btn-light">Print</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Course Title</th>
                <th scope="col">Lecturer(s)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->title }}</td>
                <td>{{ $course->lecturer }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection