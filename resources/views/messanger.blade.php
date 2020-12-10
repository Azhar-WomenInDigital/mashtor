<ul>
    @foreach($inboxes as $inbox)
        <li>
            <h2>{{$inbox->withUser->name}}</h2>
            <p>{{$inbox->thread->message}}</p>
            <span>{{$inbox->thread->humans_time}}</span>
        </li>
    @endforeach
</ul>