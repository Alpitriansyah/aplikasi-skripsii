<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ChartRuangan
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {

        return $this->chart->lineChart()
            ->addData('Admin', [40, 93, 35, 42, 18, 82])
            ->addData('Mahasiswa', [70, 29, 77, 28, 55, 45])
            ->addData('Dosen', [60, 16, 20, 70, 40, 55])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
