<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Winsome Hotel — A boutique stay on the Tanzanian coast</title>
<meta name="description" content="Winsome Hotel — a boutique stay in Arusha, Tanzania. Twenty-four suites, slow mornings, and a pool that catches the sunset." />

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,300;9..144,400;9..144,500;9..144,600&family=Inter+Tight:wght@300;400;500;600&display=swap" rel="stylesheet">

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

    --display: 'Fraunces', Georgia, serif;
    --body: 'Inter Tight', system-ui, sans-serif;
  }

  * { box-sizing: border-box; margin: 0; padding: 0; }
  html { scroll-behavior: smooth; }
  body {
    background: var(--cream);
    color: var(--ink);
    font-family: var(--body);
    font-size: 16px;
    line-height: 1.6;
    -webkit-font-smoothing: antialiased;
    overflow-x: hidden;
  }
  a { color: inherit; text-decoration: none; }
  img { max-width: 100%; display: block; }

  /* ============ GRAIN OVERLAY ============ */
  body::before {
    content: '';
    position: fixed; inset: 0;
    background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='200' height='200'><filter id='n'><feTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='2' stitchTiles='stitch'/><feColorMatrix values='0 0 0 0 0  0 0 0 0 0  0 0 0 0 0  0 0 0 0.06 0'/></filter><rect width='200' height='200' filter='url(%23n)'/></svg>");
    pointer-events: none;
    z-index: 9999;
    opacity: 0.5;
    mix-blend-mode: multiply;
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
    font-family: var(--display);
    font-weight: 400;
    font-size: 22px;
    letter-spacing: -0.01em;
    color: var(--cream);
    display: flex; align-items: center; gap: 10px;
  }
  .brand-logo {
    height: 34px;
    width: auto;
    display: block;
    filter: drop-shadow(0 1px 3px rgba(0,0,0,0.2));
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
    color: var(--ink);
    font-size: 13px; font-weight: 500;
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
    color: var(--ink);
    padding: 16px 30px;
    border-radius: 100px;
    font-weight: 500;
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
  .about-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    padding-top: 32px;
    border-top: 1px solid var(--line);
  }
  .about-stat strong {
    font-family: var(--display);
    font-size: 40px;
    font-weight: 400;
    color: var(--sky);
    display: block;
    line-height: 1;
  }
  .about-stat span {
    font-size: 12px;
    color: rgba(11, 18, 32, 0.6);
    text-transform: uppercase;
    letter-spacing: 0.1em;
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
      rgba(11,18,32,0.15) 0%,
      rgba(11,18,32,0.0)  25%,
      rgba(11,18,32,0.65) 100%
    );
    z-index: 1;
  }
  .exp-card h4 {
    font-family: var(--display);
    font-size: 26px;
    font-weight: 400;
    line-height: 1.1;
    margin-bottom: 6px;
    position: relative;
    z-index: 2;
  }
  .exp-card.tall h4 { font-size: 36px; }
  .exp-card .tag {
    font-size: 11px;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    opacity: 0.8;
    margin-bottom: 12px;
    position: relative;
    z-index: 2;
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
  }
  .rv-card:hover { transform: translateY(-3px); box-shadow: 0 8px 32px rgba(11,18,32,0.11); }
  /* Card head row */
  .rv-head { display: flex; align-items: center; gap: 14px; }
  .rv-avatar-init {
    width: 48px; height: 48px; border-radius: 50%; flex-shrink: 0;
    background: #EAEAEA; color: var(--ink);
    display: flex; align-items: center; justify-content: center;
    font-family: var(--display); font-size: 19px; font-weight: 500;
  }
  .rv-info { flex: 1; min-width: 0; }
  .rv-name { font-weight: 700; font-size: 15px; color: var(--ink); line-height: 1.2; }
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
  }
  .rv-body {
    font-size: 14px; color: #C06000;
    line-height: 1.75; flex: 1;
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
    font-size: 32px;
    color: var(--cream);
    margin-bottom: 16px;
    font-weight: 400;
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
  .footer-col a:hover { color: var(--ember-glow); }
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
    .booking-inner {
      grid-template-columns: 1fr 1fr;
      gap: 8px;
    }
    .booking-cta { grid-column: span 2; padding: 16px; }
    .booking-field { border-right: none; }
    .about { grid-template-columns: 1fr; gap: 48px; }
    .rooms-grid { grid-template-columns: 1fr; }
    .exp-grid {
      grid-template-columns: 1fr 1fr;
      grid-template-rows: auto;
    }
    .exp-card.tall { grid-row: auto; grid-column: span 2; min-height: 220px; }
    .footer-grid { grid-template-columns: 1fr 1fr; gap: 40px; }
    .footer-bottom { flex-direction: column; gap: 12px; }
    .rv-grid { grid-template-columns: 1fr; }
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
    @php
      $logoFile = collect(['logo.png','logo.svg','logo.jpg','logo.webp'])
        ->first(fn($f) => file_exists(public_path("images/{$f}")));
    @endphp
    @if($logoFile)
      <img src="{{ asset('images/' . $logoFile) }}" alt="Winsome Hotel" class="brand-logo">
    @else
      <span style="font-family:var(--display);font-size:22px;font-weight:400;letter-spacing:-0.01em;color:var(--cream);">Winsome</span>
    @endif
  </a>
  <ul>
    <li><a href="#rooms">Rooms</a></li>
    <li><a href="#about">The hotel</a></li>
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
      @if(file_exists(public_path('images/hero-main.jpg')))
        <img src="{{ asset('images/hero-main.jpg') }}" alt="Winsome Hotel">
      @elseif(file_exists(public_path('images/hero-main.png')))
        <img src="{{ asset('images/hero-main.png') }}" alt="Winsome Hotel">
      @else
        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=800&q=85"
             alt="Winsome Hotel">
      @endif
    </div>

    <div class="hero-frame-small">
      @if(file_exists(public_path('images/hero-small.jpg')))
        <img src="{{ asset('images/hero-small.jpg') }}" alt="Winsome Hotel detail">
      @elseif(file_exists(public_path('images/hero-small.png')))
        <img src="{{ asset('images/hero-small.png') }}" alt="Winsome Hotel detail">
      @else
        <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=400&q=85"
             alt="Winsome Hotel beach">
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
      @if(file_exists(public_path('images/about-1.jpg')))
        <img src="{{ asset('images/about-1.jpg') }}" alt="Winsome Hotel">
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
    <div class="badge-floating">★ Relais & Châteaux 2026</div>
  </div>
  <div>
    <div class="section-eyebrow">A house on the shore</div>
    <h2 class="section-title">A hotel built around <em>the things that matter</em>.</h2>
    <p class="body-lead">Winsome began as a single coral-stone house in Arusha, restored over four years by a family who believed hospitality should feel like coming home — not checking in.</p>
    <p class="body">Today, twenty-four suites face the Indian Ocean. There is a pool that catches the sunset, a library of books left behind by guests, and a kitchen that opens at six for early swimmers and stays open late for the talkative.</p>
    <div class="about-stats">
      <div class="about-stat">
        <strong>24</strong>
        <span>Suites</span>
      </div>
      <div class="about-stat">
        <strong>9.6</strong>
        <span>Guest score</span>
      </div>
      <div class="about-stat">
        <strong>2 km</strong>
        <span>Private beach</span>
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
            <div class="room-price">${{ number_format($room->price_per_night, 0) }}<small>/ night</small></div>
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
    <div class="section-eyebrow">Beyond the door</div>
    <h2 class="section-title">Days that earn their <em>own postcards</em>.</h2>

    <div class="exp-grid">

      <div class="exp-card tall">
        @if(file_exists(public_path('images/exp-1.jpg')))
          <img src="{{ asset('images/exp-1.jpg') }}" alt="Sunrise dhow sailing">
        @elseif(file_exists(public_path('images/exp-1.png')))
          <img src="{{ asset('images/exp-1.png') }}" alt="Sunrise dhow sailing">
        @else
          <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=85"
               alt="Sunrise dhow sailing">
        @endif
        <div class="arrow">→</div>
        <div class="tag">Half day</div>
        <h4>Sunrise dhow sailing<br>to Mbegani reef</h4>
      </div>

      <div class="exp-card">
        @if(file_exists(public_path('images/exp-2.jpg')))
          <img src="{{ asset('images/exp-2.jpg') }}" alt="Spice farm and old town">
        @elseif(file_exists(public_path('images/exp-2.png')))
          <img src="{{ asset('images/exp-2.png') }}" alt="Spice farm and old town">
        @else
          <img src="https://images.unsplash.com/photo-1596040033229-a9821ebd058d?auto=format&fit=crop&w=600&q=85"
               alt="Spice farm and old town">
        @endif
        <div class="arrow">→</div>
        <div class="tag">Full day</div>
        <h4>Spice farm &amp; old town</h4>
      </div>

      <div class="exp-card">
        @if(file_exists(public_path('images/exp-3.jpg')))
          <img src="{{ asset('images/exp-3.jpg') }}" alt="Sunset cocktails on the rooftop">
        @elseif(file_exists(public_path('images/exp-3.png')))
          <img src="{{ asset('images/exp-3.png') }}" alt="Sunset cocktails on the rooftop">
        @else
          <img src="https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?auto=format&fit=crop&w=600&q=85"
               alt="Sunset cocktails">
        @endif
        <div class="arrow">→</div>
        <div class="tag">Evening</div>
        <h4>Sunset cocktails on the rooftop</h4>
      </div>

      <div class="exp-card">
        @if(file_exists(public_path('images/exp-4.jpg')))
          <img src="{{ asset('images/exp-4.jpg') }}" alt="Yoga on the beach deck">
        @elseif(file_exists(public_path('images/exp-4.png')))
          <img src="{{ asset('images/exp-4.png') }}" alt="Yoga on the beach deck">
        @else
          <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?auto=format&fit=crop&w=600&q=85"
               alt="Yoga on the beach deck">
        @endif
        <div class="arrow">→</div>
        <div class="tag">Morning</div>
        <h4>Yoga on the beach deck</h4>
      </div>

      <div class="exp-card">
        @if(file_exists(public_path('images/exp-5.jpg')))
          <img src="{{ asset('images/exp-5.jpg') }}" alt="Coastal tasting menu">
        @elseif(file_exists(public_path('images/exp-5.png')))
          <img src="{{ asset('images/exp-5.png') }}" alt="Coastal tasting menu">
        @else
          <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?auto=format&fit=crop&w=600&q=85"
               alt="Coastal tasting menu">
        @endif
        <div class="arrow">→</div>
        <div class="tag">Chef's table</div>
        <h4>Coastal tasting menu</h4>
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
      <div class="footer-brand">
        @php
          $logoFile = $logoFile ?? collect(['logo.png','logo.svg','logo.jpg','logo.webp'])
            ->first(fn($f) => file_exists(public_path("images/{$f}")));
        @endphp
        @if($logoFile)
          <img src="{{ asset('images/' . $logoFile) }}" alt="Winsome Hotel" style="height:40px;width:auto;display:block;margin-bottom:16px;filter:brightness(0) invert(1);">
        @else
          Winsome
        @endif
      </div>
      <p style="font-size: 14px; line-height: 1.7; max-width: 320px;">A boutique hotel on the Tanzanian coast. Twenty-four suites, one shore, a thousand quiet hours.</p>
    </div>
    <div class="footer-col">
      <h5>Visit</h5>
      <ul>
        <li>East Africa Road</li>
        <li>Njiro, Arusha</li>
        <li>+255 700 000 000</li>
      </ul>
    </div>
    <div class="footer-col">
      <h5>Discover</h5>
      <ul>
        <li><a href="#rooms">Rooms</a></li>
        <li><a href="#experiences">Experiences</a></li>
        <li><a href="#">Dining</a></li>
        <li><a href="#">Press</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h5>Follow</h5>
      <ul>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">Pinterest</a></li>
        <li><a href="#">Newsletter</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <span>© 2026 Winsome Hotel · All rights reserved</span>
    <span>Crafted in Tanzania</span>
  </div>
</footer>

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
</script>

</body>
</html>