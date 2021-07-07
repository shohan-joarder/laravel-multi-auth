@extends('user.layouts.login_layout')
@section('content-wrapper')
<div class="row">
    <div class="col-md-3 register-left">
        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
        <h3>Welcome</h3>
        <!-- <p>You are 30 seconds away from earning your own money!</p> -->
        <!-- <input type="submit" name="" value="Login"/><br/> -->
        <a class="btn text-light" href="{{route('login')}}">Login</a>
    </div>
    <div class="col-md-9 register-right">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h3 class="register-heading">Register</h3>
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="row register-form">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="User Name *" value="" />
                                @error('name')
                                    <span class="alert text-danger pl-0 pb-1">{{$errors->first('name')}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="first_name" class="form-control" placeholder="First Name *" value="" />
                                @error('first_name')
                                    <span class="alert text-danger pl-0 pb-1">{{$errors->first('first_name')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name *" value="" />
                                @error('last_name')
                                    <span class="alert text-danger pl-0 pb-1">{{$errors->first('last_name')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password *" value="" />
                                @error('password')
                                    <span class="alert text-danger pl-0 pb-1">{{$errors->first('password')}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="maxl">
                                    <label class="radio inline">
                                        <input type="radio" name="gender" value="1" checked>
                                        <span> Male </span>
                                    </label>
                                    <label class="radio inline">
                                        <input type="radio" name="gender" value="0">
                                        <span>Female </span>
                                    </label>
                                    @error('gender')
                                        <span class="alert text-danger pl-0 pb-1">{{$errors->first('gender')}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Your Email *" value="" />
                                @error('email')
                                    <span class="alert text-danger pl-0 pb-1">{{$errors->first('email')}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Your Phone *" value="" />
                                @error('phone')
                                    <span class="alert text-danger pl-0 pb-1">{{$errors->first('phone')}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" name="confirm_password" class="form-control"  placeholder="Confirm Password *" value="" />
                                @error('confirm_password')
                                    <span class="alert text-danger pl-0 pb-1">{{$errors->first('confirm_password')}}</span>
                                @enderror
                            </div>

                            <input type="submit" class="btnRegister"  value="Register"/>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
    @endsection
