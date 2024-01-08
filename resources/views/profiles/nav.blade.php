<div class="col-12 col-sm-4 col-md-3 profile-sidebar text-white rounded-left-sm-up">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                  
                                    <a class="nav-link" data-toggle="pill" href=".edit-settings-tab" role="tab" aria-controls="edit-settings-tab" aria-selected="false">
                                        {{ trans('profile.editAccountTitle') }}
                                    </a>

                                    <a class="nav-link" data-toggle="pill" href=".edit-account-tab" role="tab" aria-controls="edit-settings-tab" aria-selected="false">
                                        {{ trans('profile.editAccountAdminTitle') }}
                                    </a>
                                    @role('user')
                                        <a class="nav-link"  href="{{route('my.feedback')}}"  aria-selected="false">Feedback</a>
                                        @endrole
                                </div>
                            </div>