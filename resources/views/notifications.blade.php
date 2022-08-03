<x-front-layout>
    <h1 class="title fst-italic">Notifications</h1>
    @foreach($notifications as $noti)
    <div class="card w-75 m">
        <div class="card-body">
            <h5 class="card-title">{{$noti->data['title']}}</h5>
            <p class="card-text">{{$noti->data['greeting']}}</p>
            {{-- <p class="card-text">{{$noti->data['body']}}</p>--}}
            <a href="{{$noti->data['action']}}" class="btn btn-primary">go to myProjects</a>
        </div>
    </div>
    <br>
    @endforeach
    {{ $notifications->links() }}
</x-front-layout>