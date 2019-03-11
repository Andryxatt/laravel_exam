<?php

namespace App\Http\Controllers;

use App\Marka;
use App\Product;
use App\Provider;
use App\Sklad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sklads = Sklad::all();
        $providers = Provider::all();
        $markas = Marka::all();
        return view('admin.products.form', compact('markas','providers','sklads'));
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
            'slug'=>'required|min:5|max:20',
            'model'=>'required|min:5|max:20',
            'marka_id' => 'required|integer',
            'price_by' => 'required|integer',
            'price_sale' => 'required|integer',
            'provider_id' => 'required|integer',
            'sklad_id' => 'required|integer',
            'sizes' => 'required',
        ]);
        File::makeDirectory('storage/images/' . Auth::id().'/',0777,true,true);
        $item = $request->file('image');
        $filename = time() . '.'.$item->getClientOriginalExtension();
        $location = 'storage/images/' . Auth::id().'/';
        $request = $request->all();
        $request['image']='images/'. Auth::id().'/'.$filename;
        Image::make($item)->save($location.$filename);
        Product::create($request);

        return redirect()->route('products.index');
    }


    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $entity = $product;
        $sklads = Sklad::all();
        $providers = Provider::all();
        $markas = Marka::all();
        return view('admin.products.form', compact('markas','providers','sklads','entity'));
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'slug'=>'required|min:5|max:20',
            'model'=>'required|min:5|max:20',
            'marka_id' => 'required|integer',
            'price_by' => 'required|integer',
            'price_sale' => 'required|integer',
            'provider_id' => 'required|integer',
            'sklad_id' => 'required|integer',
            'sizes' => 'required',
        ]);

        Storage::disk('public')->delete($product->image);
        File::makeDirectory('storage/images/' . Auth::id().'/',0777,true,true);
        $update =$request->all();
        $item = $request->file('image');


        if($item)
        {
            $filename = time() .'.'.$item->getClientOriginalExtension();
            $location = 'storage/images/' . Auth::id().'/';
            $update['image'] ='images/'.Auth::id().'/'.$filename;
            Image::make($item)->save($location.$filename);

        }
        $product->update($update);
        return redirect()->route('products.index');
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
