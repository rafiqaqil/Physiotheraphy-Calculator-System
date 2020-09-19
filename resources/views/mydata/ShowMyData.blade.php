@extends('layouts.boot')

@section('content')
<div  align="right" class="container">

          <div class="row">
        <div class="col-3 p-5">
            <img src="{{env('absolute')}}{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
        </div>
        <div class="col-12 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
              
            <div class="h4">{{ $user->username }}</div>
            <div class=" font-weight-bold">Full Name :{{ $user->profile->title }}</div>
            <div class=" font-weight-bold" >Post: {{ $user->profile->description }}</div>
            <div class="font-weight-bold" >Email: {{ $user->profile->location }}</div>
            <div class=" font-weight-bold">Tel: {{ $user->profile->contact }}</div>
            
            </div>
        </div>
          </div>
    
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
         <div class="col-lg-12">
      <a href='{{ env("absolute")}}/profile/{{$user->id}}/createMydata'><button class='  btn  btn-success '>Add NEW Claim</button></a>
    <a href='{{ env("absolute")}}/profile/{{$user->id}}/ShowRecMyData'><button class='btn btn-warning block'>Recycle Bin</button></a>
    </div>   </div>
    <div class="row pt-5">
        <div class="col-lg-12">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-list"></i>
                MyData List </div>
                <div class="card-body">
           <table class="table border-primary">
                     <thead bgcolor="#ebfafa">
                    <td>Date of Travel</td>
                    <!-- <td>Distance</td> -->
                    <td>Description</td><td>Other Claims Statements</td>
                    <td>Food Claims Statement</td>
                    
                    <td>Petrol Claim (RM) </td>
                    <td>Food Claims (RM)</td>
                    <td>Toll Claims (RM)</td>
                    <td>Hotel Claims (RM)</td>
                    <td>Others (RM)</td>
                     <!-- <td>Created At</td> -->
                    <td>Approval Status</td>
                    <!-- <td>Updated At</td> 
                
                    <td>Action</td>-->
                    <td> Delete</td>
                    </thead>
        @foreach($userMyData as $a)
            <div class="col-12 pb-12">
                    @if($a->str6 == "Approved")
                    <tr bgcolor="#94f481">
                    @elseif($a->str6 == "Correction Required")

                    <tr bgcolor="#ffa500   ">
                    @else
                    <tr bgcolor="#00ffff  ">
                    @endif
                    
                    
                    <td  style="font-size: 15px">{{ $a->str1 }}</td>
                    <!-- <td>{{ $a->str2 }}</td> >-->
                    <td style="font-size: 15px">{{ $a->str3 }}</td>
                    <td style="font-size: 15px">{{ $a->str4 }}</td>
                    <td style="font-size: 15px">{{ $a->str5 }}</td>
                    <td style="font-size: 15px"> {{ $a->dec1 }}</td>
                    <td style="font-size: 15px"> {{ $a->dec2 }}</td>
                    <td style="font-size: 15px"> {{ $a->dec3 }}</td>
                    <td style="font-size: 15px"> {{ $a->dec4 }}</td>
                    <td style="font-size: 15px"> {{ $a->dec5 }}</td>
                    <!--<td>{{ $a->created_at }}</td>-->
                    <td style="font-size: 15px"> {{ $a->str6 }}</td>
                    <!--<td>{{ $a->updated_at }}</td>-->
                    @if($a->str6 == "Approved")
                    <td>
                    </td>

                    @else
                    <td><a href='{{ env("absolute")}}/{{$user->id}}/editMydata/{{$a->id }}'><button class='btn-warning'>Edit</button></a>
                    <a href='{{ env("absolute")}}/{{$user->id}}/editMydata/{{$a->id }}/softdel'><button class='btn-danger'>Delete</button></a></td>
                    @endif


                    </tr>
                
                    
               
                </a>
            </div>
        @endforeach
        
        </table>
    </div></div></div></div>

</div>
@endsection
