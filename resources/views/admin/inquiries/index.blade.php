@extends('layouts.admin')

@section('title', 'Manage Inquiries')
@section('page_title', 'Customer Inquiries & Bookings')

@section('content')

    <!-- Filters Bar -->
    <div class="rounded-3xl bg-white p-6 shadow-soft border border-border mb-6">
        <div class="flex flex-wrap items-center justify-between gap-4">
            
            <!-- Type Filters -->
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('admin.inquiries') }}" class="rounded-full px-4 py-1.5 text-xs font-semibold {{ empty($type) ? 'bg-primary text-white' : 'bg-muted text-foreground/70 hover:bg-border' }}">
                    All Types
                </a>
                <a href="{{ route('admin.inquiries', ['type' => 'booking']) }}" class="rounded-full px-4 py-1.5 text-xs font-semibold {{ $type === 'booking' ? 'bg-primary text-white' : 'bg-muted text-foreground/70 hover:bg-border' }}">
                    Bookings
                </a>
                <a href="{{ route('admin.inquiries', ['type' => 'quick_inquiry']) }}" class="rounded-full px-4 py-1.5 text-xs font-semibold {{ $type === 'quick_inquiry' ? 'bg-primary text-white' : 'bg-muted text-foreground/70 hover:bg-border' }}">
                    Quick Inquiries
                </a>
                <a href="{{ route('admin.inquiries', ['type' => 'contact']) }}" class="rounded-full px-4 py-1.5 text-xs font-semibold {{ $type === 'contact' ? 'bg-primary text-white' : 'bg-muted text-foreground/70 hover:bg-border' }}">
                    Contact Messages
                </a>
            </div>

            <!-- Status Filters -->
            <div class="flex items-center gap-2 text-xs">
                <span class="text-muted-foreground font-medium">Status:</span>
                <a href="{{ route('admin.inquiries', ['type' => $type, 'status' => 'new']) }}" class="px-2.5 py-1 rounded-lg border {{ $status === 'new' ? 'bg-emerald-50 border-emerald-300 text-primary font-bold' : 'border-border text-foreground/70' }}">
                    New
                </a>
                <a href="{{ route('admin.inquiries', ['type' => $type, 'status' => 'contacted']) }}" class="px-2.5 py-1 rounded-lg border {{ $status === 'contacted' ? 'bg-emerald-50 border-emerald-300 text-primary font-bold' : 'border-border text-foreground/70' }}">
                    Contacted
                </a>
                <a href="{{ route('admin.inquiries', ['type' => $type, 'status' => 'completed']) }}" class="px-2.5 py-1 rounded-lg border {{ $status === 'completed' ? 'bg-emerald-50 border-emerald-300 text-primary font-bold' : 'border-border text-foreground/70' }}">
                    Completed
                </a>
            </div>
        </div>
    </div>

    <!-- Inquiries List -->
    <div class="rounded-3xl bg-white p-6 shadow-soft border border-border">
        @if($inquiries->isEmpty())
            <div class="py-12 text-center text-muted-foreground text-sm">
                No inquiries match your selected filter.
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="text-muted-foreground border-b border-border">
                            <th class="pb-3 font-semibold">Customer</th>
                            <th class="pb-3 font-semibold">Contact</th>
                            <th class="pb-3 font-semibold">Type</th>
                            <th class="pb-3 font-semibold">Destination / Route</th>
                            <th class="pb-3 font-semibold">Travelers</th>
                            <th class="pb-3 font-semibold">Notes / Message</th>
                            <th class="pb-3 font-semibold">Date</th>
                            <th class="pb-3 font-semibold">Status</th>
                            <th class="pb-3 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        @foreach($inquiries as $inq)
                            <tr>
                                <td class="py-3.5 font-bold text-foreground">
                                    {{ $inq->full_name }}
                                </td>
                                <td class="py-3.5">
                                    <div class="font-medium text-primary">{{ $inq->contact_number }}</div>
                                    @if($inq->email)
                                        <div class="text-[11px] text-muted-foreground">{{ $inq->email }}</div>
                                    @endif
                                </td>
                                <td class="py-3.5">
                                    <span class="capitalize px-2.5 py-1 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-800">
                                        {{ str_replace('_', ' ', $inq->type) }}
                                    </span>
                                </td>
                                <td class="py-3.5">
                                    <div class="font-medium text-foreground">{{ $inq->package_name ?? $inq->destination ?? 'N/A' }}</div>
                                    @if($inq->from_location)
                                        <div class="text-[11px] text-muted-foreground">From: {{ $inq->from_location }}</div>
                                    @endif
                                </td>
                                <td class="py-3.5 text-foreground font-medium">
                                    {{ $inq->members ?? 1 }}
                                </td>
                                <td class="py-3.5 max-w-xs text-muted-foreground">
                                    {{ $inq->message ?? '—' }}
                                </td>
                                <td class="py-3.5 text-muted-foreground whitespace-nowrap">
                                    {{ $inq->created_at->format('M d, Y') }}
                                </td>
                                <td class="py-3.5">
                                    <form method="POST" action="{{ route('admin.inquiries.status', $inq->id) }}">
                                        @csrf
                                        <select name="status" onchange="this.form.submit()" class="text-[11px] rounded-lg border border-border px-2 py-1 bg-white font-medium focus:outline-none">
                                            <option value="new" {{ $inq->status === 'new' ? 'selected' : '' }}>New</option>
                                            <option value="contacted" {{ $inq->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                            <option value="completed" {{ $inq->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="py-3.5 text-right whitespace-nowrap space-x-1">
                                    <a href="https://wa.me/91{{ preg_replace('/[^0-9]/', '', $inq->contact_number) }}" target="_blank" class="inline-flex items-center justify-center h-7 w-7 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100" title="WhatsApp Customer">
                                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12.031 2C6.495 2 2 6.495 2 12.031c0 1.968.568 3.805 1.554 5.358L2 22l4.773-1.523A9.974 9.974 0 0012.031 22C17.568 22 22 17.505 22 12.031 22 6.495 17.568 2 12.031 2zm5.79 14.394c-.24.673-1.397 1.285-1.928 1.365-.497.075-1.144.108-3.411-.83-2.902-1.201-4.757-4.148-4.901-4.341-.143-.193-1.168-1.553-1.168-2.96 0-1.408.736-2.099.997-2.387.261-.287.57-.359.761-.359.19 0 .381.002.548.01.177.009.414-.067.648.495.24.575.814 1.986.885 2.13.072.143.12.311.024.498-.096.186-.144.3-.287.467-.144.167-.302.373-.432.5-.144.144-.294.3-.127.587.167.287.742 1.226 1.593 1.984 1.096.976 2.02 1.278 2.308 1.422.287.144.455.12.623-.072.167-.193.717-.837.909-1.125.19-.287.382-.24.644-.144.263.096 1.666.786 1.953.93.287.144.478.215.548.334.072.12.072.694-.168 1.367z"/></svg>
                                    </a>

                                    <form method="POST" action="{{ route('admin.inquiries.delete', $inq->id) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this inquiry?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center h-7 w-7 rounded-lg bg-red-50 text-red-600 hover:bg-red-100" title="Delete">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $inquiries->links() }}
            </div>
        @endif
    </div>

@endsection
