@extends('student.layouts.student')

@section('title', __('views.admin.dashboard.title'))

@section('content')
    <div class="page-header clearfix"></div>
    <div class="margin-top-30">
        <div class="row top_tiles">
        @if(count($subCategories))
            @foreach($subCategories as $subCategory => $subCategoryName)
                <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                    <div class="icon"><i class="fa fa-institution"></i></div>
                    <h3><a href="{{ route('student.sub.category', $subCategory) }}"> {{ $subCategoryName }}</a></h3>
                    </div>
                </div>
            @endforeach
        @else
            <p>No Sub Category found</p>
        @endif
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