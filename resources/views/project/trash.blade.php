<x-front-layout>
    <h1 class="title fst-italic">Projects Trash </h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
                <th scope="col">Developers Count</th>
                <th scope="col">Restore</th>
                <th scope="col">Force Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <th scope="row">{{$project->id}}</th>
                <td>{{$project->name}}</td>
                <td>{{$project->type}}</td>
                <td>{{$project->status}}</td>
                <td>{{$project->users()->count()}}</td>
                <td>
                    <form method="post" action="{{route('restore',$project->id)}}">
                        @csrf
                        @method("put")
                        <button class="btn btn-outline-success">Restore</button>
                    </form>
                </td>
                <td>
                    <form method="post" action="{{route('forcedelete',$project->id)}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger">Force Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{--
    @foreach($projects as $project)
    <div class="container">
        <h3>{{$project->name}}</h3>
    <p>{{$project->content}}</p>
    <form action="{{route('restore',$project->id)}}" method="post">
        @csrf
        @method("put")
        <button class="green">restore</button>
    </form>
    <form action="{{route('forcedelete',$project->id)}}" method="post" class="container">
        @csrf
        @method("delete")
        <button class="red">force Delete</button>
    </form>
    </div>
    @endforeach
    --}}
</x-front-layout>