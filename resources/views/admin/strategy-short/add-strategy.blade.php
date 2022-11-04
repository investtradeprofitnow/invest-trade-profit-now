@extends("admin.layouts.app")
@section("pageTitle", "Add Strategy")
@section("content")
    <div class="p-2 active-cont">
	    <h1 class="mb-3 text-center section-title">Add Strategy</h1>
        <div class="form p-4 mx-auto" style="width: 70%">
            <form id="add-strategy-short-form" method="post" action="{{route('save-strategy-short')}}" enctype="multipart/form-data">
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
                <label for="video" class="form-label">Purchase Link:</label>
                <input type="text" class="form-control" name="link" id="link" required>
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="btn btn-outline" value="Save Strategy"/>
            </div>
        </div>
    </div>
@stop