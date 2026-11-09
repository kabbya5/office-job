<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Casino Pro</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#0b0f1a] text-white">



<!-- HERO SECTION -->
<section class="text-center py-24 px-6">
    <h2 class="text-5xl md:text-6xl font-bold">
        Win Big in the <span class="text-yellow-400">Ultimate Casino</span>
    </h2>

    <p class="text-gray-400 mt-5 max-w-2xl mx-auto">
        Experience next-level gaming with slots, baccarat, roulette and live casino action. Real-time winnings & instant payouts.
    </p>

    <div class="mt-8 space-x-4">
        <a href="/register" class="bg-yellow-400 text-black px-6 py-3 rounded-lg font-bold">
            Get Started
        </a>

        <a href="#games" class="border border-yellow-400 px-6 py-3 rounded-lg">
            View Games
        </a>
    </div>
</section>

<!-- STATS -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-10 text-center">
    <div class="bg-[#141b2d] p-6 rounded-xl border border-yellow-500/20">
        <h3 class="text-3xl text-yellow-400 font-bold">10,000+</h3>
        <p class="text-gray-400">Active Players</p>
    </div>

    <div class="bg-[#141b2d] p-6 rounded-xl border border-yellow-500/20">
        <h3 class="text-3xl text-yellow-400 font-bold">$5M+</h3>
        <p class="text-gray-400">Daily Payouts</p>
    </div>

    <div class="bg-[#141b2d] p-6 rounded-xl border border-yellow-500/20">
        <h3 class="text-3xl text-yellow-400 font-bold">24/7</h3>
        <p class="text-gray-400">Support</p>
    </div>
</section>

<!-- GAMES SECTION -->
<section id="games" class="py-20 px-10">
    <h2 class="text-3xl font-bold text-center mb-10 text-yellow-400">
        Popular Games
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-[#141b2d] p-5 rounded-xl hover:scale-105 transition">
            <h3 class="text-xl font-bold">🎰 Slots</h3>
            <p class="text-gray-400 mt-2">Spin & win massive jackpots</p>
        </div>

        <div class="bg-[#141b2d] p-5 rounded-xl hover:scale-105 transition">
            <h3 class="text-xl font-bold">🃏 Baccarat</h3>
            <p class="text-gray-400 mt-2">Classic casino card game</p>
        </div>

        <div class="bg-[#141b2d] p-5 rounded-xl hover:scale-105 transition">
            <h3 class="text-xl font-bold">🎡 Roulette</h3>
            <p class="text-gray-400 mt-2">Spin the wheel & win</p>
        </div>

    </div>
</section>

<!-- CTA SECTION -->
<section class="text-center py-20 bg-gradient-to-r from-yellow-500/10 to-transparent">
    <h2 class="text-4xl font-bold">
        Ready to Play & Win?
    </h2>

    <p class="text-gray-400 mt-3">
        Join thousands of players and start your journey today.
    </p>

    <a href="/register" class="mt-6 inline-block bg-yellow-400 text-black px-8 py-3 rounded-lg font-bold">
        Create Account
    </a>
</section>

<!-- FOOTER -->
<footer class="text-center py-8 border-t border-yellow-500/20 text-gray-500">
    © {{ date('Y') }} CasinoPro. All rights reserved.
</footer>

</body>
</html>