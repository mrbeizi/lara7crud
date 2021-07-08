@extends('layouts.main')
@section('title','Users')
@section('breadcrumbs')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">People</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">People</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection
  
@section('content')
<div class="content mt-1">
  <div class="container-fluid animated fadeIn">
    
    <div class="col-sm-12">
      <div class="card bg-dark">
        <div class="card-header">
          @if(Auth::user()->level == 'admin')
          <div class="col-xs-4" style="float: right;">
            <a href="" type="button" class="btn btn-outline-warning btn-sm" aria-expanded="false" data-toggle="modal" data-target="#add-user" data-placement="left"><i class="fa fa-plus"></i> Add data</a>
            <a href="" type="button" class="btn btn-outline-success btn-sm" aria-expanded="false"  data-toggle="tooltip" data-placement="left" title="Print this data?"><i class="fa fa-file-excel"></i> Export Excel</a>
            <a href="" type="button" class="btn btn-outline-danger btn-sm" aria-expanded="false"  data-toggle="tooltip" data-placement="left" title="Print this data?"><i class="fa fa-file-pdf"></i> Export PDF</a>
          </div>
          @endif

          {{-- Start Add Data with Modal --}}
          <div class="modal" id="add-user" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content bg-dark">
                <div class="modal-header">
                  <h5 class="modal-title">Add People</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{action('PeopleController@store')}}" method="post">
                  @csrf
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" placeholder="Input Your Name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" autofocus>
                      @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                                        
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">
                      @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>   

                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" placeholder="Type your password" class="form-control @error('password') is-invalid @enderror" name="password">
                      @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                    </div>
                                        
                    <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                      <label for="level" class="col-md-4 control-label">Level</label>
                      <div>
                      <select class="form-control" name="level" required="">
                          <option value="">- Choose Level -</option>
                          <option value="admin">Admin</option>
                          <option value="user">User</option>
                      </select>
                      </div>
                    </div>                
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          {{-- End Add Data with Modal --}}

        </div>
        <div class="card-body table-responsive">
            <table class="table" id="table">
              <thead class="table-dark">
                <th>No</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach($datas as $no => $item)
                <tr>
                  <td>{{++$no}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->address}}</td>
                  <td>{{$item->contact}}</td>
                  <td>
                    <form action="{{ route('data-people.destroy',$item->id) }}" method="POST">
                      <a href="" class="btn btn-outline-success btn-sm edit" data-toggle="modal" data-target="#edit-user{{$item->id}}"><i class="fa fa-pen"></i></a>
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>

                  {{-- Start Edit Data with Modal --}}
                  <div class="modal" id="edit-user{{$item->id}}" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content bg-dark">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit User</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{route('data-people.update',$item->id)}}" method="post">
                          {{csrf_field()}}
                          {{method_field('PUT')}}
                          <div class="modal-body">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$item->name) }}" autofocus>
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$item->email) }}">
                            </div>                
                            <div class="form-group">
                              <label>Password</label>
                              <input type="password" id="password" class="form-control" name="password">
                            </div>
                            <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                              <label for="level" class="col-md-4 control-label">Level</label>
                              <div>
                              <select class="form-control" id="level" name="level" required="">
                                  <option value=""></option>
                                  <option value="admin" {{$item->level === "admin" ? "selected" : ""}}>Admin</option>
                                  <option value="user" {{$item->level === "user" ? "selected" : ""}}>User</option>
                              </select>
                              </div>
                            </div>                
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  {{-- End Edit Data with Modal --}}
                  
                </tr>    
                @endforeach
              </tbody>      
            </table>
        </div>
      </div>
    </div>

    </div>

    
  </div>
</div>
<!-- Main Footer -->

@endsection

