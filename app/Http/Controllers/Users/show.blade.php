@extends('admin')

@section('container')
<form action='/edit/{{ $obj->customerId ?? 0 }}' method='post'>
	@csrf
	<div class='form-group'>
		<input type='number' class='form-control' hidden
		name='customerId' id='customerId' value='{{$obj->customerId}}' placeholder='Customerid'>
	</div>
	<div class='form-group'>
		<label for='docType'>Doctype</label>
		<input type='text' class='form-control'
		name='docType' id='docType' value='{{$obj->docType}}' placeholder='Doctype'>
	</div>
	<div class='form-group'>
		<label for='docNum'>Docnum</label>
		<input type='text' class='form-control'
		name='docNum' id='docNum' value='{{$obj->docNum}}' placeholder='Docnum'>
	</div>
	<div class='form-group'>
		<label for='email'>Email</label>
		<input type='text' class='form-control'
		name='email' id='email' value='{{$obj->email}}' placeholder='Email'>
	</div>
	<div class='form-group'>
		<label for='givenName'>Given Name</label>
		<input type='text' class='form-control'
		name='givenName' id='givenName' value='{{$obj->givenName}}' placeholder='Givenname'>
	</div>
	<div class='form-group'>
		<label for='familyName1'>Family Name</label>
		<input type='text' class='form-control'
		name='familyName1' id='familyName1' value='{{$obj->familyName1}}' placeholder='Familyname1'>
	</div>
	<div class='form-group'>
		<label for='phone'>Phone</label>
		<input type='text' class='form-control'
		name='phone' id='phone' value='{{$obj->phone}}' placeholder='Phone'>
	</div>

	<input type='submit' class='btn btn-primary' value='Save'>
	<!-- <a href='.../del/{{$obj->id}}' class='btn btn-primary'> Delete </a> -->
</form>
@endsection
