@extends('layouts.boot')

@section('content')
<div  align="left" class="container">

      
    <div class="row pt-5">
     <div class="col-lg-8">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                Bar Chart</div>
              <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div></div></div><div class="chartjs-size-monitor-shrink"><div></div></div></div>
                 {!! $barchart->container() !!}
              </div>
                
                

              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
          </div>
      {!! $barchart->script() !!}
      
      
                      

       <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-pie"></i>
                Pie Chart</div>
              <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div></div></div><div class="chartjs-size-monitor-shrink"><div></div></div></div>
                 {!! $piechart->container() !!}
              </div>
              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
          </div>
        {!! $piechart->script() !!}
        
    </div>
    
                       <div class="row pt-5">
     <div class="col-lg-8">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                Claims Summary </div>
              <div class="card-body">
                  
                  @if($allMyDataApprovedCount > 0)
                  <h6>Total Number of Claims : {{$allMyDataApprovedCount}} </h6>
                  <h6>Total Value Claimed : RM{{$totaldec1+$totaldec2+$totaldec3+$totaldec4+$totaldec5}} </h6>
                   <h6>Average Claim Value: RM{{($totaldec1+$totaldec2+$totaldec3+$totaldec4+$totaldec5)/$allMyDataApprovedCount}} </h6>
                  
                   <!-- cara calculate claim-->
                  <h6>Total Number of Pending Claims : {{$allMyDataPendingCount}}</h6>
                <h6>Petrol : {{ $totaldec1 }} -- {{ number_format(($totaldec1/($totaldec1+$totaldec2+$totaldec3+$totaldec4+$totaldec5))*100, 2 , '.' , ',') }}%</h6>
                <h6>Food : {{ $totaldec2 }} -- <font color="#FF1329">{{number_format(($totaldec2/($totaldec1+$totaldec2+$totaldec3+$totaldec4+$totaldec5))*100, 2 , '.' , ',')  }}%</font></h6>
                <h6>Tolls: {{ $totaldec3 }} -- <font color="#FF1329">{{number_format(($totaldec3/($totaldec1+$totaldec2+$totaldec3+$totaldec4+$totaldec5))*100, 2 , '.' , ',')  }}%</font></h6>
                <h6>Hotels: {{ $totaldec4 }} -- {{number_format(($totaldec4/($totaldec1+$totaldec2+$totaldec3+$totaldec4+$totaldec5))*100, 2 , '.' , ',')  }}%</h6>
                <h6>Others: {{ $totaldec5 }} -- {{number_format(($totaldec5/($totaldec1+$totaldec2+$totaldec3+$totaldec4+$totaldec5))*100, 2 , '.' , ',')  }}%</h6>
                @else
                <small>No Approved Claims at the moment</small>
                
                @endif
                
              </div></div>
     </div>
      
      <a href='{{ env("absolute")}}/profile/{{$user->id}}/createMydata'><button class='btn btn-success'>Add Data</button></a>
    <a href='{{ env("absolute")}}/profile/{{$user->id}}/ShowRecMyData'><button class='btn btn-warning'>Recycle Bin</button></a>
    <div class="row pt-5">
        <div class="col-lg-15">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-list"></i>
                Pending Claims </div>
                <div class="card-body">
           <table class="table border-primary">
                     <thead bgcolor="#ebfafa">
                     <td>Username</td>
                     
                    <td>Information</td>
               
                    <td>Petrol Claims</td>
                    <td>Food Claims</td>
                    <td>Toll Claims</td>
                    <td>Hotel Claims</td>
                    <td>Others</td>
                    <td>Total Claims</td>
                    <td>Created At &
                    Updated At</td>
                    <td>Approval Status</td>
                    <td>Action
                   Permanent Delete</td>
                    </thead>
        @foreach($allMyDataPending as $a)
            <div class="col-12 pb-12">
                    @if($a->dec1 < 0)
                    <tr bgcolor="#ffbc6b">
                    @else
                    <tr bgcolor="#94f481">
                    @endif
                    
                    <td>

                      <img style='vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;'
   src='{{env("absolute")}}/storage/{{ $a->user->profile()->pluck("image")[0] }}'></img>

                     {{ $a->user->username }}  <a href="{{ env('absolute')}}/profile/{{ $a->user->id }}/ShowMyData"><button class='btn btn-info'>Show User Claims</button></a></td>
                    <td>Date: {{ $a->str1 }}<br>
                        Description: {{ $a->str2 }}<br>
                    Distance: {{ $a->str3 }}<br>
                    Food : {{ $a->str4 }}<br>
                    Other: {{ $a->str5 }}</td>
                    
                    <td>{{ $a->dec1 }}</td>
                    <td>{{ $a->dec2 }}</td>
                    <td>{{ $a->dec3 }}</td>
                    <td>{{ $a->dec4 }}</td>
                    <td>{{ $a->dec5 }}</td>
                    
                     <td>RM {{ $a->dec1+$a->dec2+$a->dec3+$a->dec4+$a->dec5 }}</td>
                    <td>{{ $a->created_at }}<br>
                    {{ $a->updated_at }}</td>
                    <td>{{ $a->str6 }} 
                    
                    <a href='{{ env("absolute")}}/{{$user->id}}/MastereditMydata/{{$a->id }}'><button class='btn-success'>Approve Now</button>
                    </td>
                    <td><a href='{{ env("absolute")}}/{{$user->id}}/MastereditMydata/{{$a->id }}'><button class='btn-warning'>Edit</button></a>
                    <a href='{{ env("absolute")}}/{{$user->id}}/editMydata/{{$a->id }}/softdel'><button class='btn-danger'>Delete</button></a></td>
                    </tr>
                
                    
               
                </a>
            </div>
        @endforeach
        
        </table>
    </div></div></div></div>
    
    
    
        <div class="row pt-5">
        <div class="col-lg-15">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-list"></i>
                Approved Claims </div>
                <div class="card-body">
           <table class="table border-primary">
                     <thead bgcolor="#ebfafa">
                     <td>Username</td>
                    <td>Information</td>
                    <td>Petrol Claims</td>
                    <td>Food Claims</td>
                    <td>Toll Claims</td>
                    <td>Hotel Claims</td>
                    <td>Others</td>
                    <td>Total Claims</td>
                    <td>Created At &
                    Updated At</td>
                    <td>Approval Status</td>
                    <td>Action
                   Permanent Delete</td>
                    </thead>
        @foreach($allMyDataApproved as $a)
            <div class="col-12 pb-12">
                  
                    
                    <td>

