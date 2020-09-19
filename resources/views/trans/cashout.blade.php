@extends('layouts.boot')

@section('content')
<div class="container">
    <form action="/addTrans" enctype="multipart/form-data" method="post">
        @csrf

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Add CASH OUR Transactions</h1>
                </div>
                
                
                <input name="group" id="group" value="OUT"  hidden="true">    
  <input name="outstanding" id="outstanding" value="0"  hidden="true">    
                <div class="form-group row">
                    <label for="Name" class="col-md-4 col-form-label">Name</label>

                    <input id="Name"
                           type="text"
                           class="form-control{{ $errors->has('Name') ? ' is-invalid' : '' }}"
                           name="Name"
                           value="{{ old('Name') }}"
                           autocomplete="Name" autofocus>

                    @if ($errors->has('Name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('Name') }}</strong>
                        </span>
                    @endif
                </div>
                    
                           <div class="form-group row">
                    <label for="Desc" class="col-md-4 col-form-label">Description</label>

                    <input id="Desc"
                           type="text"
                           class="form-control{{ $errors->has('Desc') ? ' is-invalid' : '' }}"
                           name="Desc"
                           value="{{ old('Desc') }}"
                           autocomplete="Desc" autofocus>

                    @if ($errors->has('Desc'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('Desc') }}</strong>
                        </span>
                    @endif
                </div>
                
                           <div class="form-group row">
                    <label for="category" class="col-md-4 col-form-label">category</label>

                    <select id="category"
                           type="text"
                           class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}"
                           name="category"
                           value="{{ old('category') }}"
                           autocomplete="category" autofocus>
                       
                        
                          <option value="Expenses" >Expenses</option>
                     <option value="Purchases">Purchases</option>
                      <option value="Drawings">Drawings</option>
                       <option value="Dispose Assets">Dispose Assets</option>
                        <option value="Deposit to Bank">Deposit to Bank</option>
                        <option value="Acquire New Assets">Acquire New Assets</option>
                       
                    </select>
                    
                    @if ($errors->has('category'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('category') }}</strong>
                        </span>
                    @endif
                </div>
                
                
                         <div class="form-group row">
                    <label for="amount" class="col-md-4 col-form-label">Amount</label>

                    <input id="amount"
                           type="text"
                           class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}"
                           name="amount"
                           value="{{ old('amount') }}"
                           autocomplete="amount" autofocus>

                    @if ($errors->has('amount'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('amount') }}</strong>
                        </span>
                    @endif
                </div>
                
         

                <div class="row pt-4">
                    <button class="btn btn-primary">Add New Transaction</button>
                </div>

            </div>
        </div>
    </form>
</div>

  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
@endsection
