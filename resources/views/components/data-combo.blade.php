<div class="form-group">
    <label>{{ $label ?? 'Label' }}</label>
    <select class="form-control selectric" name="{{ $name ?? 'name' }}">
        @if ($blank ?? '')
            @if(in_array($blank['label'], $selected ?? array()))
                <option value="{{$blank['value']}}" selected>{{ $blank['label'] }}</option>
            @else
                <option value="{{$blank['value']}}">{{ $blank['label'] }}</option>
            @endif
        @endif
        @foreach($data as $row)
            @if(in_array($row['id'], $selected ?? array()))
                <option value="{{ $row['id'] }}" selected>{{ $row['name'] }}</option>
            @else
                <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
            @endif
        @endforeach
    </select>
</div>