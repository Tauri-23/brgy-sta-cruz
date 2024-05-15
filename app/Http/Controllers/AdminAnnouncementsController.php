<?php

namespace App\Http\Controllers;

use App\Contracts\IGenerateFilenameService;
use App\Contracts\IGenerateIdService;
use App\Models\announcements;
use Illuminate\Http\Request;

class AdminAnnouncementsController extends Controller
{
    protected $generateId;
    protected $generateFileName;

    public function __construct(IGenerateIdService $generateId, 
    IGenerateFilenameService $generateFilename, ) {
        $this->generateId = $generateId;
        $this->generateFileName = $generateFilename;
    }

    public function index() {
        $announcements = announcements::all();
        return view('BrgyStaff.Announcement.index', [
            'announcements' => $announcements
        ]);
    }

    public function addAnnouncement() {
        return view('BrgyStaff.Announcement.addAnnouncements');
    }

    public function addAnnouncementPost(Request $request) {
        $announcement = new announcements;

        if(!$request->hasFile('file')) {
            return response()->json([
                'status' => 401,
                'message' => 'No file uploaded'
            ]);
        }

        $file = $request->file('file');

        if(!$file->isValid()) {
            return response()->json([
                'status' => 401,
                'message' => 'Invalid file'
            ]);
        }

        try {
            $targetDirectory = 'assets/media/announcement';

            $newFilename = $this->generateFileName->generate($file, $targetDirectory);

            //upload the file to the public directory
            $file->move(public_path($targetDirectory), $newFilename);

            $announcement->id = $this->generateId->generate(announcements::class, 6);
            $announcement->title = $request->title;
            $announcement->pic = $newFilename;
            $announcement->content = $request->content;
            $announcement->featured = $request->featured;

        } catch(\Exception $ex) {
            return response()->json([
                'status' => 500,
                'message' =>'Failed to upload file: ' . $ex->getMessage()
            ]);
        }

        if($announcement->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'success'
            ]);
        }
        else {
            return response()->json([
                'status' => 400,
                'message' => 'error'
            ]);
        }
    }

    public function viewAnnouncement($id) {
        $announcement = announcements::find($id);

        return view('BrgyStaff.Announcement.viewAnnouncement', [
            'announcement' => $announcement
        ]);
    }

    public function editAnnouncement($id) {
        $announcement = announcements::find($id);

        return view('BrgyStaff.Announcement.editAnnouncement', [
            'announcement' => $announcement
        ]);
    }

    public function editAnnouncementPost(Request $request) {
        $announcement = announcements::find($request->id);

        if($request->hasFile('file')) {
            $file = $request->file('file');

            if(!$file->isValid()) {
                return response()->json([
                    'status' => 401,
                    'message' => 'Invalid file'
                ]);
            }
    
            try {
                $targetDirectory = 'assets/media/announcement';
    
                $newFilename = $this->generateFileName->generate($file, $targetDirectory);
    
                //upload the file to the public directory
                $file->move(public_path($targetDirectory), $newFilename);
    
                $announcement->title = $request->title;
                $announcement->pic = $newFilename;
                $announcement->content = $request->content;
                $announcement->featured = $request->featured;
    
            } catch(\Exception $ex) {
                return response()->json([
                    'status' => 500,
                    'message' =>'Failed to upload file: ' . $ex->getMessage()
                ]);
            }
        }
        else {
            $announcement->title = $request->title;
            $announcement->content = $request->content;
            $announcement->featured = $request->featured;
        }

        

        if($announcement->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'success'
            ]);
        }
        else {
            return response()->json([
                'status' => 400,
                'message' => 'error'
            ]);
        }
    }

    public function deleteAnnouncementPost(Request $request) {
        $announcement = announcements::find($request->annId);

        if($announcement->delete()) {
            return response()->json([
                'status' => 200,
                'message' => 'success'
            ]);
        }
        else {
            return response()->json([
                'status' => 400,
                'message' => 'failed'
            ]);
        }
    }
}
