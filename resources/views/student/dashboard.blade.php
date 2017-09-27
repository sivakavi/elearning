@extends('student.layouts.student')

@section('title', __('views.admin.dashboard.title'))

@section('content')
    <div class="page-header clearfix"></div>

    <div class="row top_tiles margin-top-40">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                    <div class="icon"><i class="fa fa-institution"></i></div>
                    <div class="count">100</div>
                    <h3>Lessions</h3>
                    <p>No. of Lessions.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                    <div class="icon"><i class="fa fa-cubes"></i></div>
                    <div class="count">80</div>
                    <h3>Viewed Lessions</h3>
                    <p>No. of Viewed Lessions.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                    <div class="icon"><i class="fa fa-institution"></i></div>
                    <div class="count">100</div>
                    <h3>Lessions</h3>
                    <p>No. of Lessions.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                    <div class="icon"><i class="fa fa-cubes"></i></div>
                    <div class="count">80</div>
                    <h3>Viewed Lessions</h3>
                    <p>No. of Viewed Lessions.</p>
                    </div>
                </div>
    </div>

    <div class="row margin-top-50">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Category List</small></h2>
                    <ul class="nav navbar-right">
                    <li class="cursor-pointer"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   <div class="row margin-top-20">
                        @if(count($categories))
                                @foreach($categories as $category => $categoryName)
                                <div class="col-md-4 col-xs-12 widget widget_tally_box">
                                    <a href="{{ route('student.category', $category) }}"><div class="x_panel student-category">
                                    <div class="x_content">
                                        <h4 class="name"> {{ $categoryName }} </h4>
                                    </div>
                                    </div>
                                    </a>
                                </div>
                                
                                @endforeach
                            @else
                                <p>No Category found</p>
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