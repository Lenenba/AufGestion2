@extends('layouts.layout')
@section('content')


    <div class="flex items-center mt-20 px-8 py-5">
       @include('partials._smallCard', ['titre' => 'FOURNISSEURS', 
                                        'elts' => $supplier['totalResults'], 
                                        'color' => 'blue'])

        @include('partials._smallCard', ['titre' => 'EMPLOYÉS', 
                                        'elts' => $employer['totalResults'], 
                                        'color' => 'indigo'])
    
        @include('partials._smallCard', ['titre' => 'PROJETS', 
                                        'elts' => $project['totalResults'], 
                                        'color' => 'green'])

        @include('partials._smallCard', ['titre' => 'COMPTES', 
                                        'elts' => $compte['totalResults'], 
                                        'color' => 'orange'])
    </div>
        <div class="py-2 overflow-hidden flex items-center justify-between rounded-lg px-10 mt-10">
            <div class="text-gray-600 text-sm my-6 bg-white mx-4 w-4/6 px-10 py-10 rounded-lg">
                <h3 class="text-lg my-4 leading-6 font-medium  text-gray-600">
                        Liste de demande de creation de Fournisseurs 
                    
                </h3>
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"> 
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
                                            {{ $supp['SupplierNumber']}} |  {{ $supp['Supplier']}}
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
                                        <button class="text-gray-600 mx-2 text-xs flex flex-col justify-items-center hover:text-gray-900" @click="$modal.show('{{ $supp['Supplier']}}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="text-gray-600 h-6 " viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                            </svg>
                                            <h3>Sites</h3> 
                                        </button>

                                       @include('partials._modalSite')
                                    </div>
                                    <div> 
                                        <a href="#" class="text-gray-600 mx-2 flex flex-col justify-items-center text-xs hover:text-gray-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="text-gray-600 h-6" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <h3>Adresses</h3>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-gray-600 mx-2 text-xs flex flex-col justify-items-center hover:text-gray-900">
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
            </div> 
            <div class="text-gray-600 text-sm my-6 bg-white mx-4 w-4/6 px-10 py-5 rounded-lg">
            
                <form class="w-full max-w-lg bg-white rounded-lg px-10 py-10">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Nom
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">
                            <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                        </div>
                        
                        <div class="w-full mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Autre Nom
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full mb-6 md:mb-6">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                Type de Fournisseurs
                            </label>
                            <div class="relative">
                                <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                    <option>Fournisseurs</option>
                                    <option>AUF Allocataire</option>
                                    <option>AUF Missionnaire</option>
                                    <option>AUF Stagiaire</option>
                                    <option>AUF Stagiaire Non Financé</option>
                                    <option>AUF Stagiaire Co-Financé</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                        </div>

                        <div class="w-full mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                Type d'Organisation
                            </label>
                            <div class="relative">
                                <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                    <option>Personne Physique</option>
                                    <option>Societé</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center mt-5">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-4 rounded-lg shadow-lg focus:outline-none focus:shadow-outline" type="button">
                            Enregistrer
                        </button>
                        <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 border rounded-lg p-2 border-blue-500 shadow-lg" href="#">
                            annuler
                        </a>
                    </div>
                </form>
            </div>  
        </div>
@endsection