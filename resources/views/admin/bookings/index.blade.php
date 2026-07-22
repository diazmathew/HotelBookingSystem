@extends('layouts.admin')

@section('content')

<div
    x-data="bookingsTable(@js($bookings->map(fn($b) => [
        'id' => $b->id,
        'customer_name' => $b->customer_name,
        'room_type' => $b->roomType->room_name ?? 'N/A',
        'status' => $b->status,
        'removed' => false,
    ])))"
    class="card-luxury p-6 animate-fade-in"
>

    <div class="eyebrow mb-3">Administration</div>

    <div class="flex flex-wrap justify-between items-center gap-4 mb-6">

        <h1 class="heading-display text-3xl text-jade-900">
            Booking Management
        </h1>

        <input
            type="text"
            x-model="search"
            placeholder="Search by customer or room type..."
            class="input-luxury sm:w-72"
        >

    </div>

    <x-flash type="success" :message="session('success')" />
    <x-flash type="error" :message="session('error')" />

    {{-- AJAX toast --}}
    <div
        x-show="toast.show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        x-cloak
        :class="toast.type === 'error' ? 'bg-red-50 border-red-700 text-red-800' : 'bg-jade-50 border-jade-600 text-jade-800'"
        class="border-l-4 px-4 py-3 mb-5"
    >
        <span x-text="toast.message"></span>
    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full border border-jade-800/10">

            <thead class="bg-jade-950 text-ivory-100">

                <tr>

                    <th class="px-4 py-3 text-xs tracking-[0.15em] uppercase font-medium">ID</th>
                    <th class="px-4 py-3 text-xs tracking-[0.15em] uppercase font-medium">Customer</th>
                    <th class="px-4 py-3 text-xs tracking-[0.15em] uppercase font-medium">Room Type</th>
                    <th class="px-4 py-3 text-xs tracking-[0.15em] uppercase font-medium">Check-in</th>
                    <th class="px-4 py-3 text-xs tracking-[0.15em] uppercase font-medium">Check-out</th>
                    <th class="px-4 py-3 text-xs tracking-[0.15em] uppercase font-medium">Receipt</th>
                    <th class="px-4 py-3 text-xs tracking-[0.15em] uppercase font-medium">Status</th>
                    <th class="px-4 py-3 text-xs tracking-[0.15em] uppercase font-medium">Actions</th>

                </tr>

            </thead>

            <tbody>

            @forelse($bookings as $index => $booking)

                <tr
                    x-show="rowVisible({{ $index }})"
                    x-cloak
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="border-b border-jade-800/10 hover:bg-ivory-100 transition-colors"
                >

                    <td class="px-4 py-3 text-jade-700">
                        {{ $booking->id }}
                    </td>

                    <td class="px-4 py-3 text-jade-900 font-medium">
                        {{ $booking->customer_name }}
                    </td>

                    <td class="px-4 py-3 text-jade-700">
                        {{ $booking->roomType->room_name ?? 'N/A' }}
                    </td>

                    <td class="px-4 py-3 text-jade-700">
                        {{ $booking->check_in_date }}
                    </td>

                    <td class="px-4 py-3 text-jade-700">
                        {{ $booking->check_out_date }}
                    </td>

                    {{-- RECEIPT --}}

                    <td class="px-4 py-3">

                        @if($booking->payment_receipt)

                            <button
                                type="button"
                                onclick="openReceipt('{{ asset('storage/'.$booking->payment_receipt) }}')"
                                class="btn-press bg-jade-800 hover:bg-jade-700 text-white px-3 py-2 text-xs tracking-wide uppercase">

                                View Receipt

                            </button>

                        @else

                            <span class="bg-ivory-200 text-jade-700/60 px-3 py-2 text-xs tracking-wide uppercase">

                                No Receipt

                            </span>

                        @endif

                    </td>

                    {{-- STATUS --}}

                    <td class="px-4 py-3">

                        <span
                            x-show="rows[{{ $index }}].status==='Pending'"
                            class="bg-gold-100 text-gold-800 px-3 py-1 text-xs tracking-wide uppercase font-medium animate-pop"
                        >Pending</span>

                        <span
                            x-show="rows[{{ $index }}].status==='Confirmed'"
                            x-cloak
                            class="bg-jade-100 text-jade-800 px-3 py-1 text-xs tracking-wide uppercase font-medium animate-pop"
                        >Confirmed</span>

                        <span
                            x-show="rows[{{ $index }}].status==='Cancelled'"
                            x-cloak
                            class="bg-red-100 text-red-800 px-3 py-1 text-xs tracking-wide uppercase font-medium animate-pop"
                        >Cancelled</span>

                    </td>

                    {{-- ACTIONS --}}

                    <td class="px-4 py-3">

                        <div class="flex flex-wrap gap-2">

                            <button
                                type="button"
                                x-show="rows[{{ $index }}].status==='Pending'"
                                @click="approve({{ $booking->id }}, {{ $index }})"
                                class="btn-press bg-jade-700 hover:bg-jade-600 text-white px-3 py-2 text-xs tracking-wide uppercase"
                            >
                                Confirm
                            </button>

                            <button
                                type="button"
                                x-show="rows[{{ $index }}].status!=='Cancelled'"
                                x-cloak
                                @click="cancel({{ $booking->id }}, {{ $index }})"
                                class="btn-press bg-gold-600 hover:bg-gold-500 text-white px-3 py-2 text-xs tracking-wide uppercase"
                            >
                                Cancel
                            </button>

                            <button
                                type="button"
                                @click="destroy({{ $booking->id }}, {{ $index }})"
                                class="btn-press bg-red-800 hover:bg-red-700 text-white px-3 py-2 text-xs tracking-wide uppercase"
                            >
                                Delete
                            </button>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8" class="text-center py-8 text-jade-700/60">

                        No bookings found.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        <p
            x-show="visibleCount === 0"
            x-cloak
            class="text-center text-jade-700/60 py-8"
        >
            No bookings match your search.
        </p>

    </div>

