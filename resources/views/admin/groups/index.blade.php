@extends('admin.layouts.admin')

@section('title', 'Group List')

@section('content')
    <div class="page-header clearfix">
    </div>
    <h1>
        <a class="btn btn-success pull-right" href="{{ route('admin.groups.create') }}">
            <i class="glyphicon glyphicon-plus"></i> Create
        </a>
    </h1>
    <div class="row" style="margin-top:80px;">
        <div class="col-md-12">
            @if($groups->count())
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
               width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EXPIRY</th>
                            <th>COLLEGE</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($groups as $group)
                            <tr>
                            <td>{{$group->id}}</td>
                            <td>{{$group->name}}</td>
                            <td>{{$group->expiry}}</td>
                            <td>{{$group->college()->first()->name}}</td>
                            <td class="text-right">
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.groups.show', $group->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                <a class="btn btn-xs btn-warning" href="{{ route('admin.groups.edit', $group->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                <form action="{{ route('admin.groups.destroy', $group->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $groups->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection