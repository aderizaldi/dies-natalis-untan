@extends('landing.layouts.main')
@section('content')
    <main id="main">
        <section id="main-section" class="main-section section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3>Logo Dies Natalis Untan</h3>
                </div>

                <div class="row">
                    {{-- content is here --}}
                    <div class="col-lg-3 p-5">
                        <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo Dies Natalis Untan">
                    </div>
                    <div class="col-lg-9">
                        {!! $logo->deskripsi !!}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
