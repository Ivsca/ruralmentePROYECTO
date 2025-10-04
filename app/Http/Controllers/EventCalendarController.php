<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventCalendarController extends Controller
{
    public $user,
        $name,
        $lastName,
        $documentType,
        $document,
        $phone,
        $country,
        $department,
        $city,
        $address;
    /**
     * Display a listing of the resource.
     */

    public function view($id)
    {
       $workshopid = Workshop::find($id);
        if ($workshopid)
        {
            return view('tourism.agend-event-pay', ['workshopid' => $workshopid]);
        }else{
            dd('error');
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
