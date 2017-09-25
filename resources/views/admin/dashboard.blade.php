@extends('admin.layouts.admin')

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
        <div class="row margin-top-30">
            <div class="col-md-12">
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
                    <article class="media event">
                      <a class="pull-left date article-date-width">
                        <p class="month">April</p>
                        <p class="day">23</p>
                        <p class="month">2017</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item One Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
                    <article class="media event">
                      <a class="pull-left date article-date-width">
                        <p class="month">April</p>
                        <p class="day">23</p>
                        <p class="month">2017</p>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Item Two Title</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                      </div>
                    </article>
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