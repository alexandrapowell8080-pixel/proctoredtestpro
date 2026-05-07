<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Faq;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Preserved your exact original stats, while adding a 'scheduled' count for the doughnut chart
        $stats = [
            'total_faqs' => Faq::count(),
            'total_blogs' => Blog::count(),
            'published_blogs' => Blog::where('status', 'published')->count(),
            'draft_blogs' => Blog::where('status', 'draft')->count(),
            'scheduled_blogs' => Blog::where('status', 'new')->count(),
        ];

        // Fetch recent activity
        $recent_blogs = Blog::latest()->take(5)->get();
        $recent_faqs = Faq::latest()->take(5)->get();

        // Calculate data for the Line Chart (Blog creation over the last 6 months)
        // Calculated via PHP collections to guarantee it works without breaking across different SQL databases
        $sixMonthsAgo = now()->subMonths(5)->startOfMonth();
        $allRecentBlogs = Blog::where('created_at', '>=', $sixMonthsAgo)->get(['created_at']);
        
        $chartData = [
            'labels' => [], 
            'data' => []
        ];

        for ($i = 5; $i >= 0; $i--) {
            $monthStr = now()->subMonths($i)->format('M Y');
            $chartData['labels'][] = $monthStr;
            $chartData['data'][] = $allRecentBlogs->filter(function($blog) use ($monthStr) {
                return $blog->created_at->format('M Y') === $monthStr;
            })->count();
        }

        return view('admin.dashboard', compact('stats', 'recent_blogs', 'recent_faqs', 'chartData'));
    }
}