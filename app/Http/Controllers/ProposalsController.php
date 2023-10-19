<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProposalsModel;

class ProposalsController extends Controller
{

    public function index()
    {
        // Fetch all records from the model and pass them to the view
        // $items = ProposalsModel::all();
        $records = ProposalsModel::orderBy('created_at', 'ASC')->get();

        return view('transparency.call-for-proposals.index', compact('records'));
    }

    public function create()
    {
        // Return the view for creating a new item
        return view('transparency.call-for-proposals.create');
    }

    public function store(Request $request)
    {
        // Define validation rules for the incoming request data
        $rules = [
            'proposaltitle' => 'required|string',
            'proposaldescription' => 'required|string',
            'startdate' => ['required', 'date', 'after_or_equal:today'],
            'enddate' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    $startdate = $request->input('startdate');
                    
                    if ($value && strtotime($value) < strtotime($startdate)) {
                        $fail('The end date must be on or after the start date.');
                    }
                },
            ],
            // 'status' => 'string', // You may add specific rules for 'status' 
            'status' => [
                'nullable',
                'string',
                function ($attribute, $value, $fail) use ($request) {
                    $startDate = $request->input('start_date');
                    $endDate = $request->input('end_date');
        
                    // Check if the status is 'Open' if the current date is between start and end dates
                    if ($value === 'Open' && now() >= $startDate && now() <= $endDate) {
                        return;
                    }
        
                    // Check if the status is 'Closed' if the current date is past the end date
                    if ($value === 'Closed' && now() > $endDate) {
                        return;
                    }
        
                    // Check if the status is 'Opening Soon!' if the current date is before the start date
                    if ($value === 'Opening Soon!' && now() < $startDate) {
                        return;
                    }
        
                    $fail('Invalid status based on start and end dates.');
                },
            ],
            
            
            'remarks' => 'nullable|string',
        ];

        // Define custom error messages
        $customMessages = [
            'startdate.after_or_equal' => 'The start date must be today or a future date.',
            'enddate.after' => 'The end date must be after the start date.',
        ];

        try {
    
        // Validate the request data against the defined rules
        $validatedData = $request->validate($rules, $customMessages);
        // Set a default value for 'status' based on the conditions
        if (!isset($validatedData['status'])) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
        
            if (now() >= $startDate && now() <= $endDate) {
                $validatedData['status'] = 'Open';
            } elseif (now() > $endDate) {
                $validatedData['status'] = 'Closed';
            } elseif (now() < $startDate) {
                $validatedData['status'] = 'Opening Soon!';
            }
        }
        
    
        // Create the proposal using the validated data
        ProposalsModel::create($validatedData);
    
        // Redirect to the index or show view, or perform other actions
        return redirect()->route('call-for-proposals')->with('success', 'Call for Proposal Successfully Added!');
    }catch (QueryException $e) {
        // If an exception is thrown, it means there was a database error
        // You can handle this error by returning an error response
        // You can pass the error message to the view for the modal
        $errorMessage = 'Error: Unable to create call for proposals. Please try again later.';
    
        // Return a response, passing the error message to the view
        // return view('errors.errorView')->with('error', $errorMessage);
        // Redirect back with the error message
        return redirect()->back()->with('error', $errorMessage);

    }
    }
    
    



    // public function store(Request $request)
    // {
    //     ProposalsModel::create($request->all());

    //     // Redirect to the index or show view, or perform other actions
    //     return redirect()->route('call-for-proposals')->with('success', 'Data Successfully Added!');
    // }

    public function show($id)
    {
        // Retrieve and show the specific item using the provided ID
        $proposals = ProposalsModel::findOrFail($id);

        return view('transparency.call-for-proposals.show', compact('proposals'));
    }

    public function edit($id)
    {
        // Retrieve and show the specific item for editing
        $proposals = ProposalsModel::findOrFail($id);

        return view('transparency.call-for-proposals.edit', compact('proposals'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update the item with the provided ID
        $proposals = ProposalsModel::findOrFail($id);
        // Update the item properties using the request data
        $proposals->update($request->all());

        // Redirect to the index or show view, or perform other actions
        return redirect()->route('call-for-proposals')->with('success', 'Call for Proposal Successfully Updated!');
    }

    public function destroy($id)
    {
        // Delete the item with the provided ID
        $proposals = ProposalsModel::findOrFail($id);
        $proposals->delete();

        // Redirect to the index or perform other actions
        return redirect()->route('call-for-proposals')->with('success', 'Call for Proposal Successfully Deleted!');
    }
}
