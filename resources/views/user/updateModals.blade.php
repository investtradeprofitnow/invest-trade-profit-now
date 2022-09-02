<div class="modal fade" id="updateNameModal" tabindex="-1" aria-labelledby="updateNameModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateNameModalLabel">Update Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form p-4">
                    <form id="name-form" method="post" action="/update-details/name">
                        {{ csrf_field() }}
                        <div class="form-group mt-3">
                            <label for="name"class="form-label">Name:</label>
                            <input type="text" class="form-control" name="name" id="name">
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
                    <form id="email-form" method="post" action="/verify-email">
                        {{ csrf_field() }}
                        <div class="form-group mt-3">
                            <label for="name"class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" id="email"/>
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
                    @if(session("error"))
                        <div class="error mb-3">{{session("error")}}</div>
                    @endif
					<form id="otp-email-form" method="post" action="{{route('verify-email-otp')}}">
            			{{ csrf_field() }}
						<div class="form-group mt-3">
							<label for="name">Email OTP:</label>
							<input type="text" class="form-control" name="email-otp" id="email-otp" maxlength="6" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
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