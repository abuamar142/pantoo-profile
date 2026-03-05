<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="{{ $copy['meta']['description'] }}">
<meta name="keywords" content="{{ $copy['meta']['keywords'] }}">
<meta name="author" content="Pantoo">
<meta name="robots" content="{{ $robotsContent }}">
<link rel="canonical" href="{{ $canonicalUrl }}">
<link rel="alternate" hreflang="id-ID" href="{{ $alternateIdUrl }}">
<link rel="alternate" hreflang="en-US" href="{{ $alternateEnUrl }}">
<link rel="alternate" hreflang="x-default" href="{{ $alternateIdUrl }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Pantoo">
<meta property="og:title" content="{{ $copy['meta']['title'] }}">
<meta property="og:description" content="{{ $copy['meta']['description'] }}">
<meta property="og:url" content="{{ $canonicalUrl }}">
<meta property="og:locale" content="{{ $ogLocale }}">
<meta property="og:locale:alternate" content="{{ $ogLocaleAlternate }}">
<meta property="og:image" content="{{ $ogImageUrl }}">
<meta property="og:image:alt" content="{{ $copy['meta']['og_image_alt'] }}">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $copy['meta']['title'] }}">
<meta name="twitter:description" content="{{ $copy['meta']['description'] }}">
<meta name="twitter:image" content="{{ $ogImageUrl }}">
<link rel="icon" type="image/x-icon" href="{{ asset('pantoo.ico') }}">
<link rel="shortcut icon" href="{{ asset('pantoo.ico') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<script type="application/ld+json">{!! json_encode($schemaGraph, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}</script>
@vite(['resources/css/app.css', 'resources/js/app.js'])
