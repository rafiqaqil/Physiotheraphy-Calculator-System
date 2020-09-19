<?php

namespace App\Http\Controllers;
use App\Charts\dashChart;
use Illuminate\Http\Request;

class MydataController extends Controller
{
    //AUTHENTICATION REQUIRED TO DO ANYTHING
    public function __construct(){$this->middleware('auth');}
    
    
    public function ShowMyData(\App\User $user)
    {// GET USER ID
      //dd($user ->id);
        // use user id to GET USER MYDATA
             $allMyData = \App\Mydata::all();
         $allMyDataApprovedCount = \App\Mydata::where('str6','Approved')->count();
         $allMyDataPendingCount = \App\Mydata::where('str6','Pending')->count();
         //dd($allMyDataApprovedCount);
         $allMyDataApproved = \App\Mydata::where('str6','Approved')->get();
         $allMyDataPending = \App\Mydata::where('str6','Pending')->get();






        $userMyData = \App\Mydata::where('user_id',"=", $user->id)->get();
        //dd($userMyData);
        
        //DRAW CHART 
        
         $totaldec1 = \App\Mydata::where('user_id',$user->id)->where('str6','Approved')->sum('dec1');
         $totaldec2 = \App\Mydata::where('user_id',$user->id)->where('str6','Approved')->sum('dec2');
         $totaldec3 = \App\Mydata::where('user_id',$user->id)->where('str6','Approved')->sum('dec3');
         $totaldec4 = \App\Mydata::where('user_id',$user->id)->where('str6','Approved')->sum('dec4');
         $totaldec5 = \App\Mydata::where('user_id',$user->id)->where('str6','Approved')->sum('dec5');
                    

            $barchart = new dashChart;
            
            $barchart -> labels = (
                    ['Petrol(RM)','Food(RM) ','Tolls(RM) ','Hotel(RM) ','Others(RM) ']
                    );
            $barchart -> dataset('Total Decs','bar',
                    [$totaldec1,
                     $totaldec2,
                     $totaldec3,
                     $totaldec4,
                     $totaldec5,
                    ])
                    
                    ->backgroundColor(collect(['#eb6734','#ebe534','#12f481','#ebe534','#ebe534','#ebe534']))
                    ->color(collect(['#eb6734','#ebe534','#12f481','#ebe534','#ebe534','#ebe534']));
            
            
            $piechart = new dashChart;
            $piechart->displayAxes(false);
            $piechart -> labels = (
                    ['Petrol(RM)','Food(RM) ','Tolls(RM) ','Hotel(RM) ','Others(RM) ']
                    );
            $piechart -> dataset('Transactions','pie',
                    [$totaldec1,
                     $totaldec2,
                        $totaldec3,
                        $totaldec4,
                        $totaldec5,
                    ])
                    
                    ->backgroundColor(collect(['#94f481','#ffbc6b','#12f481','#ddbc6b','#56f481','#aabc6b']))
                    ->color(collect(['#94f481','#ffbc6b','#12f481','#ddbc6b','#56f481','#aabc6b']));
        return view('mydata.ShowMyData', compact('userMyData','user','barchart','piechart'));
        
        
    }
    
    
    
       public function ShowRecMyData(\App\User $user)
    {// GET USER ID
      //dd($user ->id);
        // use user id to GET USER MYDATA
        $userMyData = \App\Mydata::onlyTrashed()->get();
        //dd($userMyData);
        return view('mydata.ShowRecMyData', compact('userMyData','user'));
    }
    
    
    public function ClientInputForm(\Illuminate\Foundation\Auth\User $user){return view('mydata.inputform', compact('user'));}//SHOW FORM GET INPUT DATA FROM USER
    public function ServerStoreData() //FROM ACTION TO TELL SERVER TO SAVE
    {// VALIDATE DATA IF NOT VALID RETURN ERROR
        
        
        $data = request()->validate([
            'str1' => 'required',
            'str2' => 'required',
            'str3' => 'required',
            'str4' => 'required',
            'str5' => 'required',
             'str6' => '',
            'str7' => '',
            
            'dec1' => 'required',
            'dec2' => 'required',
            'dec3' => 'required',
            'dec4' => 'required',
            'dec5' => 'required',
        ]);
        
        //dd($data);
        //CREAT DATA ENTRY IN  TABLE
        auth()->user()->mydata()->create([  
            'str1' => $data['str1'],
            'str2' => $data['str2'],
            'str3' => $data['str3'],
            'str4' => $data['str4'],
            'str5' => $data['str5'],
            'str6' => $data['str6'],
            'str7' => $data['str7'],
            'dec1' => $data['dec1'],
            'dec2' => $data['dec2'],
            'dec3' => $data['dec3'],
            'dec4' => $data['dec4'],
            'dec5' => $data['dec5'],
        ]);
        //REDIRECT TO PROFILE PAGE 
        return redirect('/profile/' . auth()->user()->id);
    }
    
    
      public function softdel(\App\User $user, \App\Mydata $mydata)
    {
           //dd($transaction->id);
           \App\Mydata::destroy($mydata->id);
       
        return redirect('/profile/' . $user->id.'/ShowMyData');
    }
    
