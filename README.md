# Winsome Hotel

A full-featured hotel website and booking system built with **Laravel 12** and **Filament v3**. Includes a public-facing frontend, a room booking flow with email notifications, a guest review system, and a complete admin panel for hotel staff.

---

## Features

### Public Frontend
- **Homepage** — hero section, room highlights (3 featured), experiences, guest reviews, CTA
- **Rooms listing** (`/rooms`) — all available rooms with images, amenities, pricing
- **Room detail page** (`/rooms/{room}`) — full gallery lightbox, specs, booking sidebar, per-room reviews
- **Reviews page** (`/reviews`) — all approved reviews with score strip, room filter, photo avatars, modal submission form
- **Booking flow** — date picker, adults/children stepper, room selection, confirmation page

### Booking System
- Guests submit bookings via modal on homepage or room pages
- Booking saved immediately to database (appears in admin instantly)
- **Guest** receives a branded confirmation email (pending status)
- **Hotel staff** receives an alert email with full details and a direct admin link
- When admin **confirms** a booking, guest receives a second confirmation email
- Admin can Cancel, Confirm, or Resend email with one click

### Review System
- Guests submit reviews with star rating, sub-ratings (service, cleanliness), optional photo
- All reviews require **admin approval** before going public
- Admin sees a pending badge count in the sidebar navigation
- Approved reviews show on homepage (latest 3) and the full reviews page

### Admin Panel (Filament v3)
- **Rooms** — create/edit rooms with cover image, gallery upload (multiple, reorderable), features, pricing, bed type, tags
- **Bookings** — full table with filters, quick Confirm / Cancel / Resend actions, pending badge
- **Reviews** — one-click Approve / Reject, bulk approve, pending badge

---

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Framework | Laravel 12 |
| Admin Panel | Filament v3.3 |
| Database | MySQL / SQLite |
| Email | Laravel Mail (SMTP) |
| File Storage | Laravel Storage (public disk) |
| Frontend | Custom CSS (no Tailwind) — Fraunces + Inter Tight fonts |
| Icons | Heroicons (via Filament) |

---

## Installation

### Requirements
- PHP 8.2+
- Composer
- Node.js (optional, for asset building)
- MySQL or SQLite

### Steps

```bash
# 1. Clone the repository
git clone https://github.com/flavy-hash/winsome-hotel.git
cd winsome-hotel

# 2. Install PHP dependencies
composer install

# 3. Copy and configure environment
cp .env.example .env
php artisan key:generate

# 4. Configure your database in .env
#    DB_CONNECTION=mysql
#    DB_DATABASE=winsome_hotel
#    DB_USERNAME=root
#    DB_PASSWORD=

# 5. Run migrations
php artisan migrate

# 6. Link storage for uploaded files
php artisan storage:link

# 7. Start the development server
php artisan serve
```

### Mail Configuration

Set these in your `.env` to enable booking and review notification emails:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your@gmail.com
MAIL_FROM_NAME="Winsome Hotel"

# Email address that receives new booking alerts (defaults to MAIL_FROM_ADDRESS)
HOTEL_BOOKING_EMAIL=reservations@your-hotel.com
```

### Create Admin User

```bash
php artisan make:filament-user
```

Then visit `/admin` to log in.

---

## Directory Highlights

```
app/
  Filament/Resources/   — BookingResource, ReviewResource, RoomResource
  Http/Controllers/     — BookingController, ReviewController, RoomController
  Mail/                 — BookingConfirmationMail, BookingConfirmedMail,
                          NewBookingAlertMail
  Models/               — Booking, Review, Room
  Observers/            — BookingObserver (sends confirmed email on status change)

resources/views/
  welcome.blade.php     — Homepage
  rooms/
    index.blade.php     — All rooms listing
    show.blade.php      — Room detail + gallery + booking sidebar
  reviews/
    index.blade.php     — Reviews listing + write-a-review modal
  emails/booking/       — Guest confirmation, confirmed, hotel alert emails
  booking/
    confirmation.blade.php — Post-booking confirmation page

public/images/          — Place logo.png (or .svg/.jpg/.webp) here
                          Place about-1.jpg, about-2.jpg for About section
                          Place exp-1.jpg through exp-5.jpg for Experiences
```

---

## Logo & Images

Drop your files into `public/images/` and the site picks them up automatically:

| File | Used for |
|------|----------|
| `logo.png` (or `.svg`, `.jpg`, `.webp`) | Navigation logo |
| `about-1.jpg`, `about-2.jpg` | About section photos |
| `exp-1.jpg` – `exp-5.jpg` | Experiences section cards |

Room and review photos are managed through the admin panel and stored in `storage/app/public/`.

---

## License

MIT
