<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Pages.Beneficiary.beneficiary');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Pages.Beneficiary.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|string|max:50',
            'middlename' => 'nullable|string|max:50',
            'lastname' => 'required|string|max:50',
            'suffix' => 'nullable|string|max:50',
            'sex' => 'required|string',
            'birthdate' => 'required|date',
            'status' => 'required|string',
        ]);

        try{
            DB::beginTransaction();

            $beneficiary = Beneficiary::create([
                'firstname' => Str::ucfirst($validated['firstname']),
                'middlename' => Str::upper($validated['middlename']),
                'lastname' => Str::ucfirst($validated['lastname']),
                'suffix' => Str::ucfirst($validated['suffix']),
                'sex' => Str::ucfirst($validated['sex']),
                'birthdate' => Str::ucfirst($validated['birthdate']),
                'status' => Str::ucfirst($validated['status']),
            ]);

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Beneficiary Added!',
            ]);
        }catch(Exception $e){
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong.',
                'error' => $e->getMessage(),
            ]);
        }

        
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
