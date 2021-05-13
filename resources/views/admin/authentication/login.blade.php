<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="{{ asset('admin/css/library/template.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/custom/base.css') }}" rel="stylesheet" />
    </head>
    <body class="base-bg-gray">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center my-4 base-font-title">Administration system</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="/admin/login">
                                            @csrf
                                            <div class="form-group">
                                                <label class="small mb-1" for="txt_username">Username</label>
                                                <input class="form-control py-4" id="txt_username" type="text" placeholder="Enter email address" name="txt_username" value="{{ $username }}" />
                                                @error('txt_username')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="txt_password">Password</label>
                                                <input class="form-control py-4" id="txt_password" type="password" placeholder="Enter password" name="txt_password" value="{{ $password }}" />
                                                @error('txt_password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="cb_remember_password" type="checkbox" name="cb_remember_password" {{$remmember}} />
                                                    <label class="custom-control-label" for="cb_remember_password" >Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group text-right mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <input type="submit" class="btn base-bg-primary text-white" value="Login">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">Life is not a rehasal, so you better get on with it!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="{{ asset('js/jquery-3.5.1.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('js/library/font-awesome-5.13.0.all.min.js') }}"></script>
        <script src="{{ asset('admin/js/library/start-bootstrap.js') }}"></script>
    </body>
</html>
