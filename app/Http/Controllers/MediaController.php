<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MediaController extends Controller
{
    public function countMedias()
    {
        $result = DB::table('medias')
            ->select('media AS mediaName', DB::raw('COUNT(*) AS count'))
            ->groupBy('media')
            ->orderByDesc('count')
            ->get();

        return response()->json([
            'message' => 'Ranking of the most used social networks among deputies, ordered in descending order.',
            'data' => $result,
        ]);
    }
}
