@extends('layouts.main')
@section('container')
<div class="row">
  <div class="col-lg-6 mx-2">
    <form action="/project/{{ $tb_m_project->id }}" method="post">
      @method('PUT')
      @csrf
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control @error('project_name') is-invalid @enderror" name ="project_name" id="project_name" value="{{ old('project_name',$tb_m_project->name) }}">
        @error('project_name')
        <div class="invalid-feedback">
          Please select a valid state.
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Client Id</label>
         <select class="form-select" name="client_id" aria-label="Default select example">
            @foreach($tb_m_clients as $tb_m_client)
            @if (old('client_id',$tb_m_project->client_id)==$tb_m_client->id)
             <option value="{{$tb_m_client->id}}" selected>{{$tb_m_client->client_name}}</option>
            @else
              <option value="{{$tb_m_client->id}}">{{$tb_m_client->client_name}}</option>
            @endif
            @endforeach
          </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Project Start</label>
        <input type="date" class="form-control @error('project_start') is-invalid @enderror" name="project_start" id="project_start" value="{{ old('project_start',$tb_m_project->project_start) }}">
        
        @error('project_start')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Project End</label>
        <input type="date" class="form-control @error('project_end') is-invalid @enderror" name="project_end" id="project_end" value="{{ old('project_end',$tb_m_project->project_end) }}">
  
        @error('project_end')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label class="form-label">Status</label></br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="project_status" value="OPEN">
          <label class="form-check-label">OPEN</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="project_status" value="DOING">
          <label class="form-check-label">DOING</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="project_status" value="DONE">
          <label class="form-check-label">DONE</label>
        </div>
      </div>
      <div class="mb-3">
        <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
      </div>
    </form>
  </div>
</div>

@endsection