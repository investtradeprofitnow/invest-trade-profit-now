@extends("admin.layouts.app")
@section("pageTitle", "Add Offer")
@section("content")
    <div class="p-2 active-cont">
	    <h1 class="mb-3 text-center section-title">Add Offer</h1>
        <div class="form p-4 mx-auto" style="width: 70%">
            @if($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="add-offer-form" method="post" action="/admin/save-offer">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Strategy Name:</label>
                    <select class="form-control" name="strategy_id" id="strategy_id">
                        @foreach($strategies as $strategy)
                            <option value="{{$strategy->id}}">{{$strategy->name}}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="strategy_name" id="strategy_name"/>
                </div>
                <div class="form-group mt-3">
                    <label for="desc">Description:</label>
                    <textarea class="form-control" name="desc" id="desc" required></textarea>
                </div>
                <label for="type" class="form-label mt-3">Discount:</label>
                <div class="row">
                    <div class="col-4">
                        <input type="text" class="form-control" name="discount" id="discount" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required>
                    </div>
                    <div class="col-4">
                        <select class="form-select form-select-md mb-3" name="type" id="type">
                            <option value="percent">Percent</option>
                            <option value="rupees">Rupees</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-outline" id="submit" value="Save Offer"/>
                </div>
            </form>
        </div>
    </div>
@stop
@section("js")
    <script type="text/javascript">
        $("#submit").click(function(){
            $("#strategy_name").val($("#strategy_id").find(":selected").text());
            alert($("#strategy_id").find(":selected").text());
        });
    </script>
@stop