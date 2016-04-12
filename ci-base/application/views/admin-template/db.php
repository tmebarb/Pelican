
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
                      </tr>
                    </thead>
                    <?php 
                    $this->db->select('u.user_fullname, a.major, a.classification');
                    $this->db->from('users u, advisee a');
                    $this->db->where('a.user_id = u.user_id'); 
                    $query = $this->db->get();
                    ?>

                    <tbody>
                      
                      <?php foreach ($query->result() as $row): ?>

                      <tr>
                        <td><?php echo $row->user_fullname ?></td>
                        <td><?php echo $row->major ?></td>
                        <td><?php echo $row->classification ?></td>
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