<img style='vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;'
   src='{{env("absolute")}}/storage/{{ $a->user->profile()->pluck("image")[0] }}'></img>


                      {{ $a->user->username }}  <a href="{{ env('absolute')}}/profile/{{ $a->user->id }}/ShowMyData"><button class='btn btn-info'>Show User Claims</button></a></td>
                    <td>Date: {{ $a->str1 }}<br>
                        Description: {{ $a->str2 }}<br>
                    Distance: {{ $a->str3 }}<br>
                    Food : {{ $a->str4 }}<br>
                    Others: {{ $a->str5 }}</td>
                    
                    <td>{{ $a->dec1 }}</td>
                    <td>{{ $a->dec2 }}</td>
                    <td>{{ $a->dec3 }}</td>
                    <td>{{ $a->dec4 }}</td>
                    <td>{{ $a->dec5 }}</td>
                    
                     <td>RM {{ $a->dec1+$a->dec2+$a->dec3+$a->dec4+$a->dec5 }}</td>
                    <td>{{ $a->created_at }}<br>
                    {{ $a->updated_at }}</td>
                    <td>{{ $a->str6 }} 
                    
                  
                    </td>
                    <td><a href='{{ env("absolute")}}/{{$user->id}}/MastereditMydata/{{$a->id }}'><button class='btn-warning'>Edit</button></a>
                    <a href='{{ env("absolute")}}/{{$user->id}}/editMydata/{{$a->id }}/softdel'><button class='btn-danger'>Delete</button></a></td>
                    </tr>
                
                    
               
                </a>
            </div>
        @endforeach
        
        </table>
    </div></div></div></div>

</div>
@endsection
