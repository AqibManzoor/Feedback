@php

    $levelAmount = 'level';

    if (Auth::User()->level() >= 2) {
        $levelAmount = 'levels';

    }

@endphp

<div class="card">
    <div class="card-header @role('admin', true) bg-dark text-white @endrole">

        Welcome {{ Auth::user()->name }}

        @role('admin', true)
            <span class="pull-right badge badge-primary" style="margin-top:4px">
                Admin Access
            </span>
        @else
            <span class="pull-right badge badge-warning" style="margin-top:4px">
                User Access
            </span>
        @endrole

    </div>
    <div class="card-body text-center bg-secondary  text-light" style="margin-top:4px; ">
        <h1 class="lead" style="margin-top:4px; font-size:35px; font-weight:600;">
            {{ trans('auth.loggedIn') }}
        </h1>
        
        @role('admin')

            <hr>

        @endrole

    </div>
</div>
