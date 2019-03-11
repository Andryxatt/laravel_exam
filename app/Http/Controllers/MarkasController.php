<?php

namespace App\Http\Controllers;

use App\Category;
use App\Marka;
use Illuminate\Http\Request;

class MarkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markas = Marka::all();
        return view('admin.markas.index', compact('markas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.markas.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'slug' => 'required',
            'name' => 'required',
        ]);

        Marka::create($request->all());

        return redirect()->route('markas.index');
    }

    /**
     * Display the specified resource.
     *
     *  @param  \App\Marka  $marka
     * @return \Illuminate\Http\Response
     */
    public function show(Marka $marka)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     *  @param  \App\Marka  $marka
     * @return \Illuminate\Http\Response
     */
    public function edit(Marka $marka)
    {
        $entity = $marka;
        return view('admin.markas.form', compact('entity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marka  $marka
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marka $marka)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|unique:markas',
        ]);

        $marka->update($request->all());

        return redirect()->route('markas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marka  $marka
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marka $marka)
    {
        $marka->delete();
        return redirect()->route('markas.index');
    }
}
