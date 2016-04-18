<!-- <br>
<a class="btn cyan waves-effect waves-light" style="margin-left: 20px">Request for Appointment</a><span style="margin-left: 20%; font-weight: bold;">Advisor's Agenda</span> -->
        <!--start container-->
        <div class="container">
          <div class="section">
              <div id="full-calendar">              
                <div class="row">
                <!-- <div class="col s12 m6 l3">
                  <div id='external-events'> 

                    <div class='fc-event cyan'>Appointment</div>
                    <div class='fc-event light-blue accent-4'>Company Party</div>
                  </div>
                </div> -->
                <div class="col s12 m12">
                  <div id='calendar'></div>
                </div>
              </div>
            </div>
          </div>
          <!--end container-->
          <!-- Calendar Script -->
          <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/plugins/fullcalendar/lib/jquery-ui.custom.min.js"></script>
          <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/plugins/fullcalendar/lib/moment.min.js"></script>
          <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/plugins/fullcalendar/js/fullcalendar.min.js"></script>
          <script type="text/javascript" src="<?php echo base_url() ?>asserts/js/plugins/fullcalendar/full-wit-add.js"></script>

        </section>
        <script>
          $(document).ready(function(){
            $('#calendar').fullCalendar('today');
               // var event={id:1 , title: 'New event', start:  new Date()};

                // $('#calendar').fullCalendar( 'renderEvent', event, true);
              });
            </script>
