<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\DepartmentFormRequest;
use DB;
use App\Department;
use App\User;


class DepartmentsController extends Controller
{
    public function show()
    {
        $init_doctors = DB::table('role_user')->where('role_id', 4)->get();
        $doctors = User::whereId($init_doctors[0]->user_id)->get();

        return view('admin.departments' , compact('doctors'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $departments = Department::latest()->paginate(5);
        return response()->json($departments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = Department::create($request->all());
        return response()->json($create);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit = Department::find($id)->update($request->all());
        return response()->json($edit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::find($id)->delete();
        return response()->json(['done']);
    }
}
