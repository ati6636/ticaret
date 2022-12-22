<div class="form-check">
    <label class="form-check-label"
           for="{{$field}}">
            {{$label}}
    </label>
    <input class="form-check-input"
           type="checkbox"
           value="1"
           {{$checked ? "checked" : ""}}
           id="{{$field}}"
           name="{{$field}}">
</div>
