<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithFileUploads;
use App\Models\Candidat;
use App\Models\Country;
use Illuminate\Http\Request;

class Wizard extends Component
{
    use WithFileUploads;

    public $countLen = 255;
    public $currentStep = 1;
    public $passport_or_cin;
    public $countries = [];
    public $files = [];

    // var inputs

    public $fname;
    public $lname;
    public $fname_ar;
    public $lname_ar;
    public $place_of_birth;
    public $place_of_birth_ar;
    public $gender;
    public $familly_situation;
    public $nationality;
    public $cin_or_n_passport;
    public $date_of_birth;
    public $address;
    public $phone;
    public $mobile;
    public $email;
    public $pro_situation;
    public $father_fname;
    public $father_lname;
    public $father_profession;
    public $mother_fname;
    public $mother_lname;
    public $mother_profession;

    public $cne;
    public $bac_intitu;
    public $bac_year;
    public $bac_speciality;
    public $bac_mention;

    public $deug_intitu;
    public $deug_year;
    public $deug_speciality;
    public $deug_mention_s1;
    public $deug_mention_s2;
    public $deug_mention_s3;
    public $deug_mention_s4;

    public $licence_intitu;
    public $licence_year;
    public $licence_speciality;
    public $licence_mention_s5;
    public $licence_mention_s6;


    public $master_intitu;
    public $master_year;
    public $master_speciality;
    public $master_mention_s7;
    public $master_mention_s8;
    public $master_mention_s9;
    public $master_mention_s10;

    public $doctoral_training;
    public $research_focus;
    public $project;
    public $axe;
    public $labo;



    public $rules = [
        'fname' => 'required|min:3',
        'lname' =>  'required|min:3',
        'fname_ar' => 'required|min:3',
        'lname_ar' => 'required|min:3',
        'place_of_birth' => 'required|min:3',
        'place_of_birth_ar' => 'required|min:3',
        'gender' => 'required|min:4',
        'nationality' =>  'required',
        'cin_or_n_passport' =>  'required|min:4',
        'date_of_birth' => 'required|min:4',
        'address' =>  'required|min:4',
        'phone' =>  'min:4',
        'mobile' =>  'required|min:4',
        'email' =>  'required|min:4|email',
        'pro_situation' =>  'required',
        'father_fname' =>  'required|min:4',
        'father_lname' =>  'required|min:4',
        'mother_fname' =>  'required|min:4',
        'mother_lname' =>  'required|min:4',
        'familly_situation' =>  'required|min:4',
        'father_profession' =>  'required|min:4',
        'mother_profession' =>  'required|min:4',


        'cne' =>  'required|min:4',
        'bac_intitu' =>  'required|min:4',
        'bac_year' =>  'required|min:4',
        'bac_speciality' =>  'required|min:4',
        'bac_mention' =>  'required|min:1',

        'deug_intitu' =>  'required|min:4',
        'deug_year' => 'required|min:4',
        'deug_speciality' => 'required|min:4',
        'deug_mention_s1' => 'required|min:1',
        'deug_mention_s2' => 'required|min:1',
        'deug_mention_s3' => 'required|min:1',
        'deug_mention_s4' => 'required|min:1',

        'licence_intitu' => 'required|min:4',
        'licence_year' => 'required|min:4',
        'licence_speciality' => 'required|min:4',
        'licence_mention_s5' => 'required|min:1',
        'licence_mention_s6' => 'required|min:1',

        'master_intitu' => 'required|min:4',
        'master_year' => 'required|min:4',
        'master_speciality' => 'required|min:4',
        'master_mention_s7' => 'required|min:1',
        'master_mention_s8' => 'required|min:1',
        'master_mention_s9' => 'required|min:1',
        'master_mention_s10' => 'required|min:1',

        'doctoral_training' => 'required|min:4',
        'research_focus' => 'required|min:4',
        'labo' => 'required|min:4',
        'project' => 'required|min:4',
        'axe' => 'required|min:4',
    ];

