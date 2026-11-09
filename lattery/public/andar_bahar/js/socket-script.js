var user_id = 1;
var round_id = $('#round_id').text();
const joker_card = $('.joker_card');
const bet_timer = $('.bet-timer');
var showJoker = true;
var betStatus = false;

const socket = io("http://localhost:3001", {
    path: "/socket"
});

// const socket = io('https://boomx.club', {
//     path: '/socket',
//     withCredentials: true
// });
    
socket.on("connect", () => {
    socket.emit("join:room", {
        roomKey: "andar_bahar",
        user_id: user_id,
    });
});

function checkBetStatus(canBet) {
    betStatus = canBet;
    if (canBet) {
        $('.bet-select').stop(true, true).fadeIn(400);
    } else {
        $('.bet-select').stop(true, true).fadeOut(300);
    }
}

socket.on('new:round:timer', (data) => {
    bet_timer.show();
    bet_timer.html(data.time + 's');
    if(data.time <= 0){
        bet_timer.hide();
    }

    $('.result-andar').empty();
    $('.result-bahar').empty();
    $('.dealt-cards').empty();
    $('.bet-detail').empty();
    checkBetStatus(false);
    $('#my_bet').text(0.00);
});

socket.on('bet:new', (data) => {
    round_id = data.round_id;
    $('#round_id').text(round_id);
    const joker_card_image = data.card_image;
    joker_card.attr('src', joker_card_image);
    checkBetStatus(true);
});

socket.on('betting:timer', (data) => {
    bet_timer.show();
    bet_timer.html(data.time + 's');

    if(data.time <= 0){
        bet_timer.hide();
    }
    checkBetStatus(true);
})

function dealCard(side, cardImage = null) {
    const $source = $('.deal-card-img');

    const $target = side === 'andar'
        ? $('.andar .dealt-cards')
        : $('.bahar .dealt-cards');

    const $result = side === 'andar'
        ? $('.result-andar')
        : $('.result-bahar');

    if (!$source.length || !$target.length) return;

    if ($target.children().length > 1) {
        $target.children().first().remove();
    }

    const backImage = '/andar_bahar/img/card/back_card1.png';
    const actualImage = cardImage || $source.attr('src');

    // Get starting position
    const start = $source[0].getBoundingClientRect();

    // Create flying card with BACK image first
    const $flyingCard = $('<div class="flying-card"></div>');

    const $img = $('<img>', {
        src: backImage,
        alt: ''
    });

    $flyingCard.append($img);

    $flyingCard.css({
        position: 'fixed',
        left: start.left,
        top: start.top
    });

    $('body').append($flyingCard);

    // Get destination
    const target = $target[0].getBoundingClientRect();

    const destinationX = side === 'andar'
        ? target.left + 50
        : target.right - 50;

    const destinationY = target.bottom - 75;

    // Animate the face-down card
    $flyingCard.animate({
        left: destinationX,
        top: destinationY
    }, {
        duration: 2000,
        easing: 'swing',

        // Show the real card 200ms before animation ends
        progress: function (animation, progress) {
            if (progress >= 0.5 && !$flyingCard.data('revealed')) {
                $flyingCard.data('revealed', true);
                $img.attr('src', actualImage);
            }
        },

        complete: function () {
            const $landedCard = $('<div class="dealt-card"></div>');

            $landedCard.append(
                $('<img>', {
                    src: actualImage,
                    alt: ''
                })
            );

            $target.append($landedCard);
            $flyingCard.remove();

            const imageExists = $result.find('img').filter(function () {
                return $(this).attr('src') === actualImage;
            }).length > 0;

            if (!imageExists) {
                const $resultCard = $('<div class="card-image"></div>');

                $resultCard.append(
                    $('<img>', {
                        src: actualImage,
                        alt: ''
                    })
                );

                $result.append($resultCard);
            }

            if($result.children().length > 10){
                $result.children().first().remove();
            }
        }
    });
}

function showOldCard(joker, cards){
    joker_card.attr('src', joker);
    cards.forEach((card, index) => {
        if(index > 20) return;

        const $side = card.side === 'andar' ? $('.result-andar') : $('.result-bahar');
        const $card = $('<div class="card-image"></div>');

            $card.append(
                $('<img>', {
                    src: card.card_image,
                    alt: ''
                })
            );

            $side.append($card);
    });
}

socket.on('card:dealt', (data) => {
    dealCard(data.side, data.card_image);

    canBet = false;

    if(showJoker){
        showOldCard(data.joker_card, data.showCards);
        showJoker = false;
    }

    checkBetStatus(false);
});

socket.on('game:result', (data) => {
    checkBetStatus(false);

    const results = data.results;

    Object.entries(results).forEach(([userId, bets]) => {
        if(user_id == userId){
            var total_bet = 0;
            var total_win = 0;
            Object.entries(bets).forEach(([side, bet]) => {
                total_bet += bet.amount;
                total_win += bet.win_amount;
            });

            $('.result-side').text(data.side);
            $('.result-position').text(data.position);
            $('.bet-amount').text(total_bet);
            $('.win-amount').text(total_win);
            $('#betResultModal').fadeIn(200).css('display', 'flex');

            setTimeout(() => {
                $('#betResultModal').fadeIn(500).css('display', 'none');
            }, 4000);
        }
    });
})



