<?php

namespace App\Http\Controllers\Bash;

use App\Models\Spec\ModelName as Spec;
use App\Http\Controllers\Controller;

class SpecController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('bashkaruu.spec.index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('bashkaruu.spec.create', [
            'row' => new Spec
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $row = Spec::create($request->except('created_at'));
        return redirect()->route('spec.index');

    }

    /**
     * @param Spec $row
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Spec $row)
    {
        return view('bashkaruu.spec.show',[
            'row' => $row
        ]);
    }

    /**
     * @param Translation $row
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Translation $row)
    {
        return view('bashkaruu.spec.edit',[
            'row' => $row
        ]);
    }

    /**
     * @param Request $request
     * @param Spec $row
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Spec $row)
    {
        $row->update($request->all());
        return redirect()->route('spec.show', $row);
    }

    /**
     * @param Spec $row
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Spec $row)
    {
        $row->delete();
        return redirect()->route('spec.index');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function specsjs()
    {
        $rows = Spec::orderBy('id','asc')->get();
//        $data=array();
//        foreach ($rows as $row) {
//            $data[]=array(
//                'id'=>$row->id,
//                'ru'=>$row->ru,
//            );
//        }
//        $result = array(
//            'data' => $data
//        );
        return response()->json($rows, 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

}