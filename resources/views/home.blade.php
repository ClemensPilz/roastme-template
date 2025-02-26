@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-lg-5">
            <div class="col-12 col-md-6 mx-auto text-center">
                <section class="mb-5">
                    <h1>Roast Me</h1>
                    <h2 class="mb-4">The most severe burns on the web! Get ready to...</h2>
                    <a href="/roast">
                        <button class="btn btn-lg btn-danger">
                            <svg
                                xmlns="http://www.w3.org   /2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-fire mb-1"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15"
                                />
                            </svg>
                            Get Roasted
                            <svg
                                xmlns="http://www.w3.org   /2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-fire mb-1"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15"
                                />
                            </svg>
                        </button>
                    </a>
                </section>

                <section class="mb-5">
                    <div class="d-flex gap-3">
                        <p class="h2 text-warning">!</p>
                        <p class="text-start">
                            Beware: our AI Roast Master doesn't hold back. You'll be made fun of, and if you can't take
                            a joke, we suggest you look for entertainment elsewhere.
                        </p>
                    </div>
                </section>
            </div>
        </div>

        <section>
            @include('partials.cards')
        </section>
    </div>
@endsection
