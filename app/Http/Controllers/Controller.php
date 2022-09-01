<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Disease;
use App\Models\State;
use App\Models\City;
use App\Models\Patient;
use App\Models\PatientDisease;
use App\Models\Treatment;
use App\Models\PatientTreatments;
use Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * @var User
     */
    public $user;

    /**
     * @var Disease
     */
    public $disease;

    /**
     * @var State
     */
    public $state;

    /**
     * @var City
     */
    public $city;

    /**
     * @var Patient
     */
    public $patient;

    /**
     * @var PatientDisease
     */
    public $patientDisease;

    /**
     * @var Treatment;
     */
    public $treatment;

    /**
     * @var PatientTreatments;
     */
    public $patientTreatments;


    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->user = new User();
        $this->disease = new Disease();
        $this->state = new State();
        $this->city = new City();
        $this->patient = new Patient();
        $this->patientDisease = new PatientDisease();
        $this->treatment = new Treatment();
        $this->patientTreatments = new PatientTreatments();
    }

}
