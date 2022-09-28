@extends("admin.layouts.app")
@section("pageTitle", "Add Coupon")
@section("content")
    <div class="p-2 active-cont">
	    <h1 class="mb-3 text-center section-title">Add Coupon</h1>
        <div class="form p-4 mx-auto" style="width: 70%">
            @if($errors->any())
                <div class="alert error mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="add-coupon-form" method="post" action="{{route('save-coupon')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="code">Coupon Code:</label>
                <input type="text" class="form-control" name="code" id="code" maxlength="20" required>
            </div>
            <div class="form-group mt-3">
                <label for="desc">Description:</label>
                <textarea class="form-control" name="desc" id="desc" required></textarea>
            </div>
            <div class="form-group mt-3">
                <label for="type" class="form-label">Discount:</label>
                <div class="row">
                    <div class="col-4">
                        <input type="text" class="form-control" name="discount" id="discount" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                    </div>
                    <div class="col-4">
                        <select class="form-select form-select-md mb-3" name="type" id="type">
                            <option value="percent">Percent</option>
                            <option value="rupees">Rupees</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="btn btn-outline" id="submit" value="Save Coupon"/>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{{asset('js/jquery.validate.js')}}"></script>
    <script src="{{asset('js/admin-form-validation.js')}}"></script>
@stop