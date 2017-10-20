@if (Auth::user() &&  Auth::user()->hasRole('adminisrator'))
    @extends('admin.layouts.admin')
@elseif(Auth::user() &&  Auth::user()->hasRole('staff'))
    @extends('staff.layouts.staff')
@elseif(Auth::user() &&  Auth::user()->hasRole('student'))
    @extends('student.layouts.student')
@endif


@section('title', __('views.admin.college.view.title'))

@section('content')
<div class="page-header clearfix"></div>
    @include('error')
    @if( Session::has( 'success' ))
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ Session::get( 'success' ) }}
        </div>
    @endif
    <form id="form-change-password" role="form" method="POST" action="{{ route('users.change-password') }}" novalidate class="form-horizontal">
        <div class="col-md-9">             
            <label for="current-password" class="col-sm-4 control-label">Current Password</label>
            <div class="col-sm-8">
            <div class="form-group">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Password">
            </div>
            </div>
            <label for="password" class="col-sm-4 control-label">New Password</label>
            <div class="col-sm-8">
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            </div>
            <label for="password_confirmation" class="col-sm-4 control-label">Re-enter Password</label>
            <div class="col-sm-8">
            <div class="form-group">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-6">
            <button type="submit" class="btn btn-danger">Submit</button>
            </div>
        </div>
    </form>
@endsection