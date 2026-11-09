<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AndarBaharBet extends Model
{
    protected $fillable = [
        'user_id', 'round_id', 'side', 'amount', 'status', 'win_amount',    
    ];

    public function round(){
        return $this->belongsTo(AndarBaharRound::class, 'round_id');
    }
}