</div>

<!-- Receipt Modal -->

<div
    id="receiptModal"
    class="fixed inset-0 bg-jade-950/80 hidden items-center justify-center z-50">

    <div class="bg-white shadow-luxury p-8 max-w-4xl w-11/12 relative animate-scale-in border-t-2 border-gold-500">

        <button
            onclick="closeReceipt()"
            class="btn-press absolute top-4 right-4 bg-jade-900 hover:bg-jade-800 text-white w-9 h-9">

            &#10005;

        </button>

        <h2 class="eyebrow mb-5">

            Payment Receipt

        </h2>

        <img
            id="receiptImage"
            class="w-full border border-jade-800/10 shadow-sm">

    </div>

</div>

<script>

function openReceipt(image){
    document.getElementById('receiptImage').src = image;
    document.getElementById('receiptModal').classList.remove('hidden');
    document.getElementById('receiptModal').classList.add('flex');
}

function closeReceipt(){
    document.getElementById('receiptModal').classList.remove('flex');
    document.getElementById('receiptModal').classList.add('hidden');
}

window.onclick = function(event){
    let modal=document.getElementById('receiptModal');
    if(event.target==modal){
        closeReceipt();
    }
}

function bookingsTable(initialRows) {
    return {
        rows: initialRows,
        search: '',
        toast: { show: false, message: '', type: 'success' },

        get visibleCount() {
            return this.rows.filter((r, i) => this.rowVisible(i)).length;
        },

        rowVisible(i) {
            const row = this.rows[i];
            if (row.removed) return false;
            if (!this.search) return true;
            const q = this.search.toLowerCase();
            return String(row.id).includes(q)
                || row.customer_name.toLowerCase().includes(q)
                || row.room_type.toLowerCase().includes(q);
        },

        showToast(message, type = 'success') {
            this.toast = { show: true, message, type };
            setTimeout(() => { this.toast.show = false; }, 3000);
        },

        async approve(id, i) {
            try {
                const res = await axios.patch(`/admin/bookings/${id}/approve`);
                this.rows[i].status = 'Confirmed';
                this.showToast(res.data.message || 'Booking confirmed.');
            } catch (e) {
                this.showToast('Could not confirm this booking.', 'error');
            }
        },

        async cancel(id, i) {
            try {
                const res = await axios.patch(`/admin/bookings/${id}/cancel`);
                this.rows[i].status = 'Cancelled';
                this.showToast(res.data.message || 'Booking cancelled.');
            } catch (e) {
                this.showToast('Could not cancel this booking.', 'error');
            }
        },

        async destroy(id, i) {
            if (!confirm('Delete this booking?')) return;

            try {
                const res = await axios.delete(`/admin/bookings/${id}`);
                this.rows[i].removed = true;
                this.showToast(res.data.message || 'Booking deleted.');
            } catch (e) {
                this.showToast('Could not delete this booking.', 'error');
            }
        },
    };
}

</script>

@endsection
