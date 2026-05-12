<?php

return [
    /*
     | The email address that receives new booking alerts.
     | Defaults to the main MAIL_FROM_ADDRESS if not set.
     | Set HOTEL_BOOKING_EMAIL in your .env to use a different address.
     */
    'booking_email' => env('HOTEL_BOOKING_EMAIL'),
];
