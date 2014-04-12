<?php include 'Headerlogin.php';?>

<div id="page-wrapper">
    <ul id="myTab" class="nav nav-tabs">
        <li  class="dropdown">
             <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">Applicants fee<b class="caret"></b></a>
             <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                <li ><a href="#appl" tabindex="-1" data-toggle="tab">Fee verification</a></li>
                <li><a href="#aplist" tabindex="-1" data-toggle="tab">Payed fee</a></li>
              </ul>
        </li>   
        <li><a href="#reg" data-toggle="tab">Registration fee</a></li>
        <li><a href="#inst" data-toggle="tab">instructors’ payment</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="appl">
            <div class="col-md-12">
                <div class="col-md-5">
                    <table class="table table-striped">
                        <thead><h5>List of applicants need verification</h5>
                            <th>Username</th>
                            <th>Action</th>
                        </thead>
                            <?php
                            $this->db->where('appl_status', 'no'); 
                            $query = $this->db->get_where('tb_app_personal_info', array('submited' =>'yes'));
                            if($query->num_rows()>0){
                                $i=1;
                                foreach ($query->result() as $list){
                                    $this->db->where('appl_status', 'unchecked');
                                    $mquery = $this->db->get_where('tb_finance_application', array('userid' =>$list->userid));
                                    if($mquery->num_rows()>0){
                                    foreach ($mquery->result() as $mlist){
                                     echo '<tr>';
                                    echo '<td>'.$mlist->userid.'</td>';?>
                                     <td><button onclick="ajaxFunction('<?php echo $mlist->userid;?>')" class="btn-info subtn">verify</button></td>
                                     <?php
                                    echo '</tr>';   
                                    }
                                }
                                    $i++;
                                }
                            }else{
                                echo '<tr><td colspan="2" class="danger">no new application fee payment found</td></tr>';
                                
                            }
                            ?>
                    </table>
                </div>
                <div class="col-md-7 " id="resajax">
                   
                </div>
            </div>
        </div>
        
        <div class="tab-pane" id="aplist">
            
        </div >
        
        <div class="tab-pane" id="reg">
            <div class="col-md-12">
                <div class="col-md-4">
                    <div class="tp">Verification for registration fee</div>
                    <table class="table">
                        <?php
                            $mquery = $this->db->get_where('tb_finance', array('regstatus' =>'unchecked'));
                            if($mquery->num_rows()>0){
                                echo '<tr>'
                                . '<th>Student ID</th>'
                                .'<th>Action</th>'
                                . '</tr>';
                                $i=1;
                                foreach ($mquery->result() as $mlist){
                                    echo '<tr>';
                                    echo '<td>'.$mlist->registration_id.'</td>';?>
                                     <td><button onclick="retrivedetails('<?php echo $mlist->registration_id;?>')" class="btn-info subtn">verify</button></td>
                                     <?php
                                    echo '</tr>';
                                    $i++;
                                }
                            }else{
                                echo '<tr><td colspan="2" class="danger">no new application fee payment found</td></tr>';
                                
                            }
                            ?>
                    </table>
                </div>
                    <div class="col-md-8"id="regfindet" >

                    </div>
            </div>
            
        </div>
        
        <div class="tab-pane" id="inst">
            <div class="col-md-12">
                
            </div>
        </div>
    </div>
    
</div>
<?php include_once 'footer.php';?>

