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
        
        $userspecs = UserDetails::select('spec')->get();

        $result = array(
            'data' => Spec::select('id', 'title')->get()
        );

        for($i = 0; $i < sizeof($result['data']); $i++){

            if (isset($result['data'][$i]['id'])) {
                $specid = $result['data'][$i]['id'];
            }else{
                $specid = 0;
            }
            
            $specCounts = array();
            foreach ($userspecs as $row) {
                if(isset($row->spec['ru']['sphere'])){
                    $specCounts[] = $row->spec['ru']['sphere'];
                }else{
                    $specCounts[] = '0';
                }
            }
            $countsspec = array_count_values($specCounts);

            $result['data'][$i]['title'] = $result['data'][$i]['title'];

        }

        $rows = $result['data'];
        $specs = $countsspec;

        return view('bashkaruu.spec.index', compact('rows', 'specs'));
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