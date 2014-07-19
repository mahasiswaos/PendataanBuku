@extends('layout.bootstraplogin.index')

@section('content')



<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-5">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><i class="glyphicon glyphicon-off"></i>  Login</strong>
            </div>
            <div class="panel-body">

                @if (Session::has('message'))
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('message') }}
                </div>
                @endif

                <form class="form-horizontal" method="POST"
                      action="{{ URL::to('/login/proses'); }}">
                    <div class="form-group">
                        <label class="control-label col-sm-6"><i class="glyphicon glyphicon-user"></i> Username</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            <p style="color: red"> {{ $errors->first('email') }} </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-6"><i class="glyphicon glyphicon-eye-open"></i> Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" placeholder="*******">
                            <p style="color: red"> {{ $errors->first('password') }} </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-9">
                            <button type="submit" class="btn btn-info">
                                <i class="glyphicon glyphicon-log-in"></i> 
                                Login
                            </button>
                            <button type="reset" class="btn btn-danger">
                                <i class="glyphicon glyphicon-remove-sign"></i> 
                                Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@stop