<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
      public function __construct()
    {
        $this->middleware('auth');
    }
    
      public function createPICK()
    {
        return view('trans.pick');  
    }
    
      public function createIN()
    {
        return view('trans.cashin');  
    }
    
      public function createOUT()
    {
        return view('trans.cashout');  
    }
      public function createDOC()
    {
        return view('trans.doc');  
    }
    
        public function createADVANCE()
    {
        return view('trans.create');  
    }
        public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $transactions = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);

        return view('transactions.index', compact('transactions'));
    }
    public function store()
    {
        $data = request()->validate([
            'Name' => 'required',
            'amount' => 'required',
           
            'Desc' => '',
            'category' => '',
            'outstanding' => '',
             'group' => '',
        ]);

        auth()->user()->transactions()->create([
             
            'Name' => $data['Name'],
            'Desc' => $data['Desc'],
            'category' => $data['category'],
            'amount' => $data['amount'],
            'amount_outstanding' => $data['outstanding'],
            'group' => $data['group'],
        ]);
        
        

        return redirect('/profile/' . auth()->user()->id);
    }
    
      public function edit(\App\User $user,\App\Transactions $transaction)
    {
          //dd($transaction);
       
        return view('trans.edit', compact('user'),compact('transaction'));
    }
    
        
      public function update(\App\User $user,\App\Transactions $transaction)
    {
     
            $data = request()->validate([
                      'Name' => 'required',
                      'amount' => 'required',

                      'Desc' => '',
                      'category' => '',
                      'amount_outstanding' => '',
                       'group' => '',
                  ]);   
            
        //dd($transaction);
        $transaction -> update($data);
        return redirect('/profile/' . auth()->user()->id);
    }
    
    
    // THIS IS REGULAR DELETE BUT NOW IS SOFTDELETE BECAUSE IN MODELS WE put"use SoftDelete" and have made migrations using at_delete  
       public function softdel(\App\User $user,\App\Transactions $transaction)
    {
           //dd($transaction->id);
           \App\Transactions::destroy($transaction->id);
       
        return redirect('/profile/' . $user->id);
    }
    // RESTORE SOFTDELETE
     public function restoreMe(\App\User $user, $transaction)
    {
           //dd($transaction->id);
           $thisone = \App\Transactions::onlyTrashed()->find($transaction);
           $thisone -> restore();
       
        return redirect('/profile/' . $user->id);
    }
    
    public function destroyMe(\App\User $user, $transaction)
    {
           //dd($transaction->id);
           $thisone = \App\Transactions::onlyTrashed()->find($transaction);
           $thisone -> forceDelete();
       
        return redirect('/profile/' . $user->id);
    }
    
}
