<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footwear extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    public function scopeFilter($query, array $filters) {
        if ($filters['tag'] ?? false) {
            $query->where('color', 'like', '%' . request('tag') . '%' )
            ->orWhere('type', 'like', '%' . request('tag') . '%' );
        }

        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%' )
                ->orWhere('brand', 'like', '%' . request('search') . '%' )
                ->orWhere('type', 'like', '%' . request('search') . '%' )
                ->orWhere('description', 'like', '%' . request('search') . '%' )
                ->orWhere('color', 'like', '%' . request('search') . '%' )
                ->orWhere('price', 'like', '%' . request('search') . '%' );
        }
    }

    //relationship kay User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
