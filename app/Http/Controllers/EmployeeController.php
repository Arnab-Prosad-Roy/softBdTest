<?php

  

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;

use App\Designations;
use App\Employees;

  

class EmployeeController extends Controller

{

    public function getLists(Request $request)

    {
        $data = Employees::paginate(8);
        $designations = designations::all();

        if ($request->ajax()) {
            return view('empDatas', compact('data','designations'));
        }
        return view('employeeList',compact('data','designations'));

    }

    // public function update(Request $request)
    // {
    //     $dataId = employees::where('id', $request->pk)->first();
    //     $validator = Validator::make($request->all(),[
    //         'employee_no'=>['required', 'string'],
    //         'name'=> ['required','string', 'between:5,30'],
    //         'designation_id'=> ['required','exists:designations,id,'.$request->designation_id],
    //         'department'=>['required', 'string'],
    //         'company'=> ['required','string','between:3,30'],
    //         'salary'=> ['required','numeric','gt:0'],
    //         'joining_date'=> ['required'],
    //     ],[
    //         'employee_no.required' => 'Employee Number Required',
    //         'employee_no.string' => 'Employee Number Will Be String',
    //         'name.required' => 'Name Required',
    //         'name.string' => 'Name is Invalid',
    //         'name.between' => 'Name Between 3-30 characters',
    //         'designation_id.required' => 'Designation is Required',
    //         'designation_id.exists' => 'Designation is Invalid',
    //         'department.required' => 'Department is Required',
    //         'department.string' => 'Department Name is Invalid',
    //         'company.required' => 'Company Name Rerquired',
    //         'company.string' => 'Company Name Invalid',
    //         'company.between' => 'Company Name Will between 3-30 Characters',
    //         'salary.numeric' => 'Salary will be a Numeric',
    //         'salary.gt' => 'Invalid Salary Type',
    //         'joining_date.required' => 'Joining Date Required',
    //     ]);   


    //         $updateproducts = employees::where(['id'=>$request->pk])
    //                          ->update([
    //                         'employee_no'=>$request->employee_no,
    //                         'name'=>Str::title($request->name),
    //                         'designation_id'=>$request->designation_id,
    //                         'department'=>$request->department,
    //                         'company' => Str::title($request->company),
    //                         'salary' => $request->salary,
    //                         'joining_date' => $request->joining_date,
    //                          ]);
    //        return back()->with('success', 'Data Updated Successfully');
    // }


    // public function DeleteRecord(Request $request){
    //     $dataId = Employees::where('id', $request->pk)->first();
    //     $validator = Validator::make($request->all(),[
    //         'pk'=>['required', 'exists:employees,id'],
    //     ],[
    //         'pk.required' => 'Whoops Buddy Wrong Turn...!',
    //         'pk.exists' => 'Whoops Buddy Wrong Turn...!',
    //     ]);   

    //     if ($validator->fails()) {
    //       return back()
    //             ->withErrors($validator)
    //             ->with('success','Whoops Buddy Wrong Turn....!');
    //     }


    //     $res= Employees::where('id',$dataId->id)->delete();
    //     return back()->with('success','Data Removed Successfully'); 
    // }


    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
    			$data = array(
    				'employee_no'	=>	$request->employee_no,
    				'name'		=>	$request->name,
    				'designation_id' =>	$request->designation_id,
    				'department' => $request->department,
    				'company' => $request->company,
    				'salary' => $request->salary,
    				'joining_date' => $request->joining_date
    			);
    			Employees::
    				where('id', $request->id)
    				->update($data);
    		}
    		if($request->action == 'delete')
    		{
    			Employees::where('id', $request->id)
    				->delete();
    		}
    		return response()->json($request);
    	}
    }

}