<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class BookingsChartWidget extends ChartWidget
{
    protected static ?int $sort = 3;

    protected static ?string $heading = 'Bookings & Revenue — Last 6 Months';

    protected static ?string $maxHeight = '280px';

    public ?string $filter = 'bookings';

    protected function getFilters(): ?array
    {
        return [
            'bookings' => 'Bookings count',
            'revenue'  => 'Revenue (USD)',
        ];
    }

    protected function getData(): array
    {
        $months = collect(range(5, 0))->map(fn ($m) => Carbon::now()->subMonths($m));

        $labels = $months->map(fn ($m) => $m->format('M Y'))->toArray();

        if ($this->filter === 'revenue') {
            $data = $months->map(fn ($m) =>
                (float) Booking::whereIn('status', ['confirmed', 'completed'])
                    ->whereYear('created_at', $m->year)
                    ->whereMonth('created_at', $m->month)
                    ->sum('total_price')
            )->toArray();

            return [
                'datasets' => [
                    [
                        'label'           => 'Revenue (USD)',
                        'data'            => $data,
                        'backgroundColor' => 'rgba(44, 111, 181, 0.15)',
                        'borderColor'     => '#2C6FB5',
                        'borderWidth'     => 2,
                        'fill'            => true,
                        'tension'         => 0.4,
                    ],
                ],
                'labels' => $labels,
            ];
        }

        $total     = $months->map(fn ($m) => Booking::whereYear('created_at', $m->year)->whereMonth('created_at', $m->month)->count())->toArray();
        $confirmed = $months->map(fn ($m) => Booking::where('status', 'confirmed')->whereYear('created_at', $m->year)->whereMonth('created_at', $m->month)->count())->toArray();
        $pending   = $months->map(fn ($m) => Booking::where('status', 'pending')->whereYear('created_at', $m->year)->whereMonth('created_at', $m->month)->count())->toArray();

        return [
            'datasets' => [
                [
                    'label'           => 'Total',
                    'data'            => $total,
                    'backgroundColor' => 'rgba(242, 107, 31, 0.7)',
                    'borderRadius'    => 6,
                ],
                [
                    'label'           => 'Confirmed',
                    'data'            => $confirmed,
                    'backgroundColor' => 'rgba(34, 197, 94, 0.7)',
                    'borderRadius'    => 6,
                ],
                [
                    'label'           => 'Pending',
                    'data'            => $pending,
                    'backgroundColor' => 'rgba(234, 179, 8, 0.7)',
                    'borderRadius'    => 6,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return $this->filter === 'revenue' ? 'line' : 'bar';
    }
}
