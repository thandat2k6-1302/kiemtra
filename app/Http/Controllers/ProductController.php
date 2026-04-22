<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\TypeProduct;

class ProductController extends Controller
{
    public function getProductList(){
        $product = Product::orderBy('id', 'DESC')->get();
        return view('admin.product.danhsach', compact('product'));
    }

    public function getProductAdd(){
        $type = TypeProduct::all();
        return view('admin.product.them', compact('type'));
    }

    public function postProductAdd(Request $req){
        $product = new Product;
        $product->name = $req->name;
        $product->id_type = $req->type;
        $product->description = $req->description;
        $product->unit_price = $req->unit_price;
        $product->promotion_price = $req->promotion_price;
        $product->unit = $req->unit;
        $product->new = $req->new;

        if($req->hasFile('image')){
            $file = $req->file('image');
            $name = $file->getClientOriginalName();
            $image = time()."_".$name;
            $file->move("source/image/product", $image);
            $product->image = $image;
        } else {
            $product->image = "";
        }
        $product->save();
        return redirect()->route('admin.getProductList')->with('thongbao', 'Thêm thành công');
    }

    public function getProductEdit($id){
        $type = TypeProduct::all();
        $product = Product::find($id);
        return view('admin.product.sua', compact('product', 'type'));
    }

    public function postProductEdit(Request $req, $id){
        $product = Product::find($id);
        $product->name = $req->name;
        $product->id_type = $req->type;
        $product->description = $req->description;
        $product->unit_price = $req->unit_price;
        $product->promotion_price = $req->promotion_price;
        $product->unit = $req->unit;
        $product->new = $req->new;

        if($req->hasFile('image')){
            $file = $req->file('image');
            $name = $file->getClientOriginalName();
            $image = time()."_".$name;
            $file->move("source/image/product", $image);
            $product->image = $image;
        }
        $product->save();
        return redirect()->route('admin.getProductList')->with('thongbao', 'Sửa thành công');
    }

    public function getProductDelete($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.getProductList')->with('thongbao', 'Xóa thành công');
    }
}
