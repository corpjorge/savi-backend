<?php

namespace App\Http\Controllers\Application\Documents;

use App\Models\Application;

class DeleteApplicationDocumentController
{
    public function __invoke(Application $application, $document)
    {
        $documents = $application->documents;
        $documents[$document] = [
            'status' => 'deleted',
        ];

        $application->update(
            [$application->documents = $documents]
        );
    }

}
