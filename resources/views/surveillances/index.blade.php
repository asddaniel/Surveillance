@extends('layouts.wrapper')
@section('content')

<section>
    <!-- Container -->
    <div class="flex items-center justify-center min-h-screen p-5">
      <div class="w-full overflow-x-auto border border-gray-400 rounded-lg max-w-7xl">


        <div class="py-5">
            <form method="POST" action="{{ route('surveillance.store') }}" class="p-3 rounded-lg shadow-xl">
                @csrf
                <div class="flex flex-col gap-4 py-3">
                    <label for="name" class="text-lg font-bold">Nom</label>
                    <input type="text" class="p-3 px-2 rounded-lg" name="name">
                </div>
                <div class="flex flex-col gap-4 py-3">
                    <label for="name" class="text-lg font-bold">Résume</label>
                    <input type="text" class="p-3 px-2 rounded-lg" name="resume">
                </div>
                <div class="flex flex-col gap-4 py-3">
                    <label for="name" class="text-lg font-bold">effectif</label>
                    <input type="number" class="p-3 px-2 rounded-lg" name="effectif">
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
                  Surveillance
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

                 Nom
                  <span>
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7 0.75V13.25M7 13.25L12.625 7.625M7 13.25L1.375 7.625" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </span>
                </div>
              </th>
              <th class="px-4 py-3 w-[15%]">nombre Etudiants</th>
              <th class="px-4 py-3 w-[18%]">Actions</th>
              <th class="px-4 py-3 "></th>

            </tr>
          </thead>

          <!-- Body -->
          <tbody>
            @foreach ($surveillances as $surveillance)


            <tr class="border-t border-gray-400">
              <td class="px-4 py-3  w-[20%]">
                <div class="flex items-center w-full space-x-2">

                  <div class="w-8 h-8 bg-gray-200 rounded-full"></div>
                  <span>{{ $surveillance->name }}</span>
                </div>
              </td>
              <td class="px-4 py-3 w-[24%]">
                <span class="px-3 py-3 bg-gray-200 rounded-md">
                  {{ $surveillance->effectif }}
                </span>
              </td>

              <td class="flex px-4 py-3">
                <div class="flex items-center w-full gap-2">

                  <a href="{{ route('surveillance.edit', $surveillance->id) }}" class="-ml-0.5 bg-gray-400 border px-3 p-2 font-semibold flex items-center justify-center rounded-xl  ">
                    Edit
                  </a>
                  <a href="{{ route('surveillance.delete', $surveillance->id) }}" class="-ml-0.5 bg-red-500 border px-3 p-2 font-semibold flex items-center justify-center rounded-xl  ">
                    supprimer
                  </a>
                  <a href="{{ route('surveillance.resolve', $surveillance->id) }}" class="-ml-0.5 bg-blue-600 border px-3 p-2 font-semibold flex items-center justify-center rounded-xl  ">
                    resoudre
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

@endsection
