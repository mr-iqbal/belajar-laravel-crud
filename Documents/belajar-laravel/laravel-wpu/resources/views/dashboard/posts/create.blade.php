@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Posts</h1>
    </div>
    <div class="col-lg-5">
        <form method="POST" action="/dashboard/posts" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required autofocus >
              @error('title')
                <div class="invalid-feedback">
                  {{ $message }} 
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"  value="{{ old('slug') }}" readonly required>
              @error('slug')
                <div class="invalid-feedback">
                  {{ $message }} 
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select @error('category') is-invalid @enderror" name="category_id" value="{{ old('category') }}" required>
              <option selected>-- Select Category --</option>
              @foreach ($categories as $category)   
                  @if (old('category_id') == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                  @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endif
                @endforeach
              </select>
              @error('category')
                <div class="invalid-feedback">
                  {{ $message }} 
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="image" class="form-label">Post Image</label>
              <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-7">
              <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
              @error('image')
                  <div class="invalid-feedback">
                    {{ $message }} 
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="body" class="form-label">Body</label>
              <input id="body" type="hidden" name="body" class="@error('body') is-invalid @enderror" value="{{ old('body') }}" required>
              <trix-editor input="body"></trix-editor>
              @error('body')
                <div class="invalid-feedback">
                  {{ $message }} 
                </div>
              @enderror
            </div>
            
            <button type="submit" class="btn btn-primary mb-4">Create Post</button>
        </form>
    </div>

<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function(){
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });

  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  });

  //untuk preview image ketika di upload
  function previewImage(){

    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display= 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function (oFREvent){
      imgPreview.src = oFREvent.target.result; 
    }
}
</script>
@endsection