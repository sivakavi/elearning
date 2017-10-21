@if (Auth::user() &&  Auth::user()->hasRole('adminisrator'))
    @extends('admin.layouts.admin')
@elseif(Auth::user() &&  Auth::user()->hasRole('staff'))
    @extends('staff.layouts.staff')
@elseif(Auth::user() &&  Auth::user()->hasRole('student'))
    @extends('student.layouts.student')
@endif


@section('title', 'Profile')

@section('content')
<div class="page-header clearfix">
    <div class="x_content margin-top-30">
        <table class="table table-bordered">
            <tbody>
                <tr>
                <th scope="row">Name</th>
                <td>{{$user->name}}</td>
                </tr>
                <tr>
                <th scope="row">College Name</th>
                <td>{{$user->college->name}}</td>
                </tr>
                <tr>
                <th scope="row">User Email</th>
                <td>{{$user->email}}</td>
                </tr>
                <tr>
                <th scope="row">College Address</th>
                <td>{{$user->college->address}}</td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>
@endsection