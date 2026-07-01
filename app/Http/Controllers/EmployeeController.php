<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmpCategory;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employee.index', compact('employees'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $empCategories = EmpCategory::all();
        $positions = Position::all();
        return view('admin.employee.edit', compact('employee', 'empCategories', 'positions'));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $requestData = $request->validate([
            'name_uz' => 'required|string|max:255',
            'name_ru' => 'required|string|max:255',
            'email' => 'required|email',
            'category_id' => 'required|integer',
            'position_id' => 'required|integer',
            'phone' => 'nullable|string|max:50',
            'work_time' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('admin/images/'), $imageName);
            $requestData['image'] = $imageName;
        }

        $employee->update($requestData);
        return redirect()->route('admin.employee.index')->with('success', 'Employee updated successfully');
    }
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        $empCategories = EmpCategory::all();
        $positions = Position::all();

        return view('admin.employee.show', compact('employee', 'empCategories', 'positions'));
    }


}
