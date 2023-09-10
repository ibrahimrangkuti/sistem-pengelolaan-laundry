<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function generateReport()
    {
        if (Auth::user()->role == 'admin') {
            $transactions = Transaction::latest()->get();
        } else {
            $transactions = Transaction::where('outlet_id', Auth::user()->outlet_id)->latest()->get();
        }

        $fileName = 'invoice-' . date('d/m/Y') . '.pdf';

        $pdf = Pdf::loadView('pdf.invoice', compact('transactions'));
        return $pdf->download($fileName);
    }
}
