<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\Traits\Creator;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Blog
 * @package App\Models
 */
class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @return Attribute
     */
    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => (new Carbon($value))->format('Y:m:d')
        );
    }

    public function previewText(): Attribute
    {
        return Attribute::make(
            set: fn($value) => substr($value, 0, 120) . ' ....'
        );
    }
}
