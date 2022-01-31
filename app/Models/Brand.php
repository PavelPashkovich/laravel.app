<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;

class Brand extends Model
{
    protected $fillable = ['name', 'logo', 'description', 'status', 'creation_year'];
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'creation_year' => 'integer',
    ];

    public  function products() {
        return $this->hasMany(Product::class);
    }

    public function latestProduct() {
        return $this->hasOne(Product::class)->latestOfMany();
    }

    public function oldestProduct() {
        return $this->hasOne(Product::class)->oldestOfMany();
    }


    public function getNameAttribute() {
        return Str::ucfirst(Str::lower($this->attributes['name']));
    }

    public function getFullNameAttribute() {
        return 'Neo';
    }

    public function setNameAttribute($value) {
        if($value > 0) {
            $this->attributes['name'] = $value;
        }
        dump($value);
    }

    public function setPriceAttribute($value) {
        if(is_float($value)) {
            $this->attributes['price'] = intval($value * 100);
        } else {
            throw new Exception('Incorrect price');
        }
    }

}