    // validation real-time
    public function updated($propertName)
    {
        $this->validateOnly($propertName);
    }
    // component load
    public function mount()
    {
        // fetch all countries with codes geo
        $this->countries = Country::all();
    }

    // component render
    public function render()
    {
        return view('livewire.wizard');
    }

    public function stepperUp($step)
    {
        $this->currentStep = $step;
    }


    // first step
    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'fname' => 'required|min:3',
            'lname' =>  'required|min:3',
            'fname_ar' => 'required|min:3',
            'lname_ar' => 'required|min:3',
            'place_of_birth' => 'required|min:3',
            'place_of_birth_ar' => 'required|min:3',
            'gender' => 'required|min:4',
            'nationality' =>  'required',
            'cin_or_n_passport' =>  'required|min:4',
            'date_of_birth' => 'required|min:4',
            'address' =>  'required|min:4',
            'phone' =>  'min:4',
            'mobile' =>  'required|min:4',
            'email' =>  'required|min:4|email',
            'pro_situation' =>  'required',
            'father_fname' =>  'required|min:4',
            'father_lname' =>  'required|min:4',
            'mother_fname' =>  'required|min:4',
            'mother_lname' =>  'required|min:4',
            'familly_situation' =>  'required|min:4',
            'father_profession' =>  'required|min:4',
            'mother_profession' =>  'required|min:4',
        ]);
        $this->currentStep = 2;
    }
    // second step
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'cne' =>  'required|min:4',
            'bac_intitu' =>  'required|min:4',
            'bac_year' =>  'required|min:4',
            'bac_speciality' =>  'required|min:4',
            'bac_mention' =>  'required|min:1',

            'deug_intitu' =>  'required|min:4',
            'deug_year' => 'required|min:4',
            'deug_speciality' => 'required|min:4',
            'deug_mention_s1' => 'required|min:1',
            'deug_mention_s2' => 'required|min:1',
            'deug_mention_s3' => 'required|min:1',
            'deug_mention_s4' => 'required|min:1',

            'licence_intitu' => 'required|min:4',
            'licence_year' => 'required|min:4',
            'licence_speciality' => 'required|min:4',
            'licence_mention_s5' => 'required|min:1',
            'licence_mention_s6' => 'required|min:1',

            'master_intitu' => 'required|min:4',
            'master_year' => 'required|min:4',
            'master_speciality' => 'required|min:4',
            'master_mention_s7' => 'required|min:1',
            'master_mention_s8' => 'required|min:1',
            'master_mention_s9' => 'required|min:1',
            'master_mention_s10' => 'required|min:1',

            'doctoral_training' => 'required|min:4',
            'research_focus' => 'required|min:4',
            'labo' => 'required|min:4',
            'project' => 'required|min:4|max:255',
            'axe' => 'required|min:4',
        ]);

        $this->currentStep = 3;
    }
    // final step send data to db
    public function submitForm(Request $request)
    {
        // // validate data befot uploading
        // if (!empty($this->files)) {
        //     $validatedData = array_merge($this->validatedData, [
        //         'files.*' => 'image|max:1024', // 1MB Max
        //     ]);
        // }

        // upload files
        if (!empty($this->files)) {
            foreach ($this->files as $key => $file) {
                $this->files[$key] = $file->store($this->cin_or_n_passport, 'public');
            }
            $this->files = json_encode($this->files);
        }

        // store data
        Candidat::create([
            'fname' => $this->fname,
            'lname' => $this->lname,

            'fname_ar' => $this->fname_ar,
            'lname_ar' => $this->lname_ar,
            'place_of_birth' => $this->place_of_birth,
            'place_of_birth_ar' => $this->place_of_birth_ar,

            'gender' => $this->gender,
            'nationality' => $this->nationality,
            'cin_or_n_passport' => $this->cin_or_n_passport,
            'date_of_birth' => $this->date_of_birth,
            'address' => $this->address,
            'phone' => $this->phone,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'pro_situation' => $this->pro_situation,
            'familly_situation' => $this->familly_situation,
            'father_fname' => $this->father_fname,
            'father_lname' => $this->father_lname,
            'mother_fname' => $this->mother_fname,
            'mother_lname' => $this->mother_lname,

            'father_profession' => $this->father_profession,
            'mother_profession' => $this->mother_profession,

            'cne' => $this->cne,
            'bac_intitu' => $this->bac_intitu,
            'bac_year' => $this->bac_year,
            'bac_speciality' => $this->bac_speciality,
            'bac_mention' => $this->bac_mention,

            'deug_intitu' => $this->deug_intitu,
            'deug_year' => $this->deug_year,
            'deug_speciality' => $this->deug_speciality,
            'deug_mention_s1' => $this->deug_mention_s1,
            'deug_mention_s2' => $this->deug_mention_s2,
            'deug_mention_s3' => $this->deug_mention_s3,
            'deug_mention_s4' => $this->deug_mention_s4,

            'licence_intitu' => $this->licence_intitu,
            'licence_year' => $this->licence_year,
            'licence_speciality' => $this->licence_speciality,
            'licence_mention_s5' => $this->licence_mention_s5,
            'licence_mention_s6' => $this->licence_mention_s6,


            'master_intitu' => $this->master_intitu,
            'master_year' => $this->master_year,
            'master_speciality' => $this->master_speciality,
            'master_mention_s7' => $this->master_mention_s7,
            'master_mention_s8' => $this->master_mention_s8,
            'master_mention_s9' => $this->master_mention_s9,
            'master_mention_s10' => $this->master_mention_s10,

            'doctoral_training' => $this->doctoral_training,
            'research_focus' => $this->research_focus,
            'labo' => $this->labo,
            'project' => $this->project,
            'axe' => $this->axe,
            'files' => $this->files,
        ]);

        // clean inputs
        $this->clearForm();

        // init stepper
        $this->currentStep = 4;
    }

    // backword step -1
    public function back($step)
    {
        $this->currentStep = $step;
    }

    // hook for changing the caption label
    public function selectNationality($event)
    {
        if ($event === "MA") {
            $this->passport_or_cin =  "رقم البطاقة الوطنية";
        } else {
            $this->passport_or_cin = "رقم جواز السفر";
        }
    }

    // reset all values inputs
    public function clearForm()
    {
        $this->fname  = '';
        $this->lname  = '';
        $this->gender  = '';
        $this->nationality  = '';
        $this->cin_or_n_passport  = '';
        $this->date_of_birth  = '';
        $this->address  = '';
        $this->phone  = '';
        $this->mobile  = '';
        $this->email  = '';
        $this->pro_situation  = '';
        $this->father_fname  = '';
        $this->father_lname  = '';
        $this->mother_fname  = '';
        $this->mother_lname  = '';

        $this->cne = '';
        $this->bac_intitu = '';
        $this->bac_year = '';
        $this->bac_speciality = '';
        $this->bac_mention = '';

        $this->deug_intitu = '';
        $this->deug_year = '';
        $this->deug_speciality = '';
        $this->deug_mention_s1 = '';
        $this->deug_mention_s2 = '';
        $this->deug_mention_s3 = '';
        $this->deug_mention_s4 = '';

        $this->licence_intitu = '';
        $this->licence_year = '';
        $this->licence_speciality = '';
        $this->licence_mention_s5 = '';
        $this->licence_mention_s6 = '';


        $this->master_intitu = '';
        $this->master_year = '';
        $this->master_speciality = '';
        $this->master_mention_s7 = '';
        $this->master_mention_s8 = '';
        $this->master_mention_s9 = '';
        $this->master_mention_s10 = '';

        $this->doctoral_training = '';
        $this->research_focus = '';
        $this->labo = '';
        $this->files = '';
    }

    public function count()
    {
        if ($this->countLen < 0) {
            $this->countLen = "🚨 عدد الحروف المسموح بها هو 255 ";
        } else {
            $this->countLen--;
        }
    }
}
