<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "holidays";
        $holidays = Holiday::get();
        
        return view('backend.employee_manage.holiday.index',compact('title','holidays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.employee_manage.holiday.create');
    }

    public function completed(Request $request,Holiday $holiday){
        //    $holiday = Holiday::find($request->id);
           $holiday->update([
               'completed'=>1,
           ]);
           return back()->with('success',"Holiday marked as complete");
        }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Holiday::create($request->all());
        return redirect('holidays')->with('success',"Holiday Has Been Successfully added.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Holiday $holiday)
    {
        //return view('backend.employee_manage.holiday.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Holiday $holiday)
    {
        $holiday = Holiday::find($request->id);
        $holiday->update([
            'name'=>$request->name,
            'holiday_date'=>$request->holiday_date,
        ]);
        return back()->with('success',"Holiday has been updated successfully!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $holiday = Holiday::find($request->id);
        $holiday->delete();
        return back()->with('success',"Holiday has been deleted successfully!!");
    }
}
