<?php

namespace App\Http\Controllers;

use App\Models\Economy;
use App\Models\Vault;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VaultController extends Controller
{
    public function index()
    {
        return Inertia::render('Vault');
    }

    public function store(Request $request)
{
    $economy = Economy::create([
        'value' => $request['value'],
        'number' => $request['number'],
        'time' => $request['time'],
    ]);

    $vault = Vault::create([
        'user_id' => auth()->id(),
        'name' => $request['name'],
        'vault' => $request['vault'],
        'economy_id' => $request->input('economy_id'), 
    ]);
    
    $vault->update(['economy_id' => $economy->id]);

    return redirect()->route('cofrinho')->with('success', 'Cofrinho e Economia criados com sucesso!');
}


}
