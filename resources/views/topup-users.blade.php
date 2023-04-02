@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card-tools" style="display: flex; align-items: center; gap: 20px;">
                <div class="justify-content-left">
                    <form action="{{ route('topup-users.calculate') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Re-Calculate Top-Up</button>
                    </form>
                </div>
                <form action="{{ route('topup-users.search') }}" method="GET">
                    <div class="input-group input-group-sm" style="width: 300px;">
                        <input type="text" name="search" class="form-control float-right" value="{{ request('search') ? : '' }}" placeholder="Search by name or email">
                        <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>

        <div class="card-body p-0">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>User Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Total Topups</th>
                <th>Total Amount</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($topup_users as $index => $topup_user)
              <tr>
                <td>{{ $topup_user->user->id }}</td>
                <td>{{ $topup_user->user->name }}</td>
                <td>{{ $topup_user->user->email }}</td>
                <td>{{ $topup_user->count }}</td>
                <td>{{ $topup_user->total_amount }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        

        <div class="card-footer clearfix">
            <div class="d-flex justify-content-center mt-3">
                {{ $topup_users->links('pagination::bootstrap-4') }}
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
