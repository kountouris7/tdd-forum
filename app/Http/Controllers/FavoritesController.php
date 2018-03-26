<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Reply;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Reply $reply)
    {


        return $reply->favorite(); //method exists in reply model
       // Favorite::create([
       //    'user_id' =>auth()->id(),
       //    'favorited_id'=>$reply->id,
       //    'favorited_type'=>get_class($reply)
       // ]);
//
    }
}