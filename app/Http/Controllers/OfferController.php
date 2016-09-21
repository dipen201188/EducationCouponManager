<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Offer;
use Session;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('offer.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'             => 'required',
            'desc'              => 'required',
            'header'            => 'required',
            'trailer'           => 'required',
            'desc_image'        => 'required',
            'logo'              => 'required',
            'version'           => 'required',
            'expire_date'       => 'required|date',
        ]);


        $input = $request->all();

        $destinationPath = 'upload';

         if($request->hasFile('logo')) {
            /*$logo = $input->input('logo');
            $logo_extension = $logo->getClientOriginalExtension();
            $logoFileName = rand(11111,99999).'.'.$logo_extension;
            $logo->move($destinationPath,$logoFileName);
            $input['logo'] = $logoFileName;*/
            $logo_path = $request->logo->store();
             $input['logo'] = $logo_path;
        }

        if ($request->hasFile('desc_image')) {
            /*$description_image = $input->input('desc_image');
            $extension = $description_image->getClientOriginalExtension();
            $fileName = rand(11112,99999).'.'.$extension;
            $description_image->move($destinationPath,$fileName);
            $input['desc_image'] = $fileName;*/
            $path = $request->desc_image->store('upload');
            $input['desc_image'] = $path;
        }

        Offer::create($input);
        // redirect
        Session::flash('message', 'Successfully created '. $request->title .' business!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('offer.show');
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
