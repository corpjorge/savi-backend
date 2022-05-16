<?php

namespace App\Http\Controllers\Application\Documents;

use App\Models\Application;
use Illuminate\Http\Request;

class UploadDocumentsApplicationAdminController extends UploadDocumentApplication
{
    public function __invoke(Request $request, Application $application)
    {
        $request->validate(['documents' => 'nullable|mimes:jpeg,jpg,gif,png,doc,docx,pdf']);

        $documents = $this->getDocuments($application, $request);

        $application->update(
            [$application->documents = $documents]
        );
    }

}
