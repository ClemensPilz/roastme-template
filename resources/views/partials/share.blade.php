<ul class="d-flex flex-row gap-3">
    <li>
        <a href="/roast" class="text-danger text-decoration-underline">Roast me again!</a>
    </li>
    <li>
        <a
            href="https://twitter.com/intent/tweet?text={{ urlencode($roast) }}&url={{ config('roastme.APP_URL') }}"
            target="_blank"
            rel="noopener noreferrer"
            class="text-decoration-underline"
        >
            Share on Twitter
        </a>
    </li>
</ul>
