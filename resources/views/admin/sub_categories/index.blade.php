@extends('admin.layouts.admin')

@section('content')
    <div class="page-header clearfix">
        <h1>
             SubCategories
            <a class="btn btn-success pull-right" href="{{ route('admin.sub_categories.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
    <div class="row">
        <div class="col-md-12">
            @if($sub_categories->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>CATEGORY</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($sub_categories as $sub_category)
                            <tr>
                            <td>{{$sub_category->id}}</td>
                            <td>{{$sub_category->name}}</td>
                            <td>{{$sub_category->category()->first()->name}}</td>
                            <td class="text-right">
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.sub_categories.show', $sub_category->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                <a class="btn btn-xs btn-warning" href="{{ route('admin.sub_categories.edit', $sub_category->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                <form action="{{ route('admin.sub_categories.destroy', $sub_category->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $sub_categories->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection