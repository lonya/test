<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\topic;

use App\block;
class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $block = new block;
        $topics=Topic::pluck('topicname','id');
        return view('block.create',array('block'=>$block, 'topics'=>$topics, 'page'=>'Add Block'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fname=$request->file('imagepath');
        if($fname!=null)
        {
            $originalname=$request->file('imagepath')->getClientOriginalName();
            $request->file('imagepath')->move(public_path().'/img', $originalname);
        }
        $b=new Block();
        $b->title=$request->title;
        $b->topicid=$request->topicid;
        $b->content=$request->content;
        if($fname !=null)
            $b->imagePath='/img/'.$originalname;
        else
            $b->imagePath='';

        if(!$b->save())
        {
            $err=$t->getErrors();
            return redirect()->action('BlockController@create')->with('errors', $err)->withInput();
        }
        return redirect()->action('BlockController@create')->with('message', 'New block '.$b->title.' has been added with id='.$b->id.'!')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @re turn \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
