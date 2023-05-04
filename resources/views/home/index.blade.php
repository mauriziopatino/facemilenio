@extends('layouts.master')
 
@section('title', 'Home')

@section('styles')
@vite('resources/css/home.css')
@endsection

@section('content')
    @include('posts.index')
@stop