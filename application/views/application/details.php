<?php include_once 'Headerlogin.php';?>
<div id="page-wrapper">
    <div id='first'>
        <div class='col-md-6'>
            <table class='table'>
                
                  
                <th class="tahead active"><p><h4>Personal Details and selected course</h4></p></th>
               
                <tr>
                    <td>
                        Full name:<?php
                        echo '<strong>'.$title.'</strong>'.' '.$sname.' '.$other_nam;echo "<br>"
                         ?> 
                    </td>
                </tr>
                <tr>
                    <td>Date of birth:<?php echo ' '.$datebirth; echo '<br>';?></td>
                </tr>
                <tr>
                    <td>Country of birth:<?php echo ' '.$country;?></td>
                </tr>
                <tr>
                    <td>Nationaliy:<?php echo ' '.$nationalt;?></td>
                </tr>
                <tr>
                    <td>Permanent address:<?php echo ' '.$perm_addres;?></td>
                </tr>
                <tr>
                    <td>Mobile number:<?php echo ' '.$mobil;?></td>
                </tr>
                <tr>
                    <td>Landlne number:<?php echo ' '.$landlin;?></td>
                </tr>
                <tr>
                   <td>Fax number:<?php echo ' '.$fax;?></td>
                </tr>
                <tr>
                    <td>Email:<?php echo ' '.$email;?></td>
                </tr>
                <tr>
                    <td>Disable:<?php echo ' '.$disability;?></td>
                </tr>
                <tr>
                    <td> Selected course:  <?php echo ' '.$Ucourse;?></td>
                </tr>
                <tr>
                    <td>
                        Collage: <?php echo ' '.$Ucollege;?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Program mode: <?php echo ' '.$prog_mod;?>
                    </td>
                </tr>
               
            </table>
        </div>
        <div class='col-md-6'>
            <table class='table'>
                <th class="tahead active"><p><h4>Education background and employement details</h4></p></th>
                
                <tr>
                    <td>
                        Highest education attained: <?php echo ' '.$high_edu;?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Specialization: <?php echo ' '.$specializ;?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Institute: <?php echo ' '.$institut;?>
                    </td>
                </tr>
                <tr>
                    <td>
                       Year of graduation: <?php echo ' '.$gradu_year;?>
                    </td>
                </tr>
                <tr>
                    <td>
                       GPA: <?php echo ' '.$gpa;?>
                    </td>
                </tr>
                <tr>
                    <td>
                       Other qualification: <?php echo ' '.$other_qualification;?>
                    </td>
                </tr>
                <tr>
                    <td>
                       Employer: <?php echo ' '.$employer;?>
                    </td>
                </tr>
                <tr>
                    <td>
                       Position: <?php echo ' '.$position;?>
                    </td>
                </tr>
                <tr>
                    <td>
                       Start date: <?php echo ' '.$dof;?>
                    </td>
                </tr>
                <tr>
                    <td>
                       End date: <?php echo ' '.$dot;?>
                    </td>
                </tr>
                <tr>
                    <td>
                       Responsibility: <?php echo ' '.$responsibility;?>
                    </td>
                </tr>
                <tr>
                    <td>
                      Do you think your employer will release you ? : <?php echo ' '.$release;?>
                    </td>
                </tr>
            </table>
        </div>
        <div><span id="nextail" class="glyphicon glyphicon-chevron-right"></span></div>
    </div>
    <div id='second' class="col-md-12">
        <div class="col-md-6">
            <table class='table'>
               <th class="active"><h4>Refferes Information</h4></th>
               <tr><th>Fisrt referee</th></tr>
               <tr><td>Name:<?php echo ' '.$fi_refname;?></td></tr>
               <tr><td>Email:<?php echo ' '.$fi_refemail;?></td></tr>
               <tr><td>Phone:<?php echo ' '.$fi_refaddr;?></td></tr>
               
               <tr><th>Second referee</th></tr>
               <tr><td>Name:<?php echo ' '.$se_refname;?></td></tr>
               <tr><td>Email:<?php echo ' '.$se_refemail;?></td></tr>
               <tr><td>Phone:<?php echo ' '.$se_refaddr;?></td></tr>

               <tr><th>Third referee</th></tr>
               <tr><td>Name:<?php echo ' '.$thr_refname;?></td></tr>
               <tr><td>Email:<?php echo ' '.$thr_refemail;?></td></tr>
               <tr><td>Phone:<?php echo ' '.$thr_refaddr;?></td></tr>
            </table>
        </div>
        
        <div class="col-md-6">
            <table class="table">
                <th class="active"><h4>ponsorship and Additional Information</h4></th>
                <tr><td>Sponsorship mode:<?php echo ' '.$spon_mode;?></td></tr>
                <tr><td>Sponsors Name:<?php echo ' '.$spon_name;?></td></tr>
                <tr><td>Sponsor Address:<?php echo ' '.$spon_addr;?></td></tr>
                <tr><th>Where applicant found application information</th></tr>
                <?php
                if($fwww!='' && $fwww!='0'){
                    echo '<tr><td>'.$fwww.'</td></tr>';
                    }?>
               <?php
                if($fprospec!='' && $fprospec!='0'){
                    echo '<tr><td>'.$fprospec.'</td></tr>';
                    }?>
                <?php
                if($feduca!='' && $feduca!='0'){
                    echo '<tr><td>'.$feduca.'</td></tr>';
                    }?>
                <?php
                if($fjournal!='' && $fjournal!='0'){
                    echo '<tr><td>'.$fjournal.'</td></tr>';
                    }?>
                <?php
                if($funiver!='' && $funiver!='0'){
                    echo '<tr><td>'.$funiver.'</td></tr>';
                    }?>
                <?php
                if($fother!=''){
                    echo '<tr><td>'.$fother.'</td></tr>';
                    }?>
            </table>
        </div>
        <div><span id="nextail1" class="glyphicon glyphicon-chevron-left"></span></div>
        <div><span id="nextail2" class="glyphicon glyphicon-chevron-right"></span></div>
    </div>
    <div id='third' class="col-md-12">
        <table class="table">
            
            <thead class='active'><center><h4>Important uploaded documents</h4></center></thead>
           
            <?php
            $user=$this->session->userdata('userid');
            $this->load->helper('directory');
            
            if(is_dir('uploads/'.$user)) {
                echo '
                 <tr>
                    <th>#</th>
                    <th>document name</th>
                    <th>Action</th>   
                 </tr>';
              $map = directory_map('./uploads/'.$user);
                  $i=1;
                  foreach ($map as $value) {
                     echo "<tr class='mytable'>";
                     echo "<td>$i</td>";
                     echo "<td> $value</td>";
                     echo "<td>View</td>";
                     echo "</tr>";
                  $i++;
                 }
            }else{
               echo "
                <tr>
                    <td>You havent Uploaded any document</td>
                </tr>
               ";
            }
            ?>
            
        </table>
        <div><span id="nextail3" class="glyphicon glyphicon-chevron-left"></span></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
                $("#second").hide();
                $("#third").hide();
                $("#nextail").click(function(){
                $('#second').show();
                $('#first').hide();
                });
                $("#nextail1").click(function(){
                $('#first').show();
                $('#second').hide();
                });
                $("#nextail2").click(function(){
                $('#third').show();
                $('#second').hide();
                });
                $("#nextail3").click(function(){
                $('#third').hide();
                $('#second').show();
                });
            }); 
</script>
<?php include_once 'footer.php';?>