@extends('layouts.coordinator')

@section('title', 'View Profile')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">Student Profile</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3 col-sm-12 my-5">
                            <i class="fa fa-user" style="font-size:180px;"></i>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-6">
                           <ul  style="list-style:none">
                               <li>Name: {{$student->first_name}} {{$student->last_name}}</li>
                               <li class="my-4">Role: Student</li>
                               <li class="my-4">Username: {{$student->user_name}}</li>
                               <li class="my-4">Date of Enlistment: {{$student->date_of_enlistment}}</li>
                               <li class="my-4">Gender: {{$student->gender}}</li>
                               <li class="my-4">State of Origin: {{$student->state_of_origin}}</li>
                               <li class="my-4">Qualification: {{$student->qualification}}</li>
                               <li class="my-4">Year of Birth: {{$student->year_of_birth}}</li>
                               <li class="my-4">Date of Promotion: 12-08-2019</li>
                               <li>SG: Police</li>
                           </ul>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                   
                    

                </div>

        </div>
    </div>
@endsection