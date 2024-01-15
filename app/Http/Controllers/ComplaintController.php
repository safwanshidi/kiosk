<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComplaintRecord;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    /*public function addComplaint($userId, $complaintText)
    {
        // Validate input data
        if (empty($userId) || empty($complaintText)) {
            return response()->json(['error' => 'User ID and Complaint Text are required.'], 400);
        }

        // Create a new complaint
        $complaint = new ComplaintRecord();
        $complaint->complaint_id = $request->input('complaint_id');
        $complaint->complaint_text = $complaintText;
        $complaint->save();

        // Return success response
        return response()->json(['message' => 'Complaint added successfully.'], 200);
    }*/


    public function addComplaintInterface()
    {
        return view('manageComplaint.KioskParticipantManageComplaint.addComplaintInterface');
    }

    public function addComplaint(Request $request)
    {
        $data = $request->validate([
            'c_name' => 'required',
            'c_email' => 'required',
            'c_ic_num' => 'required|numeric',
            'c_type' => 'required',
            'c_date' => 'required',
            'c_details' => 'required',
            'c_status' => 'required',
        ]);

        $newComplaint = Complaint::create($data);

        return redirect(route('homePage'));
    }
}
