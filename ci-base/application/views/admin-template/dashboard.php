 

            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!-- START CONTENT -->
            <section id="content">

                <!--start container-->
                <div class="container">

                    <!-- //////////////////////////////////////////////////////////////////////////// -->

                    <!--card stats end-->

                    <!-- //////////////////////////////////////////////////////////////////////////// -->

                    <!--card widgets start-->
                    <div id="card-widgets">
                        <div class="row">
                            <?php if($this->session->userdata("user_type") == "advisor") { ?>
                            <div class="col s12 m12 l4">
                                <ul id="task-card" class="collection with-header">
                                    <li class="collection-header grey">
                                        <h4 class="task-card-title">Today's Advisee to Advise</h4>
                                        <p class="task-card-date"><?php echo date('Y-m-d') ?></p>
                                    </li>
                                    <?php
                                        foreach($advisees as $advisee) {
                                            ?>

                                            <li class="collection-item dismissable">
                                                <p><?php echo $advisee->user_fullname ?></p>
                                                <span class="task-cat teal">email:<?php echo $advisee->user_email ?></span>
                                            </li>
                                    <?
                                        }
                                    ?>


                                </ul>
                            </div>
                            <?php } ?>
                            <div class="col s12 m6 l4">
                                <div id="flight-card" class="card">
                                    <div class="card-header amber darken-2">
                                        <div class="card-title">
                                            <h4 class="flight-card-title">Weather</h4>
                                            <p class="flight-card-date">June 18, Thu 04:50</p>
                                        </div>
                                    </div>
                                    <div class="card-content-bg white-text">
                                        <div class="card-content">
                                            <div class="row flight-state-wrapper">
                                                <div class="col s5 m5 l5 center-align">
                                                    <div class="flight-state">
                                                        <h4 class="margin">Monroe</h4>
                                                        <p class="ultra-small">Louisiana</p>
                                                    </div>
                                                </div>
                                                <div class="col s2 m2 l2 center-align">
                                                    <i class="mdi-device-airplanemode-on flight-icon"></i>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col s6 m6 16 center-align">
                                                    <div class="flight-info">
                                                        <p class="small"><span class="grey-text text-lighten-4">Temperature:</span> 04.50</p>
                                                        <p class="small"><span class="grey-text text-lighten-4">Humidity:</span> IB 5786</p>
                                                        <p class="small"><span class="grey-text text-lighten-4">High:</span> B</p>
														<p class="small"><span class="grey-text text-lighten-4">Low:</span> B</p>
                                                    </div>
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

  
                    </div>
                    <!--card widgets end-->

                    <!-- //////////////////////////////////////////////////////////////////////////// -->

                    <!--work collections start-->
                    
                    <!--work collections end-->

                </div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->
