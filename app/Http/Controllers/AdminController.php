<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Redirect;

use App\Models\Post;
use App\Models\Profile;


class AdminController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
       
    $user = User::all();
    $profile = Profile::all();
    $post = Post::all();

   
     return view('admin.index', ['profiles'=>$profile,'posts'=>$post,'users'=>$user,]);
    }
     
   
      public function delete(Request $request,$id){
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('Admin/index');

        
      }
}

