

{{ $value }}
<br>
@if ($value ==1)
    Value ialah {{ $value }}
@elseif ($value ==2)
        Value ialah {{ $value }}
@endif
<br>
@switch($value)
    @case(1)
        Value : 1
        @break
    @case(2)
        Value : 2
        @break
    @default
        Value: {{ $value }}
@endswitch
<br>
@isset($value)
    Ada Value
@endisset
<br>
@empty($value)
    Tiada Value
@endempty
