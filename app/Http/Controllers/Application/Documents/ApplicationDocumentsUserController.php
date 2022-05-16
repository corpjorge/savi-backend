<?php

namespace App\Http\Controllers\Application\Documents;

use App\Models\Application;

class ApplicationDocumentsUserController
{
    public function __invoke(Application $application)
    {
        $application = $application->where('user_id', auth()->id())->first();
        return $application->documents;
    }

}
