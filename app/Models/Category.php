<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    use CascadeSoftDeletes;

    protected $cascadeDeletes = ['productRelations'];

    protected $fillable = [
        'title',
        'description',
        'slug',
        //     'is_active',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    // Override
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function slug($title, $id = -1): string
    {
        $slug = Str::slug($title, '-');
        $existing = Category::where('slug', $slug)->whereNotIn('id', [$id])->first();
        $i = 2;
        while (! empty($existing)) {
            $slug = Str::slug($title.' '.$i, '-');
            $existing = Category::where('slug', $slug)->whereNotIn('id', [$id])->first();
            $i++;
        }

        return $slug;
    }

    public function productRelations(): HasMany
    {
        return $this->hasMany(CategoryProductRelation::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
