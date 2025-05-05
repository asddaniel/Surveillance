@extends("layouts.wrapper")

@section('content')
<!-- inspiration from UI Design Daily -->
<div class="min-h-screen grid place-content-center">
    <div class="bg-white max-w-5xl mx-auto shadow-xl py-12 px-10">
      <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
        @auth

        <div class="flex items-center">
            <img src="{{ asset("avatar.jpg") }}" alt="Photo" class="sm:rounded-full sm:w-24 sm:h-24 object-cover h-auto">
              <div class="ml-5">
                <h1 class="text-3xl font-semibold text-gray-800 mb-1">Username</h1>
                <p class="text-gray-700">@ <span></span>Entertainment</p>
              </div>
              </div>

        @endauth

        <div>
        <a href="{{ route('profile.edit') }}"
        class="capitalize flex bg-gray-800 text-white py-2.5 px-6 hover:bg-indigo-800 mt-8 sm:mt-0">
        <span>
            <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
        </span>edit
        </a>
        </div>
      </div>
      <div class=" border-t-2 mt-7 block">
        <ul class="sm:flex mt-4 items-center" id="tabs">
          <li class="capitalize font-bold text-gray-800 sm:mr-5 sm:mt-0 tab active" data-tab="surveillance">Surveillance</li>
          <li class="capitalize text-gray-500 mt-2 sm:mr-5 sm:mt-0 tab cursor-pointer" data-tab="promotion">Promotion</li>
          <li class="capitalize text-gray-500 mt-2 sm:mr-5 sm:mt-0 tab cursor-pointer" data-tab="placement">Placement</li>
          <li class="capitalize text-gray-500 mt-2 sm:mr-5 sm:mt-0 tab cursor-pointer" data-tab="etudiant">Etudiant</li>
          <li class="capitalize text-gray-500 mt-2 sm:mt-0 tab cursor-pointer" data-tab="utilisateur">Utilisateur</li>
        </ul>
        <div class="flex items-center justify-between mt-7">
        <div class="text-gray-800 font-bold text-xl">Insights </div><div class="flex items-center text-gray-600"> <svg class="w-5 h-5 text-gray-600 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></div>
        </div>
       <div class="grid sm:grid-cols-3 mt-10 gap-6 mb-5">
         <div class="bg-gray-800 text-white p-5 rounded-lg shadow-lg tab-content" id="surveillance-tab">
           <h3 class="capitalize flex justify-between font-semibold">Surveillance <span class="flex items-center text-green-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>7%</span></h3>
      <div class="md:flex justify-between mt-2">
             <p class="text-3xl font-semibold">1,090</p>
        <p class="flex items-end text-gray-400 mt-2 md:mt-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </p>
      </div>
         </div>

         <div class="bg-white border-2 text-gray-800 p-5 rounded-lg shadow-lg tab-content hidden" id="promotion-tab">
           <h3 class="capitalize flex justify-between font-semibold">promotions
            <a href="{{ route('promotion.index') }}" class="flex items-center text-green-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                25%</a>
            </h3>
      <div class="flex justify-between mt-2">
             <p class="text-3xl font-semibold">305</p>
             <p class="flex items-end text-gray-400 mt-2 md:mt-0">
                <a href="{{ route('promotion.index') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>

            </p>
      </div>
         </div>

         <div class="bg-white border-2 text-gray-800 p-5 rounded-lg shadow-lg tab-content hidden" id="placement-tab">
           <h3 class="capitalize flex justify-between font-semibold">placements <span class="flex items-center text-green-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>18%</span></h3>
      <div class="flex justify-between mt-2">
             <p class="text-3xl font-semibold">13</p>
      </div>
         </div>

         <div class="bg-white border-2 text-gray-800 p-5 rounded-lg shadow-lg tab-content hidden" id="etudiant-tab">
           <h3 class="capitalize flex justify-between font-semibold">Etudiants <span class="flex items-center text-green-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>12%</span></h3>
      <div class="flex justify-between mt-2">
             <p class="text-3xl font-semibold">87</p>
      </div>
         </div>

         <div class="bg-white border-2 text-gray-800 p-5 rounded-lg shadow-lg tab-content hidden" id="utilisateur-tab">
            <h3 class="capitalize flex justify-between font-semibold">Users <span class="flex items-center text-green-400"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>18%</span></h3>
       <div class="flex justify-between mt-2">
              <p class="text-3xl font-semibold">13</p>
       </div>
          </div>
       </div>
      </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('.tab');
    const tabContents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Remove active class from all tabs
            tabs.forEach(t => {
                t.classList.remove('active', 'font-bold', 'text-gray-800');
                t.classList.add('text-gray-500');
            });

            // Add active class to clicked tab
            this.classList.add('active', 'font-bold', 'text-gray-800');
            this.classList.remove('text-gray-500');

            // Hide all tab contents
            tabContents.forEach(content => {
                content.classList.add('hidden');
                content.classList.remove('bg-gray-800', 'text-white');
                content.classList.add('bg-white', 'border-2', 'text-gray-800');
            });

            // Show the selected tab content
            const tabId = this.getAttribute('data-tab') + '-tab';
            const activeTab = document.getElementById(tabId);
            if (activeTab) {
                activeTab.classList.remove('hidden');
                activeTab.classList.remove('bg-white', 'border-2', 'text-gray-800');
                activeTab.classList.add('bg-gray-800', 'text-white');
            }
        });
    });
});
</script>
@endsection
