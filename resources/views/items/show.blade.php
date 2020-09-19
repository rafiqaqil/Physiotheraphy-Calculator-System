@extends('layouts.boot')

@section('content')

<div   class="container">
<div class="row">
        <div class="col-lg-12 pb-12">
        <div class="card mb-4">
          <div class="card-header">
              <a href='../../../DestroyQuote/{{$quote}}'> <button class='btn btn-danger'>Delete Quote </button> </a>
              <a href='../../../EditQuote/{{$quote}}'> <button class='btn btn-warning'>Edit Quote </button> </a>
              <button class='btn btn-success'>#2</button>
             
            </div>
            
            </div>
            
            </div>
    
      <div class="col-lg-12 pb-12">
    <div class="card mb-4">
         <div class="card-header">
      @foreach($allmyquote as $data)
      
      
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
          
           <br>Project ID         : {{$data-> PROJECT_ID}}<br>
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
                    <th>PROJECT_ID</th>
                    <th>SUPPLIER</th>
                    <th>SUPPLIER_CONTACT</th>
                   
                    <th>QUOTE_DESCRIPTION</th>
                     <th>PDF</th>
                     <th>Time Created</th>
                    <th>Last updated_at</th>
                    
                    <th>STATUS</th>
                    <th>VIEW</th>
                  </tr>
                </thead>
             
                <tbody>
             
        @foreach($allmyquote as $data)      
                   
                    <td>{{ $data->PROJECT_ID }}</td>
                    <td>{{ $data->SUPPLIER }}</td>
                    <td>{{ $data->SUPPLIER_CONTACT }}</td>
                    <td align="right">{{ $data->QUOTE_DESCRIPTION }}</td>
                     <td>{{ $data->PDF_FILE }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->updated_at }}</td>
                    <td>{{ $data->ACTIVE_STATUS }}</td>
                     <td><a href='../../MyQuotesList/{{ $data->id }}'> <button class='btn btn-primary'>VIEW</button> </a></td>
                    </tr>

        @endforeach
        
        
        
                </tbody>
              </table>
            </div>
          </div></div>
            </div>  </div></div>
        
       
</div>
@endsection
