@extends('layouts.admin')
@section('content')

<div class="max-w-md">
<form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
    @include('admin.categories._form')

    <div class="flex mt-6">
        <button class="btn-primary"> Create </button>
    </div>
</form>
</div>
@endsection