@extends('core::layouts.master')

@section('content-header')
<h1>
    Categories
</h1>
<ol class="breadcrumb">
    <li><a href="{{ URL::route('dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Categories</li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="row">
            @include('flash::message')
            <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                <a href="{{ URL::route('dashboard.category.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                    <i class="fa fa-pencil"></i> New Category
                </a>
            </div>
        </div>
        <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="data-table table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Created at</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ($categories): ?>
                        <?php foreach($categories as $category): ?>
                            <tr>
                                <td>
                                    <a href="{{ URL::route('dashboard.category.edit', [$category->id]) }}">
                                        {{ $category->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ URL::route('dashboard.category.edit', [$category->id]) }}">
                                        {{ $category->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ URL::route('dashboard.category.edit', [$category->id]) }}">
                                        {{ $category->slug }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ URL::route('dashboard.category.edit', [$category->id]) }}" class="btn btn-default btn-flat"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#confirmation-{{ $category->id }}"><i class="glyphicon glyphicon-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Created at</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            <!-- /.box-body -->
            </div>
        <!-- /.box -->
    </div>
    </div>
</div>
<?php if ($categories): ?>
    <?php foreach($categories as $category): ?>
    <!-- Modal -->
    <div class="modal fade" id="confirmation-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this record?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {!! Form::open(['route' => ['dashboard.category.destroy', $category->id], 'method' => 'delete', 'class' => 'pull-left']) !!}
                        <button type="submit" class="btn btn-danger btn-flat"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<?php endif; ?>
@stop

@section('scripts')
<script type="text/javascript">
    $(function () {
        $('.data-table').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,
            "aoColumns": [
                null,
                null,
                null,
                { "bSortable": false }
            ]
        });
    });
</script>
@stop