@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
<div class="col-3 p-5">

<img src="{{$user->profile->profileImage()}}" class="rounded-circle" style="width: 150px; height:150px">
</div>
<div class="col-9 p-5">
    {{-- info section --}}
<div class="d-flex justify-content-between align-items-baseline"><h1>{{$user->Username}}</h1>
  
   
  <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>

  @can('update', $user->profile)
  <a  class="btn btn-primary " href="/p/create">add new post</a>
 @endcan

 @can('update', $user->profile)
  <a class="btn btn-primary " href="/profile/{{ $user->id}}/edit">edit profile</a>
 @endcan
</div>

<div class="d-flex pr-3">
  <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
  <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
  <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
</div>

<div><h6><strong>{{$user->profile->title}}</strong></h6></div>

<div><h6><strong>{{$user->profile->description}}</strong></h6></div>
<div> <a href="#" class="text-decoration:none">{{$user->profile->url }}</a> </div>
{{-- end of info section --}}


</div>
  </div>

<div class="row pt-4">
  @foreach ($user->posts as $post)

  <div class="col-4 pb-4">
    <a href="/p/{{$post->id}}"><img src="/storage/{{$post->image}}" class="w-100"></a>
  </div>

  @endforeach


   


</div>


</div>




@endsection
