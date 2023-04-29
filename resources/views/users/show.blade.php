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

@section('scripts')
<script>

    $('.reaction-comment').hover(function () {
            $(this).find('i').removeClass('bx bx-comment');
            $(this).find('i').addClass('bx bxs-comment');
        }, function () {
            $(this).find('i').removeClass('bx bxs-comment');
            $(this).find('i').addClass('bx bx-comment');
        }
    );

    $('.reaction-like').hover(function () {
            $(this).find('i').removeClass('bx bx-like');
            $(this).find('i').addClass('bx bxs-like');
        }, function () {
            $(this).find('i').removeClass('bx bxs-like');
            $(this).find('i').addClass('bx bx-like');
        }
    );

    $('.reaction-heart').hover(function () {
            $(this).find('i').removeClass('bx bx-heart');
            $(this).find('i').addClass('bx bxs-heart');
        }, function () {
            $(this).find('i').removeClass('bx bxs-heart');
            $(this).find('i').addClass('bx bx-heart');
        }
    );

    $('.reaction-angry').hover(function () {
            $(this).find('i').removeClass('bx bx-angry');
            $(this).find('i').addClass('bx bxs-angry');
        }, function () {
            $(this).find('i').removeClass('bx bxs-angry');
            $(this).find('i').addClass('bx bx-angry');
        }
    );
</script>
@endsection