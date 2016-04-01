<?php

use App\Models\Patient;
use App\Models\Consultation;

class AdminController extends \Controller
{

	public function getIndex()
	{

		$patientsCount = Patient::count();
		$consultationsCount = Consultation::count();

		$data = compact('patientsCount', 'consultationsCount');

		return View::make('admin.index', $data);
	}

} 