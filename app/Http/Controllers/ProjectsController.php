<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
       public function index($user)
    {
           $id = auth()->user()->id;
           $allmyquote = \App\Project::where('user_id',$id)->get(); // get all user Projects Here
           
           
        
           
           return view('projects.index',compact('allmyquote','user'));       
    }
    
    
    public function show(\App\Project$project)
    {
           
          $allmyquote = \App\Project::where('id',$project->id)->get();
          //dd($allmyquote);
      $quote = $project;
      
      //dd($project->PROJECT_NO);
       $allmyquoteONproject = \App\Quote::where('project_id',$project->PROJECT_NO )->get();
           
       
       
       
        return view('projects.show',compact('allmyquote' , 'project','quote','allmyquoteONproject'));
    }
    
    
    public function generateProjectCosting(\App\Project $project)
    {
           
      $items =  \App\Item::where([['ACTIVE_STATUS','=','1'],['project_id','=', $project->PROJECT_NO]])->get();
      
      //ACTIVE_STATUS == 1
     //dd($items);
       
       
       
        return view('projects.ProjectCosting',compact('items' , 'project'));
    }
    
           public function softdel(\App\Project $project)
    {
           //dd($transaction->id);
           \App\Project::destroy($project->id);
       
                 $id = auth()->user()->id;
        
          
          $allmyquote = \App\Project::where('user_id',$id)->get();
          
         //dd($allmyquote);
          
          return view('projects.index',compact('allmyquote'));
    }
    
      public function create()
    {
        return view('projects.create');
    }
    
    
       public function store()
    {
       
        $data = request()->validate([
            
            'CUSTOMER_NAME' => 'required',
           
            'PROJECT_NO' => 'required',
            'PERSON_INCHARGE_CONTACT' => '',
            'LO_NUMBER' => '',
            'COMPANY_INCHARGE' => '',
             'FINANCIAL_FACILITY' => '',
             'FINANCIAL_OWN' => '',
        ]);
       
        
        $data['PERSON_INCHARGE'] =  $data['FINANCIAL_FACILITY'] - $data['FINANCIAL_OWN'];
        
        
        $age = $data['CUSTOMER_NAME'];
        $gender = $data['PROJECT_NO'];
        $bpm = $data['PERSON_INCHARGE'];
              
        $answer1 = 196-(1.1*$age)+(1.0*$bpm)+(31.2*$gender);
        $answer2 = 279-(1.7*$age)+(35.9*$gender);
        $data['PERSON_INCHARGE_CONTACT'] =  $answer1 ;
        $data['COMPANY_INCHARGE'] =  $answer2 ;
          
         //dd($data);
        //Default Data
        //Strings
      
        $data['PROJECT_STATUS'] ='0';
        
        //Decimals
       
        $data['FINANCIAL_FACILITY_RATE'] ='0';
        
        //Dates
        $data['DEADLINE_LO_ACCEPTANCE'] ='2000-01-01';
        $data['DEADLINE_LO_RECIEVED'] ='2000-01-01';
        $data['DEADLINE_LO_DUE'] ='2000-01-01';
		
        $data['user_id'] = auth()->user()->id;
        
        //dd($data);
        
        \App\Project::create($data);
        
        
     
        
        /*
        $imagePath = request('image')->store('uploads', 'public');
 

        auth()->user()->quotes()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);*/
        
          $id = auth()->user()->id;
        $user = $id;
          
          $allmyquote = \App\Project::where('user_id',$id)->get();
          
         //dd($allmyquote);
          
          return view('projects.index',compact('allmyquote','user'));
    }
    
    
     public function edit($project)
    {
             
       $allmyquote = \App\Project::where('id',$project)->get();
        
       $quote = $project;
        return view('projects.edit',compact('allmyquote' , 'project','quote'));
    }
    
       public function update(\App\Project $project)
    {
       
       $data = request()->validate([
            
            'CUSTOMER_NAME' => 'required',
            'PERSON_INCHARGE' => '',
            'PERSON_INCHARGE_CONTACT' => '',
            'PROJECT_NO' => '',
            'COMPANY_INCHARGE' => '',
           
           'LO_NUMBER' => '',
           'PROJECT_STATUS' => '',
           
           'FINANCIAL_OWN' => '',
           'FINANCIAL_FACILITY' => '',
           'FINANCIAL_FACILITY_RATE' => '',
           
           'DEADLINE_LO_ACCEPTANCE' => '',
           'DEADLINE_LO_RECIEVED' => '',
           'DEADLINE_LO_DUE' => '',
           
           
           'DEADLINE_PROJECT_SUMMARY' => '',
           'DEADLINE_DOWNPAYMENT' => '',
           'DEADLINE_COMMITMENT' => '',
           
            'REMARKS_1' => '',
           'REMARKS_2' => '',
           'REMARKS_3' => '',
        ]);

        //dd($project->PROJECT_NO);
        $projectNo = $project->PROJECT_NO;
        $items =  \App\Item::where('project_id', $projectNo);
        $quotes = \App\Quote::where('project_id', $projectNo);
        
        //dd( $data['PROJECT_NO']);
        
        $project->update($data);
        $items->update(["project_id" => $data['PROJECT_NO']]);
        $quotes->update(["project_id" =>  $data['PROJECT_NO']]);
        
        // UPDATE ALL ATTACHED ITEMS TO NEW PROJECT NO
        
            
        
        
        
        
        
        
        
         $id = auth()->user()->id;
         $user = $id;
           $allmyquote = \App\Project::where('user_id',$id)->get(); // get all user Projects Here
           return view('projects.index',compact('allmyquote','user'));   
        
        
    }
}
