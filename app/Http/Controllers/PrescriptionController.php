<?php

namespace App\Http\Controllers;

use App\Models\Prescription;

use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function view($id)
    {
        $prescription = Prescription::with('medicines')->findOrFail($id);
        return view('dashboard.prescription', compact('prescription'));
    }
}
