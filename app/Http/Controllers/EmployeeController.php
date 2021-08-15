<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function show($id)
    {
        $employee = Employee::find($id);

        if (empty($employee)) {
            $employee = "Employee has not been found with id " . $id;
        }

        return response()->json([
            'result' => 'success',
            'employee' => $employee
        ]);
    }

    public function tagEmployee(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'code' => 'required|string'
        ]);

        if($validator->fails()) {
            return response()->json([
               'result' => 'error',
               'message' => 'Code parameter is missing in the request. Parameter must be string'
            ]);
        }

        // Code is validated already
        $code = $request->code;
        // Fetch employee by code_employee
        $employee = Employee::where('code_employee', '=', $code)->first();

        // We validate our employee fetched by code_employee
        if (empty($employee)) {
            return response()->json([
                'result' => 'error',
                'message' => 'Employee has not been found with code ' . $code
            ]);
        }

        $employee->duty = ($employee->duty == 0) ? 1 : 0;

        $employee->save();

        return response()->json([
            'result' => 'success',
            'message' => 'Employee with code ' . $code . " has been updated successfully"
        ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string',
            'code' => 'required|string'
        ]);

        if($validator->fails()) {
            return response()->json([
                'result' => 'error',
                'message' => 'Something went wrong with the employee creation'
            ]);
        }

        $data = array(
          'name' => $request->name,
          'lastname' => $request->lastname,
          'email' => $request->email,
          'active' => 1,
          'duty' => 0,
          'code_employee' => $request->code
        );

        $employee = new Employee($data);

        $employee->save();

        return response()->json([
            'result' => 'success',
            'message' => 'Employee with code ' . $request->code . " has been created successfully",
            'employee' => $employee
        ]);
    }
}
