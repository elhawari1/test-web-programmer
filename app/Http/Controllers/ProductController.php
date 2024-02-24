<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function index()
    {
        $products = ProductModel::all();
        return view("produk.v_product", compact('products'));
    }

    public function create()
    {
        $category = CategoryModel::all();
        return view('produk.v_create_product', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_category' => 'required',
            'name' => 'required|unique:tbl_product,name',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'stok' => 'required|integer',
            'image' => 'required|mimes:jpg,png|max:102400',
        ]);

        if ($request->hasFile('image')) {
            $file_image = $request->file('image');
            $image_extensions = $file_image->getClientOriginalExtension();
            $image = $request->name . "." . $image_extensions;
            $file_image->move(public_path('image_product'), $image);
        }
        $product = new ProductModel([
            'id_category' => $request->id_category,
            'name' => $request->name,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'image' => $image,
        ]);
        $product->save();

        return redirect()->route('product')->with('success', 'Produk Berhasil Ditambahkan');
    }

    public function edit($id_product)
    {
        $product = ProductModel::find($id_product);
        $category = CategoryModel::all();
        return view('produk.v_edit_product', compact('product', 'category'));
    }

    public function update(Request $request, $id_product)
    {
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png|max:102400',
        ]);
        $product = ProductModel::find($id_product);
        if ($request->hasFile('image')) {
            if (File::exists('image_product' . '/' . $product->image)) {
                File::delete('image_product' . '/' . $product->image);
            }
            $file_image = $request->file('image');
            $image_extensions = $file_image->getClientOriginalExtension();
            $image = $request->name . "." . $image_extensions;
            $file_image->move(public_path('image_product'), $image);

            $product->update([
                'id_category' => $request->id_category,
                'name' => $request->name,
                'harga_beli' => $request->harga_beli,
                'harga_jual' => $request->harga_jual,
                'stok' => $request->stok,
                'image' => $image,
            ]);
        } else {
            $product->update([
                'id_category' => $request->id_category,
                'name' => $request->name,
                'harga_beli' => $request->harga_beli,
                'harga_jual' => $request->harga_jual,
                'stok' => $request->stok,
            ]);
        }

        return redirect()->route('product')->with('success', 'Produk Berhasil Diubah');
    }

    public function destroy($id_product)
    {
        $product = ProductModel::find($id_product);
        if (File::exists('image_product' . '/' . $product->image)) {
            File::delete('image_product' . '/' . $product->image);
        }
        $product->delete();
        return redirect()->route('product');
    }
}
