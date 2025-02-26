@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 mx-auto">
                <h2>You just got roasted!</h2>

                @if (! empty($roast))
                    <p>{{ $roast }}</p>
                @endif

                @include('partials.share')
            </div>
        </div>
    </div>
@endsection
