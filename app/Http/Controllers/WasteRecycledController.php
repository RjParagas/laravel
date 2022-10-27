<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class WasteRecycledController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'wasteRecycled';
    }

    public function index()
    {
        $wasteRecycled = $this->database->getReference($this->tablename)->getValue();
        return view ('wasteRecycled.index', compact('wasteRecycled'));
    }

    public function create()
    {
        return view ('wasteRecycled.create');
    }

    public function store(Request $request)
    {
        
        $postData = [
            'date' => $request->date,
          
            'wasteType' => $request->wasteType,
            'recycle' => $request->recycle,
            
        ];
        $postRef = $this->database->getReference($this->tablename)->push($postData);
        if($postRef)
        {
            return redirect('wasteRecycled')->with('status','wasteRecycled Details added Successfully');
        }
        else
        {
            return redirect('wasteRecycled')->with('status','wasteRecycled Details not added');
        }
        
    }

    public function edit($id)
    {
        $key = $id;
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if($editdata)
        {
            return view ('wasteRecycled.edit', compact('editdata','key'));
        }
        else
        {
            return redirect('wasteRecycled')->with('status','wasteRecycled Details not Found');
        }
        
    }

    public function update(Request $request, $id)
    {
        $key = $id;
        $updateData = [
            'date' => $request->date,
            
            'wasteType' => $request->wasteType,
            'recycle' => $request->recycle,
            
        ];
        $re_updated = $this->database->getReference($this->tablename.'/'.$key)->update($updateData);
        if($re_updated)
        {
            return redirect('wasteRecycled')->with('status','wasteRecycled Details Updated Successfully');
        }
        else
        {
            return redirect('wasteRecycled')->with('status','wasteRecycled Details not Updated');
        }
        
    }

    public function destroy($id)
    {
        $key = $id;
        $del_data = $this->database->getReference($this->tablename.'/'.$key)->remove();
        if($del_data)
        {
            return redirect('wasteRecycled')->with('status','Waste Recycled Details has been Deleted Successfully!');
        }
        else
        {
            return redirect('wasteRecycled')->with('status','wasteRecycled Details not Deleted');
        }
    }
}
