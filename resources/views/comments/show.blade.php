@extends('layouts.master')
 
@section('title', 'Home')

@section('styles')
@vite('resources/css/home.css')
@endsection

@section('content')
<div class="row">
    <div class="col-lg">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-center align-items-center">
                <div class="col-lg-0">
                    <p class="mb-0">Dashboard</p>
                </div>
                <div class="col-lg d-flex justify-content-end align-items-center">
                    <a href="{{url('/posts/create')}}"><i id="post-icon" class="bx bx-plus-circle text-primary h5 mb-0"></i></a>
                </div>
            </div>
            <div class="card-body scroll-posts p-4">
                <div class="account-list-posts d-flex justify-content-center flex-column">
                    <div class="account-posts">
                        <div id="{{$post->id}}" class="account-post mb-4 border-bottom border-2 pb-2">
                            <div class="account-info mb-4 d-flex align-items-center pb-2">
                                <div class="col-lg-0">
                                    <img src="{{$post->user->url_photo ? asset($post->user->url_photo) : url('/images/default_profile_picture.jpg')}}" alt="avatar" class="account-profile-picture rounded-circle" referrerpolicy="no-referrer">
                                </div>
                                <div class="col-lg mx-3">
                                    <div class="col-lg">
                                        <p class="account-name mb-0"><a href="{{url('/account' . '/' . $post->user->email)}}">{{$post->user->full_name}}</a></p>
                                    </div>
                                    <div class="col-lg d-flex align-items-center">
                                        <i class='account-post-time bx bxs-time'></i>
                                        <p class="account-post-time mb-0 ms-1">{{$post->time_elapsed}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="post-info">
                                <div class="post-text">
                                    <p class="fw-bold">{{$post->title}}</p>
                                    <p>{{$post->message}}</p>
                                </div>
                                <div class="post-reactions d-flex align-items-center">
                                    <div class="comment d-flex align-items-center me-3">
                                        <i class="reaction-comment-icon bx bx-comment me-1 text-info"></i>
                                        <p class="mb-0">{{$post->comments_count}}</p>
                                    </div>
                                    <div class="like d-flex align-items-center me-3">
                                        <i class="reaction-like-icon bx bx-like me-1 text-primary"></i>
                                        <p class="mb-0">{{$post->likes_count}}</p>
                                    </div>
                                    <div class="heart d-flex align-items-center me-3">
                                        <i class="reaction-heart-icon bx bx-heart me-1 text-danger"></i>
                                        <p class="mb-0">{{$post->heart_count}}</p>
                                    </div>
                                    <div class="angry d-flex align-items-center me-3">
                                        <i class="reaction-angry-icon bx bx-angry me-1"></i>
                                        <p class="mb-0">{{$post->angry_count}}</p>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0 ps-4 pe-4">
                <form method="post" action="{{route('comments.comment', $postId)}}" enctype="multipart/form-data">
                    @csrf
                    <textarea name="message" id="message" class="form-control post-message" placeholder="Escribe un comentario" required></textarea>
                    <input type="submit" class="btn btn-success me-3 mt-2" value="Comment">
                    <div class="message-length me-1 mt-2 float-end">
                        <small id="message-current-length" class="form-text text-muted">0</small>
                        <small id="message-max-length" class="form-text text-muted">/ 500</small>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-4">
                @foreach ($comments as $comment)
                    <div class="comment border-bottom border-2 mb-4">
                        <div class="account-info mb-4 d-flex align-items-center pb-2">
                            <div class="col-lg-0">
                                <img src="{{$comment->user->url_photo ? asset($comment->user->url_photo) : url('/images/default_profile_picture.jpg')}}" alt="avatar" class="account-profile-picture rounded-circle">
                            </div>
                            <div class="col-lg mx-3">
                                <div class="col-lg">
                                    <p class="account-name mb-0"><a href="{{url('/account' . '/' . $post->user->email)}}">{{$comment->user->full_name}}</a></p>
                                </div>
                                <div class="col-lg d-flex align-items-center">
                                    <i class='account-post-time bx bxs-time'></i>
                                    <p class="account-post-time mb-0 ms-1">{{$comment->time_elapsed}}</p>
                                </div>
                            </div>
                        </div>
                    
                        <div class="comment-text">
                            <p>{{$comment->message}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.comment').hover(function () {
                    $(this).find('i')
                        .removeClass('bx bx-comment')
                        .addClass('bx bxs-comment');
                }, function () {
                    $(this).find('i')
                        .removeClass('bx bxs-comment')
                        .addClass('bx bx-comment');
                }
            );

            $('.like').hover(function () {
                    $(this).find('i')
                        .removeClass('bx bx-like')
                        .addClass('bx bxs-like');
                }, function () {
                    $(this).find('i')
                        .removeClass('bx bxs-like')
                        .addClass('bx bx-like');
                }
            );

            $('.heart').hover(function () {
                    $(this).find('i')
                        .removeClass('bx bx-heart')
                        .addClass('bx bxs-heart');
                }, function () {
                    $(this).find('i')
                        .removeClass('bx bxs-heart')
                        .addClass('bx bx-heart');
                }
            );

            $('.angry').hover(function () {
                    $(this).find('i')
                        .removeClass('bx bx-angry')
                        .addClass('bx bxs-angry');
                }, function () {
                    $(this).find('i')
                        .removeClass('bx bxs-angry')
                        .addClass('bx bx-angry');
                }
            );

            $('#post-icon').hover(function () {
                    $(this).removeClass('bx bx-plus-circle')
                        .addClass('bx bxs-plus-circle');
                }, function () {
                    $(this).removeClass('bx bxs-plus-circle')
                        .addClass('bx bx-plus-circle');
                }
            );
            

            $('.post-reactions div').on('click', function () {
                var postId = $(this).closest('.account-post').attr('id');
                var reactionType = $(this).closest('.post-reactions div').attr('class').split(' ')[0];
                if(reactionType != 'comment') {
                    console.log(postId);
                    console.log(reactionType);

                    reactToPost(postId, reactionType);
                }
            });

            function reactToPost(postId, reactionType) {
                $.ajax({
                    method: 'POST',
                    url: '{{route("posts.react")}}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        postId:postId,
                        reactionType:reactionType
                    },
                    success: function (data) {
                        console.log(data.success);
                    }
                });
            }
        });

        $('.post-message').on("keyup", function () {
        var characterCount = $(this).val().length;
        var current = $('#message-current-length');
        var maximum = $('#message-max-length');
        
        current.text(characterCount);

        if(characterCount > 500){
            current.removeClass('text-muted');
            current.addClass('text-danger');
        }else{
            current.removeClass('text-danger');
            current.addClass('text-muted');
        }
    });
        
    </script>
@endsection
@stop