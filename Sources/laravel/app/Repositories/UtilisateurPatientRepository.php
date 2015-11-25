<?php

namespace App\Repositories;

use App\UtilisateurPatient;

class UtilisateurPatientRepository extends ResourceRepository
{

    public function __construct(UtilisateurPatient $user)
    {
        $this->model = $user;
    }

}