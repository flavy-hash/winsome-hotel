<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Booking Confirmed — Winsome Hotel</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,300;9..144,400&family=Inter+Tight:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
  :root {
    --ink: #0B1220; --ember: #F26B1F; --sky: #2C6FB5;
    --cream: #F6F1E7; --display: 'Fraunces', Georgia, serif; --body: 'Inter Tight', system-ui, sans-serif;
  }
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { background: var(--cream); font-family: var(--body); color: var(--ink); min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 40px 24px; }
  .card { background: #fff; border-radius: 20px; padding: 56px 48px; max-width: 540px; width: 100%; box-shadow: 0 30px 80px rgba(11,18,32,0.1); text-align: center; }
  .icon { width: 64px; height: 64px; background: var(--ember); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 24px; font-size: 28px; }
  h1 { font-family: var(--display); font-weight: 300; font-size: 36px; letter-spacing: -0.02em; margin-bottom: 12px; }
  .subtitle { color: rgba(11,18,32,0.6); margin-bottom: 40px; }
  .details { text-align: left; background: var(--cream); border-radius: 12px; padding: 24px; margin-bottom: 32px; }
  .detail-row { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid rgba(11,18,32,0.08); font-size: 14px; }
  .detail-row:last-child { border-bottom: none; }
  .detail-row strong { color: var(--ink); }
  .detail-row span { color: rgba(11,18,32,0.6); }
  .badge { display: inline-block; background: #FEF3C7; color: #92400E; padding: 4px 12px; border-radius: 100px; font-size: 12px; font-weight: 500; margin-bottom: 32px; }
  .btn { display: inline-block; background: var(--ember); color: var(--ink); padding: 14px 28px; border-radius: 100px; font-weight: 500; font-size: 14px; text-decoration: none; }
  .btn:hover { background: #FFB070; }
</style>
</head>
<body>
<div class="card">
  <div class="icon">✓</div>
  <h1>Request received!</h1>
  <p class="subtitle">We'll confirm your booking within 24 hours. Check your email for details.</p>

  <span class="badge">Status: Pending confirmation</span>

  <div class="details">
    <div class="detail-row">
      <span>Name</span>
      <strong>{{ $booking->guest_name }}</strong>
    </div>
    <div class="detail-row">
      <span>Email</span>
      <strong>{{ $booking->email }}</strong>
    </div>
    @if($booking->room)
    <div class="detail-row">
      <span>Room</span>
      <strong>{{ $booking->room->name }}</strong>
    </div>
    @endif
    <div class="detail-row">
      <span>Check-in</span>
      <strong>{{ $booking->check_in->format('d M Y') }}</strong>
    </div>
    <div class="detail-row">
      <span>Check-out</span>
      <strong>{{ $booking->check_out->format('d M Y') }}</strong>
    </div>
    <div class="detail-row">
      <span>Guests</span>
      <strong>{{ $booking->guests }}</strong>
    </div>
    @if($booking->total_price)
    <div class="detail-row">
      <span>Estimated total</span>
      <strong>${{ number_format($booking->total_price, 0) }}</strong>
    </div>
    @endif
    <div class="detail-row">
      <span>Booking ref</span>
      <strong>#{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</strong>
    </div>
  </div>

  <a href="{{ url('/') }}" class="btn">Back to Winsome</a>
</div>
</body>
</html>
