@extends('index')



@section('content')



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
                    <textarea class="form-control" name="body"  placeholder="{{$post -> body}} " ></textarea>
                 
                  </div>

                    </div>
                     <div class="col-sm-4" style="margin-bottom:20px;">
                      <label class="btn-bs-file btn btn-primary">
                        add image
                       <input type="file" name='images[]' multiple>
                      </label>
                     </div>
                    <div class="col-sm-4" style="margin-bottom:20px;">
                      <label class="btn-bs-file btn btn-primary">
                        add file
                       <input type="file" name='file'>
                      </label>
                  
                    </div>

                  <button type="submit" class="btn btn-danger">Submit</button>


                 
                </form>
              

@endsection
