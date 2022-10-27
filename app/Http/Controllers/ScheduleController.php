<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'schedule';
        $this->truckTable = 'truck';
        $this->haulerTable = 'hauler';
        $this->assignedTable = 'assignedSchedule';
       
    }

    protected function assignedScheduleValidator(array $data) {
        return Validator::make($data, [
            'name' => ['required'],
            'clientUser' => ['required'],
            'contactNo' => ['required'],
            'date' => ['required'],
            'driverUser' => ['required'],
            'location' => ['required'],
            'payment' => ['required'],
            'time' => ['required'],
            'update' => ['required'],
            'userName' => ['required'],
            'wasteDesc' => ['required'],
            'wasteType' => ['required'],

        
        ]);
     }

    public function index()
    {
        //$key = $id;
        //$hauler = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        $schedule = $this->database->getReference($this->tablename)->getValue();
        return view ('schedule.index', compact('schedule'));
    }

    public function create()
    {
        $schedule = $this->database->getReference($this->tablename)->getValue();
        $hauler = $this->database->getReference($this->haulerTable)->getValue();
        $truck = $this->database->getReference($this->truckTable)->getValue();
        return view ('schedule.create', compact('schedule', 'hauler','truck'));
    }

    public function store(Request $request)
    {
        //$this->assignedScheduleValidator($request->all())->validate();

        $postData = [
            'clientUser' => $request->input('clientUser'),
            'contactNo' => $request->input('contactNo'),
            'date' => $request->input('date'),
            'driverUser' => $request->input('driverUser'),
            'location' => $request->input('location'),
            'name' => $request->input('name'),
            'payment' => $request->input('payment'),
            'time' => $request->input('time'),
            'update' => $request->input('update'),
            'userName' => $request->input('userName'),
            'wasteDesc' => $request->input('wasteDesc'),
            'wasteType' => $request->input('wasteType'),
        ];
       
        //$re_updated2 = $this->database->getReference($this->assignedTable.'/'.$key)->update($updateData);
        //$schedule = $this->database->getReference($this->truckTable)->getValue();
        $re_updated2 = $this->database->getReference($this->assignedTable)->getChild($request->userName)->update($postData);
        if($re_updated2)
        {
            return redirect('assignedSchedule')->with('status','The Schedule has been Assigned to Hauler Successfully!');
        }
        else
        {
            return redirect('assignedSchedule')->with('status','schedule Information not Updated');
        }
        
    }


   

    public function edit($username)
    {
        $key = $username;

        $truck = $this->database->getReference($this->truckTable)->getValue();
        $hauler = $this->database->getReference($this->haulerTable)->getValue();
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        $editdata2 = $this->database->getReference($this->tablename)->getChild($key)->getValue();
       
        if($editdata)
        {
            return view ('schedule.edit', compact('editdata','editdata2','key','hauler','truck'));
        }
        else
        {
            return redirect('schedule')->with('schedule','schedule Information not Found');
        }
        
    }

    public function edit2($username)
    {
        $key = $username;

        $truck = $this->database->getReference($this->truckTable)->getValue();
        $hauler = $this->database->getReference($this->haulerTable)->getValue();
        $editdata2 = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if($editdata2)
        {
            return view ('schedule.assigned', compact('editdata2','key','hauler','truck'));
        }
        else
        {
            return redirect('schedule')->with('schedule','schedule Information not Found');
        }
        
    }

    public function update(Request $request, $username)
    {
        $key = $username;
        $updateData = [
            //'contactNo' => $request->contactNo,
            //'date' => $request->date,
            'driver' => $request->driver,
            'driverUser' => $request->driverUser,
           // 'location' => $request->location,
            //'name' => $request->name,
            'plate' => $request->plate,
            //'time' => $request->time,
            'update' => $request->update,
            //'userName' => $request->userName,
            //'wasteDesc' => $request->wasteDesc,
            //'wasteType' => $request->wasteType,
        ];
       
        $re_updated = $this->database->getReference($this->tablename.'/'.$key)->update($updateData);
        if($re_updated)
        {
            return redirect('schedule')->with('status','Schedule Details has been Updated Successfully!');
        }
        else
        {
            return redirect('schedule')->with('status','schedule Information not Updated');
        }
        
    }

    public function update1(Request $request, $username)
    {
        $key = $username;
        $updateData = [
            //'contactNo' => $request->contactNo,
            //'date' => $request->date,
            //'driver' => $request->driver,
            //'driverUser' => $request->driverUser,
           // 'location' => $request->location,
            //'name' => $request->name,
            //'plate' => $request->plate,
            //'time' => $request->time,
            'update' => $request->update,
            //'userName' => $request->userName,
            //'wasteDesc' => $request->wasteDesc,
            //'wasteType' => $request->wasteType,
        ];
       
        $re_updated = $this->database->getReference($this->tablename.'/'.$key)->update($updateData);
        if($re_updated)
        {
            return redirect('schedule')->with('status','schedule Information Updated Successfully');
        }
        else
        {
            return redirect('schedule')->with('status','schedule Information not Updated');
        }
        
    }

   
    public function destroy($username)
    {
        $key = $username;
        $del_data = $this->database->getReference($this->tablename.'/'.$key)->remove();
        if($del_data)
        {
            return redirect('schedule')->with('status','The Appoinment Schedule has been Canceled Successfully!');
        }
        else
        {
            return redirect('schedule')->with('status','schedule Information not Deleted');
        }
    }
}
