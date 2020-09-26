@extends('layouts.layout')
@section('content')

    <div class="flex items-center px-8 py-5">
       @include('partials._smallCard', ['titre' => 'FOURNISSEURS', 
                                        'elts' => $supplier, 
                                        'color' => 'blue'])

        @include('partials._smallCard', ['titre' => 'EMPLOYÉS', 
                                        'elts' => $employer, 
                                        'color' => 'indigo'])
    
        @include('partials._smallCard', ['titre' => 'PROJETS', 
                                        'elts' => $project, 
                                        'color' => 'green'])

        @include('partials._smallCard', ['titre' => 'COMPTES', 
                                        'elts' => $compte, 
                                        'color' => 'orange'])
    </div>

    <div class="bg-white shadow py-2 overflow-hidden rounded-lg px-10 mt-10">
        <div class="text-gray-600 border-b block text-sm my-6">
             <h3 class="text-lg leading-6 font-medium text-gray-600">
                Liste de Fournisseurs 
            </h3>
            <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                Recemment ajouté...
            </p>
        </div>

        @include('partials._table')
            
        
    </div>

@endsection