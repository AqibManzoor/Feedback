@extends('layouts.app')

@section('template_title')
{{ trans('profile.templateTitle') }}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card border-0">
                <div class="card-body p-0">
                    @if ($user->profile)
                    @if (Auth::user()->id == $user->id)
                    <div class="container">
                        <div class="row">
                        @include('profiles.nav')
                            <div class="col-12 col-sm-8 col-md-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                   

                                    <div class="tab-pane fade show active edit-settings-tab" role="tabpanel" aria-labelledby="edit-settings-tab">
                                        {!! Form::model($user, array('action' => array('ProfilesController@updateUserAccount', $user->id), 'method' => 'PUT', 'id' => 'user_basics_form')) !!}

                                        {!! csrf_field() !!}

                                        <div class="pt-4 pr-3 pl-2 form-group has-feedback row {{ $errors->has('name') ? ' has-error ' : '' }}">
                                            {!! Form::label('name', trans('forms.create_user_label_username'), array('class' => 'col-md-3 control-label')); !!}
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    {!! Form::text('name', $user->name, array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_username'))) !!}
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="name">
                                                            <i class="fa fa-fw {{ trans('forms.create_user_icon_username') }}" aria-hidden="true"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                @if($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="pr-3 pl-2 form-group has-feedback row {{ $errors->has('email') ? ' has-error ' : '' }}">
                                            {!! Form::label('email', trans('forms.create_user_label_email'), array('class' => 'col-md-3 control-label')); !!}
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    {!! Form::text('email', $user->email, array('id' => 'email', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_email'))) !!}
                                                    <div class="input-group-append">
                                                        <label for="email" class="input-group-text">
                                                            <i class="fa fa-fw {{ trans('forms.create_user_icon_email') }}" aria-hidden="true"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="pr-3 pl-2 form-group has-feedback row {{ $errors->has('first_name') ? ' has-error ' : '' }}">
                                            {!! Form::label('first_name', trans('forms.create_user_label_firstname'), array('class' => 'col-md-3 control-label')); !!}
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    {!! Form::text('first_name', $user->first_name, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_firstname'))) !!}
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="first_name">
                                                            <i class="fa fa-fw {{ trans('forms.create_user_icon_firstname') }}" aria-hidden="true"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                @if($errors->has('first_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="pr-3 pl-2 form-group has-feedback row {{ $errors->has('last_name') ? ' has-error ' : '' }}">
                                            {!! Form::label('last_name', trans('forms.create_user_label_lastname'), array('class' => 'col-md-3 control-label')); !!}
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    {!! Form::text('last_name', $user->last_name, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))) !!}
                                                    <div class="input-group-append">
                                                        <label class="input-group-text" for="last_name">
                                                            <i class="fa fa-fw {{ trans('forms.create_user_icon_lastname') }}" aria-hidden="true"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                @if($errors->has('last_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-9 offset-md-3">
                                                {!! Form::button(
                                                '<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('profile.submitProfileButton'),
                                                array(
                                                'class' => 'btn btn-success disabled',
                                                'id' => 'account_save_trigger',
                                                'disabled' => true,
                                                'type' => 'button',
                                                'data-submit' => trans('profile.submitProfileButton'),
                                                'data-target' => '#confirmForm',
                                                'data-modalClass' => 'modal-success',
                                                'data-toggle' => 'modal',
                                                'data-title' => trans('modals.edit_user__modal_text_confirm_title'),
                                                'data-message' => trans('modals.edit_user__modal_text_confirm_message')
                                                )) !!}
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>

                                    <div class="tab-pane fade edit-account-tab" role="tabpanel" aria-labelledby="edit-account-tab">
                                        <ul class="account-admin-subnav nav nav-pills nav-justified margin-bottom-3 margin-top-1">
                                            <li class="nav-item bg-info">
                                                <a data-toggle="pill" href="#changepw" class="nav-link warning-pill-trigger text-white active" aria-selected="true">
                                                    {{ trans('profile.changePwPill') }}
                                                </a>
                                            </li>
                                            <li class="nav-item bg-info">
                                                <a data-toggle="pill" href="#deleteAccount" class="nav-link danger-pill-trigger text-white">
                                                    {{ trans('profile.deleteAccountPill') }}
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">

                                            <div id="changepw" class="tab-pane fade show active">

                                                <h3 class="margin-bottom-1 text-center text-warning">
                                                    {{ trans('profile.changePwTitle') }}
                                                </h3>

                                                {!! Form::model($user, array('action' => array('ProfilesController@updateUserPassword', $user->id), 'method' => 'PUT', 'autocomplete' => 'new-password')) !!}

                                                <div class="pw-change-container margin-bottom-2">

                                                    <div class="form-group has-feedback row {{ $errors->has('password') ? ' has-error ' : '' }}">
                                                        {!! Form::label('password', trans('forms.create_user_label_password'), array('class' => 'col-md-3 control-label')); !!}
                                                        <div class="col-md-9">
                                                            {!! Form::password('password', array('id' => 'password', 'class' => 'form-control ', 'placeholder' => trans('forms.create_user_ph_password'), 'autocomplete' => 'new-password')) !!}
                                                            @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group has-feedback row {{ $errors->has('password_confirmation') ? ' has-error ' : '' }}">
                                                        {!! Form::label('password_confirmation', trans('forms.create_user_label_pw_confirmation'), array('class' => 'col-md-3 control-label')); !!}
                                                        <div class="col-md-9">
                                                            {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_pw_confirmation'))) !!}
                                                            <span id="pw_status"></span>
                                                            @if ($errors->has('password_confirmation'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-9 offset-md-3">
                                                        {!! Form::button(
                                                        '<i class="fa fa-fw fa-save" aria-hidden="true"></i> ' . trans('profile.submitPWButton'),
                                                        array(
                                                        'class' => 'btn btn-warning',
                                                        'id' => 'pw_save_trigger',
                                                        'disabled' => true,
                                                        'type' => 'button',
                                                        'data-submit' => trans('profile.submitButton'),
                                                        'data-target' => '#confirmForm',
                                                        'data-modalClass' => 'modal-warning',
                                                        'data-toggle' => 'modal',
                                                        'data-title' => trans('modals.edit_user__modal_text_confirm_title'),
                                                        'data-message' => trans('modals.edit_user__modal_text_confirm_message')
                                                        )) !!}
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}

                                            </div>

                                            <div id="deleteAccount" class="tab-pane fade">
                                                <h3 class="margin-bottom-1 text-center text-danger">
                                                    {{ trans('profile.deleteAccountTitle') }}
                                                </h3>
                                                <p class="margin-bottom-2 text-center">
                                                    <i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
                                                    <strong>Deleting</strong> your account is <u><strong>permanent</strong></u> and <u><strong>cannot</strong></u> be undone.
                                                    <i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
                                                </p>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-6 offset-sm-3 margin-bottom-3 text-center">

                                                        {!! Form::model($user, array('action' => array('ProfilesController@deleteUserAccount', $user->id), 'method' => 'DELETE')) !!}

                                                        <div class="btn-group btn-group-vertical margin-bottom-2 custom-checkbox-fa" data-toggle="buttons">
                                                            <label class="btn no-shadow" for="checkConfirmDelete">
                                                                <input type="checkbox" name='checkConfirmDelete' id="checkConfirmDelete">
                                                                <i class="fa fa-square-o fa-fw fa-2x"></i>
                                                                <i class="fa fa-check-square-o fa-fw fa-2x"></i>
                                                                <span class="margin-left-2"> Confirm Account Deletion</span>
                                                            </label>
                                                        </div>

                                                        {!! Form::button(
                                                        '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> ' . trans('profile.deleteAccountBtn'),
                                                        array(
                                                        'class' => 'btn btn-block btn-danger',
                                                        'id' => 'delete_account_trigger',
                                                        'disabled' => true,
                                                        'type' => 'button',
                                                        'data-toggle' => 'modal',
                                                        'data-submit' => trans('profile.deleteAccountBtnConfirm'),
                                                        'data-target' => '#confirmForm',
                                                        'data-modalClass' => 'modal-danger',
                                                        'data-title' => trans('profile.deleteAccountConfirmTitle'),
                                                        'data-message' => trans('profile.deleteAccountConfirmMsg')
                                                        )
                                                        ) !!}

                                                        {!! Form::close() !!}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade my-feedback" role="tabpanel" aria-labelledby="my-feedback">
                                        <ul class="account-admin-subnav nav nav-pills nav-justified margin-bottom-3 margin-top-1">
                                            <li class="nav-item bg-info">
                                                <a data-toggle="pill" href="#changepw" class="nav-link warning-pill-trigger text-white active" aria-selected="true">
                                                    {{ trans('profile.changePwPill') }}
                                                </a>
                                            </li>
                                            <li class="nav-item bg-info">
                                                <a data-toggle="pill" href="#deleteAccount" class="nav-link danger-pill-trigger text-white">
                                                    {{ trans('profile.deleteAccountPill') }}
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">

                                            <div id="changepw" class="tab-pane fade show active">

                                                <div class="row">
                                                    <div class="col-lg-10 offset-lg-1">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <div style="display: flex; justify-content: space-between; align-items: center;">

                                                                    <span id="card_title">
                                                                        Showing All Feedbacks
                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <div class="card-body">

                                                                <div class="row">
                                                                    <div class="col-sm-8 offset-sm-4 col-md-6 offset-md-6 col-lg-5 offset-lg-7 col-xl-4 offset-xl-8">
                                                                        <form method="POST" action="http://127.0.0.1:8000/search-users" accept-charset="UTF-8" role="form" class="needs-validation" id="search_users"><input name="_token" type="hidden" value="8hvzjXLD4MkmbGPKTV2Ri6xL4aITeSIyoQccJOyC">
                                                                            <input type="hidden" name="_token" value="8hvzjXLD4MkmbGPKTV2Ri6xL4aITeSIyoQccJOyC" autocomplete="off">
                                                                            <div class="input-group mb-3">
                                                                                <input id="user_search_box" class="form-control" placeholder="Search Feedback" aria-label="Search Feedback" name="user_search_box" type="text">
                                                                                <div class="input-group-append">
                                                                                    <a href="#" class="input-group-addon btn btn-warning clear-search" data-toggle="tooltip" title="Clear Search Results" style="display:none;">
                                                                                        <i class="fa fa-fw fa-times" aria-hidden="true"></i>
                                                                                        <span class="sr-only">
                                                                                            Clear Search Results
                                                                                        </span>
                                                                                    </a>
                                                                                    <a href="#" class="input-group-addon btn btn-secondary" id="search_trigger" data-toggle="tooltip" data-placement="bottom" title="Submit Users Search">
                                                                                        <i class="fa fa-search fa-fw" aria-hidden="true"></i>
                                                                                        <span class="sr-only">
                                                                                            Submit Feedback
                                                                                        </span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div id="deleteAccount" class="tab-pane fade">
                                                <h3 class="margin-bottom-1 text-center text-danger">
                                                    {{ trans('profile.deleteAccountTitle') }}
                                                </h3>
                                                <p class="margin-bottom-2 text-center">
                                                    <i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
                                                    <strong>Deleting</strong> your account is <u><strong>permanent</strong></u> and <u><strong>cannot</strong></u> be undone.
                                                    <i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true"></i>
                                                </p>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-6 offset-sm-3 margin-bottom-3 text-center">

                                                        {!! Form::model($user, array('action' => array('ProfilesController@deleteUserAccount', $user->id), 'method' => 'DELETE')) !!}

                                                        <div class="btn-group btn-group-vertical margin-bottom-2 custom-checkbox-fa" data-toggle="buttons">
                                                            <label class="btn no-shadow" for="checkConfirmDelete">
                                                                <input type="checkbox" name='checkConfirmDelete' id="checkConfirmDelete">
                                                                <i class="fa fa-square-o fa-fw fa-2x"></i>
                                                                <i class="fa fa-check-square-o fa-fw fa-2x"></i>
                                                                <span class="margin-left-2"> Confirm Account Deletion</span>
                                                            </label>
                                                        </div>

                                                        {!! Form::button(
                                                        '<i class="fa fa-trash-o fa-fw" aria-hidden="true"></i> ' . trans('profile.deleteAccountBtn'),
                                                        array(
                                                        'class' => 'btn btn-block btn-danger',
                                                        'id' => 'delete_account_trigger',
                                                        'disabled' => true,
                                                        'type' => 'button',
                                                        'data-toggle' => 'modal',
                                                        'data-submit' => trans('profile.deleteAccountBtnConfirm'),
                                                        'data-target' => '#confirmForm',
                                                        'data-modalClass' => 'modal-danger',
                                                        'data-title' => trans('profile.deleteAccountConfirmTitle'),
                                                        'data-message' => trans('profile.deleteAccountConfirmMsg')
                                                        )
                                                        ) !!}

                                                        {!! Form::close() !!}

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <p>{{ trans('profile.notYourProfile') }}</p>
                    @endif
                    @else
                    <p>{{ trans('profile.noProfileYet') }}</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@include('modals.modal-form')

@endsection

@section('footer_scripts')

@include('scripts.form-modal-script')

@if(config('settings.googleMapsAPIStatus'))
@include('scripts.gmaps-address-lookup-api3')
@endif

@include('scripts.user-avatar-dz')

<script type="text/javascript">
    $('.dropdown-menu li a').click(function() {
        $('.dropdown-menu li').removeClass('active');
    });

    $('.profile-trigger').click(function() {
        $('.panel').alterClass('card-*', 'card-default');
    });

    $('.settings-trigger').click(function() {
        $('.panel').alterClass('card-*', 'card-info');
    });

    $('.admin-trigger').click(function() {
        $('.panel').alterClass('card-*', 'card-warning');
        $('.edit_account .nav-pills li, .edit_account .tab-pane').removeClass('active');
        $('#changepw')
            .addClass('active')
            .addClass('in');
        $('.change-pw').addClass('active');
    });

    $('.warning-pill-trigger').click(function() {
        $('.panel').alterClass('card-*', 'card-warning');
    });

    $('.danger-pill-trigger').click(function() {
        $('.panel').alterClass('card-*', 'card-danger');
    });

    $('#user_basics_form').on('keyup change', 'input, select, textarea', function() {
        $('#account_save_trigger').attr('disabled', false).removeClass('disabled').show();
    });

    $('#user_profile_form').on('keyup change', 'input, select, textarea', function() {
        $('#confirmFormSave').attr('disabled', false).removeClass('disabled').show();
    });

    $('#checkConfirmDelete').change(function() {
        var submitDelete = $('#delete_account_trigger');
        var self = $(this);

        if (self.is(':checked')) {
            submitDelete.attr('disabled', false);
        } else {
            submitDelete.attr('disabled', true);
        }
    });

    $("#password_confirmation").keyup(function() {
        checkPasswordMatch();
    });

    $("#password, #password_confirmation").keyup(function() {
        enableSubmitPWCheck();
    });

    $('#password, #password_confirmation').hidePassword(true);

    $('#password').password({
        shortPass: 'The password is too short',
        badPass: 'Weak - Try combining letters & numbers',
        goodPass: 'Medium - Try using special charecters',
        strongPass: 'Strong password',
        containsUsername: 'The password contains the username',
        enterPass: false,
        showPercent: false,
        showText: true,
        animate: true,
        animateSpeed: 50,
        username: false, // select the username field (selector or jQuery instance) for better password checks
        usernamePartialMatch: true,
        minimumLength: 6
    });

    function checkPasswordMatch() {
        var password = $("#password").val();
        var confirmPassword = $("#password_confirmation").val();
        if (password != confirmPassword) {
            $("#pw_status").html("Passwords do not match!");
        } else {
            $("#pw_status").html("Passwords match.");
        }
    }

    function enableSubmitPWCheck() {
        var password = $("#password").val();
        var confirmPassword = $("#password_confirmation").val();
        var submitChange = $('#pw_save_trigger');
        if (password != confirmPassword) {
            submitChange.attr('disabled', true);
        } else {
            submitChange.attr('disabled', false);
        }
    }
</script>

@endsection