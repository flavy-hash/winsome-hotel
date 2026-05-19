<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Location — Winsome Hotel</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --ink:        #0B1220;
      --ink-soft:   #111827;
      --cream:      #F6F1E7;
      --ember:      #E8530A;
      --ember-glow: #F26B1F;
      --sky:        #6BAED6;
      --line:       rgba(246,241,231,0.1);
      --display:    'Poppins', system-ui, sans-serif;
      --body:       'Inter', system-ui, sans-serif;
    }
    html { scroll-behavior: smooth; }
    body { background: var(--ink); color: var(--cream); font-family: var(--body); min-height: 100vh; }
    a { color: inherit; text-decoration: none; }

    /* NAV */
    nav {
      position: sticky; top: 0; z-index: 100;
      display: flex; align-items: center; justify-content: space-between;
      padding: 20px 48px;
      background: rgba(11,18,32,0.95);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid var(--line);
    }
    .brand { display: flex; align-items: center; gap: 12px; text-decoration: none; }
    .brand-logo { height: 40px; width: auto; display: block; flex-shrink: 0; background: #fff; padding: 3px 6px; border-radius: 6px; }
    .brand-text { display: flex; flex-direction: column; gap: 2px; }
    .brand-name { font-family: var(--display); font-weight: 400; font-size: 17px; letter-spacing: -0.01em; color: var(--cream); line-height: 1.1; }
    .brand-tagline { font-family: var(--body); font-size: 9px; letter-spacing: 0.18em; text-transform: uppercase; color: var(--ember-glow); font-weight: 500; line-height: 1; }
    nav ul { list-style: none; display: flex; gap: 32px; }
    nav ul a { font-size: 13px; letter-spacing: 0.06em; color: rgba(246,241,231,0.7); transition: color 0.2s; }
    nav ul a:hover { color: var(--ember-glow); }
    .nav-cta {
      background: var(--ember); color: #fff !important;
      padding: 10px 22px; border-radius: 6px;
      font-size: 13px; font-weight: 500; letter-spacing: 0.04em;
      transition: background 0.2s;
    }
    .nav-cta:hover { background: var(--ember-glow) !important; color: #fff !important; }

    /* HERO STRIP */
    .loc-hero {
      padding: 64px 48px 0;
      max-width: 1280px; margin: 0 auto;
    }
    .eyebrow {
      font-size: 12px; letter-spacing: 0.2em; text-transform: uppercase;
      color: var(--ember); margin-bottom: 16px;
      display: flex; align-items: center; gap: 12px;
    }
    .eyebrow::before { content: ''; width: 24px; height: 1px; background: var(--ember); }
    .loc-hero h1 {
      font-family: var(--display);
      font-size: clamp(40px, 6vw, 72px);
      font-weight: 300; line-height: 1.05;
      margin-bottom: 20px;
    }
    .loc-hero h1 em { color: var(--ember-glow); font-style: italic; }
    .loc-hero p {
      font-size: 16px; color: rgba(246,241,231,0.65);
      line-height: 1.7; max-width: 560px;
      margin-bottom: 32px;
    }
    .btn-maps {
      display: inline-flex; align-items: center; gap: 10px;
      background: var(--ember); color: #fff;
      padding: 14px 28px; border-radius: 8px;
      font-size: 14px; font-weight: 500;
      transition: background 0.2s, transform 0.2s;
    }
    .btn-maps svg { width: 18px; height: 18px; }
    .btn-maps:hover { background: var(--ember-glow); transform: translateY(-1px); }

    /* MAIN GRID */
    .loc-grid {
      display: grid;
      grid-template-columns: 1fr 360px;
      gap: 32px;
      max-width: 1280px;
      margin: 40px auto 80px;
      padding: 0 48px;
      align-items: start;
    }

    /* MAP */
    .map-wrap {
      border-radius: 16px;
      overflow: hidden;
      border: 1px solid var(--line);
      aspect-ratio: 4/3;
      background: var(--ink-soft);
    }
    .map-wrap iframe {
      width: 100%; height: 100%;
      display: block; border: 0;
    }

    /* INFO CARD */
    .loc-card {
      background: var(--ink-soft);
      border: 1px solid var(--line);
      border-radius: 16px;
      padding: 32px;
      position: sticky; top: 88px;
    }
    .loc-card-title {
      font-family: var(--display);
      font-size: 24px; font-weight: 400;
      margin-bottom: 28px;
      padding-bottom: 20px;
      border-bottom: 1px solid var(--line);
    }
    .info-row {
      display: flex; gap: 14px;
      margin-bottom: 22px;
      align-items: flex-start;
    }
    .info-icon {
      width: 36px; height: 36px;
      background: rgba(232,83,10,0.15);
      border-radius: 8px;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
    }
    .info-icon svg { width: 17px; height: 17px; color: var(--ember-glow); }
    .info-label { font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(246,241,231,0.4); margin-bottom: 4px; }
    .info-value { font-size: 14px; color: var(--cream); line-height: 1.5; }
    .info-value a { color: var(--ember-glow); }
    .info-value a:hover { text-decoration: underline; }

    .directions-btn {
      display: flex; align-items: center; justify-content: center; gap: 8px;
      width: 100%; margin-top: 8px;
      background: var(--ember); color: #fff;
      padding: 14px; border-radius: 10px;
      font-size: 13px; font-weight: 500;
      transition: background 0.2s;
    }
    .directions-btn svg { width: 16px; height: 16px; }
    .directions-btn:hover { background: var(--ember-glow); }

    /* WA FLOAT */
    .wa-float {
      position: fixed; bottom: 28px; right: 28px;
      width: 58px; height: 58px;
      background: #25d366; border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      box-shadow: 0 6px 24px rgba(37,211,102,0.45);
      z-index: 9999; transition: transform 0.2s, box-shadow 0.2s;
      text-decoration: none;
    }
    .wa-float svg { width: 30px; height: 30px; color: #fff; }
    .wa-float:hover { transform: scale(1.08); box-shadow: 0 10px 32px rgba(37,211,102,0.55); }
    .wa-tooltip {
      position: absolute; right: 68px;
      background: var(--ink); color: var(--cream);
      font-size: 12px; font-weight: 500;
      white-space: nowrap; padding: 6px 14px;
      border-radius: 8px; opacity: 0;
      pointer-events: none; transition: opacity 0.2s;
    }
    .wa-tooltip::after {
      content: ''; position: absolute;
      right: -6px; top: 50%; transform: translateY(-50%);
      border: 6px solid transparent;
      border-right: none; border-left-color: var(--ink);
    }
    .wa-float:hover .wa-tooltip { opacity: 1; }

    /* RESPONSIVE */

    /* Tablet */
    @media (max-width: 900px) {
      nav { padding: 16px 24px; }
      nav ul { display: none; }
      .loc-hero { padding: 40px 24px 0; }
      .loc-grid { grid-template-columns: 1fr; padding: 0 24px; gap: 24px; }
      .loc-card { position: static; }
      .map-wrap { aspect-ratio: 3/2; }
    }

    /* Mobile */
    @media (max-width: 640px) {
      nav { padding: 14px 16px; }
      .loc-hero { padding: 28px 16px 0; }
      .loc-hero h1 { font-size: clamp(30px, 8vw, 48px); }
      .loc-hero p { font-size: 14px; }
      .btn-maps { width: 100%; justify-content: center; padding: 12px 20px; font-size: 13px; }
      .loc-grid { padding: 0 16px; margin: 24px auto 48px; gap: 16px; }
      .map-wrap { aspect-ratio: 1/1; border-radius: 12px; }
      .loc-card { padding: 22px 18px; border-radius: 12px; }
      .loc-card-title { font-size: 20px; margin-bottom: 20px; padding-bottom: 16px; }
      .info-row { gap: 10px; margin-bottom: 16px; }
      .info-icon { width: 30px; height: 30px; border-radius: 6px; }
      .info-icon svg { width: 14px; height: 14px; }
      .info-value { font-size: 13px; }
      .directions-btn { padding: 12px; font-size: 12px; }
    }

    /* Small phones */
    @media (max-width: 400px) {
      nav { padding: 12px; }
      .loc-hero { padding: 20px 12px 0; }
      .loc-grid { padding: 0 12px; }
      .map-wrap { aspect-ratio: 4/5; }
      .loc-card { padding: 16px 14px; }
    }

    /* Bottom Navigation */
    .bottom-nav {
      display: none;
      position: fixed;
      bottom: 0; left: 0; right: 0;
      background: var(--ink-soft);
      border-top: 1px solid var(--line);
      box-shadow: 0 -4px 16px rgba(0,0,0,0.3);
      z-index: 2000;
      padding: 6px 0 max(6px, env(safe-area-inset-bottom));
    }
    .bottom-nav-inner { display: flex; justify-content: space-around; align-items: center; }
    .bottom-nav a {
      display: flex; flex-direction: column; align-items: center; gap: 3px;
      color: rgba(246,241,231,0.55); font-size: 10px; font-family: var(--body);
      letter-spacing: 0.04em; text-decoration: none;
      padding: 6px 8px; border-radius: 8px; transition: color 0.2s; min-width: 52px;
    }
    .bottom-nav a svg { width: 20px; height: 20px; }
    .bottom-nav a:hover, .bottom-nav a.active { color: var(--ember-glow); }
    .bottom-nav a.bn-dir {
      color: #fff; background: var(--ember);
      border-radius: 10px; padding: 6px 12px;
    }
    .bottom-nav a.bn-dir:hover { background: var(--ember-glow); }
    @media (min-width: 768px) { .bottom-nav { display: none !important; } }
    @media (max-width: 640px) {
      body { padding-bottom: 72px; }
      .bottom-nav { display: block; }
    }
  </style>
</head>
<body>

<nav>
  <a href="{{ url('/') }}" class="brand">
    @php
      $logoFile = collect(['logo.png','logo.svg','logo.jpg','logo.webp'])
        ->first(fn($f) => file_exists(public_path("images/{$f}")));
    @endphp
    @if($logoFile)
      <img src="{{ asset('images/' . $logoFile) }}" alt="Winsome Hotel" class="brand-logo">
    @endif
    <div class="brand-text">
      <span class="brand-name">Winsome Hotel</span>
      <span class="brand-tagline">Charm, Luxury, Comfort</span>
    </div>
  </a>
  <ul>
    <li><a href="{{ url('/') }}#rooms">Rooms</a></li>
    <li><a href="{{ url('/') }}#about">The hotel</a></li>
    <li><a href="{{ url('/') }}#facilities">Facilities</a></li>
    <li><a href="{{ route('location') }}" style="color:var(--ember-glow);">Location</a></li>
    <li><a href="{{ url('/') }}#contact">Contact</a></li>
  </ul>
  <a href="{{ url('/') }}#book" class="nav-cta">Book a stay</a>
</nav>

<!-- HERO -->
<div class="loc-hero">
  <div class="eyebrow">Find Us</div>
  <h1>We're easy to<br><em>find, hard to leave.</em></h1>
  <p>Nestled in Mkonoo, Terat — about 13 km from Arusha Airport and 11 km from the city centre, with spectacular views of Mount Meru and Mount Kilimanjaro.</p>
  <a href="https://maps.app.goo.gl/3XwgBC1MiFsepBE18" target="_blank" rel="noopener" class="btn-maps">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
    Open in Google Maps
  </a>
</div>

<!-- GRID: MAP + INFO CARD -->
<div class="loc-grid">

  <!-- MAP EMBED -->
  <div class="map-wrap">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d757.262417315306!2d36.70131164254656!3d-3.4675820931496246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e6!4m3!3m2!1d-3.3558876!2d36.6849352!4m3!3m2!1d-3.4673366999999997!2d36.7014235!5e1!3m2!1sen!2stz!4v1779097311332!5m2!1sen!2stz"
      allowfullscreen
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>

  <!-- INFO CARD -->
  <div class="loc-card">
    <div class="loc-card-title">Winsome Hotel</div>

    <div class="info-row">
      <div class="info-icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
      </div>
      <div>
        <div class="info-label">Address</div>
        <div class="info-value">Mkonoo, Terat<br>Arusha CBD, Arusha<br>Tanzania</div>
      </div>
    </div>

    <div class="info-row">
      <div class="info-icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.15 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.07 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.09 8.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21 16z"/></svg>
      </div>
      <div>
        <div class="info-label">Phone</div>
        <div class="info-value"><a href="tel:+255793411998">+255 793 411 998</a></div>
      </div>
    </div>

    <div class="info-row">
      <div class="info-icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="color:#25d366"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413"/></svg>
      </div>
      <div>
        <div class="info-label">WhatsApp</div>
        <div class="info-value"><a href="https://wa.me/255793411998" target="_blank" rel="noopener">+255 793 411 998</a></div>
      </div>
    </div>

    <div class="info-row">
      <div class="info-icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
      </div>
      <div>
        <div class="info-label">Check-in / Check-out</div>
        <div class="info-value">From 1:30 PM &nbsp;/&nbsp; By 10:30 PM</div>
      </div>
    </div>

    <div class="info-row" style="margin-bottom:24px;">
      <div class="info-icon">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
      </div>
      <div>
        <div class="info-label">Distances</div>
        <div class="info-value">
          ~13 km from Arusha Airport<br>
          ~11 km from Arusha City Centre<br>
          ~3 km off Arusha Bypass Road
        </div>
      </div>
    </div>

    <a href="https://maps.app.goo.gl/3XwgBC1MiFsepBE18" target="_blank" rel="noopener" class="directions-btn">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="3 11 22 2 13 21 11 13 3 11"/></svg>
      Get Directions
    </a>
  </div>

</div>

<!-- BOTTOM NAV (mobile) -->
<div class="bottom-nav">
  <div class="bottom-nav-inner">
    <a href="{{ url('/') }}">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
      Home
    </a>
    <a href="{{ route('rooms.index') }}">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
      Rooms
    </a>
    <a href="https://maps.app.goo.gl/3XwgBC1MiFsepBE18" target="_blank" rel="noopener" class="bn-dir">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="3 11 22 2 13 21 11 13 3 11"/></svg>
      Directions
    </a>
    <a href="{{ route('location') }}" class="active">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
      Location
    </a>
    <a href="https://wa.me/255793411998" target="_blank" rel="noopener">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="color:#25d366"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413"/></svg>
      Chat
    </a>
  </div>
</div>

<!-- WA FLOAT -->
<a href="https://wa.me/255793411998" target="_blank" rel="noopener" class="wa-float" aria-label="Chat with us on WhatsApp">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413"/></svg>
  <span class="wa-tooltip">Chat with us</span>
</a>

</body>
</html>
