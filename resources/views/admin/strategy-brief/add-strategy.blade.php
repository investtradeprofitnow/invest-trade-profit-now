@extends('admin.layouts.app')
@section('pageTitle', 'Add Strategy')
@section('content')
    <div class="p-2 active-cont">
	    <h1 class="mb-3 text-center section-title">Add Strategy</h1>
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
            <form id="add-strategy-brief-form" method="post" action="{{route('save-strategy-brief')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" maxlength="50" required>
            </div>
            <div class="form-group mt-3">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="description" required></textarea>
            </div>
            <div class="form-group mt-3">
                <label for="type" class="form-label">Type:</label>
                <select class="form-control" name="type" id="type">
                    <option value="Intraday" selected>Intraday</option>
                    <option value="BTST">BTST</option>
                    <option value="Positional">Positional</option>
                    <option value="Investment">Investment</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="video" class="form-label">Video:</label>
                <input type="file" class="form-control form-control-sm" name="video" id="video" accept="video/*" required>
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="btn btn-outline" value="Save Strategy"/>
            </div>
        </div>
    </div>
@stop