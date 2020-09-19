@extends('layouts.boot')

@section('content')
<div   class="container">
    
<div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">EDIT QUOTE Record</h3></div>
                                    <div class="card-body">
                                         <form action="../../UpdateItem/{{$item->id}}" enctype="multipart/form-data" method="post">
                                            @csrf
                                            @method('PATCH')
                                            
                                         <h5>General </h5>
                                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                                                  <div class="form-row">
                                                <div class="col-md-12">
                                                 <div class="form-group">
                                                        <label class="small mb-1" for="ITEM_NAME">ITEM_NAME</label>
                                                        <input value='{{$allmyquote->first()->ITEM_NAME}}' name="ITEM_NAME" class="form-control py-1" id="ITEM_NAME" type="text" placeholder="ITEM_NAME">
                                                                    @if ($errors->has('ITEM_NAME'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('ITEM_NAME') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                       
                                            </div>
                                                   <div class="form-row">
                                              
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="CURRENCY">CURRENCY</label>
                                                        <select name="CURRENCY" class="form-control py-1" id="CURRENCY" >
                                                            
                                                            <option value="RM">MYR (RM)</option>
                                                            <option value="OTHER">OTHER</option>
                                                            </select>
                                                                  @if ($errors->has('CURRENCY'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('CURRENCY') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                                         <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="EXCHANGE_RATE">EXCHANGE_RATE</label>
                                                        <input value='{{$allmyquote->first()->EXCHANGE_RATE}}' name="EXCHANGE_RATE" class="form-control py-1" id="ITEM_NAME" type="text" placeholder="EXCHANGE_RATE">
                                                                    @if ($errors->has('EXCHANGE_RATE'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('EXCHANGE_RATE') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                      
                                           <div class="form-row">
                                              
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="QTY">QTY</label>
                                                        <input value='{{$allmyquote->first()->QTY}}' name="QTY" class="form-control py-1" id="ITEM_NAME" type="text" placeholder="QTY">
                                                                    @if ($errors->has('QTY'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('QTY') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                                         <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="COST_PER_UNIT">COST_PER_UNIT</label>
                                                        <input value='{{$allmyquote->first()->COST_PER_UNIT}}' name="COST_PER_UNIT" class="form-control py-1" id="ITEM_NAME" type="text" placeholder="COST_PER_UNIT">
                                                                    @if ($errors->has('COST_PER_UNIT'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('COST_PER_UNIT') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                            
                                             <h5>Charger Costs </h5>
                                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                                                      <div class="form-row">
                                              
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="CHARGER_COMMISION">CHARGER_COMMISION</label>
                                                        <input value='{{$allmyquote->first()->CHARGER_COMMISION}}' name="CHARGER_COMMISION" class="form-control py-1" id="CHARGER_COMMISION" type="text" placeholder="QTY">
                                                                    @if ($errors->has('CHARGER_COMMISION'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('CHARGER_COMMISION') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                                         <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="CHARGER_TRAINING">CHARGER_TRAINING</label>
                                                        <input value='{{$allmyquote->first()->CHARGER_TRAINING}}' name="CHARGER_TRAINING" class="form-control py-1" id="ITEM_NAME" type="text" placeholder="CHARGER_TRAINING">
                                                                    @if ($errors->has('CHARGER_TRAINING'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('CHARGER_TRAINING') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                                          
                                                             <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="CHARGER_DELIVERY">CHARGER_DELIVERY</label>
                                                        <input value='{{$allmyquote->first()->CHARGER_DELIVERY}}' name="CHARGER_DELIVERY" class="form-control py-1" id="CHARGER_DELIVERY" type="text" placeholder="CHARGER_DELIVERY">
                                                                    @if ($errors->has('CHARGER_DELIVERY'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('CHARGER_DELIVERY') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                                         <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="CHARGER_OTHER">CHARGER_OTHER</label>
                                                        <input value='{{$allmyquote->first()->CHARGER_OTHER}}' name="CHARGER_OTHER" class="form-control py-1" id="ITEM_NAME" type="text" placeholder="CHARGER_OTHER">
                                                                    @if ($errors->has('CHARGER_OTHER'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('CHARGER_OTHER') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                      
                                            
                                                  <div class="form-row">
                                                <div class="col-md-12">
                                                 <div class="form-group">
                                                        <label class="small mb-1" for="MARGIN">MARGIN</label>
                                                        <input value='{{$allmyquote->first()->MARGIN}}' name="MARGIN" class="form-control py-1" id="MARGIN" type="float" placeholder="MARGIN">
                                                                    @if ($errors->has('MARGIN'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('MARGIN') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                       
                                            </div>
                                           
                                       
                                       
                                            
                                            
                                            <button  type=submit class="btn btn-primary btn-block" >Update Item</button>
                                        </form>
                                </div>
                            </div>


    
</div>

@endsection
