@extends('layouts.admin')

@section('content')

<div
    x-data="reportsTable(@js($bookings->map(fn($b) => [
        'customer_name' => $b->customer_name,
        'room_type' => $b->roomType->room_name ?? 'N/A',
        'check_in_date' => $b->check_in_date,
        'check_out_date' => $b->check_out_date,
        'status' => $b->status,
    ])))"
    class="animate-fade-in"
>

    <div class="eyebrow mb-3">Administration</div>

    <div class="flex flex-wrap justify-between items-center gap-4 mb-6">

        <h1 class="heading-display text-3xl text-jade-900">Booking Reports</h1>

        <input
            type="text"
            x-model="search"
            placeholder="Filter reports..."
            class="input-luxury sm:w-72"
        >

    </div>

    <div class="card-luxury overflow-hidden">

        <table class="table-auto w-full">
            <thead class="bg-jade-950 text-ivory-100">
                <tr>
                    <th class="p-3 text-xs tracking-[0.15em] uppercase font-medium">Customer</th>
                    <th class="p-3 text-xs tracking-[0.15em] uppercase font-medium">Room Type</th>
                    <th class="p-3 text-xs tracking-[0.15em] uppercase font-medium">Check-in</th>
                    <th class="p-3 text-xs tracking-[0.15em] uppercase font-medium">Check-out</th>
                    <th class="p-3 text-xs tracking-[0.15em] uppercase font-medium">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $index => $booking)
                    <tr
                        x-show="rowVisible({{ $index }})"
                        x-cloak
                        class="card-hover border-b border-jade-800/10"
                    >
                        <td class="p-3 text-jade-900 font-medium">{{ $booking->customer_name }}</td>
                        <td class="p-3 text-jade-700">{{ $booking->roomType->room_name ?? 'N/A' }}</td>
                        <td class="p-3 text-jade-700">{{ $booking->check_in_date }}</td>
                        <td class="p-3 text-jade-700">{{ $booking->check_out_date }}</td>
                        <td class="p-3 text-jade-700">{{ $booking->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-3 text-center text-jade-700/60">
                            No reports available.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    <p
        x-show="rows.length > 0 && visibleCount === 0"
        x-cloak
        class="text-center text-jade-700/60 py-8"
    >
        No records match your filter.
    </p>

</div>

<script>
function reportsTable(initialRows) {
    return {
        rows: initialRows,
        search: '',

        get visibleCount() {
            return this.rows.filter((r, i) => this.rowVisible(i)).length;
        },

        rowVisible(i) {
            const row = this.rows[i];
            if (!this.search) return true;
            const q = this.search.toLowerCase();
            return row.customer_name.toLowerCase().includes(q)
                || row.room_type.toLowerCase().includes(q)
                || row.status.toLowerCase().includes(q);
        },
    };
}
</script>

@endsection
