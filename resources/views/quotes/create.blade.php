@extends('layouts.boot')

@section('content')
<div   class="container">
    
<div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">ADD NEW QUOTE Record</h3></div>
                                    <div class="card-body">
                                         <form action="/StoreQuote" enctype="multipart/form-data" method="post">
                                            @csrf
                                                   <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="PROJECT_ID">PROJECT_ID</label>
                                                        <input name="PROJECT_ID" class="form-control py-4" id="PROJECT_ID" type="text" placeholder="Enter project ID">
                                                                    @if ($errors->has('PROJECT_ID'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('PROJECT_ID') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="SUPPLIER">SUPPLIER Name</label>
                                                        <input name="SUPPLIER" class="form-control py-4" id="SUPPLIER" type="text" placeholder="Enter SUPPLIER name">
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
                                                        <input name="SUPPLIER_CONTACT" class="form-control py-4" id="SUPPLIER_CONTACT" type="text" placeholder="Enter SUPPLIER_CONTACT">
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
                                                <textarea name="QUOTE_DESCRIPTION" value="" rows="10" cols="30" class="form-control py-4" id="QUOTE_DESCRIPTION" type="text"  placeholder="Enter quote Description"></textarea>
                                                   @if ($errors->has('QUOTE_DESCRIPTION'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('QUOTE_DESCRIPTION') }}</strong>
                                                                    </span>
                                                                    @endif
                                            </div>
                                                
                                             <div class="form-group">
                                             <label class="small mb-1" for="PDF_FILE">PDF_FILE</label>
                                                                <input class="input-file" type="file" name="PDF_FILE" id="PDF_FILE">
                                                                <label class="label--file" for="file">Choose file</label>
                                                                
                                                                <div class="progress">
                                                                        <div class="bar"></div >
                                                                        <div class="percent"></div >
                                                                    </div>

                                                                    <div id="status"></div>
                                            </div>
                                            
                                            <button  type=submit class="btn btn-primary btn-block" >Add Quote</button>
                                        </form>
                                </div>
                            </div>


    
</div>
    <script>
    
    $(function() {

        var bar = $('.bar');
        var percent = $('.percent');
        var status = $('#status');

        $('form').ajaxForm({
            beforeSend: function() {
                status.empty();
                var percentVal = '0%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            complete: function(xhr) {
                status.html(xhr.responseText);
            }
        });
    }); 
    </script>
@endsection
