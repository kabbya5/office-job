@extends('layouts.admin')
@section('content')
<form action="{{route('admin.country.update', $country->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @include('admin.country._form')

    <div class="flex mt-6">
        <button class="btn-primary"> Update </button>
    </div>
</form>
@endsection