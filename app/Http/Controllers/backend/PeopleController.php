<?php

namespace App\Http\Controllers\backend;

use App\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeRequest;
use Illuminate\Support\Facades\DB;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(3);

        return view('content.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeRequest $request)
    {
        //dd($request->all());
        //salvar
        $post = Employee::create($request->all());

        //retornar
        return back()->with('status', 'Creado con exito');
    }

 
    public function edit($id)
    {
    
        $employee = Employee::find($id);
        return view('content.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeRequest $request, $id)
    {
        $employee = Employee::find($id);
        $employee->update($request->all());

        return back()->with('status', 'Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return back()->with('status', 'Eliminado correctamente');
    }
}
