@extends('layouts.boot')

@section('content')

<div   class="container">
<div class="row">
        <div class="col-lg-12 pb-12">
        <div class="card mb-4">
          <div class="card-header">
               @foreach($allmyquote as $data)
              <a href='../../../DestroyQuote/{{$data->id}}'> <button class='btn btn-danger'>Delete Quote </button> </a>
              <a href='../../../EditQuote/{{$data->id}}'> <button class='btn btn-warning'>Edit Quote </button> </a>
              
              <a href='../../../{{$data->id}}/CreateItem/'> <button class='btn btn-success'>Add Items to Quote</button></a>
             
            </div>
            
            </div>
            
            </div>
    
      <div class="col-lg-12 pb-12">
    <div class="card mb-4">
         <div class="card-header">
     
      
      
      @if($data-> ACTIVE_STATUS == 1)
      <button class="btn btn-success">
               ACTIVE <br>
      </button>
      @endif
       @if($data-> ACTIVE_STATUS == 0)
      <button class="btn btn-warning">
               INACTIVE <br>
      </button>
      @endif
      <table>
          
           <br>Project NO        : {{$data-> project_id}}<br>
               SUPPLIER           : {{$data-> SUPPLIER}}<br>
               SUPPLIER_CONTACT   : {{$data-> SUPPLIER_CONTACT}}<br>
               QUOTE_DESCRIPTION  : {{$data-> QUOTE_DESCRIPTION}}<br>
               PDF                : {{$data-> PDF}}<br>
               Time Created       : {{$data-> created_at}}<br>
               Time Updated       : {{$data-> updated_at}}<br>
              
              
               </table>
                 @endforeach
      
      
      </div>  </div>
      </div>
    
    
    
        </div>
        <!-- DataTables Example -->
           <div class="row">
        <div class="col-lg-12 ">
        <div class="card mb-12">
          <div class="card-header">
            <i class="fas fa-table"></i>
            ITEMS ON QUOTE</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable"  cellspacing="0">
                    <thead>
                  <tr>
                     
                    <th>ITEM_NAME</th>
                    <th>CURRENCY</th>
                 
                   
                  
                     <th>Costing</th>
                     <th>Charger Cost</th>
                     <th>Margin</th>
                    <th>Price</th>
                    
                    <th>Net Profit</th>
                    
                  </tr>
                </thead>
             
                <tbody>
             
        @foreach($allmyquoteItems as $data)      
                   <tr>
                        
                    <td>{{ $data->ITEM_NAME }}<br>
                    <a href='../../EditItem/{{ $data->id }}'> <button class='btn btn-warning'>Edit</button> </a>
                    </td>
                    <td>{{ $data->CURRENCY }}<br>
                    RATE to MYR: {{ $data->EXCHANGE_RATE }}</td>
                    <td>Qty :{{ $data->QTY }}<br>
                    COST_PER_UNIT: RM{{ $data->COST_PER_UNIT*$data->EXCHANGE_RATE }}<br>
                    TOTAL_PRICE: RM{{ $data->TOTAL_PRICE*$data->EXCHANGE_RATE }}
                    </td>
                    <td>
                         COMMISION: RM{{ $data->CHARGER_COMMISION*$data->EXCHANGE_RATE }}<br>
                          TRAINING: RM{{ $data->CHARGER_TRAINING*$data->EXCHANGE_RATE }}<br>
                           DELIVERY: RM{{ $data->CHARGER_DELIVERY*$data->EXCHANGE_RATE }}<br>
                                OTHER: RM{{ $data->CHARGER_OTHER*$data->EXCHANGE_RATE }}
                                
                                
                        </td>
                   
                    <td>{{ $data->MARGIN }}</td>
                    <td>RM {{ $data->PRICE_PER_UNIT_MYR}}/Unit <br>
                        Total  : RM {{ $data->TOTAL_PRICE_MYR }}
                    </td>
                    <td>RM {{$data->NET_PROFIT_MYR}}</td>
                    
                    </tr>

        @endforeach
        
        
        
                </tbody>
              </table>
            </div>
          </div></div>
            </div>  </div></div>
        
       
</div>
@endsection
