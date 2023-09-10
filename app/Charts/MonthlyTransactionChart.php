<?php

namespace App\Charts;

use App\Models\Transaction;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MonthlyTransactionChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $year = date('Y');
        $month = date('m');

        for ($i = 1; $i <= $month; $i++) {
            if (Auth::user()->role == 'admin') {
                $totalTransaction = Transaction::whereYear('created_at', $year)->whereMonth('created_at', $i)->count();
            } else {
                $totalTransaction = Transaction::where('outlet_id', Auth::user()->outlet_id)->whereYear('created_at', $year)->whereMonth('created_at', $i)->count();
            }
            $months[] = Carbon::create()->month($i)->format('F');
            $dataTotalTransaction[] = $totalTransaction;
        }

        return $this->chart->barChart()
            ->addData('Total Transaksi', $dataTotalTransaction)
            ->setXAxis($months)
            ->setHeight(300);
    }
}
