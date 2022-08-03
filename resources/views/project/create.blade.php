<x-front-layout>

    <h1 class="title fst-italic">Create Project</h1>
    <form class="row g-3 m f border" action="{{ route('store') }}" method="post">
        @csrf
        <div class="col-md-5">
            <label for="Name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="Name" value="{{old('name')}}">
            @error('name')
            <p style="color:red">{{$message}}</p>
            @enderror
        </div>
        <div class="col-md-5">
            <label for="inputPassword4" class="form-label">Type</label>
            <input name="type" type="text" class="form-control" id="Type" value="{{old('type')}}">
            @error('type')
            <p style="color:red">{{$message}}</p>
            @enderror
        </div>


        <input type="hidden" name="userId" value="{{Auth::id()}}">
        <div class="col-12">
            @foreach($users as $user)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="checkbox" name="checkbox[]" value="{{$user->id}}">
                <label class="form-check-label" for="checkbox">
                    {{$user->name}}
                </label>
            </div>
            @endforeach
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Create Project</button>
        </div>
    </form>

</x-front-layout>