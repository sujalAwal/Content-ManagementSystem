<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\gallery;
use App\Models\post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $img = gallery::all();
        $category = Categorie::all();
 
        
        $post = Post::with(['gallary','category','user'])->orderBy('created_at')->simplePaginate(6);
        // $post = Post::with(['gallary','category','user'])->simplePaginate(6);

        // return $post;
        return view('website.blog.index',['post'=> $post,'category'=>$category]);
    }

    
}
