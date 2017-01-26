@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Google 2 Factor Authentification</h4> is enabled</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/2fa/validate">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">One-Time Password</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="totp">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-mobile"></i>Validate
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection