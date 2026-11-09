<?php

namespace App\Http\Controllers\AndarBahar;

use App\Http\Controllers\Controller;
use App\Models\AndarBaharRound;
use Illuminate\Http\Request;
use App\Services\AndarBaharGameService;

use App\Models\AndarBaharBet;

class AndarBaharController extends Controller
{
    private AndarBaharGameService $gameService;

    public function __construct(AndarBaharGameService $gameService){
        $this->gameService = $gameService;
    }
 
    public function index(){
        $auth_id = 1;
        $currency = 'INR';
        $unformat_bets = AndarBaharBet::where('user_id', $auth_id)->where('status', 'pending')->get();
        $total_amount = $unformat_bets->sum('amount');

        $round = AndarBaharRound::orderBy('id','desc')->first();
        $rounds = AndarBaharRound::orderBy('id', 'desc')->where('status','completed')->limit(20)->get();

        $colors = [
            1 => 'pink',
            10 => 'gold',
            50 => 'red',
            100 => 'blue',
            500 => 'green',
            1000 => 'purple',
        ];

        $bets = [];
        
        foreach($unformat_bets as $bet){
            $bets[str_replace(' ', '-', strtolower($bet->side))][] = [intval($bet->amount), $colors[intval($bet->amount)]];
        }

        return view('games.andar_bahar.index', compact('bets', 'currency', 'total_amount', 'round','rounds'));
    }

    public function createRound(){
        $round = $this->gameService->storeRound();
        return $round;
    }

    public function generateCard(Request $request){
        $round_id = $request->round_id;
        $this->gameService->generateCard($round_id);
    }

    public function dealCards(Request $request){
        $round_id = $request->round_id;
        $cards = $this->gameService->dealCards($round_id);
        return $cards;
    }

    public function bet(Request $request){
        $bet = $this->gameService->bet($request);
        return $bet;
    }

    public function cancelBet(Request $request){
        $data = $this->gameService->cancelBet($request);
        return $data;
    }

    public function generateResult(Request $request){
        $round_id = $request->round_id;
        $results = $this->gameService->generateResult($round_id);
        return $results;
    }
}
