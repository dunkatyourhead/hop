@extends('templates.pages')
@section('title', 'Admin')
@section('header')
<h1>Admin</h1>
@endsection
@section('content')
<div class="row">
  <div class="col-12">

    @if(Session::get('success'))
      <div class="alert alert-important alert-primary" role="alert">
        {{ Session::get('success') }}
      </div>
    @endif
  
    @if(Session::get('fail'))
      <div class="alert alert-important alert-danger" role="alert">
        {{ Session::get('fail') }}
      </div>
    @endif

    <div class="card">
      <div class="card-body">
        <div class="float-left">
          <a href="{{ route('superadmin.admin.create') }}" class="btn btn-icon btn-primary"><i class="fas fa-plus"></i></a>
        </div>
        <div class="float-right">
          <form>
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search">
              <div class="input-group-append">                                            
                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>

        <div class="clearfix mb-3"></div>

        <div class="table-responsive">
          <table class="table table-striped table-bordered">
            <tbody>
              <tr>
                <td class="text-center">No.</td>
                <td class="text-center">Nama</td>
                <td class="text-center">Email</td>
                <td class="text-center">Created At</td>
                <td class="text-center">Action</td>
              </tr>
              <?php $id = 0; ?>
              @foreach($admins as $admin)
              <?php $id++; ?>
              <tr>
                <td class="text-center">{{ $id }}</td>
                <td class="text-center">{{ $admin->nama }}</td>
                <td class="text-center">{{ $admin->email }}</td>
                <td class="text-center">{{ $admin->created_at }}</td>
                <td class="text-center text-nowarp">
                  <form action="{{ route('superadmin.admin.destroy', $admin->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('superadmin.admin.show', $admin->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-info-circle"></i></a>
                    <a href="{{ route('superadmin.admin.edit', $admin->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></a>
                    <button type="button" class="btn btn-icon btn-danger delete" data-id="{{ $admin->id }}"><i class="fas fa-trash"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="float-right">
          {{ $admins->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection