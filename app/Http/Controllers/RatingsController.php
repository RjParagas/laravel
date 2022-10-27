<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class RatingsController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'ratings';
    }

    public function index()
    {
        $ratings = $this->database->getReference($this->tablename)->getValue();
        return view ('ratings.index', compact('ratings'));
    }

    public function create()
    {
        return view ('ratings.create');
    }

    public function store(Request $request)
    {
        
        $postData = [
            'comment' => $request->comment,
            'haulerName' => $request->haulerName,
            'ratingReview' => $request->ratingReview,
            'date_created' => $request->date_created,
         
            
        ];
        $postRef = $this->database->getReference($this->tablename)->push($postData);
        if($postRef)
        {
            return redirect('ratings')->with('status','ratings Details added Successfully');
        }
        else
        {
            return redirect('ratings')->with('status','ratings Details not added');
        }
        
    }

    public function edit($id)
    {
        $key = $id;
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if($editdata)
        {
            return view ('ratings.edit', compact('editdata','key'));
        }
        else
        {
            return redirect('ratings')->with('status','ratings Details not Found');
        }
        
    }

    public function update(Request $request, $id)
    {
        $key = $id;
        $updateData = [
           
            'comment' => $request->comment,
            'haulerName' => $request->haulerName,
            'ratingReview' => $request->ratingReview,
            'date_created' => $request->date_created,
            
        ];
        $re_updated = $this->database->getReference($this->tablename.'/'.$key)->update($updateData);
        if($re_updated)
        {
            return redirect('ratings')->with('status','ratings Details Updated Successfully');
        }
        else
        {
            return redirect('ratings')->with('status','ratings Details not Updated');
        }
        
    }

    public function destroy($id)
    {
        $key = $id;
        $del_data = $this->database->getReference($this->tablename.'/'.$key)->remove();
        if($del_data)
        {
            return redirect('ratings')->with('status','Rating Details has been Deleted Successfully');
        }
        else
        {
            return redirect('ratings')->with('status','ratings Details not Deleted');
        }
    }
}
