@extends('layouts.staff')

@section('title', 'Add Questions')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Add {{ $course->course }} Questions</h6>
            </div>
            <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-success"> 
                        {{ session('status') }} 
                    </div>      
                @endif

                <h2 class="text-center mb-4">Question</h2>
                <form method="POST" action="/staff/store-questions/{{$course->id}}">
                @csrf
                    <div class="form-group">            
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <input name="name_id" type="hidden" value="{{ $course->id }}">
                                <textarea class="form-control" name="question" id="" cols="30" rows="10" placeholder="Type question here..."></textarea>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-success mt-3" type="submit">Save</button>
                            </div>
                        </div>
                    </div>

                        
                </form>
            </div>
        </div>
    <div>
@endsection