@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Google 2 Factor Authentification</h4> is enabled</div>

                <div class="panel-body">
                    Open up your 2FA mobile app and scan the following QR barcode:
                    <img src="{{ $image }}">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection