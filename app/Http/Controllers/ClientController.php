<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $data = [
    'status' => 'successful',
    'code' => 200,
    'payload' => [],
    'messages' => [],
    ];

    public function index()
    {
        $this->data['payload'] = Client::all();
        
        return  $this->data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone' => 'required|unique:clients',
        ]);

        Client::create($validate);
        
        $this->data['payload'] = Client::all();
        $this->data['code'] = 201;
        $this->data['messages'] = 'Created successfuly';

        return $this->data;
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
