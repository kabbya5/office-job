$(document).ready(function () {
   let soundEnabled = true;

    function toggleSound() {
        soundEnabled = !soundEnabled;

        $('#soundIcon').html(
            soundEnabled
                ? `<path d="M11 5L6 9H3V15H6L11 19Z"/>
                <path d="M15 9A5 5 0 0 1 15 15"/>
                <path d="M18 5A9 9 0 0 1 18 19"/>`
                : `<path d="M11 5L6 9H3V15H6L11 19Z"/>
                <path d="M16 9L22 15"/>
                <path d="M22 9L16 15"/>`
        );
    }

    $(document).on('click', '#soundBtn', function(){
        toggleSound();
    });
   
   
    // showchips 
    $('.bet-chip').click(function () {
        if ($('.chips').is(':visible')) {
            $('.chips').hide();
        } else {
            $('.chips').css('display', 'flex');
        }
    });
    //select chips 
    $('.chips .chip').click(function () {
        var chipValue = $(this).data('value');
        var chipColor = $(this).data('color');
        $('.bet-chip').removeClass('red blue green purple gold pink');
        $('.bet-chip').addClass(chipColor);
        $('.bet-chip').text(chipValue);
        $('.chips').hide();
    });

    function storeBet(betType, user_id, chipValue, retry = 1){
        $.ajax({
            url:'/andar/bahar/bet',
            type:'post',
            data:{
                user_id:user_id,
                bet_type:betType,
                amount:chipValue,
                round_id:round_id,
            },

            success:function(res){
                var old_bet = parseInt($('#my_bet').text());
                var new_amount = parseInt(res.amount);
                $('#my_bet').text(new_amount+old_bet);
            },
            error:function(err){
                if(retry > 3){
                    return;
                }
                storeBet(betType, user_id, chipValue, retry + 1);
            }
        });
    }

    function insertChips(value = 10){
        var chips = {
            1:'pink',
            10:'gold',
            50:'red',
            100:'blue',
            500:'green',
            1000:'purple'
        }

        const color = chips[value];

        return '<div class="chip ' + color + '"> ' + value + '</div>';
    }

    $(document).on('click', '.bet-btn', function () {

        if(!betStatus) return;

        const $target = $(this);
        const betType = $target.data('bet');
        const $selectedChip = $('.bet-select .bet-chip.selected').first();
        
        if (!$selectedChip.length) {
            return;
        }

        var chipValue =  parseInt($selectedChip.text());
        
        // store bet 
        storeBet(betType, user_id, chipValue);

        const start = $selectedChip.offset();
        const target = $target.offset();

        const chipWidth = $selectedChip.outerWidth();
        const chipHeight = $selectedChip.outerHeight();

        const endLeft = target.left + ($target.outerWidth() / 2) - (chipWidth / 2);
        const endTop = target.top + ($target.outerHeight() / 2) - (chipHeight / 2);

        const $chip = $selectedChip.clone()
            .removeClass('selected')
            .addClass('flying-chip')
            .appendTo('body');

        $chip.css({
            position: 'absolute',
            zIndex: 99999,
            left: start.left,
            top: start.top,
            width: chipWidth,
            height: chipHeight,
            margin: 0
        });

        $chip.animate({
            left: endLeft,
            top: endTop
        }, 500, function () {

            // Append to the actual target zone
            $chip.detach().removeClass('flying-chip');

            $chip.css({
                position: 'absolute',
                left: '50%',
                top: '50%',
                transform: 'translate(-50%, -50%)',
                margin: 0
            });

            var $betChip = insertChips(chipValue);
            const maxChips = $target.find('.bet-detail').data('target');

            if($target.find('.bet-detail .chip').length >= maxChips){
                $target.find('.bet-detail .chip').first().remove();
            }

            $target.find('.bet-detail').append($betChip);
        });
    });

    $(document).on('click', '.cancle-bet', function () {
        $.ajax({
            url:'/andar/bahar/bet/cancel',
            type:'post',
            data:{
                user_id:user_id,
                round_id:round_id,
            },
            success:function(res){
                $(`#${res.bet_side}`).empty();
                $.each(res.other_bets, function(index, bet) {
                    const $betContainer = $(`#${res.bet_side}`);
                    const maxChips = parseInt($betContainer.data('target'), 10);

                    const $betChip = insertChips(parseInt(bet.amount));

                    if ($betContainer.find('.chip').length >= maxChips) {
                        $betContainer.find('.chip').first().remove();
                    }

                    $betContainer.append($betChip);
                });

                var old_bet = parseInt($('#my_bet').text());
                var new_amount = parseInt(res.amount);
                $('#my_bet').text(old_bet - new_amount);
            }
        });
    });
});