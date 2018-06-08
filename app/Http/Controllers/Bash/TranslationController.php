<?php

namespace App\Http\Controllers\Bash;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Translation\ModelName as Translation;

class TranslationController extends Controller
{

    public function index()
    {
        return view('bashkaruu.translations.index');
    }

    public function create()
    {
        return view('bashkaruu.translations.create', [
            'row' => new Translation
        ]);
    }

	public function store(Request $request)
    {
        $row = Translation::create($request->except('created_at'));

        return redirect()->route('translations.index');

    }

    public function show(Translation $row)
    {
        return view('bashkaruu.translations.show',[
            'row' => $row
        ]);
    }
    public function edit(Translation $row)
    {
        return view('bashkaruu.translations.edit',[
            'row' => $row
        ]);
    }

	public function update(Request $request, Translation $row)
    {
        $row->update($request->all());

        return redirect()->route('translations.show', $row);
    }
    public function destroy(Translation $row)
    {
        $row->delete();
        return redirect()->route('translations.index');
    }

    public function translationsjs()
    {
        $rows = Translation::orderBy('id','asc')->get();
        $data=array();
        foreach ($rows as $row) {
            $data[]=array(
                'id'=>$row->id, 
                'key'=>$row->key,
                'ky'=>$row->ky,
                'ru'=>$row->ru,
                'en'=>$row->en
            );
        }
        $result = array(
            'data' => $data
        );
        return response()->json($result, 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }
}
