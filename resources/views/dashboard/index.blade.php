@extends('layouts.layout')
@section('content')
<nav class="bg-gray-100 px-8 py-5 mx-4 rounded font-sans w-full">
  <ol class="list-reset flex text-grey-dark">
    <li><a href="#" class="text-gray-500 italic text-xs">Dashboard</a></li>
  </ol>
</nav>

    <div class="flex items-center mt-20 px-8 py-5">
       @include('partials._bigCard', ['titre' => 'FOURNISSEURS', 
                                        'elts' => $supplier['totalResults'], 
                                        'color' => 'blue'])

        @include('partials._bigCard', ['titre' => 'EMPLOYÉS', 
                                        'elts' => $employer['totalResults'], 
                                        'color' => 'indigo'])
    
        @include('partials._bigCard', ['titre' => 'PROJETS', 
                                        'elts' => $project['totalResults'], 
                                        'color' => 'green'])

        @include('partials._bigCard', ['titre' => 'COMPTES', 
                                        'elts' => $compte['totalResults'], 
                                        'color' => 'orange'])

        @include('partials._bigCard', ['titre' => 'POSTES', 
                                        'elts' => $poste['totalResults'], 
                                        'color' => 'red'])
    </div>

    <div class="flex flex-wrap mt-20 px-8 py-5 -mx-4">
      <div class="w-full mb-6 lg:mb-0 lg:w-1/2 px-4 flex flex-col">
        <div class="flex-grow flex flex-col bg-white border-t border-b sm:rounded sm:border shadow overflow-hidden">
          <div class="border-b">
            <div class="flex justify-between px-6 -mb-px">
              <h3 class="text-gray-500 italic text-sm mt-6">Liste de Fournisseurs Récemment Chargés</h3>
              <div class="flex">
                <button type="button" class="appearance-none py-4 text-grey-dark border-b border-transparent hover:border-grey-dark">
                    <svg class="h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg"> 
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Fournisseurs
                        </th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Date de Création
                        </th>
                        <th class="px-6 py-3 bg-gray-100"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($supplier['items'] as $supp)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="/images/supplier.png" alt="">
                                        </div>
                                    <div class="ml-4">
                                        <div class="text-xs leading-5 font-medium text-gray-900">
                                            {{ $supp['SupplierNumber']}} |  {{ utf8_decode($supp['Supplier']) }}
                                        </div>
                                        <div class="text-xs leading-5 text-gray-500">
                                            {{ $supp['SupplierTypeCode']}} - {{ $supp['TaxOrganizationTypeCode']}}
                                        </div>
                                     </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ">
                                    {{ Illuminate\Support\Carbon::parse($supp['CreationDate'])->diffForHumans()}}
                                    </span>
                                </td>
                                <td class="px-6 py-4 flex whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                    <div>
                                        <button class="text-gray-600 mx-2 text-xs flex flex-col justify-items-center hover:text-gray-900" @click="$modal.show('site', { supplier : '{{ utf8_decode($supp['Supplier']) }}', sites:'{{ json_encode($supp['sites'])}}'})">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="text-gray-600 h-6 " viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                            </svg>
                                            <h3>Sites</h3> 
                                        </button>
                                    </div>
                                    <div> 
                                        <a href="#" class="text-gray-600 mx-2 flex flex-col justify-items-center text-xs hover:text-gray-900" @click="$modal.show('site', { supplier : '{{ utf8_decode($supp['Supplier']) }}', sites:'{{ json_encode($supp['addresses'])}}'})">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="text-gray-600 h-6" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <h3>Adresses</h3>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-gray-600 mx-2 text-xs flex flex-col justify-items-center hover:text-gray-900" @click="$modal.show('site', { supplier : '{{ utf8_decode($supp['Supplier']) }}', sites:'{{ json_encode($supp['contacts'])}}' })">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="text-gray-600 h-6" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                            Contacts
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        <!-- More rows... -->
                    </tbody>
                    </table>

                </div>
          <div class="px-6 py-4">
            <div class="text-center text-grey">
            </div>
          </div>
        </div>
      </div>



      <div class="w-full lg:w-1/2 px-4">
        <div class="bg-white border-t border-b sm:rounded sm:border shadow">
          <div class="border-b">
            <div class="flex justify-between px-6 -mb-px">
              <h3 class="text-gray-500 italic text-sm mt-6">Budget de Projets</h3>
              <button type="button" class="appearance-none py-4 text-grey-dark border-b border-transparent hover:border-grey-dark">
                  <svg class="h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                  </svg>
              </button>
            </div>
          </div>
          <div>
            <div class="text-center px-6 py-4">
                <chart-component :project="{{ json_encode($projectB['items'],TRUE) }}"></chart-component>
            </div>
          </div>
          <div class="px-6 py-4">
            <div class="text-center text-grey">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <site-modal></sites-modal>

@endsection