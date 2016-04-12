
 <div class="divider"></div>
      <div id="striped-table">
              
              <div class="row">
                <div class="col s12 m4 l3">
                  <div id="right-search" class="row">
                        <form class="col s12">
                            <div class="input-field">
                                <i class="mdi-action-search prefix"></i>
                                <input id="icon_prefix" type="text" class="validate">
                                <label for="icon_prefix">Search</label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col s12 m8 l9">
                  <table class="striped">
                    <thead>
                      <tr>
                        <th data-field="id">First Name</th>
                        <th data-field="name">Last Name</th>
                        <th data-field="price">Department</th>
                      </tr>
                    </thead>
                    <?php 
                    $this->db->select('u.user_fullname, a.major, a.office_loc');
                    $this->db->from('users u, advisor a');
                    $this->db->where('a.user_id = u.user_id'); 
                    $query = $this->db->get();
                    ?>

                    <tbody>
                      
                      <?php foreach ($query->result() as $row): ?>

                      <tr>
                        <td><?php echo $row->user_fullname ?></td>
                        <td><?php echo $row->major ?></td>
                        <td><?php echo $row->office_loc ?></td>
                      </tr>
                        
                      <?php endforeach ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>