@extends('layouts.app')

@section('content')
<section>
    <div class="container" style="max-width:1200px">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;flex-wrap:wrap;gap:10px">
            <h2 style="margin:0">Submissions</h2>
            <div>
                <a href="{{ route('admin.index') }}">All</a> |
                <a href="?status=pending">Pending</a> |
                <a href="?status=approved">Approved</a> |
                <a href="?status=rejected">Rejected</a> |
                <a href="?status=posted">Posted</a>
                <form method="POST" action="{{ route('admin.logout') }}" style="display:inline">
                    @csrf <button class="btn btn-dark" style="padding:6px 14px;font-size:13px">Logout</button>
                </form>
            </div>
        </div>

        <div style="overflow-x:auto">
        <table>
            <tr>
                <th>Photo</th><th>Details</th><th>Story</th><th>Status</th><th>Action</th>
            </tr>
            @forelse ($items as $s)
            <tr>
                <td><a href="{{ asset($s->photo) }}" target="_blank"><img src="{{ asset($s->photo) }}" width="80"></a></td>
                <td>
                    <strong>{{ $s->full_name }}</strong><br>
                    {{ $s->profession }}{{ $s->organization ? ' @ '.$s->organization : '' }}<br>
                    {{ $s->city }}<br>
                    {{ $s->email }}<br>
                    <a href="https://wa.me/{{ preg_replace('/^0/', '92', preg_replace('/\D/', '', $s->phone)) }}" target="_blank">{{ $s->phone }}</a><br>
                    @if($s->proof_link)<a href="{{ $s->proof_link }}" target="_blank" rel="noopener">Proof link</a>@endif
                </td>
                <td style="max-width:320px">{{ $s->story }}</td>
                <td><span class="tag {{ $s->status }}">{{ strtoupper($s->status) }}</span><br><small>{{ $s->created_at->format('d M Y') }}</small></td>
                <td>
                    <form method="POST" action="{{ route('admin.status', $s) }}">
                        @csrf
                        <select name="status">
                            @foreach (['pending','approved','rejected','posted'] as $st)
                                <option value="{{ $st }}" @selected($s->status === $st)>{{ ucfirst($st) }}</option>
                            @endforeach
                        </select>
                        <input name="admin_note" value="{{ $s->admin_note }}" placeholder="Note" style="margin:6px 0">
                        <button class="btn" style="padding:6px 14px;font-size:13px">Save</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5">Koi submission nahi.</td></tr>
            @endforelse
        </table>
        </div>

        <div style="margin-top:16px">{{ $items->links() }}</div>
    </div>
</section>
@endsection