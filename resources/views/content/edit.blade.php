@extends('index')

@section('content')


<div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Wall</h3>
              </div>
              <div class="panel-body">
                <form method="POST" action="{{url('home/'.$post -> id)}}"  enctype="multipart/form-data">
                      {{ csrf_field () }}
                       <input type="hidden" name="_method" value="PUT">
                  <div class="form-group">
                      <label for="title">Title:</label>
                       <input type="text" class="form-control" name="title" placeholder="add titel" value="{{$post -> title}}">
                  </div>
                 <div class="form-group">
                      <label for="title">body:</label>
                       <input type="text" class="form-control" name="body" placeholder="add titel" value="{{$post -> body}}" rows="7">
                  </div>
                  
                  <button type="submit" class="btn btn-danger">Submit</button>


                  <div class="pull-right">
                    <div class="btn-group">
                    <button type="button" class="btn btn-default"><i class="fa fa-pencil" aria-hidden="true"></i> Text</button>
                    <button type="button" class="btn btn-default"><i class="fa fa-file-image-o" aria-hidden="true"></i> Image</button>
                    <button type="button" class="btn btn-default"><i class="fa fa-file-video-o" aria-hidden="true"></i> Video</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div>
     </div>
  </div>

@endsection