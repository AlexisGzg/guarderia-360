<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $employees = Employee::paginate();

        return view('admin.employee.index', compact('employees'))
            ->with('i', ($request->input('Pagina', 1) - 1) * $employees->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $employee = new Employee();
        return view('admin.employee.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/photos');
            $data['photo'] = Storage::url($path);
        }

        Employee::create($data);

        return Redirect::route('employee.index')
            ->with('success', 'Se ha creado el empleado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $employee = Employee::findOrFail($id);
        return view('admin.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $employee = Employee::findOrFail($id);
        return view('admin.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, Employee $employee): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            // Eliminar la foto anterior si existe
            if ($employee->photo) {
                Storage::delete(str_replace('/storage', 'public', $employee->photo));
            }

            $path = $request->file('photo')->store('public/photos');
            $data['photo'] = Storage::url($path);
        }

        $employee->update($data);

        return Redirect::route('employee.index')
            ->with('success', 'Se actualizaron los datos del empleado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $employee = Employee::findOrFail($id);
        // Eliminar la foto del empleado si existe
        if ($employee->photo) {
            Storage::delete(str_replace('/storage', 'public', $employee->photo));
        }
        $employee->delete();

        return Redirect::route('employee.index')
            ->with('success', 'Se ha eliminado el empleado correctamente');
    }
}
