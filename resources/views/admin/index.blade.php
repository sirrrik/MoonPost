    @extends('layouts.app')

    @section('content')
    <div class="row  p-5">
        <div class="col-2"></div>
        <div class="col-6">
        <h4>Active Users</h4>
        <table>
                <tr >
                <td class=" p-3 ">id</td>
                <td class=" p-3 ">Name</td>
                <td class=" p-3 ">Username</td>
                <td class=" p-3 ">Email</td>
                <td class=" p-3 ">Delete User</td>
                </tr>
            
                    @foreach($users as $user)
                    <tr >
                            <td class=" p-3">{{$user['id']}}</td>
                            <td class=" p-3">{{$user['name']}}</td>
                            <td class=" p-3">{{$user['Username']}}</td>
                            <td class=" p-3">{{$user['email']}}</td>
                            <td class=" p-3">
                                
                                {{-- <a class="btn btn-primary"href={{"delete/".$user['id']}}>Delete</a> --}}
                                <form method="POST" action="{{route('delete',$user->id)}}">
                                    @csrf
                                    <button class="btn btn-success" type="submit">Delete</button>
                                
                                </form>
                            
                            </td>
                        </tr>

                        {{-- <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                             <td>
                             {{ Form::open(['method' => 'DELETE', 'route' => ['comics.destroy', $user->id]]) }}
                             {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                             {{ Form::close() }}
                             </td>
                        </tr> --}}
        
                    @endforeach
            </table>
    </div>
    </div>


    <div class="row ">
    <div class="col-2"></div>
    <div class="col-6">
    <h4>Profiles of the users</h4>
    <table>
    <tr>
    <td class=" p-3">user_id</td>
    <td class=" p-3">title</td>
    <td class=" p-3">description</td>
    <td class=" p-3">url</td>
    <td class=" p-3">Image</td>
    </tr>

    @foreach($profiles as $profile)
    <tr>
        <td class=" p-3">{{$profile['user_id']}}</td>
        <td class=" p-3">{{$profile['title']}}</td>
        <td class=" p-3">{{$profile['description']}}</td>
        <td class=" p-3">{{$profile['url']}}</td>
        <td class=" p-3">{{$profile['Image']}}</td>
            </tr>


    @endforeach
    </table>
    </div>
    </div>


    <div class="row ">
    <div class="col-2"></div>
    <div class="col-6">
    <h4>Posts of the users</h4>
    <table>
    <tr>
    <td class=" p-3">user_id</td>
    <td class=" p-3">caption</td>
    <td class=" p-3">image</td>

    </tr>

    @foreach($posts as $post)
    <tr>
        
        <td class=" p-3">{{$post['user_id']}}</td>
        <td class=" p-3">{{$post['caption']}}</td>
        <td class=" p-3">{{$post['image']}}</td> 
        
    </tr>

    @endforeach
    </table> 
    </div>
    </div>
    

    @endsection
