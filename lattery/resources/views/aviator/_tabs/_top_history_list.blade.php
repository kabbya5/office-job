@foreach($bots as $bot)
<div class="top-wins-list-item">
    <div class="top-wins-list-item-row">
        <img alt="avatar" class="avatar" src="{{asset($bot->image)}}">
        <div class="column username-date">
            <div  class="username">{{substr($bot->name, 0, 1) . '***' . substr($bot->name, -1)}}</div>
            <div  class="date">08.05.26</div>
        </div>
        <div class="buttons-group">
            <button aria-label="Share Bet" class="btn">
                <div class="icon share-i">
                    <img src="{{asset('custom_aviator/img/message-icon.svg')}}" alt="">
                </div>
            </button>
            <div aria-label="Check Fairness" class="btn disabled-on-game-focused">
                <div class="icon fairness-i">
                    <img src="{{asset('custom_aviator/img/shield-icon.svg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="top-wins-list-item-row">
        <div class="column top-bet-details">
            @php
                if($history_type == 'daily'){
                    $bet_amount = $bot->monthly_bet_amount * 0.90;
                    $win_amount = $bot->daily_win_amount * 0.90;
                }else{
                    $bet_amount = $bot->monthly_bet_amount;
                    $win_amount = $bot->monthly_win_amount;
                }
            @endphp
            <div class="bet-details-row">
                <div class="description"> Bet {{ auth()->user()->getCurrency() }} </div>
                <div class="value">{{ number_format($bet_amount, 2) }}</div>
            </div>
            <div class="bet-details-row">
                <div class="description"> Win {{ auth()->user()->getCurrency() }} </div>
                <div class="value">{{ number_format($win_amount, 2) }}</div>
            </div>
        </div>
        <div class="column top-bet-details">
            <div class="bet-details-row">
                <div class="description"> Result </div>
                <div class="value" style="color: rgb(192, 23, 180);"> {{ number_format($win_amount / $bet_amount, 2) }} x </div>
            </div>
            <div class="bet-details-row">
                <div class="description"> Round max. </div>
                <div class="value" style="color: rgb(192, 23, 180);"> {{ number_format($bot->monthly_max, 2) }}x </div>
            </div>
        </div>
    </div>
</div>
@endforeach