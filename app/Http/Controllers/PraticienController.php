<?php
use App\Models\Praticien;

class PraticienController extends Controller
{
    public function index()
    {
        return Praticien::all();
    }

    public function store(Request $request)
    {
        return Praticien::create($request->all());
    }

    public function show($id)
    {
        return Praticien::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $praticien = Praticien::findOrFail($id);
        $praticien->update($request->all());
        return $praticien;
    }

    public function destroy($id)
    {
        $praticien = Praticien::findOrFail($id);
        $praticien->delete();
        return 204; // No Content
    }
}
