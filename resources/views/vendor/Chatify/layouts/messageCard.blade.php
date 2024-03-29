{{-- -------------------- The default card (white) -------------------- --}}
@if($viewType == 'default')
@if($from_id != $to_id)
<div class="message-card" data-id="{{ $id }}">
    @if($broadcast_message_id == null)
    <p>{!! ($message == null && $attachment != null && @$attachment[2] != 'file') ? $attachment[1] : nl2br($message) !!}
        <sub title="{{ $fullTime }}">{{ $time }}</sub>
        {{-- If attachment is a file --}}
        @if(@$attachment[2] == 'file')
        <a href="{{ route(config('chatify.attachments.download_route_name'),['fileName'=>$attachment[0]]) }}" style="color: #595959;" class="file-download">
            <span class="fas fa-file"></span> {{$attachment[1]}}</a>
        @endif
    </p>
    @else
    <p style="background: #1f2cea;color: #fff">{!! ($message == null && $attachment != null && @$attachment[2] != 'file') ? $attachment[1] : nl2br('Question : '.$message) !!}
        <sub title="{{ $fullTime }}">{{ $time }}</sub>
        {{-- If attachment is a file --}}
        @if(@$attachment[2] == 'file')
        <a href="{{ route(config('chatify.attachments.download_route_name'),['fileName'=>$attachment[0]]) }}" style="color: #595959;" class="file-download">
            <span class="fas fa-file"></span> {{$attachment[1]}}</a>
        @endif
    </p>
    @endif
</div>
{{-- If attachment is an image --}}
@if(@$attachment[2] == 'image')
<div>
    <div class="message-card">
        <div class="image-file chat-image" style="width: 250px; height: 150px;background-image: url('{{ asset('storage/'.config('chatify.attachments.folder').'/'.$attachment[0]) }}')">
        </div>
    </div>
</div>
@endif
@endif
@endif

{{-- -------------------- Sender card (owner) -------------------- --}}
@if($viewType == 'sender')
<div class="message-card mc-sender" data-id="{{ $id }}">
    <div class="dropdown">
        <a class="three-dots" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-three-dots"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a onclick="deleteMessage({{$id}})" class="dropdown-item" data-id="{{ $id }}" href="#">Supprimer ce message</a></li>
        </ul>
    </div>
    <p class="context-menu-delete ">{!! ($message == null && $attachment != null && @$attachment[2] != 'file') ? $attachment[1] : nl2br($message) !!}
        <sub title="{{ $fullTime }}" class="message-time">
            <span class="fas fa-{{ $seen > 0 ? 'check-double' : 'check' }} seen"></span> {{ $time }}</sub>
        {{-- If attachment is a file --}}
        @if(@$attachment[2] == 'file')
        <a href="{{ route(config('chatify.attachments.download_route_name'),['fileName'=>$attachment[0]]) }}" class="file-download">
            <span class="fas fa-file"></span> {{$attachment[1]}}</a>
        @endif
    </p>

</div>
{{-- If attachment is an image --}}
@if(@$attachment[2] == 'image')
<div>
    <div class="message-card mc-sender">
        <div class="image-file chat-image" style="width: 250px; height: 150px;background-image: url('{{ asset('storage/'.config('chatify.attachments.folder').'/'.$attachment[0]) }}')">
        </div>
    </div>
</div>
@endif
@endif