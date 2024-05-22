@extends('layout.admin')

@section('section')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Create a new Post </h3>

      </div>
      <div class="row">
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        
        <p class="card-description"> Basic form elements </p>
        <form class="forms-sample" method="POST" action="{{route('admin.post.store')}}" enctype="multipart/form-data">
          @csrf
          <input type="text" hidden value="{{Auth::user()->id}}" name="user_id">
          <div class="form-group">
            <label for="exampleInputName1">Title</label>
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="title" value="{{old('title')}}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
         
       <div class="form-group">
            <label for="exampleInputEmail3">Categories</label>
            <select name="categories" id="" class="form-control">
              <option disabled selected >Choose Option</option>
              @if (count($categorie)>0)
                @foreach ($categorie as $item)
                    
                <option @selected(old('categories')==$item->id) value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              @endif
             
            </select>
            @error('categories')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Published</label>
            <select name="is_publish" id="" class="form-control" >
              <option disabled selected >Choose Option</option>
              <option @selected(old('is_publish')==0) value="0">Draft</option>
              <option @selected(old('is_publish')==1) value="1">Public</option>
              
            </select>
          </div>
         
         
          <div class="form-group">
            <label>Image upload</label>
            <input type="file" name="img" class="form-control" value="{{old('img')}}">
            
          </div>
          
          <div class="form-group">
            <label for="exampleTextarea1">Description</label>
            <textarea class="form-control" id="exampleTextarea1" rows="10" name="description" value="{{old('description')}}"></textarea>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
</div>
  </div>
@endsection