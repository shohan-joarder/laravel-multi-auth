@extends('user.layouts.login_layout')
@section('content-wrapper')
<div class="row">
    <div class="col-md-3 register-left">
        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
        <h3>Welcome</h3>
        <a class="btn text-light" href="{{route('register')}}">Register</a>
        <!-- <input type="submit" name="" value="Register"/><br/> -->
    </div>
    <div class="col-md-9 register-right">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h3 class="register-heading">Login</h3>
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <form action="{{route('login')}}" method="POST">
                @csrf
                    <div class="row register-form">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Your Email *" value="" />
                                @error('email')
                                    <span class="alert text-danger pl-0 pb-1">{{$errors->first('email')}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password *" value="" />
                                @error('password')
                                    <span class="alert text-danger pl-0 pb-1">{{$errors->first('password')}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" name="confirm_password" class="form-control"  placeholder="Confirm Password *" value="" />
                                @error('confirm_password')
                                    <span class="alert text-danger pl-0 pb-1">{{$errors->first('confirm_password')}}</span>
                                @enderror
                            </div>
                            <input type="submit" class="btnRegister"  value="Login"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    @endsection
