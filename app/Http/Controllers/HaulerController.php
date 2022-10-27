<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Illuminate\Support\Facades\Validator;

class HaulerController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'hauler';
        $this->truckTable = "truck";
    }

    protected function haulerValidator(array $data) {
        return Validator::make($data, [
            'firstname' => ['required'],
            'middlename' => ['required'],
            'lastname' => ['required'],
            'gender' => ['required'],
            'address' => ['required'],
            'phoneNo' => ['required'],
            'userName' => ['required'],
            'password' => ['required'],
        ]);
     }

    public function index()
    {
        //$key = $id;
        //$hauler = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        $hauler = $this->database->getReference($this->tablename)->getValue();
        return view ('hauler.index', compact('hauler'));
    }

    public function create()
    {
        $hauler = $this->database->getReference($this->tablename)->getValue();
        $truck = $this->database->getReference($this->truckTable)->getValue();
        
        return view ('hauler.create', compact('hauler', 'truck',));
    }

    public function store(Request $request)
    {
        $this->haulerValidator($request->all())->validate();
       
        $postData = [
            'firstname' => $request->input('firstname'),
            'middlename' => $request->input('middlename'),
            'lastname' => $request->input('lastname'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'phoneNo' => $request->input('phoneNo'),
            'userName' => $request->input('userName'),
            'password' => $request->input('password'),
            'available' => $request->input('available'),
            'truck' => $request->input('truck'),
            'ratings' => $request->input('ratings'),
        ];
        //$postRef = $this->database->getReference($this->tablename)->push($postData);
        $truck = $this->database->getReference($this->truckTable)->getValue();
        $postRef = $this->database->getReference($this->tablename)->getChild($request->userName)->update($postData);
        

        if($postRef)
        {
            return redirect('hauler')->with('status','Hauler Information added Successfully!');
        }
        else
        {
            return redirect('hauler')->with('status','Hauler Information not added');
        }
        
    }

    public function edit($username)
    {
        $key = $username;
       
        $truck = $this->database->getReference($this->truckTable)->getValue();
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if($editdata)
        {
            return view ('hauler.edit', compact('editdata','key','truck'));
        }
        else
        {
            return redirect('hauler')->with('status','Hauler Information not Found');
        }
        
    }

    public function update(Request $request, $username)
    {
        
        $key = $username;
        $this->haulerValidator($request->all())->validate();
        $updateData = [
            'firstname' => $request->input('firstname'),
            'middlename' => $request->input('middlename'),
            'lastname' => $request->input('lastname'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'phoneNo' => $request->input('phoneNo'),
            'userName' => $request->input('userName'),
            'password' => $request->input('password'),
            'available' => $request->input('available'),
            'truck' => $request->input('truck'),
        ];
        //$truck = $this->database->getReference($this->truckTable.'/'.$key)->update($updateData);
        
        $re_updated = $this->database->getReference($this->tablename.'/'.$key)->update($updateData);
        
        if($re_updated)
        {
            return redirect('hauler')->with('status','Hauler Information Updated Successfully!');
        }
        else
        {
            return redirect('hauler')->with('status','Hauler Information not Updated');
        }
        
    }

    public function destroy($username)
    {
        $key = $username;
        $del_data = $this->database->getReference($this->tablename.'/'.$key)->remove();
        if($del_data)
        {
            return redirect('hauler')->with('status','Hauler Information Deleted Successfully!');
        }
        else
        {
            return redirect('hauler')->with('status','Hauler Information not Deleted');
        }
    }
}
