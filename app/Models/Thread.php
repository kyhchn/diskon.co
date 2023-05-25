<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thread extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'isi',
        'likes'
    ];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('judul', 'like', '%' . request('search') . '%')
                ->orWhere('isi', 'like', '%' . request('search') . '%')->orWhere('lokasi', 'like', '%' . request('search') . '%');
        }
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function komen(): HasMany
    {
        return $this->hasMany(Komen::class);
    }
}
