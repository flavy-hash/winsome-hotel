<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reservation Confirmed — Winsome Hotel</title>
<style>
  body { margin:0; padding:0; background:#F6F1E7; font-family:'Helvetica Neue',Helvetica,Arial,sans-serif; color:#0B1220; }
  table { border-collapse:collapse; }
  a { color:#F26B1F; text-decoration:none; }
  .wrapper  { background:#F6F1E7; padding:40px 16px; }
  .card     { background:#ffffff; border-radius:16px; max-width:560px; margin:0 auto; overflow:hidden;
              box-shadow:0 8px 40px rgba(11,18,32,0.10); }
  .header   { background:#0B1220; padding:36px 40px; text-align:center; }
  .logo     { font-size:28px; font-weight:300; color:#F6F1E7; letter-spacing:-0.02em; margin:0 0 4px; }
  .tagline  { font-size:12px; color:rgba(246,241,231,0.5); letter-spacing:0.15em; text-transform:uppercase; margin:0; }
  .hero-band{ background:#22C55E; padding:18px 40px; text-align:center; }
  .hero-band p { margin:0; font-size:13px; letter-spacing:0.15em; text-transform:uppercase; color:#fff; font-weight:700; }
  .body     { padding:40px 40px 32px; }
  .greeting { font-size:22px; font-weight:300; margin:0 0 12px; letter-spacing:-0.01em; }
  .intro    { font-size:15px; color:rgba(11,18,32,0.7); line-height:1.65; margin:0 0 28px; }
  .detail-table { width:100%; background:#F6F1E7; border-radius:12px; overflow:hidden; margin-bottom:28px; }
  .detail-table td { padding:12px 18px; font-size:14px; border-bottom:1px solid rgba(11,18,32,0.07); }
  .detail-table tr:last-child td { border-bottom:none; }
  .detail-label { color:rgba(11,18,32,0.5); width:42%; }
  .detail-value { color:#0B1220; font-weight:500; }
  .checklist-title { font-size:11px; letter-spacing:0.15em; text-transform:uppercase; color:#2C6FB5;
                     margin:0 0 16px; font-weight:600; }
  .footer   { background:#0B1220; padding:28px 40px; text-align:center; }
  .footer p { margin:0 0 8px; font-size:12px; color:rgba(246,241,231,0.4); line-height:1.7; }
  .footer a { color:rgba(246,241,231,0.6); }
</style>
</head>
<body>
<div class="wrapper">
<table class="card" width="100%" cellpadding="0" cellspacing="0">

  {{-- Header --}}
  <tr>
    <td class="header">
      <p class="logo">Winsome</p>
      <p class="tagline">Arusha &middot; Tanzania</p>
    </td>
  </tr>

  {{-- Green confirmed band --}}
  <tr>
    <td class="hero-band">
      <p>&#10003; &nbsp; Your reservation is confirmed</p>
    </td>
  </tr>

  {{-- Body --}}
  <tr>
    <td class="body">
      <p class="greeting">Dear {{ $booking->guest_name }},</p>
      <p class="intro">
        Great news — your reservation at Winsome has been <strong>confirmed</strong>.
        We are looking forward to welcoming you to Arusha. Everything is arranged;
        all you need to do is arrive.
      </p>

      {{-- Reference block --}}
      <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:24px;">
        <tr>
          <td style="background:#0B1220;border-radius:10px;padding:16px 20px;">
            <table width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td>
                  <p style="margin:0;font-size:11px;letter-spacing:0.15em;text-transform:uppercase;color:rgba(246,241,231,0.5);">Booking reference</p>
                  <p style="margin:4px 0 0;font-size:26px;font-weight:300;color:#F26B1F;letter-spacing:0.05em;">
                    #{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}
                  </p>
                </td>
                <td style="text-align:right;vertical-align:middle;">
                  <span style="background:#22C55E;color:#fff;font-size:12px;font-weight:700;padding:6px 14px;border-radius:100px;letter-spacing:0.05em;text-transform:uppercase;">Confirmed</span>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>

      {{-- Stay details --}}
      <table class="detail-table" cellpadding="0" cellspacing="0">
        @if($booking->room)
        <tr>
          <td class="detail-label">Room</td>
          <td class="detail-value">{{ $booking->room->name }}</td>
        </tr>
        @if($booking->room->size_sqm || $booking->room->bed_type)
        <tr>
          <td class="detail-label">Room details</td>
          <td class="detail-value" style="font-weight:400;color:rgba(11,18,32,0.65);">
            {{ implode(' &middot; ', array_filter([$booking->room->size_sqm, $booking->room->bed_type])) }}
          </td>
        </tr>
        @endif
        @endif
        <tr>
          <td class="detail-label">Check-in</td>
          <td class="detail-value">{{ $booking->check_in->format('l, d F Y') }}</td>
        </tr>
        <tr>
          <td class="detail-label">Check-out</td>
          <td class="detail-value">{{ $booking->check_out->format('l, d F Y') }}</td>
        </tr>
        <tr>
          <td class="detail-label">Duration</td>
          <td class="detail-value">{{ $booking->nights }} {{ $booking->nights === 1 ? 'night' : 'nights' }}</td>
        </tr>
        <tr>
          <td class="detail-label">Guests</td>
          <td class="detail-value">{{ $booking->guests }} {{ $booking->guests === 1 ? 'adult' : 'adults' }}</td>
        </tr>
        @if($booking->total_price)
        <tr>
          <td class="detail-label">Total</td>
          <td class="detail-value" style="color:#F26B1F;font-size:16px;">${{ number_format($booking->total_price, 0) }}&nbsp;USD</td>
        </tr>
        @endif
      </table>

      {{-- Good to know checklist --}}
      <p class="checklist-title">Good to know before you arrive</p>
      <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:28px;">
        @foreach([
          ['icon' => '🕐', 'text' => 'Check-in from <strong>2:00 PM</strong>. Early check-in available on request (subject to availability).'],
          ['icon' => '🕚', 'text' => 'Check-out by <strong>11:00 AM</strong>. Late check-out available for an additional fee.'],
          ['icon' => '✈️', 'text' => 'Complimentary airport transfer for stays of 3+ nights. Please share your flight details at least 24 hours prior.'],
          ['icon' => '📶', 'text' => 'Complimentary Wi-Fi throughout the hotel and on the beach deck.'],
        ] as $item)
        <tr>
          <td style="padding-bottom:12px;">
            <table cellpadding="0" cellspacing="0">
              <tr>
                <td style="width:32px;vertical-align:top;padding-top:1px;font-size:16px;">{{ $item['icon'] }}</td>
                <td style="padding-left:10px;font-size:14px;color:rgba(11,18,32,0.72);line-height:1.55;">{!! $item['text'] !!}</td>
              </tr>
            </table>
          </td>
        </tr>
        @endforeach
      </table>

      {{-- Contact --}}
      <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <td style="background:#F6F1E7;border-radius:10px;padding:18px 20px;">
            <p style="margin:0 0 6px;font-size:11px;letter-spacing:0.15em;text-transform:uppercase;color:rgba(11,18,32,0.45);font-weight:600;">Need to reach us?</p>
            <p style="margin:0;font-size:14px;color:rgba(11,18,32,0.75);line-height:1.6;">
              Reply to this email &nbsp;·&nbsp;
              <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a><br>
              Arusha, Tanzania
            </p>
          </td>
        </tr>
      </table>
    </td>
  </tr>

  {{-- Footer --}}
  <tr>
    <td class="footer">
      <p><strong style="color:rgba(246,241,231,0.8);">Winsome Hotel</strong></p>
      <p>Arusha, Tanzania</p>
      <p style="border-top:1px solid rgba(255,255,255,0.07);padding-top:16px;margin-top:8px;">
        &copy; {{ date('Y') }} Winsome Hotel &middot; All rights reserved
      </p>
    </td>
  </tr>

</table>
</div>
</body>
</html>
