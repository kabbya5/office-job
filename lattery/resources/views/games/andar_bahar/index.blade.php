<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('andar_bahar/css/main.css') }}">
</head>

<body>
    <div class="andar_bahar">
        <div class="header">
            <a href="/" class="nav-item active">
                <svg viewBox="0 0 24 24">
                    <path d="M3 10L12 3L21 10V21H3Z"/>
                    <path d="M9 21V14H15V21"/>
                </svg>
            </a>

            <a href="/history" class="nav-item">
                <svg viewBox="0 0 24 24">
                    <path d="M3 12A9 9 0 1 0 6 5"/>
                    <path d="M3 3V9H9"/>
                    <path d="M12 7V12L16 14"/>
                </svg>
            </a>

            <button class="sound-btn nav-item" id="soundBtn">
                <svg id="soundIcon" viewBox="0 0 24 24">
                    <path d="M11 5L6 9H3V15H6L11 19Z"/>
                    <path d="M15 9A5 5 0 0 1 15 15"/>
                    <path d="M18 5A9 9 0 0 1 18 19"/>
                </svg>
            </button>

            <div class="balance nav-item">
                <span> {{$currency}} </span> 5,000.00
            </div>

        </div>

        <div class="history-section">
            <div class="top-history">
                <div class="flex history-content">
                    <div class="card-history flex" style="text-transform: capitalize">
                        @foreach ($rounds as $key => $bet_round)
                            <div class="card-box {{$bet_round->winning_side}}">
                                {{ $bet_round->card->name}}
                            </div>
                            @if($key == 10)
                                @break
                            @endif
                        @endforeach
                    </div>

                    <div class="history-percentage">
                        <div class="andar-percentage flex">
                            <div class="percentage-value"> Andar </div>
                            <div class="percentage">46%</div>
                        </div>
                        <div class="bahar-percentage flex">
                            <div class="percentage-value"> Bahar </div>
                            <div class="percentage">54%</div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <main class="scene">
            <section class="table" aria-label="Andar Bahar casino table">
                <div class="felt-content">
                    <div class="brand">
                        <span class="crown">♛</span>♠ &nbsp; ANDAR BAHAR &nbsp; ♠
                    </div>
                    <div class="play-row">
                        <div class="zone andar pointer bet-btn" data-bet="andar">
                            <div class="bet-detail" data-target="16" id="andar">
                                @isset($bets['andar'])
                                    @foreach($bets['andar'] as $key => $bet)
                                        @break($key >= 16)
                                        <div class="chip {{ $bet[1] }}">
                                            {{ $bet[0] }}
                                        </div>
                                    @endforeach
                                @endisset
                            </div>
                            <strong>ANDAR</strong>
                            <span>1:2</span>
                            <div class="dealt-cards"></div>
                        </div>
                        <div class="center">
                            <span class="bet-timer"> </span>
                            <div class="cards">
                                <div class="card">
                                    <img class="joker_card" data-img="{{asset('andar_bahar/img/card/back_card1.png')}}" src="{{asset('andar_bahar/img/card/back_card1.png')}}" alt="" style="width:100%;height:100%;">
                                </div>
                            </div>

                            <div class="cards deal-card">
                                <div class="card">
                                    <img class="deal-card-img" src="{{asset('andar_bahar/img/card/back_card1.png')}}" alt="" style="width:100%;height:100%;">
                                </div>
                            </div>
                        </div>
                        <div class="zone bahar pointer bet-btn" data-bet="bahar">
                            <div class="bet-detail"  data-target="16" id="bahar">
                                 @isset($bets['bahar'])
                                    @foreach($bets['bahar'] as $key => $bet)
                                        @break($key >= 16)
                                        <div class="chip {{ $bet[1] }}">
                                            {{ $bet[0] }}
                                        </div>
                                    @endforeach
                                @endisset
                            </div>
                            <strong>BAHAR</strong>
                            <span>1:2</span>
                            <div class="dealt-cards">
                                
                            </div>
                        </div>
                    </div>
                    
                    <table class="bet-section">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="bet-box pointer bet-btn" data-bet="1-5">
                                        <div class="bet-detail" data-target="4" id="1-5">
                                            @isset($bets['1-5'])
                                                @foreach($bets['1-5'] as $key => $bet)
                                                    <div class="chip {{ $bet[1] }}">
                                                        {{ $bet[0] }}
                                                    </div>
                                                    @break($key >= 3)
                                                @endforeach
                                            @endisset
                                        </div>
                                        <span> 1-5x3.5</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="bet-box pointer bet-btn" data-bet="6-10">
                                        <div class="bet-detail" data-target="4" id="6-10">
                                            @isset($bets['6-10'])
                                                @foreach($bets['6-10'] as $key => $bet)
                                                    <div class="chip {{ $bet[1] }}">
                                                        {{ $bet[0] }}
                                                    </div>
                                                    @break($key >= 3)
                                                @endforeach
                                            @endisset
                                        </div>
                                        <span> 6-10x4.5</span>
                                    </div>
                                </td>
                                 <td>
                                    <div class="bet-box pointer bet-btn" data-bet="11-15">
                                        <div class="bet-detail" data-target="4" id="11-15">
                                            @isset($bets['11-15'])
                                                @foreach($bets['11-15'] as $key => $bet)
                                                    <div class="chip {{ $bet[1] }}">
                                                        {{ $bet[0] }}
                                                    </div>
                                                    @break($key >= 3)
                                                @endforeach
                                            @endisset
                                        </div>
                                        <span> 11-15x5.5</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <div class="bet-box pointer bet-btn" data-bet="16-20">
                                        <div class="bet-detail" data-target="4" id="16-20">
                                            @isset($bets['16-20'])
                                                @foreach($bets['16-20'] as $key => $bet)
                                                    <div class="chip {{ $bet[1] }}">
                                                        {{ $bet[0] }}
                                                    </div>
                                                    @break($key >= 3)
                                                @endforeach
                                            @endisset
                                        </div>
                                        <span> 16-20x7.5</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="bet-box pointer bet-btn" data-bet="21-25">
                                        <div class="bet-detail" data-target="4" id="21-25">
                                            @isset($bets['21-25'])
                                                @foreach($bets['21-25'] as $key => $bet)
                                                    <div class="chip {{ $bet[1] }}">
                                                        {{ $bet[0] }}
                                                    </div>
                                                    @break($key >= 3)
                                                @endforeach
                                            @endisset
                                        </div>
                                        <span> 21-25x8.5</span>
                                    </div>
                                </td>
                                 <td>
                                    <div class="bet-box pointer bet-btn" data-bet="26-30" id="26-30">
                                        <div class="bet-detail" data-target="4">
                                            @isset($bets['26-30'])
                                                @foreach($bets['26-30'] as $key => $bet)
                                                    <div class="chip {{ $bet[1] }}">
                                                        {{ $bet[0] }}
                                                    </div>
                                                    @break($key >= 3)
                                                @endforeach
                                            @endisset
                                        </div>
                                        <span> 26-30x15.5</span>
                                    </div>
                                </td>
                            </tr>
                                 <tr>
                                <td>
                                    <div class="bet-box pointer bet-btn" data-bet="31-35">
                                        <div class="bet-detail" data-target="4" id="31-35">
                                            @isset($bets['31-35'])
                                                @foreach($bets['31-35'] as $key => $bet)
                                                    <div class="chip {{ $bet[1] }}">
                                                        {{ $bet[0] }}
                                                    </div>
                                                    @break($key >= 3)
                                                @endforeach
                                            @endisset
                                        </div>
                                        <span> 31-35x25.5</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="bet-box pointer bet-btn" data-bet="36-40">
                                        <div class="bet-detail" data-target="4" id="36-40">
                                            @isset($bets['36-40'])
                                                @foreach($bets['36-40'] as $key => $bet)
                                                    <div class="chip {{ $bet[1] }}">
                                                        {{ $bet[0] }}
                                                    </div>
                                                    @break($key >= 3)
                                                @endforeach
                                            @endisset
                                        </div>
                                        <span> 36-40x50</span>
                                    </div>
                                </td>
                                 <td>
                                    <div class="bet-box pointer bet-btn" data-bet="41 or more">
                                        <div class="bet-detail" data-target="4" id="41-or-more">
                                            @isset($bets['41-or-more'])
                                                @foreach($bets['41-or-more'] as $key => $bet)
                                                    <div class="chip {{ $bet[1] }}">
                                                        {{ $bet[0] }}
                                                    </div>
                                                    @break($key >= 3)
                                                @endforeach
                                            @endisset
                                        </div>
                                        <span> 41 or morex120</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="bottom">
                        <div class="info">
                            <div class="coin">▤</div>
                            <div style="color:#fff;">
                                <small>Round:</small> <b id="round_id"> {{ $round->id }}</b>
                            </div>
                        </div>
                        <div class="bet-select">
                            <div class="bet-chip gold selected"> 10 </div>
                            <div class="chips">
                                <div class="chip pink" data-value="1" data-color="pink">1</div>
                                <div class="chip gold" data-value="10" data-color="gold">10</div>
                                <div class="chip red" data-value="50" data-color="red">50</div>
                                <div class="chip blue" data-value="100" data-color="blue">100</div>
                                <div class="chip green" data-value="500" data-color="green">500</div>
                                <div class="chip purple" data-value="1000" data-color="purple">1000</div>
                            </div>
                        </div>
                        
                        <div class="info" style="justify-self:end">
                            <div class="coin pointer cancle-bet" title="cancle last bet">⟲</div>
                            <div>
                                <small>My Bet:</small>
                                <b>{{$currency}} <span id="my_bet"> {{ $total_amount }} </span> </b> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <div class="history-section">
            <div class="result">
                <div class="result-andar"></div>

                <div class="result-bahar"></div>
            </div>
            <div class="history">
                <div class="flex color-history">
                    @foreach ($rounds as $key => $bet_round)
                        @if($bet_round->side == 'andar')
                            <div class="color-box andar"></div>
                        @else 
                            <div class="color-box bahar"></div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="bet-result-overlay" id="betResultModal">
            <div class="bet-result-modal">

                <div class="result-game">
                    <div class="result-game-header">
                        <h2 class="result-side">ANDAR</h2>
                        <span class="result-position">20</span>
                    </div>
                </div>

                <div class="result-amounts">

                    <div class="amount-box">
                        <span>BET AMOUNT</span>
                        <strong class="bet-amount">500</strong>
                    </div>

                    <div class="amount-box">
                        <span>WIN AMOUNT</span>
                        <strong class="win-amount">950</strong>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <script src="https://cdn.socket.io/4.8.1/socket.io.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{asset('andar_bahar/js/socket-script.js')}}"> </script>
    <script src="{{ asset('andar_bahar/js/index.js') }}"></script>
    
</body>

</html>
