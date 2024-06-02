<?php

namespace App\Http\Controllers;

use App\Models\DonationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ProjectController extends Controller
{
    public function projectDetails($id)
    {

        $shareComponent = \Share::page(
            URL::current(),
            'Your share text comes here',
        )
        ->facebook()
        ->twitter()
        ->whatsapp();

        $data = DonationType::where('id', $id)->first();
        return view('frontend.projectdetails', compact('data','shareComponent'));
    }
}
