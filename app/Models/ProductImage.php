<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{

    protected $fillable = ['product_id','image_url'];
    //
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // 写入图片
    public function setImageUrlAttribute($pictures)
    {
        if (is_array($pictures)) {
            $this->attributes['image_url'] = json_encode($pictures);
        }
    }

    // 查看图片
    public function getImageUrlAttribute($pictures)
    {
        return json_decode($pictures, true);
    }
}
