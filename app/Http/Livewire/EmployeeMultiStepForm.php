<?php

namespace App\Http\Livewire;

use DateTime;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\EmployeeRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentRequestSuccessMail;
use App\Mail\EmployeeRequestSuccessMail;

class EmployeeMultiStepForm extends Component
{

    public $first_name;
    public $middle_name;
    public $last_name;
    public $gender;
    public $email;
    public $contact;
    public $address;
    public $employee_id;
    public $document;
    public $birthday;
    public $terms;
    public $final;

  

    public $totalSteps = 5;
    public $currentStep = 1;

    public function mount()
    {
        $this->currentStep = 1;
    }

    public function render()
    {
        return view('livewire.employee-multi-step-form');
    }

    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
         $this->currentStep++;
         if($this->currentStep > $this->totalSteps){
             $this->currentStep = $this->totalSteps;
         }
    }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }


    public function validateData(){

        if($this->currentStep == 1){
            $this->validate([
                'first_name'=>'required|regex:/^[\pL\s\-]+$/u|max:46',
                'middle_name'=>'required|regex:/^[\pL\s\-]+$/u|max:46',
                'last_name'=>'required|regex:/^[\pL\s\-]+$/u|max:46',
                'gender'=>'required',
                'birthday'=>'required|before:today',
                'terms'=>'accepted'
            ]);
        }
        elseif($this->currentStep == 2){
              $this->validate([
                 'email'=>'required|email|max:62',
                 'contact'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
                 'address'=>'required|string|max:255'
              ]);
        }
        elseif($this->currentStep == 3){
              $this->validate([
                'employee_id'=>'required|max:72',
                'document'=>'required'
              ]);
        }
    }
    

    
    public function register(){
        $this->resetErrorBag();
        if($this->currentStep == 4){
            $full_name = 'first_name'.''.'middle_name'.''.'last_name'; 
        }


        function generate(){
            $prefix = 'REQ';
            $random = rand(1000000,9999);
            $year = Carbon::now()->format('Y'); // 2021
            $final = $prefix .'-'.$random.'-'.$year;


            if(EmployeeRequest::where('tracking_number', '=', $final)->exists()){
                $tracking_no = $final+1;
                return $tracking_no;
            }

            else {
                return $final;
            }
        }

        function pin_generate(){
            $pin = rand(1000,9999);

            return $pin;
        }

        $pin = pin_generate();
        $tracking_number = generate();
        


        $values = array(
            "user_id" =>Auth::user()->id,
            "first_name"=>$this->first_name,
            "middle_name"=>$this->middle_name,
            "last_name"=>$this->last_name,
            "gender"=>$this->gender,
            "email"=>$this->email,
            "contact"=>$this->contact,
            "address"=>$this->address,
            "employee_id"=>$this->employee_id,
            "document"=>$this->document,
            "birthday"=>$this->birthday,
            "created_at"=>Carbon::now(),
            "tracking_number"=>$tracking_number,
            "pin"=>$pin
        );


        $u_id = Auth::user()->id;

        if(DB::table('employee_requests')->where('user_id', $u_id)->exists() || DB::table('processing_employee_requests')->where('user_id', $u_id)->exists() || DB::table('employee_docs_readyfor_pickups')->where('user_id', $u_id)->exists())
        {
            return redirect()->back()->with('message', 'Request Invalid, You still have a pending request.');
        }

        elseif(DB::table('employee_backlogs')->where('employee_id', $this->employee_id)->value('employee_id') == $this->employee_id && DB::table('employee_backlogs')->where('employee_id', $this->employee_id)->value('document') == "FDS"){
            $db_date = DB::table('employee_backlogs')->where('employee_id', $this->employee_id)->value('created_at');
            $date = date('F j, Y',strtotime($db_date));
            return redirect()->back()->with('message', "You still have an unclaimed FDS since $date");
        }

        elseif(DB::table('employee_backlogs')->where('employee_id', $this->employee_id)->value('employee_id') == $this->employee_id && DB::table('employee_backlogs')->where('employee_id', $this->employee_id)->value('document') == "Certificate of Employment"){
            $db_date = DB::table('employee_backlogs')->where('employee_id', $this->employee_id)->value('created_at');
            $date = date('F j, Y',strtotime($db_date));
            return redirect()->back()->with('message', "You still have an unclaimed Certificate of Employment since $date");
        }

        else
        {   
            EmployeeRequest::insert($values);
            $email = $this->email;
            $data= $tracking_number;
            $name= $this->first_name;
            $p = $pin;
            Mail::to($email)->send(new EmployeeRequestSuccessMail($data, $name, $p));
            return redirect()->route('request-sucess',['name'=> $name,'number'=>$data, 'pin'=>$p]);
        }

        
    }



}

