<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'vp_comment';

    protected $primaryKey = 'com_id';

    protected $fillable = [
        'com_email',
        'com_name',
        'com_content',
        'com_product',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'com_product', 'prod_id');
    }
}
