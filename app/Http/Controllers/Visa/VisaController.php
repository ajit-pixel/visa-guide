<?php

namespace App\Http\Controllers\Visa;

use App\Http\Controllers\Controller;
use App\Models\VisaModel;

class VisaController extends Controller
{
    public function get_visa_guide_details(){
        
        return VisaModel::visa_model();
    }
}
