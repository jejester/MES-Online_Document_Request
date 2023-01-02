<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EmployeeRequest;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isTrue;

use Symfony\Component\Console\Input\Input;

class TrackRequestForm extends Component
{

    public $tracking_num;
    public $pin;
    
    public function render()
    {
        return view('livewire.track-request-form');
    }


    public function submit(){
        $this->validate([
            'tracking_num'=>'required',
            'pin'=>'required|integer'
          ]);

        

        $values = trim($this->tracking_num);
        $u_pin = trim($this->pin);
        
        //STUDENTS
        //GET TRANSACTION NUMBER AND PIN FROM DATABASE (STUDENT REQUESTS TABLE)
        $student_tr_list = DB::table('student_requests')->pluck('tracking_number');
        $student_pin_list = DB::table('student_requests')->pluck('pin');

        $pending_tr_list = DB::table('processing_student_requests')->pluck('tracking_number');
        $pending_pin_list = DB::table('processing_student_requests')->pluck('pin');

        $pickup_tr_list = DB::table('student_docs_readyfor_pickups')->pluck('tracking_number');
        $pickup_pin_list = DB::table('student_docs_readyfor_pickups')->pluck('pin');



        //CONVERT THE TRANSACTION NUMBER AND PIN INTO JSON (FOR STUDENTS)
        $st_json = json_encode($student_tr_list);
        $st_pin_json = json_encode($student_pin_list);  

        $pending_st_json = json_encode($pending_tr_list);
        $pending_st_pin_json = json_encode($pending_pin_list); 

        $pickup_st_json = json_encode($pickup_tr_list);
        $pickup_st_pin_json = json_encode($pickup_pin_list);  
        
        

        //EMPLOYEES
        $employee_tr_list = DB::table('employee_requests')->pluck('tracking_number');
        $employee_pin_list = DB::table('employee_requests')->pluck('pin');

        $employee_pending_tr_list = DB::table('processing_employee_requests')->pluck('tracking_number');
        $employee_pending_pin_list = DB::table('processing_employee_requests')->pluck('pin');

        $employee_pickup_tr_list = DB::table('employee_docs_readyfor_pickups')->pluck('tracking_number');
        $employee_pickup_pin_list = DB::table('employee_docs_readyfor_pickups')->pluck('pin');



        //CONVERT THE TRANSACTION NUMBER AND PIN INTO JSON (FOR STUDENTS)
        $st_json = json_encode($student_tr_list);
        $st_pin_json = json_encode($student_pin_list);  

        $pending_st_json = json_encode($pending_tr_list);
        $pending_st_pin_json = json_encode($pending_pin_list); 

        $pickup_st_json = json_encode($pickup_tr_list);
        $pickup_st_pin_json = json_encode($pickup_pin_list); 

        
        if(preg_match("/{$values}/i", $st_json) && preg_match("/{$u_pin}/i", $st_pin_json)){

            $db_name = DB::table('student_requests')->where('pin', $u_pin)->value('first_name');
            $db_tr = DB::table('student_requests')->where('pin', $u_pin)->value('tracking_number');

            $tr = $db_tr;
            $status = 'Awaiting for approval';
            $p = $u_pin;
            $n = $db_name;

            return redirect()->route('request.status',['number'=>$tr, 'pin'=>$p, 'name'=>$n, 'status'=>$status]);
                
         }


         elseif(preg_match("/{$values}/i", $pending_st_json) && preg_match("/{$u_pin}/i", $pending_st_pin_json)){

            $db_name = DB::table('processing_student_requests')->where('pin', $u_pin)->value('first_name');
            $db_tr = DB::table('processing_student_requests')->where('pin', $u_pin)->value('tracking_number');

            $tr = $db_tr;
            $status = 'Approved and being process';
            $p = $u_pin;
            $n = $db_name;

            return redirect()->route('request.status',['number'=>$tr, 'pin'=>$p, 'name'=>$n, 'status'=>$status]);

         }

         elseif(preg_match("/{$values}/i", $pickup_st_json) && preg_match("/{$u_pin}/i", $pickup_st_pin_json)){

            $db_name = DB::table('student_docs_readyfor_pickups')->where('pin', $u_pin)->value('first_name');
            $db_tr = DB::table('student_docs_readyfor_pickups')->where('pin', $u_pin)->value('tracking_number');

            $tr = $db_tr;
            $status = 'Ready for Pickup';
            $p = $u_pin;
            $n = $db_name;

            return redirect()->route('request.status',['number'=>$tr, 'pin'=>$p, 'name'=>$n, 'status'=>$status]);

         }

         //EMPLOYEES
         elseif(preg_match("/{$values}/i", $employee_tr_list) && preg_match("/{$u_pin}/i", $employee_pin_list)){
            $db_name = DB::table('employee_requests')->where('pin', $u_pin)->value('first_name');
            $db_tr = DB::table('employee_requests')->where('pin', $u_pin)->value('tracking_number');

            $tr = $db_tr;
            $status = 'Awaiting for approval';
            $p = $u_pin;
            $n = $db_name;

            return redirect()->route('request.status',['number'=>$tr, 'pin'=>$p, 'name'=>$n, 'status'=>$status]);

        }

        elseif(preg_match("/{$values}/i", $employee_pending_tr_list) && preg_match("/{$u_pin}/i", $employee_pending_pin_list)){

            $db_name = DB::table('processing_employee_requests')->where('pin', $u_pin)->value('first_name');
            $db_tr = DB::table('processing_employee_requests')->where('pin', $u_pin)->value('tracking_number');

            $tr = $db_tr;
            $status = 'Approved and being process';
            $p = $u_pin;
            $n = $db_name;

            return redirect()->route('request.status',['number'=>$tr, 'pin'=>$p, 'name'=>$n, 'status'=>$status]);

         }

         elseif(preg_match("/{$values}/i", $employee_pickup_tr_list) && preg_match("/{$u_pin}/i", $employee_pickup_pin_list)){

            $db_name = DB::table('employee_docs_readyfor_pickups')->where('pin', $u_pin)->value('first_name');
            $db_tr = DB::table('employee_docs_readyfor_pickups')->where('pin', $u_pin)->value('tracking_number');

            $tr = $db_tr;
            $status = 'Ready for Pickup';
            $p = $u_pin;
            $n = $db_name;

            return redirect()->route('request.status',['number'=>$tr, 'pin'=>$p, 'name'=>$n, 'status'=>$status]);

         }
    
        else{
            return redirect()->back()->with('message', 'Information not found! Please check if your transaction number and pin is correct.');
        }
    
    

       




    }
}
