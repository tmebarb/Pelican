
        <script>
            $(document).ready(function(){
              alert(1)
               $('#calendar').fullCalendar( 'renderEvent', {
                                            title: 'title',
                                            start: '2015-05-01',
                                            'color': '#9c27b0'
                                          }, true
                                        );
            });
        </script>

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
        </div>
        <!--end container-->

      </section>
