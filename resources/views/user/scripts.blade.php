@extends('layouts.backend')

@section('content')
<style> 
    tr.spaceUnder>td {
        padding-bottom: 1em;
    }
</style>

<div style="margin:5px 15px 0px 15px">
    <div class="row">

        <!-- Flash messages -->
        @if (Session::has('success'))
        <div class="col-sm-12" style="padding: 1px 5px 0px 10px">
            <div class="alert alert-success" style="border-radius: 10px">
                <span style="font-size:15px"><b>{!! Session::get('success') !!}</b></span>
            </div> 
        </div>                  
        @endif

        <div class="col-lg-12">
            <h3>Create script</h3>
            <form action="{{ route('scripts.store') }}" method="post" style="width:100%;max-width:400px">
                @csrf 
                <input required type="text" name="title" minlength="5" class="form-control" style="width:100%" placeholder="Script title">
                <button type="submit" class="btn btn-primary btn-sm" style="width:100%">Create</button>
            </form>
            <br><br>

            @if(Auth::check() && Auth()->user()->isAdmin() == false)
                <h3>Templates</h3>
                <table style="width:100%">
                    <tr>
                        <th style="min-width:200px">Title</th>
                        <th style="width:150px">Actions</th>
                    </tr>
                    @foreach($templates as $script)
                        <form action="{{ route('scripts.rename',['script' => $script->id]) }}" method="post">
                            @csrf 
                            <tr style="border: 1px solid;">
                                <td>
                                    {{ ucfirst($script->title) }}
                                    <br><small>{{ $script->description }}</small>
                                </td>
                                <td>
                                    <a href="{{ route('scripts.copy',['script' => $script->id]) }}" class="btn btn-dark btn-sm">Copy</a>
                                    <a href="{{ route('scripts.show',['script' => $script->id]) }}" class="btn btn-success btn-sm">Preview</a>
                                </td>
                            </tr>
                        </form>
                    @endforeach
                </table>
                <br>
            @endif
           

            <h3>Your scripts</h3>
            <div class="row">
                @foreach($scripts as $script)
                    <div class="col-lg-6">
                        <form action="{{ route('scripts.rename',['script' => $script->id]) }}" method="post">
                            @csrf 
                            <div class="input-group mb-3">
                                <input required class="form-control" type="text" name="title" data-id="{{ $script->id }}" id="title" placeholder="Script title..." value="{{ ucfirst($script->title) }}">
                                <button type="submit" class="btn btn-info btn-sm">Rename</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <form action="{{ route('scripts.destroy',['script' => $script->id]) }}" method="post">
                            @csrf 
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <a href="{{ route('scripts.edit',['script' => $script->id]) }}" class="btn btn-primary ">Edit</a>
                            <a href="{{ route('scripts.copy',['script' => $script->id]) }}" class="btn btn-dark ">Copy</a>
                            <a href="{{ route('scripts.show',['script' => $script->id]) }}" class="btn btn-success ">Preview</a>                        
                        </form>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div></div>
  

@endsection
