@extends('landing.layouts.main')
@section('content')
    <main id="main">
        <section id="main-section" class="main-section section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h3>Kata Sambutan Ketua Panitia Dies Natalis Untan</h3>
                </div>

                <div class="row">
                    <div class="col-12 text-content">
                    {!! $sambutan->deskripsi !!}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
