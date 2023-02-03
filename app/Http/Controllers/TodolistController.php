<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todolists = Todolist::orderBy('id', 'desc')->get();
        $incomplete =  Todolist::where('complete', 0)->get();
        return view('home', compact('todolists', 'incomplete'));
        
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required'
        ]);

        Todolist::create($data);
        return back();
    }

    public function update($id)
    {
        $todolist = Todolist::findOrFail($id);
        $todolist->complete = !$todolist->complete;
        $todolist->save();

        return redirect()
            ->route('index')
            ->with('flash_notification.message', 'Todo updated successfully')
            ->with('flash_notification.level', 'success');
    }
    
    public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        return back();
    }
}
