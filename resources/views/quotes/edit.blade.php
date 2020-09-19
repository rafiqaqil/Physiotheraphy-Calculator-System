@extends('layouts.boot')

@section('content')
<div   class="container">
    
<div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">EDIT QUOTE Record</h3></div>
                                    <div class="card-body">
                                         <form action="../../UpdateQuote/{{$quote}}" enctype="multipart/form-data" method="post">
                                            @csrf
                                            @method('PATCH')
                                            
                                                   <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="PROJECT_ID">PROJECT_ID</label>
                                                        <input value='{{$allmyquote->first()->project_id}}' name="project_id" class="form-control py-4" id="project_id" type="text" placeholder="Enter project ID">
                                                                    @if ($errors->has('project_id'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('project_id') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="SUPPLIER">SUPPLIER Name</label>
                                                        <input value='{{$allmyquote->first()->SUPPLIER}}' name="SUPPLIER" class="form-control py-4" id="SUPPLIER" type="text" placeholder="Enter SUPPLIER name">
                                                                  @if ($errors->has('SUPPLIER'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('SUPPLIER') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="SUPPLIER_CONTACT">SUPPLIER_CONTACT INFO</label>
                                                        <input value='{{$allmyquote->first()->SUPPLIER_CONTACT}}' name="SUPPLIER_CONTACT" class="form-control py-4" id="SUPPLIER_CONTACT" type="text" placeholder="Enter SUPPLIER_CONTACT">
                                                           @if ($errors->has('SUPPLIER_CONTACT'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('SUPPLIER_CONTACT') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                       
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="QUOTE_DESCRIPTION">QUOTE_DESCRIPTION</label>
                                                <input  value='{{$allmyquote->first()->QUOTE_DESCRIPTION}}' name="QUOTE_DESCRIPTION" rows="10" cols="30" class="form-control py-4" id="QUOTE_DESCRIPTION" type="text"  placeholder="Enter quote Description"></textarea>
                                                   @if ($errors->has('QUOTE_DESCRIPTION'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('QUOTE_DESCRIPTION') }}</strong>
                                                                    </span>
                                                                    @endif
                                            </div>
                                                
                                             <div class="form-group">
                                             <label class="small mb-1" for="PDF_FILE">PDF_FILE</label>
                                                                <input  value='{{$allmyquote->first()->PDF_FILE}}' class="input-file" type="file" name="PDF_FILE" id="PDF_FILE">
                                                                <label class="label--file" for="file">Choose file</label>
                                                                
                                       
                                            </div>
                                            
                                            
                                                 <div class="form-group">
                                             <label class="small mb-1" for="ACTIVE_STATUS">ACTIVE_STATUS</label>
                                             <select  value='{{$allmyquote->first()->ACTIVE_STATUS}}' class="input-file" type="file" name="ACTIVE_STATUS" id="PDF_FILE">
                                                 <option value='1'>Active</option>
                                                   <option value='0'>Inactive</option>
                                             </select>
                                                              
                                                                
                                       
                                            </div>
                                            
                                            <button  type=submit class="btn btn-primary btn-block" >Update Quote Record</button>
                                        </form>
                                </div>
                            </div>


    
</div>

@endsection
