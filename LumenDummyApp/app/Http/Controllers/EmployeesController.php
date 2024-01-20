<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeesController extends Controller
{  
    public function getEmployee(Request $request)
    {
        $url = 'https://dummy.restapiexample.com/api/v1/employees';

        // Initiate curl
        $ch = curl_init();

        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set the url
        curl_setopt($ch, CURLOPT_URL, $url);

        // Execute
        $result = curl_exec($ch);

        // Closing
        curl_close($ch);

        // Parse JSON response from request to be php object
        $response = json_decode($result, true);
        // dd($response);

        // Return response()->json($response, 200);
        return view('employee/getEmployee', ['results' => $response]);
    }

    public function getEmployeeById(Request $request, $id)
    {
        $url = 'https://dummy.restapiexample.com/api/v1/employee/' . $id;

        // Initiate curl
        $ch = curl_init();

        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set the url
        curl_setopt($ch, CURLOPT_URL, $url);

        // Execute
        $result = curl_exec($ch);

        // Closing
        curl_close($ch);

        // Parse JSON response from request to be php object
        $response = json_decode($result, true);
        // dd($response);

        // Return response()->json($response, 200);
        return view('employee/getEmployeeById', ['results' => $response]);
    }
    public function createEmployee(Request $request)
    {
        return view('employee/createEmployee');
    }
    public function storeEmployee(Request $request)
    {
        $url = 'https://dummy.restapiexample.com/api/v1/create';

        // Initiate curl
        $ch = curl_init();

        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set the url
        curl_setopt($ch, CURLOPT_URL, $url);

        // Set the method
        curl_setopt($ch, CURLOPT_POST, 1);

        // Set the post data
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($request->all()));

        // Execute
        $result = curl_exec($ch);

        // Closing
        curl_close($ch);

        // Parse JSON response from request to be php object
        $response = json_decode($result, true);
        // dd($response);

        return redirect('/employees');
    }
    public function editEmployee(Request $request, $id)
    {
        $url = 'https://dummy.restapiexample.com/api/v1/employee/' . $id;

        // Initiate curl
        $ch = curl_init();

        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set the url
        curl_setopt($ch, CURLOPT_URL, $url);

        // Execute
        $result = curl_exec($ch);

        // Closing
        curl_close($ch);

        // Parse JSON response from request to be php object
        $response = json_decode($result, true);
        // dd($response);

        // Return response()->json($response, 200);
        return view('employee/editEmployee', ['results' => $response]);
    }
    public function updateEmployee(Request $request, $id)
    {
        $url = 'https://dummy.restapiexample.com/api/v1/update/' . $id;

        // Initiate curl
        $ch = curl_init();

        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set the url
        curl_setopt($ch, CURLOPT_URL, $url);

        // Set the method
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

        // Set the post data
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($request->all()));

        // Execute
        $result = curl_exec($ch);

        // Closing
        curl_close($ch);

        // Parse JSON response from request to be php object
        $response = json_decode($result, true);
        // dd($response);

        return redirect('/employees');
    }
    public function deleteEmployee(Request $request, $id)
    {
        $url = 'https://dummy.restapiexample.com/api/v1/delete/' . $id;

        // Initiate curl
        $ch = curl_init();

        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set the url
        curl_setopt($ch, CURLOPT_URL, $url);

        // Set the method
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

        // Execute
        $result = curl_exec($ch);

        // Closing
        curl_close($ch);

        // Parse JSON response from request to be php object
        $response = json_decode($result, true);
        // dd($response);

        return redirect('/employees');
    }
}