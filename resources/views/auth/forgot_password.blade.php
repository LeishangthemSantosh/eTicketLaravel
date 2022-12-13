@extends('layout.app')

@section('title', 'eTicketing | Forgot Password Page')

@section('body')
    <div class="login-section">
        <div class="wrapper">
            <div class="logo">
                <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt="">
            </div>
            <div class="text-center mt-4 name">
                Forgot Password
            </div>
            <div class="results">
                        @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{Session::get('fail')}}
                        </div>
                        @endif
                        
                        @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    </div>
            <form action="{{url('/submit-forgot-password')}}" method="post" enctype="multipart/form-data" class="validate-form mt-2">
              @csrf
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="text" name="email" id="userName" placeholder="Enter Email">
                </div>

                <button class="btn mt-3">Send Link</button>
            </form>
           
        </div>
    </div>
@endsection