@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new Contact</div>
                <div class="panel-body">
                	@if(isset($result))
	                <p>Contact Added successfully!</p>
	                @else
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/contacts') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                        <div class="form-group{{ $errors->has('contactname') ? ' has-error' : '' }}">
                            <label for="contactname" class="col-md-4 control-label">Contact Name</label>

                            <div class="col-md-6">
                                <input id="contactname" type="text" class="form-control" name="contactname" value="{{ old('contactname') }}" required autofocus>

                                @if ($errors->has('contactname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contactname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }}">
                            <label for="phonenumber" class="col-md-4 control-label">Phone number:</label>

                            <div class="col-md-6">
                                <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}" required autofocus>
                                @if ($errors->has('phonenumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phonenumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phonetype" class="col-md-4 control-label">Phone Type:</label>

                            <div class="col-md-6">
                                <select id="phonetype" class="form-control" name="phonetype_id" autofocus>
                                	@foreach ($types as $id=>$phonetype)
                                		<option value="{{$id}}">{{$phonetype}}</option>
                                	@endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-primary pull-right">
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection