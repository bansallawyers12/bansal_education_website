<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Models\InboundEmail;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $recentEmails = InboundEmail::latest('received_at')
            ->take(5)
            ->get();

        $stats = [
            'total_emails' => InboundEmail::count(),
            'pending'      => InboundEmail::where('status', InboundEmail::STATUS_PENDING)->count(),
            'processed'    => InboundEmail::where('status', InboundEmail::STATUS_PROCESSED)->count(),
        ];

        return view('email.dashboard', [
            'recentEmails' => $recentEmails,
            'stats'        => $stats,
        ]);
    }
}
