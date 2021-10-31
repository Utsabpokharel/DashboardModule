@extends('Admin.layouts.master')
@section('css')

<link href="{{ URL::asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}"
    rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css') }}"
    rel="stylesheet" />

@endsection

@section('content')
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Change Password</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('dashboard') }}"> Back</a>
                </div>
            </div>
        </div>
        <hr>


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

        <form class="user" method="post" action="{{route('password.update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-4">
                        <div class="form-group row">
                            <label class="control-label col-md-2">Current Password
                                <span class="required text-danger"> * </span>
                            </label>
                            <div class="col-md-6">
                                <input type="password" name="old_password" required placeholder="Enter Current Password"
                                    id="exampleInputEmail"
                                    class="form-control   @error('old_password') is-invalid @enderror"
                                    value="{{old('old_password','')}}" />
                                @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-2">New Password
                                <span class="required text-danger"> * </span>
                            </label>
                            <div class="col-md-6">
                                <input type="password" name="new_password" required placeholder="Enter New Password"
                                    id="exampleInputEmail"
                                    class="form-control   @error('new_password') is-invalid @enderror"
                                    value="{{old('new_password','')}}" />
                                @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-2">Confirm New Password
                                <span class="required text-danger"> * </span>
                            </label>
                            <div class="col-md-6">
                                <input type="password" name="new_confirm_password" required
                                    placeholder="Enter Confirm New Password" id="exampleInputEmail"
                                    class="form-control   @error('new_confirm_password') is-invalid @enderror"
                                    value="{{old('new_confirm_password','')}}" />
                                @error('new_confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions p-3">
                <div class="row">
                    <div class="offset-md-3 col-md-9">
                        <button type="submit" class="btn btn-success m-r-20">Submit</button>
                        <a class="btn btn-secondary" href="{{route('dashboard')}}">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script')

<!-- Plugins js -->
<script src="{{ URL::asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>

<!-- Plugins Init js -->
<script src="{{ URL::asset('assets/pages/form-advanced.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>

@endsection
