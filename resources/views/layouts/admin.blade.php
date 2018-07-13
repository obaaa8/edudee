@extends('layouts.app')

@section('content')
<div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="{{ route('college')}}" class="list-group-item">
                            <span class="fa fa-university"></span>
                            Colleges
                        </a>
                        <a href="{{ route('dept')}}" class="list-group-item">
                            <span class="fa fa-graduation-cap"></span>
                            Departments
                        </a>
                        <a href="{{ route('subject')}}" class="list-group-item">
                            <span class="fa fa-book"></span>
                            Subjects
                        </a>
                        
                    </div>
                </div>
                <div class="col-md-9">
                    @yield('main')
                </div>
            </div>
        </div>

        @endsection