@extends('layouts.staff')

@section('title', 'Questions')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Exams</h1>
    </div>
     @if($message = Illuminate\Support\Facades\Session::get('success'))
        <div class="alert alert-success"> 
            {{ $message }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-6 col-xs-6 mb-4"> 
            <table class="table">
                <thead> 
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $count = 1; @endphp
                    @foreach($courses->questions as $question)
                        <tr>
                            <td scope="row">{{$count++}}</td>
                            <td>{{ $question->question }}</td>
                            <td>           
                                <a href="/staff/add-answers/{{ $question->id }}"><button class="btn btn-primary">Add Options</button></a>           
                            </td>
                                
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection