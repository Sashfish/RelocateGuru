<!DOCTYPE html>
<html lang="en">

<fieldset>
  <legend>Create a new tip</legend>
    <div class="form-group">

    <form method="post" action="{{route('tip.create')}}" enctype='multipart/form-data'>
        @csrf
          <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control" name="image"/>
          </div>


      <div class="form-group">
        <label for="title" class="col-lg-2 control-label">Title</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" id="title" placeholder="title" name="title">
        </div>
      </div>

      <div class="form-group">
        <label for="description" class="col-lg-2 control-label">Description</label>
        <div class="col-lg-10">
          <textarea class="form-control" rows="3" placeholder="Describe Tip" id="description" name="description"></textarea>
        </div>
      </div>

      <div class="form-group">
        <label for="">Categories</label>
        <select class="form-control input-sm" name="category" id="category">
          @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="">Cities</label>
        <select class="form-control input-sm" name="city" id="city">
          @foreach($cities as $city)
            <option value="{{$city->id}}">{{$city->name}}     </option>
          @endforeach
        </select>
      </div>


      <div class="form-group">
        <label for="url" class="col-lg-2 control-label">Site URL</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="url" placeholder="url" name="url">
          </div>
        </div>


        <div class="col-1g-10 col-lg-offset-2">
          <button type="reset" class="btn btn-default">Cancel</button>
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
        </form>
      </div>
    </fieldset>
