<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyIncomeChart;
use App\Charts\MonthlyTransactionChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(MonthlyTransactionChart $monthlyTransactionChart, MonthlyIncomeChart $monthlyIncomeChart)
    {
        $totalOutlet = \App\Models\Outlet::count();
        $totalCustomer = \App\Models\Customer::count();
        if (Auth::user()->role == 'admin') {
            $totalTransaction = \App\Models\Transaction::count();
            $totalPackage = \App\Models\Package::count();
        } else {
            $totalTransaction = \App\Models\Transaction::where('outlet_id', Auth::user()->outlet_id)->count();
            $totalPackage = \App\Models\Package::where('outlet_id', Auth::user()->outlet_id)->count();
        }

        return view('pages.dashboard', [
            'monthlyTransaction' => $monthlyTransactionChart->build(),
            'monthlyIncome' => $monthlyIncomeChart->build()
        ], compact('totalOutlet', 'totalCustomer', 'totalTransaction', 'totalPackage'));;
    }
}
