<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use App\Charts\dashChart;

class ProfilesController extends Controller
{
    
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user)
    {
        $transactionsTrashed = \App\Transactions::onlyTrashed()->get();
        
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts->count();
            });

        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();
            });

        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            });
            
       
            
            $totalsales = \App\Transactions::where('user_id',$user->id)->where('group','IN')->sum('amount');
            $totalexpenses =\App\Transactions::where('user_id',$user->id)->where('group','OUT')->sum('amount');
                    
                    
  
                    
            $barchart = new dashChart;
            
            $barchart -> labels = (
                    ['Sales','Expenses']
                    );
            $barchart -> dataset('Transactions','bar',
                    [$totalsales,
                     $totalexpenses,
                    ])
                    
                    ->backgroundColor(collect(['#94f481','#ffbc6b']))
                    ->color(collect(['#94f481','#ffbc6b']));
            
                      
            $chart = new dashChart;
            $chart->displayAxes(false);
            $chart -> labels = (
                    ['Sales','Expenses']
                    );
            $chart -> dataset('Transactions','pie',
                    [$totalsales,
                     $totalexpenses,
                    ])
                    
                    ->backgroundColor(collect(['#94f481','#ffbc6b']))
                    ->color(collect(['#94f481','#ffbc6b']));
              
            //dd($user->profile);

        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount','chart','barchart','transactionsTrashed'));
    
        
        
        
        
            }

            
     public function translist(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

            $IN = \App\Transactions::where('user_id',$user->id)->where('group','IN')->sum('amount');
            $OUT=\App\Transactions::where('user_id',$user->id)->where('group','OUT')->sum('amount');
                    
                $data = ([
                    'IN' => $IN,
                    'OUT' => $OUT 
                    ]);
                
                
        return view('profiles.translist', compact('user', 'data'));

            }
             public function postlist(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postCount = Cache::remember(
            'count.posts.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts->count();
            });

        $followersCount = Cache::remember(
            'count.followers.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->profile->followers->count();
            });

        $followingCount = Cache::remember(
            'count.following.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->following->count();
            });

        return view('profiles.postlist', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    
        
            }
            
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => '',
            'image' => '',
            'location' => '',
            'contact' => '',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
			//dd(public_path("storage/{$imagePath}"));

            //$image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image = Image::make("storage/{$imagePath}")->fit(1000, 1000);
           
			
			$image->save();

            $imageArray = ['image' => $imagePath];
        }
        
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []));

        return redirect("/profile/{$user->id}");
    }
}
