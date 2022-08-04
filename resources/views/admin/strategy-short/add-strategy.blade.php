@extends('admin.layouts.app')
@section('pageTitle', 'Add Strategy List')
@section('content')
    <div class="p-2 active-cont">
	    <h1 class="mb-3 text-center section-title">Add Team Member</h1>
        <div class="form p-4 mx-auto" style="width: 70%">
            <form id="add-member-form" method="post" action="/saveStrategyShort">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" maxlength="50" required>
            </div>
            <div class="form-group mt-3">
                <label for="designation">Description:</label>
                <textarea class="form-control" name="desc" id="desc" required></textarea>
            </div>
            <div class="form-group mt-3">
                <label for="photo" class="form-label">Service Name:</label>
                <select class="form-control" name="service" id="service">
                    <option value="Intraday">Intraday</option>
                    <option value="BTST">BTST</option>
                    <option value="Positional">Positional</option>
                    <option value="Investment">Investment</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="video" class="form-label">Video:</label>
                <input type="file" class="form-control form-control-sm" name="video" id="video" required>
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="btn btn-outline" value="Save Strategy"/>
            </div>
        </div>
    </div>
@stop