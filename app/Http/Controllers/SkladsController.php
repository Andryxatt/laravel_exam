<?php

namespace App\Http\Controllers;

use App\Category;
use App\Marka;
use App\Sklad;
use Illuminate\Http\Request;

class SkladsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sklads = Sklad::all();
        return view('admin.sklads.index', compact('sklads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sklads.form');
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
            'name' => 'required',
            'priceMonth' => 'required',
        ]);

        Sklad::create($request->all());

        return redirect()->route('sklads.index');
    }

    /**
     * @param Sklad $sklad
     */
    public function show(Sklad $sklad)
    {
        //
    }

    /**
     * @param Sklad $sklad
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Sklad $sklad)
    {
        $entity = $sklad;
        return view('admin.sklads.form', compact('entity'));
    }

    /**
     * @param Request $request
     * @param Sklad $sklad
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Sklad $sklad)
    {
        $this->validate($request, [
            'name' => 'required',
            'priceMonth' => 'required',
        ]);

        $sklad->update($request->all());

        return redirect()->route('sklads.index');
    }

    /**
     * @param Sklad $sklad
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Sklad $sklad)
    {
        $sklad->delete();
        return redirect()->route('sklads.index');
    }
}
