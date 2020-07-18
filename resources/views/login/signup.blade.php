<!doctype html>
<html lang="en">


<!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/pages-register-boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Mar 2020 09:50:38 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Register Boxed - ArchitectUI HTML Bootstrap 4 Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

<link href="main.87c0748b313a1dda75f5.css" rel="stylesheet"></head>

<body>
<div class="app-container app-theme-white body-tabs-shadow">
    <div class="app-container">
        <div class="h-100 bg-premium-dark">
            <div class="d-flex h-100 justify-content-center align-items-center">
                <div class="mx-auto app-login-box col-md-8">
                    <div class="app-logo-inverse mx-auto mb-3"></div>
                    <div class="modal-dialog w-100">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h5 class="modal-title">
                                    <h4 class="mt-2">
                                        <div>Welcome,</div>
                                        <span>It only takes a <span class="text-success">few seconds</span> to create your account</span></h4>
                                </h5>
                                <div class="divider row"></div>
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{session()->get('message')}}
                                    </div>
                                @endif    
                                <form class="" method="POST" action="{{url()->to('signup')}}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="position-relative form-group">
                                        <label for="name" class="">{{_('Name')}}</label>
                                        <input name="name" id="name" placeholder="Name" type="text" class="form-control  @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>              

                                    <div class="position-relative form-group">
                                        <label for="email" class="">{{_('Email')}}</label>
                                        <input name="email" id="email" placeholder="name@example.com" type="text" class="form-control @error('email') is-invalid @enderror">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="examplePassword11" class="">{{_('Password')}}</label>
                                                <input name="password" id="password11" placeholder="password placeholder" type="password" class="form-control  @error('password') is-invalid @enderror">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="confirm_password" class="">{{_('Confirm Password')}}</label>
                                                <input name="confirm_password" id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror">
                                                @error('confirm_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="mobile" class="">{{_('Mobile')}}</label>
                                                <input name="mobile" id="mobile" placeholder="01xxxxxxxxx" type="" class="form-control @error('mobile') is-invalid @enderror">
                                                @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror    
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="image" class="">{{_('Image')}}</label>
                                                <input name="image" id="image" type="file" class="form-control-file">
                                            </div>
                                        </div>                                           
                                    </div>

                                    <div class="form-row">
                                                                            
                                    </div>
                                    <div class="modal-footer d-block text-center">
                                        <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg" type="submit">{{_('Create Account')}}</button>
                                    </div>                                    
                                </form>
                                <!-- <div class="mt-3 position-relative form-check"><input name="check" id="exampleCheck" type="checkbox" class="form-check-input"><label for="exampleCheck" class="form-check-label">Accept our <a href="javascript:void(0);">Terms
                                    and Conditions</a>.</label></div> -->
                                <div class="divider row"></div>
                                <h6 class="mb-0">Already have an account? <a href="{{url()->to('login')}}" class="text-primary">Sign in</a></h6>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="text-center text-white opacity-8 mt-3">Copyright © ArchitectUI 2019</div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="assets/scripts/main.87c0748b313a1dda75f5.js"></script></body>

<!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/pages-register-boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Mar 2020 09:50:38 GMT -->
</html>
