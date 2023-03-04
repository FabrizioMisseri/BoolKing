@extends('layouts.user')

@section('title', $estate->title)

@section('content')
    <div class="container">

        <div class="row justify-content-center mt-5">
            {{-- SINGLE ESTATE --}}
            <div class="my-3 text-end">
                <a class="btn our-btn-header px-3" href="{{ route('user.estates.index') }}">Torna alle proprietà</a>
            </div>
            <div class="col-12 col-lg-10">
                <h2 class="text-center mb-4">{{ $estate->title }}</h2>

                <div class="mt-2 mb-5 text-center">
                    {{--  IMAGE --}}
                    @if (str_contains($estate->cover_img, 'cover'))
                        <img id="cover-img" class="rounded-3 w-100" src="{{ asset('storage/' . $estate->cover_img) }}"
                            style="max-width: 900px">
                    @else
                        <img src="{{ $estate->cover_img }}" style="max-width: 900px">
                    @endif
                    {{-- / IMAGE --}}
                </div>

                <h4>Foto aggiuntive:</h4>
                <div id="img-show-div" class="d-flex flex-wrap  mb-4 align-center mx-auto justify-content-center">
                    @forelse ($estate->images as $image)
                        <img class="optional-img-show" src="{{ asset('storage/' . $image->path) }}"
                            style="max-width: 500px">



                    @empty
                    @endforelse
                </div>
                <h4 class="mt-5"> Informazioni </h4>
                <div id="info-wrapper" class="d-flex  flex-wrap justify-content-between w-100">
                    <div class="street col-12 col-md-6">
                        <p><span>Visibile:</span> {{ $estate->is_visible ? 'Si' : 'No' }} | <span>Prezzo:</span>
                            {{ $estate->price }}</p>
                        <p><span>Indirizzo:</span> {{ $estate->address?->street }}</p>
                        <p><span>Numero civico:</span> {{ $estate->address?->street_code }}</p>
                        <p><span>Città:</span>{{ $estate->address?->city }} </p>
                        <p><span>Paese:</span> {{ $estate->address?->country }}</p>
                        <p><span>Dettagli indirizzo:</span> {{ $estate->detail }}</p>

                    </div>

                    <div class="estate-details col-12 col-md-6 ">
                        <p><span>&#x33A1;:</span> {{ $estate->mq }}</p>

                        <p> <span>Tipologia:</span>{{ $estate->type }} </p>
                        <p><span>Stanze:</span> {{ $estate->room_number }}</p>
                        <p><span>Camere:</span>{{ $estate->bed_number }} </p>
                        <p><span>Bagni:</span> {{ $estate->bathroom_number }}</p>
                    </div>
                </div>

                {{-- blocco basso --}}
                <div class="d-flex  flex-wrap justify-content-between w-100">

                    {{-- blocco sx --}}
                    <div class="col-12 col-md-6">
                        <dl style="">
                            <dt>Servizi aggiuntivi:</dt>

                            {{-- services --}}
                            @forelse ($estate->services as $service)
                                <dl>{{ $service->name }}</dl>
                            @empty
                                <dl>
                                    Nessun servizio specificato
                                </dl>
                            @endforelse
                            {{-- / services --}}
                        </dl>
                        <div>


                            <p><span>Descrizione:</span> {{ $estate->description }}</p>

                        </div>
                    </div>
                    {{-- blocco sx --}}

                    {{-- blocco dx --}}
                    <div class="col-12 col-md-6">

                        <dl>
                            <dt>Sponsorizzazioni:</dt>

                            @forelse ($estate->sponsors as $sponsor)
                                <dt>
                                    {{ $sponsor->type }}
                                </dt>
                                <dl>
                                    Inizio: {{ $sponsor->pivot->start_date }}
                                </dl>
                                <dl>
                                    Fine: {{ $sponsor->pivot->end_date }}
                                </dl>
                            @empty
                                <dl>
                                    Nessuna sponsorizzazione attiva
                                </dl>
                            @endforelse

                        </dl>
                    </div>
                    {{-- blocco dx --}}

                </div>
                {{-- blocco basso --}}



                {{-- index btn --}}

                <div class="mt-5 mb-5">
                    <a class="btn our-btn-header px-3" href="{{ route('user.stats.index', $estate->id) }}"> Statistiche <i
                            class="fa-solid fa-chart-simple"></i></a>
                </div>
                {{-- / index btn --}}
            </div>
            {{-- / SINGLE ESTATE --}}

        </div>
    </div>
@endsection
