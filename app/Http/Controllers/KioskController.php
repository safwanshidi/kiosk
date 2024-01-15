<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Kioskapproval;

class KioskController extends Controller
{
    public function showManageApplication()
    {
        $applications = Application::all();
        return view('manageKiosk.manageApplication.KioskApproval', ['applications' => $applications]);
    }

    public function showApplyKioskForm()
    {
        return view('manageKiosk.manageApplication.ApplyKiosk');
    }
    public function applyKiosk(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'business_role' => 'required|string|max:255',
            'business_category' => 'required|string|max:255',
            'business_information' => 'required|string',
            'business_operating_hour' => 'required|string',
            'business_start_date' => 'required|date',
            'ssm_pdf' => 'required|mimes:pdf|max:2048',
            'business_proposal_pdf' => 'required|mimes:pdf|max:2048',
        ]);
    
        $operatingHours = $request->input('business_operating_hour');
        $operatingHours = date('H:i:s', strtotime($operatingHours));
    
        $application = new Application([
            'user_id' => Auth::id(),
            'business_name' => $request->input('business_name'),
            'business_role' => $request->input('business_role'),
            'business_category' => $request->input('business_category'),
            'business_information' => $request->input('business_information'),
            'business_operating_hour' => $operatingHours,
            'business_start_date' => $request->input('business_start_date'),
        ]);
        
        $ssmPdfPath = $request->file('ssm_pdf')->store('pdfs');
        $businessProposalPdfPath = $request->file('business_proposal_pdf')->store('pdfs');
        
        $application->ssm_pdf = $ssmPdfPath;
        $application->business_proposal_pdf = $businessProposalPdfPath;
        
        $application->save();
        
    
        return redirect()->route('pending.approval');
    }
    

    
    public function showPupukHome()
    {
        // logic for Pupuk Admin home page goes here
        return view('layouts.pupukAdminNav'); 
    }

    public function deleteApplication(Application $application)
    {
        $application->delete();
    
        return response()->json(['message' => 'Application deleted successfully']);
    }

    public function editKiosk($applicationId)
{
    $application = Application::find($applicationId);
    return view('manageKiosk.manageApplication.editKiosk', compact('application'));
}

public function updateApplication(Request $request, $applicationId)
{
    // Validation rules for the updated fields
    $request->validate([
        'KioskNo' => 'required|string|max:255',
        'kioskStatus' => 'required|in:Approved,Waiting,Rejected',
    ]);

    // Find the application
    $application = Application::find($applicationId);

    // Create a new Kioskapproval entry
    Kioskapproval::create([
        'application_id' => $applicationId,
        'user_id' => Auth::id(), // Assuming you still want to store the user_id
        'KioskNo' => $request->input('KioskNo'),
        'kioskStatus' => $request->input('kioskStatus'),
        // Add other fields as needed
    ]);

    // Optionally, you can delete the original application record if needed
    // $application->delete();

    return redirect()->route('manage-application');
}

public function showKioskParticipant()
{
    $kioskApprovals = Kioskapproval::all();
    return view('manageKiosk.manageParticipant.KioskParticipant', compact('kioskApprovals'));
}


}
