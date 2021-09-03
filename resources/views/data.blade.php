@foreach($questions as $question)
    <a @if(\App\Models\ChMessage::where('broadcast_message_id',$question->id)->where('to_id',auth()->id())->exists()) href="#"
       @else() href="{{route('sendQuestion',$question->id)}}" @endif()

       class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
            <div class="flex-c">
{{--                <img style="height: 20px; width: 20px" src="{{ asset('/images/icons/Black/unknown.png') }}" alt="">--}}
                <img style="height: 20px; width: 20px;border-radius: 50%" src="{{ asset('/storage/'.config('chatify.user_avatar.folder').'/'.Auth::user()->avatar) }}" alt="">
                <h5 style="margin-left: 10px" class="mb-1">{{$question->user->name}}</h5>
            </div>

            <small class="text-muted">
                {{\Carbon\Carbon::parse($question->created_at)->translatedFormat('M d à H\hi')}}
                {{--                                {{ $question->created_at->format('M j')}}--}}

                @if((strtotime(now()) - strtotime($question->created_at )) < 60)
                    ({{number_format((float) (strtotime(now()) - strtotime($question->created_at )))}}
                    s)
                @elseif(number_format((float) (strtotime(now()) - strtotime($question->created_at ))/60<60))
                    ({{number_format((float) (strtotime(now()) - strtotime($question->created_at ))/60)}}
                    m)
                @elseif(number_format((float) (strtotime(now()) - strtotime($question->created_at ))/(60*60) < 60))
                    ({{number_format((float) (strtotime(now()) - strtotime($question->created_at ))/(60*60))}}
                    h)
                @elseif(number_format((float) (strtotime(now()) - strtotime($question->created_at ))/(60*60*24)) < 24)
                    ({{number_format((float) (strtotime(now()) - strtotime($question->created_at ))/(60*60*24))}}
                    j)
                @endif

            </small>
        </div>
        <p class="mb-1">{{$question->message}}</p>
        <small class="text-muted">Nombre de vue</small>
        <span class="badge badge-primary badge-pill">{{rand(1,100)}}</span>
    </a>
@endforeach
