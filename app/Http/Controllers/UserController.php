<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Application; // Import the Application model
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Other methods...
    public function show($id)
    {
        $user = User::find($id);
        if ($user->role == 'STUDENT' || $user->role == 'VENDOR') {
            return view('manageProfile.participantProfile', compact('user'));
        }
        return view('manageProfile.staffProfile', compact('user'));
    }
    


    public function submitApplyKiosk(Request $request)
    {
        $operatingHours = $request->input('business_operating_hour');
        $operatingHours = date('H:i:s', strtotime($operatingHours));
        // Validation rules
        $request->validate([
            // Add your validation rules here
        ]);

        // Save data to the 'applications' table
        $application = new Application([
            'id' => Auth::id(),
            'business_name' => $request->input('business_name'),
            'business_role' => $request->input('business_role'),
            'business_category' => $request->input('business_category'),
            'business_information' => $request->input('business_information'),
            'business_operating_hour' => $request->input('business_operating_hour'),
            'business_start_date' => $request->input('business_start_date'),
            // Add other fields here
        ]);

        // Save uploaded files (you may need to adjust this part based on your file storage configuration)
        $ssmPdfPath = $request->file('ssm_pdf')->store('pdfs');
        $businessProposalPdfPath = $request->file('business_proposal_pdf')->store('pdfs');

        $application->ssm_pdf = $ssmPdfPath;
        $application->business_proposal_pdf = $businessProposalPdfPath;

        $application->save();

        // Redirect or do something else after successful submission
        return redirect()->route('some.success.route');
    }
}
