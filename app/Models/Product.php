<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property string|null $img
 * @property string|null $content
 * @property int $price
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    protected $fillable = ['name', 'content', 'price', 'img', 'status', 'brand_id'];

    public function brand() {
        return $this->belongsTo(Brand::class)->withDefault([
            'name' => 'No name',
            'logo' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fproslang.ru%2Finternet-sleng%2Fchto-znachit-nounejm.html&psig=AOvVaw0HlLdU1FlSlhEDR8qjUqUe&ust=1642327231191000&source=images&cd=vfe&ved=0CAsQjRxqFwoTCMj6hu6_s_UCFQAAAAAdAAAAABAD',
        ]);
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

//    protected $guarded = ['id'];
    use HasFactory;
}
