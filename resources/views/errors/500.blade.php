@extends('layouts.layout')  
@section('content')

    <main id="error">
        <section class="error-img section-space">
            <div class="container-fluid">
                <div class="container text-center">
                    <img src="{{ asset('images/500.gif') }}" alt="Error" class="gif-img mt-5 mb-5" />
                </div>
            </div>
        </section>
    </main>

@endsection