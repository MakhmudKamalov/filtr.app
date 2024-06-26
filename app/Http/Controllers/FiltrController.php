<?php

namespace App\Http\Controllers;

use App\Models\Filtr;
use Illuminate\Http\Request;

class FiltrController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $filtrs = Filtr::all();
    return view('create_filtr', compact('filtrs'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {

    $validate = $request->validate([
      'name' => 'required',
      'month' => 'required',
      'price' => 'required',
    ]);


    Filtr::create([
      'name' => $validate['name'],
      'month' => $validate['month'],
      'price' => $validate['price'],
    ]);

    return $this->create();
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
  public function destroy($id)
  {
    Filtr::destroy($id);

    return $this->create();
  }
}
