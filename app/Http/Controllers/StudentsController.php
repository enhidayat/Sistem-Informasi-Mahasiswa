<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        // return view('students/index', ['students' => $students]);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'nama'  =>  'required',
            'nrp'   =>  'required|integer',
            'email' =>  'required',
            'jurusan'   =>  'required'
        ]);

        //============== cara 1 ===============
        // $student = new Student;
        // $student->nama = $request->nama; // $request = inputan dari field dibungkus di var objek
        // $student->nrp = $request->nrp;
        // $student->email = $request->email;
        // $student->jurusan = $request->jurusan;

        // $student->save(); //menyimpan ke database dlm bentuk objk
        //============== cara 1 ================

        //============== cara 2.1 ================
        // note!! :harus pake properti fillabe atau guarded
        // Student::create([
        //     'nama' => $request->nama,
        //     'nrp' => $request->nrp,
        //     'email' => $request->email,
        //     'jurusan' => $request->jurusan
        // ]);
        //============== cara 2.2 ================
        //note: pemulisan 2.1 bisa disingkat dg
        Student::create($request->all()); //all berarti data yg sdh difilter oleh fillabe/guarde

        return redirect('/students')->with('status', 'Data Mahasiswa Berhasil Ditambahkan!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //return $student; //LANGSUNG SELECT ID pada tabel sesuai param
        return view('students.show', compact('student'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {

        $request->validate([
            'nama'  =>  'required',
            'nrp'   =>  'required|integer',
            'email' =>  'required',
            'jurusan'   =>  'required'
        ]);

        //ada 2 cara lh dokumentasi
        //pake mass update(di model harus diset mass assigmet: fillable /guarded)
        Student::where('id', $student->id)
            ->update([
                'nama'  =>  $request->nama,
                'nrp'   => $request->nrp,
                'email'   => $request->email,
                'jurusan'   => $request->jurusan
            ]);
        return redirect('/students')->with('status', 'Data Mahasiswa Berhasil Diubah!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/students')->with('status', 'Data Mahasiswa Berhasil Dihapus!!');
    }
}
