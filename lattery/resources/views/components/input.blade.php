<div class="form-group">
    @if($label)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif

    @if($type === 'file')
        <div class="flex">
            <input
                type="{{ $type }}"
                name="{{ $name }}"
                id="{{ $name }}"
                class="form-control @error($name) invalid @enderror"
            >
            
            <img src="{{ asset($value) }}" class="image-preview" style="max-height: 100px;">
        </div>
        
    @else   

    <input class="form-control @error($name) invalid @enderror"
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{$label}}"
    >
    @endif

    @error($name)
        <div class="text-red-500 mt-1">
            {{ $message }}
        </div>
    @enderror
</div>
