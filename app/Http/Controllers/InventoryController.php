<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseIsRedirected;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::orderBy('updated_at', 'desc')->get();
        return view('pages.inventory.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Item::create(
            $request->validateWithBag('addItem', ['name'=>'required|string|min:3|max:100'])
        );
        return redirect()->route('inventory.index')->with('addItem.success', 'Item berhasil ditambahkan');
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
        $item = Item::findOrFail($id);
        
        $item->update(
            $request->validateWithBag('updateItem', ['name'=>'required|string|min:3|max:100'])
        );

        // dd($item);

        return redirect()->route('inventory.index')->with('updateItem.success', 'Item berhasil di update')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showAjax(string $id) {
        $item = Item::findOrFail($id);
        return $item;
    }
}
