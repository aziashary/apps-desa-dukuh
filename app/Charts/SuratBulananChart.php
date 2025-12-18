<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class SuratBulananChart
{
    protected $char;

    public function __construct(LarapexChart $chart)
    {
        $this->char = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->char->barChart()
            ->setTitle('San Francisco vs Boston.')
            ->setSubtitle('Wins during season 2021.')
            ->addData('San Francisco', [6, 9, 3, 4, 10, 8])
            ->addData('Boston', [7, 3, 8, 2, 6, 4])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }

    // public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    // {
    //     return $this->char->barChart()
    //     ->addData('Total Surat',[
    //     SKKM::whereMonth('created_at','1')->count() + SKU::whereMonth('created_at','1')->count(),
    //     SKKM::whereMonth('created_at','2')->count() + SKU::whereMonth('created_at','2')->count(),
    //     SKKM::whereMonth('created_at','3')->count() + SKU::whereMonth('created_at','3')->count()
    // ])
    // ->setColors(['#435ebe','#55c6e8'])
    // ->setLabels(['Jan', 'Feb', 'Mar']);
    // }
}
