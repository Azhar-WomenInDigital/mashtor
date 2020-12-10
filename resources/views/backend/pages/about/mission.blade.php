@extends('backend.layouts.master')
@section('page-title',' Mission ')
@section('page-content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card-box">
                    @include('backend.partials._message')
                    
                    <h3>Create Mission for about us page</h3>
                    <form action="{{url('admin/about/mission/store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <section>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="title">Title</label>
                                <div class="col-lg-10">
                                    <input id="title" name="title" type="text" class="required form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" required="" value="{{old('title')}}" required>
                                </div>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label " for="description">  Description </label>
                                <div class="col-lg-10">
                                    <textarea name="description" id="" cols="10" rows="5" class="form-control" required>{{old('description')}}</textarea>
                                </div>

                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-2 control-label " for="surname1"> Status </label>
                                <div class="col-lg-10">
                                    <select name="status" id="" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-outline-info">Save</button>
                        </section>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-box">
                    <table class="table">
                        <thead>
                            <th>Sl.</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                            @foreach($mission as $data)
                            <?php $i++; ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->description}}</td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#edit{{$data->id}}">Edit</a>




<!-- Modal -->
<div class="modal fade" id="edit{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('admin/about/mission/update',$data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <section>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="title">Title</label>
                                <div class="col-lg-10">
                                    <input id="title" name="title" type="text" class="required form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" required="" value="{{old('title',$data->title)}}" required>
                                </div>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label " for="description">  Description </label>
                                <div class="col-lg-10">
                                    <textarea name="description" id="" cols="10" rows="5" class="form-control" required>{{old('description',$data->description)}}</textarea>
                                </div>

                            </div>
                            
                            <div class="form-group row">
                                <label class="col-lg-2 control-label " for="surname1"> Status </label>
                                <div class="col-lg-10">
                                    <select name="status" id="" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-outline-info">Save</button>
                        </section>
                    </form>
      </div>
    </div>
  </div>
</div>










                                    <a href="{{url('admin/about/mission/destroy',$data->id)}}" onClick="return deleteconfirm();">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<script>
function deleteconfirm()
{
deletedata = confirm("Are you sure to delete permanently?");
if (deletedata != true)
{
return false;
}
}
</script>
@endsection