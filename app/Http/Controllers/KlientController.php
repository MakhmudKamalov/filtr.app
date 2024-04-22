<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Filtr;
use App\Models\Zakaz;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class KlientController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $clients = Client::all();
    $data = [];

    foreach ($clients as $client) {
      $data[] = [
        'id' => $client['id'],
        'name' => $client['name'],
        'surname' => $client['surname'],
        'phone' => $client['phone'],
        'count' => $client->zakazs()->count(),
      ];
    }


    return view('welcome', compact('data'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $filtr = Filtr::all();
    return view('create', compact('filtr'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validate = $request->validate([
      'name' => 'required',
      'surname' => 'required',
      'phone' => 'required',
      'filtr' => 'required',
    ]);

    $client = Client::create([
      'name' => $validate['name'],
      'surname' => $validate['surname'],
      'phone' => $validate['phone'],
    ]);




    Zakaz::create([
      'client_id' =>  $client->id,
      'filtr_id' => $validate['filtr'],
    ]);

    return redirect()->route('klients.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $client = Client::find($id);
    $zakaz = $client->zakazs;
    $filtr = [];

    foreach ($zakaz as $z) {
      $filtr[] = [
        'name' => Filtr::find($z['filtr_id'])->name,
        'month' => Filtr::find($z['filtr_id'])->month,
        'created_at' => $z['created_at'],
      ];
    }

    $data = [
      'name' => $client['name'],
      'surname' => $client['surname'],
      'phone' => $client['phone'],
      'filtr' => $filtr
    ];
    // return $data;

    return view('show', compact('data'));
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
    $client = Client::findOrFail($id);

    // Удаление связанных заказов
    $client->zakazs()->delete();

    // Удаление клиента
    $client->delete();

    return back();
  }

  public function add($id)
  {

    $client = Client::find($id);
    $zakaz = $client->zakazs;
    $filtr = [];

    $f = Filtr::all();

    foreach ($zakaz as $z) {
      $filtr[] = [
        'id' => Filtr::find($z['filtr_id'])->id,
        'name' => Filtr::find($z['filtr_id'])->name,
        'month' => Filtr::find($z['filtr_id'])->month,
        'created_at' => $z['created_at'],
      ];
    }

    $data = [
      'id' => $client['id'],
      'name' => $client['name'],
      'surname' => $client['surname'],
      'phone' => $client['phone'],
      'filtr' => $filtr
    ];

    return view('add', compact('data', 'f'));
  }

  public function storeAdd(Request $request)
  {

    Zakaz::create([
      'client_id' =>  $request->id,
      'filtr_id' => $request->filtr,
    ]);

    return $this->add($request->id);
  }
}
