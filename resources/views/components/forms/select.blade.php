<div class="form-group">
    <label for="{{$id}}"> {{ $label }} <span class="mandetory">{{ $mandate }}</span></label>
    <select id="{{$id}}" class="form-control {{$class}}" name="{{$name}}" {{ $attributes }} >
        <option value="" disabled selected>Select Categoty</option>
        @if(!empty($options[0]))
            @foreach($options[0] as $option)
                <option value="{{ $option['id'] }}">{{ $option['name'] }}</option>
            @endforeach
        @endif
    </select>
    @error($name)
        <span class="error invalid-feedback">{{$message}}</span>
    @enderror
</div>