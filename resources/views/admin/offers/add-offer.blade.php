@extends('admin.layouts.app')
@section('pageTitle', 'Add Offer')
@section('content')
    <div class="p-2 active-cont">
	    <h1 class="mb-3 text-center section-title">Add Offer</h1>
        <div class="form p-4 mx-auto" style="width: 70%">
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
            <div class="form-group mt-3">
                <label for="type" class="form-label">Discount:</label>
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
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="btn btn-outline" id="submit" value="Save Offer"/>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript">
        $("#submit").click(function(){
            $("#strategy_name").val($('#strategy_id').find(":selected").text());
        });
    </script>
@stop