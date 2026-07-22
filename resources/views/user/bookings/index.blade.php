@extends('layouts.user')

@section('content')

<div x-data="myBookings(@js($bookings->map(fn($b) => [
        'id' => $b->id,
        'room_type' => $b->roomType->room_name ?? 'N/A',
        'check_in_date' => $b->check_in_date,
        'check_out_date' => $b->check_out_date,
        'status' => $b->status,
    ])))"
    class="animate-fade-in"
>

    <div class="flex flex-wrap justify-between items-center gap-4 mb-2">
        <div class="eyebrow">Guest Services</div>
    </div>

    <div class="flex flex-wrap justify-between items-center gap-4 mb-6">

        <h1 class="heading-display text-4xl text-jade-900">
            My Bookings
        </h1>

        <input
            type="text"
            x-model="search"
            placeholder="Search your bookings..."
            class="input-luxury sm:w-72"
        >

    </div>

    <x-flash type="success" :message="session('success')" />

    <div class="card-luxury overflow-hidden">

        <table class="w-full">

            <thead class="bg-jade-950 text-ivory-100">

                <tr>

                    <th class="p-4 text-left text-xs tracking-[0.15em] uppercase font-medium">Room Type</th>
                    <th class="p-4 text-left text-xs tracking-[0.15em] uppercase font-medium">Check-in</th>
                    <th class="p-4 text-left text-xs tracking-[0.15em] uppercase font-medium">Check-out</th>
                    <th class="p-4 text-left text-xs tracking-[0.15em] uppercase font-medium">Status</th>

                </tr>

            </thead>

            <tbody>

            @forelse($bookings as $index => $booking)

                <tr
                    x-show="rowVisible({{ $index }})"
                    x-cloak
                    class="border-b border-jade-800/10 hover:bg-ivory-100 transition-colors"
                >

                    <td class="p-4 text-jade-900 font-medium">
                        {{ $booking->roomType->room_name ?? 'N/A' }}
                    </td>

                    <td class="p-4 text-jade-700">
                        {{ $booking->check_in_date }}
                    </td>

                    <td class="p-4 text-jade-700">
                        {{ $booking->check_out_date }}
                    </td>

                    <td class="p-4">

                        @if($booking->status=='Pending')

                            <span class="inline-block bg-gold-100 text-gold-800 text-xs tracking-wide uppercase font-medium px-3 py-1 animate-pop">
                                Pending
                            </span>

                        @elseif($booking->status=='Confirmed')

                            <span class="inline-block bg-jade-100 text-jade-800 text-xs tracking-wide uppercase font-medium px-3 py-1 animate-pop">
                                Confirmed
                            </span>

                        @else

                            <span class="inline-block bg-red-100 text-red-800 text-xs tracking-wide uppercase font-medium px-3 py-1 animate-pop">
                                Cancelled
                            </span>

                        @endif

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="text-center p-8 text-jade-700/60">

                        No bookings found.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <p
            x-show="rows.length > 0 && visibleCount === 0"
            x-cloak
            class="text-center text-jade-700/60 py-8"
        >
            No bookings match your search.
        </p>

    </div>

</div>

<script>
function myBookings(initialRows) {
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
            return row.room_type.toLowerCase().includes(q)
                || row.status.toLowerCase().includes(q);
        },
    };
}
</script>

@endsection
