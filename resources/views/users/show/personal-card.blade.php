<div class="card mb-4">
    <div class="card-body text-center">
        <img src="{{$friend->user->url_photo ?? url('/images/default_profile_picture.jpg')}}" alt="avatar"
        class="rounded-circle img-fluid" id="profile-picture">
        <h5 class="my-3">{{$user->name}} {{$user->last_name}}</h5>
        <p class="text-muted mb-1">{{($user->biography) ?? "No biography."}}</p>
        <p class="text-muted mb-4">{{($user->location) ?? "No location."}}</p>
        @if ($user->email != auth()->user()->email)
            <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-outline-success ms-1">Send friend request</button>
            </div>
        @else
            <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-outline-primary ms-1">Edit profile</button>
            </div>
        @endif
    </div>
</div>