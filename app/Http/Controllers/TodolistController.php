<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TodolistController extends Controller
{

    // public function index()
    // {
    //     $get_todo = Todolist::all();
    //     return view('home' , compact('get_todo'));

    // }
    public function store_todo(Request $request)
    {
        $request->validate([
            'todo_content' => 'required',
            'quantity' => 'required',
            'market' => 'required',
            'date' => 'required'
        ]);

        Todolist::insert([
            'todo_content' => $request->todo_content,
            'quantity' => $request->quantity,
            'market' => $request->market,
            'date' => $request->date,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('submit_success', 'Data submit successfully,please check your list!');
    }


    public function destroy($id)
    {
        Todolist::find($id)->delete();
        return back()->with('deleted', 'Data permanently deleted,please check your list!');
    }
}
