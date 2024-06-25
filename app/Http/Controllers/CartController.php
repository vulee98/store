<?php

namespace App\Http\Controllers;
use Cart;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast;
use App\Models\Product;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Mail;
class CartController extends Controller
{
    //
    public function getAddCart($id){
        $product = Product::find($id);
        $imagePath = Storage::url('avatar/' . $product->prod_img);
       FacadesCart::add([
        'id' => $id,
            'name' => $product->prod_name,
            'qty' => 1,
            'price' => $product->prod_price,
            'options' => ['img' =>$product->prod_img]
    ]);
       return redirect('cart');
   
    }

    public function getShowCart(){
        $total = FacadesCart::total();
        $items = FacadesCart::content();
        return view('frontend.cart' ,compact('items','total'));
    }

    public function getDeleteCart($id){
        if($id=='all'){
            FacadesCart::destroy();
        }else{
            FacadesCart::remove($id);
        }
        return back();
    }

    public function getUpdateCart(Request $request)
    {
        FacadesCart::update($request->rowId, $request->qty);
        return response()->json(['status' => 'success', 'message' => 'Giỏ hàng cập nhật thành công']);
    }

    public function postComplete(Request $request)
    {
        $data = [];
        $data['info'] = $request->all();
        $email = $request->email;    
        $data['cart'] = FacadesCart::content();
        $data['total'] = FacadesCart::total(0, '', '');

        Mail::send('frontend.email', $data, function($message) use ($email) {
            $message->from('levanvu0998@gmail.com', 'vulee');
            $message->to($email, $email);  
            $message->cc('levanvu0998@gmail.com', 'Văn Vũ');
            $message->subject('Xác nhận hóa đơn mua hàng');
        });

        FacadesCart::destroy();
        return redirect('complete');
    }
    public function getComplete(){
        return view('frontend.complete');
    }
}

