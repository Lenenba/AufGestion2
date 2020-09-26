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

@endsection