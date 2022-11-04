<x-guest-layout>
<div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                            <div class="img" style="background-image:  url(loginTemplate/images/hms-cover.png);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Register</h3>
                                </div>
                                       
                            </div>

                        <x-jet-validation-errors class="mb-4" />
                        <form action="{{route('register')}}" method="post" class="signin-form">
                            @csrf
                                    <div class="form-group mt-3">
                                        <input type="text" name="name" id="name" class="form-control" :value="old('name')" required autofocus autocomplete="name" >
                                         <label class="form-control-placeholder" for="name">Name</label>
                                     </div>

                                     <div class="form-group mt-3">
                                        <input type="email" name="email" id="email" class="form-control" :value="old('email')" required>
                                         <label class="form-control-placeholder" for="email">Email</label>
                                     </div>

                                     <div class="form-group mt-3">
                                        <input type="text" name="phone" id="phone" class="form-control"  :value="old('phone')" required autofocus autocomplete="phone" >
                                         <label class="form-control-placeholder" for="phone">Phone</label>
                                     </div>

                                     <div class="form-group mt-3">
                                        <input type="text" name="address" id="address" class="form-control"  :value="old('address')" required autofocus autocomplete="address" >
                                         <label class="form-control-placeholder" for="address">Address</label>
                                     </div>

                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" >
                                        <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>

                                    <div class="form-group">
                                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation"  required autocomplete="new-password" >
                                        <label class="form-control-placeholder" for="password_confirmation">Confirm Password</label>
                                    <span toggle="#password_confirmation" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Register</button>
                                    </div>

                                  
                        </form>
                             <p class="text-center">Already registered? <a  href="{{route('login')}}">    Login</a></p>
                        </div>
                    </div>
                    </div>
            </div>
</div>
</x-guest-layout>