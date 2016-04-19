
 <div class="divider"></div>

            <div id="striped-table">
              
              <div class="row">
                <div class="col s12 m4 l3">
                  
                </div>
                <div class="col s12 m8 l9">
                  <table class="striped">
                    <thead>
                      <tr>
                        <th data-field="id">Name</th>
                        <th data-field="name">Major</th>
                        <th data-field="price">Classification</th>
                        <th data-field="cwid">CWID</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php foreach ($advisor_ID as $row): ?>

                      <tr>
                        <td><?php echo $row->user_fullname ?></td>
                        <td><?php echo $row->classification ?></td>
                        <td><?php echo $row->major ?></td>
                        <td><?php echo $row->CWID ?><</td>
                      </tr>
                        
                      <?php endforeach ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>


                </div>
                <!--end container-->
            </section>
            <!-- END CONTENT <-->