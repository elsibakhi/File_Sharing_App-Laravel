<x-main-layout name="show">

    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            File Details
          </div>
          <div class="card-body">

            <p><strong>File Title:</strong> {{$file->title}} </p>
            <p><strong>File Message:</strong>  {{$file->message}}</p>
            <p><strong>File Size:</strong> {{$file->size}} KB </p>
            <p><strong>File Type:</strong>  {{$file->type}}</p>
            <a href={{route("file.download",$file->path)}} class="btn btn-primary">Download File</a>
            @if ($delete_permission==true)
                
            <x-delete-btn action='{{route("file.delete",$file->id)}}' />
            @endif
            <div class="container">
              <div class="input-group">
         
                <span id="copyButton" class="input-group-addon btn" title="Click to copy">
                Copy
                </span>
                <input type="text" id="copyTarget" class="form-control" value={{$file->download_link}} readonly>
                <span class="copied">Copied !</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


</x-main-layout>


