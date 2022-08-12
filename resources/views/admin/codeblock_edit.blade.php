@extends('layouts.backend')

@section('content')
<div style="margin:5px 15px 0px 15px">
    <div class="row">
        <div class="container specialmargin"><br>



            <div class="card">
                <div class="card-header" style="padding:3px">
                    <center>Code blocks</center>
                </div>
                <div class="card-body">
        
                    <!-- Flash messages -->
                    @if (Session::has('success'))
                    <div class="col-sm-12" style="padding: 1px 5px 0px 10px">
                        <div class="alert alert-success" style="border-radius: 10px">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <span style="font-size:15px"><b>{!! Session::get('success') !!}</b></span>
                        </div> 
                    </div>                  
                    @endif

                    <div class="col-lg-12" style="padding:5px">
                        <div class="card mb-1" style="border-style: none">
                            <div class="card-body" style="padding:0px;">

                                <form action="{{ route('codeblocks.update',['codeblock' => $codeblock->id]) }}" method="POST">
                                    @csrf
                                    @method('put')

                                    <table width="100%">
                                        <tr>
                                            <td width="220px">Section</td>
                                            <td>
                                                <select name="section" id="section" style="width:100%">
                                                    <option {{$codeblock->section == "syntax" ? "selected" : ""}} value="syntax">Haskell Syntax</option>
                                                    <option {{$codeblock->section == "1" ? "selected" : ""}} value="1">1. Imports</option>
                                                    <option {{$codeblock->section == "2" ? "selected" : ""}} value="2">2. Data type declarations</option>
                                                    <option {{$codeblock->section == "3" ? "selected" : ""}} value="3">3. Parameters</option>
                                                    <option {{$codeblock->section == "4A" ? "selected" : ""}} value="4A">4A. Functions</option>
                                                    <option {{$codeblock->section == "4B" ? "selected" : ""}} value="4B">4B. Validator</option>
                                                    <option {{$codeblock->section == "5" ? "selected" : ""}} value="5">5. Validator type declarations</option>
                                                    <option {{$codeblock->section == "6" ? "selected" : ""}} value="6">6. Compile the validator</option>
                                                    <option {{$codeblock->section == "7" ? "selected" : ""}} value="7">7. Schema endpoints</option>
                                                    <option {{$codeblock->section == "8A" ? "selected" : ""}} value="8A">8A. Locking Endpoints</option>
                                                    <option {{$codeblock->section == "8B" ? "selected" : ""}} value="8B">8B. Unlocking Endpoints</option>
                                                    <option {{$codeblock->section == "9" ? "selected" : ""}} value="9">9. Endpoints</option>
                                                    <option {{$codeblock->section == "10" ? "selected" : ""}} value="10">10. Schema Definitions</option>
                                                    <option {{$codeblock->section == "11" ? "selected" : ""}} value="11">11. mkKnownCurrencies</option>
                                                </select>
                                            </td>                               
                                        </tr>  
        
                                        <tr>
                                            <td width="220px">Title</td>
                                            <td><input required id="title" name="title" type="text" style="width:100%" placeholder="Give the codeblock a title" value="{{ old('title', $codeblock->title) }}"></td>                               
                                        </tr>  
                                        <tr>
                                            <td width="220px">Description</td>
                                            <td><textarea required id="description" name="description" style="width:100%" rows="3" placeholder="Describe what the codeblock does">{{ old('description', $codeblock->description) }}</textarea></td>                               
                                        </tr>    
                                        <tr>
                                            <td width="220px">Code block</td>
                                            <td><textarea required id="codeblock" name="codeblock" style="width:100%" rows="12" placeholder="The codeblock">{{ old('codeblock', $codeblock->codeblock) }}</textarea></td>                               
                                        </tr>                                                                                      
                                    </table>
                                    <br>
                                    <button class="btn btn-primary btn-block" type="submit">Save</button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div></div>
  
@endsection
