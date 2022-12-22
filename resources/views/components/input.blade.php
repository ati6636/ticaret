<label for="{{$field}}" class="form-label">{{$label}}</label>
<input type="{{$type}}" class="form-control"
       id="{{$field}}"
       name="{{$field}}"
       value="{{old("$field", "$value")}}"
       placeholder="{{$placeholder}}">
@error("$field")
<span class="text-bg-danger">{{$message}}</span>
@enderror
