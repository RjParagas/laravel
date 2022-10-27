<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class HistoryController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'history';
    }

    public function index()
    {
        $history = $this->database->getReference($this->tablename)->getValue();
        return view ('history.index', compact('history'));
    }

    public function create()
    {
        return view ('history.create');
    }

    public function store(Request $request)
    {
        
        $postData = [
            'date' => $request->date,
            'driver' => $request->driver,
            'remarks' => $request->remarks,
            'userName' => $request->userName,
            'wasteType' => $request->wasteType,
            
        ];
        $postRef = $this->database->getReference($this->tablename)->push($postData);
        if($postRef)
        {
            return redirect('history')->with('status','User Logs Detail added Successfully');
        }
        else
        {
            return redirect('history')->with('status','history Details not added');
        }
        
    }

    public function edit($id)
    {
        $key = $id;
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if($editdata)
        {
            return view ('history.edit', compact('editdata','key'));
        }
        else
        {
            return redirect('history')->with('status','history Details not Found');
        }
        
    }

    public function update(Request $request, $id)
    {
        $key = $id;
        $updateData = [
            'date' => $request->date,
            'driver' => $request->driver,
            'remarks' => $request->remarks,
            'userName' => $request->userName,
            'wasteType' => $request->wasteType,
            
        ];
        $re_updated = $this->database->getReference($this->tablename.'/'.$key)->update($updateData);
        if($re_updated)
        {
            return redirect('history')->with('status','history Details Updated Successfully');
        }
        else
        {
            return redirect('history')->with('status','history Details not Updated');
        }
        
    }

    public function destroy($id)
    {
        $key = $id;
        $del_data = $this->database->getReference($this->tablename.'/'.$key)->remove();
        if($del_data)
        {
            return redirect('history')->with('status','Users History Logs has been Deleted Successfully!');
        }
        else
        {
            return redirect('history')->with('status','history Details not Deleted');
        }
    }
}
