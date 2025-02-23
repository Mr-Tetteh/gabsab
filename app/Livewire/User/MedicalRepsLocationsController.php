<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\MedicalSession;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MedicalRepsLocationsController extends Controller
{

    public function index()
    {
        $pageTitle = 'Reports';
        $medical_reps = User::where('personnel_type_id', null)
            ->where('super_admin', 0)->get();

        return view('admin.pages.reports.medical_reps_locations_filter',
            compact('pageTitle', 'medical_reps'));
    }

    public function medicalRepsLocations()
    {
        $pageTitle = 'Medical Reps Locations';


        $medical_reps = User::where('personnel_type_id', null)
            ->where('super_admin', 0)->get();

        $locations =  MedicalSession::query()
            ->with(['user' => function ($query) {
                $query->select('id', 'name');
            }])->whereDate('created_at', Carbon::today())
            ->with(['organization' => function ($query) {
                $query->select('id', 'name');
            }])
            ->with(['doctor' => function ($query) {
                $query->select('id', 'name');
            }])
            ->select('latitude', 'longitude', 'user_id','doctor_id','organization_id')
            ->get();

        return view('admin.pages.reports.medical_reps_locations', compact('pageTitle', 'locations','medical_reps'));
    }

    public function medicalRepsLocationsPost(Request $request)
    {
        $pageTitle = 'Medical Reps Locations';
        $name = null;
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $user_id = $request->input('medical_rep_id');

        $medical_reps = User::where('personnel_type_id', null)
            ->where('super_admin', 0)->get();

        if(isset($fromDate) && isset($toDate) && isset($user_id)){
           $name = User::find($user_id)->name;
            $locations =  MedicalSession::query()
                ->with(['user' => function ($query) {
                    $query->select('id', 'name');
                }])
                ->with(['organization' => function ($query) {
                    $query->select('id', 'name');
                }])
                ->with(['doctor' => function ($query) {
                    $query->select('id', 'name');
                }])
                ->whereBetween('created_at', [$fromDate, $toDate])
                ->where('user_id', $user_id)
                ->select('latitude', 'longitude', 'user_id','doctor_id','organization_id')
                ->get();
        }elseif(isset($fromDate) && isset($toDate)) {
            $locations =  MedicalSession::query()
                ->with(['user' => function ($query) {
                    $query->select('id', 'name');
                }])
                ->with(['organization' => function ($query) {
                    $query->select('id', 'name');
                }])
                ->with(['doctor' => function ($query) {
                    $query->select('id', 'name');
                }])
                ->whereBetween('created_at', [$fromDate, $toDate])
                ->select('latitude', 'longitude', 'user_id','doctor_id','organization_id')
                ->get();
        }
        else{
            $locations =  MedicalSession::query()
                ->with(['user' => function ($query) {
                    $query->select('id', 'name');
                }])->whereDate('created_at', Carbon::today())
                ->with(['organization' => function ($query) {
                    $query->select('id', 'name');
                }])
                ->with(['doctor' => function ($query) {
                    $query->select('id', 'name');
                }])
                ->select('latitude', 'longitude', 'user_id','doctor_id','organization_id')
                ->get();
        }



        return view('admin.pages.reports.medical_reps_locations',
            compact('pageTitle', 'locations','medical_reps', 'name', 'fromDate','toDate'));
    }
}
