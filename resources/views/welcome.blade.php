<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<x-seo
    title="Winsome Hotel Arusha — Comfortable Stays with Mount Meru Views | Tanzania"
    description="Stay at Winsome Hotel in Arusha, Tanzania. Enjoy comfortable rooms, stunning views of Mount Meru and Kilimanjaro, and easy access to Arusha National Park. Book directly for the best rate."
    :image="asset('images/winsome3.jpeg')"
    :schema="json_encode([
        '@context'    => 'https://schema.org',
        '@type'       => 'LodgingBusiness',
        'name'        => 'Winsome Hotel',
        'description' => 'A boutique hotel in Arusha, Tanzania with comfortable rooms and spectacular views of Mount Meru and Mount Kilimanjaro.',
        'url'         => url('/'),
        'telephone'   => '+255793411998',
        'email'       => config('mail.from.address'),
        'address'     => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Mkonoo, Terat',
            'addressLocality' => 'Arusha',
            'addressCountry'  => 'TZ',
        ],
        'geo' => [
            '@type'     => 'GeoCoordinates',
            'latitude'  => -3.3731,
            'longitude' => 36.6823,
        ],
        'image'       => asset('images/winsome3.jpeg'),
        'priceRange'  => '$$',
        'starRating'  => ['@type' => 'Rating', 'ratingValue' => '4'],
        'amenityFeature' => [
            ['@type' => 'LocationFeatureSpecification', 'name' => 'Free Wi-Fi', 'value' => true],
            ['@type' => 'LocationFeatureSpecification', 'name' => 'Air Conditioning', 'value' => true],
            ['@type' => 'LocationFeatureSpecification', 'name' => 'City View', 'value' => true],
        ],
    ])"
