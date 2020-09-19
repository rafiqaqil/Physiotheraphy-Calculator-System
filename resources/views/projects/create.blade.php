@extends('layouts.boot')

@section('content')
<div   class="container">
    
<div class="col-lg-12">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">PTcalc New Record</h3></div>
                                    <div class="card-body">
                                         <form action="/StoreProject" enctype="multipart/form-data" method="post">
                                            @csrf
                                                   <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="CUSTOMER_NAME">Age</label>
                                                        <input   onchange="myFunction()" name="CUSTOMER_NAME" class="form-control py-1" id="CUSTOMER_NAME" type="text" placeholder="Current Age">
                                                             <!-- type="range"  min="0" max="50" -->     
                                                    </div>
                                                </div>
                                                       
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="PROJECT_NO">Gender</label>
                                                        <select name="PROJECT_NO" class="form-control py-1" id="PROJECT_NO"  onchange="myFunction()">
                                                            <option value="0">Female</option>
                                                            <option value="1">Male</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                                  <div class="form-row">
                                               <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="FINANCIAL_OWN">Resting Heart Rate</label>
                                                        <input  onchange="myFunction()" name="FINANCIAL_OWN" class="form-control py-1" id="FINANCIAL_OWN" type="int" placeholder="HR before Walking ">
                                                    </div>
                                                   
                                                </div>
                                                  
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="FINANCIAL_FACILITY">Peak Heart Rate </label>
                                                        <input  onchange="myFunction()" name="FINANCIAL_FACILITY" class="form-control py-1" id="FINANCIAL_FACILITY" type="int" placeholder="HR after Walking ">
                                                    </div>
                                                </div>
                                                  </div>
                                            
                                                 <div class="form-row">
                                               <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="PERSON_INCHARGE">Change 🔼 in Heart Rate (bpm) </label>
                                                        <button class="form-control py-1"disabled> <p   onchange="myFunction()" name="PERSON_INCHARGE" class="" id="PERSON_INCHARGE" type="int" placeholder=""></button>
                                                    </div>
                                                </div></div>
                                            
                                                     <div class="form-row">
                                               <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="LO_NUMBER">ACTUAL_METERS Walked</label>
                                                        <input  onchange="myFunction()" name="LO_NUMBER" class="form-control py-1" id="LO_NUMBER" type="int" placeholder="">
                                                    </div>
                                                </div>
                                             
                                            </div>
                                             <div class="form-row">
                                             
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="PERSON_INCHARGE_CONTACT">Formula 1 (with 🔼 HR) Results</label>
                                                        <button class="form-control py-1"disabled>  <p  name="PERSON_INCHARGE_CONTACT"  id="PERSON_INCHARGE_CONTACT" ></p></button>
                                                                  @if ($errors->has('PERSON_INCHARGE_CONTACT'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('PERSON_INCHARGE_CONTACT') }}</strong>
                                                                    </span>
                                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="COMPANY_INCHARGE">Formula 2 (without 🔼 HR) Results</label>
                                                        <button class="form-control py-1"disabled> <p  name="COMPANY_INCHARGE"  id="COMPANY_INCHARGE" ></button>
                                                 
                                                    </div>
                                                </div>
                                       
                                            </div>
                                         
                                                   <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="small mb-1" >RESULTS</label>
                                                        <textarea rows=5 id="result" disabled class="form-control py-1" ></textarea>
                                                    </div>
                                                </div>
                                       
                                            </div>       

                                            
                                            <button  type=submit class="btn btn-primary btn-block" >Save Data</button>
                                        </form>
                                </div>
                            </div>


    
</div>
 <script language="javascript">
 
 
 

    function myFunction() {
        
        
     var gender = document.getElementById("PROJECT_NO").value;
     var bpmRest = document.getElementById("FINANCIAL_FACILITY").value;
     var bpmPeak = document.getElementById("FINANCIAL_OWN").value;
    var bpm = bpmRest - bpmPeak
      document.getElementById("PERSON_INCHARGE").innerHTML = bpm;
    
     var age = document.getElementById("CUSTOMER_NAME").value;
     var actual = document.getElementById("LO_NUMBER").value;
     console.log("Actual METERS: ");
     console.log(actual);
     console.log("gender: ");
     console.log(gender);
     console.log("bpm: ");
     console.log(bpm);
     console.log("Age: ");
    console.log(age);
     var answer1 = 196-(1.1*age)+(1.0*bpm)+(31.2*gender);
     var answer2 = 279-(1.7*age)+(35.9*gender);
     console.log("Formula 1: ");
        console.log(answer1);
        console.log("Formula 2: ");
     console.log(answer2);
     
     var LLN1 = ((actual)/answer1)*100;
   
      var LLN2 = ((actual)/answer2)*100;
      
      document.getElementById("result").innerHTML = "Gender:  " + gender + 
                                                    "\tBPM:  " + bpm + 
                                                    "\tAge:  " + age  + 
                                                    "\n2MWD-F1:   " + LLN1.toFixed(2)+ 
                                                    " %\tLLN-F1:    " + answer1 +
                                                    " meters\n2MWD-F2:   " +  LLN2.toFixed(2) +
                                                    " %\tLLN-F2:    " + answer2+" meters";
                                            
                                            
      document.getElementById("PERSON_INCHARGE_CONTACT").innerHTML = answer1;
      document.getElementById("COMPANY_INCHARGE").innerHTML = answer2;
      
   }
   
   
   

 </script>   
@endsection
