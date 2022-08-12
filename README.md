# Plutus Builder
Plutus low-code Smart contract builder

[Live Demo](https://plutus-builder.markevans.work/)

## What it does
* It's a low-code platform for creating Cardano smart contracts in Plutus language.
*	There are bunch of pre-loaded code snippets known to work that is the basis to start a new smart contract.
*	There's full script templates that work which can be copied and modified.
*	The scripts are compiled in a 3rd party playground to test that they execute without errors.
*	admin and user role. Admin creates the templates which is codeblocks, and full scripts.

## Why I made it: 
Cardano and Plutus it fairly difficult, so I made this low-code app to help me write smart contracts for clients.

## Stack: 
* Laravel 7
* MySQL

## General design
*	17 Feature tests
*	Relationshsips (one-to-many with Users & Scripts)
*	Resource controllers
*	Google login

## Some reasons its SOLID code:
*	can add more social logins via Socialite without changing code
*	Can extend codeblock attributes. I added a column without affecting original migrations
*	Query scopes with models
*	Services class for lighter controllers: 'ScriptTemplateService'
*	parameterised blade components (admin > template table)
*	route names so URLs could change



