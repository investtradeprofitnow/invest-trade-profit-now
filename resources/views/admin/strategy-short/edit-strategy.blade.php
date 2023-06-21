@extends("admin.layouts.app")
@section("pageTitle", "Edit Strategy")
@section("content")
    <div class="p-2 active-cont">
	    <h1 class="mb-3 text-center section-title">Edit Strategy</h1>
        <div class="form p-4 mx-auto" style="width: 70%">
            <form id="add-strategy-short-form" method="post" action="{{route('update-strategy-short')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if($errors->any())
                <div class="alert error mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" maxlength="50" value="{{$strategy->name}}" required>
            </div>
            <div class="form-group mt-3">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="description" required>{{$strategy->description}}</textarea>
            </div>
            <div class="form-group mt-3">
                <label for="type" class="form-label">Type:</label>
                <select class="form-control" name="type" id="type">
                    <option value="Intraday" {{$strategy->type=="Intraday"?"selected":""}}>Intraday</option>
                    <option value="BTST" {{$strategy->type=="BTST"?"selected":""}}>BTST</option>
                    <option value="Positional" {{$strategy->type=="Positional"?"selected":""}}>Positional</option>
                    <option value="Investment" {{$strategy->type=="Investment"?"selected":""}}>Investment</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="photo" class="form-label">Display Photo:</label>
                    <br/>Current Photo: {{$strategy->photo}}
                <input type="file" class="form-control form-control-sm" name="photo" id="photo" accept="photo/*">
            </div>
            <div class="form-group mt-3">
                <label for="link" class="form-label">Purchase Link:</label>
                <input type="text" class="form-control" name="link" id="link" value="{{$strategy->link}}">
            </div>
            <div class="form-group mt-3">
                <label for="active" class="form-label">Active:</label>
                <br/>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" id="active_yes" value="Yes" {{$strategy->active=="Yes"?"checked":""}}>
                    <label class="form-check-label" for="active_yes">
                        Yes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" id="active_no" value="No" {{$strategy->active=="No"?"checked":""}}>
                    <label class="form-check-label" for="active_no">
                        No
                    </label>
                </div>
            </div>
            <div>
                <input type="hidden" name="id" value="{{$strategy->strategy_short_id}}"/>
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="btn btn-outline" value="Update Strategy"/>
            </div>
        </div>
    </div>
@stop