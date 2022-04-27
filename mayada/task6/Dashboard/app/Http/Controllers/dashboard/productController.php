<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\updatePostRequest;
use App\Http\Services\media;

class productController extends Controller
{
    public const STATUSES = ['active', 'notactive'];
    public const MAX_IMAGE_SIZE = 1024;
    public const AVALIABLE_EXTENSION = ['png', 'jpg', 'jepg'];

    public function all()
    {
        $products = DB::table('products')->get();
        return view('products.all', compact('products'));
    }
    public function add()
    {
        $brands = DB::table('brands')->select('id', 'name_en', 'name_ar')->get();
        $subcategorieses = DB::table('subcategories')->select('id', 'name_en', 'name_ar')->get();
        return view('products.add', compact('brands', 'subcategorieses'))->with('statuses', self::STATUSES);
    }
    public function create(StorePostRequest $request)
    {
        $data = $request->validated();
        // dd($request->validated());
        $data['image'] = media::uploadImage($request->file('image'), 'products');
        DB::table('products')->insert($data);
        // السطر ده ش شغال لانه مش شايف ف الريكوست اي بوتون 
        return $this->redirectAccoridingToRequest($request, "product created sucessfuly");
    }
    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $brands = DB::table('brands')->select('id', 'name_en', 'name_ar')->get();
        $subcategorieses = DB::table('subcategories')->select('id', 'name_en', 'name_ar')->get();
        return view('products.edit', compact('product', 'brands', 'subcategorieses'))->with('statuses', self::STATUSES);
    }
    public function update($id, updatePostRequest $request)
    {

        $data = $request->validated();
        if ($request->hasFile('image')) {
            $data['image'] = media::uploadImage($request->file('image'), 'products');
            $product = DB::table('products')->where('id', $id)->first();
            media::deleteImage($product->image, 'products');
        }
        DB::table('products')->where('id', $id)->update($data);
        return $this->redirectAccoridingToRequest($request, "product updated sucessfuly");
    }
    public function delete($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        media::deleteImage($product->image, 'products');
        DB::table('products')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'product deleted');
    }
}
