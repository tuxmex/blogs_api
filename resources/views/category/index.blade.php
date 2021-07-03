@extends('layout')
@section('dashboard-content')
@if (Session::get('success'))
<div class="alert alert-danger alert-dismissible fade show" role="alert" id="gone">
    <strong>{{Session::get('deleted')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (Session::get('delete-failed'))
<div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
<strong>{{Session::get('failed')}}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif
    <div id="content-wrapper">
     <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Category List</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Category Name</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Category Name</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     @foreach ($categories as $category)  
                    <tr>
                      <td> {{$category->name}}<br /></td>
                      <td>
                          <a href="{{URL::to('edit-category')}}/{{$category->id}}" class="btn btn-outline-primary btn-sm">Edit</a>
                          |
                          <a href="{{URL::to('delete-category')}}/{{$category->id}}" 
                            class="btn btn-outline-danger btn-sm"
                            onclick="return checkDelete();"
                            >Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
<script>
    function checkDelete(){
        var check = confirm('Are you sure you want DELETE this?');
        if(check){
            return true;
        }
        return false;
    }

</script>

         

   
       
    
@stop