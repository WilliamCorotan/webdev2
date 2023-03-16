<?php

namespace App\Http\Controllers;

use App\Models\Footwear;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FootwearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('listings.index', [
            "listings" => Footwear::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        $formFields = $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'type' => 'required|in:running,basketball,casual',
            'color' => 'required|in:black,gray,white,red,blue',
            'price' => 'required',
            'description' => 'required',
            'product_preview' => 'required'
        ]);

        if($request->hasFile('product_preview')) {
            $formFields['product_preview'] = $request->file('product_preview')->store('product_preview', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Footwear::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Footwear $footwear)
    {
        return view('listings.show', [
            'listing' => $footwear
        ]);
    }


    //manage Products
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->footwear()->get()]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Footwear $footwear)
    {
        return view('listings.edit', ['listing' => $footwear]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Footwear $footwear)
    {
            //Make sure logged in user is owner
            if($footwear->user_id !=auth()->id()) {
                abort(403, 'Unauthorized Action');
            }
            
            
            $formFields = $request->validate([
                'name' => 'required',
                'brand' => 'required',
                'type' => 'required|in:running,basketball,casual',
                'color' => 'required|in:black,gray,white,red,blue',
                'price' => 'required',
                'description' => 'required',
                
            ]);
            
            if(!$request->hasFile('product_preview')){
                $formFields['product_preview'] = $footwear->product_preview;
            }
            else{

                if($request->hasFile('product_preview')) {
                    $formFields['product_preview'] = $request->file('product_preview')->store('product_preview', 'public');
                }
            }
    
            $footwear->update($formFields);
    
            return back()->with('message', 'Listing updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Footwear $footwear)
    {
            //Make sure logged in user is owner
            if($footwear->user_id !=auth()->id()) {
                abort(403, 'Unauthorized Action');
            }
    
            $footwear->delete();
            return redirect('/')->with('message', 'Listing deleted successfully!');  
    }
}
