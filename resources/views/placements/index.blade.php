@extends('layouts.wrapper')
@section('content')

<section>
    <!-- Container -->
    <div class="flex items-start justify-center min-h-screen p-5">
      <div class="w-full overflow-x-auto border border-gray-400 rounded-lg max-w-7xl">

        <div x-data="{ selectedTab: 'general' }" class="w-full">
            <div x-on:keydown.right.prevent="$focus.wrap().next()" x-on:keydown.left.prevent="$focus.wrap().previous()" class="flex gap-2 overflow-x-auto border-b border-outline dark:border-outline-dark" role="tablist" aria-label="tab options">
                <button x-on:click="selectedTab = 'general'" x-bind:aria-selected="selectedTab === 'general'" x-bind:tabindex="selectedTab === 'general' ? '0' : '-1'" x-bind:class="selectedTab === 'general' ? 'font-bold text-primary border-b-2 border-gray-900 dark:border-gray-700 dark:text-primary-dark' : 'text-on-surface font-medium dark:text-on-surface-dark dark:hover:border-b-outline-dark-strong dark:hover:text-on-surface-dark-strong hover:border-b-2 hover:border-b-outline-strong hover:text-on-surface-strong'" class="px-4 py-2 text-sm h-min" type="button" role="tab" aria-controls="tabpanelGenerique" >Générique</button>
                <button x-on:click="selectedTab = 'auto'" x-bind:aria-selected="selectedTab === 'auto'" x-bind:tabindex="selectedTab === 'auto' ? '0' : '-1'" x-bind:class="selectedTab === 'auto' ? 'font-bold text-primary border-b-2 border-gray-900 dark:border-gray-700 dark:text-primary-dark' : 'text-on-surface font-medium dark:text-on-surface-dark dark:hover:border-b-outline-dark-strong dark:hover:text-on-surface-dark-strong hover:border-b-2 hover:border-b-outline-strong hover:text-on-surface-strong'" class="px-4 py-2 text-sm h-min" type="button" role="tab" aria-controls="tabpanelAuto">Automatique</button>

            </div>
            <div class="px-2 py-4 text-on-surface dark:text-on-surface-dark">
                <div x-cloak x-show="selectedTab === 'general'" id="tabpanelGenerique" role="tabpanel" aria-label="general">

                    <div class="py-5">
                        <form method="POST" action="{{ route('placement.store') }}" class="p-3 rounded-lg shadow-xl">
                            @csrf

                            <div class="flex flex-col gap-2 py-3">
                                <label for="surveillance_id" class="text-xl font-bold">Surveillance</label>
                                <select name="surveillance_id" id="surveillance_id" class="p-3 px-2 rounded-lg">
                                    <option value="" class="p-3 px-2 rounded-lg">Sélectionner une Surveillance</option>
                                    @foreach ($surveillances as $survey)
                                    <option value="{{ $survey->id }}" class="p-3 px-2 rounded-lg">{{ $survey->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex flex-col gap-2 py-3">
                                <label for="students" class="text-xl font-bold">Etudiants</label>
                                <select name="student_id" id="students" class="p-3 px-2 rounded-lg">
                                    <option value="" class="p-3 px-2 rounded-lg">Sélectionner un étudiant</option>
                                    @foreach ($students as $student)
                                    <option value="{{ $student->id }}" class="p-3 px-2 rounded-lg">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex flex-col gap-2 py-3">
                                <label for="code_id" class="text-xl font-bold">Codes</label>
                                <select name="code_id" id="code_id" class="p-3 px-2 rounded-lg">
                                    <option value="" class="p-3 px-2 rounded-lg">Sélectionner un code</option>
                                    @foreach ($codes as $code)
                                    <option value="{{ $code->id }}" class="p-3 px-2 rounded-lg code-option" data-surveillance="{{ $code->surveillance_id }}">
                                        {{ $code->value }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="py-3">
                                <button class="p-3 px-2 font-bold text-white bg-blue-600 rounded">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div x-cloak x-show="selectedTab === 'auto'" id="tabpanelAuto" role="tabpanel" aria-label="auto">
                    <div class="py-5">
                        <form method="POST" action="{{ route('placement.autoplace', ) }}" class="p-3 rounded-lg shadow-xl">
                            @csrf

                            <div class="flex flex-col gap-2 py-3">
                                <label for="surveillance_id" class="text-xl font-bold">Promotions</label>
                                <select name="surveillance_id" id="surveillance_id" class="p-3 px-2 rounded-lg">
                                    <option value="" class="p-3 px-2 rounded-lg">Sélectionner une promotion</option>
                                        @foreach ($promotions as $promotion)
                                        <option value="{{ $promotion->id }}" class="p-3 px-2 rounded-lg">{{ $promotion->name }}</option>
                                        @endforeach
                                </select>
                            </div>

                            <div class="flex flex-col gap-2 py-3">
                                <label for="code_id" class="text-xl font-bold">Surveilllances</label>
                                <select name="code_id" id="code_id" class="p-3 px-2 rounded-lg">
                                    <option value="" class="p-3 px-2 rounded-lg">Sélectionner un code</option>
                                    @foreach ($surveillances as $survey)
                                        <option value="{{ $survey->id }}" class="p-3 px-2 rounded-lg code-option" >
                                            {{ $survey->name }}
                                        </option>
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
        </div>





        <!-- Table -->
        <table class="w-full text-left">
          <!-- Header -->
          <thead class="bg-gray-100 rounded-lg">
            <tr>
              <th class="p-4 w-[20%]">
                <div class="flex items-center w-full text-2xl font-bold">
                  Code par Etudiant et Travail
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

              <th class="px-4 py-3 w-[15%]">Etudiants</th>
              <th class="px-4 py-3 w-[18%]">Code</th>
              <th class="px-4 py-3 ">Surveillance</th>
              <th class="px-4">Actions</th>
            </tr>
          </thead>

          <!-- Body -->
          <tbody>
            @foreach ($placements as $placement)
            <tr class="border-t border-gray-400">
              <td class="px-4 py-3  w-[20%]">
                <div class="flex items-center w-full space-x-2">

                  <span>{{ $placement->student->name }}</span>
                </div>
              </td>
              <td class="px-4 py-3 w-[24%]">
                <span class="px-3 py-3 bg-gray-200 rounded-md">
                  {{ $placement->code->value }}
                </span>
              </td>
              <td class="px-4 py-3 w-[24%]">
                <span class="px-3 py-3 bg-gray-200 rounded-md">
                  {{ $placement->surveillance->name }}
                </span>
              </td>

              <td class="flex px-4 py-3">
                <div class="flex items-center w-full gap-2">
                  <a href="{{ route('placement.edit', $placement->id) }}" class="-ml-0.5 bg-gray-400 border px-3 p-2 font-semibold flex items-center justify-center rounded-xl">
                    Edit
                  </a>
                  <a href="{{ route('placement.delete', $placement->id) }}" class="-ml-0.5 bg-red-500 border px-3 p-2 font-semibold flex items-center justify-center rounded-xl">
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
    document.addEventListener('DOMContentLoaded', function() {
        const surveillanceSelect = document.getElementById('surveillance_id');
        const codeSelect = document.getElementById('code_id');
        const codeOptions = document.querySelectorAll('.code-option');

        surveillanceSelect.addEventListener('change', function() {
            const selectedSurveillanceId = this.value;

            // Reset all options
            codeOptions.forEach(option => {
                option.style.display = 'block';
            });

            // If a surveillance is selected, hide non-matching codes
            if (selectedSurveillanceId) {
                codeOptions.forEach(option => {
                    if (option.dataset.surveillance !== selectedSurveillanceId) {
                        option.style.display = 'none';
                    }
                });

                // Reset the selected value if it doesn't match
                if (codeSelect.value &&
                    document.querySelector(`.code-option[value="${codeSelect.value}"]`).dataset.surveillance !== selectedSurveillanceId) {
                    codeSelect.value = '';
                }
            }
        });
    });
  </script>
@endsection
