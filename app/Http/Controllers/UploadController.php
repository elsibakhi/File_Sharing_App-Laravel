<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    //
public function index(){
    return view("upload");
}




public function store(FileRequest $request){
   $validated=$request->validated();
$link=Str::random(20);
   
$path=$validated["file"]->store("/","public");
$validated["link"]=$link;
$validated["path"]=$path;

$file=File::create($validated);

$file["size"]=($validated["file"]->getSize()/1000);
$file["type"]=$validated["file"]->getMimeType();

    return $this->show($link,true);
}


public function show($link,$delete=false){
   $file= File::where("link","=",$link)->first();
if($file==null){
    abort(404);

}

   $file["size"]=(Storage::disk("public")->size( $file->path)/1000); 
   $file["type"]=Storage::disk("public")->mimeType( $file->path);
   $file["download_link"]=config("app.url")."/".$link;
return view("show",["file"=>$file,"delete_permission"=>$delete]);
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
