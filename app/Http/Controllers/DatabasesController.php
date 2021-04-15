<?php

namespace App\Http\Controllers;
use App\Models\Databases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabasesController extends Controller
{   
    public function testing()
    {
        echo "<h1>Hi, everyone here we are here testing the API.</h1>";
    } 

    public function user()
    {
        return DB::select('select * from users');
    }

    public function index()
    {
        $database = Databases::all()->toJson();
        return $database;
    }

    public function store(Request $request)
    {
        $request->validate([
            'connection_name'=>'required',
            'username'=>'required',
            'password'=>'required',
            'hostname'=>'required',
            'port'=>'required',
            'engine'=>'required'
        ]);

        $database = new Databases([
            'connection_name'=> $request->input('connection_name'),
            'username'=> $request->input('username'),
            'password'=> $request->input('password'),
            'hostname'=> $request->input('hostname'),
            'port'=> $request->input('port'),
            'engine'=> $request->input('engine')
        ]);

        $database->save();
        return redirect('/');
    }

    public function show($id)
    {
        $database = Databases::find($id);
        return $database;
    }

    public function update(Request $request, $id)
    {
        $database = Databases::find($id);
        $database->update($request->all());

        return response()->json('');
    }

    public function destroy($id)
    {
        $database = Databases::find($id);
        $database->delete();

        return response()->json('');
    }
}
