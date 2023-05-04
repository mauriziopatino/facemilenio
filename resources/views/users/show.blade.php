@extends('layouts.master')
 
@section('title', 'Login')

@section('styles')
@vite('resources/css/account.css')
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4">
        @include('users.show.personal-card')

        @include('users.show.friends-card')
    </div>

    <div class="col-lg-8">
        @include('users.show.posts-card')
    </div>
</div>
@stop