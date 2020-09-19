@extends('layouts.boot')

@section('content')
<div class="container">
    
    
    
    
            <div class="row">
                
                     <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">Transactions where you get cash into the business. Investments, Sales, Income etc.</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="/profile/{user}/createTransIN">
                  <span class="float-left">
                              
               <button class="btn btn-dark">Add CASH IN RECORD</button>
        
                  </span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
            
                
          
          
                
                     <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">Transactions where you use cash.  Purchases, Rentals, Utilities etc.</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="/profile/{user}/createTransOUT">
                  <span class="float-left">
                              
               <button class="btn btn-dark">Add CASH OUT RECORD</button>
        
                  </span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

                   
                
                         
                
                     <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Add Records of assets, deprecations etc.</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="/profile/{user}/createTransDOC">
                  <span class="float-left">
                              
               <button class="btn btn-dark">Add D.O.C. RECORD</button>
        
                  </span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        
                    
                  <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">Advanced users all transaction entry</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="/profile/{user}/createTransADVANCE">
                  <span class="float-left">
                              
               <button class="btn btn-dark">Add RECORD ADVANCED</button>
        
                  </span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        
            
            
            </div>
</div>
@endsection
