@extends('layouts.app')

@section('content')
<style>
.form-group {
  float: right !important;
  transition: all 0.35s, border-radius 0s;
  width: 32px;
  height: 32px;
  background-color: #fff;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
  border-radius: 25px;
  border: 1px solid #ccc;
}
.form-group input.form-control {
  padding-right: 20px;
  border: 0 none;
  background: transparent;
  box-shadow: none;
  display:block;
}
.form-group input.form-control::-webkit-input-placeholder {
  display: none;
}
.form-group input.form-control:-moz-placeholder {
  /* Firefox 18- */
  display: none;
}
.form-group input.form-control::-moz-placeholder {
  /* Firefox 19+ */
  display: none;
}
.form-group input.form-control:-ms-input-placeholder {
  display: none;
}
.form-group:hover,
.form-group.hover {
  width: 100%;
  border-radius: 4px 25px 25px 4px;
}
.form-group span.form-control-feedback {
  position: absolute;
  top: -1px;
  right: -2px;
  z-index: 2;
  display: block;
  width: 34px;
  height: 34px;
  line-height: 34px;
  text-align: center;
  color: #3596e0;
  left: initial;
  font-size: 14px;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" >
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-5">Your Contacts</div>
                        <div class="col-md-4 col-md-offset-3">
                                <div class="form-group has-feedback">
                                    <label for="search" class="sr-only">Search</label>
                                    <input type="text" class="form-control" name="search" id="search" placeholder="search">
                                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                </div>
                        </div> 
                     </div>
                </div>
                <div id="result-content">
                @include('contacts.searchresult')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom_js')
<script>
    $(document).ready(function(){
        $( "#search" ).keyup(function() {
            var input = $(this).val();
            var searchUrl = "{{url('/contacts')}}"+"/"+input+"/search";
            console.log(input+" "+searchUrl);
            
            $.get(searchUrl, function(response) {
                console.log(response.html);
                //This is a callback. Do stuff here if you want.
                $("#result-content").html(response.html);
            });
        });
    });

</script>
@endsection