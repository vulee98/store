<?php

namespace App\Mail;


namespace App\Mail;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplyToContact extends Mailable
{
    use Queueable, SerializesModels;

    public $messageContent;
    public $product;
    //back
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messageContent, Product $product)
    {
        $this->messageContent = $messageContent;
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('backend.emails.reply_to_contact')
                    ->with([
                        'messageContent' => $this->messageContent,
                        'product' => $this->product
                    ]);
    }
}