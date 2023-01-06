@extends('layouts.staff')

@section('title', 'Add Answers')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">Add Options</h6>
            </div>
            <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>      
                @endif

                <p class="text-center mb-4">{{$question->question}}</p>
                <form method="POST" action="/staff/store-answers/{{$question->id}}">
                @csrf
                    <div class="form-group">            
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <input name="question_id" type="hidden" value="{{$question->id}}">
                                <div class="form-group mb-2">
                                    <input type="text" name="answers" class="form-control bg-light small" placeholder="Add Option" aria-describedby="basic-addon2" autofocus> <br>

                                    @error('answers')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <select name="is_correct" id="" class="form-control">
                                    <option value = "">Correct Option?</option>
                                    <option value=0>No</option>
                                    <option value=1>Yes</option>
                                </select><br><hr>

                                @error('is_correct')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success mt-3" type="submit">Save</button>
                            <a href="/staff/show-questions/"><button class="btn btn-primary">Go back to questions</button></a>
                        </div>
                    </div>

                        
                </form>
            </div>
        </div>
    <div>
@endsection