    public function restoreMe(\App\User $user, $mydata)
    {
           //dd($transaction->id);
           $thisone = \App\Mydata::onlyTrashed()->find($mydata);
           $thisone -> restore();
       
        return redirect('/profile/' . $user->id.'/ShowMyData');
    }
    
    public function destroyMe(\App\User $user, $mydata)
    {
           //dd($transaction->id);
           $thisone = \App\Mydata::onlyTrashed()->find($mydata);
           $thisone -> forceDelete();
       
        return redirect('/profile/' . $user->id.'/ShowRecMyData');
    }
    
    
    
   public function ShowEditPage(\App\User $user, \App\Mydata $mydata){return view('mydata.editform', compact('user'),compact('mydata'));}
   public function ServerUpdate(\App\User $user,\App\Mydata $mydata)
    {
            $data = request()->validate([
            'str1' => 'required',
            'str2' => 'required',
            'str3' => 'required',
            'str4' => 'required',
            'str5' => 'required',
            'str6' => 'required',
            'str7' => 'required',
            'dec1' => 'required',
            'dec2' => 'required',
            'dec3' => 'required',
            'dec4' => 'required',
            'dec5' => 'required',
        ]);



        //dd($transaction);
        $mydata -> update($data);


        return redirect('/profile/' . auth()->user()->id.'/ShowMyData');
    }
    
    
    
    
    
    
    
    public function ShowMyDataMaster(){
         
        $top10Users = \App\Mydata::select('user_id')
        ->groupBy('user_id')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(10)
        ->get();
        
        
        $getData = \Illuminate\Support\Facades\DB::table('mydatas')
                 ->select('user_id', \Illuminate\Support\Facades\DB::raw('count(*) as total'))
                 ->groupBy('user_id')
                 ->get();
         //dd($getData);
         
         //dalam controller semua java...ini macam sql statement tapi eloquent.
        //proses ambil data dekat database
        //
         $user = auth()->user();
         $allMyData = \App\Mydata::all();
         $allMyDataApprovedCount = \App\Mydata::where('str6','Approved')->count();
         $allMyDataPendingCount = \App\Mydata::where('str6','Pending')->count();
         //dd($allMyDataApprovedCount);
         $allMyDataApproved = \App\Mydata::where('str6','Approved')->get();
         $allMyDataPending = \App\Mydata::where('str6','Pending')->get();
         //dd($allMyDataApproved);
         $totaldec1 = \App\Mydata::where('str6','Approved')->sum('dec1');
         $totaldec2 = \App\Mydata::where('str6','Approved')->sum('dec2');
         $totaldec3 = \App\Mydata::where('str6','Approved')->sum('dec3');
         $totaldec4 = \App\Mydata::where('str6','Approved')->sum('dec4');
         $totaldec5 = \App\Mydata::where('str6','Approved')->sum('dec5');
         //dd($totaldec5);
         //dd($allMyData);
         
         
         
         $barchart = new dashChart;
         $barchart -> labels = (
                   ['Petrol(RM)','Food(RM) ','Tolls(RM) ','Hotel(RM) ','Others(RM) ']
                    );
            $barchart -> dataset('Total Decs','bar',
                    [$totaldec1,
                     $totaldec2,
                        $totaldec3,
                        $totaldec4,
                        $totaldec5,
                    ])
                    
                    ->backgroundColor(collect(['#FF1329','#ffbc6b','#12f481','#ddbc6b','#56f481','#aabc6b']))
                    ->color(collect(['#94f481','#ffbc6b','#12f481','#ddbc6b','#56f481','#aabc6b']));
            
            
            $piechart = new dashChart;
            $piechart->displayAxes(false);
            $piechart -> labels = (
                    ['Petrol(RM)','Food(RM) ','Tolls(RM) ','Hotel(RM) ','Others(RM) ']
                    );
            $piechart -> dataset('Transactions','pie',
                    [$totaldec1,
                     $totaldec2,
                        $totaldec3,
                        $totaldec4,
                        $totaldec5,
                    ])
                    
                    ->backgroundColor(collect(['#FF1329','#ffbc6b','#12f481','#ddbc6b','#56f481','#aabc6b']))
                    ->color(collect(['#94f481','#ffbc6b','#12f481','#ddbc6b','#56f481','#aabc6b']));
              
           
            
        return view('mydata.ShowMyDataMaster', compact('allMyDataPendingCount','allMyDataApprovedCount','totaldec5','totaldec4','totaldec3','totaldec2','totaldec1','user','allMyData','barchart','piechart','allMyDataPending' , 'allMyDataApproved'));
         
     }



       public function MasterShowEditPage(\App\User $user, \App\Mydata $mydata){return view('mydata.Mastereditform', compact('user'),compact('mydata'));}
   public function MasterServerUpdate(\App\User $user,\App\Mydata $mydata)
    {
            $data = request()->validate([
            'str1' => 'required',
            'str2' => 'required',
            'str3' => 'required',
            'str4' => 'required',
            'str5' => 'required',
            'str6' => 'required',
            'str7' => 'required',
            'dec1' => 'required',
            'dec2' => 'required',
            'dec3' => 'required',
            'dec4' => 'required',
            'dec5' => 'required',
        ]);



        //dd($transaction);
        $mydata -> update($data);

       
        return redirect('/ShowMyDataMaster');
    }
}
