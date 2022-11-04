<x-guest-layout>
<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">HMS - Verify</h2>
				</div>
			</div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                            <div class="img" style="background-image: url(loginTemplate/images/bg-1.jpg);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <p class="mb-4 text-danger"  >Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
                                </div>
                                    
                            </div>
                            @if (session('status') == 'verification-link-sent')
                                <div class="d-flex">
                                    <div class="w-100">
                                        <p class="mb-4">A new verification link has been sent to the email address you provided during registration.</p>
                                    </div>
                                        
                                </div>
                            @endif

                        <form action="{{route('verification.send') }}" method="post" class="signin-form">
                            @csrf
                                    
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Resend Verification Email</button>
                                    </div>
                                   
                        </form>

                        <form action="{{route('logout') }}" method="post" class="signin-form">
                            @csrf
                                    
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Log Out</button>
                                    </div>
                                   
                        </form>
                    
                        </div>
                    </div>
                    </div>
            </div>
</div>
</x-guest-layout>