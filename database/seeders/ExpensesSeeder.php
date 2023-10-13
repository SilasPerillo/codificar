<?php

namespace Database\Seeders;

use App\Models\ExpensesModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpensesSeeder extends Seeder
{

    public function run(): void
    {
        $listExpenses = [
            ["deputy_id" => 1832,    "month" => 1,    "value" => 0],
            ["deputy_id" => 1832,    "month" => 2,    "value" => 29024.53],
            ["deputy_id" => 1832,    "month" => 3,    "value" => 28575.47],
            ["deputy_id" => 1832,    "month" => 4,    "value" => 22556.690000000002],
            ["deputy_id" => 1832,    "month" => 5,    "value" => 27671.91],
            ["deputy_id" => 1832,    "month" => 6,    "value" => 27962.16],
            ["deputy_id" => 1832,    "month" => 7,    "value" => 22762.27],
            ["deputy_id" => 1832,    "month" => 8,    "value" => 27792.91],
            ["deputy_id" => 1832,    "month" => 9,    "value" => 29721.36],
            ["deputy_id" => 1832,    "month" => 10,    "value" => 29063.4],
            ["deputy_id" => 1832,    "month" => 11,    "value" => 29804.67],
            ["deputy_id" => 1832,    "month" => 12,    "value" => 15435.14],
            ["deputy_id" => 2267,    "month" => 1,    "value" => 0],
            ["deputy_id" => 2267,    "month" => 2,    "value" => 23697.68],
            ["deputy_id" => 2267,    "month" => 3,    "value" => 24198.35],
            ["deputy_id" => 2267,    "month" => 4,    "value" => 25877.12],
            ["deputy_id" => 2267,    "month" => 5,    "value" => 24292.94],
            ["deputy_id" => 2267,    "month" => 6,    "value" => 23247.1],
            ["deputy_id" => 2267,    "month" => 7,    "value" => 24895.16],
            ["deputy_id" => 2267,    "month" => 8,    "value" => 22468.69],
            ["deputy_id" => 2267,    "month" => 9,    "value" => 26240.98],
            ["deputy_id" => 2267,    "month" => 10,    "value" => 24033.12],
            ["deputy_id" => 2267,    "month" => 11,    "value" => 22148.37],
            ["deputy_id" => 2267,    "month" => 12,    "value" => 23884.25],
            ["deputy_id" => 2698,    "month" => 1,    "value" => 0],
            ["deputy_id" => 2698,    "month" => 2,    "value" => 8498.52],
            ["deputy_id" => 2698,    "month" => 3,    "value" => 18754.62],
            ["deputy_id" => 2698,    "month" => 4,    "value" => 19985.64],
            ["deputy_id" => 2698,    "month" => 5,    "value" => 18023.69],
            ["deputy_id" => 2698,    "month" => 6,    "value" => 37362.34],
            ["deputy_id" => 2698,    "month" => 7,    "value" => 28518.72],
            ["deputy_id" => 2698,    "month" => 8,    "value" => 30278.25],
            ["deputy_id" => 2698,    "month" => 9,    "value" => 34504.45],
            ["deputy_id" => 2698,    "month" => 10,    "value" => 32203.100000000002],
            ["deputy_id" => 2698,    "month" => 11,    "value" => 39566.39],
            ["deputy_id" => 2698,    "month" => 12,    "value" => 29304.28],
            ["deputy_id" => 4458,    "month" => 1,    "value" => 0],
            ["deputy_id" => 4458,    "month" => 2,    "value" => 27935.41],
            ["deputy_id" => 4458,    "month" => 3,    "value" => 27408.01],
            ["deputy_id" => 4458,    "month" => 4,    "value" => 26589.15],
            ["deputy_id" => 4458,    "month" => 5,    "value" => 34662.81],
            ["deputy_id" => 4458,    "month" => 6,    "value" => 28470.41],
            ["deputy_id" => 4458,    "month" => 7,    "value" => 35271.619999999995],
            ["deputy_id" => 4458,    "month" => 8,    "value" => 32302.559999999998],
            ["deputy_id" => 4458,    "month" => 9,    "value" => 23586.97],
            ["deputy_id" => 4458,    "month" => 10,    "value" => 22558.97],
            ["deputy_id" => 4458,    "month" => 11,    "value" => 24524.980000000003],
            ["deputy_id" => 4458,    "month" => 12,    "value" => 13689.109999999999]
        ];

        foreach ($listExpenses as $expenses) {
            ExpensesModel::create($expenses);
        }
    }
}
