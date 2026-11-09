<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AndarBaharRound extends Model
{
    protected $fillable = [
        'round_id','status','card_souit_id','joker_card_id','card_image', 'winning_side',
        'winning_position', 'total_bet_amount','total_win_amount',
    ];

    public function card(){
        return $this->belongsTo(Card::class,'joker_card_id');
    }
}
