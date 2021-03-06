@extends('layouts.admin')


@section('content')

        <h1>Users</h1>

        @if(Session::has('deleted_user'))

            <p>{{session('deleted_user')}}</p>

        @endif

        <table class="table">
          <thead>
            <tr>
               <th scope="col">Id</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
          </thead>
          <tbody>
          @if($users)
              @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><img height="50" src="{{$user->photo ? $user->photo->file:'https://via.placeholder.com/50'}}" alt=""></td>
                    <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role?$user->role->name:'Has no role'}}</td>
                    <td>{{$user->is_active ==1?'Active':'Not Active'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
              @endforeach

          @endif
          </tbody>
        </table>

@stop