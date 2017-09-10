@extends('admin.layouts.admin')

@section('content')
    <!-- page content -->
    <!-- top tiles -->
    <div class="row tile_count">
        DASHBOARD PAGE
    </div>
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection