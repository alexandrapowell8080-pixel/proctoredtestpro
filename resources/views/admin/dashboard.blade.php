@extends('layouts.admin')

@section('seo_title', 'Admin Dashboard')

@section('content')
<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="max-w-7xl mx-auto space-y-6 lg:space-y-8 pb-10">
    <header
        class="flex flex-col sm:flex-row sm:items-end justify-between border-b border-[hsl(var(--border))] pb-5 gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Dashboard Overview</h1>
            <p class="text-sm text-[hsl(var(--muted-foreground))] mt-1">Welcome back! Here's what is happening with your
                platforms.</p>
        </div>
    </header>

    <!-- Top Stats Overview -->
    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <!-- FAQ Stats -->
        <div
            class="bg-[hsl(var(--card))] p-4 sm:p-6 rounded-2xl border border-[hsl(var(--border))] shadow-sm flex flex-col justify-center">
            <h3
                class="text-[10px] sm:text-xs font-bold text-[hsl(var(--muted-foreground))] uppercase mb-1 sm:mb-2 tracking-wider">
                Total FAQs</h3>
            <p class="text-2xl sm:text-4xl font-extrabold text-[hsl(var(--primary))]">{{ $stats['total_faqs'] }}</p>
        </div>

        <!-- Blog Stats -->
        <div
            class="bg-[hsl(var(--card))] p-4 sm:p-6 rounded-2xl border border-[hsl(var(--border))] shadow-sm flex flex-col justify-center">
            <h3
                class="text-[10px] sm:text-xs font-bold text-[hsl(var(--muted-foreground))] uppercase mb-1 sm:mb-2 tracking-wider">
                Total Blogs</h3>
            <p class="text-2xl sm:text-4xl font-extrabold text-[hsl(var(--primary))]">{{ $stats['total_blogs'] }}</p>
        </div>

        <!-- Published Blogs -->
        <div
            class="bg-[hsl(var(--card))] p-4 sm:p-6 rounded-2xl border border-[hsl(var(--border))] shadow-sm flex flex-col justify-center">
            <h3
                class="text-[10px] sm:text-xs font-bold text-[hsl(var(--muted-foreground))] uppercase mb-1 sm:mb-2 tracking-wider">
                Published Blogs</h3>
            <p class="text-2xl sm:text-4xl font-extrabold text-green-600">{{ $stats['published_blogs'] }}</p>
        </div>

        <!-- Draft Blogs -->
        <div
            class="bg-[hsl(var(--card))] p-4 sm:p-6 rounded-2xl border border-[hsl(var(--border))] shadow-sm flex flex-col justify-center">
            <h3
                class="text-[10px] sm:text-xs font-bold text-[hsl(var(--muted-foreground))] uppercase mb-1 sm:mb-2 tracking-wider">
                Draft Blogs</h3>
            <p class="text-2xl sm:text-4xl font-extrabold text-orange-500">{{ $stats['draft_blogs'] }}</p>
        </div>
    </div>

    <!-- Interactive Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Line Chart: Content Growth -->
        <div class="bg-white p-4 sm:p-6 rounded-2xl border border-gray-200 shadow-sm lg:col-span-2">
            <h3 class="text-xs sm:text-sm font-bold text-gray-900 mb-4 uppercase tracking-wider">Blog Publication Trends
                (Last 6 Months)</h3>
            <div class="relative h-60 sm:h-72 w-full">
                <canvas id="growthChart"></canvas>
            </div>
        </div>

        <!-- Doughnut Chart: Status Distribution -->
        <div class="bg-white p-4 sm:p-6 rounded-2xl border border-gray-200 shadow-sm lg:col-span-1 flex flex-col">
            <h3 class="text-xs sm:text-sm font-bold text-gray-900 mb-4 uppercase tracking-wider">Blog Status Split</h3>
            <div class="relative flex-1 min-h-[200px] w-full flex items-center justify-center">
                <canvas id="statusChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Blogs Table -->
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden flex flex-col">
            <div class="bg-gray-50 px-5 py-4 border-b border-gray-200">
                <h3 class="text-xs sm:text-sm font-bold text-gray-900 uppercase tracking-wider">Recently Added Blogs
                </h3>
            </div>
            <div class="flex-1 overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[300px] sm:min-w-[400px]">
                    <tbody class="divide-y divide-gray-100">
                        @forelse($recent_blogs as $blog)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td
                                class="px-4 sm:px-5 py-3 text-xs sm:text-sm font-medium text-gray-900 truncate max-w-[150px] sm:max-w-[200px]">
                                {{ $blog->title }}</td>
                            <td class="px-4 sm:px-5 py-3 text-right">
                                @if ($blog->status == 'published')
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded text-[9px] sm:text-[10px] font-bold bg-green-100 text-green-800 uppercase tracking-wide">Published</span>
                                @elseif ($blog->status == 'scheduled')
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded text-[9px] sm:text-[10px] font-bold bg-blue-100 text-blue-800 uppercase tracking-wide">Scheduled</span>
                                @else
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded text-[9px] sm:text-[10px] font-bold bg-orange-100 text-orange-800 uppercase tracking-wide">Draft</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="px-5 py-8 text-center text-sm text-gray-500">No blogs found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="bg-gray-50 px-5 py-3 border-t border-gray-200 text-right">
                <a href="{{ route('admin.blog.index') }}"
                    class="text-xs font-bold text-blue-600 hover:text-blue-800 transition-colors">View All Blogs
                    &rarr;</a>
            </div>
        </div>

        <!-- Recent FAQs Table -->
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden flex flex-col">
            <div class="bg-gray-50 px-5 py-4 border-b border-gray-200">
                <h3 class="text-xs sm:text-sm font-bold text-gray-900 uppercase tracking-wider">Recently Added FAQs</h3>
            </div>
            <div class="flex-1 overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[300px] sm:min-w-[400px]">
                    <tbody class="divide-y divide-gray-100">
                        @forelse($recent_faqs as $faq)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td
                                class="px-4 sm:px-5 py-3 text-xs sm:text-sm font-medium text-gray-900 truncate max-w-[150px] sm:max-w-[200px]">
                                {{ $faq->keyword }}</td>
                            <td class="px-4 sm:px-5 py-3 text-right">
                                @if($faq->content)
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded text-[9px] sm:text-[10px] font-bold bg-emerald-100 text-emerald-800 uppercase tracking-wide">Live</span>
                                @else
                                <span
                                    class="inline-flex items-center px-2 py-0.5 rounded text-[9px] sm:text-[10px] font-bold bg-cyan-100 text-cyan-800 uppercase tracking-wide">Pending</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="px-5 py-8 text-center text-sm text-gray-500">No FAQs found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="bg-gray-50 px-5 py-3 border-t border-gray-200 text-right">
                <a href="{{ route('admin.faqs.index') }}"
                    class="text-xs font-bold text-blue-600 hover:text-blue-800 transition-colors">View All FAQs
                    &rarr;</a>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Initialization Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Global Chart Defaults
        Chart.defaults.font.family = "'Inter', 'Space Grotesk', system-ui, sans-serif";
        Chart.defaults.color = '#64748b';
        
        // 1. Line Chart (Blog Trends over 6 months)
        const growthCtx = document.getElementById('growthChart').getContext('2d');
        const growthGradient = growthCtx.createLinearGradient(0, 0, 0, 400);
        growthGradient.addColorStop(0, 'rgba(37, 99, 235, 0.2)'); // Light Blue fade
        growthGradient.addColorStop(1, 'rgba(37, 99, 235, 0)');

        new Chart(growthCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($chartData['labels']) !!},
                datasets: [{
                    label: 'New Blogs',
                    data: {!! json_encode($chartData['data']) !!},
                    borderColor: '#2563eb',
                    backgroundColor: growthGradient,
                    borderWidth: 3,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#2563eb',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: true,
                    tension: 0.3 // Smooth curves
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#1e293b',
                        padding: 12,
                        titleFont: { size: 13, weight: 'bold' },
                        bodyFont: { size: 13 },
                        displayColors: false,
                        callbacks: {
                            label: function(context) { return context.parsed.y + ' new blogs'; }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { precision: 0, stepSize: 1 },
                        grid: { borderDash: [4, 4], color: '#e2e8f0' },
                        border: { display: false }
                    },
                    x: {
                        grid: { display: false },
                        border: { display: false }
                    }
                }
            }
        });

        // 2. Doughnut Chart (Blog Status Ratio)
        const statusCtx = document.getElementById('statusChart').getContext('2d');
        new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: ['Published', 'Drafts', 'Scheduled'],
                datasets: [{
                    data: [
                        {{ $stats['published_blogs'] }}, 
                        {{ $stats['draft_blogs'] }}, 
                        {{ $stats['scheduled_blogs'] }}
                    ],
                    backgroundColor: ['#16a34a', '#f97316', '#3b82f6'],
                    borderWidth: 0,
                    hoverOffset: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '75%',
                layout: { padding: 10 },
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { 
                            padding: 20, 
                            usePointStyle: true, 
                            pointStyle: 'circle',
                            font: { size: 11, weight: '600' }
                        }
                    },
                    tooltip: {
                        backgroundColor: '#1e293b',
                        padding: 12,
                        bodyFont: { size: 13, weight: 'bold' }
                    }
                }
            }
        });
    });
</script>
@endsection