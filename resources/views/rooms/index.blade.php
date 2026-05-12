<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Our Rooms — Winsome Hotel, Arusha</title>
<meta name="description" content="Browse all available rooms and suites at Winsome Hotel, Arusha. Book directly for the best rate.">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,300;9..144,400;9..144,500&family=Inter+Tight:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  html { scroll-behavior: smooth; }
  :root {
    --ink:        #0B1220;
    --ink-soft:   #131C2E;
    --ink-mid:    #1A2438;
    --ember:      #F26B1F;
    --ember-deep: #C44E0E;
    --ember-glow: #FFB070;
    --sky:        #2C6FB5;
    --sky-light:  #6EA8DD;
    --cream:      #F6F1E7;
    --cream-deep: #EBE3D2;
    --line:       rgba(255,255,255,0.07);
    --display:    'Fraunces', Georgia, serif;
    --body:       'Inter Tight', system-ui, sans-serif;
  }
  body {
    background: var(--ink); color: var(--cream);
    font-family: var(--body); font-size: 16px; line-height: 1.6;
    -webkit-font-smoothing: antialiased;
  }
  body::before {
    content: ''; position: fixed; inset: 0;
    background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='200' height='200'><filter id='n'><feTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='2' stitchTiles='stitch'/><feColorMatrix values='0 0 0 0 0  0 0 0 0 0  0 0 0 0 0  0 0 0 0.06 0'/></filter><rect width='200' height='200' filter='url(%23n)'/></svg>");
    pointer-events: none; z-index: 9999; opacity: 0.5; mix-blend-mode: multiply;
  }
  a { color: inherit; text-decoration: none; }
  img { max-width: 100%; display: block; }

  /* ── NAV ── */
  nav {
    position: sticky; top: 0; z-index: 200;
    background: var(--ink);
    display: flex; align-items: center; justify-content: space-between;
    padding: 0 48px; height: 68px;
    border-bottom: 1px solid var(--line);
  }
  .brand-logo { height: 32px; width: auto; display: block; }
  .brand-text { font-family: var(--display); font-size: 20px; font-weight: 400; color: var(--cream); }
  nav ul { display: flex; gap: 32px; list-style: none; font-size: 13px; letter-spacing: 0.04em; }
  nav ul a { color: rgba(246,241,231,0.6); transition: color 0.2s; }
  nav ul a:hover { color: var(--cream); }
  .nav-cta { background: var(--ember); color: var(--ink) !important; padding: 10px 22px; border-radius: 100px; font-weight: 500; }

  /* ── PAGE HERO ── */
  .page-hero {
    padding: 80px 48px 72px;
    position: relative; overflow: hidden;
  }
  .page-hero::before {
    content: ''; position: absolute; top: 50%; left: 50%;
    transform: translate(-50%,-50%);
    width: 700px; height: 700px; background: var(--ember);
    border-radius: 50%; filter: blur(180px); opacity: 0.09;
  }
  .hero-inner {
    position: relative; z-index: 2;
    max-width: 1200px; margin: 0 auto;
    display: flex; align-items: flex-end; justify-content: space-between;
    flex-wrap: wrap; gap: 24px;
  }
  .hero-eyebrow { font-size: 11px; letter-spacing: 0.2em; text-transform: uppercase; color: var(--ember); margin-bottom: 14px; font-weight: 500; }
  .hero-title { font-family: var(--display); font-weight: 300; font-size: clamp(32px,4.5vw,56px); letter-spacing: -0.02em; color: var(--cream); line-height: 1.1; margin-bottom: 10px; }
  .hero-title em { font-style: italic; color: var(--ember); }
  .hero-sub { font-size: 15px; color: rgba(246,241,231,0.45); max-width: 400px; }
  .room-count { font-family: var(--display); font-size: 72px; font-weight: 300; color: rgba(246,241,231,0.08); line-height: 1; }

  /* ── ROOMS GRID ── */
  .page-wrap { max-width: 1200px; margin: 0 auto; padding: 0 48px 100px; }
  .rooms-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 28px;
  }

  .room-card {
    background: var(--ink-soft);
    border-radius: 20px; overflow: hidden;
    border: 1px solid var(--line);
    transition: transform 0.3s, box-shadow 0.3s;
  }
  .room-card:hover { transform: translateY(-6px); box-shadow: 0 20px 60px rgba(0,0,0,0.4); }

  /* Image area */
  .room-img {
    position: relative; height: 260px; overflow: hidden; background: var(--ink-mid);
  }
  .room-img img {
    position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;
    transition: transform 0.5s;
  }
  .room-card:hover .room-img img { transform: scale(1.04); }
  .room-tag {
    position: absolute; top: 18px; left: 18px; z-index: 2;
    background: var(--ember); color: var(--ink);
    font-size: 11px; font-weight: 700; letter-spacing: 0.08em; text-transform: lowercase;
    padding: 5px 14px; border-radius: 100px;
  }
  .room-img-placeholder {
    position: absolute; inset: 0;
    background: linear-gradient(135deg, var(--ink-mid), var(--ink-soft));
    display: flex; align-items: center; justify-content: center;
  }
  .room-img-placeholder span { font-size: 48px; opacity: 0.15; }

  /* Content */
  .room-content { padding: 28px 30px 30px; }
  .room-name { font-family: var(--display); font-size: 26px; font-weight: 300; color: var(--cream); margin-bottom: 8px; letter-spacing: -0.01em; }
  .room-meta { font-size: 13px; color: rgba(246,241,231,0.45); margin-bottom: 16px; line-height: 1.5; }
  .room-features { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 24px; }
  .feature {
    font-size: 12px; border: 1px solid rgba(255,255,255,0.12);
    color: rgba(246,241,231,0.55); padding: 4px 12px; border-radius: 100px;
  }
  .room-footer {
    display: flex; align-items: center; justify-content: space-between;
    padding-top: 20px; border-top: 1px solid var(--line);
  }
  .room-price { font-family: var(--display); font-size: 28px; font-weight: 300; color: var(--ember); }
  .room-price small { font-family: var(--body); font-size: 13px; color: rgba(246,241,231,0.4); margin-left: 4px; }
  .room-actions { display: flex; gap: 16px; align-items: center; }
  .btn-read {
    font-size: 13px; font-weight: 500; color: rgba(246,241,231,0.6);
    border-bottom: 1px solid rgba(246,241,231,0.25);
    padding-bottom: 2px; letter-spacing: 0.05em; text-transform: uppercase;
    transition: color 0.2s, border-color 0.2s;
  }
  .btn-read:hover { color: var(--cream); border-color: var(--cream); }
  .btn-reserve {
    font-size: 13px; font-weight: 500; color: var(--ember);
    border-bottom: 1px solid rgba(242,107,31,0.35);
    padding-bottom: 2px; letter-spacing: 0.05em; text-transform: uppercase;
    transition: color 0.2s, border-color 0.2s;
  }
  .btn-reserve:hover { color: var(--ember-glow); border-color: var(--ember-glow); }

  /* ── EMPTY STATE ── */
  .no-rooms {
    text-align: center; padding: 120px 24px; grid-column: span 2;
    color: rgba(246,241,231,0.3); font-size: 16px;
  }
  .no-rooms p { margin-bottom: 8px; }

  /* ── FOOTER ── */
  footer {
    background: var(--ink-soft); border-top: 1px solid var(--line);
    color: rgba(246,241,231,0.3); text-align: center;
    padding: 40px 48px; font-size: 13px;
  }
  footer strong { color: rgba(246,241,231,0.65); }
  footer a { color: rgba(246,241,231,0.45); transition: color 0.2s; }
  footer a:hover { color: var(--ember); }

  @media (max-width: 960px) {
    nav, .page-hero, .page-wrap { padding-left: 24px; padding-right: 24px; }
    .rooms-grid { grid-template-columns: 1fr; }
    nav ul { display: none; }
    .room-img { height: 220px; }
  }
