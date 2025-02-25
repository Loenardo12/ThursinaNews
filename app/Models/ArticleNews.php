<?php

namespace App\Models;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleNews extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','slug','thumbnail','content','category_id','author_id','is_featured'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class, 'category_id');
    }
    public function Author(): BelongsTo
    {
        return $this->belongsTo(category::class, 'Author_id');
    }
}

