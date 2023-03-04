@extends('layouts.user')

@section('title', 'Benvenuto')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Benvenuto ' .  $user_name . " " . $user_surname ) }}
                        <div class="mt-4">
                            <a href="{{ route('user.estates.index') }}" class="btn btn-danger">
                                Visualizza le proprietà 
                            </a>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
