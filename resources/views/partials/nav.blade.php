@php
    $active = 'text-decoration-underline text-warning';
@endphp

<div class="container text-light">
    <div class="row">
        <ul class="d-flex gap-4 py-2">
            <li>
                <a href="{{ route('home') }}" class="{{ request()->is('/') ? $active : '' }}">home</a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="{{ request()->is('about') ? $active : '' }}">about</a>
            </li>
            <li>
                <a href="{{ route('roast') }}" class="{{ request()->is('roast') ? $active : '' }}">get Roasted</a>
            </li>
        </ul>
    </div>
</div>
