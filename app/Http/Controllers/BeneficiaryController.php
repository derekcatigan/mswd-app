<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beneficiaries = Beneficiary::with('address')->paginate(10);

        return view('Pages.Beneficiary.beneficiary', compact('beneficiaries'));
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
            // Beneficiary Model
            'firstname' => 'required|string|max:50',
            'middlename' => 'nullable|string|max:50',
            'lastname' => 'required|string|max:50',
            'suffix' => 'nullable|string|max:50',
            'sex' => 'required|string',
            'birthdate' => 'required|date',
            'status' => 'required|string',
            'category' => 'nullable|string|max:1000',
            'remarks' => 'nullable|string|max:1000',
            // Address Model
            'streetname' => 'nullable|string|max:100',
            'barangay' => 'required|string',
            'municipality' => 'required|string',
            'province' => 'required|string',
            // Service Model
            'service_type' => 'required|string',
            'service' => 'required|array',
            'service.*' => 'string',
        ]); 

        try{
            DB::beginTransaction();

            // Create beneficiary
        $beneficiary = Beneficiary::firstOrCreate([
            'user_id' => Auth::user()->id, 
            'firstname' => Str::title($validated['firstname']),
            'middlename' => Str::upper($validated['middlename']),
            'lastname' => Str::ucfirst($validated['lastname']),
            'suffix' => Str::ucfirst($validated['suffix']),
            'sex' => Str::ucfirst($validated['sex']),
            'birthdate' => $validated['birthdate'],
            'status' => Str::ucfirst($validated['status']),
            'category' => Str::ucfirst($validated['category']),
            'remarks' => Str::ucfirst($validated['remarks']),
        ]);

        // Create address
        $beneficiary->address()->create([
            'streetname' => Str::title($validated['streetname']),
            'barangay' => $validated['barangay'],
            'municipality' => $validated['municipality'],
            'province' => $validated['province'],
        ]);

        // Create service
        foreach ($validated['service'] as $service) {
            $beneficiary->service()->create([
                'service_type' => $validated['service_type'],
                'service' => $service,
            ]);
        }

            DB::commit();
            return redirect()->route('beneficiary.index')->with('success', 'Beneficiary Added!');

        }catch(Exception $e){
            DB::rollBack();

            return response()->json([
                'success' => false,
            'message' => 'Something went wrong.',
            'error' => $e->getMessage(),
            'trace' => $e->getTrace(),
        ], 500);
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

    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Beneficiary::with('address')
            ->when($query, function ($q) use ($query) {
                $q->where('firstname', 'like', "%{$query}%")
                ->orWhere('lastname', 'like', "%{$query}%");
            })
            ->get();

        return response()->json($results);
    }


}
