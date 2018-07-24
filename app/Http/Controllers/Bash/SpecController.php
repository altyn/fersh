<?php

namespace App\Http\Controllers\Bash;

use App\Models\Spec\ModelName as Spec;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

use App\Models\UserDetails\ModelName as UserDetails;

class SpecController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $users = UserDetails::get();
        $rows = Spec::select('id', 'title')->get();

        return view('bashkaruu.spec.index', compact('rows', 'users'));
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
        $validatedData = $request->validate([
            'title.ru' => 'required'
        ]);

        Spec::create($validatedData);

        session()->flash(
            'message', "Your spec has now been published!"
        );
        return redirect()->route('spec.index');

    }

    /**
     * @param Spec $row
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $row = Spec::findOrFail($id);

        $users = UserDetails::where('spec->ru->sphere', $id)->get();
        // dd($users);
        return view('bashkaruu.spec.show', compact('row', 'users'));
    }

    /**
     * @param Translation $row
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $row = Spec::findOrFail($id);
        return view('bashkaruu.spec.edit',[
            'row' => $row
        ]);
    }

    /**
     * @param Request $request
     * @param Spec $row
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $row = Spec::findOrFail($id);
        $row->update($request->except('created_at'));

        return redirect()->route('spec.show', $row);
    }

    /**
     * @param Spec $row
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $spec = Spec::findOrFail($id);
        $spec->delete();

        return redirect()->route('spec.index');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function specsjs()
    {
        $rows = Spec::select('id', 'title')->orderBy('id','asc')->get();
        return response()->json($rows, 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

}