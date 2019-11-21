<div class="media mt-4 border-top">
    <a href="#">
        @if($message->user->thumbnail)
            <img class="mr-3" src="{{($message->user->thumbnail)}}" style="max-width:64px;"
                alt="{{ $message->user->name }}" class="img-circle">
        @else
            <img class="mr-3" src="//www.gravatar.com/avatar/{{ md5($message->user->email) }} ?s=64"
                alt="{{ $message->user->name }}" class="img-circle">
        @endif
    </a>

    <div class="media-body">
        <h5 class="mt-0">{{ $message->user->name }}</h5>
        <p>{{ $message->body }}</p>
        <p class="text-muted">
            <small>Posted {{ $message->created_at->diffForHumans() }}</small>
        </p>
    </div>
</div>