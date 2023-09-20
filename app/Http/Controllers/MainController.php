<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Utils\PaginateCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{

public function index(){

     $files= File::get();


     $number_of_files= (clone $files)->count();

     foreach($files as $file){
         $file["size"]=(Storage::size($file->path)/1000);
         $file["type"]=Storage::mimeType( $file->path);


        
     }



     $files= PaginateCollection::paginate($files,5);


    return view("dashboard",compact("number_of_files","files"));
}


}
