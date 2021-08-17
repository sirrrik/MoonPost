<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDeleteController extends Controller
{
    public function index() {
        $users = DB::select('select * from User');
        return view('admin.index',['users'=>$users]);
     }
     public function destroy($id) {
        DB::delete('delete from User where id = ?',[$id]);
        echo "Record user successfully.<br/>";
        echo '<a href = "/delete-records">Click Here</a> to go back.';
     }
}
