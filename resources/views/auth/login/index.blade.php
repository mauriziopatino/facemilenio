@extends('layouts.auth')
 
@section('title', 'Login')

@section('content')
<section class="h-100 login-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">
  
                    <div class="text-center">
                        <img class="mb-5" src="{{url('/images/facemilenio.png')}}"
                        style="width: 185px;" alt="logo">
                    </div>
  
                  <form>
                    <p>Please login to your account</p>
  
                    <div class="form-outline mb-4">
                        <input type="email" id="email" class="form-control" placeholder="Email" />
                    </div>
  
                    <div class="form-outline mb-4">
                        <input type="password" id="password" class="form-control" placeholder="Password" />
                    </div>
  
                    <div class="text-center pt-1 mb-5 pb-1">
                        <a href="" class="btn bg-primary-color text-white btn-block fa-lg mb-3 w-100">Log in</a>
                    </div>
  
                    <div class="d-flex align-items-center justify-content-center pb-4">
                        <p class="mb-0 me-2">Don't have an account?</p>
                        <a href="{{url('/register')}}" class="btn btn-outline-success">Create new</a>
                    </div>
  
                  </form>
  
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center bg-primary-color">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4">Welcome to FaceMilenio family, the social network that connects you with people from all over the world. </h4>
                  <p class="small mb-0">Facemilenio is more than just a social network, 
                    it's a platform that allows you to share your thoughts, interests, 
                    and passions with people from all over the world. Whether you want to share your photographs, 
                    or simply connect with others who share your interests, Facemilenio is the perfect place to do it.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop