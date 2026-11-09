@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

        <div class="card p-4 rounded">
            <p class="text-sm text-gray-400">Total Users</p>
            <h3 class="text-2xl font-bold">12,430</h3>
            <p class="text-green-400 text-xs">+12% today</p>
        </div>

        <div class="card p-4 rounded">
            <p class="text-sm text-gray-400">Total Bets</p>
            <h3 class="text-2xl font-bold">৳ 3.2M</h3>
            <p class="text-red-400 text-xs">-2% loss</p>
        </div>

        <div class="card p-4 rounded">
            <p class="text-sm text-gray-400">Revenue</p>
            <h3 class="text-2xl font-bold">৳ 980K</h3>
            <p class="text-green-400 text-xs">+8% growth</p>
        </div>

        <div class="card p-4 rounded">
            <p class="text-sm text-gray-400">Active Games</p>
            <h3 class="text-2xl font-bold">7</h3>
            <p class="text-blue-400 text-xs">Live now</p>
        </div>
    </div>


@endsection

@section('js')
<script>
const sidebar = document.getElementById("sidebar");
const overlay = document.getElementById("overlay");

function toggleSidebar() {
    const isHidden = sidebar.classList.contains("-translate-x-full");

    if (isHidden) {
        sidebar.classList.remove("-translate-x-full");
        overlay.classList.remove("hidden");
    } else {
        sidebar.classList.add("-translate-x-full");
        overlay.classList.add("hidden");
    }
}
</script>
@endsection