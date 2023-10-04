<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;


class DrinkController extends Controller
{
    public function addProduct (Request $request)
    {
        

        $validated = $request->validate([
            'name' => 'required',
            'volume' => 'required|integer',
            'sku' => 'required',
            'bprice' => '',
            'sprice' => 'required|integer',
            'type' => '',
            'description' => '',
        ]);

        if($validated['type']=='true'){
            $is_alcoholic = true;
        }else{
            $is_alcoholic = false;
        }

        Drink::create([
            'name' => $validated['name'],
            'volume' => $validated['volume'],
            'volume_unit' => $validated['sku'],
            'buying_price' => $validated['bprice'],
            'selling_price' => $validated['sprice'],
            'is_alcoholic' => $is_alcoholic,
            // 'is_alcoholic' => $validated['type'],
            'description' => $validated['description'],
        ]);

        return back()->with('message', 'Product added successfully');

        // dd($validated);
    }
}
