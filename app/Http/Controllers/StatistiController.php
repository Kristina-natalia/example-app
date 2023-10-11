<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataStatistik;

class StatistiController extends Controller
{
    public function index()
    {
        $dataStatistik = DataStatistik::all();
        $mean = $this->hitungMean($dataStatistik);
        $modus = $this->hitungModus($dataStatistik);
        $median = $this->hitungMedian($dataStatistik);
        
        return view('statistik.index', compact('dataStatistik', 'mean', 'modus', 'median'));
    }

    private function hitungMean($dataStatistik)
    {
        $jumlahData = count($dataStatistik);
        $total = 0;
    
        foreach ($dataStatistik as $data) {
            $total += $data->nilai;
        }
    
        $mean = $total / $jumlahData;
    
        return $mean;
    }

    private function hitungModus($dataStatistik)
    {
        $counts = array_count_values(array_column($dataStatistik->toArray(), 'nilai'));
        arsort($counts);

        $modus = key($counts);

        return $modus;
    }

    private function hitungMedian($dataStatistik)
    {
        $sortedData = array_column($dataStatistik->toArray(), 'nilai');
        sort($sortedData);
        $count = count($sortedData);

        if ($count % 2 == 0) {
            $middle1 = $sortedData[($count / 2) - 1];
            $middle2 = $sortedData[$count / 2];
            $median = ($middle1 + $middle2) / 2;
        } else {
            $median = $sortedData[($count - 1) / 2];
        }

        return $median;
    }
}