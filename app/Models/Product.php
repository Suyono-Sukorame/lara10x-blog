<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    // protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'small_description',
        'original_price',
        'price',
        'stock',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'datetime:Y-m-d',
        'is_active' => 'boolean'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'name_price',
    ];

    public function getNamePriceAttribute(){
        return $this->name.' - $'. $this->price;
    }

    // Accssors and Mutators in Laravel

    public function getNameAttribute()
    {
        return ucwords($this->attributes['name']);
    }
    // Mutators in Laravel
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
        $this->attributes['slug'] = Str::slug($value);
    }
}
