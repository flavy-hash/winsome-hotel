<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<x-seo
    title="{{ $room->name }} — Winsome Hotel Arusha | {{ $room->tag ?? 'Hotel Room' }} Tanzania"
    description="{{ $room->description ? Str::limit($room->description, 155) : $room->name . ' at Winsome Hotel, Arusha, Tanzania. ' . ($room->size_sqm ? $room->size_sqm . '. ' : '') . ($room->bed_type ? $room->bed_type . '. ' : '') . 'Book directly for the best rate.' }}"
    :image="$room->image_path ? asset('storage/' . $room->image_path) : asset('images/winsome3.jpeg')"
    type="product"
    :schema="json_encode([
        '@context' => 'https://schema.org',
        '@type'    => 'HotelRoom',
        'name'     => $room->name . ' — Winsome Hotel',
        'description' => $room->description,
        'image'    => $room->image_path ? asset('storage/' . $room->image_path) : asset('images/winsome3.jpeg'),
        'url'      => route('rooms.show', $room),
        'bed'      => $room->bed_type,
        'occupancy' => ['@type' => 'QuantitativeValue', 'maxValue' => $room->max_guests],
        'offers'   => [
            '@type'         => 'Offer',
            'price'         => $room->price_per_night,
            'priceCurrency' => 'USD',
            'availability'  => $room->is_available ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
            'url'           => route('rooms.show', $room),
        ],
        'containedInPlace' => [
            '@type' => 'LodgingBusiness',
            'name'  => 'Winsome Hotel',
            'url'   => url('/'),
        ],
    ])"
