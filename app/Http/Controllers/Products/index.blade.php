@extends('admin')

@section('search')
	<select class="searchinpage" name='customerId' >
		@foreach ($users as $obj)
		<option value="{{ $obj->customerId }}">
			{{ $obj->givenName }} /
			{{ $obj->familyName1 }}
		</option>
		@endforeach
	</select>
	<button class='btn btn-sm btn-info' onclick='search_params()' type='submit' >Search</button>
	<a  class='btn btn-sm btn-info' href="/products"> Clear </a>
@endsection

@section('main-buttons')
<a href='/products/show/0' class='btn btn-sm btn-warning'> Add </a>
@endsection

@section('container')
<table class='table'>
	<thead class='table-active'>
			<tr>
				<th scope='col'>   Id                  </th>
				<th scope='col'>   Product Name         </th>
				<th scope='col'>   Product Type Name     </th>
				<th scope='col'>   Numeracio Terminal   </th>
				<th scope='col'>   Customer Id          </th>
				<th scope='col'>   Sold At              </th>
		</tr>
	</thead>
		<tbody>
			@foreach ($objs as $obj)
			<tr>
				<td scope='col'>
					<a href="/products/show/{{$obj->id}}">
						Edit
				 	</a>
        </th>

				<td scope='col'>   {{$obj->productName}}         </th>
				<td scope='col'>   {{$obj->productTypeName}}     </th>
				<td scope='col'>   {{$obj->numeracioTerminal}}   </th>
				<td scope='col'>   {{$obj->customerId}}          </th>
				<td scope='col'>   {{$obj->soldAt}}              </th>
		</tr>
		@endforeach
	</tbody>
</table>

@component('components.page',[ 'max' => $max ])
/urls
@endcomponent

@endsection
