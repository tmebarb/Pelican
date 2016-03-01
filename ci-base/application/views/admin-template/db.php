   <!-- START CONTENT -->
            <section id="content">

                <!--start container-->
                <div class="container">

 <div class="divider"></div>
 <?php 
      // foreach ($alladvisees as $row) {
      //   echo $row->FirstName;
      // }
  ?>
            <div id="striped-table">
              
              <div class="row">
                <div class="col s12 m4 l3">
                  
                </div>
                <div class="col s12 m8 l9">
                  <table class="striped">
                    <thead>
                      <tr>
                        <th data-field="id">First Name</th>
                        <th data-field="name">Last Name</th>
                        <th data-field="price">Major</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php foreach ($alladvisees as $currentRow): ?>

                      <tr>
                        <td><?php echo $currentRow->FirstName ?></td>
                        <td><?php echo $currentRow->LastName ?></td>
                        <td><?php echo $currentRow->Major ?></td>
                      </tr>
                        
                      <?php endforeach ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>