@extends('layouts.layout')
@section('content')
<div class="flex items-center mx-20 mt-20 px-8 py-5">

        
        @include('partials._smallCard', ['titre' => 'REGULIER', 
                                        'elts' => $regulier['totalResults'], 
                                        'color' => 'blue',
                                        'date' =>$regulier['items'][0]['CreationDate']])
        @include('partials._smallCard', ['titre' => 'ALLOCATAIRE', 
                                        'elts' => $allocataire['totalResults'], 
                                        'color' => 'indigo',
                                        'date' =>$allocataire['items'][0]['CreationDate']])
        @include('partials._smallCard', ['titre' => 'MISSIONNAIRE', 
                                        'elts' => $missionnaire['totalResults'], 
                                        'color' => 'purple',
                                        'date' =>$missionnaire['items'][0]['CreationDate']])
        @include('partials._smallCard', ['titre' => 'MEMBRE', 
                                        'elts' => $membre['totalResults'], 
                                        'color' => 'teal',
                                        'date' =>$membre['items'][0]['CreationDate']])
        @include('partials._smallCard', ['titre' => 'STAGIAIRE', 
                                        'elts' => $stagiaire['totalResults'], 
                                        'color' => 'orange',
                                        'date' =>$stagiaire['items'][0]['CreationDate']])
        @include('partials._smallCard', ['titre' => 'STAGIAIRE No-FI', 
                                        'elts' => $stagiaireN['totalResults'],
                                        'color' => 'yellow',
                                        'date' =>$stagiaireN['items'][0]['CreationDate']])
        @include('partials._smallCard', ['titre' => 'STAGIAIRE Co-FI', 
                                        'elts' => $stagiaireCo['totalResults'], 
                                        'color' => 'red',
                                        'date' =>$stagiaireCo['items'][0]['CreationDate']])
     
 </div>

<supplier-search-component></supplier-search-component>



@endsection