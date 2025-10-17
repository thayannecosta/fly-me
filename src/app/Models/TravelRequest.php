<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelRequest extends Model
{
    protected $fillable = [
        'user_id',
        'destination',
        'departure_date',
        'return_date',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeFilter($query, array $filters, $user)
    {
        return $query
            ->when(! $user->hasPermission('god'), fn($q) => $q->where('user_id', $user->id))
            ->when($filters['departure_date'] ?? null, function ($q, $start) use ($filters) {
                $end = $filters['return_date'] ?? null;
                if ($end) {
                    $q->whereDate('departure_date', '>=', $start)
                      ->whereDate('return_date', '<=', $end);
                } else {
                    $q->whereDate('departure_date', '>=', $start);
                }
            })
            ->when($filters['return_date'] ?? null && !($filters['departure_date'] ?? null), 
                fn($q, $end) => $q->whereDate('return_date', '<=', $end))
            ->when($filters['status'] ?? null, fn($q, $v) => $q->where('status', $v))
            ->when($filters['destination'] ?? null, fn($q, $v) => $q->where('destination', 'like', "%{$v}%"));
    }

}
