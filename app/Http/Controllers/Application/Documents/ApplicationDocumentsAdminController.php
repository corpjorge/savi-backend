<?php

namespace App\Http\Controllers\Application\Documents;

class ApplicationDocumentsAdminController
{
    public function __invoke(\App\Models\Application $application)
    {
        return $application->documents;
    }

}
