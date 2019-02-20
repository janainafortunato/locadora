<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clienteController extends Controller
{
    // clienteController.php

  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }
    //clienteController.php
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('filename'))
         {
            $file = $request->file('filename');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
         }
        $cliente= new \App\cliente;
        $cliente->cpf=$request->get('cpf');
        $cliente->name=$request->get('name');
        $cliente->email=$request->get('email');
        $cliente->number=$request->get('number');
        $cliente->address=$request->get('address');
        $cliente->office=$request->get('office');
        $cliente->filename=$name;
        $cliente->save();
        
        return redirect('cliente')->with('success', 'Information has been added');
    }
    //clienteController.php

public function index()
    {
        $cliente=\App\cliente::all();
        return view('index',compact('cliente'));
    }
}
