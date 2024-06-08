<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Consultation;
use ConsoleTVs\Charts\Facades\Charts;

class ChartController extends Controller
{
    public function index()
    {
        // Données des patients par mois
        $patients = Patient::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTH(created_at) as month"))
                            ->groupBy('month')
                            ->pluck('count', 'month');

        $patientChart = Charts::create('bar', 'chartjs')
                        ->title('Patients Registered per Month')
                        ->labels($patients->keys())
                        ->values($patients->values())
                        ->dimensions(1000, 500)
                        ->responsive(true);

        // Données des consultations par mois
        /*$consultations = Consultation::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTH(created_at) as month"))
                            ->groupBy('month')
                            ->pluck('count', 'month');

        $consultationChart = Charts::create('bar', 'chartjs')
                        ->title('Consultations per Month')
                        ->labels($consultations->keys())
                        ->values($consultations->values())
                        ->dimensions(1000, 500)
                        ->responsive(true);*/

        return view('index', compact('patientChart'));
    }
}
