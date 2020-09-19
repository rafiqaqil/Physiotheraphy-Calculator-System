@extends('layouts.boot')

@section('content')

<div  align="right" class="container">
<div class="row">
        <div class="col-lg-12 pb-12">
        <div class="card mb-4">
          <div class="card-header">
              <a href='/CreateProject'> <button class='btn btn-primary'>Create a Record</button> </a>
              <button class='btn btn-success'>#2</button>
            </div>
            
            </div>
            
            </div>
        </div>
        <!-- DataTables Example -->
           <div class="row">
        <div class="col-lg-12 ">
        <div class="card mb-12">
          <div class="card-header" align="center">
            <i class="fas fa-table"></i>
            My Records List</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable"  cellspacing="0">
                    <thead>
                  <tr>
                      <th>Results</th>
                      
                
                    <th>Details</th>
      
                    <th>DATE</th>
                    
                     
  
                    <th>EDIT</th>
                  </tr>
                </thead>
             
                <tbody>
             
        @foreach($allmyquote as $data)      
                   
         <tr>
              <td>F1 = {{ $data->PERSON_INCHARGE_CONTACT }}m (  {{ number_format($data->LO_NUMBER/$data->PERSON_INCHARGE_CONTACT*100,2)  }}% )<br>
             F2 = {{ $data->COMPANY_INCHARGE }}m (  {{ number_format($data->LO_NUMBER/$data->COMPANY_INCHARGE*100,2)  }}% ) <br>
              
              
              Actual  = {{ $data->LO_NUMBER }}m<br>
              </td>
               <td>
                   Gender: 
                   @if( $data->PROJECT_NO  == 0)
                   {{'Female'}}
                   @else
                   {{'Male'}}
                   @endif
                   <br>
                   Age: {{ $data->CUSTOMER_NAME }}<br>
                   Peak HR: {{ number_format($data->FINANCIAL_FACILITY,0) }}<br>
                   Rest HR: {{ number_format($data->FINANCIAL_OWN,0) }}<br>
                   🔼 HR: {{ $data->PERSON_INCHARGE }}</td>
                    
                     <td>{{ $data->created_at }}</td>
                   
                   
              
                     <td><!-- <a href='../../ProjectShowThisOne/{{ $data->id }}'> <button class='btn btn-primary'>View</button> </a>
                         <a href='../../EditProject/{{ $data->id }}'> <button class='btn btn-warning'>Edit</button> </a>-->
                      <a href='../../DestroyProject/{{ $data->id }}'> <button class='btn btn-danger'>Delete</button> </a></td>
                    </tr>

        @endforeach
        
        
        
                </tbody>
              </table>
            </div>
          </div></div>
            </div>  </div></div>
        
       
</div>
@endsection
