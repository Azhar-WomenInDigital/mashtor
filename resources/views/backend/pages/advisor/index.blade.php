@extends('backend.layouts.master')
@section('page-title',' ADVISORY  TEAM ')
@section('page-content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card-box">
                    @include('backend.partials._message')
                    
                    <h3>CREATE ADVISORY  TEAM</h3>
                    <form action="{{route('advisor.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <section>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="name">Name</label>
                                <div class="col-lg-10">
                                    <input id="name" name="name" type="text" class="required form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required="" value="{{old('name')}}" required>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="position">Position</label>
                                <div class="col-lg-10">
                                    <input id="position" name="position" type="text" class="required form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" required="" value="{{old('position')}}" required>
                                </div>
                                @if ($errors->has('position'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="institute">Institute</label>
                                <div class="col-lg-10">
                                    <input id="institute" name="institute" type="text" class="required form-control {{ $errors->has('institute') ? ' is-invalid' : '' }}" required="" value="{{old('institute')}}" required>
                                </div>
                                @if ($errors->has('institute'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('institute') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="country">Country</label>
                                <div class="col-lg-10">
                                    <input id="country" name="country" type="text" class="required form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" required="" value="{{old('country')}}" required>
                                </div>
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="image">Upload Image</label>
                                <div class="col-lg-10">
                                    <input id="image" name="image" type="file" class="required form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" required="" value="{{old('image')}}" required>
                                </div>
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
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
                            <th>Name</th>
                            <th>Position</th>
                            <th>Institute</th>
                            <th>Country</th>
                            <th>image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php $i=0;?>
                            @foreach($teams as $team)
                            <?php $i++; ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$team->name}}</td>
                                <td>{{$team->position}}</td>
                                <td>{{$team->institute}}</td>
                                <td>{{$team->country}}</td>
                                <td>
                                    <?php echo "<img src='".asset($team->image)."' style='height:50px;width:50px;'>";?>
                                </td>
                                <td>{{$team->status}}</td>
                                <td>
                                   <a href="#" class="btn btn-info" data-toggle="modal" data-target="#team{{$team->id}}"> <i class="ion-edit"></i></a>
                                    
                                    
                                    <!-- Modal -->
<div class="modal fade" id="team{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('advisor.update',$team->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        
                        <section>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="name">Name</label>
                                <div class="col-lg-10">
                                    <input id="name" name="name" type="text" class="required form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required="" value="{{old('name',$team->name)}}" required>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="position">Position</label>
                                <div class="col-lg-10">
                                    <input id="position" name="position" type="text" class="required form-control {{ $errors->has('position') ? ' is-invalid' : '' }}" required="" value="{{old('position',$team->position)}}" required>
                                </div>
                                @if ($errors->has('position'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('position') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="institute">Institute</label>
                                <div class="col-lg-10">
                                    <input id="institute" name="institute" type="text" class="required form-control {{ $errors->has('institute') ? ' is-invalid' : '' }}" required="" value="{{old('institute',$team->institute)}}" required>
                                </div>
                                @if ($errors->has('institute'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('institute') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="country">Country</label>
                                <div class="col-lg-10">
                                    <input id="country" name="country" type="text" class="required form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" required="" value="{{old('country',$team->country)}}" required>
                                </div>
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 control-label" for="image">Upload Image</label>
                                <div class="col-lg-10">
                                    <input id="image" name="image" type="file" class="required form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" required="" value="{{old('image')}}">
                                </div>
                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
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
                            
                            <button type="submit" class="btn btn-outline-info">Update</button>
                        </section>
                    </form>
      </div>
    </div>
  </div>
</div>



                                <form action="{{route('advisor.destroy',$team->id)}}" method="POST" style="display: inline-block;">
                                    @method('DELETE')
                                    {{csrf_field()}}
                                    
                                    
                                    <button type="" class="btn btn-outline-danger" onClick="return deleteconfirm();"><i class="zmdi zmdi-delete"></i>
                                    </button>
                                </form>
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