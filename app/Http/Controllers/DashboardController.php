<?php

namespace App\Http\Controllers;

use App\Models\Detainee;
use App\Models\User;
use App\Models\Cases;
use App\Models\Counsel_Case_Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function overview()
    {
        $detaineeCount = Detainee::count();
        $userCount = User::count();
        $caseCount = Cases::count();
        $withAttorneysCount = Counsel_Case_Assignment::whereNotNull('assigned_lawyer')->count();
        $withoutAttorneysCount = $caseCount - $withAttorneysCount;

        // Log the values
        Log::info('Detainee Count: ' . $detaineeCount);
        Log::info('User Count: ' . $userCount);
        Log::info('Case Count: ' . $caseCount);
        Log::info('With Attorneys Count: ' . $withAttorneysCount);
        Log::info('Without Attorneys Count: ' . $withoutAttorneysCount);

        return view('overview', compact('detaineeCount', 'userCount', 'caseCount', 'withAttorneysCount', 'withoutAttorneysCount'));
    }
}
