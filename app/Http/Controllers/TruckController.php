<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Illuminate\Support\Facades\Validator;

class TruckController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'truck';
    }

    protected function truckValidator(array $data) {
        return Validator::make($data, [
            'plateNo' => ['required'],
            'model' => ['required'],
            'brand' => ['required'],
            'type' => ['required'],
        ]);
     }

    public function index()
    {
        $truck = $this->database->getReference($this->tablename)->getValue();
        return view ('truck.index', compact('truck'));
    }

    public function create()
    {
        return view ('truck.create');
    }

    public function store(Request $request)
    {
       $this->truckValidator($request->all())->validate();

        $postData = [
            'plateNo' => $request->input('plateNo'),
            'model' => $request->input('model'),
            'brand' => $request->input('brand'),
            'type' => $request->input('type'),
            
        ];
        //$this->truckValidator($request->all())->validate();
        $postRef = $this->database->getReference($this->tablename)->push($postData);
        if($postRef)
        {
            return redirect('truck')->with('status','Truck Details added Successfully!');
        }
        else
        {
            return redirect('truck')->with('status','Truck Details not added');
        }
        
    }

    public function edit($id)
    {
        $key = $id;
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if($editdata)
        {
            return view ('truck.edit', compact('editdata','key'));
        }
        else
        {
            return redirect('truck')->with('status','Truck Details not Found');
        }
        
    }

    public function update(Request $request, $id)
    {
        $key = $id;
        $this->truckValidator($request->all())->validate();
        $updateData = [
            'plateNo' => $request->input('plateNo'),
            'model' => $request->input('model'),
            'brand' => $request->input('brand'),
            'type' => $request->input('type'),
            
        ];
        $re_updated = $this->database->getReference($this->tablename.'/'.$key)->update($updateData);
        if($re_updated)
        {
            return redirect('truck')->with('status','Truck Details Updated Successfully!');
        }
        else
        {
            return redirect('truck')->with('status','Truck Details not Updated');
        }
        
    }

    public function destroy($id)
    {
        $key = $id;
        $del_data = $this->database->getReference($this->tablename.'/'.$key)->remove();
        if($del_data)
        {
            return redirect('truck')->with('status','Truck Details Deleted Successfully!');
        }
        else
        {
            return redirect('truck')->with('status','Truck Details not Deleted');
        }
    }
}
