@extends('layouts.layout')
@section('content')
<div class="flex items-center mt-20 px-8 py-5">

        
        @include('partials._smallCard', ['titre' => 'REGULIER', 
                                        'elts' => $regulier['totalResults'], 
                                        'color' => 'blue'])
        @include('partials._smallCard', ['titre' => 'ALLOCATAIRE', 
                                        'elts' => $allocataire['totalResults'], 
                                        'color' => 'indigo'])
        @include('partials._smallCard', ['titre' => 'MISSIONNAIRE', 
                                        'elts' => $missionnaire['totalResults'], 
                                        'color' => 'purple'])
        @include('partials._smallCard', ['titre' => 'MEMBRE', 
                                        'elts' => $membre['totalResults'], 
                                        'color' => 'teal'])
        @include('partials._smallCard', ['titre' => 'STAGIAIRE', 
                                        'elts' => $stagiaire['totalResults'], 
                                        'color' => 'orange'])
        @include('partials._smallCard', ['titre' => 'S No-FI', 
                                        'elts' => $stagiaireN['totalResults'],
                                        'color' => 'yellow'])
        @include('partials._smallCard', ['titre' => 'S Co-FI', 
                                        'elts' => $stagiaireCo['totalResults'], 
                                        'color' => 'red'])

 </div>

 @include('partials._table')

@endsection