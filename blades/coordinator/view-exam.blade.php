@extends('layouts.coordinator')

@section('title', 'Review Exam')

@section('content')
<div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">View Exam</h6>
            </div>
            <div class="card-body">
                <div class="row y-5">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th scope="col">S/N</th>
                               <th scope="col">Questions</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach($course->questions as $question)
                                <tr>
                                    <td scope="row">{{ $question->id }}</td>
                                    <td>{{ $question->question }}</td>
                                </tr>
                           @endforeach
                           <tr>
                               <td scope="row">
                                   <button class="btn btn-primary">Actions <i class="fa fa-arrow-right"></i></button>
                               </td> 
                               <td>
                                   <form action="/coordinator/view-exam/{{$course->id}}" method="POST">
                                       @csrf
                                       @method('PATCH')
                                        <input type="date" name="date" style="background:blue; color:white; height:40px; width:110px;">

                                        <input type="time" name="duration" style=" height:40px; width:110px;">

                                        <select name="attempt" id="" style="height:40px; width:110px;">
                                            <option>Attempt</option>
                                            <option value=1>1</option>
                                            <option value=2>2</option>
                                        </select>

                                        <input type="text" name="marks" style=" height:40px; width:110px;" placeholder = "Marks">
   
                                       <button type="submit" class="btn btn-success">Approve <i class="fa fa-check"></i></button>
                                   </form>                                                             
                               </td>
                           </tr>
                       </tbody>
                   </table>
                </div>

                
            </div>
        </div>
    <div>
@endsection