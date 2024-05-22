<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Post\CreateRequest;
use App\Models\Categorie;
use App\Models\gallery;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

   $post = Post::with(['gallary','category'])->where('user_id',1)->get();

//    return $post;
          return view("Admin.index",['allData'=> $post]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Categorie::all();
        $user = User::all();
        return view('auth.post',['categorie'=> $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {

        
        DB::beginTransaction();
        try {
            if($request->has('img')){
                $file = $request->img;
                $fileName = $file->getClientOriginalName();
                $imgPath = public_path('admin/images/post');
                $file->move($imgPath,$fileName);
    
                $gallery = gallery::create([
                    'image'=> $fileName,
                ]);
            }
       
    
    
            $post = Post::create([
                'title'=> $request->title,
                'categories_id'=>$request->categories,
                'description'=> $request->description,
                'is_publish'=> $request->is_publish,
                'galleries_id'=>$gallery->id,
                'user_id'=>$request->user_id,
    
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
           dd($th->getMessage());
        }
       
       
        $request->session()->flash('alert-success','Post Created succesfuly');
        return to_route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $id)
    {
      $data = Post::with(['gallary','category'])->find($id->id);
        // return $data;
        return view('Admin.viewBlog',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
