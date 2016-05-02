<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav" style=" z-index: 9999">
            <ul id="slide-out" class="side-nav fixed leftside-navigation" >
                <li class="user-details cyan darken-2">
                    <div class="row">
                        <div class="col col s4 m4 l4">
                            <img src="<?php echo base_url() ?>asserts/images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                        </div>
                        <div class="col col s8 m8 l8">
                            <ul id="profile-dropdown" class="dropdown-content">
                                <li><a href="<?php echo base_url() ?>Dashboard/profilePage" style="color:white"><i class="mdi-action-face-unlock"></i> Profile</a>
                                </li>
                                <li><a href="<?php echo base_url() ?>Dashboard/profilePage" style="color:white"><i class="mdi-action-settings"></i> Settings</a>
                                </li>
                                <li><a href="#" style="color:white"><i class="mdi-communication-live-help"></i> Help</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url() ?>login/logout" style="color:white"><i class="mdi-action-settings-power"></i> Logout</a>
                                </li>
                            </ul>
                            <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"> <?php echo $this->session->userdata('user_fullname') ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                            <p class="user-roal"><?php echo strtoupper($this->session->userdata('user_type')) ?></p>
                        </div>
                    </div>
                </li>
                <li class="bold"><a href="<?php echo base_url() ?>" class="waves-effect waves-cyan"><i class="mdi-action-home"></i> Home </a>


                    <?php
                    if($this->session->userdata('user_type') =="admin") {
                    ?>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-account-child"></i>All Users</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="<?php echo base_url() ?>dashboard/addadvisor">Add New</a>
                                    </li>
                                    <li><a href="<?php echo base_url() ?>dashboard/advisors" class="waves-effect waves-cyan">List All</a>
                                    </li>
                                    <li><a href="<?php echo base_url() ?>dashboard/changeUserRole">Change User Role</a>
                                    </li>
                                    <li class="bold"><a href="<?php echo base_url() ?>staff_member/advisorToAdvisee"><class="waves-effect waves-cyan">Assign Advisees</a>
                                    </li>
                                </ul>

                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-account-child"></i>Staff Workers</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <!--
                                    <li><a href="css-shadow.html">?????</a>
                                    </li>-->
                                </ul>

                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-account-child"></i>Advisors</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="css-icons.html">View Appointments</a>
                                    </li>
                                </ul>

                            </div>
                        </li>
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-account-child"></i>Advisees</a>
                            <div class="collapsible-body" style="">
                                <ul>
                                    <li><a href="<?php echo base_url() ?>dashboard/changeSWStatus">Student Worker Status</a>
                                    </li>
                                    <li><a href="<?php echo base_url() ?>dashboard/changeHolds">Add/Remove Holds</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>




                <?php } ?>
                <?php
                if($this->session->userdata('user_type') =="advisor") { //contains the advisor sidebar information
                ?>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-module"></i> Advisees</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="<?php echo base_url() ?>Advisor/listAdvisees" class="waves-effect waves-cyan">List All</a>
                                    </li>
                                    <li><a href="<?php echo base_url() ?>Advisor/initChangeMajor" class="waves-effect waves-cyan">Change Major</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="bold"><a href="<?php echo base_url()?>My_calendar" class="waves-effect waves-cyan"><i class="mdi-action-view-headline"></i> My Calendar</a>
                        </li>

                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-module"></i> Scheduling</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li class="bold"><a href="<?php echo base_url() ?>advisor/calender"><i class="mdi-action-view-headline"></i> Make Schedule</a>
                                    </li>

                                    <li class="bold"><a href="<?php echo base_url() ?>advisor/timeslots" class="waves-effect waves-cyan"><i class="mdi-action-alarm-on">
                                            </i> Setup Timeslots (proper WIP)</a>
                                        <!--
                        </li>
                        <li class="bold"><a href="<?php echo base_url() ?>advisor/funTimeSlots" class="waves-effect waves-cyan"><i class="mdi-action-alarm-on">
                        </i> Setup Timeslots (functional)</a>
                        -->
                                    </li>
                                </ul>
                    </ul>
                    <?php } ?>


                    <?php
                    if($this->session->userdata('user_type') =="advisee") {
                    ?>

                <li class="bold"><a href="<?php echo base_url()?>My_calendar" class="waves-effect waves-cyan"><i class="mdi-action-view-headline"></i> My Calendar</a>
                </li>
                <li class="bold"><a href="<?php echo base_url()?>student/addappointment" class="waves-effect waves-cyan"><i class="mdi-action-alarm-on"></i>Add appointment</a>
                </li>
            <?php } ?>

                <?php
                if($this->session->userdata('user_type') =="studentWorker") {
                    ?>

                    <li class="bold"><a href="app-calendar.html" class="waves-effect waves-cyan"><i class="mdi-action-view-headline"></i> Do Something</a>
                    </li>
                <?php } ?>


                <!--<?php
                if($this->session->userdata('user_type') =="admin") {
                    ?>
               <li class="no-padding">
                  <ul class="collapsible collapsible-accordion">
                      <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-module"></i> Advisees</a>
                          <div class="collapsible-body">
                              <ul>
                                  <li><a href="<?php echo base_url() ?>dashboard/db" class="waves-effect waves-cyan">List All</a>
                                  </li>
                              </ul>
                          </div>
                      </li>
           <?php } ?>	-->
                <?php
                if($this->session->userdata('user_type') =="Staff_member") {
                    ?>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-module"></i> Advisees</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php echo base_url() ?>Staff_member/ListAdvisees" class="waves-effect waves-cyan">List All Advisees</a>
                                        </li>
                                        <li><a href="<?php echo base_url() ?>Staff_member/initAddAdvisee">Add Advisee</a>
                                        <li class="bold"><a href="<?php echo base_url() ?>staff_member/deleteAdvisor"><class="waves-effect waves-cyan">Delete Advisee</a>
                                        </li>
                                        <li><a href="<?php echo base_url() ?>staff_member/viewStudentWorker" class="waves-effect waves-cyan">List All Student Worker</a>
                                        </li>
                                        <li><a href="<?php echo base_url() ?>dashboard/changeSWStatus">Student Worker Status</a>
                                        </li>
<!--                                        <li class="bold"><a href="--><?php //echo base_url() ?><!--staff_member/deleteAdvisor"><class="waves-effect waves-cyan">Delete Advisee</a>-->
<!--                                        </li>-->
<!--                                        <li><a href="css-icons.html">Student Worker Status</a>-->
<!--                                        </li>-->
                                        <li><a href="<?php echo base_url() ?>dashboard/changeHolds">Add/Remove Holds</a>
                                        </li>
                                    </ul>
                        </ul>
                    </li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-view-module"></i> Advisors</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php echo base_url() ?>staff_member/ListAdvisors" class="waves-effect waves-cyan">List All Advisors</a>
                                        </li>
                                        <li><a href="<?php echo base_url() ?>Staff_member/initAddAdvisor">Add Advisor</a>
                                        </li>
                                        <li class="bold"><a href="<?php echo base_url() ?>staff_member/deleteAdvisor"><class="waves-effect waves-cyan">Delete Advisor</a>
                                        </li>
                                        <li class="bold"><a href="<?php echo base_url() ?>staff_member/advisorToAdvisee"><class="waves-effect waves-cyan">Assign Advisees</a>
                                        </li>
                                    </ul>
                        </ul>
                    </li>
                <?php } ?>

                <li class="bold"><a href="<?php echo base_url() ?>login/logout"><i class="mdi-action-settings-power"></i> Logout</a>
                </li>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->