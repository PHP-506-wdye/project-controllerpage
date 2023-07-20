신고
@foreach ($total as $item)
    {{$item->reporter}}
    {{$item->suspect}}
    <br>
@endforeach