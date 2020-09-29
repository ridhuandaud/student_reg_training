<?php

namespace App\Http\Controllers;

use App\Gender;
use App\Race;
use App\Registration;
use App\Religion;
use App\School;
use App\Student;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registrations = Registration::with(
            'student.religion',
            'student.race',
            'student.gender',
            'school'
        )->get();

        return view('registrations.index', compact('registrations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::all();
        $races = Race::all();
        $religions = Religion::all();
        $schools = School::all();

        return view('registrations.create', compact(
            'genders',
            'races',
            'religions',
            'schools'
        ));
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
        $student->full_name = $request->full_name;
        $student->ic_number = $request->ic_number;
        $student->dob = $request->dob;
        $student->gender_id = $request->gender;
        $student->race_id = $request->race;
        $student->religion_id = $request->religion;
        $student->save();

        $registration = new Registration();
        $registration->student_id = $student->id;
        $registration->school_id = $request->school;
        $registration->status_id = 1;
        $registration->save();

        return redirect()->back()->with(
            [
                'status' => true,
                'message' => 'Student Registration successfully inserted.'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
