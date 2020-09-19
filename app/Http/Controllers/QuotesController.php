<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuotesController extends Controller
{
      public function index($user)
    {
        
          $id = auth()->user()->id;
        
          
          $allmyquote = \App\Quote::where('user_id',$id)->get();
          
         //dd($allmyquote);
          
          return view('quotes.index',compact('allmyquote','user'));

        
        
    }
    
       public function create()
    {
        return view('quotes.create');
    }
    
    public function edit($quote)
    {
             
              $allmyquote = \App\Quote::where('id',$quote)->get();
        
       
        return view('quotes.edit',compact('allmyquote' , 'quote'));
    }
    
       public function show($quote)
    {
           
           
          
          $allmyquote = \App\Quote::where('id',$quote)->get();
          
           $allmyquoteItems = \App\Item::where('quote_id',$quote)->get();
          //dd($allmyquoteItems);
      
        return view('quotes.show',compact('allmyquote' , 'quote','allmyquoteItems'));
    }
    
    
       public function store()
    {
       
        $data = request()->validate([
            
            'PROJECT_ID' => 'required',
            'QUOTE_DESCRIPTION' => 'required',
            'SUPPLIER' => '',
            'SUPPLIER_CONTACT' => '',
            
        ]);
        
        
        $data['ACTIVE_STATUS'] = 1;
       
        $data['user_id'] = auth()->user()->id;
        
        //dd($data);


        $data['PDF_FILE'] = '0';
        if (request('PDF_FILE')) {
                $PDFPath = request('PDF_FILE')->store('QUOTES_PDF', 'public');
                $data['PDF_FILE'] = $PDFPath;
                //dd($data['PDF_FILE']);
                        
            }
 
      
        
        \App\Quote::create($data);
          $id = auth()->user()->id;
        
          
          $allmyquote = \App\Quote::where('user_id',$id)->get();
          
         //dd($allmyquote);
          
          return view('quotes.index',compact('allmyquote'));
    }
    
       public function softdel(\App\Quote $quote)
    {
           //dd($transaction->id);
           \App\Quote::destroy($quote->id);
       
                 $id = auth()->user()->id;
        
          
          $allmyquote = \App\Quote::where('user_id',$id)->get();
          
         //dd($allmyquote);
          
          return view('quotes.index',compact('allmyquote'));
    }
    
       public function update(\App\Quote $quote)
    {
       
        $data = request()->validate([
            
            'project_id' => 'required',
            'QUOTE_DESCRIPTION' => '',
            'SUPPLIER' => '',
            'SUPPLIER_CONTACT' => '',
            //'PDF_FILE' => '',
            'ACTIVE_STATUS' => '',
        ]);

        
           if (request('PDF_FILE')) {
                $PDFPath = request('PDF_FILE')->store('QUOTES_PDF', 'public');
                $data['PDF_FILE'] = $PDFPath;
                //dd($data['PDF_FILE']);
                        
            }
            
 
          $data['user_id'] = auth()->user()->id;
        
        //dd($data);
          
        $items =  \App\Item::where('quote_id', $quote->id);
       
        //dd($items);

        $quote->update($data);
        
       $items->update(["project_id" => $data['project_id']]);
       $items->update(["SUPLIER" => $data['SUPPLIER']]);
        $items->update(["DESCRIPTION" => $data['QUOTE_DESCRIPTION']]);
         $items->update(["ACTIVE_STATUS" => $data['ACTIVE_STATUS']]);
        /*
        $imagePath = request('image')->store('uploads', 'public'); 
 

        auth()->user()->quotes()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);*/
        
          $id = auth()->user()->id;
        
          
          $allmyquote = \App\Quote::where('user_id',$id)->get();
          
         //dd($allmyquote);
          
          return view('quotes.index',compact('allmyquote'));
    }
    
}
