<div class="card mb-4">
    <div class="card-header d-flex justify-content-center align-items-center">
        <div class="col-lg-0">
            <p class="mb-0">Posts</p>
        </div>
        <div class="col-lg d-flex justify-content-end align-items-center">
            <a href="{{url('/posts/create')}}"><i id="post-icon" class="bx bx-plus-circle text-primary h5 mb-0"></i></a>
        </div>
    </div>
    <div class="card-body scroll-posts p-4">
        <div class="account-list-posts d-flex justify-content-center flex-column">
            <div class="account-posts">
                @foreach($posts as $post)
                    <div id="{{$post->id}}" class="account-post mb-4 border-bottom border-2 pb-2">
                        <div class="account-info mb-4 d-flex align-items-center pb-2">
                            <div class="col-lg-0">
                                <img src="{{asset($post->user->url_photo) ?? url('/images/default_profile_picture.jpg')}}" alt="avatar" class="account-profile-picture rounded-circle">
                            </div>
                            <div class="col-lg mx-3">
                                <div class="col-lg">
                                    <p class="account-name mb-0">{{$post->user->full_name}}</p>
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
                                    <p class="mb-0">todo</p>
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
        
    </script>
@endsection