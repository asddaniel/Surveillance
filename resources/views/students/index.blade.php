@extends('layouts.wrapper')
@section('content')

<section>
    <!-- Container -->
    <div class="flex justify-center items-center min-h-screen p-5">
      <div class="w-full max-w-7xl border border-gray-400 rounded-lg overflow-x-auto">


        <div class="py-5">
            <form method="POST" action="{{ route('student.store') }}" class="rounded-lg p-3 shadow-xl">
                @csrf
                <div class="py-3 flex flex-col gap-4">
                    <label for="name" class="text-lg font-bold">Nom de l'etudiant</label>
                    <input type="text" class="rounded-lg p-3 px-2" name="name">
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
        <!-- Table -->
        <table class="w-full text-left">
          <!-- Header -->
          <thead class="bg-gray-100 rounded-lg">
            <tr>
              <th class="p-4 w-[20%]">
                <div class="flex items-center text-2xl font-bold w-full">
                  Etudiants
                </div>
              </th>
              <th class="px-4 py-3 w-[15%]"></th>
              <th class="px-4 py-3 w-[18%]"></th>
              <th class="px-4 py-3 w-[15%]"></th>
              <th class="px-4 py-3 w-[10%]">
                <button class="bg-black rounded-md text-base font-normal text-white px-5 py-2">
                  Ajouter
                </button>
              </th>
            </tr>
          </thead>
          <thead class="bg-gray-100 font-bold border-t border-gray-400">
            <tr class="w-full">
              <th class="px-4 py-3 w-[20%]">
                <div class="flex items-center gap-2 w-full">
                 
                 Nom
                  <span>
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M7 0.75V13.25M7 13.25L12.625 7.625M7 13.25L1.375 7.625" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </span>
                </div>
              </th>
              <th class="px-4 py-3 w-[15%]">promotion</th>
              <th class="px-4 py-3 w-[18%]">Actions</th>
              <th class="px-4 py-3 "></th>
             
            </tr>
          </thead>
  
          <!-- Body -->
          <tbody>
            @foreach ($students as $student)
                
           
            <tr class="border-t border-gray-400">
              <td class="px-4 py-3  w-[20%]">
                <div class="flex items-center space-x-2 w-full">
                 
                  <div class="bg-gray-200 rounded-full h-8 w-8"></div>
                  <span>{{ $student->name }}</span>
                </div>
              </td>
              <td class="px-4 py-3 w-[24%]">
                <span class="bg-gray-200 px-3 py-3 rounded-md">
                  {{ $student->promotion->name }}
                </span>
              </td>
              
              <td class="px-4 py-3 flex">
                <div class="w-full flex gap-2 items-center">
                
                  <a href="{{ route('student.edit', $student->id) }}" class="-ml-0.5 bg-gray-400 border px-3 p-2 font-semibold flex items-center justify-center rounded-xl  ">
                    Edit
                  </a>
                  <a href="{{ route('student.delete', $student->id) }}" class="-ml-0.5 bg-red-500 border px-3 p-2 font-semibold flex items-center justify-center rounded-xl  ">
                    supprimer
                  </a>
                </div>
              </td>
  
              
            </tr>
            @endforeach
          
          </tbody>
        </table>
        <div class="w-full min-w-[720px]">
          <div class="flex justify-between items-center p-4 border-t border-gray-400 w-full">
           
          </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection