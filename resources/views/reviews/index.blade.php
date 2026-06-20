<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<x-seo
    title="Guest Reviews — Winsome Hotel Arusha | What Our Guests Say"
    description="Read genuine guest reviews for Winsome Hotel in Arusha, Tanzania. See why travellers love our comfortable rooms, friendly staff and spectacular mountain views."
    :image="asset('images/winsome3.jpeg')"
/>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter+Tight:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  html { scroll-behavior: smooth; overflow-x: hidden; max-width: 100%; }
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
    --line-dark:  rgba(255,255,255,0.07);
    --line-light: rgba(11,18,32,0.09);
    --display:    'Poppins', system-ui, sans-serif;
    --body:       'Inter Tight', system-ui, sans-serif;
  }
  body { background: var(--cream); color: var(--ink); font-family: var(--body); font-size: 16px; line-height: 1.6; -webkit-font-smoothing: antialiased; overflow-x: hidden; max-width: 100%; }
  body::before {
    content: ''; position: fixed;
    top: 0; left: 0; width: 100vw; height: 100vh;
    background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='200' height='200'><filter id='n'><feTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='2' stitchTiles='stitch'/><feColorMatrix values='0 0 0 0 0  0 0 0 0 0  0 0 0 0 0  0 0 0 0.05 0'/></filter><rect width='200' height='200' filter='url(%23n)'/></svg>");
    pointer-events: none; z-index: 9999; opacity: 0.4; mix-blend-mode: multiply; overflow: hidden;
  }
  a { color: inherit; text-decoration: none; }
  img { max-width: 100%; display: block; }

  /* ── NAV ── */
  nav {
    position: sticky; top: 0; z-index: 200;
    background: var(--ink);
    display: flex; align-items: center; justify-content: space-between;
    padding: 0 48px; height: 68px;
    border-bottom: 1px solid var(--line-dark);
  }
  .brand { display: flex; align-items: center; gap: 12px; text-decoration: none; }
  .brand-logo { height: 40px; width: auto; display: block; flex-shrink: 0; background: #fff; padding: 3px 6px; border-radius: 6px; }
  .brand-text { display: flex; flex-direction: column; gap: 2px; }
  .brand-name { font-family: var(--display); font-weight: 400; font-size: 17px; letter-spacing: -0.01em; color: var(--cream); line-height: 1.1; }
  .brand-tagline { font-family: var(--body); font-size: 9px; letter-spacing: 0.18em; text-transform: uppercase; color: var(--ember-glow); font-weight: 500; line-height: 1; }
  nav ul { display: flex; gap: 32px; list-style: none; font-size: 13px; letter-spacing: 0.04em; }
  nav ul a { color: rgba(246,241,231,0.6); transition: color 0.2s; }
  nav ul a:hover { color: var(--cream); }
  .nav-cta { background: var(--ember); color: var(--ink) !important; padding: 10px 22px; border-radius: 100px; font-weight: 500; }

  /* ── PAGE HERO ── */
  .page-hero {
    background: var(--ink);
    padding: 80px 48px 72px; position: relative; overflow: hidden;
  }
  .page-hero::before {
    content: ''; position: absolute; top: 50%; left: 50%;
    transform: translate(-50%,-50%);
    width: 600px; height: 600px; background: var(--ember);
    border-radius: 50%; filter: blur(160px); opacity: 0.12;
  }
  .hero-inner {
    position: relative; z-index: 2;
    max-width: 1200px; margin: 0 auto;
    display: flex; align-items: flex-end; justify-content: space-between;
    flex-wrap: wrap; gap: 32px;
  }
  .hero-text .eyebrow { font-size: 11px; letter-spacing: 0.2em; text-transform: uppercase; color: var(--ember); margin-bottom: 14px; font-weight: 500; }
  .hero-text h1 { font-family: var(--display); font-weight: 300; font-size: clamp(32px, 4.5vw, 56px); letter-spacing: -0.02em; color: var(--cream); line-height: 1.1; margin-bottom: 12px; }
  .hero-text h1 em { font-style: italic; color: var(--ember); }
  .hero-text p { font-size: 15px; color: rgba(246,241,231,0.5); max-width: 440px; }
  .btn-write-review {
    display: inline-flex; align-items: center; gap: 10px;
    background: var(--ember); color: var(--ink);
    padding: 14px 28px; border-radius: 100px;
    font-family: var(--body); font-size: 14px; font-weight: 600;
    letter-spacing: 0.02em; cursor: pointer; border: none;
    transition: background 0.2s; white-space: nowrap; flex-shrink: 0;
  }
  .btn-write-review:hover { background: var(--ember-deep); color: #fff; }

  /* ── FLASH MESSAGES ── */
  .flash-wrap { max-width: 1200px; margin: 0 auto; padding: 0 48px; }
  .flash-success {
    margin-top: 24px;
    background: rgba(34,197,94,0.12); border: 1px solid rgba(34,197,94,0.3);
    border-radius: 12px; padding: 16px 20px;
    font-size: 14px; color: #4ade80;
  }
  .flash-error {
    margin-top: 24px;
    background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.25);
    border-radius: 12px; padding: 16px 20px;
    font-size: 14px; color: #f87171;
  }

  /* ── SCORE STRIP ── */
  .score-strip {
    background: var(--cream-deep);
    border-bottom: 1px solid var(--line-light);
    padding: 32px 48px;
    display: flex; align-items: center; justify-content: center;
    gap: 48px; flex-wrap: wrap;
  }
  .score-main { display: flex; align-items: center; gap: 16px; }
  .score-big { font-family: var(--display); font-size: 72px; font-weight: 300; color: var(--ink); line-height: 1; }
  .score-stars { display: flex; gap: 4px; margin-bottom: 6px; }
  .score-stars svg { width: 20px; height: 20px; }
  .sf { fill: #F26B1F; }
  .se { fill: rgba(11,18,32,0.15); }
  .score-meta { font-size: 14px; color: rgba(11,18,32,0.5); }
  .score-sep { width: 1px; height: 60px; background: var(--line-light); }
  .score-cats { display: flex; gap: 32px; flex-wrap: wrap; align-items: center; }
  .score-cat { text-align: center; }
  .score-cat-label { font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(11,18,32,0.45); margin-bottom: 6px; }
  .score-cat-val { font-family: var(--display); font-size: 28px; color: var(--ink); }
  .score-cat-bar { height: 4px; background: rgba(11,18,32,0.1); border-radius: 2px; margin-top: 6px; width: 80px; overflow: hidden; }
  .score-cat-fill { height: 100%; background: var(--ember); border-radius: 2px; }

  /* ── CONTENT ── */
  .page-wrap { max-width: 1200px; margin: 0 auto; padding: 64px 48px 100px; }

  /* ── FILTER BAR ── */
  .filter-bar { display: flex; align-items: center; gap: 10px; margin-bottom: 48px; flex-wrap: wrap; }
  .filter-label { font-size: 13px; color: rgba(11,18,32,0.5); margin-right: 4px; }
  .filter-btn {
    border: 1px solid rgba(11,18,32,0.15); background: #fff;
    color: var(--ink); padding: 8px 18px; border-radius: 100px;
    font-family: var(--body); font-size: 13px; cursor: pointer; transition: all 0.2s;
  }
  .filter-btn.active, .filter-btn:hover { background: var(--ink); color: var(--cream); border-color: var(--ink); }

  /* ── REVIEWS GRID ── */
  .reviews-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 56px; }
  .rv-card {
    background: #fff; border-radius: 20px; padding: 28px 30px;
    box-shadow: 0 2px 16px rgba(11,18,32,0.07);
    border: 1px solid rgba(11,18,32,0.08);
    display: flex; flex-direction: column; gap: 14px;
    transition: box-shadow 0.25s, transform 0.25s;
    overflow: hidden; min-width: 0;
  }
  .rv-card:hover { transform: translateY(-3px); box-shadow: 0 8px 32px rgba(11,18,32,0.11); }

  /* Head row: avatar | name+room | stars+date */
  .rv-head { display: flex; align-items: center; gap: 12px; min-width: 0; }
  .rv-avatar {
    width: 44px; height: 44px; border-radius: 50%; flex-shrink: 0;
    object-fit: cover; border: 2px solid rgba(11,18,32,0.08);
  }
  .rv-avatar-init {
    width: 44px; height: 44px; border-radius: 50%; flex-shrink: 0;
    background: #EAEAEA; color: var(--ink);
    display: flex; align-items: center; justify-content: center;
    font-family: var(--display); font-size: 18px; font-weight: 500;
  }
  .rv-info { flex: 1; min-width: 0; overflow: hidden; }
  .rv-name { font-weight: 700; font-size: 15px; color: var(--ink); line-height: 1.2; overflow-wrap: break-word; word-break: break-word; }
  .rv-room-tag {
    display: block; margin-top: 3px;
    font-size: 12px; color: rgba(11,18,32,0.45);
  }
  .rv-room-tag strong { color: var(--ink); font-weight: 600; }
  .rv-right { text-align: right; flex-shrink: 0; }
  .rv-stars { display: flex; gap: 2px; justify-content: flex-end; }
  .rv-stars svg { width: 15px; height: 15px; }
  .rv-date { font-size: 12px; color: rgba(11,18,32,0.35); margin-top: 5px; }

  /* Content */
  .rv-title { font-family: var(--display); font-size: 17px; font-weight: 400; color: var(--ink); line-height: 1.3; overflow-wrap: break-word; word-break: break-word; }
  .rv-body { font-size: 14px; color: #C06000; line-height: 1.75; flex: 1; overflow-wrap: break-word; word-break: break-word; }
  .rv-sub {
    display: flex; gap: 16px; padding-top: 12px;
    border-top: 1px solid rgba(11,18,32,0.06); flex-wrap: wrap;
  }
  .rv-sub span { font-size: 11px; color: rgba(11,18,32,0.4); }
  .rv-sub strong { color: var(--ember); }

  /* ── EMPTY STATE ── */
  .no-reviews { text-align: center; padding: 80px 24px; color: rgba(11,18,32,0.4); font-size: 16px; }

  /* ── PAGINATION ── */
  .pagination-wrap { display: flex; justify-content: center; gap: 8px; padding-top: 8px; }
  .pagination-wrap nav { display: flex; gap: 6px; }
  .pagination-wrap span[aria-current],
  .pagination-wrap a {
    display: inline-flex; align-items: center; justify-content: center;
    min-width: 40px; height: 40px; padding: 0 10px;
    border-radius: 100px; font-size: 14px;
    border: 1px solid rgba(11,18,32,0.15);
    color: var(--ink); background: #fff;
    transition: all 0.2s;
  }
  .pagination-wrap span[aria-current] { background: var(--ink); color: var(--cream); border-color: var(--ink); }
  .pagination-wrap a:hover { background: var(--ink); color: var(--cream); border-color: var(--ink); }

  /* ── MODAL OVERLAY ── */
  .modal-backdrop {
    display: none; position: fixed; inset: 0; z-index: 500;
    background: rgba(11,18,32,0.85);
    align-items: center; justify-content: center;
    padding: 24px;
  }
  .modal-backdrop.open { display: flex; }

  .modal-box {
    background: var(--ink-soft);
    border: 1px solid var(--line-dark);
    border-radius: 24px; width: 100%; max-width: 640px;
    max-height: 92vh; overflow-y: auto;
    position: relative; box-shadow: 0 32px 80px rgba(0,0,0,0.5);
  }

  .modal-header {
    background: var(--ink);
    padding: 28px 32px;
    border-radius: 24px 24px 0 0;
    display: flex; align-items: flex-start; justify-content: space-between; gap: 16px;
    border-bottom: 1px solid var(--line-dark);
  }
  .modal-header-icon {
    width: 44px; height: 44px; border-radius: 12px;
    background: rgba(242,107,31,0.15);
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; flex-shrink: 0;
  }
  .modal-header h3 { font-family: var(--display); font-size: 24px; font-weight: 300; color: var(--cream); margin-bottom: 4px; }
  .modal-header p { font-size: 13px; color: rgba(246,241,231,0.45); }
  .modal-close {
    background: none; border: none; color: rgba(246,241,231,0.4);
    font-size: 22px; cursor: pointer; line-height: 1;
    transition: color 0.2s; flex-shrink: 0; padding: 4px;
  }
  .modal-close:hover { color: var(--cream); }

  .modal-body { padding: 32px; }

  /* Modal form fields */
  .mf-label { font-size: 11px; letter-spacing: 0.15em; text-transform: uppercase; color: var(--sky-light); display: block; margin-bottom: 7px; font-weight: 600; }
  .mf-input {
    width: 100%; background: var(--ink-mid);
    border: 1px solid rgba(255,255,255,0.1); color: var(--cream);
    border-radius: 10px; padding: 12px 16px;
    font-family: var(--body); font-size: 14px; outline: none; margin-bottom: 18px;
    transition: border-color 0.2s; appearance: none;
  }
  .mf-input:focus { border-color: var(--ember); }
  .mf-input::placeholder { color: rgba(246,241,231,0.25); }
  .mf-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

  /* Star picker */
  .star-picker { display: flex; flex-direction: row-reverse; gap: 6px; justify-content: flex-end; margin-bottom: 18px; }
  .star-picker input { display: none; }
  .star-picker label { cursor: pointer; font-size: 34px; color: rgba(246,241,231,0.2); transition: color 0.15s; line-height: 1; }
  .star-picker input:checked ~ label,
  .star-picker label:hover,
  .star-picker label:hover ~ label { color: var(--ember); }

  /* File input */
  .file-area {
    border: 1px dashed rgba(255,255,255,0.15); border-radius: 10px;
    padding: 18px; text-align: center; cursor: pointer;
    transition: border-color 0.2s; margin-bottom: 18px;
    background: var(--ink-mid);
  }
  .file-area:hover { border-color: var(--ember); }
  .file-area input { display: none; }
  .file-area-label { font-size: 13px; color: rgba(246,241,231,0.45); cursor: pointer; }
  .file-area-label strong { color: var(--ember); }

  /* Field error */
  .field-error { font-size: 12px; color: #f87171; margin-top: -14px; margin-bottom: 14px; }

  .modal-footer { padding: 0 32px 28px; display: flex; gap: 12px; justify-content: flex-end; }
  .btn-cancel {
    padding: 12px 24px; border-radius: 100px;
    border: 1px solid rgba(255,255,255,0.15); background: none;
    color: rgba(246,241,231,0.6); font-family: var(--body); font-size: 14px;
    cursor: pointer; transition: all 0.2s;
  }
  .btn-cancel:hover { border-color: var(--cream); color: var(--cream); }
  .btn-submit {
    padding: 12px 28px; border-radius: 100px;
    background: var(--ember); color: var(--ink);
    border: none; font-family: var(--body); font-size: 14px; font-weight: 600;
    cursor: pointer; transition: background 0.2s;
  }
  .btn-submit:hover { background: var(--ember-deep); color: #fff; }

  /* ── FOOTER ── */
  footer { background: var(--ink); border-top: 1px solid var(--line-dark); color: rgba(246,241,231,0.35); text-align: center; padding: 40px 48px; font-size: 13px; }
  footer strong { color: rgba(246,241,231,0.7); }
  footer a { color: rgba(246,241,231,0.5); transition: color 0.2s; }
  footer a:hover { color: var(--ember); }

  /* ── BOTTOM NAV ── */
  .bottom-nav {
    display: none;
    position: fixed; top: auto; bottom: 0; left: 0; right: 0;
    background: var(--ink-soft);
    border-top: 1px solid rgba(255,255,255,0.07);
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
  .bottom-nav a svg { width: 20px; height: 20px; flex-shrink: 0; }
  .bottom-nav a:hover, .bottom-nav a.active { color: var(--ember-glow); }
  .bottom-nav a.bn-book { color: #fff; background: var(--ember); border-radius: 10px; padding: 6px 12px; }
  .bottom-nav a.bn-book:hover { background: var(--ember-glow); }

  /* ── WA FLOAT ── */
  .wa-float {
    position: fixed; bottom: 88px; right: 20px; z-index: 1500;
    width: 52px; height: 52px; border-radius: 50%;
    background: #25D366; display: flex; align-items: center; justify-content: center;
    box-shadow: 0 4px 20px rgba(37,211,102,0.45); transition: transform 0.2s;
  }
  .wa-float:hover { transform: scale(1.08); }
  .wa-float svg { width: 28px; height: 28px; }

  @media (max-width: 960px) {
    nav, .page-hero, .score-strip, .page-wrap, .flash-wrap { padding-left: 24px; padding-right: 24px; }
    .reviews-grid { grid-template-columns: 1fr; gap: 16px; }
    .mf-row { grid-template-columns: 1fr; }
    .score-sep { display: none; }
    .hero-inner { flex-direction: column; align-items: flex-start; }
  }

  @media (max-width: 640px) {
    body { padding-bottom: 72px; }
    .bottom-nav { display: block; }
    nav ul { display: none; }
    nav, .page-hero, .score-strip, .page-wrap, .flash-wrap { padding-left: 16px; padding-right: 16px; }
    nav { height: 56px; }

    .page-hero { padding: 48px 16px 44px; }
    .hero-inner { gap: 20px; }
    .btn-write-review { padding: 12px 20px; font-size: 13px; width: 100%; justify-content: center; }

    .score-strip { padding: 20px 16px; gap: 20px; }
    .score-big { font-size: 48px; }
    .score-cats { gap: 16px; }
    .score-cat-bar { width: 60px; }

    .page-wrap { padding: 36px 16px 64px; }
    .reviews-grid { grid-template-columns: 1fr; gap: 12px; }
    .rv-card { padding: 18px 16px; border-radius: 14px; }

    .filter-bar { gap: 8px; margin-bottom: 28px; }
    .filter-btn { padding: 7px 14px; font-size: 12px; }

    .modal-backdrop { padding: 12px; }
    .modal-box { border-radius: 20px; }
    .modal-header { padding: 20px; }
    .modal-body { padding: 20px; }
    .modal-footer { padding: 0 20px 20px; flex-direction: column; }
    .btn-cancel, .btn-submit { width: 100%; text-align: center; justify-content: center; }

    footer { padding: 32px 16px 20px; }

    .wa-float { display: none !important; }
  }

  @media (max-width: 400px) {
    .rv-card { padding: 14px 12px; }
    .rv-avatar, .rv-avatar-init { width: 38px; height: 38px; font-size: 16px; }
    .score-big { font-size: 40px; }
    .page-hero { padding: 40px 12px 36px; }
    nav, .page-hero, .score-strip, .page-wrap, .flash-wrap { padding-left: 12px; padding-right: 12px; }
  }
</style>
</head>
<body data-has-errors="{{ $errors->any() ? '1' : '0' }}">

{{-- NAV --}}
<nav>
  <a href="{{ url('/') }}" class="brand">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-logo">
    <div class="brand-text">
      <span class="brand-name">Winsome Hotel</span>
      <span class="brand-tagline">Charm, Luxury, Comfort</span>
    </div>
  </a>
  <ul>
    <li><a href="{{ route('rooms.index') }}">Rooms</a></li>
    <li><a href="{{ route('location') }}">Location</a></li>
    <li><a href="{{ url('/') }}#reviews">Reviews</a></li>
    <li><a href="{{ url('/') }}" class="nav-cta">Book a stay</a></li>
  </ul>
</nav>

{{-- HERO --}}
<div class="page-hero">
  <div class="hero-inner">
    <div class="hero-text">
      <div class="eyebrow">Winsome Hotel · Arusha</div>
      <h1>What our guests <em>are saying</em>.</h1>
      <p>{{ $totalCount }} verified {{ Str::plural('review', $totalCount) }} from guests who stayed with us.</p>
    </div>
    <button class="btn-write-review" id="openModalBtn">
      ★ &nbsp; Write a review
    </button>
  </div>
</div>

{{-- FLASH MESSAGES --}}
<div class="flash-wrap">
  @if(session('review_submitted'))
    <div class="flash-success">✓ &nbsp; Thank you! Your review has been submitted and will appear once our team approves it.</div>
  @endif
  @if($errors->any() && !session('review_submitted'))
    <div class="flash-error">Please fix the errors below and try again.</div>
  @endif
</div>

{{-- SCORE STRIP --}}
@if($totalCount)
<div class="score-strip">
  <div class="score-main">
    <div class="score-big">{{ $avgRating ? number_format($avgRating, 1) : '—' }}</div>
    <div>
      <div class="score-stars">
        @for($s = 1; $s <= 5; $s++)
          <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path class="{{ $s <= round($avgRating) ? 'sf' : 'se' }}" d="M10 1l2.39 4.84 5.34.78-3.87 3.77.91 5.32L10 13.27l-4.77 2.51.91-5.32L2.27 6.62l5.34-.78z"/>
          </svg>
        @endfor
      </div>
      <div class="score-meta">{{ $totalCount }} {{ Str::plural('review', $totalCount) }}</div>
    </div>
  </div>
  @if($avgService || $avgCleanliness)
  <div class="score-sep"></div>
  <div class="score-cats">
    @if($avgService)
    <div class="score-cat">
      <div class="score-cat-label">Service</div>
      <div class="score-cat-val">{{ number_format($avgService, 1) }}</div>
      <div class="score-cat-bar"><div class="score-cat-fill" data-pct="{{ round(($avgService/5)*100) }}"></div></div>
    </div>
    @endif
    @if($avgCleanliness)
    <div class="score-cat">
      <div class="score-cat-label">Cleanliness</div>
      <div class="score-cat-val">{{ number_format($avgCleanliness, 1) }}</div>
      <div class="score-cat-bar"><div class="score-cat-fill" data-pct="{{ round(($avgCleanliness/5)*100) }}"></div></div>
    </div>
    @endif
  </div>
  @endif
</div>
@endif

{{-- MAIN --}}
<div class="page-wrap">

  {{-- Room filter — built by JS from JSON --}}
  <div class="filter-bar" id="filter-bar"
       data-rooms="@json($rooms->map(fn($r) => ['id' => $r->id, 'name' => $r->name]))">
  </div>

  @if($reviews->count())
  <div class="reviews-grid" id="reviews-grid">
    @foreach($reviews as $review)
    <div class="rv-card" data-room="{{ $review->room_id ?? 'none' }}">

      {{-- Head: avatar + name + stars --}}
      <div class="rv-head">
        @if($review->photo_path)
          <img src="{{ asset('storage/'.$review->photo_path) }}" alt="{{ $review->guest_name }}" class="rv-avatar">
        @else
          <div class="rv-avatar-init">{{ strtoupper(substr($review->guest_name, 0, 1)) }}</div>
        @endif
        <div class="rv-info">
          <div class="rv-name">{{ $review->guest_name }}</div>
          @if($review->room)
            <span class="rv-room-tag">Room: <strong>{{ $review->room->name }}</strong></span>
          @endif
        </div>
        <div class="rv-right">
          <div class="rv-stars">
            @for($s = 1; $s <= 5; $s++)
              <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path class="{{ $s <= $review->rating ? 'sf' : 'se' }}" d="M10 1l2.39 4.84 5.34.78-3.87 3.77.91 5.32L10 13.27l-4.77 2.51.91-5.32L2.27 6.62l5.34-.78z"/>
              </svg>
            @endfor
          </div>
          <div class="rv-date">{{ $review->created_at->format('M d, Y') }}</div>
        </div>
      </div>

      @if($review->title)
        <div class="rv-title">{{ $review->title }}</div>
      @endif
      <p class="rv-body">{{ $review->body }}</p>

      @if($review->service_rating || $review->cleanliness_rating)
      <div class="rv-sub">
        @if($review->service_rating)
          <span>Service <strong>{{ $review->service_rating }}/5</strong></span>
        @endif
        @if($review->cleanliness_rating)
          <span>Cleanliness <strong>{{ $review->cleanliness_rating }}/5</strong></span>
        @endif
      </div>
      @endif

    </div>
    @endforeach
  </div>

  @if($reviews->hasPages())
    <div class="pagination-wrap">{{ $reviews->links() }}</div>
  @endif

  @else
  <div class="no-reviews">
    <p style="margin-bottom:16px;">No reviews yet.</p>
    <button class="btn-write-review" id="openModalBtnEmpty">★ &nbsp; Be the first to write one</button>
  </div>
  @endif

</div>

<footer>
  <p style="font-size:15px;margin-bottom:8px;"><strong>Winsome Hotel</strong></p>
  <p>Arusha, Tanzania &nbsp;·&nbsp; <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a></p>
  <p style="margin-top:12px;border-top:1px solid rgba(255,255,255,0.06);padding-top:12px;">&copy; {{ date('Y') }} Winsome Hotel &middot; <a href="{{ url('/') }}">Back to homepage</a></p>
</footer>

<!-- WA Float -->
<a href="https://wa.me/255793411998" class="wa-float" target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
  <svg viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
    <path d="M12 0C5.373 0 0 5.373 0 12c0 2.117.549 4.107 1.51 5.837L.057 23.882l6.204-1.63A11.945 11.945 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.811 9.811 0 01-5.003-1.37l-.36-.214-3.681.968.982-3.596-.235-.372A9.783 9.783 0 012.182 12C2.182 6.57 6.57 2.182 12 2.182S21.818 6.57 21.818 12 17.43 21.818 12 21.818z"/>
  </svg>
</a>

<!-- Bottom Nav -->
<nav class="bottom-nav" aria-label="Mobile navigation">
  <div class="bottom-nav-inner">
    <a href="{{ url('/') }}">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9.5L12 3l9 6.5V20a1 1 0 01-1 1H4a1 1 0 01-1-1V9.5z"/><path d="M9 21V12h6v9"/></svg>
      Home
    </a>
    <a href="{{ route('rooms.index') }}">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/><line x1="12" y1="12" x2="12" y2="16"/><line x1="10" y1="14" x2="14" y2="14"/></svg>
      Rooms
    </a>
    <a href="#" class="bn-book active" onclick="openModal();return false;">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
      Review
    </a>
    <a href="{{ route('location') }}">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
      Location
    </a>
    <a href="https://wa.me/255793411998" target="_blank" rel="noopener">
      <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.117.549 4.107 1.51 5.837L.057 23.882l6.204-1.63A11.945 11.945 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.811 9.811 0 01-5.003-1.37l-.36-.214-3.681.968.982-3.596-.235-.372A9.783 9.783 0 012.182 12C2.182 6.57 6.57 2.182 12 2.182S21.818 6.57 21.818 12 17.43 21.818 12 21.818z"/></svg>
      Contact
    </a>
  </div>
</nav>

{{-- ── WRITE A REVIEW MODAL ── --}}
<div class="modal-backdrop" id="reviewModal">
  <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="modal-title">

    <div class="modal-header">
      <div style="display:flex;align-items:center;gap:14px;">
        <div class="modal-header-icon">★</div>
        <div>
          <h3 id="modal-title">Write a review</h3>
          <p>Upload a photo (optional), rate your stay, and share your experience.</p>
        </div>
      </div>
      <button class="modal-close" id="closeModalBtn" aria-label="Close">✕</button>
    </div>

    <form class="modal-body" action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data" id="review-form">
      @csrf

      <div class="mf-row">
        <div>
          <label class="mf-label">Your name *</label>
          <input type="text" name="guest_name" value="{{ old('guest_name') }}" required
                 class="mf-input" placeholder="Full name">
          @error('guest_name')<div class="field-error">{{ $message }}</div>@enderror
        </div>
        <div>
          <label class="mf-label">Email *</label>
          <input type="email" name="email" value="{{ old('email') }}" required
                 class="mf-input" placeholder="you@example.com">
          @error('email')<div class="field-error">{{ $message }}</div>@enderror
        </div>
      </div>

      <div class="mf-row">
        <div>
          <label class="mf-label">Room stayed in</label>
          <select name="room_id" class="mf-input">
            <option value="">— No specific room —</option>
            @foreach($rooms as $room)
              <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>{{ $room->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="mf-label">Photo (optional)</label>
          <div class="file-area" onclick="document.getElementById('photo-input').click()">
            <input type="file" id="photo-input" name="photo" accept="image/*">
            <label class="file-area-label" for="photo-input">
              <strong>Click to upload</strong> · JPG / PNG / WEBP up to 2 MB
            </label>
            <div id="photo-name" style="font-size:12px;color:rgba(246,241,231,0.5);margin-top:6px;display:none;"></div>
          </div>
          @error('photo')<div class="field-error">{{ $message }}</div>@enderror
        </div>
      </div>

      <label class="mf-label">Overall rating *</label>
      <div class="star-picker">
        @for($s = 5; $s >= 1; $s--)
          <input type="radio" name="rating" id="star{{ $s }}" value="{{ $s }}" {{ old('rating') == $s ? 'checked' : '' }}>
          <label for="star{{ $s }}" title="{{ $s }} star">★</label>
        @endfor
      </div>
      @error('rating')<div class="field-error">{{ $message }}</div>@enderror

      <label class="mf-label">Review headline</label>
      <input type="text" name="title" value="{{ old('title') }}" maxlength="160"
             class="mf-input" placeholder="e.g. An unforgettable stay in Arusha">

      <label class="mf-label">Your review *</label>
      <textarea name="body" rows="5" required minlength="10" maxlength="2000"
                class="mf-input" placeholder="Tell future guests what made your stay special…"
                style="resize:vertical;">{{ old('body') }}</textarea>
      @error('body')<div class="field-error">{{ $message }}</div>@enderror

    </form>

    <div class="modal-footer">
      <button class="btn-cancel" id="closeModalBtn2">Cancel</button>
      <button class="btn-submit" onclick="document.getElementById('review-form').submit()">Submit review →</button>
    </div>

  </div>
</div>

<script>
  // Modal open/close
  function openModal() {
    document.getElementById('reviewModal').classList.add('open');
    document.body.style.overflow = 'hidden';
  }
  function closeModal() {
    document.getElementById('reviewModal').classList.remove('open');
    document.body.style.overflow = '';
  }

  document.getElementById('openModalBtn').addEventListener('click', openModal);
  document.getElementById('closeModalBtn').addEventListener('click', closeModal);
  document.getElementById('closeModalBtn2').addEventListener('click', closeModal);
  var emptyBtn = document.getElementById('openModalBtnEmpty');
  if (emptyBtn) emptyBtn.addEventListener('click', openModal);

  // Close on backdrop click
  document.getElementById('reviewModal').addEventListener('click', function(e) {
    if (e.target === this) closeModal();
  });

  // Keyboard close
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeModal();
  });

  // Auto-open if validation errors exist
  if (document.body.dataset.hasErrors === '1') openModal();

  // Show selected filename
  document.getElementById('photo-input').addEventListener('change', function() {
    var nameEl = document.getElementById('photo-name');
    if (this.files && this.files[0]) {
      nameEl.textContent = this.files[0].name;
      nameEl.style.display = 'block';
    }
  });

  // Animate score bar widths
  document.querySelectorAll('.score-cat-fill[data-pct]').forEach(function(el) {
    el.style.width = el.dataset.pct + '%';
  });

  // Build room filter buttons from JSON
  var filterBar = document.getElementById('filter-bar');
  if (filterBar) {
    var rooms = JSON.parse(filterBar.dataset.rooms || '[]');
    if (rooms.length > 1) {
      var lbl = document.createElement('span');
      lbl.className = 'filter-label';
      lbl.textContent = 'Filter by room:';
      filterBar.appendChild(lbl);
      ['all'].concat(rooms.map(function(r) { return r; })).forEach(function(r, i) {
        var btn = document.createElement('button');
        btn.className = 'filter-btn' + (i === 0 ? ' active' : '');
        btn.dataset.room = (i === 0) ? 'all' : r.id;
        btn.textContent = (i === 0) ? 'All rooms' : r.name;
        filterBar.appendChild(btn);
      });
    }
  }

  // Filter click handler
  document.addEventListener('click', function(e) {
    var btn = e.target.closest('.filter-btn');
    if (!btn) return;
    document.querySelectorAll('.filter-btn').forEach(function(b) { b.classList.remove('active'); });
    btn.classList.add('active');
    var roomId = btn.dataset.room;
    document.querySelectorAll('#reviews-grid .rv-card').forEach(function(card) {
      card.style.display = (roomId === 'all' || card.dataset.room == roomId) ? '' : 'none';
    });
  });
</script>
</body>
</html>
