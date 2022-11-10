@extends("layouts.app")
@section("pageTitle", "Registration")
@section("css")
    <link href="{{asset('css/register.css')}}" rel="stylesheet">
@stop
@section("content")
<div class="container box">
    <h1 class="mb-3 text-center"><strong><i>Register</i></strong></h1>
    @if(session("otpModal")=="yes")
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(function(){
                $("#otpModal").modal("show");
            });
        </script>
    @elseif(session("error"))
        <div class="error mb-3">{!!session("error")!!}</div>
    @endif
    <div class="form p-4">
        <form id="register-form" method="post" action="{{route('display-otp')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" maxlength=50 required>
            </div>
            <div class="form-group mt-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="form-group mt-3">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" minlength=8 maxlength=20 required>
            </div>
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" required>
                <label class="form-check-label" for="remember">I agree to the <a href="{{route('terms-and-conditions')}}">Terms and Conditions</a></label><br/>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary btn-register">Register</button>
            </div>
        </form>
    </div>
    <div class="login-link text-center my-3">
        <strong>
            Already Have An Account?
            <a href="{{route('login')}}">Login Here</a>
        </strong>
    </div>
</div>

<div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<h5 class="modal-title" id="otpModal">Verify OTPs</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form p-4">
                    @if($errors->any())
                        <div class="alert error mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->get("error"))
                        <div class="error mb-3">{!!session()->get("error")!!}</div>
                    @elseif(session("successResend"))
                        <div class="success mb-3">{{session("successResend")}}</div>
                    @endif
					<form id="otp-form" method="post" action="{{route('verify-otp')}}">
            			{{ csrf_field() }}
						<div class="form-group mt-3">
							<label for="name">Email OTP:</label>
							<input type="text" class="form-control" name="email-otp" id="email-otp" maxlength="6" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                            <span class="error email"></span>
                        </div>
                        <div class="form-group text-right mt-3">
							<a href="{{route('resend-email-otp')}}" class="resend text-right">Resend Email OTP</a>
                        </div>
					</form>
				</div>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-outline" id="register" value="Verify OTP"/>
			</div>
        </div>
    </div>
</div>
@stop

@section("js")
    <script src="{{asset('js/jquery.validate.js')}}"></script>
    <script src="{{asset('js/form-validation.js')}}"></script>
    <script style="text/javascript">
        $("#register").click(function(){
            $(".email").html("");
            $email=$("#email-otp").val()+"";
            if($email.length<6){
                $(".email").html("Please enter 6 digits email OTP.");
            }
            else{
                $("#otp-form").submit();
            }
        });
    </script>
@stop