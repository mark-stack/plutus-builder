@extends('layouts.backend')

@section('content')
<style> 
    .compressed{ padding: 4px 7px 4px 7px }
</style>

<div style="margin:5px 15px 0px 15px">
    <div class="row">

        <!-- Flash messages -->
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!! Session::get('success') !!}. <a href="{{ route('scripts.show',['script' => $script->id]) }}" onclick="return confirm('Have you saved? Click Cancel and save first')">Preview?</a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('scripts.update',['script' => $script->id]) }}" method="post">
            @csrf
            @method('put')
            <div class="col-lg-12">
                <h5>Smart contract: <b>{{ ucwords($script->title) }}</b></h5>
                <div class="row">
                    <div class="col-lg-5"> 
                        <h6>
                            Haskell/General
                            <span style="color:grey;font-weight:200px;font-size:14px;margin-left:10px">Refer to <a href="https://andrew.gibiansky.com/blog/haskell/haskell-syntax/" target="_blank">this guide</a></span>
                        </h6>
                        
                        <div class="accordion" id="accordionSectionSyntax" style="margin-bottom:10px">
                            @foreach($codeblocks as $codeblock)
                                @if($codeblock->section == "syntax") 
                                    @php 
                                        if(stripos($codeblock->title,"universal") === false){
                                            $border = "";
                                        }
                                        else{
                                            $border="border: green 3px solid";
                                        }
                                    @endphp
                                    <div class="accordion-item" style="{{$border}}">
                                        <h2 class="accordion-header" id="heading{{$codeblock->id}}{{$loop->index}}">
                                            <button class="accordion-button compressed compressed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$codeblock->id}}{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$codeblock->id}}{{$loop->index}}">
                                                {{ ucfirst($codeblock->title) }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$codeblock->id}}{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$codeblock->id}}{{$loop->index}}" data-bs-parent="#accordionSection{{$codeblock->id}}{{$loop->index}}">
                                            <div class="accordion-body">
                                                <small style="color:grey">{{ ucfirst($codeblock->description) }}</small>
                                                <br>
                                                <pre style="color:blueviolet">{{ $codeblock->codeblock }}</pre>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        
                        
                    </div>
                    <div class="col-lg-7"> 
                        <div class="card-body" style="border: 1px dotted blue">
                            <div class="col-md-12 margin">
                                <h5 style="margin-bottom:0px">Description</h5>
                                <small>Explain what this smart contract does</small>
                                <textarea style="width:100%" name="description" id="description" rows="3">{{ old('description',$script->description) }}</textarea> 

                                <h5 style="margin-bottom:0px">Testing parameters</h5>
                                <small>Provide inputs and what result they achieve</small>
                                <textarea style="width:100%" name="testing" id="testing" rows="5">{{ old('testing',$script->testing) }}</textarea>                                              
                            </div> 
                        </div> 
                    </div>

                    <div class="col-lg-5"> 
                        <h6>1. Imports</h6>
                        <div class="accordion" id="accordionSection1" style="margin-bottom:10px">
                            @foreach($codeblocks as $codeblock)
                                @if($codeblock->section == "1") 
                                    @php 
                                        if(stripos($codeblock->title,"universal") === false){
                                            $border = "";
                                        }
                                        else{
                                            $border="border: green 3px solid";
                                        }
                                    @endphp
                                    <div class="accordion-item" style="{{$border}}">
                                        <h2 class="accordion-header" id="heading{{$codeblock->id}}{{$loop->index}}">
                                            <button class="accordion-button compressed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$codeblock->id}}{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$codeblock->id}}{{$loop->index}}">
                                                {{ ucfirst($codeblock->title) }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$codeblock->id}}{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$codeblock->id}}{{$loop->index}}" data-bs-parent="#accordionSection{{$codeblock->id}}{{$loop->index}}">
                                            <div class="accordion-body">
                                                <small style="color:grey">{{ ucfirst($codeblock->description) }}</small>
                                                <br>
                                                <pre style="color:blueviolet">{{ $codeblock->codeblock }}</pre>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-7"> 
                        <div class="card-body" style="border: 1px dotted blue">
                            <div class="col-md-12 margin">
                                <h5>1. Imports</h5>
                                <small>Import external dependencies</small>
                                <textarea style="width:100%" name="section1" id="section1" rows="8">{{ old('section1',$script->section1) }}</textarea>                                                 
                            </div> 
                        </div> 
                    </div>

                    <div class="col-lg-5"> 
                        <h6>2. Data type declaration (optional)</h6>
                        <div class="accordion" id="accordionSection2" style="margin-bottom:10px">
                            @foreach($codeblocks as $codeblock)
                                @if($codeblock->section == "2") 
                                    @php 
                                        if(stripos($codeblock->title,"universal") === false){
                                            $border = "";
                                        }
                                        else{
                                            $border="border: green 3px solid";
                                        }
                                    @endphp                                
                                    <div class="accordion-item" style="{{$border}}">
                                        <h2 class="accordion-header" id="heading{{$codeblock->id}}{{$loop->index}}">
                                            <button class="accordion-button compressed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$codeblock->id}}{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$codeblock->id}}{{$loop->index}}">
                                                {{ ucfirst($codeblock->title) }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$codeblock->id}}{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$codeblock->id}}{{$loop->index}}" data-bs-parent="#accordionSection{{$codeblock->id}}{{$loop->index}}">
                                            <div class="accordion-body">
                                                <small style="color:grey">{{ ucfirst($codeblock->description) }}</small>
                                                <br>
                                                <pre style="color:blueviolet">{{ $codeblock->codeblock }}</pre>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-7"> 
                        <div class="card-body" style="border: 1px dotted blue">
                            <div class="col-md-12 margin">
                                <h5>2. Data type declaration (optional)</h5>
                                <small>These are custom data declarations, but you can use built-in data types such as 'Data', 'Integer', 'String', 'ScriptContext'. Refer to <a href="https://plutus-pioneer-program.readthedocs.io/en/latest/pioneer/week2.html#example-4-typed" target="_blank">this guide</a></small>
                                <textarea style="width:100%" name="section2" id="section2" rows="10">{{ old('section2',$script->section2) }}</textarea>                                                 
                            </div> 
                        </div>
                    </div>

                    <div class="col-lg-5"> 
                        <h6>3. Parameters</h6>
                        <div class="accordion" id="accordionSection3" style="margin-bottom:10px">
                            @foreach($codeblocks as $codeblock)
                                @if($codeblock->section == "3") 
                                    @php 
                                        if(stripos($codeblock->title,"universal") === false){
                                            $border = "";
                                        }
                                        else{
                                            $border="border: green 3px solid";
                                        }
                                    @endphp
                                    <div class="accordion-item" style="{{$border}}">
                                        <h2 class="accordion-header" id="heading{{$codeblock->id}}{{$loop->index}}">
                                            <button class="accordion-button compressed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$codeblock->id}}{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$codeblock->id}}{{$loop->index}}">
                                                {{ ucfirst($codeblock->title) }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$codeblock->id}}{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$codeblock->id}}{{$loop->index}}" data-bs-parent="#accordionSection{{$codeblock->id}}{{$loop->index}}">
                                            <div class="accordion-body">
                                                <small style="color:grey">{{ ucfirst($codeblock->description) }}</small>
                                                <br>
                                                <pre style="color:blueviolet">{{ $codeblock->codeblock }}</pre>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-7"> 
                        <div class="card-body" style="border: 1px dotted blue">
                            <div class="col-md-12 margin">
                                <h5>3. Parameters</h5>
                                <small>
                                    Needs to cover your DATUM and REDEEMER.
                                    Include your parameters (fields) for user wallet inputs. e.g a form with a string and ADA amount.                         
                                </small>
                                <textarea style="width:100%" name="section3" id="section3" rows="11">{{ old('section3',$script->section3) }}</textarea>                                                 
                            </div> 
                        </div>
                    </div>
                    <div class="col-lg-5"> 
                        <h6>4A. Functions</h6>
                        <div class="accordion" id="accordionSection4" style="margin-bottom:10px">
                            @foreach($codeblocks as $codeblock)
                                @if($codeblock->section == "4A") 
                                    @php 
                                        if(stripos($codeblock->title,"universal") === false){
                                            $border = "";
                                        }
                                        else{
                                            $border="border: green 3px solid";
                                        }
                                    @endphp                                
                                    <div class="accordion-item" style="{{$border}}">
                                        <h2 class="accordion-header" id="heading{{$codeblock->id}}{{$loop->index}}">
                                            <button class="accordion-button compressed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$codeblock->id}}{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$codeblock->id}}{{$loop->index}}">
                                                {{ ucfirst($codeblock->title) }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$codeblock->id}}{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$codeblock->id}}{{$loop->index}}" data-bs-parent="#accordionSection{{$codeblock->id}}{{$loop->index}}">
                                            <div class="accordion-body">
                                                <small style="color:grey">{{ ucfirst($codeblock->description) }}</small>
                                                <br>
                                                <pre style="color:blueviolet">{{ $codeblock->codeblock }}</pre>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach                          
                        </div>                       
                    </div>
                    <div class="col-lg-7"> 
                        <div class="card-body" style="border: 1px dotted blue">
                            <div class="col-md-12 margin">
                                <h5>4A. Functions</h5>
                                <small>
                                    The gateway to accepting or rejecting a transaction. 
                                    The format is DATUM -> REDEEMER -> SCRIPT CONTEXT. 
                                    Script context is querying <i>this</i> transaction, so we can get the wallets that signed etc.
                                    If no error is thrown, then the transaction is accepted. Never submit a failed validation.
                                    Refer to <a href="https://plutus-pioneer-program.readthedocs.io/en/latest/pioneer/week2.html#example-3-forty-two" target="_blank">this guide</a>
                                </small>
                                <textarea style="width:100%" name="section4A" id="section4A" rows="10">{{ old('section4A',$script->section4A) }}</textarea>                                                 
                            </div> 
                        </div>
                    </div>
                    <div class="col-lg-5"> 
                        <h6>4B. Validator</h6>
                        <div class="accordion" id="accordionSection4" style="margin-bottom:10px">
                            @foreach($codeblocks as $codeblock)
                                @if($codeblock->section == "4B") 
                                    @php 
                                        if(stripos($codeblock->title,"universal") === false){
                                            $border = "";
                                        }
                                        else{
                                            $border="border: green 3px solid";
                                        }
                                    @endphp
                                    <div class="accordion-item" style="{{$border}}">
                                        <h2 class="accordion-header" id="heading{{$codeblock->id}}{{$loop->index}}">
                                            <button class="accordion-button compressed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$codeblock->id}}{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$codeblock->id}}{{$loop->index}}">
                                                {{ ucfirst($codeblock->title) }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$codeblock->id}}{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$codeblock->id}}{{$loop->index}}" data-bs-parent="#accordionSection{{$codeblock->id}}{{$loop->index}}">
                                            <div class="accordion-body">
                                                <small style="color:grey">{{ ucfirst($codeblock->description) }}</small>
                                                <br>
                                                <pre style="color:blueviolet">{{ $codeblock->codeblock }}</pre>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach                          
                        </div>                       
                    </div>
                    <div class="col-lg-7"> 
                        <div class="card-body" style="border: 1px dotted blue">
                            <div class="col-md-12 margin">
                                <h5>4B. Validator</h5>
                                <small>
                                    The gateway to accepting or rejecting a transaction. 
                                    The format is DATUM -> REDEEMER -> SCRIPT CONTEXT. 
                                    Script context is querying <i>this</i> transaction, so we can get the wallets that signed etc.
                                    If no error is thrown, then the transaction is accepted. Never submit a failed validation.
                                    Refer to <a href="https://plutus-pioneer-program.readthedocs.io/en/latest/pioneer/week2.html#example-3-forty-two" target="_blank">this guide</a>
                                </small>
                                <textarea style="width:100%" name="section4B" id="section4B" rows="8">{{ old('section4B',$script->section4B) }}</textarea>                                                 
                            </div> 
                        </div>
                    </div>

                    <div class="col-lg-5"> 
                        <h6>5. Validator type declarations (optional)</h6>
                        <div class="accordion" id="accordionSection5" style="margin-bottom:10px">
                            @foreach($codeblocks as $codeblock)
                                @if($codeblock->section == "5") 
                                    @php 
                                        if(stripos($codeblock->title,"universal") === false){
                                            $border = "";
                                        }
                                        else{
                                            $border="border: green 3px solid";
                                        }
                                    @endphp
                                    <div class="accordion-item" style="{{$border}}">
                                        <h2 class="accordion-header" id="heading{{$codeblock->id}}{{$loop->index}}">
                                            <button class="accordion-button compressed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$codeblock->id}}{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$codeblock->id}}{{$loop->index}}">
                                                {{ ucfirst($codeblock->title) }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$codeblock->id}}{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$codeblock->id}}{{$loop->index}}" data-bs-parent="#accordionSection{{$codeblock->id}}{{$loop->index}}">
                                            <div class="accordion-body">
                                                <small style="color:grey">{{ ucfirst($codeblock->description) }}</small>
                                                <br>
                                                <pre style="color:blueviolet">{{ $codeblock->codeblock }}</pre>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-7"> 
                        <div class="card-body" style="border: 1px dotted blue">
                            <div class="col-md-12 margin">
                                <h5>5. Validator type declarations (optional)</h5>
                                <small>
                                    These are custom data declarations, but you can use built-in data types such as 'Data', 'Integer', 'String', 'ScriptContext'. Refer to <a href="https://plutus-pioneer-program.readthedocs.io/en/latest/pioneer/week2.html#example-4-typed" target="_blank">this guide</a>
                                </small>
                                <textarea style="width:100%" name="section5" id="section5" rows="5">{{ old('section5',$script->section5) }}</textarea>                                                 
                            </div> 
                        </div>
                    </div>

                    <div class="col-lg-5"> 
                        <h6>6. Compile the validator</h6>
                        <div class="accordion" id="accordionSection6" style="margin-bottom:10px">
                            @foreach($codeblocks as $codeblock)
                                @if($codeblock->section == "6") 
                                    @php 
                                        if(stripos($codeblock->title,"universal") === false){
                                            $border = "";
                                        }
                                        else{
                                            $border="border: green 3px solid";
                                        }
                                    @endphp
                                    <div class="accordion-item" style="{{$border}}">
                                        <h2 class="accordion-header" id="heading{{$codeblock->id}}{{$loop->index}}">
                                            <button class="accordion-button compressed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$codeblock->id}}{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$codeblock->id}}{{$loop->index}}">
                                                {{ ucfirst($codeblock->title) }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$codeblock->id}}{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$codeblock->id}}{{$loop->index}}" data-bs-parent="#accordionSection{{$codeblock->id}}{{$loop->index}}">
                                            <div class="accordion-body">
                                                <small style="color:grey">{{ ucfirst($codeblock->description) }}</small>
                                                <br>
                                                <pre style="color:blueviolet">{{ $codeblock->codeblock }}</pre>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-7"> 
                        <div class="card-body" style="border: 1px dotted blue">
                            <div class="col-md-12 margin">
                                <h5>6. Compile the validator</h5>
                                <small>
                                    Currently, the code is written in Haskell. 
                                    This function will compile the on-chain code into 'Plutus core' which is read by the Cardano blockchain.
                                    Refer to <a href="https://plutus-pioneer-program.readthedocs.io/en/latest/pioneer/week2.html#plutus-validator" target="_blank">this guide</a>
                                </small>
                                <textarea style="width:100%" name="section6" id="section6" rows="6">{{ old('section6',$script->section6) }}</textarea>                                                 
                            </div> 
                        </div>
                    </div>

                    <div class="col-lg-5"> 
                        <h6>7. Schema endpoints</h6>
                        <div class="accordion" id="accordionSection7" style="margin-bottom:10px">
                            @foreach($codeblocks as $codeblock)
                                @if($codeblock->section == "7") 
                                    @php 
                                        if(stripos($codeblock->title,"universal") === false){
                                            $border = "";
                                        }
                                        else{
                                            $border="border: green 3px solid";
                                        }
                                    @endphp
                                    <div class="accordion-item" style="{{$border}}">
                                        <h2 class="accordion-header" id="heading{{$codeblock->id}}{{$loop->index}}">
                                            <button class="accordion-button compressed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$codeblock->id}}{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$codeblock->id}}{{$loop->index}}">
                                                {{ ucfirst($codeblock->title) }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$codeblock->id}}{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$codeblock->id}}{{$loop->index}}" data-bs-parent="#accordionSection{{$codeblock->id}}{{$loop->index}}">
                                            <div class="accordion-body">
                                                <small style="color:grey">{{ ucfirst($codeblock->description) }}</small>
                                                <br>
                                                <pre style="color:blueviolet">{{ $codeblock->codeblock }}</pre>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-7"> 
                        <div class="card-body" style="border: 1px dotted blue">
                            <div class="col-md-12 margin">
                                <h5>7. Schema endpoints</h5>
                                <small>
                                    Endpoints are the inputs the user interacts with via a HTML form. 
                                    'Schema' is the list of endpoints in the smart contract.
                                    The schema is given a custom name.
                                </small>
                                <textarea style="width:100%" name="section7" id="section7" rows="4">{{ old('section7',$script->section7) }}</textarea>                                                 
                            </div> 
                        </div>
                    </div>

                    <div class="col-lg-5"> 
                        <br>
                        <h6>8A. Locking Endpoints</h6>
                        <div class="accordion" id="accordionSection8A" style="margin-bottom:10px">
                            @foreach($codeblocks as $codeblock)
                                @if($codeblock->section == "8A") 
                                    @php 
                                        if(stripos($codeblock->title,"universal") === false){
                                            $border = "";
                                        }
                                        else{
                                            $border="border: green 3px solid";
                                        }
                                    @endphp
                                    <div class="accordion-item" style="{{$border}}">
                                        <h2 class="accordion-header" id="heading{{$codeblock->id}}{{$loop->index}}">
                                            <button class="accordion-button compressed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$codeblock->id}}{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$codeblock->id}}{{$loop->index}}">
                                                {{ ucfirst($codeblock->title) }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$codeblock->id}}{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$codeblock->id}}{{$loop->index}}" data-bs-parent="#accordionSection{{$codeblock->id}}{{$loop->index}}">
                                            <div class="accordion-body">
                                                <small style="color:grey">{{ ucfirst($codeblock->description) }}</small>
                                                <br>
                                                <pre style="color:blueviolet">{{ $codeblock->codeblock }}</pre>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-7"> 
                        <div class="card-body" style="border: 1px dotted blue">
                            <div class="col-md-12 margin">
                                <h5>8A. Locking Endpoints</h5>
                                <small>
                                    Instructions on what the endpoints do.
                                </small>
                                <textarea style="width:100%" name="section8A" id="section8A" rows="10">{{ old('section8A',$script->section8A) }}</textarea>                                                 
                            </div> 
                        </div>
                    </div>

                    <div class="col-lg-5"> 
                        <br>
                        <h6>8B. Unlocking Endpoints</h6>
                        <div class="accordion" id="accordionSection8B" style="margin-bottom:10px">
                            @foreach($codeblocks as $codeblock)
                                @if($codeblock->section == "8B") 
                                    @php 
                                        if(stripos($codeblock->title,"universal") === false){
                                            $border = "";
                                        }
                                        else{
                                            $border="border: green 3px solid";
                                        }
                                    @endphp
                                    <div class="accordion-item" style="{{$border}}">
                                        <h2 class="accordion-header" id="heading{{$codeblock->id}}{{$loop->index}}">
                                            <button class="accordion-button compressed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$codeblock->id}}{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$codeblock->id}}{{$loop->index}}">
                                                {{ ucfirst($codeblock->title) }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$codeblock->id}}{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$codeblock->id}}{{$loop->index}}" data-bs-parent="#accordionSection{{$codeblock->id}}{{$loop->index}}">
                                            <div class="accordion-body">
                                                <small style="color:grey">{{ ucfirst($codeblock->description) }}</small>
                                                <br>
                                                <pre style="color:blueviolet">{{ $codeblock->codeblock }}</pre>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-7"> 
                        <div class="card-body" style="border: 1px dotted blue">
                            <div class="col-md-12 margin">
                                <h5>8B. Unlocking Endpoints</h5>
                                <small>
                                    Instructions on what the endpoints do.
                                </small>
                                <textarea style="width:100%" name="section8B" id="section8B" rows="10">{{ old('section8B',$script->section8B) }}</textarea>                                                 
                            </div> 
                        </div>
                    </div>

                    <div class="col-lg-5"> 
                        <h6>9. Endpoints</h6>
                        <div class="accordion" id="accordionSection9">
                            @foreach($codeblocks as $codeblock)
                                @if($codeblock->section == "9") 
                                    @php 
                                        if(stripos($codeblock->title,"universal") === false){
                                            $border = "";
                                        }
                                        else{
                                            $border="border: green 3px solid";
                                        }
                                    @endphp
                                    <div class="accordion-item" style="{{$border}}">
                                        <h2 class="accordion-header" id="heading{{$codeblock->id}}{{$loop->index}}">
                                            <button class="accordion-button compressed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$codeblock->id}}{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$codeblock->id}}{{$loop->index}}">
                                                {{ ucfirst($codeblock->title) }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$codeblock->id}}{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$codeblock->id}}{{$loop->index}}" data-bs-parent="#accordionSection{{$codeblock->id}}{{$loop->index}}">
                                            <div class="accordion-body">
                                                <small style="color:grey">{{ ucfirst($codeblock->description) }}</small>
                                                <br>
                                                <pre style="color:blueviolet">{{ $codeblock->codeblock }}</pre>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-7"> 
                        <div class="card-body" style="border: 1px dotted blue">
                            <div class="col-md-12 margin">
                                <h5>9. Endpoints</h5>
                                <small>
                                    Endpoints are the inputs the user interacts with via a HTML form. 
                                </small>
                                <textarea style="width:100%" name="section9" id="section9" rows="7">{{ old('section9',$script->section9) }}</textarea>                                                 
                            </div> 
                        </div>
                    </div>

                    <div class="col-lg-5"> 
                        <h6>10. Schema Definitions</h6>
                        <div class="accordion" id="accordionSection10">
                            @foreach($codeblocks as $codeblock)
                                @if($codeblock->section == "10") 
                                    @php 
                                        if(stripos($codeblock->title,"universal") === false){
                                            $border = "";
                                        }
                                        else{
                                            $border="border: green 3px solid";
                                        }
                                    @endphp
                                    <div class="accordion-item" style="{{$border}}">
                                        <h2 class="accordion-header" id="heading{{$codeblock->id}}{{$loop->index}}">
                                            <button class="accordion-button compressed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$codeblock->id}}{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$codeblock->id}}{{$loop->index}}">
                                                {{ ucfirst($codeblock->title) }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$codeblock->id}}{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$codeblock->id}}{{$loop->index}}" data-bs-parent="#accordionSection{{$codeblock->id}}{{$loop->index}}">
                                            <div class="accordion-body">
                                                <small style="color:grey">{{ ucfirst($codeblock->description) }}</small>
                                                <br>
                                                <pre style="color:blueviolet">{{ $codeblock->codeblock }}</pre>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-7"> 
                        <div class="card-body" style="border: 1px dotted blue">
                            <div class="col-md-12 margin">
                                <h5>10. Schema Definitions</h5>
                                <small>Uses the name you gave to the schema in section 7</small>
                                <textarea style="width:100%" name="section10" id="section10" rows="3">{{ old('section10',$script->section10) }}</textarea>                                                 
                            </div> 
                        </div>
                    </div>

                    <div class="col-lg-5"> 
                        <h6>11. mkKnownCurrencies</h6>
                        <div class="accordion" id="accordionSection11">
                            @foreach($codeblocks as $codeblock)
                                @if($codeblock->section == "11") 
                                    @php 
                                        if(stripos($codeblock->title,"universal") === false){
                                            $border = "";
                                        }
                                        else{
                                            $border="border: green 3px solid";
                                        }
                                    @endphp
                                    <div class="accordion-item" style="{{$border}}">
                                        <h2 class="accordion-header" id="heading{{$codeblock->id}}{{$loop->index}}">
                                            <button class="accordion-button compressed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$codeblock->id}}{{$loop->index}}" aria-expanded="true" aria-controls="collapse{{$codeblock->id}}{{$loop->index}}">
                                                {{ ucfirst($codeblock->title) }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$codeblock->id}}{{$loop->index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$codeblock->id}}{{$loop->index}}" data-bs-parent="#accordionSection{{$codeblock->id}}{{$loop->index}}">
                                            <div class="accordion-body">
                                                <small style="color:grey">{{ ucfirst($codeblock->description) }}</small>
                                                <br>
                                                <pre style="color:blueviolet">{{ $codeblock->codeblock }}</pre>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-7"> 
                        <div class="card-body" style="border: 1px dotted blue">
                            <div class="col-md-12 margin">
                                <h5>11. mkKnownCurrencies</h5>
                                <small>The tokens being used. The array is empty if just ADA</small>
                                <textarea style="width:100%" name="section11" id="section11" rows="3">{{ old('section11',$script->section11) }}</textarea>                                                 
                            </div> 
                        </div>
                    </div>
                </div> 

            </div>
            <div class="col-lg-12">
                <br>
                <div class="card-body" style="padding:0px">
                    <div class="col-md-12" style="padding:0px">
                        <button type="submit" class="btn btn-success btn-block">Save "{{ucwords($script->title)}}"</button> 
                        <a href="{{ route('scripts.show',['script' => $script->id]) }}" onclick="return confirm('Have you saved? Click Cancel and save first')" class="btn btn-secondary btn-block">Preview</a>                                              
                    </div> 
                </div>
                <br><br>

            </div>
        </form>

    </div>
</div></div>
  

@endsection
