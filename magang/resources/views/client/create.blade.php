@extends('layouts.main')
@section('container')
<div class="col-lg-6 mb-5">
    <h3>Create Data Client</h3>
	<form action="/client" method="post">
	@csrf
	<div class="mb-3">
	  <label class="form-label">Client Name</label>
	  <input type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name" id="client_name" value="{{ old('client_name') }}">

	@error('client_name')
	<div class="invalid-feedback">
		{{ $message }}
	</div>
	@enderror
	</div>


	<div class="mb-3">
	  <label class="form-label">Client Address</label>
	  <input type="text" class="form-control" name="client_address" id="client_address" value="{{ old('client_address') }}" >
	
	@error('client_address')
	<div class="invalid-feedback">
		{{ $message }}
	</div>
	@enderror
	</div>


	<div class="mb-3">
		<button type="submit" name="submit" class="btn btn-primary">Create</button>
	</div>

	</form>
</div>
</div>
@endsection