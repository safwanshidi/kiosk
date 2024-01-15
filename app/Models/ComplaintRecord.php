<?php
	namespace App\Models;
	use Illuminate\Support\Facades\DB;
	
	class ComplaintRecord
	{
		public function searchComplaintByUserId($id,$type)
		{
			/* Type
				
				0：search for make Complaint
				1: search for view Complaint

			*/
			
			//if search by user id and id not null
			if(($type==0)&&($id!=null)) 
			{
				$users = DB::table('users')->find($id);

				//if found user in database, get & return unpaid arrears
				if($users!=null) 
				{
					$complaint = DB::table('complaint as complaint')
					->select('complaint.*','status.status','status.users_id')
					->where('status.users_id', $id)
					->where('status.status',0)
					->join('c_status as status','status._id', '=','complaint.id')
					->get();
					
					$userInfo = [
									'id'=>$users->id,
									'name'=>$users->name
								];
					$complaintInfo =[$userInfo,$complaint];
					return $complaintInfo;                
				}
				else
				{
					return null;
				}
			}
			else
			{
				return null;
			}
		   		
		}
	    
		public function searchComplaintById($id)
		{
			$complaint = DB::table('complaint')
			->whereIn('id', $id)
			->select('c_name','c_email','c_type','c_details','c_date')
			->get();
			return $complaint;        
		}
		
		public function updateComplaintStatus($complaintId,$userId)
		{
			$affected = DB::table('c_status')
				  ->where('users_id', $userId) ->whereIn('complaint_id',$complaintId)
				  ->update(['status' => 1]);
	
		}
		

		public function updateComplaintTable($complaint)
		{
			$complaints = DB::table('complaint')->get();

			foreach ($complaints as $c) {
				DB::table('complaint')
					->where('id', $c->id)
					->update(['' => $complaint]);              
			}

			return "Complaint table updated successfully.";
		}

		public function creareStatus($arrearsId)
		{
		   //search all user id when role = student & vendor (要记得改)
			$userId = DB::table('users')->select('id')
										->where('role','STUDENT')
										->orWhere('role','VENDOR')
										->get();					
		   //create array for each user id
			foreach($userId as $id)
			{
				$statusArray[] = [
					'users_id'=>$id->id,
					'complaint_id'=>$arrearsId,
					'c_status'=>0
				];
			   
			}

			//insert all data to database
			$result = DB::table('c_status')->insert($statusArray);

			return $result;
	 
		}

		public function updateStatus($status)
		{
			$affected = DB::table('c_status')
						->where('id', 1)
						->update(['status' => $status]);
			return $affected;        
		}
	}