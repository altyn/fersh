<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Models\Spec\ModelName as Spec;

class JsonController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function specsjs()
    {
        $rows = Spec::select('id', 'title')->orderBy('id','asc')->get();
        $data=array();
        foreach ($rows as $row) {
            $data[]=array(
                'id'=>$row->id, 
                'text'=>$row->title['ru'],
            );
        }

        return response()->json($data, 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }


}
