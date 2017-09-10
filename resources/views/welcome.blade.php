@extends('layouts.welcome')

@section('content')
    <div class="title m-b-md">
        {{ config('app.name') }}
    </div>
    <div class="m-b-md">
        Sample users:<br/>
        Admin user: admin@portal.com / password: admin<br/>
    </div>
@endsection