<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use App\ImageProcess\ImageProcess;
use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class ProductController extends Controller
{


    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::with(
            ['store',
            'category:id,name',
            'subCategory:id,name',
            'store.style:id,name',
            'store.size:id,name',
            'store.color:id,name'
        ])->get();
    }
    public function productCountDateWise()
    {
        $period = CarbonPeriod::create(Carbon::now()->startOfMonth(), Carbon::now());
        $dataCount = [];
        foreach ($period as $date){
            $dataCount[] = Product::whereDate('created_at', $date->format('Y-m-d'))->withTrashed()->count();

        }
        $currentTotalProduct = Product::count();

        return ["totalProductCount" => $dataCount, "currentTotalProduct" => $currentTotalProduct];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ImageProcess $imageProcess)
    {
            $product = new Product;
            $product->name          = $request->name;
            $product->sku           = $request->sku;
            $product->description   = $request->description;
            $product->shortDescription = $request->shortDescription;
            $product->category_id      = $request->category;
            $product->subcategory_id   = $request->subCategory;
            $product->save();

            foreach($request->productDetails as $proDetails){
                $path = $imageProcess->imageSaveAndSend($proDetails['images'], $request->sku);
                $proStore = new Store;
                $proStore->product_sku  = $request->sku;
                $proStore->style_id     = $proDetails['style'];
                $proStore->size_id      = $proDetails['size'];
                $proStore->color_id     = $proDetails['color'];
                $proStore->stock        = $proDetails['stock'];
                $proStore->price        = $proDetails['price'];
                $proStore->images       = $path->original;
                $proStore->save();
            }
        return ["success" => true, "message" => "Product Save Successfully"];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageProcess $imageProcess)
    {
        $product = Product::findOrFail($request->product_id);
        $product->name          = $request->name;
        $product->sku           = $request->sku;
        $product->description   = $request->description;
        $product->shortDescription = $request->shortDescription;
        $product->category_id      = $request->category;
        $product->subcategory_id   = $request->subCategory;
        $product->update();
        $proStoredelete = Store::where('product_sku', $request->sku)->delete();
        
        foreach($request->productDetails as $proDetails){
            $path = $imageProcess->imageSaveAndSend($proDetails['images'], $request->sku);
            $proStore = new Store;
            $proStore->product_sku  = $request->sku;
            $proStore->style_id     = $proDetails['style'];
            $proStore->size_id      = $proDetails['size'];
            $proStore->color_id     = $proDetails['color'];
            $proStore->stock        = $proDetails['stock'];
            $proStore->price        = $proDetails['price'];
            $proStore->images       = $path->original;
            $proStore->save();
        }
        return ["success" => true, "message" => "Product Update Successfully"];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro = Product::findOrFail($id);
        $pro->delete();
        return response()->json([
            "success" => true,
            "message" => "Data Removed Successfully."
        ]);
    }
}
