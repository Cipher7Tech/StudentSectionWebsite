<?php
                $DiplomaCheck = $_POST('admitted');
                if($DiplomaCheck=='Diploma'){
                ?>
                <tr style="display: none;">
                  <td>Diploma 5th & 6th Mark Sheet</td>
                  <td><!-- For Diploma Mark Sheet 5th & 6th upload -->
                    <div class="custom-uploader">
                      <input type="file" name="diploma-score-card" id="file" />
                    </div>
                  </td>
                </tr>
                <?php 
                }
                ?>