@extends('layouts.master')

@section('title', 'Student')

@section('content')
    {{$student->fname }}
    {{$student->lname }}
    
@endsection