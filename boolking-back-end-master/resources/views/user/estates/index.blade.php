@extends('layouts.user')

@section('title', 'Tutte le proprietà')

@section('content')
    <div class="container">

        {{-- “Hell is empty and all monsters are here. Notwithstanding here we all are” --}}



        <div class="row justify-content-center mt-5">

            <div class="col-12 col-md-10 col-lg-8 d-flex mb-3 justify-content-between align-items-center">
                <h1 class="text-center">Ecco le tue proprietà</h1>
                <a href="{{ route('user.estates.create') }}" class="btn our-btn">
                    Inserisci proprietà
                </a>
            </div>

            @if (session('message'))
                <div class="alert alert-success col-10" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            @if (session('wrong_address'))
                <div class="alert alert-danger col-10" role="alert">
                    {{ session('wrong_address') }}
                </div>
            @endif

            <div class="col-12 col-md-12 col-lg-10 my-5" style="overflow-x: auto">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Titolo</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Sponsorizzato</th>
                            <th scope="col">Tipologia</th>
                            <th scope="col">&#x33A1;</th>
                            <th scope="col">Prezzo</th>
                            <th scope="col">Visibile</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr></tr>
                        @forelse ($estates as $estate)
                            <tr class="table-row">
                                <th scope="row">{{ $estate->title }}</th>
                                <td class="w-25">
                                    @if (str_contains($estate->cover_img, 'cover'))
                                        <img src="{{ asset('storage/' . $estate->cover_img) }}">
                                    @else
                                        <img src="{{ $estate->cover_img }}">
                                    @endif
                                </td> 
                                <td>{{ count($estate->sponsors) === 0 ? 'No' : 'Si' }} </td>
                                <td>{{ $estate->type }}</td>
                                <td>{{ $estate->mq }}</td>
                                <td>{{ $estate->price }}</td>
                                <td>{{ $estate->is_visible === 0 ? 'No' : 'Si' }}</td>
                                <td>
                                    <div class="list-container">
                                        <button class="more-button" aria-label="Menu Button">
                                            <div class="menu-icon-wrapper">
                                                <div class="menu-icon-line half first"></div>
                                                <div class="menu-icon-line"></div>
                                                <div class="menu-icon-line half last"></div>
                                            </div>
                                        </button>
                                        <ul class="more-button-list d-flex flex-wrap">
                                            <li class="more-button-list-item">
                                                <span>
                                                    <a class=" padding-btn d-block mb-1 "
                                                        href="{{ route('user.estates.show', $estate->slug) }}">
                                                        <i class="fa-solid fa-magnifying-glass"></i>
                                                    </a>
                                                </span>
                                            </li>
                                            <li class="more-button-list-item">
                                                <span>
                                                    <a class="padding-btn d-block  mb-1 "
                                                        href="{{ route('user.estates.edit', $estate->slug) }}">
                                                        <i class="fa-solid fa-wrench"></i>
                                                    </a>
                                                </span>
                                            </li>
                                            <li class="more-button-list-item">
                                                <span>
                                                    <form class=" mb-1"
                                                        action="{{ route('user.estates.destroy', $estate->slug) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <a type="submit" class="padding-btn d-block delete-btn"
                                                            type="submit" button-name="{{ $estate->title }}">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </a>
                                                    </form>
                                                </span>
                                            </li>
                                            <li class="more-button-list-item">
                                                <span>
                                                    <a href="{{ route('user.transaction.index', $estate->id) }}"
                                                        class="padding-btn d-block mb-1">
                                                        <i class="fa-solid fa-hand-holding-dollar"></i>
                                                    </a>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th>Non sono ancora state caricate proprietà</th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @include('partials.modal')

        </div>
    </div>
@endsection
