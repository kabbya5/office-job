const axios = require('axios');

class Engine{
    constructor(io, roomName){
        this.io = io;
        this.roomName = roomName;
        this.baseUrl = 'http://127.0.0.1:8000/';

        this.roundId = null;

        this.betTime = 10;
        this.timeLeft = this.betTime;
        this.betTimer = null;
        this.gameTimer = null;

        this.newRoundTime = 5;
        this.newRoundTimer = null;

        this.card_image = null;
        this.joker_card_id = null;

        this.cards = null;

        this.position = 0;
        this.side = null;

        this.showCards = [];
    }

    async generateResult(retry = 0){
        try{
            const response = await axios.get(this.baseUrl + 'andar/bahar/generate/result',{
                params:{
                    round_id:this.roundId,
                }
            });

            const results = response.data;

             this.io.to(this.roomName).emit('game:result', {
                results:results,
                side:this.side,
                position:this.position,
            });

            // Start the next round after another 1 second
            setTimeout(() => this.newRoundCountdown(), 5000);

        }catch (err) {
            if (retry >= 5) return;

            setTimeout(() => {
                this.generateResult(retry + 1);
            }, 300);
        }
        
    }

    startGame(){
        if(this.gameTimer){
            clearInterval(this.gameTimer);
            this.gameTimer = null;
        }

        let cardIndex = 0;

        this.gameTimer = setInterval(() => {

            const current = this.cards[cardIndex];

            if(!current){
                clearInterval(this.gameTimer);
                this.gameTimer = null;
                this.newRoundCountdown();
                return;
            }

            this.io.to(this.roomName).emit('card:dealt', {
                roundId: this.roundId,
                side: current.side,
                card: current.card,
                suit: current.suit,
                card_image: current.card_image,
                showCards:this.showCards,
                joker_card:this.card_image,
            });

            this.showCards.push({
                card_image: current.card_image,
                side: current.side,
            });

            // Winning card: stop and announce the result
            if (current.matched) {
                clearInterval(this.gameTimer);
                this.gameTimer = null;

                this.position = current.position;
                this.side = current.side;

                setTimeout(() => {
                    this.generateResult();
                }, 2000);

                return;
            }

            cardIndex++;
        }, 3000);
    }


    async dealCards(retry = 0){
        try{
            const response = await axios.get(this.baseUrl + 'andar/bahar/deal/card',{
                params:{
                    round_id:this.roundId,
                }
            });

            this.cards = response.data;

            setTimeout(() => {
                this.startGame();
            }, 200);

        }catch (err) {
            console.log(err);
            if (retry >= 5) return;

            setTimeout(() => {
                this.dealCards(retry + 1);
            }, 200);
        }
    }

    async generateCard(retry = 0){
        try{
            const response = await axios.get(this.baseUrl + 'andar/bahar/generate/card',{
                params:{
                    round_id:this.roundId,
                }
            });

            this.cards = response.data;

            setTimeout(() => {
                this.dealCards();
            }, 200);

        }catch (err) {
            if (retry >= 5) return;

            setTimeout(() => {
                this.generateCard(retry + 1);
            }, 200);
        }
    }

    startBetting(){
        this.timeLeft = this.betTime;

        this.betTimer = setInterval(() => {
            this.io.to(this.roomName).emit('betting:timer',{
                time:this.timeLeft,
            })

            if (this.timeLeft <= 0) {
                clearInterval(this.betTimer);

                // Close betting
                this.io.to(this.roomName).emit("bet:close");

                // Start crash point retrieval
                setTimeout(() => {
                    this.generateCard();
                },200); 
            }
            this.timeLeft--;
        },1000)
    }

    async storeRound(retry = 0) {
        try {
            const response = await axios.get(this.baseUrl + 'andar/bahar/store/round');
            this.roundId = response.data.id; 
            this.card_image = this.baseUrl + response.data.card_image;
            this.joker_card_id = response.data.joker_card_id;  
            
            this.io.to(this.roomName).emit('bet:new', {
                round_id:this.roundId,
                card_image:this.card_image,

            });

            if (this.roundId) {
                this.startBetting();
            }
        } catch (err) {
            if (retry >= 5) return;

            setTimeout(() => {
                this.storeRound(retry + 1);
            }, 2000);
        }
    }

    newRoundCountdown() {
        this.timeLeft = this.newRoundTime;

        this.showCards = [];

        this.newRoundTimer = setInterval(() => {

            if (this.timeLeft <= 0) {
                clearInterval(this.newRoundTimer);
                this.storeRound();
            }

            this.io.to(this.roomName).emit('new:round:timer', {
                time: this.timeLeft,
            });

            this.timeLeft--;
        }, 1000);
    }

    start() {
        this.newRoundCountdown();
    }
}

module.exports = Engine;