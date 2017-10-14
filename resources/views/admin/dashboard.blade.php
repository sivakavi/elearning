@extends('admin.layouts.admin')

@section('title', __('views.admin.dashboard.title'))

@section('content')
    <div class="page-header clearfix"></div>
    <div class="margin-top-30">
        <div class="row top_tiles">
                <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                    <div class="icon"><i class="fa fa-institution"></i></div>
                    <div class="count">{{ $college }}</div>
                    <h3>Colleges</h3>
                    <p>No. of Colleges.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                    <div class="icon"><i class="fa fa-cubes"></i></div>
                    <div class="count">{{ $category }}</div>
                    <h3>Categories</h3>
                    <p>No. of Categories.</p>
                    </div>
                </div>
        </div>
        <div class="row margin-top-30">
            <div class="col-md-10 col-sm-12 col-xs-12 center-margin">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Group Expiry Notifications</h2>
                    <ul class="nav navbar-right">
                      <li class="cursor-pointer"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @if(count($groups))
                      @foreach($groups as $group)
                        <article class="media event">
                          <a class="pull-left date article-date-width">
                            <p class="month">{{ date('M', strtotime($group->expiry)) }}</p>
                            <p class="day">{{ date('d', strtotime($group->expiry)) }}</p>
                            <p class="month">{{ date('Y', strtotime($group->expiry)) }}</p>
                          </a>
                          <div class="media-body">
                            <a class="title" href="{{ route('admin.colleges.show', $group->college()->first()->id) }}">{{$group->college()->first()->name}}</a><br>
                            <a class="title" href="{{ route('admin.groups.show', $group->id) }}">{{$group->name}}</a>
                          </div>
                        </article>
                      @endforeach
                    @else
                     <p>No expiry found</p>
                    @endif
                  </div>
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