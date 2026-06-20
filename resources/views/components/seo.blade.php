@props([
    'title'       => 'Winsome Hotel — Charm, Luxury & Comfort in Arusha, Tanzania',
    'description' => 'Winsome Hotel is a boutique hotel in Arusha, Tanzania. Comfortable rooms, spectacular views of Mount Meru and Kilimanjaro. Book directly for the best rate.',
    'image'       => null,
    'url'         => null,
    'type'        => 'website',
    'schema'      => null,
])

{{-- Primary Meta --}}
<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="Winsome Hotel, hotel Arusha, Tanzania hotel, accommodation Arusha, Mount Meru view, Kilimanjaro view, boutique hotel Tanzania">
<meta name="robots" content="index, follow">
<meta name="author" content="Winsome Hotel">
<link rel="canonical" href="{{ $url ?? url()->current() }}">

{{-- Open Graph (Facebook, WhatsApp, LinkedIn) --}}
<meta property="og:type"        content="{{ $type }}">
<meta property="og:title"       content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:url"         content="{{ $url ?? url()->current() }}">
<meta property="og:image"       content="{{ $image ?? asset('images/winsome3.jpeg') }}">
<meta property="og:image:width"  content="1200">
<meta property="og:image:height" content="630">
<meta property="og:site_name"   content="Winsome Hotel">
<meta property="og:locale"      content="en_US">

{{-- Twitter Card --}}
<meta name="twitter:card"        content="summary_large_image">
<meta name="twitter:title"       content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image"       content="{{ $image ?? asset('images/winsome3.jpeg') }}">

{{-- JSON-LD Structured Data --}}
@if($schema)
<script type="application/ld+json">{!! $schema !!}</script>
@endif
