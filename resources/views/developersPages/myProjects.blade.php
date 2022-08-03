<x-front-layout>
    <h1 class="title fst-italic">My Projects</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
                <th scope="col">Developers Count</th>
                <th scope="col">Done</th>

            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <th scope="row">{{$project->id}}</th>
                <td>{{$project->name}}</td>
                <td>{{$project->type}}</td>
                <td>{{$project->status}}</td>
                <td class="tlc">{{$project->users()->count()}}</td>
                <td>
                    @if($project->status == "inComplete")
                    <form method="post" action="{{route('complete',$project->id)}}">
                        @csrf
                        <input type="hidden" name="admin" value="{{$project->userId}}">
                        <button class="btn btn-outline-success">finished</button>
                    </form>
                    @else
                    <form method="post" action="{{route('cancelComplete',$project->id)}}">
                        @csrf
                        <input type="hidden" name="admin" value="{{$project->userId}}">
                        <button class="btn btn-outline-danger">cancle finished </button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</x-front-layout>