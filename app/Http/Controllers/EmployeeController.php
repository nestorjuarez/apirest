<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        
    }
    public function getEmplooyes()
    {
        return Employee::all();
    }


    public function show(Employee $employee)
    {
        return $employee;
    }

    public function store(Request $request)
    {
        $empleado = $request->validate([
            'firstname' => 'required|min:3|max:25',
            'lastname' => 'required|min:3|max:25'

        ]);

        Employee::create($empleado);

        return response()->json([
            'msg' => 'Paciente Creado Exitosamente'
        ],201);
    }

    public function update(Request $request, Employee $employee)
    {
        $empleado = $request->validate([
            'firstname' => 'required|min:3|max:25',
            'lastname' => 'required|min:3|max:25'

        ]);

        $employee->update($empleado);

        return response()->json([
            'resp' => 'Los datos se actualizaron exitosamente'],200);
    }

    public function delete(Employee $employee)
    {
        $employee->delete();

        return response()->json([
            'resp' => 'El empleado fue borrado con exito'
        ],200);
    }
}
