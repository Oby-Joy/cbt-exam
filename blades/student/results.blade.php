@extends('layouts.student')

@section('title', 'Result')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Your Results</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Course</th>
                                <th scope="col">Score/Question</th>
                                <th scope="col">Total Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($exams) > 0)
                                @php $x =1; @endphp
                                @foreach($exams as $exam)                                   
                                    <tr>
                                        <td>{{ $x++ }}</td>
                                        <td>{{ $exam->course }}</td>
                                        <td>{{ $exam->marks }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            @else
                                <td colspan="4">Exam not added</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection