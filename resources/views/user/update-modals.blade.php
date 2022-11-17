<div class="modal fade" id="updateNameModal" tabindex="-1" aria-labelledby="updateNameModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateNameModalLabel">Update Name</h5>
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
                    <form id="name-form" method="post" action="{{route('update-name')}}">
                        {{ csrf_field() }}
                        <div class="form-group mt-3">
                            <label for="name"class="form-label">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-outline" id="updateNameDb" value="Update Name"/>
            </div>
		</div>
	</div>
</div>

<div class="modal fade" id="updateEmailModal" tabindex="-1" aria-labelledby="updateEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateEmailModalLabel">Update Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form p-4">
                    @if(session("otpError"))
                        <div class="error mb-3 p-3">{{session("otpError")}}</div>
                    @endif
                    <form id="email-form" method="post" action="{{route('verify-email')}}">
                        {{ csrf_field() }}
                        <div class="form-group mt-3">
                            <label for="name"class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" required/>
                            <input type="hidden" class="form-control" name="emailName" id="emailName"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-outline" id="updateEmailDb" value="Update Email"/>
            </div>
		</div>
	</div>
</div>

<div class="modal fade" id="otpEmailModal" tabindex="-1" aria-labelledby="otpEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<h5 class="modal-title" id="otpEmailModal">Verify Email OTP</h5>
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
                    @elseif(session("otpError"))
                        <div class="error mb-3 p-3">{{session("otpError")}}</div>
                    @elseif(session("successResend"))
                        <div class="success mb-3 p-3">{{session("successResend")}}</div>
                    @endif
					<form id="otp-email-form" method="post" action="{{route('verify-email-otp')}}">
            			{{ csrf_field() }}
						<div class="form-group mt-3">
							<label for="name">Email OTP:</label>
							<input type="text" class="form-control" name="email-otp" id="email-otp" maxlength="6" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                        </div>
                        <div class="form-group text-right mt-3">
							<a href="{{route('resend-email-otp')}}" class="resend text-right">Resend OTP</a>
                        </div>
					</form>
				</div>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-outline" id="verify-email-otp" value="Verify OTP"/>
			</div>
        </div>
    </div>
</div>

<div class="modal fade" id="changePhotoModal" tabindex="-1" aria-labelledby="changePhotoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<h5 class="modal-title" id="changePhotoModal">Change Photo</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form p-4">
                    <div class="error mb-3 p-3">{{session("otpError")}}</div>
					<form id="change-photo-form" method="post" action="{{route('change-photo')}}" enctype="multipart/form-data">
            			{{ csrf_field() }}
						<div class="form-group mt-3">
							<label for="name">Upload Photo:</label>
							<input type="file" class="form-control form-control-sm" name="cust-photo" id="cust-photo" accept="image/*" required/>
                        </div>
					</form>
				</div>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-outline" id="change-photo-btn" value="Change Photo"/>
			</div>
        </div>
    </div>
</div>

<div class="modal fade" id="deletePhotoModal" tabindex="-1" aria-labelledby="deletePhotoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
				<h5 class="modal-title" id="deletePhotoModal">Delee Photo</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete your photo
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
				<a type="button" class="btn btn-outline" id="delete-photo-btn" href="{{route('delete-photo')}}">Delete Photo</a>
			</div>
        </div>
    </div>
</div>