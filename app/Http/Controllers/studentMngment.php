<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use DataTables;

class studentMngment extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $val)

    {

        if ($val->ajax()){

        $stu_data=student::latest()->get();

        return DataTables::of($stu_data) 
        -> addColumn('action', function(){

         return "<a  href='{{Url('student@create')}}'  class='btn btn-info btn-sm'>View</a> <button class='btn btn-warning btn-sm'>Update</button> <button class='btn btn-danger btn-sm'>Delete</button>";
           

        })-> rawColumns(['action'])

         -> make(true);

        }

      
        return view ('student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        alert('HI');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {


        student::create([

          'sname'  => $request -> sname,
          'sbatch'  => $request -> sbatch,
          'sroll'  => $request -> sroll,
          'semail'  => $request -> semail,
          'scell'  => $request -> scell
          
        ]);

      

        
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
