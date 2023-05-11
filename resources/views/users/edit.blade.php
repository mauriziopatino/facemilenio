@extends('layouts.master')
 
@section('title', 'Edit account')

@section('styles')
@vite('resources/css/account.css')
@endsection

@section('content')
<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                <p class="mb-0">Edit account</p>
            </div>

            <div class="card-body">
                <form method="POST" action="{{route('account.update', $user->email)}}">
                    @method('PUT')
                    @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-2">
                            <div class="col-lg mb-3 mt-3 d-flex flex-column justify-content-center align-items-center">
                                <img src="{{$post->user->url_photo ?? url('/images/default_profile_picture.jpg')}}" alt="avatar" class="account-profile-picture-edit rounded-circle">
                                <label class="btn btn-primary mt-3">
                                    Select file
                                    <input type="file" hidden>
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg">
                                    <div class="form-outline mb-4">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{$user->name}}" required/>
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="form-outline mb-4">
                                        <label for="last_name">Last name</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="{{$user->last_name}}" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg">
                                    <div class="form-outline mb-4">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{$user->email}}" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg">
                                    <div class="form-outline mb-4">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Leave it blank if not change" autocomplete="off"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg">
                                    <div class="form-outline mb-4">
                                        <label for="birthdate">Birthdate</label>
                                        <input type="date" name="birthdate" id="birthdate" class="form-control" placeholder="Birthdate" value="{{$user->birthdate}}" required/>
                                    </div>
                                </div>

                                <div class="col-lg">
                                    <div class="form-outline mb-4">
                                        <label for="gender_id">Gender</label>
                                        <select name="gender_id" id="gender_id" class="form-select">
                                            @foreach ($genders as $gender)
                                                @if ($gender->id == $user->gender_id)
                                                    <option value="{{$gender->id}}" selected>{{$gender->name}}</option>
                                                @else
                                                    <option value="{{$gender->id}}">{{$gender->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg">
                                    <div class="form-outline mb-4">
                                        <label for="biography">Biography</label>
                                        <textarea name="biography" id="biography" class="form-control" maxlength="255">{{$user->biography}}</textarea>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="float-end">
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script>
    
</script>
@endsection