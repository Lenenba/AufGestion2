@extends('layouts.layout')
@section('content')

    <supplier-form-component class="bg-white rounded-lg px-10 py-10"  
        :pays="{{ json_encode($pays['items'] ,TRUE) }}"
        :nationalite="{{ json_encode($nationalite['items'] ,TRUE) }}"
        :paigroup="{{ json_encode($paigroup['items'] ,TRUE) }}"
        :project="{{ json_encode($project['items'] ,TRUE) }}"
        :typemobilite="{{ json_encode($typemobilite['items'] ,TRUE) }}"
        :domaine="{{ json_encode($domaine['items'] ,TRUE) }}" 
        :etablissemn="{{ json_encode($etablissemn['items'] ,TRUE) }}"
        :devise="{{ json_encode($devise['items'] ,TRUE) }}"
        :discipline="{{ json_encode($discipline['items'] ,TRUE) }}"
        :region="{{ json_encode($region['items'] ,TRUE) }}"
        :paymentterm="{{ json_encode($paymentterm['items'] ,TRUE) }}"
        :tolerancemontant="{{ json_encode($tolerancemontant['items'] ,TRUE) }}">
        <template v-slot:titre>
            Formulaire de Demande de Création de Fournisseur
        </template>
    </supplier-form-component>


@endsection