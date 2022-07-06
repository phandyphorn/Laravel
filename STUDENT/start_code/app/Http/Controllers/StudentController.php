<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


// ====================================================================
class StudentController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getStudents(){
        return Student::all() ;
    }

    public function showStudents(){
        return view('students', ['students'=>Student::all()]) ;
    }

    public function getStudentById($id){
        // =================================================
        $students = student::all();
        for ($i=0; $i<count($students); $i++){
            if ($students[$i]['id'] == $id){
                return  $students[$i];
            }else {
                return "Student No Found";
            }
        };
        // ===================================================
        // foreach($students as $student){
        //     if ($student['id'] == $id){
        //         return $student;
        //     }else {
        //         return "Student not found";
        //     }
        // }
    }
}

