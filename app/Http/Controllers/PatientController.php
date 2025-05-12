<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Http\Resources\PatientCollection;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * @group Patients
 * APIs for managing patient data.
 */
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new PatientCollection(Patient::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $user = User::create([
                'name'     => $request->name,
                'id_type'  => $request->id_type,
                'id_no'    => $request->id_no,
                'gender'   => $request->gender,
                'dob'      => $request->dob,
                'address'  => $request->address,
            ]);

            $patient = Patient::create([
                'user_id'            => $user->id,
                'medium_acquisition' => $request->medium_acquisition,
            ]);

            return (new PatientResource($patient));
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        return new PatientResource($patient);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        return DB::transaction(function () use ($request, $patient) {

            $patient->user->update([
                'name'     => $request->name,
                'id_type'  => $request->id_type,
                'id_no'    => $request->id_no,
                'gender'   => $request->gender,
                'dob'      => $request->dob,
                'address'  => $request->address,
            ]);

            $patient->update([
                'medium_acquisition' => $request->medium_acquisition,
            ]);

            return new PatientResource($patient);
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->user->delete();
        return response()->noContent();
    }
}
