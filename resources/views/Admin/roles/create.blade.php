@extends('Admin.layouts.master')
@section('css')
@endsection

@section('breadcrumb')
<h3 class="page-title">Roles</h1>
    @endsection

    @section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Create New Role</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                    </div>
                </div>
            </div>


            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
            <div class="">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name :</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Role Name','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Permission <i>(select to assign)</i> :</strong>
                        <br />
                        &ensp;
                        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th><input class="grand_selectall" type="checkbox"> Permissions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permission as $value)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>
                                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                            {{ $value->name }}</label> &ensp; <br>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    @endsection
