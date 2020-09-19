<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
         public function index(\App\User $user , \App\Quote $quote)
    {
           $id = auth()->user()->id;
           $allmyquote = \App\Project::where('user_id',$id)->get(); // get all user Projects Here
           
           return view('items.index',compact('allmyquote','user'));       
    }
    
    public function create( \App\Quote $quote)
    {
        
        
        return view('items.create', compact('quote'));
    }
      public function store( \App\Quote $quote)
    {
       
        $data = request()->validate([
            'ITEM_NAME' => 'required',
            'CURRENCY' => 'required',
            
            'EXCHANGE_RATE' => 'required',
            'QTY' => 'required',
            'COST_PER_UNIT' => 'required',
            
            'CHARGER_COMMISION' => 'required',
            'CHARGER_TRAINING' => 'required',
            'CHARGER_DELIVERY' => 'required',
            'CHARGER_OTHER' => 'required',
            
            'MARGIN' => 'required',
        ]);
        
        $data['TOTAL_CHARGERS_MYR'] = $data['EXCHANGE_RATE']* ($data['CHARGER_COMMISION']+$data['CHARGER_TRAINING']+$data['CHARGER_DELIVERY']  +$data['CHARGER_OTHER']);
        $data['COST_PER_UNIT_MYR']  =  $data['EXCHANGE_RATE'] *   $data['COST_PER_UNIT'];
        $data['TOTAL_COST_MYR']  =  ($data['EXCHANGE_RATE'] *  ( $data['COST_PER_UNIT'] * $data['QTY'] )) + $data['TOTAL_CHARGERS_MYR'] ;
        
         $data['PRICE_PER_UNIT_MYR']  =  ($data['COST_PER_UNIT_MYR'] + $data['TOTAL_CHARGERS_MYR'] )*$data['MARGIN'];
        $data['TOTAL_PRICE_MYR']  =  $data['PRICE_PER_UNIT_MYR'] *   $data['QTY'];
        
        
         $data['NET_PROFIT_MYR']  =  $data['TOTAL_PRICE_MYR'] -   $data['TOTAL_COST_MYR'];
        
         
         //extra inf
        
         $data['DESCRIPTION']  =  $quote->QUOTE_DESCRIPTION;
         $data['SUPLIER']  =  $quote->SUPPLIER;
         
        
        $data['ACTIVE_STATUS'] = 1;
      
          $data['user_id'] = auth()->user()->id;
         $data['quote_id'] = $quote->id;
         $data['project_id'] = $quote->project_id;
        //dd($data);
        
        \App\Item::create($data);
         $allmyquote = \App\Quote::where('id',$quote->id)->get();
         
            $allmyquoteItems = \App\Item::where('quote_id', $quote->id)->get();
         return view('quotes.show',compact('allmyquote' , 'quote', 'allmyquoteItems'));
        
    }
    
      public function edit(\App\Item $item)
    {
             
              $allmyquote = \App\Item::where('id',$item->id)->get();
        $quote = $item;
       
        return view('items.edit',compact('allmyquote' , 'item', 'quote'));
    }
    
    public function update(\App\Item $item)
    {
       
         $data = request()->validate([
            'ITEM_NAME' => 'required',
            'CURRENCY' => 'required',
            
            'EXCHANGE_RATE' => 'required',
            'QTY' => '',
            'COST_PER_UNIT' => 'required',
            
            'CHARGER_COMMISION' => 'required',
            'CHARGER_TRAINING' => 'required',
            'CHARGER_DELIVERY' => 'required',
            'CHARGER_OTHER' => 'required',
            
            'MARGIN' => 'required',
           
            
            
        ]);
        
          $data['TOTAL_CHARGERS_MYR'] = $data['EXCHANGE_RATE']* ($data['CHARGER_COMMISION']+$data['CHARGER_TRAINING']+$data['CHARGER_DELIVERY']  +$data['CHARGER_OTHER']);
        $data['COST_PER_UNIT_MYR']  =  $data['EXCHANGE_RATE'] *   $data['COST_PER_UNIT'];
        $data['TOTAL_COST_MYR']  =  ($data['EXCHANGE_RATE'] *  ( $data['COST_PER_UNIT'] * $data['QTY'] )) + $data['TOTAL_CHARGERS_MYR'] ;
        
         $data['PRICE_PER_UNIT_MYR']  =  ($data['COST_PER_UNIT_MYR'] + $data['TOTAL_CHARGERS_MYR'] )*$data['MARGIN'];
        $data['TOTAL_PRICE_MYR']  =  $data['PRICE_PER_UNIT_MYR'] *   $data['QTY'];
        
        
         $data['NET_PROFIT_MYR']  =  $data['TOTAL_PRICE_MYR'] -   $data['TOTAL_COST_MYR'];$data['ACTIVE_STATUS'] = 1;
      
          $data['user_id'] = auth()->user()->id;
        //$data['quote_id'] = $quote->id;
        
        //dd($data);
        

        $item->update($data);
        
             $allmyquote = \App\Quote::where('id', $item->quote_id)->get();
             
             $quote = \App\Quote::where('id', $item->quote_id)->get();
              $allmyquoteItems = \App\Item::where('quote_id', $item->quote_id)->get();
              
         return view('quotes.show',compact('allmyquote' , 'quote','allmyquoteItems'));
        
        
    }
}
