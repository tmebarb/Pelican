<!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation" >
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="<?php echo base_url() ?>asserts/images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="#" style="color:white"><i class="mdi-action-face-unlock"></i> Profile</a>
                                    </li>
                                    <li><a href="#" style="color:white"><i class="mdi-action-settings"></i> Settings</a>
                                    </li>
                                    <li><a href="#" style="color:white"><i class="mdi-communication-live-help"></i> Help</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url() ?>login/logout" style="color:white"><i class="mdi-action-settings-power"></i> Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"> <?php echo $this->session->userdata('user_fullname') ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal"><?php echo $this->session->userdata('usertype') ?></p>
                            </div>
                        </div>
                    </li>
                    <li class="bold"><a href="index.html" class="waves-effect waves-cyan"><i class="mdi-action-home"></i> Home </a>
                    </li>
                    <li class="bold"><a href="app-email.html" class="waves-effect waves-cyan"><i class="mdi-communication-email"></i> Inbox <span class="new badge">4</span></a>
                    </li>
                    <li class="bold"><a href="app-calendar.html" class="waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Calender</a>
                    </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </li>

                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->