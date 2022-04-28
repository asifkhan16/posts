@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="bg-white w-75 rounded mx-auto mt-4 px-4 py-5">
            <h1>Ajax Practice</h1>
                <p style="color: red" id="resp"></p>

            <form id="userform" name="userform">
                @csrf
                <input type="hidden" id="user_id" >
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" id="user_name" class="form-control" id="name">
                  @error('name')
                      {{ $message }}
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="user_email" name="email" id="email" aria-describedby="emailHelp">
                </div>
                <input type="submit" class="btn btn-primary" id="submit-btn" value="submit">
            </form>

            <div class="mt-5">
              <table id="laravel_crud" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="users-tbody">
                    @foreach($users as $user)
                    <tr id="row_{{$user->id}}">
                       <td>{{ $loop->iteration }}</td>
                       <td>{{ $user->name }}</td>
                       <td>{{ $user->email }}</td>
                    {{-- data-bs-toggle="modal" data-bs-target="#usermodel" --}}
                       <td><button id="e" onclick="editRecord(event.target)" data-id="{{ $user->id }}" class="btn btn-info" >Edit</button></td>
                       <td>
                        <a href="javascript:void(0)" data-id="{{ $user->id }}"  class="btn btn-danger" onclick="deleteRecord(event.target)">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
    
            </div>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="usermodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="updateform" name="updateform">
            <div class="modal-body">
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" value="" aria-describedby="emailHelp">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">update</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
      </form>
    </div>
  </div>
</div>
    
@endsection