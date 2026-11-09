@extends('layouts.app')



@section('content')

<div class="container mx-auto py-4">
    <div class="banner">
        <h1 class="text-4xl font-bold text-yellow-400 mb-3">Welcome to CasinoPro</h1>
        <p class="text-gray-400 text-lg mb-6">Your ultimate destination for thrilling online casino games. Experience the excitement of slots, baccarat, roulette and live casino action with real-time winnings and instant payouts.</p>
        <a href="/register" class="bg-yellow-400 text-black px-6 py-3 rounded-lg font-bold">
            Get Started
        </a>
    </div>

    <div class="feature-cards overflow-hidden mt-10">
        <div class="section-header">
            <h2 class="section-title"> Recenly Play </h2>
            <div class="section-btns">
                <a class="btn all-btn">
                    View All
                </a>

                <button class="btn left carosul-btn" data-carousel=".recenly-play">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>

                <button class="btn right carosul-btn" data-carousel=".recenly-play">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
        
        
        <div class="owl-carousel owl-theme custom-carousel recenly-play">
            <div class="item">
                <div class="relative group overflow-hidden">
                    <img src="https://placehold.co/300x300"
                        class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

                    <!-- Favorite -->
                    <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                        <i class="fa-solid fa-heart"></i>
                    </button>

                    <!-- Provider -->
                    <div class="absolute top-3 left-3 bg-yellow-400 text-black px-2 py-1 rounded-lg text-xs font-bold">
                        PG
                    </div>
                </div>
            </div>

                     <div class="item">
                <div class="relative group overflow-hidden">
                    <img src="https://placehold.co/300x300"
                        class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

                    <!-- Favorite -->
                    <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                        <i class="fa-solid fa-heart"></i>
                    </button>

                    <!-- Provider -->
                    <div class="absolute top-3 left-3 bg-yellow-400 text-black px-2 py-1 rounded-lg text-xs font-bold">
                        PG
                    </div>
                </div>
            </div>


                     <div class="item">
                <div class="relative group overflow-hidden">
                    <img src="https://placehold.co/300x300"
                        class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

                    <!-- Favorite -->
                    <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                        <i class="fa-solid fa-heart"></i>
                    </button>

                    <!-- Provider -->
                    <div class="absolute top-3 left-3 bg-yellow-400 text-black px-2 py-1 rounded-lg text-xs font-bold">
                        PG
                    </div>
                </div>
            </div>


                     <div class="item">
                <div class="relative group overflow-hidden rounded-2xl">
                    <img src="https://placehold.co/300x300"
                        class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

                    <!-- Favorite -->
                    <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                        <i class="fa-solid fa-heart"></i>
                    </button>

                    <!-- Provider -->
                    <div class="absolute top-3 left-3 bg-yellow-400 text-black px-2 py-1 rounded-lg text-xs font-bold">
                        PG
                    </div>
                </div>
            </div>


            <div class="item">
                <div class="relative group overflow-hidden rounded-2xl">
                    <img src="https://placehold.co/300x300"
                        class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

                    <!-- Favorite -->
                    <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                        <i class="fa-solid fa-heart"></i>
                    </button>

                    <!-- Provider -->
                    <div class="absolute top-3 left-3 bg-yellow-400 text-black px-2 py-1 rounded-lg text-xs font-bold">
                        PG
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="deposit-section mt-10 ounded-xl" >

    <div class="flex items-center justify-between gap-4">

        <!-- Left buttons -->
        <div class="flex items-center gap-3">

            <button
                class="px-3 py-2 rounded-lg font-semibold flex items-center gap-2 hover:opacity-90 transition"
                style="background: var(--success); color: white;">
                
                <i class="fa-solid fa-circle-plus"></i>
            </button>

            <a href="#"
                class="px-3 py-2 rounded-lg font-semibold flex items-center gap-2 hover:opacity-90 transition"
                style="background: var(--danger); color: white;">

                <i class="fa-solid fa-money-bill-transfer"></i>
            </a>

        </div>

        <!-- Right search -->
        <div class="flex items-center gap-2 w-full md:w-auto">

            <input 
                type="text"
                placeholder="Search transactions..."
                class="w-full md:w-64 px-4 py-2 rounded-lg outline-none"
                style="
                    background: var(--bg-dark);
                    border: 1px solid #2a3550;
                    color: var(--text);
                "
            >
        </div>
    </div> 

    <div class="category-section">
        <div class="flex gap-4 overflow-x-auto hide-scrollbar">
            <button class="category">
                <div class="">
                    <i class="fa-solid fa-fire"></i>
                </div>
                <span class="title"> Popular </span>
            </button>

            <button class="category">
                <div class="">
                    <i class="fa-solid fa-dice"></i>
                </div>
                <span class="title"> Slot </span>
            </button>

            <button class="category">
                <div class="">
                    <i class="fa-solid fa-fish"></i>
                </div>
                <span class="title"> Live </span>
            </button>
        </div>

    <!-- Section Header -->
    <div class="flex justify-between items-center mt-6 mb-4">
        <h2 class="text-xl lg:3xl font-semibold text-white">
            Popular Games
        </h2>

        <div class="flex gap-2">
            <button class="bg-card text-white px-5 py-2 rounded-xl font-semibold">
                All Games
            </button>

            <button class="w-12 h-12 bg-card rounded-xl text-white">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <button class="w-12 h-12 bg-card rounded-xl text-white">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>

    <!-- Game Grid -->
    <div class="grid grid-cols-3 md:grid-cols-5 lg:grid-cols-6 xl:grid-cols-8 gap-2">

        <!-- Card -->
        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <!-- Favorite -->
            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </button>

            <!-- Provider -->
            <div class="absolute top-3 left-3 bg-yellow-400 text-black px-2 py-1 rounded-lg text-xs font-bold">
                PG
            </div>
        </div>

        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300/5B21B6/FFF"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <div class="absolute top-3 left-3 bg-yellow-400 text-black px-2 py-1 rounded-lg text-xs font-bold">
                JIli
            </div>
        </div>

        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300/111/FFF"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </button>
        </div>

        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300/FBBF24/000"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </button>
        </div>

        <!-- Card -->
        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <!-- Favorite -->
            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </button>

            <!-- Provider -->
            <div class="absolute top-3 left-3 bg-yellow-400 text-black px-2 py-1 rounded-lg text-xs font-bold">
                PG
            </div>
        </div>

        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300/5B21B6/FFF"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </button>
        </div>

        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300/111/FFF"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </button>
        </div>

        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300/FBBF24/000"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </button>
        </div>

            <!-- Card -->
            <div class="relative group overflow-hidden rounded-2xl">
                <img src="https://placehold.co/300x300"
                    class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

                <!-- Favorite -->
                <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                    <i class="fa-solid fa-heart"></i>
                </button>

                <!-- Provider -->
                <div class="absolute top-3 left-3 bg-yellow-400 text-black px-2 py-1 rounded-lg text-xs font-bold">
                    PG
                </div>
            </div>

        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300/5B21B6/FFF"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </button>
        </div>

        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300/111/FFF"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </button>
        </div>

        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300/FBBF24/000"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </button>
        </div>

        <!-- Card -->
        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <!-- Favorite -->
            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </button>

            <!-- Provider -->
            <div class="absolute top-3 left-3 bg-yellow-400 text-black px-2 py-1 rounded-lg text-xs font-bold">
                PG
            </div>
        </div>

        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300/5B21B6/FFF"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </button>
        </div>

        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300/111/FFF"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </button>
        </div>

        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300/FBBF24/000"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </button>
        </div>

        <!-- Card -->
        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <!-- Favorite -->
            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </button>

            <!-- Provider -->
            <div class="absolute top-3 left-3 bg-yellow-400 text-black px-2 py-1 rounded-lg text-xs font-bold">
                PG
            </div>
        </div>

        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300/5B21B6/FFF"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </button>
        </div>

        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300/111/FFF"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </button>
        </div>

        <div class="relative group overflow-hidden rounded-2xl">
            <img src="https://placehold.co/300x300/FBBF24/000"
                 class="w-full w-full h-auto object-cover transition duration-300 group-hover:scale-105">

            <button class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/20 backdrop-blur flex items-center justify-center text-white">
                <i class="fa-solid fa-heart"></i>
            </button>
        </div>

    </div>

</div>

<div class="owl-carousel owl-theme">
  <div> Your Content </div>
  <div> Your Content </div>
  <div> Your Content </div>
  <div> Your Content </div>
  <div> Your Content </div>
  <div> Your Content </div>
  <div> Your Content </div>
</div>
</div>


</div>
@endsection 

@section('js')

<script>
$(document).ready(function(){
    $('.recenly-play').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoplay:true,
        autoplayTimeout:1000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:3
            },
            600:{
                items:3
            },
            700:{
                items:4
            },
            1000:{
                items:5
            },
            1400:{
                items:8
            }
        }
    })

    $(document).on('click','.carosul-btn.left',function () {
       let carousel = $(this).data('carousel');
        $(carousel).trigger('prev.owl.carousel');
    });

    $(document).on('click','.carosul-btn.right',function () {
        let carousel = $(this).data('carousel');
        $(carousel).trigger('next.owl.carousel');
    });

});
</script>

@endsection 