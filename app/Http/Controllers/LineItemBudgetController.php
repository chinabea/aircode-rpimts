<?php

namespace App\Http\Controllers;

use App\Models\LineItemBudgetModel;
use App\Models\ProjectsModel;
use Illuminate\Http\Request;

class LineItemBudgetController extends Controller
{
    public function index()
    {
        $lineItemsBudget = LineItemBudgetModel::all();
        return view('submission-details.line-items-budget.index', compact('lineItemsBudget'));
    }

    public function create()
    {
        return view('submission-details.line-items-budget.create');
    }

    public function store(Request $request)
    {
        $projectId = $request->input('project_id');
        $requestData = $request->all();
        $requestData['project_id'] = $projectId;
        LineItemBudgetModel::create($requestData);

        return redirect()->back()->with('success', 'Data Successfully Added!');
    }

    public function show($id)
    {
        $lineItemsBudget = LineItemBudgetModel::findOrFail($id);
        return view('submission-details.line-items-budget.show', compact('lineItemsBudget'));
    }

    public function edit($id)
    {
        $lib = LineItemBudgetModel::where('id', $id)->firstOrFail();
        $projects = $lib->project;
        return view('submission-details.line-items-budget.edit', compact('lib', 'projects'));
    }

    public function update(Request $request, $id)
    {
        $lib = LineItemBudgetModel::find($id);
        $lib->member_name = $request->input('member_name');
        $lib->role = $request->input('role');
        $lib->save();

        return redirect()->back()->with('success', 'Project team member updated successfully.');
    }

    public function destroy($id)
    {
        $lib = LineItemBudgetModel::findOrFail($id);
        $lib->delete();
        return redirect()->back()->with('success', 'Project team member deleted successfully');
    }
}