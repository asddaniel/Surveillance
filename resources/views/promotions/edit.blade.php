@extends('layouts.wrapper')

@section('content')

<form method="POST" action="{{ route('promotion.update', $promotion->id) }}" class="rounded-lg p-3 shadow-xl">
    @csrf
    @method("PUT")
    <div class="py-3 flex flex-col gap-4">
        <label for="name" class="text-lg font-bold">Nom</label>
        <input type="text" value="{{ $promotion->name }}" class="rounded-lg p-3 px-2" name="name">
    </div>
    <div class="py-3">
        <button class="px-2 p-3 font-bold text-white rounded bg-blue-600">Enregistrer</button>
    </div>
</form>

@endsection