@extends('layouts.app')

@section('scripts')
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    @vite(['resources/js/roast.js'])
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 mx-auto">
                <p class="">
                    So you think you can handle the Roast Master? Awesome, let's get to it! To get started, tell me
                    something about yourself.
                </p>
                <form id="roast-form" class="text-center" method="post" action="/roast">
                    <label for="confession" class="text-accent fs-5 fw-bold mb-3 sub-headline text-headings">
                        What makes YOU different from everybody else?
                    </label>
                    @csrf
                    <div class="mb-3">
                        <label for="message" class="visually-hidden">Message</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control mb-3"></textarea>

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach
                        @else
                            <div id="emailHelp" class="text-warning fw-bold">
                                (Don't be a jerk – only roast yourself and those who are okay with it.)
                            </div>
                        @endif
                    </div>
                    <button type="submit" disabled id="roasted-button" class="btn btn-danger mb-4 overflow-hidden">
                        <div id="roasted-spinner" class="spinner-border visually-hidden" role="status"></div>
                        <span id="roasted-btn-text">Submit</span>
                    </button>

                    <div
                        class="cf-turnstile"
                        data-sitekey="{{ config('roastme.TURNSTILE_SITE_KEY', '') }}"
                        data-callback="onTurnstileVerify"
                    ></div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function onTurnstileVerify(token) {
            document.getElementById('roasted-button').removeAttribute('disabled');
        }
    </script>
@endsection
