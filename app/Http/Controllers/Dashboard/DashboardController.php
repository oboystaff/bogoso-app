<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
    }

    public function dashboardData()
    {
        $users_today = User::query()
            ->whereDate('created_at', Carbon::today())
            ->get();

        $users_this_week = User::query()
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->get();

        $users_this_month = User::query()
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();

        $applicants_today = Application::query()
            ->whereDate('created_at', Carbon::today())
            ->get();

        $applicants_this_week = Application::query()
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->get();

        $applicants_this_month = Application::query()
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();

        $data = [
            'user_today' => $users_today->count(),
            'user_weekly' => $users_this_week->count(),
            'user_monthly' => $users_this_month->count(),
            'applicant_today' => $applicants_today->count(),
            'applicant_weekly' => $applicants_this_week->count(),
            'applicant_monthly' => $applicants_this_month->count()
        ];

        return response()->json([
            'message' => 'Dashboard data',
            'data' => $data,
        ]);
    }
}
