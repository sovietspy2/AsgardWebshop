@extends('layouts.master')

@section('title')
    {{ $page->title }} | @parent
@stop

@section('content')
    <div class="row">
        <h1>{{ $page->title }}</h1>
        {!! $page->body !!}
    </div>

    <div class="box box-primary">
        <div class="box-header">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="data-table table table-bordered table-hover"  >
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Identifier</th>
                        <th>Year</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($wines)): ?>
                    <?php foreach ($wines as $wine): ?>
                    <tr>
                        <td>{{ $wine->name }}</td>
                        <td>{{ $wine->type }}</td>
                        <td>{{ $wine->identifier }}</td>
                        <td>{{ $wine->year }}</td>
                        <td>{{ $wine->price }}</td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Identifier</th>
                        <th>Year</th>
                        <th>Price</th>
                    </tr>
                    </tfoot>
                </table>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.box -->
@stop
