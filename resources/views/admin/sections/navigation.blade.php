<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="logo-div">
            <img src="{{ asset('faras-logo.jpg') }}" class="logo-img"/>
        </div>
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('admin.dashboard') }}" class="site_title">
                <span>{{ config('app.name') }}</span>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ auth()->user()->avatar }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2>{{ auth()->user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>{{ __('views.backend.section.navigation.sub_header_0') }}</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_0_1') }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>{{ __('views.backend.section.navigation.sub_header_1') }}</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.users') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_1_1') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.users.studentindex') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_1_3') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.colleges.index') }}">
                            <i class="fa fa-institution" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_1_2') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.groups.index') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_2_6') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.index') }}">
                            <i class="fa fa-gear" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_2_1') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.sub_categories.index') }}">
                            <i class="fa fa-gears" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_2_2') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.tests.index') }}">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_2_3') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.questions.index') }}">
                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_2_4') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.assigns.index') }}">
                            <i class="fa fa-random" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_2_5') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.changePassword') }}">
                            <i class="fa fa-key" aria-hidden="true"></i>
                            {{ __('views.backend.section.header.menu_2') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            {{ __('views.backend.section.header.menu_0') }}
                        </a>
                    </li>
                </ul>
                </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>
