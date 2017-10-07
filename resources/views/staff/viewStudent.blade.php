@extends('staff.layouts.staff')

@section('title', 'List')

@section('content')
    <div class="page-header clearfix"></div>
    
    <div class="row margin-top-40">

    @if(count($subCategories))
        @foreach($subCategories as $key => $subCategory)
        
        @endforeach
    @else
        <p>No Sub Category found</p>
    @endif

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