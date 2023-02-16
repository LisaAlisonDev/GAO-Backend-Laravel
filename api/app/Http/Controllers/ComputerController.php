<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource with pagination.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $computers = Computer::latest()->paginate(3);
        return response()->json([
            "status" => 200,
            "data" => $computers
        ]);
    }

     /**
     *  Create a new computer data
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50'
        ]);

        $computer = Computer::create([
            'name' => $request->name
        ]);

        return response()->json([
            'message' => "Ce poste à bien été ajouté.", 
            'data'    => $computer], 201);
    }

     /**
     *  
     * @return \Illuminate\Http\Response
     */
    public function show(Computer $computer)
    {
        return response()->json($computer);
    }

   /**
     *  Update a computer data
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Computer $computer)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
        ]);

        if (isset($computer)) {
            $computer->update([
                "name" => $request->name,
            ]);
        }

        return response()->json([
            'message' => "Le nom de ce poste à bien été mise à jour.", 
            'data'    => $computer], 201);
    }

    public function destroy(Computer $computer)
    {
        $computer->delete();
        return response()->json([
            'message' => "Ce poste à bien été supprimé.", 
            'data'    => null] , 204);
    }
}
