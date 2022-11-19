@extends('layout.app')

@section('title', 'eTicketing | Login Page')

@section('body')
    <div class="login-section">
        <div class="wrapper">
            <div class="logo">
                <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt="">
            </div>
            <div class="text-center mt-4 name">
                Twitter
            </div>
            <div class="results">
                        @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{Session::get('fail')}}
                        </div>
                        @endif
                    </div>
            <form action="{{url('/check-login')}}" method="post" enctype="multipart/form-data" class="validate-form mt-2">
              @csrf
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="text" name="email" id="userName" placeholder="Email">
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password" name="password" id="pwd" placeholder="Password">
                </div>
                <button class="btn mt-3">Login</button>
            </form>
            <div class="text-center fs-6">
                <a href="#">Forget password?</a> or <a href="#">Sign up</a>
            </div>
        </div>
    </div>
@endsection