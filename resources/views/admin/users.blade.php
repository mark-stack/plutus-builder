@extends('layouts.backend')

@section('content')
<div style="margin:5px 15px 0px 15px">
    <div class="row">
        <div class="container specialmargin"><br>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header" style="padding:3px">
                        <center>Users</center>
                    </div>
                    <div class="card-body">
                        <div class="card mb-1" style="border-style: none">
                            <div class="card-body" style="padding:0px;">
                                <table width="100%">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                    @forelse($users as $user) 
                                        <tr>
                                            <td>{{ ucwords($user->name) }}</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                    @empty 
                                        <tr>
                                            <td colspan="2">No results</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div></div>
  
@endsection
