<x-main-layout name="show"  path="/dashbord/">

    <div class="row justify-content-center w-100">
      <div class="  col-sm-10 col-md-6  mx-auto">
        <div class="card border mt-5 mx-auto">
          <div class="card-header">
            File Details
          </div>
          <div class="card-body ">

            <p><strong>File Title:</strong> {{$file->title}} </p>
            <p><strong>File Message:</strong>  {{$file->message}}</p>
            <p><strong>File Size:</strong> {{$file->size}} KB </p>
            <p><strong>File Type:</strong>  {{$file->type}}</p>
            <a href={{route("files.download",$file->id)}} class="btn btn-primary">Download File</a>
     
            <div class="container">
              <div class="input-group my-4">
         @if ($file->download_link!=null)
         <span id="copyButton" class="input-group-addon btn btn-dark" style="border-top-right-radius:0; border-bottom-right-radius:0; " title="Click to copy">
         Copy
         </span>
         <input type="text" id="copyTarget" class="form-control" value='{{$file->download_link}}' readonly>
    
             
         @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


</x-main-layout>


