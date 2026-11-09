@extends('layouts.admin')
@section('content')

<div class="page-header">
    <p class="page-title"> Categories </p>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i> Create
    </a>
</div>

<div class="overflow-x-auto primary-border">
    <table class="w-full text-sm text-left text-slate-300">
        <thead class="bg-slate-800 text-slate-200 uppercase text-xs">
            <tr>
                <th class="px-6 py-4">#</th>
                <th class="px-6 py-4"> Name </th>
                <th class="px-6 py-4"> Slug </th>
                <th class="px-6 py-4"> Icon  </th>
                <th class="px-6 py-4"> Action </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $country)
                <tr class="primary-border hover:bg-slate-800/50 transition">
                    <td class="px-6 py-4">{{ $country->id }}</td>
                    <td class="px-6 py-4">{{ $country->name }}</td>
                    <td class="px-6 py-4">{{ $country->slug }}</td>
                    <td class="px-6 py-4">
                        <i class="{{ $country->image_path }} text-primary"></i>
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