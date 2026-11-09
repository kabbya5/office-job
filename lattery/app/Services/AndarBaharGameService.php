<?php 

namespace App\Services;

use App\Models\AndarBaharBet;
use App\Models\AndarBaharRound;
use App\Models\Card;
use App\Models\CardSouit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AndarBaharGameService
{
    public function storeRound() : AndarBaharRound
    {
        return DB::transaction(function(){
            $active = AndarBaharRound::whereIn('status',['betting', 'dealing'])->lockForUpdate()->first();
            if($active){
                return $active;
            }

            $souit = CardSouit::inRandomOrder()->first();
            $joker_card = Card::inRandomOrder()->first();

            return AndarBaharRound::create([
                'round_id' => (string) Str::uuid(),
                'card_souit_id' => $souit->id,
                'joker_card_id' => $joker_card->id,
                'card_image' => 'andar_bahar/img/card/' . $souit->name . '_' . $joker_card->name . '.' . 'png',
            ]);
        },3);
    }

    public function bet(Request $request){
        $user_id = $request->user_id;
        $round_id = $request->round_id;
        $amount = $request->amount;
        $bet_type = $request->bet_type;

        return AndarBaharBet::create([
            'round_id' => $round_id,
            'user_id' => $user_id,
            'side' => $bet_type,
            'amount' => $amount,
        ]);
    }


    private function getRtp(float $win_amount, float $bet_amount, $andar_bet_amount){
        $bet_amount = $bet_amount + $andar_bet_amount;
        if($bet_amount == 0 || $win_amount == 0){
            return 0;
        }
        return ($win_amount/ $bet_amount) * 100;
    }

    public function generateCard(int $round_id){
        $round = AndarBaharRound::find($round_id);
        $pending_bets = AndarBaharBet::where('round_id', $round_id)->get();
        $bets = AndarBaharBet::where('status', 'completed')->get();
        $win_amount =  $bets->sum('win_amount');
        $bet_amount = $bets->sum('amount');

        $side =  rand(0,1) == 0 ? 'andar' : 'bahar';
        $position = rand(1, 30);

        if($bet_amount > 0){

            $result = $this->calulateWinAmount($pending_bets);
            $andar_win = $result['andar'];
            $bahar_win = $result['bahar'];
            $other_win = $result['other'];

            $andar_rtp = $this->getRtp($andar_win, $bet_amount);
            $bahar_rtp = $this->getRtp($bahar_win, $bet_amount);

            $max_rtp = max($andar_rtp, $bahar_rtp);

            dd($bet_amount, $win_amount, $max_rtp);

            if($max_rtp < 95){
                $side = rand(0,1) == 0 ? 'andar' : 'bahar';
            }

            if($andar_rtp < 97 && $bahar_rtp < 97){
               
            }else{
                $side = $andar_rtp > $bahar_rtp ? 'andar' : 'bahar';
            }

            dd($side, $andar_rtp, $bahar_rtp);

            if($side == 'andar'){
                $win_amount += $andar_win;
            }else{
                $win_amount += $bahar_win;
            }

            arsort($other_win);
            if (array_sum($other_win) <= 0) {
                $position = rand(1,20);
            }else{
                foreach($other_win as $key => $value){
                    $rtp = $this->getRtp($win_amount + $value, $bet_amount);
                    if ($rtp < 97) {
                        if (rand(1, 3) == 1) {

                            if ($key === '41-or-more') {
                                $position = rand(41, 46);
                            } else {
                                [$min, $max] = explode('-', $key);

                                $position = rand((int) $min, (int) $max -1);
                            }

                            break;
                        }
                    }
                    else{
                        
                        $last_key = array_key_last($other_win);
                        if ($last_key === '41-or-more') {
                            $position = rand(41, 43);
                        } else {
                            [$min, $max] = explode('-', $last_key);
                            $position = rand((int) $min, (int) $max - 1);
                        }
                    }
                }
            }
        }

        $round->update([
            'winning_side' => $side,
            'winning_position' => $position,
            'total_bet_amount' => $bet_amount,
        ]);

        return;
    }

    private function getMultiplier(string $side){
        if($side == 'andar' || $side == 'bahar'){
            return 2;
        }elseif($side == '1-5'){
            return 3.5;
        }elseif($side == '6-10'){
            return 4.5;
        }elseif($side == '11-15'){
            return 5.5;
        }elseif($side == '16-20'){
            return 7.5;
        }elseif($side == '21-25'){
            return 8.5;
        }elseif($side == '26-30'){
            return 15.5;
        }elseif($side == '31-35'){
            return 25.5;
        }elseif($side == '36-40'){
            return 50;
        }elseif($side == '41-or-more'){
            return 120;
        }
    }   

    private function calulateWinAmount($pending_bets){
        $andar_side_amount = 0;
        $bahar_side_amount = 0;
        
        $other_side_amount = [
            '1-5' => 0,
            '6-10' => 0,
            '11-15' => 0,
            '16-20' => 0,
            '21-25' => 0,
            '26-30' => 0,   
            '31-35' => 0,
            '36-40' => 0,
            '41-or-more' => 0,
        ];

        foreach($pending_bets as $bet){
            if($bet->side == 'andar'){
                $andar_side_amount += $bet->amount * $this->getMultiplier($bet->side);
            }elseif($bet->side == 'bahar'){
                $bahar_side_amount += $bet->amount * $this->getMultiplier($bet->side);
            }else{
                $bet->side = str_replace(' ', '-', strtolower($bet->side));
                $other_side_amount[$bet->side] += $bet->amount * $this->getMultiplier($bet->side);
            } 
        }

        return [
            'andar' => $andar_side_amount,
            'bahar' => $bahar_side_amount,
            'other' => $other_side_amount,
        ];
    }   

    public function dealCards(int $round_id){
        $round = AndarBaharRound::find($round_id);
        $card_souts = CardSouit::all();
        $cards = Card::all();
        $deck = [];
        $jokerDeck = [];

        foreach($card_souts as $sout){
            foreach($cards as $card){
                if($round->joker_card_id == $card->id){
                    $jokerDeck[] = [
                        'card_id' => $card->id,
                        'card' => $card->name,
                        'suit_id' => $sout->id,
                        'suit' => trim($sout->name),
                    ];
                }else{
                    $deck[] = [
                        'card_id' => $card->id,
                        'card' => $card->name,
                        'suit_id' => $sout->id,
                        'suit' => trim($sout->name),
                    ];
                }

                
            }
        }

        shuffle($deck);
        shuffle($jokerDeck);

        $dealtCards = [];

        foreach ($deck as $index => $item) {

            // First card goes to Andar, second to Bahar.
            $side = $index % 2 === 0 ? 'andar' : 'bahar';
            
            $dealtCards[] = [
                'position' => $index + 1,
                'side' => $side,
                'card' => $item['card'],
                'suit' => $item['suit'],
                'matched' => false,
                'card_image' => asset('andar_bahar/img/card/' . $item['suit'] . '_' . $item['card'] . '.' . 'png'),
            ];

            if($side == $round->winning_side && ($index + 1) >= $round->winning_position){
                $joker = $jokerDeck[array_rand($jokerDeck)];

                $dealtCards[$index]['matched'] = true;
                $dealtCards[$index]['card'] =  $joker['card'];
                $dealtCards[$index]['suit'] =  $joker['suit'];
                $dealtCards[$index]['card_image'] = asset('andar_bahar/img/card/' . $joker['suit'] . '_' . $joker['card'] . '.' . 'png');
                 
                break;
            }
        }

        return $dealtCards;
    }

    public function cancelBet(Request $request){
        $user_id = $request->user_id;
        $round_id = $request->round_id;

        $bet = AndarBaharBet::where('user_id', $user_id)
            ->where('round_id', $round_id)
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->first();

        $other_bets = AndarBaharBet::where('user_id', $user_id)
            ->where('round_id', $round_id)
            ->where('status', 'pending')
            ->where('side', $bet->side)
            ->where('id', '!=', $bet->id)
            ->get();

        $bet->delete();

        return ['other_bets' => $other_bets, 'amount' => $bet->amount, 'bet_side' => str_replace(' ', '-', strtolower($bet->side))];
    }

    public function generateResult(int $round_id){
        $round = AndarBaharRound::find($round_id);
        $bets = AndarBaharBet::where('round_id', $round_id)->get();

        $results = [];
        $total_win_amount = 0;

        foreach ($bets as $bet) {

            $userId = $bet->user_id;
            $side = $bet->side;

            if (!isset($results[$userId][$side])) {
                $results[$userId][$side] = [
                    'amount' => 0,
                    'win_amount' => 0,
                ];
            }

            $results[$userId][$side]['amount'] += $bet->amount;

            if($round->winning_side == $side){
                $results[$userId][$side]['win_amount'] += $bet->amount * 2;
                $bet->win_amount = $bet->amount * 2;
                $total_win_amount += $bet->amount * 2;
            }

            $side = $bet->side;

            $max = 0;
            $min = 0;

            if (preg_match('/^(\d+)-(\d+)$/', $side, $matches)) {
                $min = (int) $matches[1];
                $max = (int) $matches[2];
            } elseif (preg_match('/^(\d+)\s+or\s+more$/i', $side, $matches)) {
                $min = (int) $matches[1];
                $max = PHP_INT_MAX;
            }

            if($round->winning_position >= $min && $round->winning_position <= $max){
                $results[$userId][$side]['win_amount'] += $bet->amount  * $this->getMultiplier($bet->side);
                $bet->win_amount = $bet->amount  * $this->getMultiplier($bet->side);
                $total_win_amount += $bet->amount * $this->getMultiplier($bet->side);
            }
            
            $bet->status = 'completed';

            $bet->save();
        }

        $round->total_win_amount = $total_win_amount;
        $round->status = 'completed';
        $round->save();

        return $results; 
    }
}       
