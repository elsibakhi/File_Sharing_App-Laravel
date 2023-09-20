<?php

namespace App\Http\Controllers;

use App\Events\UserDownload;
use App\Http\Requests\CreateFileRequest;
use App\Http\Requests\FileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\File;
use App\Models\Scopes\UserFileScope;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    //
public function create(){
    return view("files.create");
}


public function edit (File $file){
        $file["download_link"] = URL::signedRoute("files.show", ["file" => $file->id]);

    return view("files.edit",compact("file"));
}

public function store(CreateFileRequest $request){
    // dd($request->file);
   $validated=$request->validated();

//    foreach()
   $path=$validated["file"]->store("/");

   $validated["path"]=$path;
   $validated["user_id"]=Auth::id();

   $file=File::create($validated);
   $link=URL::signedRoute("files.show",["file"=>$file->id]);

$file["size"]=($validated["file"]->getSize()/1000);
$file["type"]=$validated["file"]->getMimeType();

    return $this->show($file->id,true,$link);
}
public function update(UpdateFileRequest $request,File $file){
   $validated=$request->validated();

   if($request->hasFile("file")){

       $path=$validated["file"]->store("/");
       $validated["path"]=$path;
    }



    $file->update($validated);

        if ($request->hasFile("file")) {
            $file["size"] = ($validated["file"]->getSize() / 1000);
            $file["type"] = $validated["file"]->getMimeType();
        }

   $link=URL::signedRoute("files.show",["file"=>$file->id]);


    return $this->show($file->id,true,$link);
}


public function show($id,$delete=false,$link=null){

   $file= File::withoutGlobalScope(UserFileScope::class)->find($id);

if($file==null){
    abort(404);

}



   $file["size"]=(Storage::size( $file->path)/1000);
   $file["type"]=Storage::mimeType( $file->path);
   $file["download_link"]=$link;
return view("files.show",["file"=>$file,"link"=>$link,"delete_permission"=>$delete]);
}


function downloadFile(Request $request,$id){
 $file = File::withoutGlobalScope(UserFileScope::class)->find($id);
$type=Storage::mimeType($file->path);


      event(new UserDownload($file, $request));

return Storage::download($file->path,headers:["Content-Type"=>$type]);

}
function destroy(File $file){
    $file->delete();




return back()->with("success","File deletion completed successfully");

}






}
