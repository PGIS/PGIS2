<?php 
if($this->session->userdata('user_role')=='Admision staff'){
      include_once 'Admision/Headerlogin.php';
    }elseif ($this->session->userdata('user_role')=='administrator') {
      include_once 'admin/Headerlogin.php';
    }elseif ($this->session->userdata('user_role')=='Student') {
      include_once 'registration/Headerlogin.php';
    }else {
      include_once 'application/Headerlogin.php';
      }
?>
<div id="page-wrapper">
    <div class="col-md-3 smsmenu">
        <div class="list-group">
            <a href="<?php echo site_url('messages/unread');?>" class="list-group-item">unread messages</a>
            <a href="<?php echo site_url('messages');?>" class="list-group-item">all messages</a>
            <a href="#" class="list-group-item">Sent messages</a>
            <?php 
            if($this->session->userdata('user_role')!='applicant'){
                echo '<a href="'.site_url('messages/create_message').'" class="list-group-item">Compose message</a>';
            }
            ?>
        </div >
    </div>
    <div class="col-md-9">
        <table class="table" id="mytable3">
           <thead>
                <center><h4>Received Messages</h4></center>
                    <tr>
                        <th>Sent by</th>
                        <th>Subject</th>
                    </tr>
           </thead>
           <tbody>
            <?php
            $this->db->order_by("status", "desc");
            $unchecked='unchecked';
            $query = $this->db->get_where('tb_messeges', array('receiver' => $this->session->userdata('userid'),'status'=>$unchecked));
            if($query->num_rows() > 0){
            
            foreach ($query->result() as $row) {
                        echo '<tr>'
                . '<td><b><a href="'.site_url('messages/opensms/'.$row->message_id).'">'.$row->sender.'</a></b></td>'
                . '<td><b><a href="'.site_url('messages/opensms/'.$row->message_id).'">'.$row->subject.'</a></b></td>'         
                    . '</tr>';
                }
            }
            ?>
           </tbody>
        </table>
    </div>
</div>

<?php include_once 'include/footer.php';?>
