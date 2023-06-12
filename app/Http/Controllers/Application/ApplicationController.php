<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\CreateApplicationRequest;
use App\Http\Requests\Application\UpdateApplicationRequest;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FileDelete;


class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Application::query()->get();

        return response()->json([
            'message' => 'Get all applicants',
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateApplicationRequest $request)
    {
        if ($request->hasFile('attachment')) {
            $attachment_file = $request->file('attachment');
            $attachment_file_name = Application::generateAttachmentFileName();
            $attachment_file_name = $attachment_file_name . '.' . $attachment_file->getClientOriginalExtension();
            $attachmentDestinationPath = storage_path('/attachments');
            $attachment_file->move($attachmentDestinationPath, $attachment_file_name);
        }

        $input = $request->validated();
        $input['attachment'] = $attachment_file_name ?? null;

        $data = Application::create($input);

        return response()->json([
            'message' => 'Application created successfully',
            'data' => $data,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        return response()->json([
            'message' => 'Get particular applicant',
            'data' => $application,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {

        if ($request->hasFile('attachment')) {
            $attachment_file = $request->file('attachment');
            $attachment_file_name = Application::generateAttachmentFileName();
            $attachment_file_name = $attachment_file_name . '.' . $attachment_file->getClientOriginalExtension();
            $attachmentDestinationPath = storage_path('/attachments');
            $attachment_file->move($attachmentDestinationPath, $attachment_file_name);
        }

        if ($request->hasFile('attachment')) {
            $attachment_path = storage_path() . '/attachments/' . $application->attachment;
            FileDelete::delete($attachment_path);
        }

        $input = $request->validated();

        if ($request->input('update_type') == 'with_attachment') {
            $input['attachment'] = $attachment_file_name ?? null;
        }

        $application->update($input);

        return response()->json([
            'message' => 'Application updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $application->delete();

        return response()->json([
            'message' => 'Application deleted successfully',
        ]);
    }

    public function download(Application $application)
    {
        $destination = storage_path() . '/attachments/';
        $filename = $application->attachment;
        $pathToFile = $destination . $filename;

        return response()->download($pathToFile);
    }
}
