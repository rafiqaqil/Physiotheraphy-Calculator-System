@extends('layouts.boot')

@section('content')
<div  align="right" class="container">

      
      
         <a href='{{ env("absolute")}}/profile/{{$user->id}}/ShowMyData'><button class='btn btn-success'>Return to MyData</button></a>
    <div class="row pt-5">
        <div class="col-lg-12">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-list"></i>
                Recently Deleted List </div>
                <div class="card-body">
           <table class="table border-primary">
                    <thead bgcolor="#ebfafa">
                    <td>Date of Travel</td>
                    <td>Distance</td>
                    <td>Description</td>
                    <td>Food Claims Statemnet</td>
                    <td>Other Claims Statements</td>
                    <td>Petrol Claims</td>
                    <td>Food Claims</td>
                    <td>Toll Claims</td>
                    <td>Hotel Claims</td>
                    <td>Others</td>
                    <!--<td>Created At</td>
                    <td>Updated At</td> -->
                    <td>Deleted At</td>
                    <td>Action</td>
                    <td>Permanent Delete</td>
                    </thead>
        @foreach($userMyData as $a)
            <div class="col-12 pb-12">
                    @if($a->dec1 < 0)
                    <tr bgcolor="#ffbc6b">
                    @else
                    <tr bgcolor="#94f481">
                    @endif
                    
                    
                    <td>{{ $a->str1 }}</td>
                    <td>{{ $a->str2 }}</td>
                    <td>{{ $a->str3 }}</td>
                    <td>{{ $a->str4 }}</td>
                    <td>{{ $a->str5 }}</td>
                    <td>{{ $a->dec1 }}</td>
                    <td>{{ $a->dec2 }}</td>
                    <td>{{ $a->dec3 }}</td>
                    <td>{{ $a->dec4 }}</td>
                    <td>{{ $a->dec5 }}</td>
                    <!--<td>{{ $a->created_at }}</td>
                    <td>{{ $a->updated_at }}</td>-->
                    <td>{{ $a->deleted_at }}</td>
                    <td><a href='{{ env("absolute")}}/{{$user->id}}/editMydata/{{$a->id }}/restoreMe'><button class='btn-warning'>Restore</button></a></td>
                    <td><a href='{{ env("absolute")}}/{{$user->id}}/editMydata/{{$a->id }}/destroyMe'><button class='btn-danger'>Destroy</button></a></td>
                    </tr>
                
                    
               
                </a>
            </div>
        @endforeach
        
        </table>
    </div></div></div></div>

</div>
@endsection
