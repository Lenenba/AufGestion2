@extends('layouts.layout')
@section('content')
<nav class="bg-gray-100 px-8 py-5 mx-4 rounded font-sans w-full">
  <ol class="list-reset flex text-grey-dark">
    <li><a href="#" class="text-gray-500 italic text-xs">Dashboard</a></li>
    <li><span class="text-gray-500 italic text-xs mx-2">/</span></li>
    <li><a href="#" class="text-gray-500 italic text-xs">Fournisseurs</a></li>
    <li><span class="text-gray-500 italic text-xs mx-2">/</span></li>
    <li ><span class="text-gray-500 italic text-xs">suivis de la demande</span></li>
  </ol>
</nav>
<div class="flex items-center mx-auto my-10 px-8 py-5">
    @foreach($suppliers as $supplier)
    <div class="bg-white shadow p-4 mx-4 rounded lg:w-64">
    <div class="text-center mt-4">
        <p class="text-gray-600 font-bold"> {{$supplier->nomFournisseur}}
        </p>
        <p class="text-xs font-hairline text-gray-600 mt-1">{{$supplier->typeFournisseur}} -  {{$supplier->typeOrganisation}}
        </p>
    </div>
    <div class="flex justify-center mt-4">
        <img class="shadow sm:w-12 sm:h-12 w-10 h-10 rounded-full" src="/images/supplier.png" alt="Avatar" />
    </div>
    <div class="mt-6 flex justify-between text-center">
        <div>
        <p class="text-gray-700 font-bold">{{$supplier->sites()->count()}}
        </p>
        <p class="text-xs mt-2 text-gray-600 font-hairline">Sites
        </p>
        </div>
        <div>
        <p class="text-gray-700 font-bold">{{$supplier->adresses()->count()}}
        </p>
        <p class="text-xs mt-2 text-gray-600 font-hairline">Adresses
        </p>
        </div>
        <div>
        <p class="text-gray-700 font-bold">{{$supplier->contacts()->count()}}
        </p>
        <p class="text-xs mt-2 text-gray-700 font-hairline">Contacts
        </p>
        </div>  
    </div>
    <div class="mt-6 flex mx-5">
        <button class="rounded shadow-md items-center bg-blue-500 px-4 py-2 mx-2 text-white hover:bg-blue-400">
            <svg  class="h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
        </button>
        <button class="rounded shadow-md items-center bg-green-500 px-4 py-2 mx-2 text-white hover:bg-green-400">
            <svg class="h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
        </button>
        <button class="rounded shadow-md items-center bg-red-500 px-4 py-2 mx-2 text-white hover:bg-red-400" @click.prevent="$modal.show('supplier-delete', {{ json_encode($supplier ,TRUE) }})">
            <svg class="h-4"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </button>
    </div>
    <div class="mt-6">
        @if( $supplier->statut == 'DFCG')
        <button class="rounded shadow-md w-full items-center bg-green-500 px-4 py-2 text-white hover:bg-green-400">
             {{$supplier->statut}}
        </button>
        @elseif( $supplier->statut == 'COMPTABLE')
        <button class="rounded shadow-md w-full items-center bg-indigo-500 px-4 py-2 text-white hover:bg-indigo-400">
             {{$supplier->statut}}
        </button>
        @elseif( $supplier->statut == 'DEMANDEUR')
        <button class="rounded shadow-md w-full items-center bg-orange-500 px-4 py-2 text-white hover:bg-orange-400">
             {{$supplier->statut}}
        </button>
        @elseif( $supplier->statut == 'BROUILLON')
        <button class="rounded shadow-md w-full items-center bg-blue-500 px-4 py-2 text-white hover:bg-blue-400">
             {{$supplier->statut}}
        </button>
        @elseif( $supplier->statut == 'A SUPPRIMER')
        <button class="rounded shadow-md w-full items-center bg-red-500 px-4 py-2 text-white hover:bg-red-400">
             {{$supplier->statut}}
        </button>
        @endif
    </div>
    </div>
    @endforeach
 
</div>
{{ $suppliers->appends(['sort' => 'created_at'])->links() }}

<supplier-delete-modal :supplier="{{ json_encode($supplier ,TRUE) }}"></supplier-delete-modal>

@endsection