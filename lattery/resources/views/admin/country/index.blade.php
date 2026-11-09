@extends('layouts.admin')
@section('content')

<div class="page-header">
    <p class="page-title"> Countries </p>
    <a href="{{ route('admin.country.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i> Create
    </a>
</div>

<div class="overflow-x-auto primary-border">
    <table class="w-full text-sm text-left text-slate-300">
        <thead class="bg-slate-800 text-slate-200 uppercase text-xs">
            <tr>
                <th class="px-6 py-4">#</th>
                <th class="px-6 py-4"> Name </th>
                <th class="px-6 py-4">Code</th>
                <th class="px-6 py-4"> Currency </th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4">  Rate </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($countries as $country)
                <tr class="primary-border hover:bg-slate-800/50 transition">
                    <td class="px-6 py-4">{{ $country->id }}</td>
                    <td class="px-6 py-4">{{ $country->name }}</td>
                    <td class="px-6 py-4">{{ $country->code }}</td>
                    <td class="px-6 py-4">{{ $country->currency }}</td>
                    <td class="px-6 py-4">
                        <span class="px-3 capitalize py-1 rounded-full text-xs font-medium  {{ $country->status === 'active' ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">
                            {{ $country->status }}
                        </span>
                    </td>
                    
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.country.edit', $country->id) }}" class="px-3 py-1 rounded-lg bg-amber-500 text-slate-900 font-medium hover:bg-amber-400">
                            Edit
                        </a>
                    </td>
                </tr>   
            @endforeach
        </tbody>
    </table>
</div>
@endsection