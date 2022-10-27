<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class WasteCollectedController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'wasteCollected';
    }

    public function index()
    {
        $wasteCollected = $this->database->getReference($this->tablename)->getValue();
        return view ('wasteCollected.index', compact('wasteCollected'));
    }

    public function create()
    {
        return view ('wasteCollected.create');
    }

    public function store(Request $request)
    {
        
        $postData = [
            'date' => $request->date,
            'location' => $request->location,
            'wasteType' => $request->wasteType,
            'weight' => $request->weight,
            
        ];
        $postRef = $this->database->getReference($this->tablename)->push($postData);
        if($postRef)
        {
            return redirect('wasteCollected')->with('status','wasteCollected Details added Successfully');
        }
        else
        {
            return redirect('wasteCollected')->with('status','wasteCollected Details not added');
        }
        
    }

    public function edit($id)
    {
        $key = $id;
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if($editdata)
        {
            return view ('wasteCollected.edit', compact('editdata','key'));
        }
        else
        {
            return redirect('wasteCollected')->with('status','wasteCollected Details not Found');
        }
        
    }

    public function update(Request $request, $id)
    {
        $key = $id;
        $updateData = [
            'date' => $request->date,
            'location' => $request->location,
            'wasteType' => $request->wasteType,
            'weight' => $request->weight,
            
        ];
        $re_updated = $this->database->getReference($this->tablename.'/'.$key)->update($updateData);
        if($re_updated)
        {
            return redirect('wasteCollected')->with('status','wasteCollected Details Updated Successfully');
        }
        else
        {
            return redirect('wasteCollected')->with('status','wasteCollected Details not Updated');
        }
        
    }

    public function destroy($id)
    {
        $key = $id;
        $del_data = $this->database->getReference($this->tablename.'/'.$key)->remove();
        if($del_data)
        {
            return redirect('wasteCollected')->with('status','Waste Collected Details has been Deleted Successfully!');
        }
        else
        {
            return redirect('wasteCollected')->with('status','wasteCollected Details not Deleted');
        }
    }
}
