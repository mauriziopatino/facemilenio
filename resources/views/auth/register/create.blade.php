@extends('layouts.auth')
 
@section('title', 'Login')

@section('content')
<section class="h-100 login-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-5">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-12">
                            <div class="card-body p-md-5 mx-md-4">
  
                                <div class="text-center">
                                    <img src="{{url('/images/facemilenio.png')}}" style="width: 185px;" alt="logo">
                                    <p class="mb-5 h5">Registration</p>
                                </div>
                
                                <form method="post" action="{{route('register.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <input type="name" name="name" id="name" class="form-control" placeholder="Name" value="{{old('name')}}"/>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="last_name" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="{{old('last_name')}}" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <div class="row">
                                            <div class="col-sm">
                                                <label for="gender_id">Gender</label>
                                                <select class="form-select" name="gender_id" id="gender_id">
                                                    <option value="" selected>Select your gender</option>
                                                    @foreach ($genders as $gender)
                                                        <option value="{{$gender->id}}">{{$gender->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-sm">
                                                <label for="birthdate">Birthdate</label>
                                                <input class="form-control" type="date" name="birthdate" id="birthdate" value="{{old('birthdate')}}">
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="form-outline mb-4">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{old('email')}}"/>
                                    </div>
                                
                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                                    </div>
                
                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <input type="submit" value="Create" class="btn bg-primary-color text-white btn-block fa-lg mb-3 w-100">
                                    </div>
                
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop