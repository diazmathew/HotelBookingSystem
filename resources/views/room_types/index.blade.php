@extends('layouts.admin')

@section('content')

<div
    x-data="roomTypesTable(@js($roomTypes->map(fn($r) => [
        'id' => $r->id,
        'room_name' => $r->room_name,
        'removed' => false,
    ])))"
    class="card-luxury p-6 animate-fade-in"
>

    <div class="eyebrow mb-3">Administration</div>

    <div class="flex flex-wrap justify-between items-center gap-4 mb-6">

        <h1 class="heading-display text-3xl text-jade-900">
            Room Types
        </h1>

        <div class="flex flex-wrap gap-3 items-center">

            <input
                type="text"
                x-model="search"
                placeholder="Search room types..."
                class="input-luxury sm:w-64"
            >

            <a
                href="{{ route('room_types.create') }}"
                class="btn-gold"
            >
                + Add Room Type
            </a>

        </div>

    </div>

    <x-flash type="success" :message="session('success')" />

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
                    <th class="px-4 py-3 text-left text-xs tracking-[0.15em] uppercase font-medium">ID</th>
                    <th class="px-4 py-3 text-left text-xs tracking-[0.15em] uppercase font-medium">Room Name</th>
                    <th class="px-4 py-3 text-left text-xs tracking-[0.15em] uppercase font-medium">Description</th>
                    <th class="px-4 py-3 text-left text-xs tracking-[0.15em] uppercase font-medium">Price</th>
                    <th class="px-4 py-3 text-left text-xs tracking-[0.15em] uppercase font-medium">Max Occupancy</th>
                    <th class="px-4 py-3 text-left text-xs tracking-[0.15em] uppercase font-medium" width="220">Action</th>
                </tr>
            </thead>

            <tbody>

            @forelse($roomTypes as $index => $roomType)

                <tr
                    x-show="rowVisible({{ $index }})"
                    x-cloak
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="border-b border-jade-800/10 hover:bg-ivory-100 transition-colors"
                >
                    <td class="px-4 py-3 text-jade-700">{{ $roomType->id }}</td>
                    <td class="px-4 py-3 text-jade-900 font-medium">{{ $roomType->room_name }}</td>
                    <td class="px-4 py-3 text-jade-700/70 font-light">{{ $roomType->description }}</td>
                    <td class="px-4 py-3 text-gold-700 font-medium">&#8369;{{ number_format($roomType->price,2) }}</td>
                    <td class="px-4 py-3 text-jade-700">{{ $roomType->max_occupancy }}</td>

                    <td class="px-4 py-3">

                        <div class="flex flex-wrap gap-2">

                            <a href="{{ route('room_types.show',$roomType) }}"
                               class="btn-press bg-jade-800 hover:bg-jade-700 text-white px-3 py-2 text-xs tracking-wide uppercase">
                                View
                            </a>

                            <a href="{{ route('room_types.edit',$roomType) }}"
                               class="btn-press bg-gold-600 hover:bg-gold-500 text-white px-3 py-2 text-xs tracking-wide uppercase">
                                Edit
                            </a>

                            <button
                                type="button"
                                @click="destroy({{ $roomType->id }}, {{ $index }})"
                                class="btn-press bg-red-800 hover:bg-red-700 text-white px-3 py-2 text-xs tracking-wide uppercase"
                            >
                                Delete
                            </button>

                        </div>

                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center py-8 text-jade-700/60">
                        No room types found.
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
            No room types match your search.
        </p>

    </div>

</div>

<script>
function roomTypesTable(initialRows) {
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
            return row.room_name.toLowerCase().includes(this.search.toLowerCase());
        },

        showToast(message, type = 'success') {
            this.toast = { show: true, message, type };
            setTimeout(() => { this.toast.show = false; }, 3000);
        },

        async destroy(id, i) {
            if (!confirm('Delete this room type?')) return;

            try {
                const res = await axios.delete(`/room-types/${id}`);
                this.rows[i].removed = true;
                this.showToast(res.data.message || 'Room type deleted.');
            } catch (e) {
                this.showToast('Could not delete this room type.', 'error');
            }
        },
    };
}
</script>

@endsection
