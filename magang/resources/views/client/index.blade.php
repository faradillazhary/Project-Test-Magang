@extends('layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
</div>


@if (session()->has('pesan'))
<div class="alert alert-success" role="alert">
{{ session('pesan') }}
</div>
@endif

	<h2>Data Client</h2>
	<td><a href="/client/create" class="btn btn-dark mb-3">Add Data</a></td>
	<table class="table table-boredered">
	
	<tr>
	<th>No</th>
	<th>Id</th>
	<th>Client Name</th>
	<th>Client Address</th>
	<th>Aksi</th>
	</tr>
@foreach ($tb_m_clients as $tb_m_client)

	<tr>
	<td>{{ $loop->iteration }} </td>
	<td>{{ $tb_m_client->id }}</td>
	<td>{{ $tb_m_client->client_name }}</td>
	<td>{{ $tb_m_client->client_address }}</td>
	
	<td>
		<a href="/client/{{ $tb_m_client->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
		<form action="/client/{{ $tb_m_client->id }}" method="post" class="d-inline">

	@method('DELETE')
	@csrf
	<button class="btn btn-danger btn-sm" type="submit" 
	onclick="return confirm('Yakin akan menghapus data ? ')" >Delete</button>
	</form>

	</td>
	</tr>
@endforeach
	</table>

{{ $tb_m_clients->links('pagination::bootstrap-5') }}

@endsection