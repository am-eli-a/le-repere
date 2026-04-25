@extends('layouts.main')
@push('styles')<link rel="stylesheet" href="{{ asset('css/boite_a_idees.css') }}"> @endpush
@push('active_boite-a-idees')class="active"@endpush

@section('content')
    <div class="boite_idee-content">
        <h2>Vos suggestions</h2>
        <p>N'hésitez pas à proposer une idée :)</p>

        <a href="{{ route('contact') }}" class="bouton">Faire une suggestion</a>

        <div class="boite_idee-bloc">
            @foreach($suggestions as $suggestion)
                <div class="boite_idee-box">
                    <h3>{{$suggestion->titre}}</h3>
                    <p>Description de l'idée :</p>
                    <p>{{$suggestion->description}}</p>
                    <div class="vote">
                        <button class="aprouve">Je valide !</button>
                    </div>
                </div>
            @endforeach

            <div class="boite_idee-box">
                <h3>Titre</h3>
                <p>Description de l'idée :</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi itaque magni odit, quaerat
                    similique suscipit totam? Amet culpa, eius fuga incidunt ipsum labore quibusdam rem veniam! A alias
                    aut sit!</p>
                <div class="vote">
                    <button class="aprouve">Je valide !</button>
                </div>
            </div>
        </div>

    </div>
@endsection
