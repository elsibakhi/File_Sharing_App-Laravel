
<x-main-layout name="upload"   path="/dashbord/">

 
       
  <x-file-form name="Edit"   :file="$file" :action="route('files.update',$file->id)">

   @if ($file->download_link!=null)

         <input type="text" id="copyTarget" class="form-control w-100 my-3" value='{{$file->download_link}}' readonly>
    
             
       
          @endif
  </x-file-form>




</x-main-layout>


