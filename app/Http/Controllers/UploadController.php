<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    //
public function index(){
    return view("upload");
}




public function store(FileRequest $request){
   $validated=$request->validated();
   
   
   $path=$validated["file"]->store("/","public");
   
   $validated["path"]=$path;
   
   $file=File::create($validated);
   $link=URL::signedRoute("file.show",["id"=>$file->id]);

$file["size"]=($validated["file"]->getSize()/1000);
$file["type"]=$validated["file"]->getMimeType();

    return $this->show($file->id,true,$link);
}


public function show($id,$delete=false,$link=null){
   $file= File::where("id","=",$id)->first();
if($file==null){
    abort(404);

}

   $file["size"]=(Storage::disk("public")->size( $file->path)/1000); 
   $file["type"]=Storage::disk("public")->mimeType( $file->path);
   $file["download_link"]=$link;
return view("show",["file"=>$file,"link"=>$link,"delete_permission"=>$delete]);
}


function downloadFile($file_path){
    $file = Storage::disk('public')->get($file_path);
$type=Storage::disk("public")->mimeType($file_path);



return Storage::disk("public")->download($file_path,headers:["Content-Type"=>$type]);

}
function destroy($id){
    $file = File::destroy($id);




return redirect()->route("home")->with("success","File deletion completed successfully");

}






}
