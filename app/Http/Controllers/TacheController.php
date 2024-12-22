<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tache;
use App\Models\Employe;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $taches = Tache::all();
        return view(
            'tache.index',
            compact('taches')
        );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    {
        $employes = Employe::all();
        return view('tache.create', compact('employes'));
    }
    /**
     * Store a newly created resource in storage. *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {
        $request->validate([
            'intituléTache' => 'required',
            'date_tache' => 'required',
            'Num_Employe' => 'required',

        ]);
        $tache = new Tache();
        $tache->intituléTache = $request->input('intituléTache');
        $tache->date_tache = $request->input('date_tache');
        $tache->Num_Employe = $request->input('Num_Employe');

        $tache->save();
        return redirect('/tache')->with('success', 'tache Ajouté avec succès');
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */ 
    public function show($id)
    {
        $tache1 = Tache::find($id);
        // $personnage = Personnage::findOrFail($id);
        // return view('personnage.show', compact('personnage')); 
        return view('tache.show', ['tache' => $tache1]);
    }

    /**
     * Show the form for editing the specified resource. *
     * @param int $id
     * @return \Illuminate\Http\Response
     */ 
    public function edit($id)
    {
        $employes = Employe::all();

        $tache = Tache::findOrFail($id);
        return view(
            'tache.edit',
            compact('tache'),
            compact('employes')
        );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'intituléTache' => 'required',
            'date_tache' => 'required',
            'Num_Employe' => 'required',
        ]);


        $tache1 = Tache::findOrFail($id);
        $tache1->intituléTache = $request->get('intituléTache');
        $tache1->date_tache = $request->get('date_tache');
        $tache1->Num_Employe = $request->get('Num_Employe');

        $tache1->update();
        return redirect('/tache')->with('success', 'tache Modifié avec succès');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */ 
    public function destroy($id)
    {
        $tach = Tache::findOrFail($id);
        $tach->delete();
        return redirect('/tache')->with('success', 'la tache a été supprimé avec succès');
    }
}
