@extends('admin')

@section('container')
<form action='/products/edit/{{ $obj->id ?? 0 }}' method='post'>
	@csrf
	<div class='form-group d-none'>
		<label for='id'>Id</label>
		<input type='number' class='form-control'
		name='id' id='id' value='{{ $obj->id ?? 0 }}' placeholder='Id'>
	</div>
	<div class='form-group'>
		<label for='productName'>Product name</label>
		<input type='text' class='form-control'
		name='productName' id='productName' value='{{$obj->productName}}' placeholder='Productname'>
	</div>
	<div class='form-group'>
		<label for='productTypeName'>Product type name</label>
		<input type='text' class='form-control'
		name='productTypeName' id='productTypeName' value='{{$obj->productTypeName}}' placeholder='Producttypename'>
	</div>
	<div class='form-group'>
		<label for='numeracioTerminal'>Numeracio terminal</label>
		<input type='number' class='form-control'
		name='numeracioTerminal' id='numeracioTerminal' value='{{$obj->numeracioTerminal}}' placeholder='Numeracioterminal'>
	</div>

	<label for='numeracioTerminal'>Customer</label>
	<select class="searchinpage form-control mb-4" name='customerId' >
		@foreach ($users as $obje)
		<option
		<?php if ( $obje->customerId  ==  $obj->customerId  ): ?>
			selected
		<?php endif; ?>

		value="{{ $obje->customerId }}">
			{{ $obje->givenName }} /
			{{ $obje->familyName1 }}
		</option>
		@endforeach
	</select>
<!--
	<div class='form-group'>
		<label for='soldAt'>Soldat</label>
		<input type='number' class='form-control'
		name='soldAt' id='soldAt' value='{{$obj->soldAt}}' placeholder='Soldat'>
	</div> -->

	<input type='submit' class='btn btn-primary' value='Save'>
	<!-- <a href='.../del/{{$obj->id}}' class='btn btn-primary'> Delete </a> -->
</form>
@endsection
