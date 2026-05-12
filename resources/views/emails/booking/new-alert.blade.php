<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>New Booking Request — Winsome Hotel</title>
<style>
  body { margin:0; padding:0; background:#0B1220; font-family:'Helvetica Neue',Helvetica,Arial,sans-serif; color:#F6F1E7; }
  table { border-collapse:collapse; }
  a { color:#F26B1F; text-decoration:none; }
  .wrapper { background:#0B1220; padding:40px 16px; }
  .card    { background:#131C2E; border-radius:16px; max-width:580px; margin:0 auto; overflow:hidden;
             border:1px solid rgba(255,255,255,0.07); }
  .header  { background:#0B1220; padding:32px 40px; border-bottom:1px solid rgba(255,255,255,0.07); }
  .header-inner { display:flex; align-items:center; justify-content:space-between; }
  .logo    { font-size:22px; font-weight:300; color:#F6F1E7; letter-spacing:-0.02em; margin:0 0 2px; }
  .tagline { font-size:11px; color:rgba(246,241,231,0.4); letter-spacing:0.15em; text-transform:uppercase; margin:0; }
  .new-badge { display:inline-block; background:#F26B1F; color:#0B1220; font-size:11px; font-weight:700;
               letter-spacing:0.1em; text-transform:uppercase; padding:5px 14px; border-radius:100px; }
  .alert-band { background:rgba(242,107,31,0.12); border-top:3px solid #F26B1F; padding:20px 40px;
                border-bottom:1px solid rgba(255,255,255,0.06); }
  .alert-band p { margin:0; font-size:13px; color:rgba(246,241,231,0.75); }
  .alert-band strong { color:#F26B1F; }
  .body { padding:36px 40px 32px; }
  .ref-block { background:#0B1220; border-radius:12px; padding:18px 22px; margin-bottom:28px;
               display:flex; align-items:center; justify-content:space-between; border:1px solid rgba(255,255,255,0.07); }
  .ref-label { font-size:11px; letter-spacing:0.15em; text-transform:uppercase; color:rgba(246,241,231,0.4); margin:0 0 4px; }
  .ref-num   { font-size:28px; font-weight:300; color:#F26B1F; letter-spacing:0.05em; margin:0; }
  .ref-time  { font-size:12px; color:rgba(246,241,231,0.35); text-align:right; }
  .section-title { font-size:11px; letter-spacing:0.15em; text-transform:uppercase; color:#6EA8DD;
                   margin:0 0 14px; font-weight:600; }
  .detail-table { width:100%; background:#0B1220; border-radius:12px; overflow:hidden; margin-bottom:28px;
                  border:1px solid rgba(255,255,255,0.07); }
  .detail-table td { padding:12px 18px; font-size:14px; border-bottom:1px solid rgba(255,255,255,0.05); }
  .detail-table tr:last-child td { border-bottom:none; }
  .dl { color:rgba(246,241,231,0.45); width:38%; }
  .dv { color:#F6F1E7; font-weight:500; }
  .dv-orange { color:#F26B1F; font-weight:600; }
  .cta-wrap { text-align:center; margin:32px 0 8px; }
  .cta-btn { display:inline-block; background:#F26B1F; color:#0B1220; font-size:15px; font-weight:700;
             padding:15px 36px; border-radius:100px; letter-spacing:0.02em; }
  .footer { background:#0B1220; padding:24px 40px; border-top:1px solid rgba(255,255,255,0.07); text-align:center; }
  .footer p { margin:0 0 6px; font-size:12px; color:rgba(246,241,231,0.3); line-height:1.7; }
</style>
</head>
<body>
<div class="wrapper">
<table class="card" width="100%" cellpadding="0" cellspacing="0">

  {{-- Header --}}
  <tr>
    <td class="header">
      <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <td>
            <p class="logo">Winsome</p>
            <p class="tagline">Hotel Admin Alert</p>
          </td>
          <td style="text-align:right;vertical-align:middle;">
            <span class="new-badge">New Booking</span>
          </td>
        </tr>
      </table>
    </td>
  </tr>

  {{-- Alert band --}}
  <tr>
    <td class="alert-band">
      <p>
        A new reservation request has been submitted by
        <strong>{{ $booking->guest_name }}</strong>.
        Please review and confirm within 24 hours.
      </p>
    </td>
  </tr>

  <tr>
    <td class="body">

      {{-- Reference block --}}
      <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:28px;">
        <tr>
          <td style="background:#0B1220;border-radius:12px;padding:16px 20px;border:1px solid rgba(255,255,255,0.07);">
            <table width="100%" cellpadding="0" cellspacing="0">
              <tr>
                <td>
                  <p style="margin:0;font-size:11px;letter-spacing:0.15em;text-transform:uppercase;color:rgba(246,241,231,0.4);">Booking reference</p>
                  <p style="margin:4px 0 0;font-size:28px;font-weight:300;color:#F26B1F;letter-spacing:0.05em;">
                    #{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}
                  </p>
                </td>
                <td style="text-align:right;vertical-align:middle;">
                  <p style="margin:0;font-size:12px;color:rgba(246,241,231,0.3);">Submitted</p>
                  <p style="margin:2px 0 0;font-size:13px;color:rgba(246,241,231,0.6);">{{ $booking->created_at->format('d M Y, H:i') }}</p>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>

      {{-- Guest info --}}
      <p class="section-title">Guest Information</p>
      <table class="detail-table" cellpadding="0" cellspacing="0">
        <tr>
          <td class="dl">Name</td>
          <td class="dv">{{ $booking->guest_name }}</td>
        </tr>
        <tr>
          <td class="dl">Email</td>
          <td class="dv"><a href="mailto:{{ $booking->email }}">{{ $booking->email }}</a></td>
        </tr>
        @if($booking->phone)
        <tr>
          <td class="dl">Phone</td>
          <td class="dv"><a href="tel:{{ $booking->phone }}" style="color:#F6F1E7;">{{ $booking->phone }}</a></td>
        </tr>
        @endif
      </table>

      {{-- Stay details --}}
      <p class="section-title">Reservation Details</p>
      <table class="detail-table" cellpadding="0" cellspacing="0">
        @if($booking->room)
        <tr>
          <td class="dl">Room</td>
          <td class="dv">{{ $booking->room->name }}</td>
        </tr>
        @endif
        <tr>
          <td class="dl">Check-in</td>
          <td class="dv">{{ $booking->check_in->format('l, d F Y') }}</td>
        </tr>
        <tr>
          <td class="dl">Check-out</td>
          <td class="dv">{{ $booking->check_out->format('l, d F Y') }}</td>
        </tr>
        <tr>
          <td class="dl">Duration</td>
          <td class="dv">{{ $booking->nights }} {{ $booking->nights === 1 ? 'night' : 'nights' }}</td>
        </tr>
        <tr>
          <td class="dl">Adults</td>
          <td class="dv">{{ $booking->guests }}</td>
        </tr>
        @if($booking->children)
        <tr>
          <td class="dl">Children</td>
          <td class="dv">{{ $booking->children }}</td>
        </tr>
        @endif
        @if($booking->total_price)
        <tr>
          <td class="dl">Estimated total</td>
          <td class="dv dv-orange">${{ number_format($booking->total_price, 0) }} USD</td>
        </tr>
        @endif
        @if($booking->notes)
        <tr>
          <td class="dl">Guest notes</td>
          <td class="dv" style="font-weight:400;color:rgba(246,241,231,0.75);">{{ $booking->notes }}</td>
        </tr>
        @endif
      </table>

      {{-- CTA --}}
      <div class="cta-wrap">
        <a href="{{ url('/admin/bookings/' . $booking->id) }}" class="cta-btn">
          View &amp; Confirm in Admin →
        </a>
      </div>
      <p style="text-align:center;font-size:12px;color:rgba(246,241,231,0.3);margin-top:12px;">
        Or go to <a href="{{ url('/admin/bookings') }}">admin/bookings</a> to see all pending requests.
      </p>

    </td>
  </tr>

  <tr>
    <td class="footer">
      <p><strong style="color:rgba(246,241,231,0.6);">Winsome Hotel</strong> &middot; Arusha, Tanzania</p>
      <p>This is an automated alert sent to hotel staff only.</p>
    </td>
  </tr>

</table>
</div>
</body>
</html>
