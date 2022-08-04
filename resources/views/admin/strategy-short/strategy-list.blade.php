@extends('admin.layouts.app')
@section('pageTitle', 'Strategy List')
@section('content')
<div class="p-2 active-cont mt-5">
	<h1 class="mb-3 text-center section-title">Strategy List (Short)</h1>	
	<table class="table mx-auto text-center">
		<thead>
			<tr>
				<th scope="col">Sr. No.</th>
				<th scope="col">Name</th>
				<th scope="col">Description</th>
				<th scope="col">Video</th>
				<th scope="col">Operation</th>
			</tr>
		</thead>
		<tbody>
			@foreach($strategies as $strategy)
				<tr>
					@php
						$index=$strategy->id;
					@endphp
					<td scope="row">{{$index}}</td>
					<td id="{{'name'.$index}}">{{$strategy->name}}</td>
					<td id="{{'desc'.$index}}">{{$strategy->description}}</td>
					<td id="{{'video'.$index}}">{{$strategy->video}}</td>
					<td class="text-center">
						<button type="button" class="btn btn-outline edit-button" id="{{'edit'.$index}}" data-bs-toggle="modal" data-bs-target="#custInfoModal">
							Edit
						</button>
						<button type="button" class="btn btn-outline edit-button" id="{{'delete'.$index}}" data-bs-toggle="modal" data-bs-target="#custInfoModal">
							Delete
						</button>
						<input type="hidden" id="{{'cust-id'.$index}}" value="{{$index}}"/>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
        <div class="text-right pr-3" style="margin-right: 1vw;">
            <a class="btn btn-outline" href="{{route('add-strategy-short')}}">Add Strategy</a>
        </div>
</div>
@stop