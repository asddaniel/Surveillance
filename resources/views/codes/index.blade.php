@extends('layouts.wrapper')
@section('content')

<section>
    <!-- Container -->
    <div class="flex items-center justify-center min-h-screen p-5">
      <div class="w-full overflow-x-auto border border-gray-400 rounded-lg max-w-7xl">


        <div class="py-5">
            <form method="POST" action="{{ route('code.store') }}" class="p-3 rounded-lg shadow-xl">
                @csrf
                <div class="flex flex-col gap-4 py-3">
                    <label for="name" class="text-lg font-bold">Code de l'emplacement</label>
                    <div class="flex gap-2">
                        <input type="text" id="code-input" class="p-3 px-2 rounded-lg" name="value">
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
        <!-- Table -->
        <table class="w-full text-left">
          <!-- Header -->
          <thead class="bg-gray-100 rounded-lg">
            <tr>
              <th class="p-4 w-[20%]">
                <div class="flex items-center w-full text-2xl font-bold">
                  Codes
                </div>
              </th>
              <th class="px-4 py-3 w-[15%]"></th>
              <th class="px-4 py-3 w-[18%]"></th>
              <th class="px-4 py-3 w-[15%]"></th>
              <th class="px-4 py-3 w-[10%]">
                <button class="px-5 py-2 text-base font-normal text-white bg-black rounded-md">
                  Ajouter
                </button>
              </th>
            </tr>
          </thead>
          <thead class="font-bold bg-gray-100 border-t border-gray-400">
            <tr class="w-full">
              <th class="px-4 py-3 w-[20%]">
                <div class="flex items-center w-full gap-2">

                 Value
                  <span>
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7 0.75V13.25M7 13.25L12.625 7.625M7 13.25L1.375 7.625" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </span>
                </div>
              </th>
              <th class="px-4 py-3 w-[15%]">Surveillance</th>
              <th class="px-4 py-3 w-[18%]">Actions</th>
              <th class="px-4 py-3 "></th>

            </tr>
          </thead>

          <!-- Body -->
          <tbody>
            @foreach ($codes as $code)


            <tr class="border-t border-gray-400">
              <td class="px-4 py-3  w-[20%]">
                <div class="flex items-center w-full space-x-2">

                  <div class="w-8 h-8 bg-gray-200 rounded-full"></div>
                  <span>{{ $code->value }}</span>
                </div>
              </td>
              <td class="px-4 py-3 w-[24%]">
                <span class="px-3 py-3 bg-gray-200 rounded-md">
                  {{ $code->surveillance->name }}
                </span>
              </td>

              <td class="flex px-4 py-3">
                <div class="flex items-center w-full gap-2">

                  <a href="{{ route('code.edit', $code->id) }}" class="-ml-0.5 bg-gray-400 border px-3 p-2 font-semibold flex items-center justify-center rounded-xl  ">
                    Edit
                  </a>
                  <a href="{{ route('code.delete', $code->id) }}" class="-ml-0.5 bg-red-500 border px-3 p-2 font-semibold flex items-center justify-center rounded-xl  ">
                    supprimer
                  </a>
                </div>
              </td>


            </tr>
            @endforeach

          </tbody>
        </table>
        <div class="w-full min-w-[720px]">
          <div class="flex items-center justify-between w-full p-4 border-t border-gray-400">

          </div>
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