/>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter+Tight:wght@300;400;500;600&display=swap" rel="stylesheet">

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
    --display:    'Poppins', system-ui, sans-serif;
    --body:       'Inter Tight', system-ui, sans-serif;
  }

  body {
    background: var(--ink);
    color: var(--cream);
    font-family: var(--body);
    font-size: 16px;
    line-height: 1.6;
    -webkit-font-smoothing: antialiased;
    overflow-x: hidden;
  }

  /* Grain overlay — same as homepage */
  body::before {
    content: '';
    position: fixed; inset: 0;
    background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='200' height='200'><filter id='n'><feTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='2' stitchTiles='stitch'/><feColorMatrix values='0 0 0 0 0  0 0 0 0 0  0 0 0 0 0  0 0 0 0.06 0'/></filter><rect width='200' height='200' filter='url(%23n)'/></svg>");
    pointer-events: none; z-index: 9999; opacity: 0.5; mix-blend-mode: multiply;
  }

  a { color: inherit; text-decoration: none; }
  img { max-width: 100%; display: block; }

  /* ── NAV ── */
  nav {
    position: fixed; top: 0; left: 0; right: 0; z-index: 200;
    display: flex; align-items: center; justify-content: space-between;
    padding: 22px 48px;
    background: rgba(11,18,32,0.85);
    backdrop-filter: blur(16px);
    border-bottom: 1px solid var(--line);
    transition: padding 0.3s;
  }
  .brand { display: flex; align-items: center; gap: 12px; text-decoration: none; }
  .brand-logo { height: 40px; width: auto; display: block; flex-shrink: 0; background: #fff; padding: 3px 6px; border-radius: 6px; }
  .brand-text { display: flex; flex-direction: column; gap: 2px; }
  .brand-name { font-family: var(--display); font-weight: 400; font-size: 17px; letter-spacing: -0.01em; color: var(--cream); line-height: 1.1; }
  .brand-tagline { font-family: var(--body); font-size: 9px; letter-spacing: 0.18em; text-transform: uppercase; color: var(--ember-glow); font-weight: 500; line-height: 1; }
  nav ul {
    display: flex; gap: 36px; list-style: none;
    font-size: 13px; letter-spacing: 0.04em; color: rgba(246,241,231,0.65);
  }
  nav ul a { transition: color 0.2s; }
  nav ul a:hover { color: var(--cream); }
  .nav-cta {
    background: var(--ember); color: var(--ink) !important;
    font-size: 13px; font-weight: 500;
    padding: 10px 22px; border-radius: 100px;
    transition: transform 0.2s; display: inline-block;
  }
  .nav-cta:hover { transform: translateY(-2px); }

  /* ── HERO ── */
  .hero {
    height: 85vh; min-height: 520px;
    position: relative; overflow: hidden;
    background: var(--ink-soft);
    display: flex; align-items: flex-end;
  }
  .hero img {
    position: absolute; inset: 0;
    width: 100%; height: 100%;
    object-fit: cover; object-position: center;
  }
  .hero::after {
    content: ''; position: absolute; inset: 0;
    background: linear-gradient(
      to bottom,
      rgba(11,18,32,0.15) 0%,
      rgba(11,18,32,0.0)  35%,
      rgba(11,18,32,0.75) 100%
    );
  }
  .hero-content {
    position: relative; z-index: 2;
    padding: 0 60px 60px;
    max-width: 800px;
  }
  .hero-tag {
    display: inline-block;
    background: var(--ember);
    color: var(--ink);
    font-size: 11px; font-weight: 600;
    letter-spacing: 0.1em; text-transform: uppercase;
    padding: 6px 16px; border-radius: 100px;
    margin-bottom: 20px;
  }
  .hero-title {
    font-family: var(--display);
    font-weight: 300; font-size: clamp(40px, 6vw, 72px);
    letter-spacing: -0.02em; line-height: 1.05;
    margin-bottom: 16px; color: var(--cream);
  }
  .hero-meta {
    font-size: 15px; color: rgba(246,241,231,0.6);
    display: flex; flex-wrap: wrap; gap: 8px 20px; align-items: center;
  }
  .hero-meta .sep { opacity: 0.3; }

  /* ── PAGE WRAP ── */
  .page-wrap { max-width: 1200px; margin: 0 auto; padding: 0 48px; }

  /* ── CONTENT GRID ── */
  .content-grid {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 64px;
    padding: 72px 0 80px;
    align-items: start;
  }

  /* ── SECTION LABELS ── */
  .eyebrow {
    font-size: 11px; letter-spacing: 0.2em; text-transform: uppercase;
    color: var(--ember); margin-bottom: 16px; font-weight: 500;
  }
  .section-label {
    font-size: 11px; letter-spacing: 0.15em; text-transform: uppercase;
    color: var(--sky-light); font-weight: 600; margin-bottom: 14px;
  }

  /* ── DESCRIPTION ── */
  .description {
    font-size: 17px; line-height: 1.8;
    color: rgba(246,241,231,0.72);
    margin-bottom: 52px;
  }

  /* ── GALLERY ── */
  .gallery-section { margin-bottom: 52px; }
  .gallery-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    margin-top: 14px;
  }
  .gallery-grid .g-main {
    grid-column: span 2;
    grid-row: span 2;
  }
  .gallery-thumb {
    aspect-ratio: 4/3;
    overflow: hidden;
    border-radius: 10px;
    position: relative;
    cursor: pointer;
    background: var(--ink-mid);
  }
  .gallery-grid .g-main { aspect-ratio: unset; }
  .gallery-thumb img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
    display: block;
  }
  .gallery-thumb:hover img { transform: scale(1.04); }
  .gallery-thumb .overlay {
    position: absolute; inset: 0;
    background: rgba(11,18,32,0.4);
    display: flex; align-items: center; justify-content: center;
    opacity: 0; transition: opacity 0.3s;
  }
  .gallery-thumb:hover .overlay { opacity: 1; }
  .overlay-icon {
    width: 48px; height: 48px;
    border: 2px solid var(--cream);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    color: var(--cream); font-size: 20px;
  }
  .gallery-more {
    position: absolute; inset: 0;
    background: rgba(11,18,32,0.65);
    display: flex; align-items: center; justify-content: center;
    border-radius: 10px;
    cursor: pointer;
  }
  .gallery-more span {
    font-family: var(--display);
    font-size: 24px; font-weight: 300;
    color: var(--cream); letter-spacing: -0.01em;
  }

  /* ── FEATURES ── */
  .features-grid {
    display: flex; flex-wrap: wrap; gap: 10px;
    margin-bottom: 52px;
  }
  .feature-pill {
    font-size: 12px; color: var(--sky-light);
    padding: 6px 14px;
    border: 1px solid rgba(110,168,221,0.25);
    border-radius: 100px;
    letter-spacing: 0.02em;
  }

  /* ── SPECS TABLE ── */
  .specs { border-radius: 12px; overflow: hidden; margin-bottom: 52px; }
  .specs-row {
    display: flex; justify-content: space-between; align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid var(--line);
  }
  .specs-row:last-child { border-bottom: none; }
  .specs-label { font-size: 13px; color: rgba(246,241,231,0.4); letter-spacing: 0.04em; }
  .specs-value { font-size: 14px; color: var(--cream); font-weight: 500; }

  /* ── BOOKING CARD ── */
  .booking-card {
    background: var(--ink-soft);
    border: 1px solid var(--line);
    border-radius: 20px;
    padding: 36px;
    position: sticky; top: 88px;
  }
  .price-display {
    font-family: var(--display);
    font-size: 48px; font-weight: 300;
    color: var(--ember-glow); line-height: 1;
    margin-bottom: 4px;
  }
  .price-display small {
    font-family: var(--body); font-size: 14px;
    color: rgba(246,241,231,0.4); margin-left: 4px;
  }
  .price-tzs { display: block; font-family: var(--body); font-size: 13px; color: rgba(246,241,231,0.45); margin-top: 4px; }
  .price-note { font-size: 12px; color: rgba(246,241,231,0.4); margin-bottom: 28px; }

  .booking-divider { border: none; border-top: 1px solid var(--line); margin: 24px 0; }

  .bf-label {
    font-size: 11px; letter-spacing: 0.15em; text-transform: uppercase;
    color: var(--sky-light); display: block; margin-bottom: 6px;
  }
  .bf-input {
    width: 100%;
    background: var(--ink-mid);
    border: 1px solid rgba(255,255,255,0.1);
    color: var(--cream);
    border-radius: 8px;
    padding: 11px 14px;
    font-family: var(--body); font-size: 14px;
    outline: none; margin-bottom: 14px;
    transition: border-color 0.2s;
    appearance: none;
  }
  .bf-input:focus { border-color: var(--ember); }
  .bf-input::placeholder { color: rgba(246,241,231,0.3); }
  .bf-row { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
  .stepper {
    display: flex; align-items: center;
    background: var(--ink-mid);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 8px; overflow: hidden;
    margin-bottom: 14px;
  }
  .stepper button {
    background: none; border: none;
    padding: 10px 14px; font-size: 18px;
    cursor: pointer; color: rgba(246,241,231,0.6);
    flex-shrink: 0; transition: color 0.2s;
  }
  .stepper button:hover { color: var(--ember); }
  .stepper input {
    flex: 1; background: none; border: none;
    text-align: center; font-family: var(--body);
    font-size: 14px; color: var(--cream); outline: none; padding: 0;
  }
  .btn-reserve {
    width: 100%; background: var(--ember); color: var(--ink);
    border: none; padding: 16px;
    border-radius: 100px; font-family: var(--body);
    font-weight: 600; font-size: 15px; cursor: pointer;
    transition: background 0.2s; margin-top: 4px;
    letter-spacing: 0.02em;
  }
  .btn-reserve:hover { background: var(--ember-deep); color: #fff; }
  .booking-note { text-align: center; font-size: 12px; color: rgba(246,241,231,0.35); margin-top: 12px; }

  /* cancellation policy – specs panel */
  .specs-row--full { align-items: flex-start; }
  .cancel-policy { display: flex; flex-direction: column; gap: 6px; margin-top: 2px; }
  .cp-row { display: flex; align-items: center; justify-content: flex-end; gap: 8px; }
  .cp-days { font-size: 12px; color: rgba(246,241,231,0.55); }
  .cp-badge { font-size: 11px; font-weight: 600; border-radius: 100px; padding: 2px 10px; letter-spacing: 0.04em; }
  .cp-full  { background: rgba(34,197,94,0.15);  color: #86efac; }
  .cp-half  { background: rgba(234,179,8,0.15);  color: #fde047; }
  .cp-none  { background: rgba(239,68,68,0.15);  color: #fca5a5; }

  /* cancellation policy – booking card */
  .bc-policy {
    margin-top: 20px;
    border-top: 1px solid var(--line);
    padding-top: 18px;
  }
  .bc-policy-title {
    display: flex; align-items: center; gap: 7px;
    font-size: 12px; letter-spacing: 0.1em; text-transform: uppercase;
    color: rgba(246,241,231,0.5);
    margin-bottom: 12px;
  }
  .bc-policy-title svg { width: 14px; height: 14px; flex-shrink: 0; }
  .bc-policy-rows { display: flex; flex-direction: column; gap: 7px; margin-bottom: 14px; }
  .bc-policy-row {
    display: flex; justify-content: space-between; align-items: center;
    font-size: 12px; color: rgba(246,241,231,0.6);
  }
  .bc-badge { font-size: 11px; font-weight: 600; border-radius: 100px; padding: 2px 9px; }
  .bc-full  { background: rgba(34,197,94,0.15);  color: #86efac; }
  .bc-half  { background: rgba(234,179,8,0.15);  color: #fde047; }
  .bc-none  { background: rgba(239,68,68,0.15);  color: #fca5a5; }
  .bc-times {
    display: flex; justify-content: space-between;
    font-size: 11px; color: rgba(246,241,231,0.4);
    padding-top: 10px; border-top: 1px solid var(--line);
  }
  .bc-times strong { color: rgba(246,241,231,0.75); }

  .error-box {
    background: rgba(185,28,28,0.15); border: 1px solid rgba(252,165,165,0.3);
    border-radius: 8px; padding: 10px 14px; margin-bottom: 16px;
    font-size: 13px; color: #FCA5A5;
  }

  /* ── AVAILABILITY CALENDAR ── */
  .avail-wrap { margin: 16px 0; }
  .avail-notice {
    display: none; border-radius: 8px; padding: 10px 14px;
    font-size: 13px; font-weight: 500; margin-bottom: 12px;
    line-height: 1.5;
  }
  .avail-notice.conflict {
    background: rgba(185,28,28,0.18); border: 1px solid rgba(252,165,165,0.35);
    color: #FCA5A5; display: block;
  }
  .avail-notice.ok {
    background: rgba(21,128,61,0.18); border: 1px solid rgba(74,222,128,0.35);
    color: #86EFAC; display: block;
  }
  .cal-widget { background: rgba(255,255,255,0.04); border: 1px solid var(--line); border-radius: 12px; overflow: hidden; }
  .cal-nav { display: flex; align-items: center; justify-content: space-between; padding: 10px 14px; border-bottom: 1px solid var(--line); }
  .cal-nav button { background: none; border: none; color: rgba(246,241,231,0.55); cursor: pointer; font-size: 16px; padding: 2px 8px; border-radius: 4px; transition: color 0.2s; }
  .cal-nav button:hover { color: var(--cream); }
  .cal-month-label { font-family: var(--display); font-size: 13px; font-weight: 500; color: var(--cream); }
  .cal-grid { display: grid; grid-template-columns: repeat(7, 1fr); }
  .cal-dow { text-align: center; font-size: 10px; letter-spacing: 0.08em; text-transform: uppercase; color: rgba(246,241,231,0.3); padding: 6px 0; }
  .cal-day {
    text-align: center; font-size: 12px; padding: 5px 2px; cursor: default;
    color: rgba(246,241,231,0.65); position: relative;
  }
  .cal-day.empty { background: none; }
  .cal-day.past { color: rgba(246,241,231,0.2); }
  .cal-day.booked { background: rgba(185,28,28,0.25); color: #FCA5A5; border-radius: 4px; font-weight: 600; }
  .cal-day.booked::after { content: ''; position: absolute; bottom: 2px; left: 50%; transform: translateX(-50%); width: 4px; height: 4px; background: #FCA5A5; border-radius: 50%; }
  .cal-day.selected { background: var(--ember); color: #fff; border-radius: 4px; font-weight: 600; }
  .cal-day.in-range { background: rgba(242,107,31,0.2); color: var(--cream); }
  .cal-legend { display: flex; gap: 12px; padding: 8px 14px; border-top: 1px solid var(--line); }
  .cal-legend span { font-size: 11px; color: rgba(246,241,231,0.45); display: flex; align-items: center; gap: 5px; }
  .cal-legend i { display: inline-block; width: 10px; height: 10px; border-radius: 2px; }
  .cal-legend i.leg-booked { background: rgba(185,28,28,0.5); }
  .cal-legend i.leg-sel { background: var(--ember); }

  /* ── REVIEWS ── */
  .reviews-section { padding: 72px 0 80px; border-top: 1px solid var(--line); }
  .reviews-header { display:flex; align-items:flex-end; justify-content:space-between; margin-bottom:48px; flex-wrap:wrap; gap:16px; }
  .avg-score {
    display:flex; align-items:center; gap:16px;
  }
  .avg-number {
    font-family:var(--display); font-size:64px; font-weight:300;
    color:var(--ember-glow); line-height:1;
  }
  .avg-stars { display:flex; gap:4px; margin-bottom:4px; }
  .avg-stars svg { width:20px; height:20px; }
  .avg-label { font-size:13px; color:rgba(246,241,231,0.45); }
  .review-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:24px; margin-bottom:56px; }
  .review-card {
    background:var(--ink-soft); border:1px solid var(--line);
    border-radius:16px; padding:28px;
  }
  .review-top { display:flex; align-items:flex-start; justify-content:space-between; margin-bottom:12px; }
  .reviewer-name { font-weight:600; font-size:15px; color:var(--cream); }
  .review-date { font-size:12px; color:rgba(246,241,231,0.35); margin-top:2px; }
  .star-row { display:flex; gap:3px; }
  .star-row svg { width:14px; height:14px; }
  .star-filled { fill:#F26B1F; }
  .star-empty  { fill:rgba(246,241,231,0.15); }
  .review-title { font-family:var(--display); font-size:18px; font-weight:400; margin-bottom:8px; color:var(--cream); }
  .review-body { font-size:14px; color:rgba(246,241,231,0.65); line-height:1.7; }
  .sub-ratings { display:flex; gap:20px; margin-top:16px; padding-top:16px; border-top:1px solid var(--line); }
  .sub-rating-item { font-size:12px; color:rgba(246,241,231,0.45); }
  .sub-rating-item strong { color:var(--ember-glow); }

  /* ── REVIEW FORM ── */
  .review-form-wrap {
    background:var(--ink-soft); border:1px solid var(--line);
    border-radius:20px; padding:40px;
  }
  .star-picker { display:flex; flex-direction:row-reverse; gap:6px; justify-content:flex-end; margin-bottom:14px; }
  .star-picker input { display:none; }
  .star-picker label {
    cursor:pointer; font-size:32px; color:rgba(246,241,231,0.2);
    transition:color 0.15s; line-height:1;
  }
  .star-picker input:checked ~ label,
  .star-picker label:hover,
  .star-picker label:hover ~ label { color:#F26B1F; }
  .rf-label {
    font-size:11px; letter-spacing:0.15em; text-transform:uppercase;
    color:var(--sky-light); display:block; margin-bottom:8px; font-weight:600;
  }
  .rf-input {
    width:100%; background:var(--ink-mid);
    border:1px solid rgba(255,255,255,0.1); color:var(--cream);
    border-radius:8px; padding:11px 14px;
    font-family:var(--body); font-size:14px; outline:none; margin-bottom:16px;
    transition:border-color 0.2s;
  }
  .rf-input:focus { border-color:var(--ember); }
  .rf-input::placeholder { color:rgba(246,241,231,0.3); }
  .rf-row { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
  .sub-pickers { display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px; }
  .sub-picker-block label.rf-label { margin-bottom:6px; }
  .mini-stars { display:flex; flex-direction:row-reverse; gap:4px; }
  .mini-stars input { display:none; }
  .mini-stars label {
    cursor:pointer; font-size:22px; color:rgba(246,241,231,0.2); transition:color 0.15s; line-height:1;
  }
  .mini-stars input:checked ~ label,
  .mini-stars label:hover,
  .mini-stars label:hover ~ label { color:#F26B1F; }
  .success-box {
    background:rgba(34,197,94,0.12); border:1px solid rgba(34,197,94,0.3);
    border-radius:12px; padding:20px 24px; margin-bottom:32px;
    font-size:15px; color:rgba(246,241,231,0.85); text-align:center;
  }

  @media(max-width:760px){
    .review-grid { grid-template-columns:1fr; }
    .rf-row,.sub-pickers { grid-template-columns:1fr; }
    .reviews-header { flex-direction:column; align-items:flex-start; }
  }

  /* ── OTHER ROOMS ── */
  .other-section { padding-bottom: 100px; border-top: 1px solid var(--line); padding-top: 72px; }
  .section-title {
    font-family: var(--display);
    font-weight: 300; font-size: clamp(28px, 3vw, 40px);
    letter-spacing: -0.02em; margin-bottom: 36px;
  }
  .other-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
  .other-card {
    background: var(--ink-soft);
    border-radius: 16px; overflow: hidden;
    border: 1px solid var(--line);
    transition: transform 0.3s;
    display: block;
  }
  .other-card:hover { transform: translateY(-6px); }
  .other-img {
    aspect-ratio: 4/3; background: var(--ink-mid);
    position: relative; overflow: hidden;
  }
  .other-img img { width: 100%; height: 100%; object-fit: cover; }
  .other-img::after {
    content: ''; position: absolute; inset: 0;
    background: linear-gradient(to bottom, transparent 55%, rgba(11,18,32,0.5) 100%);
  }
  .other-tag {
    position: absolute; top: 14px; left: 14px; z-index: 2;
    background: var(--ember); color: var(--ink);
    font-size: 10px; font-weight: 600; letter-spacing: 0.08em;
    text-transform: uppercase; padding: 4px 10px; border-radius: 100px;
  }
  .other-body { padding: 22px; }
  .other-name { font-family: var(--display); font-size: 22px; font-weight: 300; margin-bottom: 6px; }
  .other-meta { font-size: 12px; color: rgba(246,241,231,0.45); margin-bottom: 16px; }
  .other-footer {
    display: flex; align-items: baseline; justify-content: space-between;
    padding-top: 16px; border-top: 1px solid var(--line);
  }
  .other-price { font-family: var(--display); font-size: 22px; color: var(--ember-glow); }
  .other-price small { font-family: var(--body); font-size: 11px; color: rgba(246,241,231,0.4); margin-left: 3px; }
  .other-price .price-tzs { font-size: 11px; margin-top: 2px; }
  .other-link {
    font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase;
    color: var(--cream); border-bottom: 1px solid var(--ember);
    padding-bottom: 2px; transition: color 0.2s;
  }
  .other-link:hover { color: var(--ember); }

  /* ── FOOTER ── */
  footer {
    background: var(--ink-soft);
    border-top: 1px solid var(--line);
    color: rgba(246,241,231,0.35);
    text-align: center; padding: 40px 48px;
    font-size: 13px;
  }
  footer strong { color: rgba(246,241,231,0.7); }
  footer a { color: rgba(246,241,231,0.5); transition: color 0.2s; }
  footer a:hover { color: var(--ember); }

  /* ── LIGHTBOX ── */
  .lightbox {
    display: none; position: fixed; inset: 0; z-index: 1000;
    background: rgba(11,18,32,0.96);
    align-items: center; justify-content: center;
    flex-direction: column;
    padding: 24px;
  }
  .lightbox.open { display: flex; }
  .lightbox-img {
    max-width: 90vw; max-height: 80vh;
    border-radius: 8px;
    object-fit: contain;
    display: block;
  }
  .lightbox-close {
    position: absolute; top: 20px; right: 24px;
    background: none; border: none;
    color: rgba(246,241,231,0.6); font-size: 28px;
    cursor: pointer; line-height: 1; transition: color 0.2s;
  }
  .lightbox-close:hover { color: var(--cream); }
  .lightbox-nav {
    display: flex; align-items: center; gap: 32px; margin-top: 20px;
  }
  .lightbox-nav button {
    background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15);
    color: var(--cream); width: 44px; height: 44px; border-radius: 50%;
    font-size: 18px; cursor: pointer; transition: background 0.2s;
    display: flex; align-items: center; justify-content: center;
  }
  .lightbox-nav button:hover { background: var(--ember); border-color: var(--ember); }
  .lightbox-counter { font-size: 13px; color: rgba(246,241,231,0.45); }

  /* ── RESPONSIVE ── */

  /* Tablet */
  @media (max-width: 960px) {
    .page-wrap { padding: 0 24px; }
    nav { padding: 16px 24px; }
    .hero-content { padding: 0 24px 40px; }
    .content-grid { grid-template-columns: 1fr; gap: 40px; }
    .booking-card { position: static; }
    .other-grid { grid-template-columns: 1fr 1fr; gap: 16px; }
    .gallery-grid { grid-template-columns: 1fr 1fr; }
    .gallery-grid .g-main { grid-column: span 2; }
  }

  /* Mobile */
  @media (max-width: 640px) {
    nav ul { display: none; }
    nav { padding: 14px 16px; }
    .page-wrap { padding: 0 16px; }
    .hero-content { padding: 0 16px 32px; }
    .hero { height: 65vh; min-height: 360px; }
    .hero-title { font-size: clamp(28px, 8vw, 36px); }
    .hero-tag { font-size: 10px; }
    .content-grid { gap: 28px; }
    .specs-panel { padding: 20px; }
    .specs-row { padding: 12px 0; }
    .specs-label { font-size: 12px; }
    .specs-value { font-size: 13px; }
    .cancel-policy .cp-row { gap: 6px; }
    .booking-card { padding: 24px 20px; border-radius: 14px; }
    .price-display { font-size: 36px; }
    .gallery-grid { grid-template-columns: 1fr 1fr; gap: 6px; }
    .gallery-grid .g-main { grid-column: span 2; }
    .other-grid { grid-template-columns: 1fr; gap: 14px; }
    .other-section { padding-top: 48px; padding-bottom: 64px; }
    .reviews-section { padding: 48px 0 56px; }
    .review-grid { grid-template-columns: 1fr; }
    .rf-row, .sub-pickers { grid-template-columns: 1fr; }
    .reviews-header { flex-direction: column; gap: 16px; }
    .bc-times { flex-direction: column; gap: 4px; }
    .bf-input { font-size: 14px; padding: 10px 12px; }
  }

  /* Small phones */
  @media (max-width: 400px) {
    nav { padding: 12px; }
    .page-wrap { padding: 0 12px; }
    .hero { height: 60vh; min-height: 320px; }
    .hero-title { font-size: 26px; }
    .booking-card { padding: 18px 14px; }
    .gallery-grid { grid-template-columns: 1fr; }
    .gallery-grid .g-main { grid-column: span 1; }
    .gallery-thumb { aspect-ratio: 3/2; }
  }

  /* ── Bottom Navigation ── */
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
  .bottom-nav a.bn-book {
    color: #fff; background: var(--ember);
    border-radius: 10px; padding: 6px 12px;
  }
  .bottom-nav a.bn-book:hover { background: var(--ember-glow); }
  @media (min-width: 768px) { .bottom-nav { display: none !important; } }
  @media (max-width: 640px) {
    body { padding-bottom: 72px; }
    .bottom-nav { display: block; }
  }
</style>
</head>
<body data-errors="{{ $errors->any() ? '1' : '0' }}" data-review-errors="{{ ($errors->has('body') || $errors->has('rating') || $errors->has('guest_name')) ? '1' : '0' }}">

{{-- ── NAV ── --}}
<nav>
  <a href="{{ url('/') }}" class="brand">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-logo">
    <div class="brand-text">
      <span class="brand-name">Winsome Hotel</span>
      <span class="brand-tagline">Charm, Luxury, Comfort</span>
    </div>
  </a>
  <ul>
    <li><a href="{{ url('/') }}#rooms">Rooms</a></li>
    <li><a href="{{ url('/') }}#about">About</a></li>
    <li><a href="{{ route('location') }}">Location</a></li>
    <li><a href="{{ url('/') }}#contact">Contact</a></li>
    <li><a href="#reserve" class="nav-cta">Reserve</a></li>
  </ul>
</nav>

{{-- ── HERO ── --}}
<div class="hero">
  @php
    $heroSrc = $room->image_path
      ? asset('storage/' . $room->image_path)
      : 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1400&q=85';
  @endphp
  <img src="{{ $heroSrc }}" alt="{{ $room->name }}">
  <div class="hero-content">
    @if($room->tag)
      <div class="hero-tag">{{ $room->tag }}</div>
    @endif
    <h1 class="hero-title">{{ $room->name }}</h1>
    <div class="hero-meta">
      @if($room->size_sqm)
        <span>{{ $room->size_sqm }}</span><span class="sep">·</span>
      @endif
      @if($room->bed_type)
        <span>{{ $room->bed_type }}</span><span class="sep">·</span>
      @endif
      @if($room->max_guests)
        <span>Up to {{ $room->max_guests }} guests</span>
      @endif
    </div>
  </div>
</div>

{{-- ── MAIN CONTENT ── --}}
<div class="page-wrap">
  <div class="content-grid">

    {{-- LEFT: Details --}}
    <div>

      {{-- About this room --}}
      @if($room->description)
      <div class="eyebrow">About this room</div>
      <p class="description">{{ $room->description }}</p>
      @endif

      {{-- Gallery --}}
      @php
        $allImages = collect();
        if ($room->image_path) $allImages->push($room->image_path);
        if ($room->gallery && count($room->gallery)) {
            foreach ($room->gallery as $g) $allImages->push($g);
        }
        $galleryUrls = $allImages->map(fn($p) => asset('storage/' . $p))->values();
      @endphp

      @if($galleryUrls->count() > 1)
      <div class="gallery-section">
        <div class="section-label">Gallery</div>
        <div class="gallery-grid">
          @foreach($galleryUrls->take(5) as $i => $url)
            @php $isMain = $i === 0; $isLast = $i === 4 && $galleryUrls->count() > 5; @endphp
            <div class="gallery-thumb {{ $isMain ? 'g-main' : '' }}"
                 onclick="openLightbox({{ $i }})">
              <img src="{{ $url }}" alt="{{ $room->name }} photo {{ $i + 1 }}"
                   loading="{{ $i === 0 ? 'eager' : 'lazy' }}">
              <div class="overlay"><div class="overlay-icon">⊕</div></div>
              @if($isLast)
                <div class="gallery-more">
                  <span>+{{ $galleryUrls->count() - 4 }} more</span>
                </div>
              @endif
            </div>
          @endforeach
        </div>
      </div>
      @endif

      {{-- Amenities --}}
      @if($room->features && count($room->features))
      <div class="section-label">Included amenities</div>
      <div class="features-grid">
        @foreach($room->features as $feature)
          <span class="feature-pill">{{ $feature }}</span>
        @endforeach
      </div>
      @endif

      {{-- Specs --}}
      <div class="section-label">Room details</div>
      <div class="specs">
        @if($room->size_sqm)
        <div class="specs-row">
          <span class="specs-label">Room size</span>
          <span class="specs-value">{{ $room->size_sqm }}</span>
        </div>
        @endif
        @if($room->bed_type)
        <div class="specs-row">
          <span class="specs-label">Bed type</span>
          <span class="specs-value">{{ $room->bed_type }}</span>
        </div>
        @endif
        @if($room->max_guests)
        <div class="specs-row">
          <span class="specs-label">Maximum guests</span>
          <span class="specs-value">{{ $room->max_guests }} people</span>
        </div>
        @endif
        <div class="specs-row">
          <span class="specs-label">Rate</span>
          <span class="specs-value" style="color:var(--ember-glow);">
            ${{ number_format($room->price_per_night, 0) }} / night
            @if($room->price_per_night_tzs)
              <span class="price-tzs">TZS {{ number_format($room->price_per_night_tzs, 0) }}</span>
            @endif
          </span>
        </div>
        <div class="specs-row">
          <span class="specs-label">Check-in</span>
          <span class="specs-value">From 1:30 PM</span>
        </div>
        <div class="specs-row">
          <span class="specs-label">Check-out</span>
          <span class="specs-value">By 10:30 PM</span>
        </div>
        <div class="specs-row specs-row--full">
          <span class="specs-label">Cancellation</span>
          <div class="cancel-policy">
            <div class="cp-row"><span class="cp-days">7+ days before</span><span class="cp-badge cp-full">100% refund</span></div>
            <div class="cp-row"><span class="cp-days">3 – 6 days before</span><span class="cp-badge cp-half">50% refund</span></div>
            <div class="cp-row"><span class="cp-days">Under 3 days</span><span class="cp-badge cp-none">No refund</span></div>
          </div>
        </div>
      </div>

    </div>{{-- /left --}}

    {{-- RIGHT: Booking sidebar --}}
    <div id="reserve">
      <div class="booking-card">
        <div class="price-display">
          ${{ number_format($room->price_per_night, 0) }}<small>/ night</small>
          @if($room->price_per_night_tzs)
            <span class="price-tzs">TZS {{ number_format($room->price_per_night_tzs, 0) }}</span>
          @endif
        </div>
        <p class="price-note">No payment required at this stage</p>
        <hr class="booking-divider">

        @if($errors->any())
        <div class="error-box">
          @foreach($errors->all() as $error)<div>• {{ $error }}</div>@endforeach
        </div>
        @endif

        <form action="{{ route('booking.store') }}" method="POST">
          @csrf
          <input type="hidden" name="room_id" value="{{ $room->id }}">

          <label class="bf-label">Check-in</label>
          <input type="date" name="check_in" id="ci" value="{{ old('check_in') }}"
                 min="{{ now()->toDateString() }}" required class="bf-input">

          <label class="bf-label">Check-out</label>
          <input type="date" name="check_out" id="co" value="{{ old('check_out') }}" required class="bf-input">

          {{-- Availability calendar --}}
          <div class="avail-wrap">
            <div class="avail-notice" id="avail-notice"></div>
            <div class="cal-widget">
              <div class="cal-nav">
                <button type="button" onclick="calPrev()">&#8249;</button>
                <span class="cal-month-label" id="cal-label"></span>
                <button type="button" onclick="calNext()">&#8250;</button>
              </div>
              <div class="cal-grid" id="cal-grid"></div>
              <div class="cal-legend">
                <span><i class="leg-booked"></i> Already booked</span>
                <span><i class="leg-sel"></i> Your selection</span>
              </div>
            </div>
          </div>

          <div class="bf-row">
            <div>
              <label class="bf-label">Adults</label>
              <div class="stepper">
                <button type="button" onclick="step('adults',-1)">−</button>
                <input type="number" id="adults" name="guests" value="{{ old('guests', 2) }}" min="1" max="20">
                <button type="button" onclick="step('adults',1)">+</button>
              </div>
            </div>
            <div>
              <label class="bf-label">Children</label>
              <div class="stepper">
                <button type="button" onclick="step('children',-1)">−</button>
                <input type="number" id="children" name="children" value="{{ old('children', 0) }}" min="0" max="20">
                <button type="button" onclick="step('children',1)">+</button>
              </div>
            </div>
          </div>

          <label class="bf-label">Full name</label>
          <input type="text" name="guest_name" value="{{ old('guest_name') }}"
                 placeholder="Your full name" required class="bf-input">

          <label class="bf-label">Email</label>
          <input type="email" name="email" value="{{ old('email') }}"
                 placeholder="you@example.com" required class="bf-input">

          <label class="bf-label">Phone <span style="opacity:.5;font-size:10px;letter-spacing:0;text-transform:none;">(optional)</span></label>
          <input type="tel" name="phone" value="{{ old('phone') }}"
                 placeholder="+255 700 000 000" class="bf-input">

          <label class="bf-label">Special requests</label>
          <textarea name="notes" rows="2" placeholder="Dietary requirements, early check-in…"
                    class="bf-input" style="resize:vertical;">{{ old('notes') }}</textarea>

          <button type="submit" class="btn-reserve">Request reservation →</button>
          <p class="booking-note">We'll confirm within 24 hours.</p>
        </form>

        <div class="bc-policy">
          <div class="bc-policy-title">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            Cancellation Policy
          </div>
          <div class="bc-policy-rows">
            <div class="bc-policy-row"><span>7+ days before</span><span class="bc-badge bc-full">100% refund</span></div>
            <div class="bc-policy-row"><span>3 – 6 days before</span><span class="bc-badge bc-half">50% refund</span></div>
            <div class="bc-policy-row"><span>Under 3 days</span><span class="bc-badge bc-none">No refund</span></div>
          </div>
          <div class="bc-times">
            <span>Check-in: <strong>1:30 PM</strong></span>
            <span>Check-out: <strong>10:30 PM</strong></span>
          </div>
        </div>
      </div>
    </div>

  </div>{{-- /content-grid --}}

  {{-- ── REVIEWS SECTION ── --}}
  <div class="reviews-section">

    {{-- Header with average score --}}
    <div class="reviews-header">
      <div>
        <div class="eyebrow">Guest reviews</div>
        <h2 class="section-title" style="margin-bottom:0;">What guests are saying</h2>
      </div>
      @if($reviews->count() && $avgRating)
      <div class="avg-score">
        <div class="avg-number">{{ number_format($avgRating, 1) }}</div>
        <div>
          <div class="avg-stars">
            @for($s = 1; $s <= 5; $s++)
              <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path class="{{ $s <= round($avgRating) ? 'star-filled' : 'star-empty' }}"
                      d="M10 1l2.39 4.84 5.34.78-3.87 3.77.91 5.32L10 13.27l-4.77 2.51.91-5.32L2.27 6.62l5.34-.78z"/>
              </svg>
            @endfor
          </div>
          <div class="avg-label">{{ $reviews->count() }} {{ Str::plural('review', $reviews->count()) }}</div>
        </div>
      </div>
      @endif
    </div>

    {{-- Success message after submission --}}
    @if(session('review_submitted'))
    <div class="success-box">
      ✓ &nbsp; Thank you! Your review has been submitted and will appear once approved.
    </div>
    @endif

    {{-- Approved reviews grid --}}
    @if($reviews->count())
    <div class="review-grid">
      @foreach($reviews as $review)
      <div class="review-card">
        <div class="review-top">
          <div>
            <div class="reviewer-name">{{ $review->guest_name }}</div>
            <div class="review-date">{{ $review->created_at->format('M Y') }}</div>
          </div>
          <div class="star-row">
            @for($s = 1; $s <= 5; $s++)
              <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path class="{{ $s <= $review->rating ? 'star-filled' : 'star-empty' }}"
                      d="M10 1l2.39 4.84 5.34.78-3.87 3.77.91 5.32L10 13.27l-4.77 2.51.91-5.32L2.27 6.62l5.34-.78z"/>
              </svg>
            @endfor
          </div>
        </div>
        @if($review->title)
          <div class="review-title">{{ $review->title }}</div>
        @endif
        <p class="review-body">{{ $review->body }}</p>
        @if($review->service_rating || $review->cleanliness_rating)
        <div class="sub-ratings">
          @if($review->service_rating)
          <div class="sub-rating-item">Service <strong>{{ $review->service_rating }}/5</strong></div>
          @endif
          @if($review->cleanliness_rating)
          <div class="sub-rating-item">Cleanliness <strong>{{ $review->cleanliness_rating }}/5</strong></div>
          @endif
        </div>
        @endif
      </div>
      @endforeach
    </div>
    @else
    <p style="color:rgba(246,241,231,0.4);font-size:15px;margin-bottom:48px;">
      No reviews yet — be the first to share your experience.
    </p>
    @endif

    {{-- Write a review form --}}
    <div class="review-form-wrap" id="write-review">
      <div class="eyebrow" style="margin-bottom:8px;">Share your experience</div>
      <h3 style="font-family:var(--display);font-size:28px;font-weight:300;margin-bottom:32px;">Write a review</h3>

      @if($errors->has('body') || $errors->has('rating') || $errors->has('guest_name'))
      <div class="error-box" style="margin-bottom:24px;">
        @foreach($errors->all() as $err)<div>• {{ $err }}</div>@endforeach
      </div>
      @endif

      <form action="{{ route('rooms.reviews.store', $room) }}" method="POST">
        @csrf

        {{-- Overall star rating --}}
        <label class="rf-label">Overall rating *</label>
        <div class="star-picker" id="overall-stars">
          @for($s = 5; $s >= 1; $s--)
            <input type="radio" name="rating" id="star{{ $s }}" value="{{ $s }}"
                   {{ old('rating') == $s ? 'checked' : '' }}>
            <label for="star{{ $s }}" title="{{ $s }} star">★</label>
          @endfor
        </div>

        {{-- Sub-category ratings --}}
        <div class="sub-pickers">
          <div class="sub-picker-block">
            <label class="rf-label">Service</label>
            <div class="mini-stars">
              @for($s = 5; $s >= 1; $s--)
                <input type="radio" name="service_rating" id="srv{{ $s }}" value="{{ $s }}"
                       {{ old('service_rating') == $s ? 'checked' : '' }}>
                <label for="srv{{ $s }}">★</label>
              @endfor
            </div>
          </div>
          <div class="sub-picker-block">
            <label class="rf-label">Cleanliness</label>
            <div class="mini-stars">
              @for($s = 5; $s >= 1; $s--)
                <input type="radio" name="cleanliness_rating" id="cln{{ $s }}" value="{{ $s }}"
                       {{ old('cleanliness_rating') == $s ? 'checked' : '' }}>
                <label for="cln{{ $s }}">★</label>
              @endfor
            </div>
          </div>
        </div>

        {{-- Name + Email --}}
        <div class="rf-row">
          <div>
            <label class="rf-label">Your name *</label>
            <input type="text" name="guest_name" value="{{ old('guest_name') }}"
                   placeholder="Full name" required class="rf-input">
          </div>
          <div>
            <label class="rf-label">Email *</label>
            <input type="email" name="email" value="{{ old('email') }}"
                   placeholder="you@example.com" required class="rf-input">
            <p style="font-size:11px;color:rgba(246,241,231,0.3);margin-top:-10px;">Not shown publicly.</p>
          </div>
        </div>

        {{-- Title --}}
        <label class="rf-label">Review headline</label>
        <input type="text" name="title" value="{{ old('title') }}"
               placeholder="e.g. Wonderful stay with stunning views" maxlength="160" class="rf-input">

        {{-- Body --}}
        <label class="rf-label">Your review *</label>
        <textarea name="body" rows="5" required minlength="10" maxlength="2000"
                  placeholder="Tell other guests about your stay — what you loved, what stood out…"
                  class="rf-input" style="resize:vertical;">{{ old('body') }}</textarea>

        <button type="submit" class="btn-reserve" style="max-width:260px;">
          Submit review →
        </button>
      </form>
    </div>

  </div>{{-- /reviews-section --}}

  {{-- Other rooms --}}
  @if($otherRooms->count())
  <div class="other-section">
    <div class="eyebrow">Explore more</div>
    <h2 class="section-title">You might also like</h2>
    <div class="other-grid">
      @foreach($otherRooms as $other)
      <a href="{{ route('rooms.show', $other) }}" class="other-card">
        <div class="other-img">
          @if($other->tag)
            <div class="other-tag">{{ $other->tag }}</div>
          @endif
          <img src="{{ $other->image_path ? asset('storage/'.$other->image_path) : 'https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&w=600&q=75' }}"
               alt="{{ $other->name }}" loading="lazy">
        </div>
        <div class="other-body">
          <div class="other-name">{{ $other->name }}</div>
          <div class="other-meta">
            {{ implode(' · ', array_filter([$other->size_sqm, $other->bed_type])) }}
          </div>
          <div class="other-footer">
            <div class="other-price">
              ${{ number_format($other->price_per_night, 0) }}<small>/ night</small>
              @if($other->price_per_night_tzs)
                <span class="price-tzs">TZS {{ number_format($other->price_per_night_tzs, 0) }}</span>
              @endif
            </div>
            <span class="other-link">View room</span>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
  @endif

</div>{{-- /page-wrap --}}

<footer>
  <p style="font-size:15px;margin-bottom:8px;"><strong>Winsome Hotel</strong></p>
  <p>Arusha, Tanzania &nbsp;·&nbsp; <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a></p>
  <p style="margin-top:14px;border-top:1px solid rgba(255,255,255,0.06);padding-top:14px;">&copy; {{ date('Y') }} Winsome Hotel &middot; All rights reserved &middot; <a href="{{ url('/') }}">Back to homepage</a></p>
</footer>

{{-- ── LIGHTBOX ── --}}
@if($galleryUrls->count() > 0)
<div class="lightbox" id="lightbox">
  <button class="lightbox-close" onclick="closeLightbox()">✕</button>
  <img class="lightbox-img" id="lightbox-img" src="" alt="">
  <div class="lightbox-nav">
    <button onclick="shiftLightbox(-1)">&#8592;</button>
    <span class="lightbox-counter" id="lightbox-counter"></span>
    <button onclick="shiftLightbox(1)">&#8594;</button>
  </div>
</div>

<script>
  var images = @json($galleryUrls);
  var current = 0;

  function openLightbox(index) {
    current = index;
    showImage();
    document.getElementById('lightbox').classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
    document.getElementById('lightbox').classList.remove('open');
    document.body.style.overflow = '';
  }

  function shiftLightbox(dir) {
    current = (current + dir + images.length) % images.length;
    showImage();
  }

  function showImage() {
    document.getElementById('lightbox-img').src = images[current];
    document.getElementById('lightbox-counter').textContent = (current + 1) + ' / ' + images.length;
  }

  // Close on backdrop click
  document.getElementById('lightbox').addEventListener('click', function(e) {
    if (e.target === this) closeLightbox();
  });

  // Keyboard navigation
  document.addEventListener('keydown', function(e) {
    if (!document.getElementById('lightbox').classList.contains('open')) return;
    if (e.key === 'ArrowRight') shiftLightbox(1);
    if (e.key === 'ArrowLeft')  shiftLightbox(-1);
    if (e.key === 'Escape')     closeLightbox();
  });
</script>
@endif

<script>
  function step(id, delta) {
    var el = document.getElementById(id);
    el.value = Math.min(parseInt(el.max), Math.max(parseInt(el.min), (parseInt(el.value)||0) + delta));
  }

  document.getElementById('ci').addEventListener('change', function() {
    var co = document.getElementById('co');
    if (co.value && co.value <= this.value) {
      var d = new Date(this.value); d.setDate(d.getDate()+1);
      co.value = d.toISOString().split('T')[0];
    }
    co.min = new Date(new Date(this.value).getTime()+86400000).toISOString().split('T')[0];
    renderCal(); checkAvailability();
  });
  document.getElementById('co').addEventListener('change', function() {
    renderCal(); checkAvailability();
  });

  // ── Availability calendar ──
  var bookedRanges = [];
  var calYear, calMonth;

  (function() {
    var now = new Date();
    calYear  = now.getFullYear();
    calMonth = now.getMonth();
    fetch('{{ route('rooms.booked-dates', $room) }}')
      .then(function(r){ return r.json(); })
      .then(function(data){ bookedRanges = data; renderCal(); });
    renderCal();
  })();

  function calPrev() {
    calMonth--; if (calMonth < 0) { calMonth = 11; calYear--; }
    renderCal();
  }
  function calNext() {
    calMonth++; if (calMonth > 11) { calMonth = 0; calYear++; }
    renderCal();
  }

  function dateStr(y, m, d) {
    return y + '-' + String(m+1).padStart(2,'0') + '-' + String(d).padStart(2,'0');
  }

  function isBooked(y, m, d) {
    var s = dateStr(y, m, d);
    return bookedRanges.some(function(r){ return s >= r.from && s < r.to; });
  }

  function inSelectedRange(y, m, d) {
    var ci = document.getElementById('ci').value;
    var co = document.getElementById('co').value;
    if (!ci || !co) return false;
    var s = dateStr(y, m, d);
    return s >= ci && s < co;
  }

  function isSelectedEdge(y, m, d) {
    var ci = document.getElementById('ci').value;
    var co = document.getElementById('co').value;
    var s  = dateStr(y, m, d);
    return s === ci || s === co;
  }

  function renderCal() {
    var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    document.getElementById('cal-label').textContent = months[calMonth] + ' ' + calYear;

    var grid = document.getElementById('cal-grid');
    grid.innerHTML = '';
    var dows = ['Su','Mo','Tu','We','Th','Fr','Sa'];
    dows.forEach(function(d){ var el = document.createElement('div'); el.className='cal-dow'; el.textContent=d; grid.appendChild(el); });

    var today   = new Date(); today.setHours(0,0,0,0);
    var firstDow = new Date(calYear, calMonth, 1).getDay();
    var daysInMonth = new Date(calYear, calMonth+1, 0).getDate();

    for (var i = 0; i < firstDow; i++) {
      var blank = document.createElement('div'); blank.className = 'cal-day empty'; grid.appendChild(blank);
    }
    for (var d = 1; d <= daysInMonth; d++) {
      var el   = document.createElement('div');
      var date = new Date(calYear, calMonth, d);
      var cls  = 'cal-day';
      if (date < today)                  cls += ' past';
      else if (isSelectedEdge(calYear, calMonth, d)) cls += ' selected';
      else if (inSelectedRange(calYear, calMonth, d)) cls += ' in-range';
      else if (isBooked(calYear, calMonth, d))        cls += ' booked';
      el.className  = cls;
      el.textContent = d;
      grid.appendChild(el);
    }
  }

  function checkAvailability() {
    var ci     = document.getElementById('ci').value;
    var co     = document.getElementById('co').value;
    var notice = document.getElementById('avail-notice');
    var btn    = document.querySelector('.btn-reserve');
    if (!ci || !co) { notice.className = 'avail-notice'; notice.textContent = ''; return; }

    var conflict = bookedRanges.find(function(r){ return ci < r.to && co > r.from; });
    if (conflict) {
      var fmt = function(s){ var p=s.split('-'); var mn=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']; return mn[parseInt(p[1])-1]+' '+parseInt(p[2])+', '+p[0]; };
      notice.className = 'avail-notice conflict';
      notice.innerHTML = '&#10007; This room is already booked from <strong>' + fmt(conflict.from) + '</strong> to <strong>' + fmt(conflict.to) + '</strong>. Please choose different dates.';
      btn.disabled = true; btn.style.opacity = '0.4';
    } else {
      notice.className = 'avail-notice ok';
      notice.innerHTML = '&#10003; These dates are available — go ahead and reserve!';
      btn.disabled = false; btn.style.opacity = '';
    }
  }

  if (document.body.dataset.errors === '1') {
    document.getElementById('reserve').scrollIntoView({ behavior:'smooth', block:'start' });
  }
  if (document.body.dataset.reviewErrors === '1') {
    document.getElementById('write-review').scrollIntoView({ behavior:'smooth', block:'start' });
  }
</script>

<style>
  .wa-float {
    position: fixed;
    bottom: 28px; right: 28px;
    width: 58px; height: 58px;
    background: #25d366;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 6px 24px rgba(37,211,102,0.45);
    z-index: 9999;
    transition: transform 0.2s, box-shadow 0.2s;
    text-decoration: none;
  }
  .wa-float svg { width: 30px; height: 30px; color: #fff; }
  .wa-float:hover { transform: scale(1.08); box-shadow: 0 10px 32px rgba(37,211,102,0.55); }
  .wa-tooltip {
    position: absolute;
    right: 68px;
    background: #0b1220;
    color: #f6f1e7;
    font-size: 12px;
    font-weight: 500;
    white-space: nowrap;
    padding: 6px 14px;
    border-radius: 8px;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.2s;
  }
  .wa-tooltip::after {
    content: '';
    position: absolute;
    right: -6px; top: 50%;
    transform: translateY(-50%);
    border: 6px solid transparent;
    border-right: none;
    border-left-color: #0b1220;
  }
  .wa-float:hover .wa-tooltip { opacity: 1; }
  @media (max-width: 767px) { .wa-float { display: none !important; } }
</style>

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
    <a href="#reserve" class="bn-book">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
      Reserve
    </a>
    <a href="{{ route('location') }}">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
      Location
    </a>
    <a href="https://wa.me/255793411998" target="_blank" rel="noopener">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="color:#25d366"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413"/></svg>
      Chat
    </a>
  </div>
</div>

<a href="https://wa.me/255793411998" target="_blank" rel="noopener" class="wa-float" aria-label="Chat with us on WhatsApp">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413"/></svg>
  <span class="wa-tooltip">Chat with us</span>
</a>
</body>
</html>
