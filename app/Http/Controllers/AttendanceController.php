<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAttendance;
use App\Models\User;
use App\Models\MyClass;
use App\Models\Section;
use App\Models\StudentRecord;
use Carbon\Carbon;
use Validator;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function student_attendance(Request $request)
    {
        $attendance = [];
        $class_id   = $request->class_id;
        $date       = $request->date;     

        $classes    = MyClass::latest()->get();
        $sections   = Section::latest()->get();

        if($class_id == "" || $date == ""){ 

            return view('pages.attendance.student-attendance',compact('attendance','date','class_id', 'classes', 'sections'));
        }else{          
            $class = MyClass::find($class_id)->class_name;

            $attendance = StudentRecord::select('*','student_attendances.id AS attendance_id')
                                    ->leftJoin('student_attendances',function($join) use ($date) {
                                        $join->on('student_attendances.student_id','=','student_records.user_id');
                                        $join->where('student_attendances.date','=',$date);
                                    })
                                    ->where('my_class_id', $class_id)
                                    ->get();  
    
            return view('pages.attendance.student-attendance',compact('attendance','date','class','class_id', 'classes', 'sections'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
    public function student_attendance_save(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'attendance' => 'required',
        ]);
        if ($validator->fails()) {
            if($request->ajax()){ 
                return redirect()->back()->with('error', $validator->errors()->all());
            }else{
                return redirect('student/attendance')
                            ->withErrors($validator) 
                            ->withInput();
            }               
        }
        
        for ($i=0; $i < count($request->student_id) ; $i++) {
            $temp = array();
            $temp['student_id'] = (int)$request->student_id[$i];
            $temp['class_id'] = (int)$request->class_id[$i];
            $temp['date'] = $request->date;
            
            $studentAtt = StudentAttendance::firstOrNew($temp);
            $studentAtt->student_id = $temp['student_id'];
            $studentAtt->class_id = $temp['class_id'];
            $studentAtt->date = $temp['date'];
            $studentAtt->attendance = isset($request->attendance[$i]) ? $request->attendance[$i][0] : 0;
            $studentAtt->save();                
        }
        return redirect()->back()->with('success', 'Saved Sucessfully');
    }
}
