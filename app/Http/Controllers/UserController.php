<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // $users = DB::table('users')->get();
        $users = User::all();
        return view('users', compact('users'));
    }
    public function createUser()
    {
        $username = $_POST['username'];
        $useremail = $_POST['email'];
        $userpassword = $_POST['password'];
        // DB::table('users')->insert(['name' => $username, 'email' => $useremail, 'password' => $userpassword]);
        $user = User::create(['name' => $username, 'email' => $useremail, 'password' => $userpassword]);
        return redirect()->back();
    }

    public function destroyUser($id)
    {
        // DB::table('users')->where(column: 'id', operator: $id)->delete();
        User::destroy($id);
        return redirect()->back();
    }
    public function editUser($id)
    {
        // $user = DB::table('users')->where('id', $id)->first();
        // $users = DB::table('users')->get();
        $user = User::where('id', $id)->first();
        $users = User::all();
        return view('users', compact('user', 'users'));
    }

    public function updateUser()
    {
        $id = $_POST['id'];
        // DB::table('users')->where('id', '=', $id)->update(['name' => $_POST['username'], 'email' => $_POST['email'], 'password' => $_POST['password']]);
        User::where('id', $id)->update(['name' => $_POST['username'], 'email' => $_POST['email'], 'password' => $_POST['password']]);
        return redirect(to: 'users');
    }
}
