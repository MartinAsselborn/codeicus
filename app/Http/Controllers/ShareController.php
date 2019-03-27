<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Share;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shares = Share::all();

        return view('shares.index', compact('shares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('shares.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name'=>'required',
        'cod'=> 'required|integer',
        'stock' => 'required|integer'
      ]);
      $share = new Share([
        'name' => $request->get('name'),
        'cod'=> $request->get('cod'),
        'stock'=> $request->get('stock')
      ]);
      $share->save();
      return redirect('/')->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
         $share = Share::find($id);

        return view('shares.edit', compact('share'));
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
          $request->validate([
            'name'=>'required',
            'cod'=> 'required|integer',
            'stock' => 'required|integer'
          ]);

          $share = Share::find($id);
          $share->name = $request->get('name');
          $share->cod = $request->get('cod');
          $share->stock = $request->get('stock');
          $share->save();

          return redirect('/')->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $share = Share::find($id);
         $share->delete();

         return redirect('/')->with('success', 'Stock has been deleted Successfully');
    }

     /**
     * Show the form for import a JSON.
     *
     * @return \Illuminate\Http\Response
     */

      public function import(Request $request)
    {
        return view('shares.import');
    }


    /**
     * Prepare and send the $collection in format JSON.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function send(Request $request)
    {
        $shares=share::all();
       
        $request->validate([
        'orden'=>'required',
        'inicial'=> 'nullable|integer',
        'cant' => 'nullable|integer',
        'page' => 'nullable|integer'

        ]);

        $orden=$request->get('orden');
        $inicial=$request->get('inicial');
        $cant=$request->get('cant');
        $page=$request->get('page');
        $cant_page=2; //the quantity of product for page
        
        if($orden=="-id")//Order
        {
            $shares = $shares->sortByDesc('id');
        }
        else
        {    
            $shares = $shares->sortBy('id');
        }
        

        $collection=$shares->forPage($inicial-1,$cant); 


        if ($page>0)
        {    
            $npage=$page*$cantpage;
            $collection=$shares->forPage($inicial-1,$cantpage); 
        }

        $JSON=$collection->toJson();

        return redirect('/')->with('success',$JSON); // se puede redirigir a otra pagina desde aca.
    }

  
}
