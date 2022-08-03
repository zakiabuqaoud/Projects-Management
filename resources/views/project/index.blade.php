<x-front-layout>
    <h1 class="title fst-italic">Projects Management</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Status</th>
                <th scope="col">Developers Count</th>
                <th scope="col">Done</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
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
                    @if($project->status == 'inComplete')
                    <form method="post" action="{{route('forceAdminComplete',$project->id)}}"><button class="btn btn-outline-success">finished</button>
                        @csrf
                    </form>
                    @else
                    <form method="post" action="{{route('forceAdminCancel',$project->id)}}"><button class="btn btn-outline-danger deletebtn">cancel finished</button>
                        @csrf
                        <input type="hidden" name="user">
                    </form>
                    @endif
                </td>
                <td>
                    <form method="get" action="{{route('edit',$project->id)}}"><button class="btn btn-outline-success">Update</button></form>
                </td>
                <td>
                    <form method="post" action="{{route('delete',$project->id)}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger" onclick="return checkDelete()">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</x-front-layout>