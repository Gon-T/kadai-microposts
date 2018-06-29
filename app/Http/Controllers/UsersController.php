<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Micropost; // add

class UsersController extends Controller
{
    public function  index()
    {
        $users = User::paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'microposts' => $microposts,
        ];
        
        $data += $this->counts($user);
        
        return view('users.show', $data);
    }
    
    public function followings($id)
    {
        $user = User::find($id);
        $micropost = Micropost::find($id);
        $followings = $user->followings()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followings,
            'micropost' => $micropost,
        ];
        
        $data += $this->counts($user);
        
        return view('users.followings', $data);
    }
    
    public function followers($id)
    {
        $user = User::find($id);
        $micropost = Micropost::find($id);
        $followers = $user->followers()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followers,
            'micropost' => $micropost,
        ];
        
        $data += $this->counts($user);
        
        return view('users.followers', $data);
    }
    
    public function favoritings($id)
    {
        $micropost = Micropost::find($id);
        $user = User::find($id);
        $favoritings = $user->favoritings()->paginate(10);
        
        $data = [
            'user' => $user,
            'micropost' => $micropost,
            'microposts' => $favoritings,
        ];
        
        $data += $this->counts($user);
        return view('users.favoritings', $data);
    }
    
    // public function store(Request $request, $id)
    // {	
    //     \Auth::user()->follow($id);	
    //     return redirect()->back();	
    // }	
    
    // public function destroy($id)	
    // {	
    //     \Auth::user()->unfollow($id);	
    //     return redirect()->back();	
    // }
}
