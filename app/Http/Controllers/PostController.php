<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class PostController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'post';
    }

    public function index()
    {
        $post = $this->database->getReference($this->tablename)->getValue();
        return view ('post.index', compact('post'));
    }

    public function create()
    {
        return view ('post.create');
    }

    public function store(Request $request)
    {
        
        $postData = [
            'pic' => $request->pic,
            'description' => $request->description,
            'url' => $request->url,
          
            
        ];
        $postRef = $this->database->getReference($this->tablename)->push($postData);
        if($postRef)
        {
            return redirect('post')->with('status','Post Details added Successfully!');
        }
        else
        {
            return redirect('post')->with('status','post Details not added');
        }
        
    }

    public function edit($id)
    {
        $key = $id;
        $editdata = $this->database->getReference($this->tablename)->getChild($key)->getValue();
        if($editdata)
        {
            return view ('post.edit', compact('editdata','key'));
        }
        else
        {
            return redirect('post')->with('status','post Details not Found');
        }
        
    }

    public function update(Request $request, $id)
    {
        $key = $id;
        $updateData = [
            'pic' => $request->pic,
            'description' => $request->description,
            'url' => $request->url,
        
            
        ];
        $re_updated = $this->database->getReference($this->tablename.'/'.$key)->update($updateData);
        if($re_updated)
        {
            return redirect('post')->with('status','Post Details Updated Successfully!');
        }
        else
        {
            return redirect('post')->with('status','post Details not Updated');
        }
    }

    public function destroy($id)
    {
        $key = $id;
        $del_data = $this->database->getReference($this->tablename.'/'.$key)->remove();
        if($del_data)
        {
            return redirect('post')->with('status','Post Details Deleted Successfully!');
        }
        else
        {
            return redirect('post')->with('status','Post Details not Deleted');
        }
    }
}
