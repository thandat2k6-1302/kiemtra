<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCateList(){
        $cates = Category::all();
        return view('admin.category.cate-list', compact('cates'));
    }

    public function getCateAdd(){
        return view('admin.category.cate-add');
    }

    public function postCateAdd(Request $req){
        $this->validate($req,
        [
            'name'=>'required|unique:type_products,name',
            //thêm các validate khác nếu cần
        ],
        [
            'name.required'=>'Vui lòng nhập tên loại sản phẩm',
            'name.unique'=>'Tên loại sản phẩm đã tồn tại'
        ]);
        $cate = new Category();
        $cate->name = $req->name;
        $cate->description = $req->description;
        //xử lý ảnh nếu có
        $cate->save();
        return redirect()->route('admin.getCateList')->with('thongbao','Thêm thành công');
    }

    public function getCateDelete($id){
        $cate = Category::find($id);
        $cate->delete();
        return redirect()->route('admin.getCateList')->with('thongbao','Xóa thành công');
    }

    public function getCateEdit($id){
        $cate = Category::find($id);
        return view('admin.category.cate-edit', compact('cate'));
    }

    public function postCateEdit(Request $req, $id){
        $cate = Category::find($id);
        $cate->name = $req->name;
        $cate->description = $req->description;
        $cate->save();
        return redirect()->route('admin.getCateList')->with('thongbao','Sửa thành công');
    }
}
