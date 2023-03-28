@extends('layouts.app')
@php
$state=$state ?? '';
$user=$user ?? '';  
$user_selected=$user_selected ?? '';  //to ensure that he select an client to update it -- true or false
@endphp
@section('content')
<div class="container pt-5">

  <div id="alertRes">

    @error('error')
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @enderror
  
  </div>
      
  
                  <div class="input-group mb-3 ">
                    <span class="input-group-text" id="basic-addon1">200-</span>
                    <input  id="searchInput" type="search" class="form-control " name="search" 
                    @if($user!='') 
                    value="{{  ltrim($user["personal_id"],"200-")   }}"
                    @endif
  
                   
                    placeholder="Look for clients by their personal id" aria-label="Look for clients" required aria-describedby="button-addon2">
                    <button class="btn btn-dark btn-md" type="button"  id="button-addon2"
                    
                    onclick="searchClient('delete')"
                    >Search</button>
                  </div>
  <table id="clientTable" class="table table-hover table-bordered results">
  <thead>

    <tr>
      <th>#</th>

      <th class="col-md-4 col-xs-4">Personal Id</th>
      <th class="col-md-5 col-xs-5">Name</th>
      <th class="col-md-5 col-xs-5"> Account Type</th>
     
    </tr>
    <tr class="warning no-result">
      <td colspan="4"><i class="fa fa-warning"></i> No result</td>
    </tr>
  </thead>
  <tbody>
@php
    $counter=1;
  
@endphp


@foreach ($clients as $item)
<tr >
  <th scope="row" >{{$counter++}}</th>
  <td>{{$item->personal_id}}</td>
  <td>{{$item->name}}</td>
  <td>{{$item->account_type}}</td>
  <td>
<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->personal_id}}">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$item->personal_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete a client</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Are you sure ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a type="button" class="btn btn-danger" href={{route('client.delete.action',['selectedID'=>$item->personal_id])}} >Delete</a>
      </div>
    </div>
  </div>
</div>




  </td>
  
</tr> 


@endforeach


  </tbody>
  <caption>
    {{$clients->links("component.paginator")}}
  </caption>
  </table>
  

</div>
<script src="/assets/empolyee/searchClients/search.js"></script>
<script src="/assets/empolyee/load/js/script.js"></script>
<script src="../assets/js/deleteClients.js"></script>

@endsection


