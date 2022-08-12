@extends('layouts.backend')

@section('content')
<div style="margin:5px 15px 0px 15px">
    <div class="row">
        <div class="container specialmargin"><br>
            <!-- Flash messages -->
            @if (Session::has('success'))
                <div class="col-sm-12" style="padding: 1px 5px 0px 10px">
                    <div class="alert alert-success" style="border-radius: 10px">
                        <span style="font-size:15px"><b>{!! Session::get('success') !!}</b></span>
                    </div> 
                </div>                  
            @endif

            <div class="row">
                <div class="col-lg-6">
                    <div class="card" style="height:100%">
                        <div class="card-header" style="padding:3px">
                            <center>New code block</center>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('codeblocks.store') }}" method="POST">
                                @csrf
                                <table width="100%">
                                    <tr>
                                        <td width="100px">Section</td>
                                        <td>
                                            <select name="section" id="section" style="width:100%">
                                                <option value="1">1. Imports</option>
                                                <option value="2">2. Data type declarations</option>
                                                <option value="3">3. Parameters</option>
                                                <option value="4A">4A. Functions</option>
                                                <option value="4B">4B. Validator</option>
                                                <option value="5">5. Validator type declarations</option>
                                                <option value="6">6. Compile the validator</option>
                                                <option value="7">7. Schema endpoints</option>
                                                <option value="8A">8A. Locking Endpoints</option>
                                                <option value="8B">8B. Unlocking Endpoints</option>
                                                <option value="9">9. Endpoints</option>
                                                <option value="10">10. Schema Definitions</option>
                                                <option value="11">11. mkKnownCurrencies</option>
                                            </select>
                                        </td>                               
                                    </tr>  
    
                                    <tr>
                                        <td>Title</td>
                                        <td><input required id="title" name="title" type="text" style="width:100%" placeholder="Give the codeblock a title" value="{{ old('title') }}"></td>                               
                                    </tr>  
                                    <tr>
                                        <td>Description</td>
                                        <td><textarea required id="description" name="description" style="width:100%" rows="3" placeholder="Describe what the codeblock does">{{ old('description') }}</textarea></td>                               
                                    </tr>    
                                    <tr>
                                        <td>Code block</td>
                                        <td><textarea required id="codeblock" name="codeblock" style="width:100%" rows="5" placeholder="The codeblock">{{ old('code_block') }}</textarea></td>                               
                                    </tr>                                                                                      
                                </table>
                                <br>
                                <button class="btn btn-primary btn-block" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card" style="height:100%">
                        <div class="card-header" style="padding:3px">
                            <center>Template</center>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('assign.templates') }}" method="post">
                                @csrf
                                <table style="width:100%">
                                    <tr>
                                        <th>#</th>
                                        <th>Section</th>
                                        <th>Codeblock</th>
                                    </tr>
                                    @include('partials.admin_codeblock_template_table',['id' => '1','title' => 'Imports'])
                                    @include('partials.admin_codeblock_template_table',['id' => '2','title' => 'Data type declarations'])
                                    @include('partials.admin_codeblock_template_table',['id' => '3','title' => 'Parameters'])
                                    @include('partials.admin_codeblock_template_table',['id' => '4A','title' => 'Functions'])
                                    @include('partials.admin_codeblock_template_table',['id' => '4B','title' => 'Validator'])
                                    @include('partials.admin_codeblock_template_table',['id' => '5','title' => 'Validator type declarations'])
                                    @include('partials.admin_codeblock_template_table',['id' => '6','title' => 'Compile the validator'])
                                    @include('partials.admin_codeblock_template_table',['id' => '7','title' => 'Schema endpoints'])
                                    @include('partials.admin_codeblock_template_table',['id' => '8A','title' => 'Locking Endpoints'])
                                    @include('partials.admin_codeblock_template_table',['id' => '8B','title' => 'Unlocking Endpoints'])
                                    @include('partials.admin_codeblock_template_table',['id' => '9','title' => 'Endpoints'])
                                    @include('partials.admin_codeblock_template_table',['id' => '10','title' => 'Schema Definitions'])
                                    @include('partials.admin_codeblock_template_table',['id' => '11','title' => 'mkKnownCurrencies'])

                                </table>
                                <button class="btn btn-primary btn-block" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12" style="margin-top:20px">
                    <div class="card">
                        <div class="card-header" style="padding:3px">
                            <center>Codeblocks</center>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width:30px">Section</th>
                                        <th style="width:150px">Title</th>
                                        <th>Description</th>
                                        <th style="width:120px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($codeblocks as $codeblock)
                                        <tr>
                                            <td>{{ $codeblock->section }}</td>
                                            <td>{{ $codeblock->title }}</td>
                                            <td>{{ $codeblock->description }}</td>
                                            <td>
                                                <form action="{{route('codeblocks.destroy',['codeblock' => $codeblock->id])}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{route('codeblocks.edit',['codeblock' => $codeblock->id])}}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i></a>
                                                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" type="submit"><i class="fa-solid fa-trash-can"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div></div>
  
@endsection
