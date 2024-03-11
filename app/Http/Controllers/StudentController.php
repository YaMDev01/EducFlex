<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Nationality;
use App\Models\Level;
use App\Models\SchoolYear;
use App\Http\Requests\FormStudentRequest;
use App\Http\Requests\FormSearchRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function index(FormSearchRequest $request)
    {
        $year = SchoolYear::where('actif','1')->first();
        $query = Student::orderBy('nom','asc')->get();
        $total = $query->count();
        $dispo = $query->where('actif','1')->count();
        $new = $query->where('school_year_id',$year['id'])->where('actif','1')->count();

        if($dt = $request->validated('matricule')){
            $query = $query->where('matricule', $dt);
        }

        if($year = $request->validated('school_year')){
            $query = $query->where('annee_entree', '=', $year );
        }

        return \view('student.index',[
            'student' => $query,
            'total' => $total,
            'dispo' => $dispo,
            'new' => $new
        ]);
    }

    
    public function create()
    {
        return \view('student.form',[
            'nationalite' => Nationality::where('actif','1')->get(),
            'level' => Level::where('actif', '1')->get(),
            'student' => new Student()
        ]);
    }

    
    public function store(FormStudentRequest $request)
    {
        $data = $request->validated();

        /** @var school_year */
        $school_year = SchoolYear::where('actif','1')->first();
        $data['annee_entree'] = $school_year['school_year'];
        $data['school_year_id'] = $school_year['id'];

        /**  @var UploadedFile $avatar | null */
        $avatar = $request->validated('avatar');
        $name = $data['nom'].'-'.$data['matricule'].'.png';
        if($avatar != null && !$avatar->getError()){
            $data['avatar'] = $avatar->storeAs('avatarStudent',$name,'public');
        }

        Student::create($data);
        return \to_route('student.index')->with('success', 'Enregistrement effectué avec success');
    }

    
    public function show(Student $student)
    {
        return \view('student.show',[
            'student' => $student
        ]);
    }

    
    public function edit(Student $student)
    {
        return \view('student.form',[
            'nationalite' => Nationality::where('actif','1')->get(),
            'level' => Level::where('actif', '1')->get(),
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
