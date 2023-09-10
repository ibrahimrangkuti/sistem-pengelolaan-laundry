<?php

namespace App\Charts;

use App\Models\Transaction;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MonthlyIncomeChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $year = date('Y');
        $month = date('m');

        for ($i = 1; $i <= $month; $i++) {
            if (Auth::user()->role == 'admin') {
                $totalIncome = Transaction::whereYear('created_at', $year)->whereMonth('created_at', $i)->sum('total');
            } else {
                $totalIncome = Transaction::where('outlet_id', Auth::user()->outlet_id)->whereYear('created_at', $year)->whereMonth('created_at', $i)->sum('total');
            }
            $months[] = Carbon::create()->month($i)->format('F');
            $dataTotalIncome[] = $totalIncome;
        }

        return $this->chart->lineChart()
            ->addData('Total Pendapatan', $dataTotalIncome)
            ->setXAxis($months)
            ->setHeight(300);
    }
}
