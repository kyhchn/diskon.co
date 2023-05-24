<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
                ->orWhere('isi', 'like', '%' . request('search') . '%');
        }
    }

    // public function search(Request $request)
    // {
    //     if ($request->has('search')) {
    //         $threads = Thread::where('judul', 'LIKE', '%' . $request->search . '%')
    //             ->orWhere('isi', 'LIKE', '%' . $request->search . '%')
    //             ->get();
    //         return view('thread.index', ['threads' => $threads]);
    //     } else {
    //         return view('thread.index', ['threads' => Thread::all()]);
    //     }
    // }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }
}
