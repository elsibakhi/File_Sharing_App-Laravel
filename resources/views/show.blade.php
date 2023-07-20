<x-main-layout name="show">

    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            File Details
          </div>
          <div class="card-body">
            <?php
              // Replace this with your PHP code to fetch file details
              $fileName = "example-file.txt";
              $fileSize = "2.3 MB";
              $downloadLink = "https://yourdomain.com/uploads/example-file.txt";
            ?>
            <p><strong>File Title:</strong> {{$file->title}} </p>
            <p><strong>File Message:</strong>  {{$file->message}}</p>
            <p><strong>File Size:</strong> {{$file->size}} KB </p>
            <p><strong>File Type:</strong>  {{$file->type}}</p>
            <a href={{route("file.download",$file->path)}} class="btn btn-primary">Download File</a>
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


