@extends('admin.layouts.app')
@section('pageTitle', 'Edit Strategy')
@section('content')
    <div class="p-2 active-cont">
	    <h1 class="mb-3 text-center section-title">Edit Strategy</h1>
        <div class="form p-4 mx-auto" style="width: 70%">
            <form id="add-strategy-short-form" method="post" action="/admin/update-strategy-short" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" maxlength="50" value="{{$strategy->name}}" required>
            </div>
            <div class="form-group mt-3">
                <label for="desc">Description:</label>
                <textarea class="form-control" name="desc" id="desc" required>{{$strategy->description}}</textarea>
            </div>
            <div class="form-group mt-3">
                {{$strategy->type}}
                <label for="type" class="form-label">Type:</label>
                <select class="form-control" name="type" id="type">
                    <option value="Intraday" {{$strategy->type=='Intraday'?'selected':''}}>Intraday</option>
                    <option value="BTST" {{$strategy->type=='BTST'?'selected':''}}>BTST</option>
                    <option value="Positional" {{$strategy->type=='Positional'?'selected':''}}>Positional</option>
                    <option value="Investment" {{$strategy->type=='Investment'?'selected':''}}>Investment</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="video" class="form-label">Video:</label>
                <br/>Current Video: {{$strategy->video}}
                <input type="file" class="form-control form-control-sm" name="video" id="video" accept="video/*">
            </div>
            <div class="form-group mt-3">
                <label for="brief" class="form-label">Brief Strategy:</label>
                <select class="form-control" name="brief" id="brief">
                    @foreach($brief as $strat)
                        <option value="{{$strat->id}}" {{$strategy->strategy_brief_id==$strat->id?'selected':''}}>{{$strat->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="hidden" name="id" value="{{$strategy->id}}"/>
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="btn btn-outline" value="Update Strategy"/>
            </div>
        </div>
    </div>
@stop