@extends('admin')

@section('main-buttons')
<a href='/show/0' class='btn btn-sm btn-warning'> Add </a>
@endsection

@section('container')
<table class='table'>
	<thead class='table-active'>
			<tr>
				<th scope='col'>   Customer    </th>
				<th scope='col'>   Doctype       </th>
				<th scope='col'>   Docnum        </th>
				<th scope='col'>   Email         </th>
				<th scope='col'>   Given Name     </th>
				<th scope='col'>   Family Name   </th>
				<th scope='col'>   Phone         </th>
		</tr>
	</thead>
		<tbody>
			@foreach ($objs as $obj)
			<tr>
				<td scope='col'>
					<a href="/show/{{$obj->customerId}}">
						Edit
					 </a>
				 </th>
				<td scope='col'>   {{$obj->docType}}       </th>
				<td scope='col'>   {{$obj->docNum}}        </th>
				<td scope='col'>   {{$obj->email}}         </th>
				<td scope='col'>   {{$obj->givenName}}     </th>
				<td scope='col'>   {{$obj->familyName1}}   </th>
				<td scope='col'>   {{$obj->phone}}         </th>
		</tr>
		@endforeach
	</tbody>
</table>

@component('components.page',[ 'max' => $max ])
/urls
@endcomponent

@endsection
