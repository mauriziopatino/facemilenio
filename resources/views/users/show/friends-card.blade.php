<div class="card mb-4 mb-lg-0">
    <div class="card-header">
        <p class="m-0">Friends</p>
    </div>
    <div class="card-body p-4 scroll-friends">
        <div class="friend-list d-flex justify-content-center flex-column">
            @if ($friends->isEmpty())
                <div class="friend-info mb-4 d-flex align-items-center border-bottom border-2 pb-2">
                    <p>No friends.</p>
                </div>
            @else
                {{-- @foreach ($friends as $friend) --}}
                    <div class="friend-info mb-4 d-flex align-items-center border-bottom border-2 pb-2">
                        <img src="{{url('/images/default_profile_picture.jpg')}}" alt="avatar" class="friend-profile-picture rounded-circle">
                        <p class="friend-name mx-3 mb-0">Pedro Picapiedra</p>
                    </div>
{{--           @endforeach --}}
            @endif
        </div>
    </div>
</div>