</style>
</head>
<body>

{{-- NAV --}}
<nav>
  <a href="{{ url('/') }}">
    @php $logoFile = collect(['logo.png','logo.svg','logo.jpg','logo.webp'])->first(fn($f) => file_exists(public_path("images/{$f}"))); @endphp
    @if($logoFile)
      <img src="{{ asset('images/'.$logoFile) }}" alt="Winsome Hotel" class="brand-logo">
    @else
      <span class="brand-text">Winsome</span>
    @endif
  </a>
  <ul>
    <li><a href="{{ url('/') }}#rooms">Rooms</a></li>
    <li><a href="{{ url('/') }}#about">About</a></li>
    <li><a href="{{ url('/') }}#experiences">Experiences</a></li>
    <li><a href="{{ route('reviews.index') }}">Reviews</a></li>
    <li><a href="{{ url('/') }}#book" class="nav-cta">Book a stay</a></li>
  </ul>
</nav>

{{-- HERO --}}
<div class="page-hero">
  <div class="hero-inner">
    <div>
      <div class="hero-eyebrow">Winsome Hotel · Arusha</div>
      <h1 class="hero-title">Find your perfect <em>room</em>.</h1>
      <p class="hero-sub">{{ $rooms->count() }} {{ Str::plural('room', $rooms->count()) }} available — book directly for the best rate.</p>
    </div>
    <div class="room-count">{{ $rooms->count() }}</div>
  </div>
