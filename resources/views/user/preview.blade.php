@extends('layouts.backend')

@section('content')
<div style="margin:5px 15px 0px 15px">
    <div class="row">
        <div class="col-lg-12">
            <h3>{{ ucwords($script->title) }}</h3>
            <a href="https://playground.plutus.iohkdev.io/" target="_blank">Open Plutus Playground in new window</a>
            <br>
            <br>

            <span style="color:green">
                {- 
                <br>
                TITLE: {{ $script->title }}
                <br>
                DESCRIPTION: {{ $script->description }}
                <br>
                TESTING PARAMETERS: {{ $script->testing }}
                <br>
                Compiled by PLUTUS BUILDER.
                <br>
                For development services, please contact mark@cardanocrowd.com
                <br>
                -}
            </span>
            <br><br>

            <span style="color:green">-- 1. Imports</span>
            <br>
            <pre>{{ $script->section1 }}</pre>
            <br>
            
            <span style="color:green">-- 2. Data type declarations</span>
            <br>
            <pre>{{ $script->section2 }}</pre>
            <br>

            <span style="color:green">-- 3. Parameters</span>
            <br>
            <pre>{{ $script->section3 }}</pre>
            <br>

            <span style="color:green">-- 4A. Functions</span>
            <br>
            <pre>{{ $script->section4A }}</pre>
            <br>

            <span style="color:green">-- 4B. Validator</span>
            <br>
            <pre>{{ $script->section4B }}</pre>
            <br>

            <span style="color:green">-- 5. Validator type declarations</span>
            <br>
            <pre>{{ $script->section5 }}</pre>
            <br>

            <span style="color:green">-- 6. Compile the validator</span>
            <br>
            <pre>{{ $script->section6 }}</pre>
            <br>

            <span style="color:green">-- 7.  Schema endpoints</span>
            <br>
            <pre>{{ $script->section7 }}</pre>
            <br>

            <span style="color:green">-- 8A. Locking Endpoints</span>
            <br>
            <pre>{{ $script->section8A }}</pre>
            <br>

            <span style="color:green">-- 8B. Unlocking Endpoints</span>
            <br>
            <pre>{{ $script->section8B }}</pre>
            <br>

            <span style="color:green">-- 9. Endpoints</span>
            <br>
            <pre>{{ $script->section9 }}</pre>
            <br>

            <span style="color:green">-- 10. Schema Definitions</span>
            <br>
            <pre>{{ $script->section10 }}</pre>
            <br>

            <span style="color:green">-- 11. mkKnownCurrencies</span>
            <br>
            <pre>{{ $script->section11 }}</pre>
            <br>

        </div>
    </div>
</div></div>
  

@endsection
