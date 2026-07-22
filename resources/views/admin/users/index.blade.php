@extends('layouts.admin')

@section('content')

<div class="eyebrow mb-3">Administration</div>

<h1 class="heading-display text-3xl text-jade-900 mb-6">
    User Management
</h1>

@if(session('success'))
<div class="bg-jade-50 border-l-4 border-jade-600 text-jade-800 p-3 mb-4">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-50 border-l-4 border-red-700 text-red-800 p-3 mb-4">
    {{ session('error') }}
</div>
@endif

<div class="card-luxury overflow-hidden">

<table class="w-full">

<thead class="bg-jade-950 text-ivory-100">

<tr>

<th class="p-3 text-xs tracking-[0.15em] uppercase font-medium">ID</th>
<th class="p-3 text-xs tracking-[0.15em] uppercase font-medium">Name</th>
<th class="p-3 text-xs tracking-[0.15em] uppercase font-medium">Email</th>
<th class="p-3 text-xs tracking-[0.15em] uppercase font-medium">Role</th>
<th class="p-3 text-xs tracking-[0.15em] uppercase font-medium">Action</th>

</tr>

</thead>

<tbody>

@foreach($users as $user)

<tr class="border-b border-jade-800/10 hover:bg-ivory-100 transition-colors">

<td class="p-3 text-jade-700">{{ $user->id }}</td>

<td class="p-3 text-jade-900 font-medium">{{ $user->name }}</td>

<td class="p-3 text-jade-700">{{ $user->email }}</td>

<td class="p-3">

@if($user->role=="admin")

<span class="bg-jade-900 text-gold-300 px-3 py-1 text-xs tracking-wide uppercase">
Admin
</span>

@else

<span class="bg-gold-100 text-gold-800 px-3 py-1 text-xs tracking-wide uppercase">
Guest
</span>

@endif

</td>

<td class="p-3">

@if($user->role!="admin")

<form action="{{ route('admin.users.destroy',$user) }}" method="POST">

@csrf
@method('DELETE')

<button
onclick="return confirm('Delete user?')"
class="bg-red-800 hover:bg-red-700 text-white px-3 py-2 text-xs tracking-wide uppercase transition-colors">

Delete

</button>

</form>

@endif

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

@endsection
