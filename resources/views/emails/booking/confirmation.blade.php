<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking Request Received — Winsome Hotel</title>
<style>
  body { margin:0; padding:0; background:#F6F1E7; font-family:'Helvetica Neue',Helvetica,Arial,sans-serif; color:#0B1220; }
  table { border-collapse:collapse; }
  a { color:#F26B1F; text-decoration:none; }
  .wrapper { background:#F6F1E7; padding:40px 16px; }
  .card    { background:#ffffff; border-radius:16px; max-width:560px; margin:0 auto; overflow:hidden;
             box-shadow:0 8px 40px rgba(11,18,32,0.10); }
  .header  { background:#0B1220; padding:36px 40px; text-align:center; }
  .logo    { font-size:28px; font-weight:300; color:#F6F1E7; letter-spacing:-0.02em; margin:0 0 4px; }
  .tagline { font-size:12px; color:rgba(246,241,231,0.5); letter-spacing:0.15em; text-transform:uppercase; margin:0; }
  .hero-band { background:#F26B1F; padding:18px 40px; text-align:center; }
  .hero-band p { margin:0; font-size:13px; letter-spacing:0.15em; text-transform:uppercase; color:#0B1220; font-weight:600; }
  .body { padding:40px 40px 32px; }
  .greeting { font-size:22px; font-weight:300; margin:0 0 12px; letter-spacing:-0.01em; }
  .intro    { font-size:15px; color:rgba(11,18,32,0.7); line-height:1.65; margin:0 0 28px; }
  .detail-table { width:100%; background:#F6F1E7; border-radius:12px; overflow:hidden; margin-bottom:28px; }
  .detail-table td { padding:12px 18px; font-size:14px; border-bottom:1px solid rgba(11,18,32,0.07); }
  .detail-table tr:last-child td { border-bottom:none; }
  .detail-label { color:rgba(11,18,32,0.5); width:40%; }
  .detail-value { color:#0B1220; font-weight:500; }
  .next-title { font-size:11px; letter-spacing:0.15em; text-transform:uppercase; color:#2C6FB5;
                margin:0 0 16px; font-weight:600; }
  .footer { background:#0B1220; padding:28px 40px; text-align:center; }
  .footer p { margin:0 0 8px; font-size:12px; color:rgba(246,241,231,0.4); line-height:1.7; }
  .footer a { color:rgba(246,241,231,0.6); }
</style>
</head>
<body>
<div class="wrapper">
<table class="card" width="100%" cellpadding="0" cellspacing="0">

  <tr>
    <td class="header">
      <p class="logo">Winsome</p>
      <p class="tagline">Arusha &middot; Tanzania</p>
    </td>
  </tr>

  <tr>
    <td class="hero-band">
      <p>&#10003; &nbsp; Booking request received</p>
    </td>
  </tr>

  <tr>
    <td class="body">
      <p class="greeting">Dear {{ $booking->guest_name }},</p>
      <p class="intro">
        Thank you for choosing Winsome. We have received your reservation request and our team
        will review it within <strong>24&nbsp;hours</strong>. You will receive a follow-up email
        once your booking is confirmed.
      </p>

      {{-- Booking reference block --}}
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
                  <span style="background:rgba(242,107,31,0.15);color:#F26B1F;font-size:12px;font-weight:600;padding:6px 14px;border-radius:100px;letter-spacing:0.05em;text-transform:uppercase;">Pending</span>
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
          <td class="detail-label">Estimated total</td>
          <td class="detail-value" style="color:#F26B1F;">${{ number_format($booking->total_price, 0) }}&nbsp;USD</td>
        </tr>
        @endif
        @if($booking->notes)
        <tr>
          <td class="detail-label">Your notes</td>
          <td class="detail-value" style="font-weight:400;">{{ $booking->notes }}</td>
        </tr>
        @endif
      </table>

      {{-- What happens next --}}
      <p class="next-title">What happens next</p>
      <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:28px;">
        @foreach([
          'Our reservations team reviews your request and checks room availability.',
          'You receive a confirmation email with payment instructions within 24 hours.',
          'Your room is held. Complimentary airport transfer arranged for stays of 3+ nights.'
        ] as $i => $step)
        <tr>
          <td style="padding-bottom:14px;">
            <table cellpadding="0" cellspacing="0">
              <tr>
                <td style="width:36px;vertical-align:top;padding-top:2px;">
                  <div style="width:26px;height:26px;background:#F26B1F;border-radius:50%;text-align:center;line-height:26px;color:#fff;font-size:12px;font-weight:700;">{{ $i + 1 }}</div>
                </td>
                <td style="padding-left:12px;font-size:14px;color:rgba(11,18,32,0.7);line-height:1.55;">{{ $step }}</td>
              </tr>
            </table>
          </td>
        </tr>
        @endforeach
      </table>

      <p style="font-size:14px;color:rgba(11,18,32,0.6);line-height:1.65;margin:0;">
        Questions? Reply to this email or reach us at
        <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a>.
      </p>
    </td>
  </tr>

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
