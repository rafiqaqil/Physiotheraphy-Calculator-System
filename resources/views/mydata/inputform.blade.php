@extends('layouts.boot')

@section('content')
<div class="container">
    <form action='{{env("absolute")}}/profile/{{$user->id}}/ServerStoreData' enctype="multipart/form-data" method="post">
        @csrf

        <div class="row">
            <div class="col-8 offset-2">
                
                <input id="str6"  name="str6" hidden="true" value="Pending">
                <input id="str7"  name="str7" hidden="true" value="Awaiting Pending" >
                
                
                <div class="row"><h1>Create Claim </h1></div>
                
                        <div class="form-group row">
                            <label for="str1" class="col-md-4 col-form-label">Date of Travel</label>
                            <input id="str1"
                                   type="date"
                                   class="form-control{{ $errors->has('str1') ? ' is-invalid' : '' }}"
                                   name="str1"
                                   value="-"
                                   autocomplete="str1" autofocus>
                            @if ($errors->has('str1'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('str1') }}</strong>
                                </span>
                            @endif
                        </div>
                
                 <div class="form-group row">
                            <label for="str3" class="col-md-4 col-form-label">Travel Description</label>
                            <input id="str3"
                                   type="text"
                                   class="form-control{{ $errors->has('str3') ? ' is-invalid' : '' }}"
                                   name="str3"
                                   value="-"
                                   autocomplete="str3" autofocus>
                            @if ($errors->has('str3'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('str3') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="str2" class="col-md-4 col-form-label">Location, From and to / Distance Travel</label>
                            <input id="str2"
                                    type="text"
                                    class="form-control{{ $errors->has('str2') ? ' is-invalid' : '' }}"
                                    name="str2"
                                    value="-"
                                    autocomplete="str2" autofocus>                   
                            </input>
                            @if ($errors->has('str2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('str2') }}</strong>
                                </span>
                            @endif
                        </div>
                
                     <div class="form-group row">
                            <label for="dec1" class="col-md-4 col-form-label">Claim Petrol (RM)</label>
                            <input id="dec1"
                                   type="number"
                                   class="form-control{{ $errors->has('dec1') ? ' is-invalid' : '' }}"
                                   name="dec1"
                                   value=0.00
                                   autocomplete="dec1" autofocus>
                            @if ($errors->has('dec1'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dec1') }}</strong>
                                </span>
                            @endif
                        </div>
                 <div class="form-group row">
                            <label for="dec3" class="col-md-4 col-form-label">Toll Claims (RM)</label>
                            <input id="dec3"
                                   type="number"
                                   class="form-control{{ $errors->has('dec3') ? ' is-invalid' : '' }}"
                                   name="dec3"
                                   value="0.00"
                                   autocomplete="dec3" autofocus>
                            @if ($errors->has('dec3'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dec3') }}</strong>
                                </span>
                            @endif
                        </div>
                

                         <div class="form-group row">
                            <label for="str5" class="col-md-4 col-form-label">State Food, Breakfast RM13, Lunch RM 20, Dinner RM34</label>
                            <input id="str5"
                                   type="text"
                                   class="form-control{{ $errors->has('str5') ? ' is-invalid' : '' }}"
                                   name="str5"
                                   value="-"
                                   autocomplete="str5" autofocus>
                            @if ($errors->has('str5'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('str5') }}</strong>
                                </span>
                            @endif
                        </div>
                
                
                    
                        
                        <div class="form-group row">
                            <label for="dec2" class="col-md-4 col-form-label">Claim Food (RM)</label>
                            <input id="dec2"
                                   type="number"
                                   class="form-control{{ $errors->has('dec2') ? ' is-invalid' : '' }}"
                                   name="dec2"
                                   value="0.00"
                                   autocomplete="dec2" autofocus>
                            @if ($errors->has('dec2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dec2') }}</strong>
                                </span>
                            @endif
                        </div>
                
                       
                
                
                 <div class="form-group row">
                            <label for="dec4" class="col-md-4 col-form-label">Hotel Claims (RM)</label>
                            <input id="dec4"
                                   type="number"
                                   class="form-control{{ $errors->has('dec4') ? ' is-invalid' : '' }}"
                                   name="dec4"
                                   value="0.00"
                                   autocomplete="dec4" autofocus>
                            @if ($errors->has('dec4'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dec4') }}</strong>
                                </span>
                            @endif
                        </div>
                   <div class="form-group row">
                            <label for="str4" class="col-md-4 col-form-label">If Others List price n reason (Taxi RM10, Stationery RM 5, Phone Bill RM5, Entertainment RM303, etc)</label>
                            <input id="str4"
                                   type="text"
                                   class="form-control{{ $errors->has('str4') ? ' is-invalid' : '' }}"
                                   name="str4"
                                   value="-"
                                   autocomplete="str4" autofocus>
                            @if ($errors->has('str4'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('str4') }}</strong>
                                </span>
                            @endif
                        </div>
                   <div class="form-group row">
                            <label for="dec5" class="col-md-4 col-form-label">Others Claim (RM)</label>
                            <input id="dec5"
                                   type="number"
                                   class="form-control{{ $errors->has('dec5') ? ' is-invalid' : '' }}"
                                   name="dec5"
                                   value="0.00"
                                   autocomplete="dec5" autofocus>
                            @if ($errors->has('dec5'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dec5') }}</strong>
                                </span>
                            @endif
                        </div>
                

                <div class="row pt-4">
                    <button class="btn btn-primary">Add MyData</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
