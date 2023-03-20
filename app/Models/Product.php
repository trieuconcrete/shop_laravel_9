<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $talbe = 'products';

    protected $fillable = [
        'product_code',
        'category_id',
        'brand_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'featured',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'sale_off'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function productColors()
    {
        return $this->hasMany(ProductColor::class, 'product_id', 'id');
    }

    public function getImage($index = 0)
    {
        $url = isset($this->productImages[$index]) ? Storage::disk('local')->url($this->productImages[$index]['image']) : 'no_img.png';
        return asset($url);
    }

    /**
     * Get the sale off price
     */
    protected function getSalePriceAttribute()
    {
        $salePrice = ($this->selling_price * $this->sale_off)/100;
        return $this->selling_price - $salePrice;
    }

    /**
     * Get the sale off
     */
    protected function getSalePercentAttribute()
    {
        return $this->sale_off ? '↓'.$this->sale_off.'%' : null;
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            $model->product_code = Str::upper(Str::random(4)).Carbon::now()->format('Ymd');
        });
    }
}
