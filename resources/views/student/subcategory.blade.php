@extends('student.layouts.student')

@section('title', 'Lession Detail')

@section('content')
    <div class="page-header clearfix"></div>
    <div class="margin-top-30">
        <div class="row top_tiles">
        <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="tile-stats">
            <div class="icon"><i class="fa fa-institution"></i></div>
            <h3>{{ $subCategory['name'] }}</h3>
            @foreach($subCategoryFiles as $subCategoryFileId => $subCategoryFileName)
                <p><a href="{{ route('student.view.pdf', $subCategoryFileId) }}"> {{ $subCategoryFileName }}</a></p>
            @endforeach
            @foreach($test as $testId => $testName)
                <p> <a href="{{ route('student.test', $testId, $subCategory['id']) }}?subCatId={{ $subCategory['id'] }}"> {{ $testName }}</a></p>
            @endforeach
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