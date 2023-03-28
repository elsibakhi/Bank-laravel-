@extends('layouts.app')

@section('content')
<div class="container pt-5">

  <div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="Serach for an complaint">
  </div>
  <span class="counter pull-right"></span>
  <table class="table table-hover table-bordered results">
  <thead>

    <tr>
      <th class="text-center">#</th>

      <th class="text-center">complaint</th>
      <th class="text-center">state</th>
      <th class="text-center"> replays</th>
      <th class="text-center"> actions</th>
     
    </tr>
    <tr class="warning no-result">
      <td colspan="4"><i class="fa fa-warning"></i> No result</td>
    </tr>
  </thead>
  <tbody>
@php
    $counter=1;
  
@endphp


@foreach ($complaints as $item)
<tr >
  <th class="text-center" scope="row" >{{$counter++}}</th>
  <td class="text-center">{{$item->massage}}</td>
  <td class="text-center">
    <span 
    @if ($item->state=="Approved")
    class= "badge bg-success rounded px-2 font-monospace"
    @elseif ($item->state=="Rejected")
    class= "badge bg-danger rounded px-2 font-monospace"
    @else
    class= "badge bg-primary rounded px-2 font-monospace"
    @endif
  
    
    >{{$item->state}}</span>
    
   </td>
  <td class="">
    <ol class="list-group list-group-numbered">
      @if ($item->replays !=null)
      @foreach ($item->replays as $replay)
   
      @if ($replay->replay !='')
      <li class="list-group-item"> {{$replay->replay}}</li>
      @endif
       
  
    
      @endforeach
      @endif

  </ol>
  </td>
  <td class="text-center">
<!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete the complaint</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Are you sure ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a type="button" class="btn btn-danger" href={{route('emoplyee.delete.complaint',['id'=>$item->id])}} >Delete</a>
      </div>
    </div>
  </div>
</div>




  </td>
  
</tr> 
@endforeach


  </tbody>
  </table>
  
 
</div>


<script src="/assets/js/deleteClients.js"></script>
@endsection


