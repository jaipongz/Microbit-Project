<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\CRUD;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $users = DB::table("users")->get();
        return view("index", compact("users"));
    }

    public function edit(string $id)
    {
        // dd($id);
        $users = CRUD::find($id);
        // dd($users);
        return view("edit", compact("users"));
    }

    public function update(Request $request, $id)
    {
        // dd($request->input());
        $users = CRUD::find($id);
        if (isset($_POST['nameold']) || isset($_POST['lastold']) || isset($_POST['telold']) || isset($_POST['emailold'])) {
            $users->id = $id;
            $users->name = $_POST['nameold'];
            $users->last = $_POST['lastold'];
            $users->tel = $_POST['telold'];
            $users->email = $_POST['emailold'];
            $users->save();
        }
        return redirect()->route('index', compact('users'));

    }

    public function create()
    {
        // dd($id);
        $users = new CRUD();
        // dd($users);
        return view("create", compact("users"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last' => 'required',
            'tel' => 'required|unique:users',
            'email' => 'required|unique:users'
        ]);
        if(isset($_POST['name']) && isset($_POST['last']) && isset($_POST['tel']) && isset($_POST['email'])){
            $users = new CRUD();
            $users->name = $_POST['name'];
            $users->last = $_POST['last'];
            $users->tel = $_POST['tel'];
            $users->email = $_POST['email'];
            $users->save();
            return redirect()->route('index', compact('users'));
        }
    }

    public function destroy(CRUD $users)
    {
    //    dd($users);
            $users->delete();
            return redirect()->route('index',compact('users'));
    }
}
