<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //

    public function store(Request $request)
    {
        //$validator = Validator::make($request->all(), $this->rules());

        //$id = JWTAuth::user()->id;

        //if ($validator->fails()) {
           // return response()->json($validator->messages(), 422);
        //}else{
            $siswa = new Siswa();
            $siswa->fill($request->toArray());
            $siswa->save();
            return response()->json(array('status'=>'success'), 201);
        //}
    }

    public function index()
    {
        return response()->json(['data'=>Siswa::all()]);
    }

    public function show($id)
    {
        return response()->json(['data'=>Siswa::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::query()->findOrFail($id);
        $siswa->update($request->all());

        return response()->json(['data'=>Siswa::find($id)]);
    }

    public function destroy(Request $request, $id)
    {
        $siswa = Siswa::query()->findOrFail($id);
        $siswa->delete();
        // return 204;
        return response()->json(['status'=>'sukses'], 204);
    }
}
