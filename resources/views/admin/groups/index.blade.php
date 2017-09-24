@extends('admin.layouts.admin')

@section('content')
    <div class="page-header clearfix">
        <h1>
             GROUPS
            <a class="btn btn-success pull-right" href="{{ route('admin.groups.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
    <div class="row">
        <div class="col-md-12">
            @if($groups->count())
                <table class="table table-condensed table-striped">
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