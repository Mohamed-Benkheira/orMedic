<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use Inertia\Inertia;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function view($id)
    {
        $prescription = Prescription::with(['medicines.alternatives'])->findOrFail($id);

        return view('dashboard.prescription', compact('prescription'));
    }
    

    public function aside()
    {   
        $prescriptions = Prescription::select('id', 'illness','category')->get(); 
        
        return Inertia::render('Aside', [
            'prescriptions' => $prescriptions
        ]);
    }

    public function header()
    {   
        return Inertia::render('Header');
    }

    public function show($id)
    {
        $prescription = Prescription::with(['medicines.alternatives'])->findOrFail($id);

          return Inertia::render('Details', [
        'prescription' => $prescription,
    ]);
    }

    
    public function details($id)
    {
        $prescription = Prescription::with(['medicines.alternatives'])->findOrFail($id);

          return Inertia::render('Details', [
        'prescription' => $prescription,
    ]);
    }
    
    public function dashboard($id = null)
    {
        $prescriptions_aside = Prescription::select('id', 'illness','category')->get(); 
        // $prescription_details = Prescription::with(['medicines.alternatives'])->findOrFail($id);

        $prescription_details = $id 
        ? Prescription::with(['medicines.alternatives'])->findOrFail($id)
        : null;

        return Inertia::render('Dashboard', [ 
            'prescriptions_aside' => $prescriptions_aside,
            'prescription_details' => $prescription_details
    ]);
    }
    
 
}
