@extends('layouts.wrapper')
@section('content')

<section>
    <!-- Container -->
    <div class="flex items-center justify-center min-h-screen p-5">
      <div class="w-full overflow-x-auto border border-gray-400 rounded-lg max-w-7xl">


        <div class="py-5">
            <form method="POST" action="{{ route('code.update', $code->id) }}" class="p-3 rounded-lg shadow-xl">
                @csrf
                @method("PUT")
                <div class="flex flex-col gap-4 py-3">
                    <label for="name" class="text-lg font-bold">Code de l'emplacement</label>
                    <div class="flex gap-2">
                        <input type="text" value="{{ $code->value }}" id="code-input" class="p-3 px-2 rounded-lg" name="value">
                        <button type="button" onclick="generateRandomCode()" class="p-2 px-4 font-bold text-white bg-green-600 rounded hover:bg-green-700">
                            Générer
                        </button>
                    </div>
                </div>
                <div class="flex flex-col gap-3 py-3">
                    <label for="name" class="text-lg font-bold">Surveillance</label>
        <select name="surveillance_id" id="" class="p-3 px-2 rounded-lg">
            <option value="" class="p-3 px-2 rounded-lg">selectionner une Surveillance</option>
            @foreach ($surveillances as $survey)
            <option value="{{ $survey->id }}" class="p-3 px-2 rounded-lg">{{ $survey->name }}</option>
            @endforeach

        </select>
                </div>
                <div class="py-3">
                    <button class="p-3 px-2 font-bold text-white bg-blue-600 rounded">Enregistrer</button>
                </div>
            </form>
        </div>


      </div>
    </div>
  </section>

  <script>
    function generateRandomCode() {
        // Longueur du code
        const length = 8;
        // Caractères possibles
        const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let result = '';

        // Générer le code aléatoire
        for (let i = 0; i < length; i++) {
            result += chars.charAt(Math.floor(Math.random() * chars.length));
        }

        // Insérer le code dans l'input
        document.getElementById('code-input').value = result;
    }

    // Optionnel: Générer un code automatiquement au chargement de la page
    // window.onload = generateRandomCode;
  </script>

@endsection
