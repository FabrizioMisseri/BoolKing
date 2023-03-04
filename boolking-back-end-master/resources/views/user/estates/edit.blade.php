@extends('layouts.user')

@section('title', 'Modifica ' . $estate->title)

@section('content')

    <div class="container py-4">

        <div class="mt-5 mb-5 text-end">
            <a class="btn our-btn px-3" href="{{ route('user.estates.index') }}"><i class="fa-solid fa-chevron-left"></i></a>
        </div>

        <h1 class="text-center">Modifica i dati della tua proprietà</h1>
        @include('partials.error_messages')


        <form enctype="multipart/form-data" action="{{ route('user.estates.update', $estate->slug) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo*</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ old('title', $estate->title) }}">

                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="d-flex flex-column flex-md-row">

                <div class="mb-3 me-md-2" id="address-input-div">
                    <label for="street" class="form-label">Indirizzo*</label>
                    <input class="form-control @error('street') is-invalid @enderror" id="street" type="text"
                        name="street" value="{{ old('street', $estate->address?->street) }}">
                    @error('street')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="street_code" class="form-label">Numero civico*</label>
                    <input class="form-control @error('street_code') is-invalid @enderror" id="street_code" type="text"
                        name="street_code" value="{{ old('street_code', $estate->address?->street_code) }}">
                    @error('street_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

            <div class="d-flex flex-column flex-md-row">

                <div class="mb-3 city-country-input-div">
                    <label for="city" class="form-label">Città*</label>
                    <input class="form-control @error('city') is-invalid @enderror" id="city" type="text"
                        name="city" value="{{ old('city', $estate->address?->city) }}">
                    @error('city')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 mx-md-2 city-country-input-div">
                    <label for="cap" class="form-label">Cap*</label>
                    <input class="form-control @error('country') is-invalid @enderror" id="cap" type="number"
                        min="1" name="cap" value="{{ old('cap', $estate->address?->cap) }}" required>
                    @error('cap')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3  city-country-input-div">
                    <label for="country" class="form-label">Paese*</label>
                    <input class="form-control @error('country') is-invalid @enderror" id="country" type="text"
                        name="country" value="{{ old('country', $estate->address?->country) }}">
                    @error('country')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="d-flex flex-column flex-md-row justify-content-md-between">
                <div class="mb-3 me-md-2 flex-md-grow-1">
                    <label for="room_number" class="form-label">Numero di stanze*</label>
                    <input type="number" min="1" class="form-control @error('room_number') is-invalid @enderror"
                        id="room_number" name="room_number" value="{{ old('room_number', $estate->room_number) }}">

                    @error('room_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 me-md-2 flex-md-grow-1">
                    <label for="bed_number" class="form-label">Numero di letti*</label>
                    <input type="number" min="1" class="form-control @error('bed_number') is-invalid @enderror"
                        id="bed_number" name="bed_number" value="{{ old('bed_number', $estate->bed_number) }}">

                    @error('bed_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 me-md-2 flex-md-grow-1">
                    <label for="bathroom_number" class="form-label">Numero di bagni*</label>
                    <input type="number" min="1" class="form-control @error('bathroom_number') is-invalid @enderror"
                        id="bathroom_number" name="bathroom_number"
                        value="{{ old('bathroom_number', $estate->bathroom_number) }}">

                    @error('bathroom_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3 flex-md-grow-1">
                    <label for="mq" class="form-label">Metri quadri*</label>
                    <input type="number" min="1" class="form-control @error('mq') is-invalid @enderror"
                        id="mq" name="mq" value="{{ old('mq', $estate->mq) }}">

                    @error('mq')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>


            <div class="mb-3">
                <label for="detail" class="form-label">Altri dettagli</label>
                <input type="text" class="form-control @error('detail') is-invalid @enderror" id="detail"
                    name="detail" value="{{ old('detail', $estate->detail) }}">

                @error('detail')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>



            <div class="mb-3">
                <label for="cover_img" class="form-label">Immagine di copertina*</label>
                <input type="file" class="form-control @error('cover_img') is-invalid @enderror" id="cover_img"
                    name="cover_img">

                {{-- IMG --}}
                <div class="my-5  text-center ">
                    <img class="rounded-4 " id="image_preview" style="max-height: 300px"
                        src="{{ asset('storage/' . $estate->cover_img) }}" alt="{{ $estate->title . ' image' }}">
                </div>
                @error('cover_img')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                {{-- / IMG --}}
            </div>

            {{-- Optional Imgs --}}
            <div class="mb-3">
                <label for="images" class="form-label">Altre immagini (max: 4)</label>
                <input type="file" class="form-control @error('images') is-invalid @enderror" id="images"
                    name="images[]" multiple>
                <p id="imgs-error" class="d-none text-danger">Le immagini non possono essere più di 4</p>

                <div class="my-5 d-flex justify-content-center flex-wrap" id="optional-imgs-div">
                    @forelse ($estate->images as $image)
                        <img class="rounded-4 " style="max-height: 300px" src="{{ asset('storage/' . $image->path) }}"
                            alt="{{ $estate->title . ' image' }}">

                    @empty
                    @endforelse
                </div>


                @error('images')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- /Optional Imgs --}}

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="is_visible" name="is_visible"
                    @checked(old('is_visible', $estate->is_visible) == 1)>
                <label class="form-check-label @error('is_visible') is-invalid @enderror" for="is_visible">Spunta se vuoi
                    renderlo visibile da subito</label>

                @error('checkbox')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <select name="type" id="type" class="form-select w-25 @error('type') is-invalid @enderror">
                    <option value="">Scegli la tipologia di proprietà</option>
                    @foreach ($types as $type)
                        <option value="{{ $type }}" @selected(old('type', $estate->type) == $type)>{{ $type }}</option>
                    @endforeach
                </select>

                @error('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <div>Servizi (seleziona almeno una delle seguenti opzioni):</div>
                <p id="service-error"></p>

                {{-- @checked($errors->any() ? in_array($technology->id, old('technologies', [])) : $project->technologies->contains($technology)) --}}

                <div class="d-md-flex flex-md-column flex-md-wrap" id="services-input-div">

                    @foreach ($services as $service)
                        <div class="mb-1 form-check">
                            <input type="checkbox" class="form-check-input services-check"
                                id="service-{{ $service->id }}" value="{{ $service->id }}" name="services[]"
                                @checked($errors->any() ? in_array($service->id, old('services', [])) : $estate->services->contains($service))>
                            <label class="form-check-label"
                                for="service-{{ $service->id }}">{{ $service->name }}</label>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="mb-3">
                <label class="form-check-label" for="description">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $estate->description) }}</textarea>

                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Inserisci Prezzo</label>
                <input class="form-control w-25 @error('price') is-invalid @enderror" type="number" min="0.01"
                    step="0.01" max="3000" name="price" id="price"
                    value="{{ old('price', $estate->price) }}" />

                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <button id="submit-btn" type="submit" class="btn our-btn-header">Aggiorna proprietà</button>
                <button type="reset" class="btn our-btn">Resetta i campi</button>
            </div>
        </form>

    </div>

@endsection
