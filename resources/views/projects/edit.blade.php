@extends('layouts.boot')

@section('content')
<div   class="container">
    
<div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">EDIT Project Information</h3></div>
                                    <div class="card-body">
                                         <form action="../../UpdateProject/{{$project}}" enctype="multipart/form-data" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <h2>Basic Information </h2>
                                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                                                   <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="CUSTOMER_NAME">CUSTOMER_NAME</label>
                                                        <input value="{{$allmyquote->first()->CUSTOMER_NAME}}" name="CUSTOMER_NAME" class="form-control py-4" id="CUSTOMER_NAME" type="text" >
                                                                    @if ($errors->has('CUSTOMER_NAME'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('CUSTOMER_NAME') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                                       
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="PROJECT_NO">PROJECT_NO</label>
                                                        <input value="{{$allmyquote->first()->PROJECT_NO}}" name="PROJECT_NO" class="form-control py-4" id="PERSON_INCHARGE" type="text" >
                                                                  @if ($errors->has('PROJECT_NO'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('PROJECT_NO') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                                 <div class="form-row">
                                               <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="PERSON_INCHARGE">PERSON_INCHARGE</label>
                                                        <input value="{{$allmyquote->first()->PERSON_INCHARGE}}"name="PERSON_INCHARGE" class="form-control py-4" id="PERSON_INCHARGE" type="text" >
                                                                  @if ($errors->has('PERSON_INCHARGE'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('PERSON_INCHARGE') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="PERSON_INCHARGE_CONTACT">PERSON_INCHARGE_CONTACT</label>
                                                        <input value="{{$allmyquote->first()->PERSON_INCHARGE_CONTACT}}" name="PERSON_INCHARGE_CONTACT" class="form-control py-4" id="PERSON_INCHARGE" type="text" >
                                                                  @if ($errors->has('PERSON_INCHARGE_CONTACT'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('PERSON_INCHARGE_CONTACT') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="COMPANY_INCHARGE">COMPANY_INCHARGE</label>
                                                        <input value="{{$allmyquote->first()->COMPANY_INCHARGE}}" name="COMPANY_INCHARGE" class="form-control py-4" id="COMPANY_INCHARGE" type="text" >
                                                           @if ($errors->has('COMPANY_INCHARGE'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('COMPANY_INCHARGE') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                       
                                            </div>
                                         
                                                     <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="PROJECT_STATUS">PROJECT_STATUS</label>
                                                        <select value="" name="PROJECT_STATUS" class="form-control py-1" id="PROJECT_STATUS" type="text" >
                                                            <option value={{$allmyquote->first()->PROJECT_STATUS}}>{{$allmyquote->first()->PROJECT_STATUS}}</option>
                                                            <option value="PRE-PURC">PRE_PURC</option>
                                                            <option value="PURC">PURC</option>
                                                            <option value="DELIVERY">DELIVERY</option>
                                                            <option value="TnC">TnC</option>
                                                            <option value="PMT">PMT</option>
                                                            <option value="CLOSE">CLOSE</option>
                                                            </select>
                                                            @if ($errors->has('PROJECT_STATUS'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('PROJECT_STATUS') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                       
                                            </div>

                                     
                                        <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="LO_NUMBER">LO_NUMBER</label>
                                                        <input value="{{$allmyquote->first()->LO_NUMBER}}" name="LO_NUMBER" class="form-control py-4" id="LO_NUMBER" type="text" >
                                                           @if ($errors->has('LO_NUMBER'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('LO_NUMBER') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                       
                                            </div>       
                                            
                                           
                                            <h2>Financial Information </h2>
                                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                                            
                                              <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="FINANCIAL_OWN">FINANCIAL_OWN</label>
                                                        <input value="{{$allmyquote->first()->FINANCIAL_OWN}}" name="FINANCIAL_OWN" class="form-control py-4" id="FINANCIAL_OWN" type="text" >
                                                           @if ($errors->has('FINANCIAL_OWN'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('FINANCIAL_OWN') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                                     
                                            </div>  
                                            
                                            
                                              <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="FINANCIAL_FACILITY">FINANCIAL_FACILITY</label>
                                                        <input value="{{$allmyquote->first()->FINANCIAL_FACILITY}}" name="FINANCIAL_FACILITY" class="form-control py-4" id="FINANCIAL_FACILITY" type="text" >
                                                           @if ($errors->has('FINANCIAL_FACILITY'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('FINANCIAL_FACILITY') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                                     
                                            </div>  
                                            
                                              <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="FINANCIAL_FACILITY_RATE">FINANCIAL_FACILITY_RATE</label>
                                                        <input value="{{$allmyquote->first()->FINANCIAL_FACILITY_RATE}}" name="FINANCIAL_FACILITY_RATE" class="form-control py-4" id="FINANCIAL_FACILITY_RATE" type="text" >
                                                           @if ($errors->has('FINANCIAL_FACILITY_RATE'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('FINANCIAL_FACILITY_RATE') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                                     
                                            </div>  
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                             <h4>CUSTOMER Date & Deadline Information </h4>
                                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                                             
                                            
                                                 <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="DEADLINE_LO_ACCEPTANCE">DEADLINE_LO_ACCEPTANCE</label>
                                                        <input value="{{$allmyquote->first()->DEADLINE_LO_ACCEPTANCE}}" name="DEADLINE_LO_ACCEPTANCE" class="form-control py-1" id="DEADLINE_LO_ACCEPTANCE" type="date" >
                                                           @if ($errors->has('DEADLINE_LO_ACCEPTANCE'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('DEADLINE_LO_ACCEPTANCE') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                                     
                                            </div>  
                                            
                                            
                                              <div class="form-row">
                                                   <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="DEADLINE_LO_RECIEVED">DEADLINE_LO_RECIEVED</label>
                                                        <input value="{{$allmyquote->first()->DEADLINE_LO_RECIEVED}}" name="DEADLINE_LO_RECIEVED" class="form-control py-1" id="DEADLINE_LO_RECIEVED" type="date" >
                                                           @if ($errors->has('DEADLINE_LO_RECIEVED'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('DEADLINE_LO_RECIEVED') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                                     
                                       </div> 
                                    
                                    
                                
                                                     
                                         <div class="form-row">
                                               <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="DEADLINE_LO_DUE">DEADLINE_LO_DUE</label>
                                                        <input value="{{$allmyquote->first()->DEADLINE_LO_DUE}}" name="DEADLINE_LO_DUE" class="form-control py-1" id="DEADLINE_LO_DUE" type="date" >
                                                           @if ($errors->has('DEADLINE_LO_DUE'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('DEADLINE_LO_DUE') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                                     
                                            
                                            </div> 
                                            
                                            
                                            
                                            
                                            
                                            
                                             <h4>SUPPLIER Date & Deadline Information </h4>
                                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                                             
                                            
                                                 <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="DEADLINE_PROJECT_SUMMARY">DEADLINE_PROJECT_SUMMARY</label>
                                                        <input value="{{$allmyquote->first()->DEADLINE_PROJECT_SUMMARY}}" name="DEADLINE_PROJECT_SUMMARY" class="form-control py-1" id="DEADLINE_LO_ACCEPTANCE" type="date" >
                                                           @if ($errors->has('DEADLINE_PROJECT_SUMMARY'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('DEADLINE_PROJECT_SUMMARY') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                                     
                                            </div>  
                                            
                                            
                                              <div class="form-row">
                                                   <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="DEADLINE_DOWNPAYMENT">DEADLINE_DOWNPAYMENT</label>
                                                        <input value="{{$allmyquote->first()->DEADLINE_DOWNPAYMENT}}" name="DEADLINE_DOWNPAYMENT" class="form-control py-1" id="DEADLINE_LO_RECIEVED" type="date" >
                                                           @if ($errors->has('DEADLINE_DOWNPAYMENT'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('DEADLINE_DOWNPAYMENT') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                                     
                                       </div> 
                                    
                                    
                                
                                                     
                                         <div class="form-row">
                                               <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="DEADLINE_COMMITMENT">DEADLINE_COMMITMENT</label>
                                                        <input value="{{$allmyquote->first()->DEADLINE_COMMITMENT}}" name="DEADLINE_COMMITMENT" class="form-control py-1" id="DEADLINE_LO_DUE" type="date" >
                                                           @if ($errors->has('DEADLINE_COMMITMENT'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('DEADLINE_COMMITMENT') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                                     
                                            
                                            </div> 
                                            
                                            
                                            
                                            
                                                    <h2>REMARKS </h2>
                                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                                            
                                              <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="REMARKS_1">REMARKS_1</label>
                                                        <input value="{{$allmyquote->first()->REMARKS_1}}" name="REMARKS_1" class="form-control py-4" id="REMARKS_1" type="text" >
                                                           
                                                    </div>
                                                </div>
                                                     
                                            </div> 
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="REMARKS_2">REMARKS_2</label>
                                                        <input value="{{$allmyquote->first()->REMARKS_2}}" name="REMARKS_2" class="form-control py-4" id="REMARKS_2" type="text" >
                                                           
                                                    </div>
                                                </div>
                                                     
                                            </div> 
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="REMARKS_3">REMARKS_3</label>
                                                        <input value="{{$allmyquote->first()->REMARKS_3}}" name="REMARKS_3" class="form-control py-4" id="REMARKS_3" type="text" >
                                                           
                                                    </div>
                                                </div>
                                                     
                                            </div> 
                                            
                                                     
                                            <button  type=submit class="btn btn-primary btn-block" >Update Project Information</button>
                                        </form>
                                </div>
                            </div>


    
</div>

@endsection
