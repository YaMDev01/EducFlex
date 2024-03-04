<?php

namespace App\Http\Controllers;

use App\Models\Licence;
use App\Models\School;
use App\Http\Requests\FormSchoolRequest;
use Carbon\Carbon;

class GestionSchoolController extends Controller
{
    
    public function index()
    {
        return \view('school.index', [
            'school' => School::first() ?? new School()
        ]);
    }


    public function create()
    {
        return \view('school.form', [
            'school' => new School()
        ]);
    }

    
    public function store(FormSchoolRequest $request)
    {
        $data = $request->validated();
        /**  @var licence actif */
        $date_current = Carbon::now()->format('d/m/Y');
        $licence = Licence::where('actif', '1')->where('date_aspire', '>=', $date_current)->first();
        
        if($licence){
            $data['licence_id'] = $licence['id'];
            /**  @var UploadedFile $logo | null */
            $name = 'logo.png';
            $logo = $request->validated('avatar');
            if($logo != null && ! $logo->getError()){
                $data['avatar'] = $logo->storeAs('logo', $name, 'public');
            }
            School::create($data);
            $status = 'success';
            $message = 'Enregistrement effectué avec success';
        }else{
            $status = 'error';
            $message = 'Licence invalide';
        }
        return \to_route('school.index')->with($status, $message);
    }

    
    public function edit(School $school)
    {
        return \view('school.form', [
            'school' => $school
        ]);
    }

    
    public function update(FormSchoolRequest $request, School $school)
    {
        $data = $request->validated();
        $data['actif'] = $data['actif'] ?? '0';

        /**  @var UploadedFile $logo | null */
        $name = 'logo.png';
        $logo = $request->validated('avatar');
        if($logo != null && ! $logo->getError()){
            $data['avatar'] = $logo->storeAs('logo', $name, 'public');
        }
        $school->update($data);
        $status = 'success';
        $message = 'Mise à jour effectué avec success';

        return \to_route('school.index')->with($status, $message);
    }

}
