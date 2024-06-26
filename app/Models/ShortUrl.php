<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ShortUrl extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'orig_url',
        'short_url_key',
        'name',
    ];

    public function redirectStatistic(): HasOne
    {
        return $this->hasOne(RedirectStatistic::class);
    }
}
