<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $locale) }}">
<head>
    <title>{{ $copy['meta']['title'] }}</title>
    @include('landing.partials.head')
</head>
<body>
    {{-- Theme init (before paint) --}}
    <script>
    (function(){
        var k='pantoo-theme',s=localStorage.getItem(k);
        var t=(s==='light'||s==='dark')?s:(matchMedia('(prefers-color-scheme:dark)').matches?'dark':'light');
        document.documentElement.setAttribute('data-theme',t);
        document.documentElement.classList.toggle('dark', t === 'dark');
    })();
    </script>

    @include('landing.partials.nav')

    <main id="main-content">
    @include('landing.partials.hero')

    @include('landing.partials.problem')

    @include('landing.partials.solution')

    @include('landing.partials.features')

    @include('landing.partials.positioning')

    @include('landing.partials.cta')
    </main>

    @include('landing.partials.footer')

</body>
</html>
