<?php

namespace App\Http\Controllers;

use App\Category;
use App\Marka;
use App\Provider;
use Illuminate\Http\Request;

class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::all();
        return view('admin.providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.providers.form');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'webpage' => 'required',
        ]);

        Provider::create($request->all());

        return redirect()->route('providers.index');
    }

    /**
     * Display the specified resource.
     *
     *  @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     *  @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        $entity = $provider;
        return view('admin.providers.form', compact('entity'));
    }


    /**
     * @param Request $request
     * @param Provider $provider
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Provider $provider)
    {
        $this->validate($request, [
            'slug' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'webpage' => 'required',
        ]);

        $provider->update($request->all());

        return redirect()->route('providers.index');
    }

    /**
     * @param Provider $provider
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('providers.index');
    }
}
