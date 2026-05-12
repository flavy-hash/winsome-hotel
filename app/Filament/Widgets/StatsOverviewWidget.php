<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Room;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalBookings     = Booking::count();
        $pendingBookings   = Booking::where('status', 'pending')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $totalRooms        = Room::count();
        $availableRooms    = Room::where('is_available', true)->count();

        $totalRevenue = Booking::whereIn('status', ['confirmed', 'completed'])
            ->sum('total_price');

        $monthRevenue = Booking::whereIn('status', ['confirmed', 'completed'])
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total_price');

        $lastMonthRevenue = Booking::whereIn('status', ['confirmed', 'completed'])
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->sum('total_price');

        $revenueChange = $lastMonthRevenue > 0
            ? round((($monthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100, 1)
            : null;

        // Last 7 days trend for total bookings
        $bookingsTrend = collect(range(6, 0))->map(
            fn ($d) => Booking::whereDate('created_at', Carbon::now()->subDays($d))->count()
        )->toArray();

        return [
            Stat::make('Total Bookings', $totalBookings)
                ->description('All time reservations')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->chart($bookingsTrend)
                ->color('primary'),

            Stat::make('Pending Review', $pendingBookings)
                ->description($pendingBookings === 1 ? '1 booking needs attention' : "{$pendingBookings} bookings need attention")
                ->descriptionIcon($pendingBookings > 0 ? 'heroicon-m-exclamation-circle' : 'heroicon-m-check-circle')
                ->color($pendingBookings > 0 ? 'warning' : 'success'),

            Stat::make('Confirmed', $confirmedBookings)
                ->description('Active reservations')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success'),

            Stat::make('Total Revenue', '$' . number_format($totalRevenue, 0))
                ->description(
                    $revenueChange !== null
                        ? abs($revenueChange) . '% ' . ($revenueChange >= 0 ? 'vs last month' : 'vs last month')
                        : 'Confirmed + completed stays'
                )
                ->descriptionIcon($revenueChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($revenueChange >= 0 ? 'success' : 'danger'),

            Stat::make('Rooms', "{$availableRooms} / {$totalRooms}")
                ->description('Available for booking')
                ->descriptionIcon('heroicon-m-building-office')
                ->color('info'),

            Stat::make('This Month', '$' . number_format($monthRevenue, 0))
                ->description(Carbon::now()->format('F Y') . ' revenue')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('primary'),
        ];
    }
}
