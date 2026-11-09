@extends('layouts.admin')
@section('content')
<form action="{{route('admin.country.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
    @include('admin.country._form')

    <div class="flex mt-6">
        <button class="btn-primary"> Create </button>
    </div>
</form>
@endsection