</div>

{{-- ROOMS GRID --}}
<div class="page-wrap">
  <div class="rooms-grid">
    @forelse($rooms as $index => $room)
    <div class="room-card">

      {{-- Image --}}
      <div class="room-img">
        @if($room->image_path)
          <img src="{{ asset('storage/' . $room->image_path) }}" alt="{{ $room->name }}">
        @else
          <div class="room-img-placeholder"><span>🛏</span></div>
        @endif
        @if($room->tag)
          <span class="room-tag">{{ $room->tag }}</span>
        @endif
      </div>

      {{-- Details --}}
      <div class="room-content">
        <h2 class="room-name">{{ $room->name }}</h2>
        <div class="room-meta">
          {{ implode(' · ', array_filter([
            $room->size_sqm ? $room->size_sqm . 'm²' : null,
            $room->bed_type,
            $room->description ? \Illuminate\Support\Str::limit($room->description, 80) : null
          ])) }}
        </div>

        @if($room->features && count($room->features))
        <div class="room-features">
          @foreach(array_slice($room->features, 0, 5) as $feature)
            <span class="feature">{{ $feature }}</span>
          @endforeach
        </div>
        @endif

        <div class="room-footer">
          <div class="room-price">
            ${{ number_format($room->price_per_night, 0) }}<small>/ night</small>
          </div>
          <div class="room-actions">
            <a href="{{ route('rooms.show', $room) }}" class="btn-read">Read more</a>
            <a href="{{ url('/') }}#book" class="btn-reserve"
               data-room-id="{{ $room->id }}"
               onclick="event.preventDefault();sessionStorage.setItem('preselect_room','{{ $room->id }}');window.location='{{ url('/') }}#book'">
              Reserve
            </a>
          </div>
        </div>
      </div>

    </div>
    @empty
    <div class="no-rooms">
      <p>No rooms available at the moment.</p>
      <p style="font-size:13px;">Check back soon — new rooms are added regularly.</p>
    </div>
    @endforelse
  </div>
</div>

<footer>
  <p style="font-size:15px;margin-bottom:8px;"><strong>Winsome Hotel</strong></p>
  <p>Arusha, Tanzania &nbsp;·&nbsp; <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a></p>
  <p style="margin-top:12px;border-top:1px solid rgba(255,255,255,0.06);padding-top:12px;">
    &copy; {{ date('Y') }} Winsome Hotel &middot;
    <a href="{{ url('/') }}">Back to homepage</a>
  </p>
</footer>

</body>
</html>
