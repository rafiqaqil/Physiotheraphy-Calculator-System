@extends('layouts.boot')

@section('content')

<div   class="container">
<div class="row">
        <div class="col-lg-12 pb-12">
        <div class="card mb-4">
          <div class="card-header">
             <a href='../../../DestroyProject/{{$project->id}}'> <button  class='btn btn-danger' >Delete Project </button> </a>
              <a href='../../../EditProject/{{$project->id}}'> <button class='btn btn-warning'>Edit Project </button> </a>
              <a href='../../../ProjectCosting/{{$project->id}}'> <button class='btn btn-success'>GENERATE PROJECT COSTING</button></a>
             
            </div>
            
            </div>
            
            </div>
    
      <div class="col-lg-12 pb-12">
    <div class="card mb-4">
         <div class="card-header">
      @foreach($allmyquote as $data)
      
      
  
      <button class="btn btn-primary">
               Status: {{$data-> PROJECT_STATUS }}<br>
      </button>
      <br>
      <table>
                  <h4>Basic Info </h4>
                <hr style="height:2px;border-width:0;color:gray;background-color:gray">
           PROJECT_NO       : {{$data-> PROJECT_NO}}<br>
               CUSTOMER_NAME           : {{$data-> CUSTOMER_NAME}}<br>
               PERSON_INCHARGE   : {{$data-> PERSON_INCHARGE}}<br>
               PERSON_INCHARGE_CONTACT  : {{$data-> PERSON_INCHARGE_CONTACT}}<br><br>
               
                 <h4>Others </h4>
                <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                
               LO_NUMBER                : {{$data-> LO_NUMBER}}<br>
               PROJECT_STATUS                : {{$data-> PROJECT_STATUS}}<br><br>
               
               Time Created       : {{$data-> created_at}}<br>
               Time Updated       : {{$data-> updated_at}}<br>
                 <h4>Financial Info </h4>
                                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
               FINANCIAL_OWN                :RM {{$data-> FINANCIAL_OWN}}<br>
               FINANCIAL_FACILITY                :RM {{$data-> FINANCIAL_FACILITY}}<br>
               FINANCIAL_FACILITY_RATE                :RM {{$data-> FINANCIAL_FACILITY_RATE}}<br>
               FINANCIAL_FACILITY_EXPENSES               :RM {{$data->FINANCIAL_FACILITY*(0+($data-> FINANCIAL_FACILITY_RATE/100))}}<br>
               Financial Summary                :RM {{$data-> FINANCIAL_OWN + ($data->FINANCIAL_FACILITY*(1+($data-> FINANCIAL_FACILITY_RATE/100)))}}<br>
                <br>
                             <h4>Date & Deadline Info </h4>
                             
                            
                                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                                            
              

               DEADLINE_LO_ACCEPTANCE                : {{$data-> DEADLINE_LO_ACCEPTANCE}}
               
                   @if((Carbon\Carbon::now()->diffInHours($data-> DEADLINE_LO_ACCEPTANCE)/24) < 7.0)
                   <button class='btn btn-danger'>Warning
                       {{  number_format(Carbon\Carbon::now()->diffInHours($data-> DEADLINE_LO_ACCEPTANCE)/24,1,'.','') }} Days  to go
                       
                   </button>
               @elseif((Carbon\Carbon::now()->diffInHours($data-> DEADLINE_LO_ACCEPTANCE)/24) < 14.0)
               <button class='btn btn-warning'>Warning
                   {{  number_format(Carbon\Carbon::now()->diffInHours($data-> DEADLINE_LO_ACCEPTANCE)/24,1,'.','') }} Days  to go
               </button>
               
               @else
               <button class='btn btn-success'>
                   {{  number_format(Carbon\Carbon::now()->diffInHours($data-> DEADLINE_LO_ACCEPTANCE)/24,1,'.','') }} Days  to go
               </button>
               @endif
                <br>
               
               
               DEADLINE_LO_RECIEVED                : {{$data-> DEADLINE_LO_RECIEVED}}  
              
             
                        @if((Carbon\Carbon::now()->diffInHours($data-> DEADLINE_LO_RECIEVED)/24) < 7.0)
               <button class='btn btn-danger'>Warning
                {{  number_format(Carbon\Carbon::now()->diffInHours($data-> DEADLINE_LO_RECIEVED)/24,1,'.','') }} Days  to go
               </button>
               @elseif((Carbon\Carbon::now()->diffInHours($data-> DEADLINE_LO_RECIEVED)/24) < 14.0)
               <button class='btn btn-warning'>Warning
                   {{  number_format(Carbon\Carbon::now()->diffInHours($data-> DEADLINE_LO_RECIEVED)/24,1,'.','') }} Days  to go
               </button>
                 @else
               <button class='btn btn-success'>
                   {{  number_format(Carbon\Carbon::now()->diffInHours($data-> DEADLINE_LO_RECIEVED)/24,1,'.','') }} Days  to go
               </button>
                
               @endif
               <br>
               
               
               
               
               
               
             
               
               DEADLINE_LO_DUE                : {{$data-> DEADLINE_LO_DUE}}
              
               
                 @if((Carbon\Carbon::now()->diffInHours($data-> DEADLINE_LO_DUE)/24) < 7.0)
                 <button class='btn btn-danger'>Warning 
                      {{  number_format(Carbon\Carbon::now()->diffInHours($data-> DEADLINE_LO_DUE)/24,1,'.','') }} Days  to go
                 </button>
               @elseif((Carbon\Carbon::now()->diffInHours($data-> DEADLINE_LO_DUE)/24) < 14.0)
               <button class='btn btn-warning'>Warning
                {{  number_format(Carbon\Carbon::now()->diffInHours($data-> DEADLINE_LO_DUE)/24,1,'.','') }} Days  to go
               </button>
               
               
               
                @else
               <button class='btn btn-success'>
                   {{  number_format(Carbon\Carbon::now()->diffInHours($data-> DEADLINE_LO_DUE)/24,1,'.','') }} Days  to go
               </button>
                
               @endif
               
                             <h4>Date & Deadline Info (SUPPLIER)</h4>
                             
                            
                                            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                                            
              

               DEADLINE_PROJECT_SUMMARY                : {{$data-> DEADLINE_PROJECT_SUMMARY}}
               
                   @if((Carbon\Carbon::now()->diffInHours($data-> DEADLINE_PROJECT_SUMMARY)/24) < 7.0)
                   <button class='btn btn-danger'>Warning
                       {{  number_format(Carbon\Carbon::now()->diffInHours($data-> DEADLINE_PROJECT_SUMMARY)/24,1,'.','') }} Days  to go
                       
                   </button>
               @elseif((Carbon\Carbon::now()->diffInHours($data-> DEADLINE_PROJECT_SUMMARY)/24) < 14.0)
               <button class='btn btn-warning'>Warning
                   {{  number_format(Carbon\Carbon::now()->diffInHours($data-> DEADLINE_PROJECT_SUMMARY)/24,1,'.','') }} Days  to go
               </button>
               
               @else
               <button class='btn btn-success'>
                   {{  number_format(Carbon\Carbon::now()->diffInHours($data-> DEADLINE_PROJECT_SUMMARY)/24,1,'.','') }} Days  to go
               </button>
               @endif
                <br>
               
               
               DEADLINE_DOWNPAYMENT                : {{$data-> DEADLINE_DOWNPAYMENT}}  
              
             
                        @if((Carbon\Carbon::now()->diffInHours($data-> DEADLINE_DOWNPAYMENT)/24) < 7.0)
               <button class='btn btn-danger'>Warning
                {{  number_format(Carbon\Carbon::now()->diffInHours($data-> DEADLINE_DOWNPAYMENT)/24,1,'.','') }} Days  to go
               </button>
               @elseif((Carbon\Carbon::now()->diffInHours($data-> DEADLINE_DOWNPAYMENT)/24) < 14.0)
               <button class='btn btn-warning'>Warning
                   {{  number_format(Carbon\Carbon::now()->diffInHours($data-> DEADLINE_DOWNPAYMENT)/24,1,'.','') }} Days  to go
               </button>
                 @else
               <button class='btn btn-success'>
                   {{  number_format(Carbon\Carbon::now()->diffInHours($data-> DEADLINE_DOWNPAYMENT)/24,1,'.','') }} Days  to go
               </button>
                
               @endif
               <br>
               
               
               
               
               
               
             
               
               DEADLINE_COMMITMENT                : {{$data-> DEADLINE_COMMITMENT}}
              
               
                 @if((Carbon\Carbon::now()->diffInHours($data-> DEADLINE_COMMITMENT)/24) < 7.0)
                 <button class='btn btn-danger'>Warning 
                      {{  number_format(Carbon\Carbon::now()->diffInHours($data-> DEADLINE_COMMITMENT)/24,1,'.','') }} Days  to go
                 </button>
               @elseif((Carbon\Carbon::now()->diffInHours($data-> DEADLINE_COMMITMENT)/24) < 14.0)
               <button class='btn btn-warning'>Warning
                {{  number_format(Carbon\Carbon::now()->diffInHours($data-> DEADLINE_COMMITMENT)/24,1,'.','') }} Days  to go
               </button>
               
               
               
                @else
               <button class='btn btn-success'>
                   {{  number_format(Carbon\Carbon::now()->diffInHours($data-> DEADLINE_COMMITMENT)/24,1,'.','') }} Days  to go
               </button>
                
               @endif
              
              
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
            Quotes on Project</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable"  cellspacing="0">
                    <thead>
                  <tr>
                 
                    <th>SUPPLIER</th>
                   
                   
                    <th>QUOTE_DESCRIPTION</th>
                     <th>PDF</th>
                  
                    <th>Last updated_at</th>
                    
                    <th>STATUS</th>
                    <th>VIEW</th>
                  </tr>
                </thead>
             
                <tbody>
             
        @foreach($allmyquoteONproject as $data)      
                   
                   
                    <td>{{ $data->SUPPLIER }}</td>
                    
                    <td align="right">{{ $data->QUOTE_DESCRIPTION }}</td>
                     <td>{{ $data->PDF_FILE }}</td>
                    
                    <td>{{ $data->updated_at }}</td>
                    <td>
                        
                        @if($data->ACTIVE_STATUS == 1)
                    
                        <button class="btn btn-success">
                                 ACTIVE<br>
                        </button>
                        @else
                          <button class="btn btn-warning">
                                 INACTIVE<br>
                        </button>
                        @endif
                    
                    </td>
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
