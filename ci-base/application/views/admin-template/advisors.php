
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
                    <tbody>

                      <?php foreach ($alladvisors as $currentRow): ?>

                      <tr>
                        <td><?php echo $currentRow->FirstName ?></td>
                        <td><?php echo $currentRow->LastName ?></td>
                        <td><?php echo $currentRow->Department ?></td>
                      </tr>
                        
                      <?php endforeach ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>