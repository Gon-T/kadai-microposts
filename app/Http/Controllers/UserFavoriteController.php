<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFavoriteController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::User()->favorite($id);
        return redirect()->back();
    }
    
    public function destroy($id)
    {
        \Auth::User()->unfavorite($id);
        return redirect()->back();
    }
}
