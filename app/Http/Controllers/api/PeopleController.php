<?php

namespace App\Http\Controllers\api;

use App\Employee;
use App\Http\Requests\EmployeRequest;
use App\Http\Controllers\Controller;

class PeopleController extends Controller
{
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function index($param)
    {
        switch (true) {
            case !empty($param):
                return response()->json($this->employee->paginate());
                break;

            default:
                return 'nada';
                break;
        }
    }

    public function store(EmployeRequest $request)
    {
        $employee = $this->employee->create($request->all());

        return response()->json($employee, 201);
    }

    public function show($id)
    {
        $employee = Employee::find($id);

        return response()->json($employee);
    }

    public function search($param)
    {
        $employee = Employee::where('age', '=', $param)
            ->orWhere('abilities', '=', $param)
            ->orderBy('id', 'desc')
            ->get();

        return response()->json($employee);
    }

    public function update(EmployeRequest $request)
    {

        switch (true) {
            case !empty($request->id):
                $employee = Employee::find($request->id);
                $employee->update($request->all());
                break;
            default:
                $employee = [];
                break;
        }

        return response()->json($employee);
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return response()->json(null, 204);
    }
}
