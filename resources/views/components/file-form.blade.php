<form class="row g-3 w-75 m-auto" method="POST" action={{$action}} enctype="multipart/form-data">
    @csrf

    @if ($name=="Edit")
          
  @method("put")
    @endif

    <x-alert name="success" class="alert-success" />
      {{$slot}}
        <h1>{{$name}} Your File</h1>
        <div class="col-12">
          <label for="title" class="form-label">Title</label>
          <input type="text" @class(['form-control', 'is-invalid' => $errors->has("title")]) id="title" name="title" placeholder="Title" 
          @if ($name=="Edit")
          
          value='{{old("title")??$file->title}}'
          @endif

          
          >
          <x-error-feedback name="title" />
        </div>
 
        <div class="form-floating col-12 my-3">
          <label for="message">Messages</label>
          <textarea @class(['form-control', 'is-invalid' => $errors->has("message")]) placeholder="Leave a message here" id="message" name="message"  style="height: 100px" >   
                  @if ($name=="Edit")
          
            {{old("title")??$file->title}}
            @endif
        </textarea>
          <x-error-feedback name="message" />
        </div>
        <div class="input-group my-3">
          
          <input type="file" @class(['form-control', 'is-invalid' => $errors->has("file")])    id="file" name="file" >
          <label class="input-group-text" for="file" >Upload</label>
          <x-error-feedback name="file" />

          </div>

        <div class="col-12">
          <button type="submit" class="btn btn-primary" >{{$name}}</button>
        </div>


      </form>