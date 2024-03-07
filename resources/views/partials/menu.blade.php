<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('content_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-book">

                        </i>
                        <span>{{ trans('cruds.contentManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('content_category_access')
                            <li class="{{ request()->is("admin/content-categories") || request()->is("admin/content-categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.content-categories.index") }}">
                                    <i class="fa-fw fas fa-folder">

                                    </i>
                                    <span>{{ trans('cruds.contentCategory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('content_tag_access')
                            <li class="{{ request()->is("admin/content-tags") || request()->is("admin/content-tags/*") ? "active" : "" }}">
                                <a href="{{ route("admin.content-tags.index") }}">
                                    <i class="fa-fw fas fa-tags">

                                    </i>
                                    <span>{{ trans('cruds.contentTag.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('content_page_access')
                            <li class="{{ request()->is("admin/content-pages") || request()->is("admin/content-pages/*") ? "active" : "" }}">
                                <a href="{{ route("admin.content-pages.index") }}">
                                    <i class="fa-fw fas fa-file">

                                    </i>
                                    <span>{{ trans('cruds.contentPage.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('search_access')
                <li class="{{ request()->is("admin/searches") || request()->is("admin/searches/*") ? "active" : "" }}">
                    <a href="{{ route("admin.searches.index") }}">
                        <i class="fa-fw fas fa-search">

                        </i>
                        <span>{{ trans('cruds.search.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('certificate_access')
                <li class="{{ request()->is("admin/certificates") || request()->is("admin/certificates/*") ? "active" : "" }}">
                    <a href="{{ route("admin.certificates.index") }}">
                        <i class="fa-fw fas fa-certificate">

                        </i>
                        <span>{{ trans('cruds.certificate.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('institution_access')
                <li class="{{ request()->is("admin/institutions") || request()->is("admin/institutions/*") ? "active" : "" }}">
                    <a href="{{ route("admin.institutions.index") }}">
                        <i class="fa-fw fas fa-school">

                        </i>
                        <span>{{ trans('cruds.institution.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('employer_access')
                <li class="{{ request()->is("admin/employers") || request()->is("admin/employers/*") ? "active" : "" }}">
                    <a href="{{ route("admin.employers.index") }}">
                        <i class="fa-fw fas fa-user-friends">

                        </i>
                        <span>{{ trans('cruds.employer.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('paper_access')
                <li class="{{ request()->is("admin/papers") || request()->is("admin/papers/*") ? "active" : "" }}">
                    <a href="{{ route("admin.papers.index") }}">
                        <i class="fa-fw fas fa-file-alt">

                        </i>
                        <span>{{ trans('cruds.paper.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('upload_access')
                <li class="{{ request()->is("admin/uploads") || request()->is("admin/uploads/*") ? "active" : "" }}">
                    <a href="{{ route("admin.uploads.index") }}">
                        <i class="fa-fw fas fa-upload">

                        </i>
                        <span>{{ trans('cruds.upload.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('complaint_access')
                <li class="{{ request()->is("admin/complaints") || request()->is("admin/complaints/*") ? "active" : "" }}">
                    <a href="{{ route("admin.complaints.index") }}">
                        <i class="fa-fw fas fa-envelope-open">

                        </i>
                        <span>{{ trans('cruds.complaint.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('chat_access')
                <li class="{{ request()->is("admin/chats") || request()->is("admin/chats/*") ? "active" : "" }}">
                    <a href="{{ route("admin.chats.index") }}">
                        <i class="fa-fw fas fa-comment">

                        </i>
                        <span>{{ trans('cruds.chat.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('traction_access')
                <li class="{{ request()->is("admin/tractions") || request()->is("admin/tractions/*") ? "active" : "" }}">
                    <a href="{{ route("admin.tractions.index") }}">
                        <i class="fa-fw fas fa-laptop">

                        </i>
                        <span>{{ trans('cruds.traction.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('analytic_access')
                <li class="{{ request()->is("admin/analytics") || request()->is("admin/analytics/*") ? "active" : "" }}">
                    <a href="{{ route("admin.analytics.index") }}">
                        <i class="fa-fw fas fa-chart-line">

                        </i>
                        <span>{{ trans('cruds.analytic.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('user_alert_access')
                <li class="{{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                    <a href="{{ route("admin.user-alerts.index") }}">
                        <i class="fa-fw fas fa-bell">

                        </i>
                        <span>{{ trans('cruds.userAlert.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('faq_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-question">

                        </i>
                        <span>{{ trans('cruds.faqManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('faq_category_access')
                            <li class="{{ request()->is("admin/faq-categories") || request()->is("admin/faq-categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.faq-categories.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.faqCategory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('faq_question_access')
                            <li class="{{ request()->is("admin/faq-questions") || request()->is("admin/faq-questions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.faq-questions.index") }}">
                                    <i class="fa-fw fas fa-question">

                                    </i>
                                    <span>{{ trans('cruds.faqQuestion.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @php($unread = \App\Models\QaTopic::unreadCount())
                <li class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }}">
                    <a href="{{ route("admin.messenger.index") }}">
                        <i class="fa-fw fa fa-envelope">

                        </i>
                        <span>{{ trans('global.messages') }}</span>
                        @if($unread > 0)
                            <strong>( {{ $unread }} )</strong>
                        @endif

                    </a>
                </li>
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                            <a href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key">
                                </i>
                                {{ trans('global.change_password') }}
                            </a>
                        </li>
                    @endcan
                @endif
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="fas fa-fw fa-sign-out-alt">

                        </i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
        </ul>
    </section>
</aside>