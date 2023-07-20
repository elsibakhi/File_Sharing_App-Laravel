
<x-main-layout name="upload">

    <form class="row g-3 w-75 m-auto" method="POST" action={{route("file.store")}} enctype="multipart/form-data">
        @csrf
      
        <h1>Upload Your File</h1>
        <div class="col-12">
          <label for="title" class="form-label">Title</label>
          <input type="text" @class(['form-control', 'is-invalid' => $errors->has("title")]) id="title" name="title" placeholder="Title" >
          <x-error-feedback name="file" />
        </div>
 
        <div class="form-floating col-12">
            <textarea @class(['form-control', 'is-invalid' => $errors->has("message")]) placeholder="Leave a message here" id="message" name="message"  style="height: 100px"></textarea>
            <label for="message">Messages</label>
            <x-error-feedback name="file" />
          </div>
          <div class="input-group mb-3">
            <input type="file" @class(['form-control', 'is-invalid' => $errors->has("file")]) id="file" name="file">
            <label class="input-group-text" for="file" >Upload</label>
              <x-error-feedback name="file" />
          </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary" >Save</button>
        </div>
      </form>




</x-main-layout>


