<?php

namespace App\Http\Controllers;

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
        // dd($request->all());
        Vault::create([
            'user_id' => auth()->id(),
            'name' => $request->input('name'),
            'vault' => $request->input('vault'),
        ]);
       
    }
}
