@extends('layout.app')

@section('title', 'eTicketing | Registration')

@push('links')
    <style>
        .card-img-left {
  width: 45%;
  /* Link to your background image using in the property below! */
  background: scroll center url('https://source.unsplash.com/WEQbe2jBg40/414x512');
  background-size: cover;
}

.btn-login {
  font-size: 0.9rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
}

.btn-google {
  color: white !important;
  background-color: #ea4335;
}

.btn-facebook {
  color: white !important;
  background-color: #3b5998;
}
    </style>
@endpush

@section('body')
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
          <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
            <div class="card-img-left d-none d-md-flex">
              <!-- Background image for card set in CSS! -->
            </div>
            <div class="card-body p-4 p-sm-5">
            @if(Session::get('success'))
                                                <div class="alert alert-success">
                                                    {{Session::get('success')}}
                                                </div>
                                                @endif
                                                @if(Session::get('fail'))
                                                <div class="alert alert-danger">
                                                    {{Session::get('fail')}}
                                                </div>
                                                @endif
              <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5>

              <form action="{{url('/store-registration')}}" method="post" enctype="multipart/form-data" class="validate-form mt-2">
              @csrf
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInputUsername" name="username" value="{{old('username')}}"  placeholder="myusername"  >
                  <span class="text-danger">@error('username'){{$message}}@enderror</span>
                  <label for="floatingInputUsername">Username</label>
                </div>
  
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="floatingInputEmail" name="email" value="{{old('email')}}"placeholder="name@example.com">
                  <span class="text-danger">@error('email'){{$message}}@enderror</span>
                  <label for="floatingInputEmail">Email address</label>
                </div>
  
                <hr>
  
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                  <span class="text-danger">@error('password'){{$message}}@enderror</span>
                  <label for="floatingPassword">Password</label>
                </div>
  
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="floatingPasswordConfirm" name="password_confirmation" placeholder="Confirm Password">
                  <span class="text-danger">@error('password'){{$message}}@enderror</span>
                  <label for="floatingPasswordConfirm">Confirm Password</label>
                </div>
  
                <div class="d-grid mb-2">
                  <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Register</button>
                </div>
  
                <a class="d-block text-center mt-2 small" href="#">Have an account? Sign In</a>
  
                <hr class="my-4">
  
                <!-- <div class="d-grid mb-2">
                  <button class="btn btn-lg btn-google btn-login fw-bold text-uppercase" type="submit">
                    <i class="fab fa-google me-2"></i> Sign up with Google
                  </button>
                </div>
   -->
                <!-- <div class="d-grid">
                  <button class="btn btn-lg btn-facebook btn-login fw-bold text-uppercase" type="submit">
                    <i class="fab fa-facebook-f me-2"></i> Sign up with Facebook
                  </button>
                </div> -->
  
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection