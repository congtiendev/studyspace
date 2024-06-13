
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">
                <?php if(!empty($generalSettings['site_name'])): ?>
                    <?php echo e(strtoupper($generalSettings['site_name'])); ?>

                <?php else: ?>
                    Platform Title
                <?php endif; ?>
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">
                <?php if(!empty($generalSettings['site_name'])): ?>
                    <?php echo e(strtoupper(substr($generalSettings['site_name'],0,2))); ?>

                <?php endif; ?>
            </a>
        </div>

        <ul class="sidebar-menu">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_general_dashboard_show')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/'))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl('')); ?>" class="nav-link">
                        <i class="fas fa-fire"></i>
                        <span><?php echo e(trans('admin/main.dashboard')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_marketing_dashboard')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/marketing', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl('/marketing')); ?>" class="nav-link">
                        <i class="fas fa-chart-pie"></i>
                        <span><?php echo e(trans('admin/main.marketing_dashboard')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if($authUser->can('admin_webinars') or
                $authUser->can('admin_bundles') or
                $authUser->can('admin_categories') or
                $authUser->can('admin_filters') or
                $authUser->can('admin_quizzes') or
                $authUser->can('admin_certificate') or
                $authUser->can('admin_reviews_lists') or
                $authUser->can('admin_webinar_assignments') or
                $authUser->can('admin_enrollment') or
                $authUser->can('admin_waitlists')
            ): ?>
                <li class="menu-header"><?php echo e(trans('site.education')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinars')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/webinars*', false)) and !request()->is(getAdminPanelUrl('/webinars/comments*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-graduation-cap"></i>
                        <span><?php echo e(trans('panel.classes')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinars_list')): ?>
                         <!--   <li class="<?php echo e((request()->is(getAdminPanelUrl('/webinars', false)) and request()->get('type') == 'course') ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['courses']) and $sidebarBeeps['courses']): ?> beep beep-sidebar <?php endif; ?>" href="<?php echo e(getAdminPanelUrl()); ?>/webinars?type=course"><?php echo e(trans('admin/main.courses')); ?></a>
                            </li> -->

                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/webinars', false)) and request()->get('type') == 'webinar') ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['webinars']) and $sidebarBeeps['webinars']): ?> beep beep-sidebar <?php endif; ?>" href="<?php echo e(getAdminPanelUrl()); ?>/webinars?type=webinar"><?php echo e(trans('admin/main.live_classes')); ?></a>
                            </li>

                          <!--   <li class="<?php echo e((request()->is(getAdminPanelUrl('/webinars', false)) and request()->get('type') == 'text_lesson') ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['textLessons']) and $sidebarBeeps['textLessons']): ?> beep beep-sidebar <?php endif; ?>" href="<?php echo e(getAdminPanelUrl()); ?>/webinars?type=text_lesson"><?php echo e(trans('admin/main.text_courses')); ?></a>
                            </li> -->
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinars_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/webinars/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/webinars/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>

                        

                    </ul>
                </li>
            <?php endif; ?>

            

            

            

            

            

            

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_course_noticeboards_list')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/course-noticeboards*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-clipboard-check"></i>
                        <span><?php echo e(trans('update.course_notices')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_course_noticeboards_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/course-noticeboards', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/course-noticeboards"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_course_noticeboards_send')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/course-noticeboards/send', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/course-noticeboards/send"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            

            

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_categories')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/categories*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-th"></i>
                        <span><?php echo e(trans('admin/main.categories')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_categories_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/categories', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/categories"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_categories_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/categories/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/categories/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_trending_categories')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/categories/trends', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/categories/trends"><?php echo e(trans('admin/main.trends')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_filters')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/filters*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-filter"></i>
                        <span><?php echo e(trans('admin/main.filters')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_filters_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/filters', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/filters"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_filters_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/filters/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/filters/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            






            

            

            

            <?php if($authUser->can('admin_users') or
                $authUser->can('admin_roles') or
                $authUser->can('admin_users_not_access_content') or
                $authUser->can('admin_group') or
                $authUser->can('admin_users_badges') or
                $authUser->can('admin_become_instructors_list') or
                $authUser->can('admin_delete_account_requests')
            ): ?>
                <li class="menu-header"><?php echo e(trans('panel.users')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/staffs', false)) or request()->is(getAdminPanelUrl('/students', false)) or request()->is(getAdminPanelUrl('/instructors', false)) or request()->is(getAdminPanelUrl('/organizations', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-users"></i>
                        <span><?php echo e(trans('admin/main.users_list')); ?></span>
                    </a>

                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_staffs_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/staffs', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/staffs"><?php echo e(trans('admin/main.staff')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/students', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/students"><?php echo e(trans('public.students')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_instructors_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/instructors', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/instructors"><?php echo e(trans('home.instructors')); ?></a>
                            </li>
                        <?php endif; ?>

                        

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/users/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/users/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_not_access_content_lists')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/users/not-access-to-content', false))) ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/users/not-access-to-content">
                        <i class="fas fa-user-lock"></i> <span><?php echo e(trans('update.not_access_to_content')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_delete_account_requests')): ?>
                <li class="nav-item <?php echo e((request()->is(getAdminPanelUrl('/users/delete-account-requests*', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/users/delete-account-requests" class="nav-link">
                        <i class="fa fa-user-times"></i>
                        <span><?php echo e(trans('update.delete-account-requests')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_roles')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/roles*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-user-circle"></i> <span><?php echo e(trans('admin/main.roles')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_roles_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/roles', false))) ? 'active' : ''); ?>">
                                <a class="nav-link active" href="<?php echo e(getAdminPanelUrl()); ?>/roles"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_roles_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/roles/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/roles/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_group')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/users/groups*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-sitemap"></i>
                        <span><?php echo e(trans('admin/main.groups')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_group_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/users/groups', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/users/groups"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_group_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/users/groups/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/users/groups/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users_badges')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/users/badges', false))) ? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/users/badges">
                        <i class="fas fa-trophy"></i>
                        <span><?php echo e(trans('admin/main.badges')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            

            

            

            

            

            <?php if($authUser->can('admin_supports') or
                $authUser->can('admin_comments') or
                $authUser->can('admin_reports') or
                $authUser->can('admin_contacts') or
                $authUser->can('admin_noticeboards') or
                $authUser->can('admin_notifications')
            ): ?>
                <li class="menu-header"><?php echo e(trans('admin/main.crm')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_supports')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/supports*', false)) and request()->get('type') != 'course_conversations') ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-headphones"></i>
                        <span><?php echo e(trans('admin/main.supports')); ?></span>
                    </a>

                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_supports_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/supports', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/supports"><?php echo e(trans('public.tickets')); ?></a>
                            </li>
                        <?php endif; ?>

                        

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_support_departments')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/supports/departments', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/supports/departments"><?php echo e(trans('admin/main.departments')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_support_course_conversations')): ?>
                    <li class="<?php echo e((request()->is(getAdminPanelUrl('/supports*', false)) and request()->get('type') == 'course_conversations') ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/supports?type=course_conversations">
                            <i class="fas fa-envelope-square"></i>
                            <span><?php echo e(trans('admin/main.classes_conversations')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_comments')): ?>
                <li class="nav-item dropdown <?php echo e((!request()->is(getAdminPanelUrl('admin/comments/products, false')) and (request()->is(getAdminPanelUrl('/comments*', false)) and !request()->is(getAdminPanelUrl('/comments/webinars/reports', false)))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-comments"></i> <span><?php echo e(trans('admin/main.comments')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_webinar_comments')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/comments/webinars', false))) ? 'active' : ''); ?>">
                                <a class="nav-link <?php if(!empty($sidebarBeeps['classesComments']) and $sidebarBeeps['classesComments']): ?> beep beep-sidebar <?php endif; ?>" href="<?php echo e(getAdminPanelUrl()); ?>/comments/webinars"><?php echo e(trans('admin/main.classes_comments')); ?></a>
                            </li>
                        <?php endif; ?>

                      
                    </ul>
                </li>
            <?php endif; ?>

            

            

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_noticeboards')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/noticeboards*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-sticky-note"></i> <span><?php echo e(trans('admin/main.noticeboard')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_noticeboards_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/noticeboards', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/noticeboards"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_noticeboards_send')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/noticeboards/send', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/noticeboards/send"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/notifications*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        <span><?php echo e(trans('admin/main.notifications')); ?></span>
                    </a>

                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/notifications', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/notifications"><?php echo e(trans('public.history')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_posted_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/notifications/posted', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/notifications/posted"><?php echo e(trans('admin/main.posted')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_send')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/notifications/send', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/notifications/send"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_templates')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/notifications/templates', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/notifications/templates"><?php echo e(trans('admin/main.templates')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_notifications_template_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/notifications/templates/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/notifications/templates/create"><?php echo e(trans('admin/main.new_template')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if($authUser->can('admin_blog') or
                $authUser->can('admin_pages') or
                $authUser->can('admin_additional_pages') or
                $authUser->can('admin_testimonials') or
                $authUser->can('admin_tags') or
                $authUser->can('admin_regions') or
                $authUser->can('admin_store') or
                $authUser->can('admin_forms') or
                $authUser->can('admin_ai_contents')
            ): ?>
                <li class="menu-header"><?php echo e(trans('admin/main.content')); ?></li>
            <?php endif; ?>

            

            

           <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_pages')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/pages*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-pager"></i>
                        <span><?php echo e(trans('admin/main.pages')); ?></span>
                    </a>

                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_pages_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/pages', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/pages"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_pages_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/pages/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/pages/create"><?php echo e(trans('admin/main.new_page')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?> 
            -->

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_additional_pages')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/additional_page*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-plus-circle"></i> <span><?php echo e(trans('admin/main.additional_pages_title')); ?></span></a>
                    <ul class="dropdown-menu">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_additional_pages_404')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/additional_page/404', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/additional_page/404"><?php echo e(trans('admin/main.error_404')); ?></a>
                            </li>
                        <?php endif; ?>

                    <!--    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_additional_pages_contact_us')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/additional_page/contact_us', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/additional_page/contact_us"><?php echo e(trans('admin/main.contact_us')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_additional_pages_footer')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/additional_page/footer', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/additional_page/footer"><?php echo e(trans('admin/main.footer')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_additional_pages_navbar_links')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/additional_page/navbar_links', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/additional_page/navbar_links"><?php echo e(trans('admin/main.top_navbar')); ?></a>
                            </li> 
                        <?php endif; ?>-->
                    </ul>
                </li>
            <?php endif; ?>

            

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_tags')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/tags', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/tags" class="nav-link">
                        <i class="fas fa-tags"></i>
                        <span><?php echo e(trans('admin/main.tags')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            

            

            

            <?php if($authUser->can('admin_documents') or
                $authUser->can('admin_sales_list') or
                $authUser->can('admin_payouts') or
                $authUser->can('admin_offline_payments_list') or
                $authUser->can('admin_subscribe') or
                $authUser->can('admin_registration_packages') or
                $authUser->can('admin_installments')
            ): ?>
                <li class="menu-header"><?php echo e(trans('admin/main.financial')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_documents')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/financial/documents*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span><?php echo e(trans('admin/main.balances')); ?></span>
                    </a>
                    <ul class="dropdown-menu">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_documents_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/documents', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/documents"><?php echo e(trans('admin/main.list')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_documents_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/documents/new', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/documents/new"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_sales_list')): ?>
                <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/sales*', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/financial/sales" class="nav-link">
                        <i class="fas fa-list-ul"></i>
                        <span><?php echo e(trans('admin/main.sales_list')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

         <!--   <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_payouts')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/financial/payouts*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-credit-card"></i> <span><?php echo e(trans('admin/main.payout')); ?></span></a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_payouts_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/payouts', false)) and request()->get('payout') == 'requests') ? 'active' : ''); ?>">
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/financial/payouts?payout=requests" class="nav-link <?php if(!empty($sidebarBeeps['payoutRequest']) and $sidebarBeeps['payoutRequest']): ?> beep beep-sidebar <?php endif; ?>">
                                    <span><?php echo e(trans('panel.requests')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_payouts_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/payouts', false)) and request()->get('payout') == 'history') ? 'active' : ''); ?>">
                                <a href="<?php echo e(getAdminPanelUrl()); ?>/financial/payouts?payout=history" class="nav-link">
                                    <span><?php echo e(trans('public.history')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?> -->

            

           


            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_rewards')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/rewards*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fa fa-gift"></i>
                        <span><?php echo e(trans('update.rewards')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_rewards_history')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/rewards', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/rewards"><?php echo e(trans('public.history')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_rewards_items')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/rewards/items', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/rewards/items"><?php echo e(trans('update.conditions')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_rewards_settings')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/rewards/settings', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/rewards/settings"><?php echo e(trans('admin/main.settings')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            

            

            <?php if($authUser->can('admin_discount_codes') or
                $authUser->can('admin_product_discount') or
                $authUser->can('admin_feature_webinars') or
                $authUser->can('admin_gift') or
                $authUser->can('admin_promotion') or
                $authUser->can('admin_advertising') or
                $authUser->can('admin_newsletters') or
                $authUser->can('admin_advertising_modal') or
                $authUser->can('admin_registration_bonus') or
                $authUser->can('admin_floating_bar_create')
            ): ?>
                <li class="menu-header"><?php echo e(trans('admin/main.marketing')); ?></li>
            <?php endif; ?>

            

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_product_discount')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/financial/special_offers*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fa fa-fire"></i>
                        <span><?php echo e(trans('admin/main.special_offers')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_product_discount_list')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/special_offers', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/special_offers"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_product_discount_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/financial/special_offers/new', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/financial/special_offers/new"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

        <!--    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_feature_webinars')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/webinars/features*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-star"></i>
                        <span><?php echo e(trans('admin/main.feature_webinars')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_feature_webinars')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/webinars/features', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/webinars/features"><?php echo e(trans('admin/main.lists')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_feature_webinars_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/webinars/features/create', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/webinars/features/create"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?> -->



            

            

            
<!--
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_advertising')): ?>
                <li class="nav-item dropdown <?php echo e((request()->is(getAdminPanelUrl('/advertising*', false)) and !request()->is(getAdminPanelUrl('/advertising_modal*', false))) ? 'active' : ''); ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-file-image"></i>
                        <span><?php echo e(trans('admin/main.ad_banners')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_advertising_banners')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/advertising/banners', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/advertising/banners"><?php echo e(trans('admin/main.list')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_advertising_banners_create')): ?>
                            <li class="<?php echo e((request()->is(getAdminPanelUrl('/advertising/banners/new', false))) ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/advertising/banners/new"><?php echo e(trans('admin/main.new')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?> -->

            

            

            

           <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_advertising_modal_config')): ?>
                <li class="nav-item <?php echo e((request()->is(getAdminPanelUrl('/advertising_modal*', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/advertising_modal" class="nav-link">
                        <i class="fa fa-ad"></i>
                        <span><?php echo e(trans('update.advertising_modal')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_floating_bar_create')): ?>
                <li class="nav-item <?php echo e((request()->is(getAdminPanelUrl('/floating_bars*', false))) ? 'active' : ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/floating_bars" class="nav-link">
                        <i class="fa fa-pager"></i>
                        <span><?php echo e(trans('update.top_bottom_bar')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            -->

            <?php if($authUser->can('admin_settings')): ?>
                <li class="menu-header"><?php echo e(trans('admin/main.settings')); ?></li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_settings')): ?>
                <?php
                    $settingClass ='';

                    if (request()->is(getAdminPanelUrl('/settings*', false)) and
                            !(
                                request()->is(getAdminPanelUrl('/settings/404', false)) or
                                request()->is(getAdminPanelUrl('/settings/contact_us', false)) or
                                request()->is(getAdminPanelUrl('/settings/footer', false)) or
                                request()->is(getAdminPanelUrl('/settings/navbar_links', false))
                            )
                        ) {
                            $settingClass = 'active';
                        }
                ?>

                <li class="nav-item <?php echo e($settingClass ?? ''); ?>">
                    <a href="<?php echo e(getAdminPanelUrl()); ?>/settings" class="nav-link">
                        <i class="fas fa-cogs"></i>
                        <span><?php echo e(trans('admin/main.settings')); ?></span>
                    </a>
                </li>
            <?php endif; ?>


            <li>
                <a class="nav-link" href="<?php echo e(getAdminPanelUrl()); ?>/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span><?php echo e(trans('admin/main.logout')); ?></span>
                </a>
            </li>

        </ul>
        <br><br><br>
    </aside>
</div>
Đang hiển thị 6793924751681330817.<?php /**PATH /home/admin/domains/snapstudy.edu.vn/public_html/resources/views/admin/includes/sidebar.blade.php ENDPATH**/ ?>