<?php

namespace App\Http\Controllers\Bash;

use App\Models\Blog\ModelName as Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
{


    public function index()
    {
        
        $rows = Blog::get();

        return view('bashkaruu.blog.index', compact('rows'));
    }

    public function create()
    {
        return view('bashkaruu.blog.create', [
            'row' => new Blog
        ]);
    }

    public function store(Request $request)
    {
        $row = Blog::create($request->except('thumbnail'));

        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $dir  = 'img/blog/'.$row->id.'/'.'thumbnail/';

            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            $btw = time();

            $name = $btw.uniqid().'.'.$file->getClientOriginalExtension();
            $name2 = $btw.uniqid().'_big.'.$file->getClientOriginalExtension();

            Image::make($file)->fit(350, 220)->save($dir.$name);
            Image::make($file)->fit(825, 550)->save($dir.$name2);


            $thumbnail['small'] = $dir.$name;
            $thumbnail['big'] = $dir.$name2;

            $row->thumbnail = $thumbnail;
            $row->save();
        }

        return redirect()->route('blog.index')->withSuccess('Публикация добавлено');

    }

    public function show($id)
    {
        $row = Blog::findOrFail($id);

        return view('bashkaruu.blog.show', compact('row'));
    }

    public function edit($id)
    {
        $row = BLog::findOrFail($id);
        return view('bashkaruu.blog.edit',[
            'row' => $row
        ]);
    }

    public function update(Request $request, $id)
    {
        $row = Blog::findOrFail($id);
        $row->update($request->except('created_at'));

        return redirect()->route('blog.show', $row);
    }

    public function destroy($id)
    {
        $spec = Blog::findOrFail($id);
        $spec->delete();

        return redirect()->route('blog.index');
    }

    public function blogssjs()
    {
        $rows = Blog::select('id', 'title')->orderBy('id','asc')->get();
        return response()->json($rows, 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

    public function uploadfiles(Request $request)
    {
        $file = $request->file('file');

        if($file){
             $dir  = 'img/blog/uploads';
            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            $btw = time();
            $name = $btw.'.'.$file->getClientOriginalExtension();

            Image::make($file)->save($dir.'/'.$name);

            // Generate response.
            $response = [
                'link' => "/".$dir.'/'.$name,
                'file_name' => $name
            ];
            return response()->json($response, 201);
        } else {
            return 0;
        }
    }

}