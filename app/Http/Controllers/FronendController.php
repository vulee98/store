<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class FronendController extends Controller
{
    public function getHome(){
       
        $data['featured'] = Product::where('prod_featured',1)->orderBy('prod_id','desc')->take(8)->get();
        $data['news'] = Product::orderBy('prod_id','desc')->take(8)->get();
        return view('frontend.home',$data);
    }

    public function getDetail($id){
        $data['item'] = Product::find($id);
        $data['comments'] = Comment::where('com_product',$id)->get();
        return view('frontend.details',$data);
    }

    public function  getCategory($id){
        $data['cateName']= Category::find($id);
        $data['items']=Product::where('prod_cate',$id)->orderBy('prod_id','desc')->paginate(8);
        return view('frontend.category',$data);
    }

    public function postComment(Request  $request, $id){
        $comment = new Comment();
        $comment ->com_name = $request ->name;
        $comment ->com_email = $request->email;
        $comment ->com_content = $request->content;
        $comment ->com_product =$id;
        $comment -> save();
        return back();
    }

    public function getSearch(Request $request ){
        $result = $request->result;
        $data['keyword']= $result;
        $result = '%' . $result . '%';
      
        $data['items']=Product::where('prod_name','like','%'.$result.'%')->paginate(8);
        return view('frontend.search',$data);
    
    }

}
