<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class AssignedScheduleController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'assignedSchedule';
       
    }

    public function index()
    {
        //$key = $id;
        //$hauler = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        $assignedSchedule = $this->database->getReference($this->tablename)->getValue();
        return view ('assignedSchedule.index', compact('assignedSchedule'));
    }

    public function create()
    {
        $assignedSchedule = $this->database->getReference($this->tablename)->getValue();
        return view ('assignedSchedule.create', compact('assignedSchedule', ));
    }

    public function store(Request $request)
    {
        
        $postData = [
            'clientUser' => $request->clientUser,
            'contactNo' => $request->contactNo,
            'date' => $request->date,
            'location' => $request->location,
            'name' => $request->name,
            'payment' => $request->payment,
            'time' => $request->time,
            'update' => $request->update,
            'userName' => $request->userName,
            'wasteDesc' => $request->wasteDesc,
            'wasteType' => $request->wasteType,
        ];
        //$postRef = $this->database->getReference($this->tablename)->push($postData);
        $postRef = $this->database->getReference($this->tablename)->getChild($request->userName)->update($postData);

        if($postRef)
        {
            return redirect('assignedSchedule')->with('status','assignedSchedule Information added Successfully');
        }
        else
        {
            return redirect('assignedSchedule')->with('status','assignedSchedule Information not added');
        }
        
    }

    public function edit($username)
    {
        $key = $username;
 
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if($editdata)
        {
            return view ('assignedSchedule.edit', compact('editdata','key','assignedSchedule'));
        }
        else
        {
            return redirect('assignedSchedule')->with('assignedSchedule','schedule Information not Found');
        }
        
    }

    public function update(Request $request, $username)
    {
        $key = $username;
        $updateData = [
            'clientUser' => $request->clientUser,
            'contactNo' => $request->contactNo,
            'date' => $request->date,
            'location' => $request->location,
            'name' => $request->name,
            'payment' => $request->payment,
            'time' => $request->time,
            'update' => $request->update,
            'userName' => $request->userName,
            'wasteDesc' => $request->wasteDesc,
            'wasteType' => $request->wasteType,
        ];
       
        $re_updated = $this->database->getReference($this->tablename.'/'.$key)->update($updateData);
        if($re_updated)
        {
            return redirect('assignedSchedule')->with('status','assignedSchedule Information Updated Successfully');
        }
        else
        {
            return redirect('assignedSchedule')->with('status','assignedSchedule Information not Updated');
        }
        
    }

    public function destroy($username)
    {
        $key = $username;
        $del_data = $this->database->getReference($this->tablename.'/'.$key)->remove();
        if($del_data)
        {
            return redirect('assignedSchedule')->with('status','Assign Schedule has been Cancel Successfully');
        }
        else
        {
            return redirect('assignedSchedule')->with('status','assignedSchedule Information not Deleted');
        }
    }
}
