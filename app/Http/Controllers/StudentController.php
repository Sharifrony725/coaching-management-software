<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\School;
use App\Models\Student;
use App\Models\ClassModel;
use App\Models\StudentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\student_type_details;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table('students')
        ->join('schools', 'students.school_id', '=', 'schools.id' )
        ->join('class_models', 'students.class_id', '=' , 'class_models.id')
        ->select('students.*', 'schools.school_name', 'class_models.class_name')
        ->where(['students.status' => 1,])
        ->orderBy('students.class_id' , 'ASC')
        ->get();
        //return $students;
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $schools = School::where('status' , '=', 1)->get();
       $classes = ClassModel::where('status' , '=', 1)->get();
       return view('student.create',compact('schools', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $student = new Student();
       $student->student_name = $request->student_name;
       $student->school_id = $request->school_id;
       $student->class_id = $request->class_id;
       $student->father_name = $request->father_name;
       $student->father_mobile = $request->father_mobile;
       $student->father_profession = $request->father_profession;
       $student->mother_name = $request->mother_name;
       $student->mother_mobile = $request->mother_mobile;
       $student->mother_profession = $request->mother_profession;
       $student->email_address = $request->email_address;
       $student->sms_mobile = $request->sms_mobile;
       $student->date_of_admission = $request->date_of_admission;
       $student->student_photo = $request->student_photo; //to be edit
       $student->address = $request->address;
       $student->status = 1;
       $student->user_id = Auth::user()->id;
       $student->password = $request->sms_mobile;
       $student->encrypt_password = Hash::make($request->sms_mobile);
       $student->save();

       $studentId = $student->id;
       $batches = $request->batch_id;
       $rolls = $request->roll;
       $studentTypes = $request->student_type;
       foreach ($studentTypes as $key => $studentType) {
        $data = new student_type_details();
        $data->student_id = $studentId;
        $data->class_id = $request->class_id;
        $data->type_id = $key;
        $data->batch_id = $batches[$key];
        $data->roll = $rolls[$key];
        $data->status = 1;
        $data->save();
       }
        return redirect()->route('students.index')->with('message', 'registration successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$student = Student::find($id);
        $student = DB::table('students')
        ->join('schools', 'students.school_id', '=', 'schools.id')
        ->join('class_models', 'students.class_id','=','class_models.id')
        ->join('student_type_details', 'student_type_details.student_id', '=', 'students.id')
        ->join('student_types', 'student_type_details.type_id', '=', 'student_types.id')
        ->join('batches', 'student_type_details.batch_id', '=', 'batches.id')
        ->select('students.*', 'schools.school_name', 'student_type_details.roll', 'batches.batch_name', 'class_models.class_name', 'student_types.student_type')
        ->where([
            'students.status' => 1,
            'students.id' => $id
        ])
        ->orderBy('student_type_details.type_id', 'ASC')
        ->first();
        //return $student;
        return view('student.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //bringStudentType
    public function bringStudentType(Request $request){
        $types = StudentType::where('class_id', $request->class_id)->get();
        $classes = ClassModel::where('status', '=' , 1)->get();
        return view('student.student_types',[
                'types' => $types,
                'classes' => $classes,
                'data' => $request
            ]);
    }
    //batchRollForm
    public function batchRollForm(Request $request){
        $type = StudentType::find($request->type_id);
        $batches = Batch::where([
            'class_id' => $request->class_id,
            'student_type_id'=> $request->type_id,
           ])->get();
        return view('student.batchRollForm',compact('batches','type'));
    }
    //classWiseList
    public function classWiseList(){
        $classes = ClassModel::where('status', '=', 1)->get();
        return view('student.class.classWiseList', compact('classes'));
    }
    //classWiseStudentTypeList
    public function classWiseStudentTypeList(Request $request){
        $classId = $request->class_id;
        $types = StudentType::where([
            'class_id' => $classId,
            'status' => 1
        ])->get();
        return view('student.class.student_type',compact('types'));
    }
    //classAndTypeWiseStudentList
    public function classAndTypeWiseStudentList(Request $request){
        $students = DB::table('students')
            ->join('schools', 'students.school_id', '=', 'schools.id')
            ->join('student_type_details', 'student_type_details.student_id', '=', 'students.id')
            ->join('batches', 'student_type_details.batch_id', '=', 'batches.id')
            ->select('students.*', 'schools.school_name', 'student_type_details.roll' , 'batches.batch_name')
            ->where([
                'students.status' => 1,
                'students.class_id' => $request->class_id,
                'student_type_details.type_id' => $request->student_type_id,
                'student_type_details.status' => 1,
                ])
            ->orderBy('student_type_details.roll', 'ASC')
            ->get();
         //  return $students;
        return view('student.class.student_list', compact('students'));
    }
    //last
}
