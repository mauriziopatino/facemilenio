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
                <div class="account-post mb-4 border-bottom border-2 pb-2">
                    <div class="account-info mb-4 d-flex align-items-center pb-2">
                        <div class="col-lg-0">
                            <img src="{{$user->url_photo ?? url('/images/default_profile_picture.jpg')}}" alt="avatar" class="account-profile-picture rounded-circle">
                        </div>
                        <div class="col-lg mx-3">
                            <div class="col-lg">
                                <p class="account-name mb-0">John Smith</p>
                            </div>
                            <div class="col-lg d-flex align-items-center">
                                <i class='account-post-time bx bxs-time'></i>
                                <p class="account-post-time mb-0 ms-1">3 minutes ago</p>
                            </div>
                        </div>
                    </div>
                    <div class="post-info">
                        <div class="post-text">
                            <p class="fw-bold">My review of the new Italian restaurant in town</p>
                            <p>I recently tried the new Italian restaurant in town and was thoroughly impressed! 
                                The warm and inviting atmosphere was perfect, and the decor was modern and chic with just the right amount of Italian flair. 
                                The Caprese salad was fresh and flavorful, and the Linguine alla Vongole was the best I've had in a long time. 
                                The service was exceptional, and the Tiramisu was the perfect sweet treat to end the meal. 
                                Highly recommend this cozy spot for a delicious meal!
                            </p>
                        </div>
                        <div class="post-reactions d-flex align-items-center">
                            <div class="reaction-comment d-flex align-items-center me-3">
                                <i id="reaction-comment-icon" class="bx bx-comment me-1 text-info"></i>
                                <p class="mb-0">43</p>
                            </div>
                            <div class="reaction-like d-flex align-items-center me-3">
                                <i id="reaction-like-icon" class="bx bx-like me-1 text-primary"></i>
                                <p class="mb-0">136</p>
                            </div>
                            <div class="reaction-heart d-flex align-items-center me-3">
                                <i id="reaction-heart-icon" class="bx bx-heart me-1 text-danger"></i>
                                <p class="mb-0">59</p>
                            </div>
                            <div class="reaction-angry d-flex align-items-center me-3">
                                <i id="reaction-angry-icon" class="bx bx-angry me-1"></i>
                                <p class="mb-0">13</p>
                            </div>                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>