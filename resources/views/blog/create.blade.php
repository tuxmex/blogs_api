@extends('layout')
@section('dashboard-content')
    <h1>Create Blog Post form</h1>
        @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
                <strong>{{Session::get('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::get('failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong>{{Session::get('failed')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif            

        <form action="{{URL::to('store-blog-form')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="inputTitle">Blog Title</label>
              <input type="text" class="form-control" id="inputTitle" 
               placeholder="Enter blog title"
              name="blogTitle">            
            </div>
            
            <div class="form-group">
                <label for="blogDetails">Blog details</label>
                <textarea class="form-control" id="editor1" 
                name="blogDetails"></textarea>           
              </div>

              <div class="form-group">
                <label for="categorySelect">Category</label>
                <select class="form-control" id="categorySelect" 
                name="category">
                <option>Select</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>           
              </div>
              <div>
                <label>Select photo</label>
                <input type="file" name="featurePhoto" class="form-control" />
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
           
          </form>
@stop