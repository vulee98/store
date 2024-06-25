<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReplyToComment;
use App\Mail\ReplyToContact;

class ContactController extends Controller
{
    public function contacts()
    {
        $contacts = Comment::orderBy('created_at', 'desc')->get();
        return view('backend.contacts', compact('contacts'));
    }
    public function postComment(Request $request, $id)
    {
        $comment = new Comment();
        $comment->com_name = $request->name;
        $comment->com_email = $request->email;
        $comment->com_content = $request->content;
        $comment->com_product = $id;
        $comment->save();
        return back();
    }

    public function reply(Request $request, Comment $contact)
    {
        $product = Product::find($contact->com_product);
        // Gửi email phản hồi cho khách hàng
        Mail::to($contact->com_email)->send(new ReplyToContact($request->message, $product));
        // Cập nhật trạng thái liên hệ
        $contact->is_contacted = true;
        $contact->save();

        return back()->with('success', 'Phản hồi đã được gửi.');
    }
}