@extends('layouts.master')
 
@section('title', 'Create post')


@section('styles')
@vite('resources/css/post.css')
@endsection

@section('content')
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                <p class="mb-0">Create post</p>
            </div>

            <div class="card-body">
                <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-outline mb-4">
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{old('title')}}" required/>
                    </div>

                    <div class="form-outline mb-4">
                        <textarea name="message" id="message" class="form-control post-message" placeholder="Message" required></textarea>
                        <div class="message-length me-1 mt-2 float-end">
                            <small id="message-current-length" class="form-text text-muted">0</small>
                            <small id="message-max-length" class="form-text text-muted">/ 500</small>
                        </div>
                    </div>
                    
                    <div class="form-outline mb-4">
                        <input type="file" id="image" name="image" class="form-control w-50" accept="image/png, image/jpg, image/jpeg">
                    </div>

                    <div class="float-end">
                        <button type="submit" class="btn btn-success">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
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
