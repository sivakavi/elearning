@extends('admin.layouts.admin')

@section('title', __('views.admin.group.view.title'))

@section('content')
<div class="page-header clearfix"></div>
    {{--<h1>Group / Show #{{$group->id}}</h1>
    <form action="{{ route('admin.groups.destroy', $group->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="btn-group pull-right" role="group" aria-label="...">
            <a class="btn btn-warning btn-group" role="group" href="{{ route('admin.groups.edit', $group->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
        </div>
    </form>--}}
    <div class="row margin-top-30">
        <div class="col-md-8 col-sm-12 col-xs-12 center-margin">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{$group->name}} <small>Details</small></h2>
                        <ul class="nav navbar-right">
                            <li class="cursor-pointer"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content margin-top-30">

                        <table class="table table-bordered">
                        <tbody>
                            <tr>
                            <th scope="row">ID</th>
                            <td>{{$group->id}}</td>
                            </tr>
                            <tr>
                            <th scope="row">NAME</th>
                            <td>{{$group->name}}</td>
                            </tr>
                            <tr>
                            <th scope="row">EXPIRY</th>
                            <td>{{ $group->expiry }}</td>
                            </tr>
                            <tr>
                            <th scope="row">COLLEGE</th>
                            <td>{{$group->college()->first()->name}}</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>

     <a class="btn btn-link" href="{{ route('admin.groups.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

   
@endsection