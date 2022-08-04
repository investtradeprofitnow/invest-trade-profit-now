@extends('admin.layouts.app')
@section('pageTitle', 'Home')
@section('css')
	<link href="{{asset('css/admin-home.css')}}" rel='stylesheet'>
@stop
@section('content')    
<div class="p-2 active-cont">
	<h1 class="text-center">Welcome To The Admin Section</h1>
</div>
@stop