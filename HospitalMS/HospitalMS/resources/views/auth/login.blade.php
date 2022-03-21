<x-guest-layout>
<div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                            <div class="img" style="background-image: url(loginTemplate/images/hms-cover.png);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                                  
                            </div>

                        <form action="{{route('login')}}" method="post" class="signin-form">
                            @csrf
                                    <div class="form-group mt-3">
                                        <input type="email" name="email" id="email" class="form-control"  :value="old('email')" required autofocus>
                                         <label class="form-control-placeholder" for="email">Email</label>
                                        </div>
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control" name="password"  required autocomplete="current-password" >
                                        <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                    </div>
                                    <div class="form-group d-md-flex">
                                        <div class="w-50 text-left">
                                                  <label class="checkbox-wrap checkbox-primary mb-0" for="remember_me">Remember Me
                                                         <input type="checkbox" checked name="remember" id="remember_me" >
                                                          <span class="checkmark"></span>
                                                    </label>
                                         </div>
                                             <div class="w-50 text-md-right">
                                                  <a href="{{route('password.request')}}">Forgot Password</a>
                                             </div>
                                    </div>
                        </form>
                        <p class="text-center">Not a member? <a href="{{route('register')}}"> Register</a></p>
                        </div>
                    </div>
                    </div>
            </div>
</div>
</x-guest-layout>