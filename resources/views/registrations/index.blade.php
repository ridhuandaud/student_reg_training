@extends('layouts.app')

@section('content')
    <div class="m-5">
        @if(session()->has('message') && session()->get('status'))
            <div class="alert alert-success" role="alert">
                {{session()->get('message')}}
            </div>
        @endif
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">IC Number</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Race</th>
                    <th scope="col">Religion</th>
                    <th scope="col">School</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registrations as $key => $registration)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$registration->student->full_name}}</td>
                        <td>{{$registration->student->ic_number}}</td>
                        <td>{{$registration->student->dob}}</td>
                        <td>{{$registration->student->gender->name}}</td>
                        <td>{{$registration->student->race->name}}</td>
                        <td>{{$registration->student->religion->name}}</td>
                        <td>{{$registration->school->name}}</td>
                        <td><span class="badge badge-{{$registration->status->id == \App\Registration::STATUS_PENDING ? 'warning' : ($registration->status->id == \App\Registration::STATUS_ACCEPTED ? 'success' : 'danger')}}">{{$registration->status->name}}</span></td>
                        <td>
                            @if($registration->status->id == \App\Registration::STATUS_PENDING)
                                <div class="btn-group" role="group">
                                    <a href="{{route('registrations.approve', $registration->id)}}" class="btn btn-success">Approve</a>
                                    <a href="{{route('registrations.reject', $registration->id)}}" class="btn btn-danger">Reject</a>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection