@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page_title', 'Dashboard Overview')

@section('content')

    <!-- Metrics Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        
        <div class="rounded-3xl bg-white p-6 shadow-soft border border-border">
            <span class="text-xs font-semibold text-muted-foreground uppercase tracking-wider">Total Inquiries</span>
            <div class="text-3xl font-extrabold text-foreground mt-2">{{ $stats['inquiries'] }}</div>
            <div class="mt-2 text-xs text-emerald-600 font-semibold flex items-center gap-1">
                <span>{{ $stats['new_inquiries'] }} pending reply</span>
            </div>
        </div>

        <div class="rounded-3xl bg-white p-6 shadow-soft border border-border">
            <span class="text-xs font-semibold text-muted-foreground uppercase tracking-wider">Tour Packages</span>
            <div class="text-3xl font-extrabold text-foreground mt-2">{{ $stats['packages'] }}</div>
            <div class="mt-2 text-xs text-muted-foreground">Active in catalog</div>
        </div>

        <div class="rounded-3xl bg-white p-6 shadow-soft border border-border">
            <span class="text-xs font-semibold text-muted-foreground uppercase tracking-wider">Categories</span>
            <div class="text-3xl font-extrabold text-foreground mt-2">{{ $stats['categories'] }}</div>
            <div class="mt-2 text-xs text-muted-foreground">Destinations covered</div>
        </div>

        <div class="rounded-3xl bg-white p-6 shadow-soft border border-border">
            <span class="text-xs font-semibold text-muted-foreground uppercase tracking-wider">Testimonials</span>
            <div class="text-3xl font-extrabold text-foreground mt-2">{{ $stats['testimonials'] }}</div>
            <div class="mt-2 text-xs text-muted-foreground">Customer reviews</div>
        </div>

    </div>

    <!-- Quick Action Shortcuts -->
    <div class="flex flex-wrap items-center gap-3 mb-8">
        <a href="{{ route('admin.packages.create') }}" class="inline-flex items-center gap-2 rounded-full bg-primary px-5 py-2.5 text-xs font-semibold text-white shadow-soft hover:bg-primary-light transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Add New Tour Package</span>
        </a>

        <a href="{{ route('admin.inquiries') }}" class="inline-flex items-center gap-2 rounded-full bg-white border border-border px-5 py-2.5 text-xs font-semibold text-foreground hover:border-primary transition-all">
            <span>View All Inquiries</span>
        </a>

        <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center gap-2 rounded-full bg-white border border-border px-5 py-2.5 text-xs font-semibold text-foreground hover:border-primary transition-all">
            <span>Manage Categories</span>
        </a>
    </div>

    <!-- Recent Inquiries Table -->
    <div class="rounded-3xl bg-white p-6 shadow-soft border border-border">
        <div class="flex items-center justify-between pb-4 mb-4 border-b border-border">
            <h3 class="text-base font-bold text-foreground">Recent Customer Inquiries</h3>
            <a href="{{ route('admin.inquiries') }}" class="text-xs font-semibold text-primary hover:underline">View All</a>
        </div>

        @if($recentInquiries->isEmpty())
            <p class="text-xs text-muted-foreground py-8 text-center">No inquiries received yet. Submissions from the website will appear here in real-time.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="text-muted-foreground border-b border-border">
                            <th class="pb-3 font-semibold">Customer</th>
                            <th class="pb-3 font-semibold">Contact</th>
                            <th class="pb-3 font-semibold">Type</th>
                            <th class="pb-3 font-semibold">Destination / Package</th>
                            <th class="pb-3 font-semibold">Date</th>
                            <th class="pb-3 font-semibold">Status</th>
                            <th class="pb-3 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        @foreach($recentInquiries as $inq)
                            <tr>
                                <td class="py-3 font-semibold text-foreground">{{ $inq->full_name }}</td>
                                <td class="py-3">
                                    <a href="tel:{{ $inq->contact_number }}" class="text-primary hover:underline font-medium">{{ $inq->contact_number }}</a>
                                    @if($inq->email)
                                        <span class="block text-[11px] text-muted-foreground">{{ $inq->email }}</span>
                                    @endif
                                </td>
                                <td class="py-3">
                                    <span class="capitalize px-2.5 py-1 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-800">
                                        {{ str_replace('_', ' ', $inq->type) }}
                                    </span>
                                </td>
                                <td class="py-3 text-muted-foreground">
                                    {{ $inq->package_name ?? $inq->destination ?? 'General' }}
                                </td>
                                <td class="py-3 text-muted-foreground whitespace-nowrap">
                                    {{ $inq->created_at->format('M d, Y h:i A') }}
                                </td>
                                <td class="py-3">
                                    <form method="POST" action="{{ route('admin.inquiries.status', $inq->id) }}" class="inline">
                                        @csrf
                                        <select name="status" onchange="this.form.submit()" class="text-[11px] rounded-lg border border-border px-2 py-1 bg-white font-medium focus:outline-none">
                                            <option value="new" {{ $inq->status === 'new' ? 'selected' : '' }}>New</option>
                                            <option value="contacted" {{ $inq->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                            <option value="completed" {{ $inq->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="py-3 text-right">
                                    <a href="https://wa.me/91{{ preg_replace('/[^0-9]/', '', $inq->contact_number) }}" target="_blank" class="inline-flex items-center justify-center h-7 w-7 rounded-lg bg-emerald-50 text-emerald-700 hover:bg-emerald-100" title="WhatsApp Customer">
                                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12.031 2C6.495 2 2 6.495 2 12.031c0 1.968.568 3.805 1.554 5.358L2 22l4.773-1.523A9.974 9.974 0 0012.031 22C17.568 22 22 17.505 22 12.031 22 6.495 17.568 2 12.031 2zm5.79 14.394c-.24.673-1.397 1.285-1.928 1.365-.497.075-1.144.108-3.411-.83-2.902-1.201-4.757-4.148-4.901-4.341-.143-.193-1.168-1.553-1.168-2.96 0-1.408.736-2.099.997-2.387.261-.287.57-.359.761-.359.19 0 .381.002.548.01.177.009.414-.067.648.495.24.575.814 1.986.885 2.13.072.143.12.311.024.498-.096.186-.144.3-.287.467-.144.167-.302.373-.432.5-.144.144-.294.3-.127.587.167.287.742 1.226 1.593 1.984 1.096.976 2.02 1.278 2.308 1.422.287.144.455.12.623-.072.167-.193.717-.837.909-1.125.19-.287.382-.24.644-.144.263.096 1.666.786 1.953.93.287.144.478.215.548.334.072.12.072.694-.168 1.367z"/></svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

@endsection
