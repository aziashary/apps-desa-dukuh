<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use app\Models\SKKM;
use app\Models\SKU;

class JenisSuratChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        return $this->chart->donutChart()
        ->addData([
        \App\Models\SKKM::count(),
        \App\Models\SKU::count()
    ])
    ->setColors(['#435ebe','#55c6e8'])
    ->setLabels(['SKKM', 'SKU']);
    }

}
