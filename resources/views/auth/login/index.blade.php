@extends('layouts.auth')
 
@section('title', 'Login')

@section('content')
<section class="h-100 login-form">
	<div class="container py-5 h-100">
    	<div class="row d-flex justify-content-center align-items-center h-100">
          	<div class="col-xl-10">
            	<div class="card rounded-start text-black">
              		<div class="row g-0">
                		<div class="col-lg-6">
                  			<div class="card-body p-md-5 mx-md-4">
  
                    			<div class="text-center">
                    			    <img class="mb-5" src="{{url('/images/facemilenio.png')}}"
                    			    style="width: 185px;" alt="logo">
                    			</div>
  
                  				<form method="post" action="{{route('login.login')}}" enctype="multipart/form-data">
									@csrf
                    				<p>Please login to your account</p>
									
                    				<div class="form-outline mb-4">
                    				    <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{old('email')}}" required/>
                    				</div>
								
                    				<div class="form-outline mb-4">
                    				    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required />
                    				</div>
								
                    				<div class="text-center pt-1 mb-5 pb-1">
										<input type="submit" value="Log in" class="btn bg-primary-color text-white btn-block fa-lg mb-3 w-100">
                    				</div>
								
                    				<div class="d-flex align-items-center justify-content-center pb-4">
                    				    <p class="mb-0 me-2">Don't have an account?</p>
                    				    <a href="{{url('/register')}}" class="btn btn-outline-success">Create new</a>
                    				</div>
								</form>
                			</div>
              			</div>
              			<div class="col-lg-6 d-flex align-items-center bg-primary-color rounded-end">
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

@section('scripts')

@endsection