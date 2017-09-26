@extends('student.layouts.student')

@section('title', __('views.admin.dashboard.title'))

@section('content')
    <div class="page-header clearfix"></div>
    <div class="margin-top-30">
        <div class="row top_tiles">
                <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                    <div class="icon"><i class="fa fa-institution"></i></div>
                    <div class="count">179</div>
                    <h3>Colleges</h3>
                    <p>No. of Colleges.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                    <div class="icon"><i class="fa fa-cubes"></i></div>
                    <div class="count">179</div>
                    <h3>Categories</h3>
                    <p>No. of Categories.</p>
                    </div>
                </div>
        </div>
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