/>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter+Tight:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
  :root {
    --ink: #0B1220;            /* deep midnight black */
    --ink-soft: #131C2E;
    --ember: #F26B1F;          /* warm signature orange */
    --ember-deep: #C44E0E;
    --ember-glow: #FFB070;
    --sky: #2C6FB5;            /* deep cobalt blue */
    --sky-light: #6EA8DD;
    --sky-faint: #E7EFF8;
    --cream: #F6F1E7;          /* off-white paper */
    --cream-deep: #EBE3D2;
    --line: rgba(11, 18, 32, 0.12);
    --line-soft: rgba(11, 18, 32, 0.06);

    --display: 'Poppins', system-ui, sans-serif;
    --body: 'Inter Tight', system-ui, sans-serif;
  }

  * { box-sizing: border-box; margin: 0; padding: 0; }
  html { scroll-behavior: smooth; overflow-x: hidden; max-width: 100%; }
  body {
    background: var(--cream);
    color: var(--ink);
    font-family: var(--body);
    font-size: 16px;
    line-height: 1.6;
    -webkit-font-smoothing: antialiased;
    overflow-x: hidden;
    max-width: 100%;
  }
  a { color: inherit; text-decoration: none; }
  img { max-width: 100%; display: block; }

  /* ============ GRAIN OVERLAY ============ */
  body::before {
    content: '';
    position: fixed;
    top: 0; left: 0;
    width: 100vw; height: 100vh;
    background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='200' height='200'><filter id='n'><feTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='2' stitchTiles='stitch'/><feColorMatrix values='0 0 0 0 0  0 0 0 0 0  0 0 0 0 0  0 0 0 0.06 0'/></filter><rect width='200' height='200' filter='url(%23n)'/></svg>");
    pointer-events: none;
    z-index: 9999;
    opacity: 0.5;
    mix-blend-mode: multiply;
    overflow: hidden;
  }

  /* ============ NAV ============ */
  nav {
    position: fixed; top: 0; left: 0; right: 0;
    display: flex; align-items: center; justify-content: space-between;
    padding: 22px 48px;
    z-index: 100;
    transition: all 0.4s ease;
    mix-blend-mode: difference;
  }
  nav.scrolled {
    background: var(--ink);
    mix-blend-mode: normal;
    padding: 14px 48px;
    border-bottom: 1px solid rgba(255,255,255,0.06);
  }
  .brand {
    display: flex; align-items: center; gap: 12px;
    text-decoration: none;
    isolation: isolate;
    mix-blend-mode: normal;
  }
  .brand-logo {
    height: 44px;
    width: auto;
    display: block;
    flex-shrink: 0;
    background: #fff;
    padding: 3px 6px;
    border-radius: 6px;
  }
  .brand-text {
    display: flex; flex-direction: column; gap: 2px;
  }
  .brand-name {
    font-family: var(--display);
    font-weight: 400;
    font-size: 18px;
    letter-spacing: -0.01em;
    color: var(--cream);
    line-height: 1.1;
  }
  .brand-tagline {
    font-family: var(--body);
    font-size: 9px;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--ember-glow);
    font-weight: 500;
    line-height: 1;
  }
  nav ul {
    display: flex; gap: 36px;
    list-style: none;
    font-size: 13px;
    letter-spacing: 0.04em;
    color: var(--cream);
  }
  nav ul a { transition: color 0.2s; position: relative; }
  nav ul a::after {
    content: ''; position: absolute;
    bottom: -4px; left: 0; right: 0;
    height: 1px; background: var(--ember);
    transform: scaleX(0); transform-origin: left;
    transition: transform 0.3s;
  }
  nav ul a:hover::after { transform: scaleX(1); }
  .nav-cta {
    background: var(--ember);
    color: #fff;
    font-size: 16px; font-weight: 700;
    padding: 10px 22px;
    border-radius: 100px;
    transition: transform 0.2s;
  }
  .nav-cta:hover { transform: translateY(-2px); }

  /* ============ HERO ============ */
  .hero {
    min-height: 100vh;
    background: var(--ink);
    color: var(--cream);
    position: relative;
    display: grid;
    grid-template-columns: 1.1fr 1fr;
    align-items: center;
    padding: 120px 48px 60px;
    gap: 48px;
    overflow: hidden;
  }
  .hero::before {
    content: '';
    position: absolute;
    top: -200px; right: -200px;
    width: 600px; height: 600px;
    background: var(--sky);
    border-radius: 50%;
    filter: blur(120px);
    opacity: 0.35;
    z-index: 0;
  }
  .hero::after {
    content: '';
    position: absolute;
    bottom: -150px; left: -100px;
    width: 400px; height: 400px;
    background: var(--ember);
    border-radius: 50%;
    filter: blur(140px);
    opacity: 0.28;
    z-index: 0;
  }
  .hero-text { position: relative; z-index: 2; }
  .hero-eyebrow {
    display: inline-flex; align-items: center; gap: 10px;
    font-size: 12px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--ember-glow);
    margin-bottom: 28px;
    opacity: 0;
    animation: fadeUp 0.8s 0.2s forwards;
  }
  .hero-eyebrow::before {
    content: ''; display: block;
    width: 32px; height: 1px;
    background: var(--ember);
  }
  .hero h1 {
    font-family: var(--display);
    font-weight: 300;
    font-size: clamp(48px, 7vw, 92px);
    line-height: 0.98;
    letter-spacing: -0.025em;
    margin-bottom: 28px;
    opacity: 0;
    animation: fadeUp 0.9s 0.35s forwards;
  }
  .hero h1 em {
    font-style: italic;
    font-weight: 400;
    color: var(--ember-glow);
  }
  .hero p.lead {
    font-size: 17px;
    color: rgba(246, 241, 231, 0.7);
    max-width: 480px;
    margin-bottom: 40px;
    line-height: 1.65;
    opacity: 0;
    animation: fadeUp 0.9s 0.5s forwards;
  }
  .hero-actions {
    display: flex; gap: 14px; align-items: center;
    opacity: 0;
    animation: fadeUp 0.9s 0.65s forwards;
  }
  .btn-primary {
    background: var(--ember);
    color: #fff;
    padding: 16px 30px;
    border-radius: 100px;
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 0.02em;
    display: inline-flex; align-items: center; gap: 8px;
    transition: all 0.3s;
    border: none; cursor: pointer;
  }
  .btn-primary:hover {
    background: var(--ember-glow);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(242, 107, 31, 0.4);
  }
  .btn-ghost {
    color: var(--cream);
    padding: 16px 24px;
    font-size: 14px;
    border-bottom: 1px solid rgba(246, 241, 231, 0.3);
    transition: border-color 0.2s;
  }
  .btn-ghost:hover { border-color: var(--ember); }

  .hero-visual {
    position: relative; z-index: 2;
    aspect-ratio: 3/4;
    max-height: 580px;
    opacity: 0;
    animation: fadeUp 1s 0.6s forwards;
  }
  .hero-frame {
    position: absolute;
    width: 75%; height: 80%;
    top: 10%; right: 5%;
    background: linear-gradient(160deg, var(--sky) 0%, var(--ink-soft) 100%);
    border-radius: 220px 220px 12px 12px;
    overflow: hidden;
  }
  .hero-frame img {
    position: absolute; inset: 0;
    width: 100%; height: 100%;
    object-fit: cover; object-position: center;
    display: block;
  }
  /* subtle bottom vignette so stat card stays readable */
  .hero-frame::after {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(to bottom,
      transparent 40%,
      rgba(11, 18, 32, 0.55) 100%);
    z-index: 1;
    pointer-events: none;
  }
  .hero-frame-small {
    position: absolute;
    width: 38%; height: 32%;
    bottom: 5%; left: 0;
    background: var(--ink-soft);
    border-radius: 12px;
    overflow: hidden;
    border: 6px solid var(--cream);
  }
  .hero-frame-small img {
    position: absolute; inset: 0;
    width: 100%; height: 100%;
    object-fit: cover; object-position: center;
    display: block;
  }
  .hero-frame-small::after {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(135deg, rgba(11,18,32,0.3) 0%, transparent 60%);
    z-index: 1;
    pointer-events: none;
  }
  .hero-stat {
    position: absolute;
    top: 5%; left: -2%;
    background: var(--cream);
    color: var(--ink);
    padding: 14px 18px;
    border-radius: 8px;
    font-size: 12px;
    z-index: 3;
    box-shadow: 0 20px 50px rgba(0,0,0,0.2);
  }
  .hero-stat strong {
    display: block;
    font-family: var(--display);
    font-weight: 500;
    font-size: 24px;
    color: var(--sky);
    line-height: 1;
    margin-bottom: 2px;
  }

  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
  }

  /* ============ BOOKING BAR ============ */
  .booking-bar {
    background: var(--cream);
    padding: 0 48px;
    margin-top: -40px;
    position: relative;
    z-index: 50;
  }
  .booking-inner {
    background: #fff;
    border: 1px solid var(--line);
    border-radius: 16px;
    padding: 8px;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr auto;
    gap: 4px;
    box-shadow: 0 30px 60px -20px rgba(11, 18, 32, 0.15);
  }
  .booking-field {
    padding: 14px 20px;
    border-right: 1px solid var(--line-soft);
    cursor: pointer;
    transition: background 0.2s;
    border-radius: 10px;
  }
  .booking-field:hover { background: var(--sky-faint); }
  .booking-field:last-of-type { border-right: none; }
  .booking-label {
    font-size: 10px;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--sky);
    margin-bottom: 4px;
    font-weight: 500;
  }
  .booking-value {
    font-family: var(--display);
    font-size: 16px;
    font-weight: 400;
    color: var(--ink);
  }
  .booking-cta {
    background: var(--ink);
    color: var(--cream);
    border: none;
    padding: 0 32px;
    border-radius: 10px;
    font-family: var(--body);
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s;
    display: flex; align-items: center; gap: 8px;
  }
  .booking-cta:hover { background: var(--ember); color: var(--ink); }

  /* ============ SECTION SCAFFOLD ============ */
  section {
    padding: 140px 48px;
    position: relative;
  }
  .container {
    max-width: 1280px;
    margin: 0 auto;
  }
  .section-eyebrow {
    font-size: 12px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--ember);
    margin-bottom: 16px;
    display: flex; align-items: center; gap: 12px;
  }
  .section-eyebrow::before {
    content: ''; width: 24px; height: 1px; background: var(--ember);
  }
  .section-title {
    font-family: var(--display);
    font-weight: 300;
    font-size: clamp(36px, 5vw, 64px);
    line-height: 1.05;
    letter-spacing: -0.02em;
    margin-bottom: 24px;
    max-width: 760px;
  }
  .section-title em {
    font-style: italic;
    color: var(--sky);
  }

  /* ============ ABOUT ============ */
  .about {
    background: var(--cream);
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 80px;
    align-items: center;
  }
  .about-visual {
    position: relative;
    aspect-ratio: 4/5;
  }
  .about-img-1 {
    position: absolute;
    width: 70%; height: 75%;
    top: 0; left: 0;
    background: var(--ink-soft);
    border-radius: 8px;
    overflow: hidden;
  }
  .about-img-1 img {
    position: absolute; inset: 0;
    width: 100%; height: 100%;
    object-fit: cover; object-position: center;
    display: block;
  }
  .about-img-2 {
    position: absolute;
    width: 55%; height: 55%;
    bottom: 0; right: 0;
    background: var(--ink);
    border-radius: 8px;
    overflow: hidden;
    border: 8px solid var(--cream);
  }
  .about-img-2 img {
    position: absolute; inset: 0;
    width: 100%; height: 100%;
    object-fit: cover; object-position: center;
    display: block;
  }
  .about-img-2 .about-temp {
    position: absolute;
    bottom: 16px; left: 16px;
    color: var(--cream);
    font-family: var(--display);
    font-size: 40px;
    font-weight: 300;
    z-index: 2;
    text-shadow: 0 2px 12px rgba(0,0,0,0.4);
  }
  .badge-floating {
    position: absolute;
    bottom: 15%; left: -8%;
    background: var(--ember);
    color: var(--ink);
    padding: 12px 18px;
    border-radius: 100px;
    font-size: 12px;
    font-weight: 500;
    box-shadow: 0 12px 30px rgba(242, 107, 31, 0.3);
    z-index: 3;
  }
  .about p.body-lead {
    font-family: var(--display);
    font-size: 22px;
    font-weight: 300;
    line-height: 1.5;
    margin-bottom: 24px;
    color: var(--ink);
  }
  .about p.body { color: rgba(11, 18, 32, 0.7); margin-bottom: 32px; }
  .about-usp {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px 24px;
    margin-bottom: 28px;
  }
  .usp-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 13px;
    color: rgba(11, 18, 32, 0.75);
    line-height: 1.4;
  }
  .usp-item svg {
    width: 18px; height: 18px;
    flex-shrink: 0;
    margin-top: 1px;
    color: var(--ember);
  }
  .about-guests {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 32px;
    padding-bottom: 32px;
    border-bottom: 1px solid var(--line);
  }
  .guest-tag {
    font-size: 11px;
    font-weight: 500;
    letter-spacing: 0.06em;
    text-transform: uppercase;
    color: rgba(11, 18, 32, 0.65);
    border: 1px solid rgba(11, 18, 32, 0.2);
    border-radius: 100px;
    padding: 4px 12px;
  }
  .about-mv {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
    padding-top: 28px;
  }
  .mv-card {
    background: rgba(11, 18, 32, 0.04);
    border-radius: 10px;
    padding: 20px;
    border: 1px solid rgba(11, 18, 32, 0.08);
  }
  .mv-icon {
    width: 36px; height: 36px;
    background: var(--ember);
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 12px;
  }
  .mv-icon svg {
    width: 18px; height: 18px;
    color: #fff;
  }
  .mv-card strong {
    display: block;
    font-size: 14px;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 6px;
    text-transform: uppercase;
    letter-spacing: 0.08em;
  }
  .mv-card p {
    font-size: 13px;
    color: rgba(11, 18, 32, 0.65);
    line-height: 1.6;
    margin: 0;
  }

  /* ============ ROOMS ============ */
  .rooms { background: var(--ink); color: var(--cream); }
  .rooms .section-title { color: var(--cream); }
  .rooms .section-title em { color: var(--ember-glow); }
  .rooms-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin-top: 60px;
  }
  .room-card {
    background: var(--ink-soft);
    border-radius: 16px;
    overflow: hidden;
    transition: transform 0.4s ease;
    border: 1px solid rgba(255,255,255,0.06);
  }
  .room-card:hover { transform: translateY(-6px); }
  .room-img {
    aspect-ratio: 4/3;
    position: relative;
    overflow: hidden;
  }
  .room-img.r1 { background: linear-gradient(135deg, var(--sky) 0%, var(--ink) 100%); }
  .room-img.r2 { background: linear-gradient(135deg, var(--ember) 0%, var(--ember-deep) 100%); }
  .room-img.r3 { background: linear-gradient(135deg, var(--sky-light) 0%, var(--sky) 60%, var(--ink) 100%); }
  .room-img::after {
    content: ''; position: absolute;
    bottom: 0; left: 0; right: 0; height: 40%;
    background: rgba(11, 18, 32, 0.35);
    clip-path: polygon(0 60%, 20% 30%, 40% 50%, 60% 25%, 80% 45%, 100% 30%, 100% 100%, 0 100%);
  }
  .room-tag {
    position: absolute;
    top: 16px; left: 16px;
    background: var(--ember);
    color: var(--ink);
    font-size: 11px;
    padding: 6px 12px;
    border-radius: 100px;
    font-weight: 500;
    letter-spacing: 0.04em;
  }
  .room-content { padding: 28px; }
  .room-content h3 {
    font-family: var(--display);
    font-weight: 400;
    font-size: 26px;
    margin-bottom: 8px;
    letter-spacing: -0.01em;
  }
  .room-content .meta {
    font-size: 13px;
    color: rgba(246, 241, 231, 0.55);
    margin-bottom: 20px;
  }
  .room-features {
    display: flex; flex-wrap: wrap; gap: 8px;
    margin-bottom: 24px;
  }
  .feature {
    font-size: 11px;
    color: var(--sky-light);
    padding: 4px 10px;
    border: 1px solid rgba(110, 168, 221, 0.25);
    border-radius: 100px;
  }
  .room-footer {
    display: flex; align-items: baseline; justify-content: space-between;
    padding-top: 20px;
    border-top: 1px solid rgba(255,255,255,0.08);
  }
  .room-price {
    font-family: var(--display);
    font-size: 28px;
    font-weight: 500;
    color: var(--ember-glow);
  }
  .price-tzs {
    display: block;
    font-family: var(--body);
    font-size: 12px;
    color: rgba(246, 241, 231, 0.45);
    font-weight: 400;
    margin-top: 2px;
  }
  .room-price small {
    font-family: var(--body);
    font-size: 12px;
    color: rgba(246, 241, 231, 0.5);
    font-weight: 400;
    margin-left: 4px;
  }
  .room-link {
    font-size: 12px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: var(--cream);
    padding-bottom: 2px;
    border-bottom: 1px solid var(--ember);
    transition: color 0.2s;
  }
  .room-link:hover { color: var(--ember); }

  /* ============ FACILITIES ============ */
  .facilities { background: var(--cream); color: var(--ink); }
  .facilities .section-title { color: var(--ink); }
  .facilities .section-title em { color: var(--ember); }

  .fac-chips {
    display: flex; flex-wrap: wrap; gap: 12px;
    margin-bottom: 56px;
  }
  .fac-chip {
    display: flex; align-items: center; gap: 10px;
    background: var(--ink);
    color: var(--cream);
    border-radius: 10px;
    padding: 14px 20px;
    font-size: 13px; font-weight: 500;
  }
  .fac-chip svg { width: 18px; height: 18px; flex-shrink: 0; color: var(--ember-glow); }

  .fac-highlight-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    margin-bottom: 48px;
  }
  .fac-highlight {
    background: rgba(11,18,32,0.04);
    border: 1px solid rgba(11,18,32,0.1);
    border-radius: 12px;
    padding: 28px;
  }
  .fac-hl-icon {
    width: 44px; height: 44px;
    background: var(--ember);
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 16px;
  }
  .fac-hl-icon svg { width: 22px; height: 22px; color: #fff; }
  .fac-highlight h3 {
    font-family: var(--display);
    font-size: 22px; font-weight: 400;
    color: var(--ink);
    margin-bottom: 10px;
  }
  .fac-highlight p { font-size: 14px; color: rgba(11,18,32,0.7); line-height: 1.7; margin: 0; }

  .fac-attractions {
    border-top: 1px solid rgba(11,18,32,0.12);
    padding-top: 40px;
  }
  .fac-attractions h3 {
    font-family: var(--display);
    font-size: 20px; font-weight: 400;
    color: var(--ink);
    margin-bottom: 20px;
    display: flex; align-items: center; gap: 10px;
  }
  .fac-attractions h3 svg { width: 20px; height: 20px; color: var(--ember); }
  .fac-attr-list {
    display: flex; flex-wrap: wrap; gap: 12px;
    list-style: none; padding: 0; margin: 0;
  }
  .fac-attr-list li {
    display: flex; align-items: center; gap: 8px;
    background: #fff;
    border: 1px solid rgba(242,107,31,0.25);
    border-radius: 8px;
    padding: 10px 16px;
    font-size: 13px; color: var(--ember);
    font-weight: 500;
  }
  .fac-attr-list li::before {
    content: '→';
    color: var(--ember);
    font-weight: 600;
  }
  .fac-attr-list li a {
    color: var(--ember); text-decoration: none;
    transition: color 0.2s;
  }
  .fac-attr-list li:has(a) {
    cursor: pointer;
    transition: border-color 0.2s, background 0.2s;
  }
  .fac-attr-list li:has(a):hover {
    border-color: var(--ember);
    background: #fff8f4;
  }
  .fac-attr-list li:has(a):hover a { color: var(--ember-deep); }

  /* ============ EXPERIENCES (PULL QUOTE) ============ */
  .quote {
    background: var(--cream);
    text-align: center;
    padding: 160px 48px;
  }
  .quote blockquote {
    font-family: var(--display);
    font-weight: 300;
    font-size: clamp(28px, 4.5vw, 56px);
    line-height: 1.2;
    letter-spacing: -0.02em;
    max-width: 1000px;
    margin: 0 auto 32px;
    color: var(--ink);
  }
  .quote blockquote em {
    font-style: italic;
    color: var(--ember);
  }
  .quote-cite {
    font-size: 13px;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: rgba(11, 18, 32, 0.55);
  }
  .quote-stars { color: var(--ember); margin-bottom: 24px; font-size: 16px; letter-spacing: 4px; }

  /* ============ EXPERIENCES ============ */
  .experiences {
    background: var(--cream-deep);
  }
  a.exp-card { display: block; text-decoration: none; color: inherit; }
  .exp-grid {
    display: grid;
    grid-template-columns: 1.4fr 1fr 1fr;
    grid-template-rows: 280px 280px;
    gap: 16px;
    margin-top: 60px;
  }
  .exp-card {
    border-radius: 16px;
    padding: 28px;
    color: var(--cream);
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    cursor: pointer;
    transition: transform 0.3s;
    background: var(--ink-soft);
  }
  .exp-card:hover { transform: scale(0.98); }
  .exp-card.tall { grid-row: span 2; }

  /* Photo layer */
  .exp-card img {
    position: absolute; inset: 0;
    width: 100%; height: 100%;
    object-fit: cover; object-position: center;
    display: block;
    transition: transform 0.6s ease;
  }
  .exp-card:hover img { transform: scale(1.05); }

  /* Dark gradient overlay — keeps text readable over any photo */
  .exp-card::after {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(
      to bottom,
      rgba(11,18,32,0.10) 0%,
      rgba(11,18,32,0.0)  30%,
      rgba(11,18,32,0.55) 60%,
      rgba(11,18,32,0.90) 100%
    );
    z-index: 1;
  }
  .exp-card h4 {
    font-family: var(--display);
    font-size: 26px;
    font-weight: 400;
    line-height: 1.2;
    margin-bottom: 0;
    position: relative;
    z-index: 2;
    color: #fff;
    text-shadow: 0 2px 12px rgba(0,0,0,0.5);
  }
  .exp-card.tall h4 { font-size: 36px; }
  .exp-card .tag {
    font-size: 11px;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    margin-bottom: 10px;
    position: relative;
    z-index: 2;
    display: inline-block;
    background: rgba(242,107,31,0.22);
    border: 1px solid rgba(242,107,31,0.55);
    padding: 3px 10px;
    border-radius: 100px;
    color: var(--ember);
    font-weight: 600;
    text-shadow: none;
  }
  .exp-card .arrow {
    position: absolute;
    top: 24px; right: 24px;
    width: 36px; height: 36px;
    border: 1px solid rgba(255,255,255,0.5);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    transition: all 0.3s;
    z-index: 2;
    background: rgba(11,18,32,0.25);
    backdrop-filter: blur(4px);
  }
  .exp-card:hover .arrow {
    background: var(--ember);
    border-color: var(--ember);
    color: var(--ink);
  }

  /* ============ REVIEWS ============ */
  .reviews-home { background: var(--cream); padding: 120px 0; }
  .reviews-home .container { max-width: 1200px; margin: 0 auto; padding: 0 48px; }
  .reviews-top {
    display: flex; align-items: flex-end; justify-content: space-between;
    margin-bottom: 56px; flex-wrap: wrap; gap: 24px;
  }
  .overall-score {
    display: flex; align-items: center; gap: 20px;
    background: var(--ink); border-radius: 16px;
    padding: 20px 28px;
  }
  .score-number {
    font-family: var(--display); font-size: 56px; font-weight: 300;
    color: var(--ember-glow); line-height: 1;
  }
  .score-stars { display: flex; gap: 4px; margin-bottom: 4px; }
  .score-stars svg { width: 18px; height: 18px; }
  .score-label { font-size: 12px; color: rgba(246,241,231,0.45); }
  .rv-grid {
    display: grid; grid-template-columns: repeat(2, 1fr);
    gap: 20px; margin-bottom: 48px;
  }
  .rv-card {
    background: #fff;
    border-radius: 18px; padding: 26px 28px;
    box-shadow: 0 2px 16px rgba(11,18,32,0.07);
    display: flex; flex-direction: column; gap: 14px;
    border: 1px solid rgba(11,18,32,0.08);
    transition: box-shadow 0.25s, transform 0.25s;
    overflow: hidden; min-width: 0;
  }
  .rv-card:hover { transform: translateY(-3px); box-shadow: 0 8px 32px rgba(11,18,32,0.11); }
  /* Card head row */
  .rv-head { display: flex; align-items: center; gap: 12px; min-width: 0; }
  .rv-avatar-init {
    width: 48px; height: 48px; border-radius: 50%; flex-shrink: 0;
    background: #EAEAEA; color: var(--ink);
    display: flex; align-items: center; justify-content: center;
    font-family: var(--display); font-size: 19px; font-weight: 500;
  }
  .rv-info { flex: 1; min-width: 0; overflow: hidden; }
  .rv-name { font-weight: 700; font-size: 15px; color: var(--ink); line-height: 1.2; overflow-wrap: break-word; word-break: break-word; }
  .rv-room { display: block; margin-top: 3px; font-size: 12px; color: rgba(11,18,32,0.45); }
  .rv-room strong { color: var(--ink); font-weight: 600; }
  .rv-right { text-align: right; flex-shrink: 0; }
  .rv-stars { display: flex; gap: 2px; justify-content: flex-end; }
  .rv-stars svg { width: 15px; height: 15px; }
  .rv-star-fill { fill: #F26B1F; }
  .rv-star-empty { fill: rgba(11,18,32,0.12); }
  .rv-date { font-size: 12px; color: rgba(11,18,32,0.35); margin-top: 5px; }
  .rv-title {
    font-family: var(--display); font-size: 17px; font-weight: 400;
    color: var(--ink); line-height: 1.3;
    overflow-wrap: break-word; word-break: break-word;
  }
  .rv-body {
    font-size: 14px; color: #C06000;
    line-height: 1.75; flex: 1;
    overflow-wrap: break-word; word-break: break-word;
  }
  .rooms-cta-wrap { text-align: center; margin-top: 56px; }
  .btn-all-rooms {
    display: inline-flex; align-items: center; gap: 10px;
    border: 1.5px solid rgba(246,241,231,0.3); color: var(--cream);
    padding: 14px 36px; border-radius: 100px;
    font-family: var(--body); font-size: 14px; font-weight: 500;
    letter-spacing: 0.03em; transition: all 0.2s;
    text-decoration: none;
  }
  .btn-all-rooms:hover { background: var(--cream); color: var(--ink); border-color: var(--cream); }
  .reviews-cta-wrap { text-align: center; }
  .btn-reviews {
    display: inline-flex; align-items: center; gap: 10px;
    border: 1.5px solid var(--ink); color: var(--ink);
    padding: 14px 32px; border-radius: 100px;
    font-family: var(--body); font-size: 14px; font-weight: 500;
    letter-spacing: 0.03em; transition: all 0.2s;
    text-decoration: none;
  }
  .btn-reviews:hover { background: var(--ink); color: var(--cream); }
  .rv-read-more {
    background: none; border: none; padding: 0; margin: 0;
    font-family: var(--body); font-size: 13px; font-weight: 600;
    color: var(--ember); cursor: pointer; letter-spacing: 0.02em;
    text-decoration: underline; text-underline-offset: 3px;
    transition: color 0.2s; align-self: flex-start;
  }
  .rv-read-more:hover { color: var(--ember-deep); }
  /* Review modal */
  .rm-backdrop {
    display: none; position: fixed; inset: 0; z-index: 1000;
    background: rgba(11,18,32,0.65); backdrop-filter: blur(4px);
    align-items: center; justify-content: center; padding: 24px;
  }
  .rm-backdrop.open { display: flex; }
  .rm-box {
    background: #fff; border-radius: 20px; padding: 40px 36px;
    max-width: 560px; width: 100%; position: relative;
    max-height: 88vh; overflow-y: auto;
    box-shadow: 0 32px 80px rgba(0,0,0,0.35);
  }
  .rm-close {
    position: absolute; top: 16px; right: 18px;
    background: none; border: none; font-size: 20px;
    cursor: pointer; color: rgba(11,18,32,0.35); transition: color 0.2s; line-height: 1;
  }
  .rm-close:hover { color: var(--ink); }
  .rm-head { display: flex; align-items: center; gap: 12px; margin-bottom: 18px; }
  .rm-avatar {
    width: 48px; height: 48px; border-radius: 50%; flex-shrink: 0;
    background: #EAEAEA; color: var(--ink);
    display: flex; align-items: center; justify-content: center;
    font-family: var(--display); font-size: 19px; font-weight: 500;
  }
  .rm-name { font-weight: 700; font-size: 15px; color: var(--ink); line-height: 1.2; }
  .rm-meta { font-size: 12px; color: rgba(11,18,32,0.45); margin-top: 3px; }
  .rm-stars { display: flex; gap: 3px; margin-bottom: 14px; }
  .rm-stars svg { width: 16px; height: 16px; }
  .rm-title {
    font-family: var(--display); font-size: 19px; font-weight: 400;
    color: var(--ink); line-height: 1.3; margin-bottom: 14px;
  }
  .rm-body {
    font-size: 15px; color: #7a3d00; line-height: 1.8;
    white-space: pre-wrap; word-break: break-word;
  }
  @media (max-width: 560px) { .rm-box { padding: 28px 20px; border-radius: 16px; } }

  /* ============ CTA ============ */
  .cta {
    background: var(--ink);
    color: var(--cream);
    text-align: center;
    padding: 160px 48px;
    position: relative;
    overflow: hidden;
  }
  .cta::before {
    content: '';
    position: absolute;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    width: 700px; height: 700px;
    background: var(--ember);
    border-radius: 50%;
    filter: blur(180px);
    opacity: 0.25;
  }
  .cta-inner { position: relative; z-index: 2; }
  .cta h2 {
    font-family: var(--display);
    font-weight: 300;
    font-size: clamp(40px, 6vw, 80px);
    line-height: 1.05;
    letter-spacing: -0.02em;
    margin-bottom: 32px;
    max-width: 900px;
    margin-left: auto; margin-right: auto;
  }
  .cta h2 em { font-style: italic; color: var(--ember); }
  .cta p {
    color: rgba(246, 241, 231, 0.7);
    font-size: 17px;
    max-width: 560px;
    margin: 0 auto 40px;
  }

  /* ============ FOOTER ============ */
  footer {
    background: var(--ink);
    color: rgba(246, 241, 231, 0.7);
    padding: 80px 48px 32px;
    border-top: 1px solid rgba(255,255,255,0.06);
  }
  .footer-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr 1fr;
    gap: 64px;
    max-width: 1280px;
    margin: 0 auto 60px;
  }
  .footer-brand {
    font-family: var(--display);
    font-size: 20px;
    color: var(--cream);
    font-weight: 400;
    line-height: 1.1;
    letter-spacing: -0.01em;
  }
  .footer-col h5 {
    font-size: 12px;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--ember);
    margin-bottom: 20px;
    font-weight: 500;
  }
  .footer-col ul {
    list-style: none;
    display: flex; flex-direction: column; gap: 12px;
  }
  .footer-tagline {
    font-family: var(--display);
    font-size: 15px;
    font-weight: 300;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--ember-glow);
    margin-bottom: 4px;
  }
  .footer-col ul li {
    display: flex;
    align-items: flex-start;
    gap: 8px;
    line-height: 1.5;
  }
  .fc-icon {
    width: 15px; height: 15px;
    flex-shrink: 0;
    margin-top: 2px;
    color: var(--ember);
  }
  .fc-icon--wa { color: #25d366; }
  .footer-col a:hover { color: var(--ember-glow); }

  /* ── WHATSAPP FLOAT ── */
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
  .wa-float:hover {
    transform: scale(1.08);
    box-shadow: 0 10px 32px rgba(37,211,102,0.55);
  }
  .wa-tooltip {
    position: absolute;
    right: 68px;
    background: var(--ink);
    color: var(--cream);
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
    border-left-color: var(--ink);
  }
  .wa-float:hover .wa-tooltip { opacity: 1; }
  @media (max-width: 767px) { .wa-float { display: none !important; } }
  .footer-bottom {
    max-width: 1280px;
    margin: 0 auto;
    padding-top: 32px;
    border-top: 1px solid rgba(255,255,255,0.06);
    display: flex; justify-content: space-between;
    font-size: 12px;
    color: rgba(246, 241, 231, 0.4);
  }

  /* ============ RESPONSIVE ============ */

  /* ── Tablet (960px) ── */
  @media (max-width: 960px) {
    nav, section { padding-left: 24px; padding-right: 24px; }
    nav ul { display: none; }
    .hero {
      grid-template-columns: 1fr;
      padding: 100px 24px 60px;
      gap: 40px;
    }
    .hero-visual { max-height: 420px; }
    .booking-bar { padding: 0 24px; }
    .booking-inner { grid-template-columns: 1fr 1fr; gap: 8px; }
    .booking-cta { grid-column: span 2; padding: 16px; }
    .booking-field { border-right: none; }
    .about { grid-template-columns: 1fr; gap: 48px; }
    .fac-highlight-grid { grid-template-columns: 1fr; }
    .about-mv { grid-template-columns: 1fr; }
    .about-usp { grid-template-columns: 1fr; }
    .rooms-grid { grid-template-columns: 1fr 1fr; gap: 20px; }
    .exp-grid { grid-template-columns: 1fr 1fr; grid-template-rows: auto; }
    .exp-card.tall { grid-row: auto; grid-column: span 2; min-height: 220px; }
    .footer-grid { grid-template-columns: 1fr 1fr; gap: 40px; }
    .footer-bottom { flex-direction: column; gap: 12px; }
    .rv-grid { grid-template-columns: 1fr; }
    .about-visual { aspect-ratio: 3/2; }
    .reviews-home .container { padding: 0 24px; }
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
  .bottom-nav-inner {
    display: flex;
    justify-content: space-around;
    align-items: center;
  }
  .bottom-nav a {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 3px;
    color: rgba(246,241,231,0.55);
    font-size: 10px;
    font-family: var(--body);
    letter-spacing: 0.04em;
    text-decoration: none;
    padding: 6px 8px;
    border-radius: 8px;
    transition: color 0.2s;
    min-width: 52px;
  }
  .bottom-nav a svg { width: 20px; height: 20px; flex-shrink: 0; }
  .bottom-nav a:hover,
  .bottom-nav a.active { color: var(--ember-glow); }
  .bottom-nav a.bn-book {
    color: #fff;
    background: var(--ember);
    border-radius: 10px;
    padding: 6px 12px;
  }
  .bottom-nav a.bn-book:hover { background: var(--ember-glow); }

  @media (min-width: 768px) {
    .bottom-nav { display: none !important; }
  }

  /* ── Mobile (640px) ── */
  @media (max-width: 640px) {
    body { padding-bottom: 72px; }
    .bottom-nav { display: block; }
    nav ul { display: none; }
    nav, section { padding-left: 16px; padding-right: 16px; }
    nav { padding-top: 14px; padding-bottom: 14px; }
    .brand-logo { height: 34px; padding: 2px 5px; }
    .brand-name { font-size: 15px; }
    .brand-tagline { font-size: 8px; letter-spacing: 0.12em; }

    .hero {
      padding: 88px 16px 40px;
      gap: 28px;
    }
    .hero-visual { max-height: 280px; border-radius: 12px; }
    .hero-eyebrow { font-size: 10px; }
    .lead { font-size: 14px; }
    .hero-actions { flex-direction: column; gap: 12px; }
    .hero-actions .btn-primary,
    .hero-actions .btn-ghost { width: 100%; text-align: center; justify-content: center; }
    .hero-stat { display: none; }

    .booking-bar { padding: 0 16px; margin-top: -1px; }
    .booking-inner { grid-template-columns: 1fr; gap: 0; }
    .booking-cta { grid-column: span 1; margin-top: 8px; }
    .booking-field { border-bottom: 1px solid rgba(11,18,32,0.08); }

    section { padding-top: 56px; padding-bottom: 56px; }

    .about { gap: 32px; }
    .about-visual { display: none; }
    .about-usp { grid-template-columns: 1fr; gap: 10px; }
    .about-mv { grid-template-columns: 1fr; gap: 12px; }
    .about-guests { gap: 6px; }
    .guest-tag { font-size: 10px; padding: 3px 10px; }

    .rooms-grid { grid-template-columns: 1fr; gap: 20px; }

    .fac-chips { gap: 8px; }
    .fac-chip { font-size: 12px; padding: 10px 14px; }
    .fac-highlight-grid { grid-template-columns: 1fr; gap: 12px; }
    .fac-attr-list { gap: 8px; }
    .fac-attr-list li { font-size: 12px; padding: 8px 12px; }

    .exp-grid { grid-template-columns: 1fr; }
    .exp-card.tall { grid-column: span 1; min-height: 200px; }
    .exp-card { min-height: 180px; }

    .footer-grid { grid-template-columns: 1fr; gap: 32px; }
    .footer-bottom { flex-direction: column; gap: 8px; text-align: center; }
    footer { padding: 48px 16px 24px; }

    .quote { padding: 48px 16px; }
    blockquote { font-size: clamp(20px, 5vw, 28px); }

    .rv-grid { grid-template-columns: 1fr; gap: 14px; }
    .rv-card { padding: 18px 16px; border-radius: 14px; }
    .cta-inner { padding: 48px 16px; }
    .cta-inner h2 { font-size: clamp(28px, 7vw, 48px); }

    .reviews-home .container { padding: 0 16px; }
  }

  /* ── Small phones (400px) ── */
  @media (max-width: 400px) {
    .hero { padding: 80px 12px 36px; }
    nav, section { padding-left: 12px; padding-right: 12px; }
    .fac-chip { font-size: 11px; padding: 8px 10px; }
    .mv-card { padding: 16px; }
    .fac-highlight { padding: 20px; }
    .reviews-home .container { padding: 0 12px; }
  }

  /* ── Booking modal mobile ── */
  @media (max-width: 640px) {
    #booking-modal { padding: 12px !important; }
    #booking-modal > div { padding: 28px 20px !important; border-radius: 16px !important; }
  }
  .modal-select {
    width:100%;border:1px solid rgba(11,18,32,0.15);border-radius:8px;
    padding:12px 16px;font-family:var(--body);font-size:15px;outline:none;
    background:#fff;appearance:none;
    background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%230B1220' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
    background-repeat:no-repeat;background-position:right 16px center;
  }
</style>
</head>
<body data-errors="{{ $errors->any() ? '1' : '0' }}">

<!-- ====== NAVIGATION ====== -->
<nav id="nav">
  <a href="{{ url('/') }}" class="brand">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-logo">
    <div class="brand-text">
      <span class="brand-name">Winsome Hotel</span>
      <span class="brand-tagline">Charm, Luxury, Comfort</span>
    </div>
  </a>
  <ul id="nav-links">
    <li><a href="#rooms">Rooms</a></li>
    <li><a href="#about">The hotel</a></li>
    <li><a href="#facilities">Facilities</a></li>
    <li><a href="{{ route('location') }}">Location</a></li>
    <li><a href="#experiences">Experiences</a></li>
    <li><a href="#contact">Contact</a></li>
  </ul>
  <a href="#book" class="nav-cta">Book a stay</a>
</nav>

<!-- ====== HERO ====== -->
<header class="hero">
  <div class="hero-text">
    <div class="hero-eyebrow">Arusha · Tanzania</div>
    <h1>Where the<br/>ocean keeps<br/><em>slow time.</em></h1>
    <p class="lead">A boutique hotel of twenty-four ocean-facing suites, where mornings begin with chai on the veranda and evenings end with the call of fishermen returning home.</p>
    <div class="hero-actions">
      <button class="btn-primary">Reserve your stay →</button>
      <a href="#about" class="btn-ghost">Discover the story</a>
    </div>
  </div>

  <div class="hero-visual">
    <div class="hero-stat">
      <strong>24°</strong>
      Indian Ocean breeze
    </div>

    <div class="hero-frame">
      @if(file_exists(public_path('images/winsome3.jpeg')))
        <img src="{{ asset('images/winsome3.jpeg') }}" alt="Winsome Hotel">
      @elseif(file_exists(public_path('images/hero-main.jpg')))
        <img src="{{ asset('images/hero-main.jpg') }}" alt="Winsome Hotel">
      @elseif(file_exists(public_path('images/hero-main.png')))
        <img src="{{ asset('images/hero-main.png') }}" alt="Winsome Hotel">
      @else
        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=800&q=85"
             alt="Winsome Hotel">
      @endif
    </div>

    <div class="hero-frame-small">
      @if(file_exists(public_path('images/winsome1.jpeg')))
        <img src="{{ asset('images/winsome1.jpeg') }}" alt="Winsome Hotel detail">
      @elseif(file_exists(public_path('images/hero-small.png')))
        <img src="{{ asset('images/hero-small.png') }}" alt="Winsome Hotel detail">
      @else
        <img src="https://images.unsplash.com/photo-1547471080-7cc2caa01a7e?auto=format&fit=crop&w=400&q=85"
             alt="Mount Meru, Arusha">
      @endif
    </div>
  </div>
</header>

<!-- ====== BOOKING BAR ====== -->
<div class="booking-bar" id="book">
  <form action="{{ route('booking.store') }}" method="POST">
    @csrf
    <div class="booking-inner">
      <div class="booking-field">
        <div class="booking-label">Arrival</div>
        <input type="date" name="check_in" id="check_in"
               value="{{ old('check_in', date('Y-m-d', strtotime('+1 day'))) }}"
               min="{{ date('Y-m-d') }}"
               style="border:none;background:transparent;font-family:var(--display);font-size:16px;color:var(--ink);width:100%;outline:none;cursor:pointer;" required>
        @error('check_in')<div style="color:red;font-size:11px;">{{ $message }}</div>@enderror
      </div>
      <div class="booking-field">
        <div class="booking-label">Departure</div>
        <input type="date" name="check_out" id="check_out"
               value="{{ old('check_out', date('Y-m-d', strtotime('+4 days'))) }}"
               min="{{ date('Y-m-d', strtotime('+2 days')) }}"
               style="border:none;background:transparent;font-family:var(--display);font-size:16px;color:var(--ink);width:100%;outline:none;cursor:pointer;" required>
        @error('check_out')<div style="color:red;font-size:11px;">{{ $message }}</div>@enderror
      </div>
      <div class="booking-field">
        <div class="booking-label">Guests</div>
        <select name="guests" style="border:none;background:transparent;font-family:var(--display);font-size:16px;color:var(--ink);width:100%;outline:none;cursor:pointer;">
          @for($i = 1; $i <= 8; $i++)
            <option value="{{ $i }}" {{ old('guests', 2) == $i ? 'selected' : '' }}>{{ $i }} {{ $i === 1 ? 'adult' : 'adults' }}</option>
          @endfor
        </select>
      </div>
      <div class="booking-field">
        <div class="booking-label">Suite type</div>
        <select name="room_id" id="room_id" style="border:none;background:transparent;font-family:var(--display);font-size:16px;color:var(--ink);width:100%;outline:none;cursor:pointer;">
          <option value="">Any room</option>
          @foreach($rooms as $room)
            <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>{{ $room->name }}</option>
          @endforeach
        </select>
      </div>
      <button type="button" class="booking-cta" onclick="openBookingModal(null)">Check availability →</button>
    </div>
  </form>
</div>

<!-- ====== BOOKING MODAL ====== -->
<div id="booking-modal" style="display:none;position:fixed;inset:0;background:rgba(11,18,32,0.7);z-index:999;align-items:center;justify-content:center;padding:24px;">
  <div style="background:#fff;border-radius:20px;padding:48px;max-width:520px;width:100%;position:relative;max-height:90vh;overflow-y:auto;">
    <button onclick="document.getElementById('booking-modal').style.display='none'"
            style="position:absolute;top:20px;right:20px;background:none;border:none;font-size:22px;cursor:pointer;color:var(--ink);">✕</button>

    <div style="margin-bottom:32px;">
      <div style="font-size:12px;letter-spacing:0.2em;text-transform:uppercase;color:var(--ember);margin-bottom:8px;">Reserve your stay</div>
      <h2 style="font-family:var(--display);font-weight:300;font-size:32px;letter-spacing:-0.02em;">Complete your booking</h2>
    </div>

    @if($errors->any())
    <div style="background:#FEF2F2;border:1px solid #FCA5A5;border-radius:8px;padding:12px 16px;margin-bottom:24px;font-size:13px;color:#B91C1C;">
      @foreach($errors->all() as $error)<div>• {{ $error }}</div>@endforeach
    </div>
    @endif

    <form action="{{ route('booking.store') }}" method="POST" id="booking-form">
      @csrf

      <div style="display:grid;gap:16px;">

        {{-- Row 1: Dates --}}
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
          <div>
            <label style="font-size:11px;letter-spacing:0.15em;text-transform:uppercase;color:var(--sky);display:block;margin-bottom:6px;">Check-in *</label>
            <input type="date" name="check_in" id="modal-check-in" value="{{ old('check_in') }}" required
                   style="width:100%;border:1px solid rgba(11,18,32,0.15);border-radius:8px;padding:12px 16px;font-family:var(--body);font-size:15px;outline:none;box-sizing:border-box;">
          </div>
          <div>
            <label style="font-size:11px;letter-spacing:0.15em;text-transform:uppercase;color:var(--sky);display:block;margin-bottom:6px;">Check-out *</label>
            <input type="date" name="check_out" id="modal-check-out" value="{{ old('check_out') }}" required
                   style="width:100%;border:1px solid rgba(11,18,32,0.15);border-radius:8px;padding:12px 16px;font-family:var(--body);font-size:15px;outline:none;box-sizing:border-box;">
          </div>
        </div>

        {{-- Row 2: Adults + Children --}}
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
          <div>
            <label style="font-size:11px;letter-spacing:0.15em;text-transform:uppercase;color:var(--sky);display:block;margin-bottom:6px;">Adults *</label>
            <div style="display:flex;align-items:center;border:1px solid rgba(11,18,32,0.15);border-radius:8px;overflow:hidden;">
              <button type="button" onclick="stepGuest('modal-adults',-1)"
                      style="background:none;border:none;padding:12px 16px;font-size:18px;cursor:pointer;color:var(--ink);flex-shrink:0;">−</button>
              <input type="number" name="guests" id="modal-adults" value="{{ old('guests', 2) }}" min="1" max="20" required
                     style="flex:1;border:none;text-align:center;font-family:var(--body);font-size:15px;outline:none;padding:0;">
              <button type="button" onclick="stepGuest('modal-adults',1)"
                      style="background:none;border:none;padding:12px 16px;font-size:18px;cursor:pointer;color:var(--ink);flex-shrink:0;">+</button>
            </div>
          </div>
          <div>
            <label style="font-size:11px;letter-spacing:0.15em;text-transform:uppercase;color:var(--sky);display:block;margin-bottom:6px;">Children</label>
            <div style="display:flex;align-items:center;border:1px solid rgba(11,18,32,0.15);border-radius:8px;overflow:hidden;">
              <button type="button" onclick="stepGuest('modal-children',-1)"
                      style="background:none;border:none;padding:12px 16px;font-size:18px;cursor:pointer;color:var(--ink);flex-shrink:0;">−</button>
              <input type="number" name="children" id="modal-children" value="{{ old('children', 0) }}" min="0" max="20"
                     style="flex:1;border:none;text-align:center;font-family:var(--body);font-size:15px;outline:none;padding:0;">
              <button type="button" onclick="stepGuest('modal-children',1)"
                      style="background:none;border:none;padding:12px 16px;font-size:18px;cursor:pointer;color:var(--ink);flex-shrink:0;">+</button>
            </div>
          </div>
        </div>

        {{-- Row 3: Room type --}}
        <div>
          <label style="font-size:11px;letter-spacing:0.15em;text-transform:uppercase;color:var(--sky);display:block;margin-bottom:6px;">Room type</label>
          <select name="room_id" id="modal-room-id" class="modal-select">
            <option value="">— No preference —</option>
            @foreach($rooms as $room)
            <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>{{ $room->name }}</option>
            @endforeach
          </select>
        </div>

        {{-- Row 4: Full name --}}
        <div>
          <label style="font-size:11px;letter-spacing:0.15em;text-transform:uppercase;color:var(--sky);display:block;margin-bottom:6px;">Full name *</label>
          <input type="text" name="guest_name" value="{{ old('guest_name') }}" required
                 style="width:100%;border:1px solid rgba(11,18,32,0.15);border-radius:8px;padding:12px 16px;font-family:var(--body);font-size:15px;outline:none;box-sizing:border-box;"
                 placeholder="Your full name">
        </div>

        {{-- Row 5: Email + Phone --}}
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
          <div>
            <label style="font-size:11px;letter-spacing:0.15em;text-transform:uppercase;color:var(--sky);display:block;margin-bottom:6px;">Email *</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   style="width:100%;border:1px solid rgba(11,18,32,0.15);border-radius:8px;padding:12px 16px;font-family:var(--body);font-size:15px;outline:none;box-sizing:border-box;"
                   placeholder="you@example.com">
          </div>
          <div>
            <label style="font-size:11px;letter-spacing:0.15em;text-transform:uppercase;color:var(--sky);display:block;margin-bottom:6px;">Phone</label>
            <input type="tel" name="phone" value="{{ old('phone') }}"
                   style="width:100%;border:1px solid rgba(11,18,32,0.15);border-radius:8px;padding:12px 16px;font-family:var(--body);font-size:15px;outline:none;box-sizing:border-box;"
                   placeholder="+255 700 000 000">
          </div>
        </div>

        {{-- Row 6: Notes --}}
        <div>
          <label style="font-size:11px;letter-spacing:0.15em;text-transform:uppercase;color:var(--sky);display:block;margin-bottom:6px;">Special requests</label>
          <textarea name="notes" rows="2"
                    style="width:100%;border:1px solid rgba(11,18,32,0.15);border-radius:8px;padding:12px 16px;font-family:var(--body);font-size:15px;outline:none;resize:vertical;box-sizing:border-box;"
                    placeholder="Dietary requirements, early check-in, etc.">{{ old('notes') }}</textarea>
        </div>

        <button type="submit"
                style="background:var(--ember);color:var(--ink);border:none;padding:16px;border-radius:100px;font-family:var(--body);font-weight:500;font-size:15px;cursor:pointer;transition:background 0.2s;">
          Request reservation →
        </button>
        <p style="font-size:12px;color:rgba(11,18,32,0.5);text-align:center;">We'll confirm within 24 hours. No card required now.</p>
      </div>
    </form>
  </div>
</div>

<!-- ====== ABOUT ====== -->
<section class="about" id="about">
  <div class="about-visual">
    <div class="about-img-1">
      @if(file_exists(public_path('images/R.jpg')))
        <img src="{{ asset('images/R.jpg') }}" alt="Winsome Hotel">
      @elseif(file_exists(public_path('images/about-1.png')))
        <img src="{{ asset('images/about-1.png') }}" alt="Winsome Hotel">
      @else
        <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?auto=format&fit=crop&w=800&q=85"
             alt="Winsome Hotel pool">
      @endif
    </div>
    <div class="about-img-2">
      @if(file_exists(public_path('images/about-2.jpg')))
        <img src="{{ asset('images/about-2.jpg') }}" alt="Winsome Hotel detail">
      @elseif(file_exists(public_path('images/about-2.png')))
        <img src="{{ asset('images/about-2.png') }}" alt="Winsome Hotel detail">
      @else
        <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=600&q=85"
             alt="Winsome Hotel room">
      @endif
      <div class="about-temp">24°</div>
    </div>
    <div class="badge-floating">★ Est. 2010 · Arusha</div>
  </div>
  <div>
    <div class="section-eyebrow">Our Story</div>
    <h2 class="section-title">A hotel with <em>views of two peaks</em>.</h2>
    <p class="body-lead">Winsome Hotel was born out of an idea conceived in 2010 by Nemes Victor Massawe, the sole proprietor of the facility.</p>
    <p class="body">Resulting from the vision is a unique hotel providing comfortable accommodation to tourists and business travelers at affordable prices. Enjoy spectacular views of both Mount Meru and Mount Kilimanjaro, a refreshing serene environment surrounded by floral gardens, and away from the hustle and bustle of Arusha City Centre. Winsome Hotel situated 3 km off the Arusha Bypass Road, 13 km from Arusha Airport, and 11 km from Arusha city Centre.</p>

    <!-- Unique Selling Points -->
    <div class="about-usp">
      <div class="usp-item">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 17l4-8 4 4 3-6 4 10"/><circle cx="12" cy="5" r="1" fill="currentColor" stroke="none"/></svg>
        <span>Twin-peak views of Meru &amp; Kilimanjaro</span>
      </div>
      <div class="usp-item">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        <span>Peaceful location away from city bustle</span>
      </div>
      <div class="usp-item">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        <span>Maasai culture &amp; local community access</span>
      </div>
      <div class="usp-item">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
        <span>Highly trained staff &amp; exceptional service</span>
      </div>
    </div>

    <!-- Target Guests -->
    <div class="about-guests">
      <span class="guest-tag">Business Travelers</span>
      <span class="guest-tag">Tourists &amp; Leisure</span>
      <span class="guest-tag">Local Residents</span>
      <span class="guest-tag">Families</span>
      <span class="guest-tag">Couples</span>
      <span class="guest-tag">Groups &amp; Events</span>
      <span class="guest-tag">International Visitors</span>
    </div>

    <!-- Mission & Vision -->
    <div class="about-mv">
      <div class="mv-card">
        <div class="mv-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
        </div>
        <strong>Vision</strong>
        <p>To become the hotel of choice in Arusha, providing the best and most affordable services.</p>
      </div>
      <div class="mv-card">
        <div class="mv-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
        </div>
        <strong>Mission</strong>
        <p>To provide excellent services that make every customer feel truly delighted and at home.</p>
      </div>
    </div>
  </div>
</section>

<!-- ====== ROOMS ====== -->
<section class="rooms" id="rooms">
  <div class="container">
    <div class="section-eyebrow">Stay with us</div>
    <h2 class="section-title">Twenty-four ways to <em>wake up to the sea</em>.</h2>

    <div class="rooms-grid">
      @forelse($rooms as $index => $room)
      <div class="room-card">
        @php $imgClass = 'room-img r' . (($index % 3) + 1); @endphp
        <div class="{{ $imgClass }}">
          @if($room->image_path)
          <img src="{{ asset('storage/' . $room->image_path) }}" alt="{{ $room->name }}"
               style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;">
          @endif
          @if($room->tag)
          <span class="room-tag">{{ $room->tag }}</span>
          @endif
        </div>
        <div class="room-content">
          <h3>{{ $room->name }}</h3>
          <div class="meta">
            {{ implode(' · ', array_filter([$room->size_sqm, $room->bed_type, $room->description ? \Illuminate\Support\Str::limit($room->description, 40) : null])) }}
          </div>
          @if($room->features && count($room->features))
          <div class="room-features">
            @foreach(array_slice($room->features, 0, 4) as $feature)
              <span class="feature">{{ $feature }}</span>
            @endforeach
          </div>
          @endif
          <div class="room-footer">
            <div class="room-price">
            ${{ number_format($room->price_per_night, 0) }}<small>/ night</small>
            @if($room->price_per_night_tzs)
              <span class="price-tzs">TZS {{ number_format($room->price_per_night_tzs, 0) }}</span>
            @endif
          </div>
            <div style="display:flex;gap:18px;align-items:center;">
              <a href="{{ route('rooms.show', $room) }}" class="room-link">
                Read more
              </a>
              <a href="#book" class="room-link" data-room-id="{{ $room->id }}"
                 style="color:var(--ember);border-bottom-color:var(--ember);"
                 onclick="event.preventDefault();openBookingModal(this.dataset.roomId)">
                Reserve
              </a>
            </div>
          </div>
        </div>
      </div>
      @empty
      {{-- Fallback placeholder cards shown before any rooms are added via admin --}}
      @for($i = 1; $i <= 3; $i++)
      <div class="room-card">
        <div class="room-img r{{ $i }}"></div>
        <div class="room-content" style="text-align:center;padding:40px 28px;">
          <p style="color:rgba(246,241,231,0.4);font-size:14px;">Room details coming soon.</p>
        </div>
      </div>
      @endfor
      @endforelse
    </div>

    <div class="rooms-cta-wrap">
      <a href="{{ route('rooms.index') }}" class="btn-all-rooms">
        Browse all rooms &nbsp;→
      </a>
    </div>

  </div>
</section>

<!-- ====== FACILITIES ====== -->
<section class="facilities" id="facilities">
  <div class="container">
    <div class="section-eyebrow">What we offer</div>
    <h2 class="section-title">Everything you need <em>under one roof</em>.</h2>

    <!-- Facility Chips -->
    <div class="fac-chips">
      <div class="fac-chip">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l19-9-9 19-2-8-8-2z"/></svg>
        Restaurant
      </div>
      <div class="fac-chip">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M8 22H5a2 2 0 0 1-2-2V7l3-4h11l3 4v13a2 2 0 0 1-2 2h-3"/><line x1="12" y1="22" x2="12" y2="11"/><path d="M3 7h18"/></svg>
        Bar &amp; Lounge
      </div>
      <div class="fac-chip">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
        Conference Rooms
      </div>
      <div class="fac-chip">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="1"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
        Parking
      </div>
      <div class="fac-chip">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 22V11a9 9 0 0 1 18 0v11"/><path d="M5 11h14"/><path d="M9 22v-4h6v4"/></svg>
        Laundry
      </div>
      <div class="fac-chip">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        24-hour Reception
      </div>
      <div class="fac-chip">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><circle cx="12" cy="20" r="1" fill="currentColor" stroke="none"/></svg>
        WiFi Throughout
      </div>
    </div>

    <!-- Restaurant & Conference highlights -->
    <div class="fac-highlight-grid">
      <div class="fac-highlight">
        <div class="fac-hl-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"/><path d="M7 2v20"/><path d="M21 15V2a5 5 0 0 0-5 5v6h4v-1a2 2 0 0 1 2-2z"/><path d="M18 22v-4"/></svg>
        </div>
        <h3>Restaurant</h3>
        <p>Winsome Restaurant serves a rich selection of local and international dishes. Savour classics like Ugali with chicken or the beloved fish Makange — hearty meals prepared with fresh local ingredients.</p>
      </div>
      <div class="fac-highlight">
        <div class="fac-hl-icon">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>
        <h3>Conference &amp; Board Room</h3>
        <p>Our fully equipped Board Room comfortably accommodates up to <strong>20 people</strong> — ideal for corporate meetings, team retreats, and private business events.</p>
      </div>
    </div>

    <!-- Nearby Attractions -->
    <div class="fac-attractions">
      <h3>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        Nearby Attractions
      </h3>
      <ul class="fac-attr-list">
        <li><a href="https://meseranisnakepark.net/" target="_blank" rel="noopener">Miserani Snake Park</a></li>
        <li><a href="https://www.journeyera.com/mount-meru-waterfall-hike-in-tanzania/" target="_blank" rel="noopener">Napuru Waterfall</a></li>
        <li><a href="https://culturalheritagetz.com/" target="_blank" rel="noopener">Cultural Heritage Art Gallery</a></li>
        <li>Arusha City Walk</li>
        <li><a href="https://www.arushapark.com/" target="_blank" rel="noopener">Arusha National Park</a></li>
      </ul>
    </div>
  </div>
</section>

<!-- ====== PULL QUOTE ====== -->
<section class="quote">
  <div class="quote-stars">★ ★ ★ ★ ★</div>
  <blockquote>
    "It is the rare hotel where the staff <em>remember your name</em> by the second morning, and the coffee remembers <em>how you take it</em>."
  </blockquote>
  <div class="quote-cite">— Condé Nast Traveller · 2025</div>
</section>

<!-- ====== EXPERIENCES ====== -->
<section class="experiences" id="experiences">
  <div class="container">
    <div class="section-eyebrow">Explore Arusha</div>
    <h2 class="section-title">Adventures waiting <em>beyond our door</em>.</h2>

    <div class="exp-grid">

      {{-- Miserani Snake Park — tall card --}}
      <a class="exp-card tall" href="https://meseranisnakepark.net/" target="_blank" rel="noopener">
        @if(file_exists(public_path('images/exp-1.jpg')))
          <img src="{{ asset('images/exp-1.jpg') }}" alt="Miserani Snake Park">
        @else
          <img src="https://images.unsplash.com/photo-1531386151447-fd76ad50012f?auto=format&fit=crop&w=800&q=85"
               alt="Miserani Snake Park">
        @endif
        <div class="arrow">→</div>
        <div class="tag">Wildlife</div>
        <h4>Miserani Snake Park</h4>
      </a>

      {{-- Napuru Waterfall --}}
      <a class="exp-card" href="https://www.journeyera.com/mount-meru-waterfall-hike-in-tanzania/" target="_blank" rel="noopener">
        @if(file_exists(public_path('images/exp-2.jpg')))
          <img src="{{ asset('images/exp-2.jpg') }}" alt="Napuru Waterfall">
        @else
          <img src="https://images.unsplash.com/photo-1433086966358-54859d0ed716?auto=format&fit=crop&w=600&q=85"
               alt="Napuru Waterfall">
        @endif
        <div class="arrow">→</div>
        <div class="tag">Hiking</div>
        <h4>Napuru Waterfall</h4>
      </a>

      {{-- Cultural Heritage Art Gallery --}}
      <a class="exp-card" href="https://culturalheritagetz.com/" target="_blank" rel="noopener">
        @if(file_exists(public_path('images/exp-3.jpg')))
          <img src="{{ asset('images/exp-3.jpg') }}" alt="Cultural Heritage Art Gallery">
        @else
          <img src="https://images.unsplash.com/photo-1518998053901-5348d3961a04?auto=format&fit=crop&w=600&q=85"
               alt="Cultural Heritage Art Gallery">
        @endif
        <div class="arrow">→</div>
        <div class="tag">Culture</div>
        <h4>Cultural Heritage Art Gallery</h4>
      </a>

      {{-- Arusha National Park --}}
      <a class="exp-card" href="https://www.arushapark.com/" target="_blank" rel="noopener">
        @if(file_exists(public_path('images/exp-4.jpg')))
          <img src="{{ asset('images/exp-4.jpg') }}" alt="Arusha National Park">
        @else
          <img src="https://images.unsplash.com/photo-1516426122078-c23e76319801?auto=format&fit=crop&w=600&q=85"
               alt="Arusha National Park">
        @endif
        <div class="arrow">→</div>
        <div class="tag">Nature</div>
        <h4>Arusha National Park</h4>
      </a>

      {{-- Arusha City Walk --}}
      <div class="exp-card">
        @if(file_exists(public_path('images/exp-5.jpg')))
          <img src="{{ asset('images/exp-5.jpg') }}" alt="Arusha City Walk">
        @else
          <img src="https://images.unsplash.com/photo-1547471080-7cc2caa01a7e?auto=format&fit=crop&w=600&q=85"
               alt="Arusha City Walk">
        @endif
        <div class="arrow">→</div>
        <div class="tag">City</div>
        <h4>Arusha City Walk</h4>
      </div>

    </div>
  </div>
</section>

<!-- ====== REVIEWS ====== -->
@if($homeReviews->count())
<section class="reviews-home" id="reviews">
  <div class="reviews-home container">

    <div class="reviews-top">
      <div>
        <div class="section-eyebrow">Guest stories</div>
        <h2 class="section-title" style="margin-bottom:0;">What our guests <em>are saying</em>.</h2>
      </div>
      @if($avgHomeRating)
      <div class="overall-score">
        <div class="score-number">{{ number_format($avgHomeRating, 1) }}</div>
        <div>
          <div class="score-stars">
            @for($s = 1; $s <= 5; $s++)
              <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path class="{{ $s <= round($avgHomeRating) ? 'rv-star-fill' : 'rv-star-empty' }}"
                      d="M10 1l2.39 4.84 5.34.78-3.87 3.77.91 5.32L10 13.27l-4.77 2.51.91-5.32L2.27 6.62l5.34-.78z"/>
              </svg>
            @endfor
          </div>
          <div class="score-label">{{ $totalReviewCount }} {{ Str::plural('review', $totalReviewCount) }} across all rooms</div>
        </div>
      </div>
      @endif
    </div>

    <div class="rv-grid">
      @foreach($homeReviews as $review)
      <div class="rv-card">
        <div class="rv-head">
          <div class="rv-avatar-init">{{ strtoupper(substr($review->guest_name, 0, 1)) }}</div>
          <div class="rv-info">
            <div class="rv-name">{{ $review->guest_name }}</div>
            @if($review->room)
              <span class="rv-room">Room: <strong>{{ $review->room->name }}</strong></span>
            @endif
          </div>
          <div class="rv-right">
            <div class="rv-stars">
              @for($s = 1; $s <= 5; $s++)
                <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path class="{{ $s <= $review->rating ? 'rv-star-fill' : 'rv-star-empty' }}"
                        d="M10 1l2.39 4.84 5.34.78-3.87 3.77.91 5.32L10 13.27l-4.77 2.51.91-5.32L2.27 6.62l5.34-.78z"/>
                </svg>
              @endfor
            </div>
            <div class="rv-date">{{ $review->created_at->format('M d, Y') }}</div>
          </div>
        </div>
        @if($review->title)
          <div class="rv-title">{{ $review->title }}</div>
        @endif
        <p class="rv-body">{{ Str::limit($review->body, 160) }}</p>
        @if(strlen($review->body) > 160)
          <button class="rv-read-more"
            onclick="openReviewModal(this)"
            data-name="{{ e($review->guest_name) }}"
            data-room="{{ $review->room ? e($review->room->name) : '' }}"
            data-date="{{ $review->created_at->format('M d, Y') }}"
            data-rating="{{ $review->rating }}"
            data-title="{{ e($review->title ?? '') }}"
            data-body="{{ e($review->body) }}">
            Read more
          </button>
        @endif
      </div>
      @endforeach
    </div>

    <div class="reviews-cta-wrap">
      <a href="{{ route('reviews.index') }}" class="btn-reviews">
        Read all reviews &nbsp;→
      </a>
    </div>

  </div>
</section>

<!-- Review full-text modal -->
<div class="rm-backdrop" id="reviewModal" onclick="if(event.target===this)closeReviewModal()">
  <div class="rm-box" role="dialog" aria-modal="true">
    <button class="rm-close" onclick="closeReviewModal()" aria-label="Close">✕</button>
    <div class="rm-head">
      <div class="rm-avatar" id="rm-avatar"></div>
      <div>
        <div class="rm-name" id="rm-name"></div>
        <div class="rm-meta" id="rm-meta"></div>
      </div>
    </div>
    <div class="rm-stars" id="rm-stars"></div>
    <div class="rm-title" id="rm-title"></div>
    <p class="rm-body" id="rm-body"></p>
  </div>
</div>
@endif

<!-- ====== CTA ====== -->
<section class="cta" id="book">
  <div class="cta-inner">
    <h2>Your room is <em>waiting</em>.</h2>
    <p>Best rate guarantee when you book directly. Complimentary airport transfer for stays of three nights or longer.</p>
    <button class="btn-primary">Reserve your stay →</button>
  </div>
</section>

<!-- ====== FOOTER ====== -->
<footer id="contact">
  <div class="footer-grid">
    <div>
      <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
        <img src="{{ asset('images/logo.png') }}" alt="Logo"
             style="height:44px;width:auto;display:block;flex-shrink:0;background:#fff;padding:3px 6px;border-radius:6px;">
        <div>
          <div class="footer-brand">Winsome Hotel</div>
          <p class="footer-tagline" style="margin-top:2px;">Charm, Luxury, Comfort</p>
        </div>
      </div>
      <p style="font-size: 13px; line-height: 1.7; max-width: 300px; margin-top: 10px;">A business hotel in the heart of Arusha offering comfortable accommodation with breathtaking views of Mount Meru and Mount Kilimanjaro.</p>
    </div>
    <div class="footer-col">
      <h5>Visit Us</h5>
      <ul>
        <li>
          <svg class="fc-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          Mkonoo, Terat, Arusha CBD, Arusha
        </li>
        <li>
          <svg class="fc-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.15 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.07 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.09 8.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21 16z"/></svg>
          <a href="tel:+255793411998">+255 793 411 998</a>
        </li>
        <li>
          <svg class="fc-icon fc-icon--wa" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413"/></svg>
          <a href="https://wa.me/255793411998" target="_blank" rel="noopener">WhatsApp Us</a>
        </li>
        <li>
          <svg class="fc-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          <a href="mailto:info@winsomehotel.co.tz">info@winsomehotel.co.tz</a>
        </li>
      </ul>
    </div>
    <div class="footer-col">
      <h5>Discover</h5>
      <ul>
        <li><a href="#rooms">Rooms</a></li>
        <li><a href="#facilities">Facilities</a></li>
        <li><a href="#about">Our Story</a></li>
        <li><a href="#experiences">Experiences</a></li>
        <li><a href="#book">Book a Stay</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h5>Connect</h5>
      <ul>
        <li><a href="https://www.instagram.com/winsome_hotel_arusha/">Instagram</a></li>
        <li><a href="#">Facebook</a></li>
        <li><a href="https://wa.me/255793411998" target="_blank" rel="noopener">WhatsApp</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <span>© 2026 Winsome Hotel · All rights reserved</span>
    <span>Business Hotel · Est. 2026 · Arusha, Tanzania</span>
  </div>
</footer>

<!-- ====== BOTTOM NAVIGATION (mobile) ====== -->
<div class="bottom-nav">
  <div class="bottom-nav-inner">
    <a href="{{ url('/') }}" class="active">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
      Home
    </a>
    <a href="#rooms">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
      Rooms
    </a>
    <a href="#book" class="bn-book">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
      Book
    </a>
    <a href="{{ route('location') }}">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
      Location
    </a>
    <a href="#contact">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.15 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.07 1h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L7.09 8.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16z"/></svg>
      Contact
    </a>
  </div>
</div>

<!-- ====== WHATSAPP FLOATING BUTTON ====== -->
<a href="https://wa.me/255793411998" target="_blank" rel="noopener" class="wa-float" aria-label="Chat with us on WhatsApp">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413"/></svg>
  <span class="wa-tooltip">Chat with us</span>
</a>

<script>
  // Nav scroll
  const nav = document.getElementById('nav');
  window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 60);
  });

  // Section reveal
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  }, { threshold: 0.1 });

  document.querySelectorAll('section').forEach(s => {
    s.style.opacity = '0';
    s.style.transform = 'translateY(40px)';
    s.style.transition = 'opacity 1s ease, transform 1s ease';
    observer.observe(s);
  });

  // Stepper helper for adults/children inputs
  function stepGuest(id, delta) {
    var el = document.getElementById(id);
    var min = parseInt(el.min) || 0;
    var max = parseInt(el.max) || 20;
    el.value = Math.min(max, Math.max(min, (parseInt(el.value) || 0) + delta));
  }

  // Sync booking bar values into modal visible fields before opening
  function openBookingModal(roomId) {
    var barRoomId = document.getElementById('room_id') ? document.getElementById('room_id').value : '';
    var barGuests = document.querySelector('[name="guests"]') ? document.querySelector('[name="guests"]').value : '2';
    document.getElementById('modal-room-id').value   = roomId || barRoomId;
    document.getElementById('modal-check-in').value  = document.getElementById('check_in').value;
    document.getElementById('modal-check-out').value = document.getElementById('check_out').value;
    document.getElementById('modal-adults').value    = barGuests;
    document.getElementById('booking-modal').style.display = 'flex';
  }

  // Hero / nav CTA → open modal with no pre-selected room
  document.querySelectorAll('.btn-primary, .nav-cta').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      openBookingModal(null);
    });
  });

  // Close modal when clicking backdrop
  document.getElementById('booking-modal').addEventListener('click', function(e) {
    if (e.target === this) this.style.display = 'none';
  });

  // Enforce check-out > check-in
  document.getElementById('check_in').addEventListener('change', function() {
    const checkout = document.getElementById('check_out');
    if (checkout.value && checkout.value <= this.value) {
      const next = new Date(this.value);
      next.setDate(next.getDate() + 1);
      checkout.value = next.toISOString().split('T')[0];
    }
    checkout.min = new Date(new Date(this.value).getTime() + 86400000).toISOString().split('T')[0];
  });

  // Re-open modal if there were validation errors
  if (document.body.dataset.errors === '1') {
    document.getElementById('booking-modal').style.display = 'flex';
  }

  // Review full-text modal
  const starPath = 'd="M10 1l2.39 4.84 5.34.78-3.87 3.77.91 5.32L10 13.27l-4.77 2.51.91-5.32L2.27 6.62l5.34-.78z"';
  function openReviewModal(btn) {
    const d = btn.dataset;
    document.getElementById('rm-avatar').textContent = d.name.charAt(0).toUpperCase();
    document.getElementById('rm-name').textContent  = d.name;
    const meta = [d.room ? 'Room: ' + d.room : '', d.date].filter(Boolean).join(' · ');
    document.getElementById('rm-meta').textContent  = meta;
    const rating = parseInt(d.rating) || 0;
    document.getElementById('rm-stars').innerHTML = Array.from({length:5}, (_,i) =>
      `<svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path ${starPath} fill="${i < rating ? '#F26B1F' : 'rgba(11,18,32,0.12)'}"/></svg>`
    ).join('');
    const titleEl = document.getElementById('rm-title');
    titleEl.textContent  = d.title;
    titleEl.style.display = d.title ? '' : 'none';
    document.getElementById('rm-body').textContent  = d.body;
    document.getElementById('reviewModal').classList.add('open');
    document.body.style.overflow = 'hidden';
  }
  function closeReviewModal() {
    document.getElementById('reviewModal').classList.remove('open');
    document.body.style.overflow = '';
  }
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeReviewModal();
  });
</script>

</body>
</html>