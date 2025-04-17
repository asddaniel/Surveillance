@extends('layouts.wrapper')

@section('content')

<div class="py-5">
    <form method="POST" action="{{ route('student.update', $student->id) }}" class="rounded-lg p-3 shadow-xl">
        @csrf
        @method("PUT")
        <div class="py-3 flex flex-col gap-4">
            <label for="name" class="text-lg font-bold">Nom de l'etudiant</label>
            <input type="text" value="{{ $student->name }}" class="rounded-lg p-3 px-2" name="name">
        </div> 
        <div class="py-3 flex flex-col gap-3">
            <label for="name" class="text-lg font-bold">Promotion</label>
<select name="promotion_id" id="" class="rounded-lg p-3 px-2">
    <option value="" class="rounded-lg p-3 px-2">selectionner une promotion</option>
    @foreach ($promotions as $promotion)
    <option value="{{ $promotion->id }}" class="rounded-lg p-3 px-2">{{ $promotion->name }}</option>
    @endforeach
    
</select>
        </div>
        <div class="py-3">
            <button class="px-2 p-3 font-bold text-white rounded bg-blue-600">Enregistrer</button>
        </div>
    </form>
</div>

@endsection