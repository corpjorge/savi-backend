<?php

namespace App\Http\Controllers\Application\Documents;

use App\Models\Application;
use Illuminate\Http\Request;

class UploadDocumentApplication
{

    public function getDocuments(Application $application, Request $request): mixed
    {
        $documents = $application->documents;

        $documents[$request->file('documents')->hashName()] = [
            'name' => $request->file('documents')->getClientOriginalName(),
            'status' => 'pending',
        ];

        $request->documents->store('documents/' . $application->id);
        return $documents;
    }
}
