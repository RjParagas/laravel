<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class ReportController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'report';
    }

    public function index()
    {
        $report = $this->database->getReference($this->tablename)->getValue();
        return view ('report.index', compact('report'));
    }

    public function create()
    {
        return view ('report.create');
    }

    public function store(Request $request)
    {
        
        $postData = [
            'userName' => $request->userName,
            'report' => $request->report,
            'date_created' => $request->date_created,
            
            
        ];
        $postRef = $this->database->getReference($this->tablename)->push($postData);
        if($postRef)
        {
            return redirect('report')->with('status','Report Details added Successfully');
        }
        else
        {
            return redirect('report')->with('status','Report Details not added');
        }
        
    }

    public function edit($id)
    {
        $key = $id;
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if($editdata)
        {
            return view ('report.edit', compact('editdata','key'));
        }
        else
        {
            return redirect('report')->with('status','Report Details not Found');
        }
        
    }

    public function update(Request $request, $id)
    {
        $key = $id;
        $updateData = [
            'name' => $request->name,
            'report' => $request->report,
            'date_created' => $request->date_created,
            
            
        ];
        $re_updated = $this->database->getReference($this->tablename.'/'.$key)->update($updateData);
        if($re_updated)
        {
            return redirect('report')->with('status','report Details Updated Successfully');
        }
        else
        {
            return redirect('report')->with('status','report Details not Updated');
        }
        
    }

    public function destroy($id)
    {
        $key = $id;
        $del_data = $this->database->getReference($this->tablename.'/'.$key)->remove();
        if($del_data)
        {
            return redirect('report')->with('status','Report Details has been Deleted Successfully!');
        }
        else
        {
            return redirect('report')->with('status','report Details not Deleted');
        }
    }
}
