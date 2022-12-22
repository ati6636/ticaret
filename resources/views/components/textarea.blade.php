<div class="col-md-12 mb-3">
    <label for="{{$field}}" class="form-label">{{$label}}</label>
    <textarea name="{{$field}}" class="form-control"
              id="{{$field}}" cols="5" rows="10"
              placeholder="{{$placeholder}}">{{old("$field","$value")}}
    </textarea>
    @error("$field")
    <span class="text-bg-danger">{{$message}}</span>
    @enderror

</div>
