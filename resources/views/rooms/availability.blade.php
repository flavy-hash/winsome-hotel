<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Availability — {{ $room->name }} · Winsome Hotel</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter+Tight:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  :root {
    --ink:        #0B1220;
    --ink-soft:   #131C2E;
    --ink-mid:    #1A2438;
    --ember:      #F26B1F;
    --ember-deep: #C44E0E;
    --ember-glow: #FFB070;
    --sky:        #2C6FB5;
    --cream:      #F6F1E7;
    --line:       rgba(255,255,255,0.07);
    --display:    'Poppins', system-ui, sans-serif;
    --body:       'Inter Tight', system-ui, sans-serif;
  }
  body { background: var(--ink); color: var(--cream); font-family: var(--body); font-size: 16px; line-height: 1.6; -webkit-font-smoothing: antialiased; }
  a { color: inherit; text-decoration: none; }

  /* NAV */
  nav {
    position: sticky; top: 0; z-index: 200;
    background: var(--ink); border-bottom: 1px solid var(--line);
    display: flex; align-items: center; justify-content: space-between;
    padding: 0 48px; height: 68px;
  }
  .brand { display: flex; align-items: center; gap: 12px; }
  .brand-logo { height: 38px; background: #fff; padding: 3px 6px; border-radius: 6px; }
  .brand-name { font-family: var(--display); font-size: 17px; font-weight: 400; color: var(--cream); }
  .nav-back {
    display: inline-flex; align-items: center; gap: 8px;
    font-size: 13px; color: rgba(246,241,231,0.6);
    border: 1px solid var(--line); padding: 8px 18px; border-radius: 100px;
    transition: all 0.2s;
  }
  .nav-back:hover { color: var(--cream); border-color: rgba(255,255,255,0.2); }

  /* PAGE */
  .page { max-width: 1000px; margin: 0 auto; padding: 60px 24px 100px; }

  /* ROOM HEADER */
  .room-header {
    display: flex; align-items: center; gap: 20px;
    background: var(--ink-soft); border: 1px solid var(--line);
    border-radius: 16px; padding: 20px 24px; margin-bottom: 32px;
  }
  .room-thumb {
    width: 80px; height: 80px; border-radius: 10px; overflow: hidden; flex-shrink: 0;
    background: var(--ink-mid);
  }
  .room-thumb img { width: 100%; height: 100%; object-fit: cover; }
  .room-header-info { flex: 1; }
  .room-header-name { font-family: var(--display); font-size: 22px; font-weight: 400; color: var(--cream); margin-bottom: 4px; }
  .room-header-meta { font-size: 13px; color: rgba(246,241,231,0.45); }
  .btn-book-now {
    background: var(--ember); color: var(--ink);
    padding: 12px 28px; border-radius: 100px;
    font-family: var(--body); font-size: 14px; font-weight: 600;
    transition: background 0.2s; white-space: nowrap;
  }
  .btn-book-now:hover { background: var(--ember-deep); color: #fff; }

  /* CONFLICT BANNER */
  .conflict-banner {
    background: rgba(185,28,28,0.18); border: 1px solid rgba(252,165,165,0.3);
    border-radius: 12px; padding: 16px 20px; margin-bottom: 32px;
    display: flex; gap: 14px; align-items: flex-start;
  }
  .conflict-icon { font-size: 22px; flex-shrink: 0; margin-top: 2px; }
  .conflict-title { font-family: var(--display); font-size: 16px; font-weight: 500; color: #FCA5A5; margin-bottom: 4px; }
  .conflict-body { font-size: 13px; color: rgba(252,165,165,0.8); line-height: 1.6; }

  /* SECTION HEADING */
  .section-eyebrow { font-size: 11px; letter-spacing: 0.2em; text-transform: uppercase; color: var(--ember); margin-bottom: 8px; font-weight: 500; }
  .section-title { font-family: var(--display); font-size: 28px; font-weight: 300; color: var(--cream); letter-spacing: -0.02em; margin-bottom: 28px; }

  /* CALENDAR GRID */
  .cal-months { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
  @media (max-width: 760px) { .cal-months { grid-template-columns: 1fr; } nav { padding: 0 16px; } .page { padding: 32px 16px 80px; } .room-header { flex-wrap: wrap; } .btn-book-now { width: 100%; text-align: center; } }
  @media (max-width: 960px) and (min-width: 761px) { .cal-months { grid-template-columns: repeat(2, 1fr); } }

  .cal-month {
    background: var(--ink-soft); border: 1px solid var(--line);
    border-radius: 14px; overflow: hidden;
  }
  .cal-month-header {
    background: var(--ink-mid); padding: 12px 16px;
    font-family: var(--display); font-size: 14px; font-weight: 500;
    color: var(--cream); text-align: center; letter-spacing: 0.01em;
  }
  .cal-dow-row { display: grid; grid-template-columns: repeat(7, 1fr); padding: 8px 8px 0; }
  .cal-dow { text-align: center; font-size: 10px; letter-spacing: 0.06em; text-transform: uppercase; color: rgba(246,241,231,0.3); padding: 4px 0; }
  .cal-days { display: grid; grid-template-columns: repeat(7, 1fr); padding: 4px 8px 12px; gap: 2px; }
  .cal-day {
    aspect-ratio: 1; display: flex; align-items: center; justify-content: center;
    font-size: 12px; border-radius: 6px; position: relative;
    color: rgba(246,241,231,0.65);
  }
  .cal-day.past { color: rgba(246,241,231,0.2); }
  .cal-day.today { outline: 1px solid var(--ember); outline-offset: -1px; color: var(--ember); font-weight: 600; }
  .cal-day.booked {
    background: rgba(185,28,28,0.3);
    color: #FCA5A5; font-weight: 600;
  }
  .cal-day.booked::after {
    content: ''; position: absolute; bottom: 3px; left: 50%;
    transform: translateX(-50%); width: 4px; height: 4px;
    background: #FCA5A5; border-radius: 50%;
  }
  .cal-day.free { color: rgba(246,241,231,0.75); }
  .cal-day.empty { background: none; }

  /* LEGEND */
  .legend {
    display: flex; gap: 20px; flex-wrap: wrap;
    background: var(--ink-soft); border: 1px solid var(--line);
    border-radius: 12px; padding: 14px 20px; margin-top: 24px;
  }
  .legend-item { display: flex; align-items: center; gap: 8px; font-size: 13px; color: rgba(246,241,231,0.55); }
  .legend-dot { width: 12px; height: 12px; border-radius: 3px; flex-shrink: 0; }
  .legend-dot.booked { background: rgba(185,28,28,0.5); }
  .legend-dot.free { background: rgba(246,241,231,0.15); border: 1px solid rgba(246,241,231,0.2); }
  .legend-dot.today-dot { outline: 1px solid var(--ember); }

  /* NEXT FREE WINDOW */
  .next-free {
    background: rgba(21,128,61,0.12); border: 1px solid rgba(74,222,128,0.2);
    border-radius: 12px; padding: 16px 20px; margin-top: 24px;
    display: flex; align-items: center; gap: 14px;
  }
  .next-free-icon { font-size: 22px; }
  .next-free-label { font-size: 12px; text-transform: uppercase; letter-spacing: 0.12em; color: #86EFAC; font-weight: 600; margin-bottom: 2px; }
  .next-free-dates { font-family: var(--display); font-size: 18px; color: var(--cream); }

  footer { background: var(--ink-soft); border-top: 1px solid var(--line); text-align: center; padding: 32px 24px; font-size: 13px; color: rgba(246,241,231,0.3); }
</style>
</head>
<body>

<nav>
  <a href="{{ url('/') }}" class="brand">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-logo">
    <span class="brand-name">Winsome Hotel</span>
  </a>
  <a href="{{ route('rooms.show', $room) }}" class="nav-back">← Back to {{ $room->name }}</a>
</nav>

<div class="page">

  {{-- Room header --}}
  <div class="room-header">
    <div class="room-thumb">
      @if($room->image_path)
        <img src="{{ asset('storage/' . $room->image_path) }}" alt="{{ $room->name }}">
      @endif
    </div>
    <div class="room-header-info">
      <div class="room-header-name">{{ $room->name }}</div>
      <div class="room-header-meta">
        {{ implode(' · ', array_filter([$room->size_sqm, $room->bed_type, $room->tag])) }}
      </div>
    </div>
    <a href="{{ route('rooms.show', $room) }}#reserve" class="btn-book-now">Book this room →</a>
  </div>

  {{-- Conflict banner (shown when redirected from a failed booking) --}}
  @if(session('conflict_from'))
  <div class="conflict-banner">
    <div class="conflict-icon">🚫</div>
    <div>
      <div class="conflict-title">Room already booked for those dates</div>
      <div class="conflict-body">
        You requested <strong>{{ \Carbon\Carbon::parse(session('tried_in'))->format('M d, Y') }}</strong>
        → <strong>{{ \Carbon\Carbon::parse(session('tried_out'))->format('M d, Y') }}</strong>,
        but this room is already reserved from
        <strong>{{ session('conflict_from') }}</strong> to <strong>{{ session('conflict_to') }}</strong>.
        Please pick a free period from the calendar below and
        <a href="{{ route('rooms.show', $room) }}#reserve" style="color:var(--ember);text-decoration:underline;">try again</a>.
      </div>
    </div>
  </div>
  @endif

  {{-- Calendar section --}}
  <div class="section-eyebrow">Availability</div>
  <h1 class="section-title">When is {{ $room->name }} free?</h1>

  <div class="cal-months" id="cal-months"></div>

  <div class="legend">
    <div class="legend-item"><div class="legend-dot booked"></div> Already booked</div>
    <div class="legend-item"><div class="legend-dot free"></div> Available</div>
    <div class="legend-item">
      <div class="legend-dot today-dot" style="width:12px;height:12px;border-radius:3px;outline:1px solid var(--ember);"></div>
      Today
    </div>
  </div>

  <div class="next-free" id="next-free" style="display:none;">
    <div class="next-free-icon">✅</div>
    <div>
      <div class="next-free-label">Next available window</div>
      <div class="next-free-dates" id="next-free-text"></div>
    </div>
  </div>

</div>

<footer>
  <p>&copy; {{ date('Y') }} Winsome Hotel, Arusha &nbsp;·&nbsp;
    <a href="{{ url('/') }}" style="color:rgba(246,241,231,0.45);">Back to homepage</a>
  </p>
</footer>

<script>
  var BOOKED = @json($bookedRanges);
  var MONTHS = ['January','February','March','April','May','June','July','August','September','October','November','December'];
  var DOWS   = ['Su','Mo','Tu','We','Th','Fr','Sa'];

  function pad(n){ return String(n).padStart(2,'0'); }
  function ds(y,m,d){ return y+'-'+pad(m+1)+'-'+pad(d); }

  function isBooked(y,m,d){
    var s = ds(y,m,d);
    return BOOKED.some(function(r){ return s >= r.from && s < r.to; });
  }

  function renderMonth(container, year, month){
    var today = new Date(); today.setHours(0,0,0,0);
    var header = document.createElement('div');
    header.className = 'cal-month-header';
    header.textContent = MONTHS[month] + ' ' + year;
    container.appendChild(header);

    var dowRow = document.createElement('div'); dowRow.className = 'cal-dow-row';
    DOWS.forEach(function(d){ var el=document.createElement('div'); el.className='cal-dow'; el.textContent=d; dowRow.appendChild(el); });
    container.appendChild(dowRow);

    var grid = document.createElement('div'); grid.className = 'cal-days';
    var firstDow = new Date(year, month, 1).getDay();
    var daysInMonth = new Date(year, month+1, 0).getDate();

    for(var i=0;i<firstDow;i++){
      var b=document.createElement('div'); b.className='cal-day empty'; grid.appendChild(b);
    }
    for(var d=1;d<=daysInMonth;d++){
      var cell = document.createElement('div');
      var date = new Date(year, month, d);
      var cls  = 'cal-day';
      if(date < today)            cls += ' past';
      else if(date.getTime()===today.getTime()) cls += ' today free';
      else if(isBooked(year,month,d)) cls += ' booked';
      else                             cls += ' free';
      cell.className  = cls;
      cell.textContent = d;
      grid.appendChild(cell);
    }
    container.appendChild(grid);
  }

  // Render 4 months starting from current
  var now = new Date();
  var wrap = document.getElementById('cal-months');
  for(var i=0;i<4;i++){
    var y = now.getFullYear(), m = now.getMonth()+i;
    if(m>11){ m-=12; y++; }
    var box = document.createElement('div'); box.className='cal-month';
    renderMonth(box, y, m);
    wrap.appendChild(box);
  }

  // Find next free window
  (function(){
    var today = new Date(); today.setHours(0,0,0,0);
    var cursor = new Date(today);
    var maxDays = 180;
    for(var i=0;i<maxDays;i++){
      var y=cursor.getFullYear(), mo=cursor.getMonth(), d=cursor.getDate();
      if(!isBooked(y,mo,d)){
        // found start — now find how long it's free
        var start = new Date(cursor);
        var end   = new Date(cursor); end.setDate(end.getDate()+1);
        while(!isBooked(end.getFullYear(),end.getMonth(),end.getDate()) && (end-start)/(86400000)<30){
          end.setDate(end.getDate()+1);
        }
        var fmt = function(dt){ return MONTHS[dt.getMonth()]+' '+dt.getDate()+', '+dt.getFullYear(); };
        document.getElementById('next-free').style.display='flex';
        document.getElementById('next-free-text').textContent =
          fmt(start) + ' → ' + fmt(end) + ' (or later)';
        break;
      }
      cursor.setDate(cursor.getDate()+1);
    }
  })();
</script>
</body>
</html>
