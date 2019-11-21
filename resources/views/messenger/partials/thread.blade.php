<?php $class = $thread->isUnread(Auth::id()) ? 'bg-info' : ''; ?>

<div class="card mt-3 {{ $class }}">
    <div class="card-header">
        <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
        ({{ $thread->userUnreadMessagesCount(Auth::id()) }} 件未読)
    </div>

    <div class="card-body">
        
        {{ $thread->latestMessage->body }}
    </div>
    
    <div class="card-footer text-muted">
        <small><strong>送信元:</strong> {{ $thread->creator()->name }}</small>　　
        <small><strong>送信先:</strong> {{ $thread->participantsString(Auth::id()) }}</small>
    </div>
</div>