<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function getProduct()
    {
       $data['productlist']= DB::table('vp_products')->join('vp_categories','vp_products.prod_cate','=','vp_categories.cate_id')->orderBy('prod_id','desc')->get();
        return view('backend.product',$data);

    }


    public function getAddProduct()
    {
        $data['catelist'] = Category::all();
        return view('backend.addproduct', $data);
    }


    public function PostAddProduct(AddProductRequest $request)
    {
        $filename = $request->file('img')->getClientOriginalName();

        $product = new Product;
        $product ->prod_name = $request->name;
        $product ->prod_slug = str::slug($request->name);
        $product ->prod_img =$filename;
        $product ->prod_accessories = $request->accessories;
        $product ->prod_price = $request->price;
        $product ->prod_warranty =$request ->warranty;
        $product ->prod_promotion= $request->promotion;
        $product ->prod_condition =$request->condition;
        $product ->prod_status =$request->status;
        $product ->prod_description=$request->description;
        $product ->prod_cate = $request->cate;
        $product ->prod_featured = $request->featured;

        $product->save();
        $request ->img->storeAs('public/avatar',$filename);
        return back();

        
    }

    public function getEditProduct($id)
    {
        // Tìm sản phẩm bằng ID
        $product = Product::find($id);

        // Lấy tất cả các danh mục
        $listcate = Category::all();

        // Truyền dữ liệu sang view
        return view('backend.editproduct', compact('product', 'listcate'));
    }


    public function PostEditProduct(Request $request, $id)
    {
        $product = new Product;
        $arr['prod_name'] = $request->name;
        $arr['prod_slug'] =str::slug($request->name);
        $arr['prod_accessories'] = $request->accessories;
        $arr['prod_accessories'] = $request->accessories;
        $arr['prod_price'] = $request->price;
        $arr['prod_warranty'] = $request ->warranty;
        $arr['prod_promotion'] = $request ->promotion;
        $arr['prod_condition'] = $request ->condition;
        $arr['prod_status'] = $request ->status;
        $arr['prod_description'] = $request ->description;
        $arr['prod_cate'] = $request->cate;
        $arr['prod_featured'] = $request->featured;
        if($request->hasFile('img')){
            $img = $request->img->getClientOriginalName();
            $arr['prod_img']= $img;
            $request ->img->storeAs('public/avatar'.$img);
        }
        $product::where('prod_id', $id)->update($arr);
        return redirect('admin/product');
    }


    public function getDeleteProduct($id)
    {
       Product::destroy($id);
       return back();
 
    }
}
