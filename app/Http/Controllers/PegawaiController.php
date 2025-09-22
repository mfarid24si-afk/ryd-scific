<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $tanggalLahir = Carbon::create(2006, 5, 13); // ganti sesuai tanggal lahirmu
        $tglHarusWisuda = Carbon::create(2029, 8, 30); // ganti sesuai target wisuda
        $currentSemester = 3; // ganti sesuai semester kamu sekarang
        $futureGoal = "Menjadi Software Engineer di perusahaan teknologi besar";

        // --- Hitungan ---
        // $umur = $tanggalLahir->floatdiffInYears(Carbon::now());
        $umur = number_format($tanggalLahir->floatDiffInYears(Carbon::now()), 2);
        $timeToStudyLeft = Carbon::now()->diffInDays($tglHarusWisuda);

        // --- Pesan motivasi ---
        if ($currentSemester < 3) {
            $motivasi = "Masih Awal, Kejar TAK";
        } else {
            $motivasi = "Jangan main-main, kurang-kurangi main game!";
        }

        // --- Bentuk response ---
        $data = [
            "my_age" => $umur,
            "hobbies" => [
                "Membaca buku",
                "Joging",
                "Main futsal",
                "Mendengarkan musik",
                "Traveling"
            ],
            "tgl_harus_wisuda" => $tglHarusWisuda->toDateString(),
            "time_to_study_left" => $timeToStudyLeft,
            "current_semester" => $currentSemester,
            "motivasi" => $motivasi,
            "future_goal" => $futureGoal

        ];
        return view('pegawai', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
