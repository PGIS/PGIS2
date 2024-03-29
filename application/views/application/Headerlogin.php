<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PGIS</title>
    
    
    
    <link href="<?php echo base_url('assets/css/bootstrap-combined.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/sb-admin.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/pgis.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/jquery.dataTables.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/jquery.ui.datepicker.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/jquery.ui.all.css')?>" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/jquery-1.10.2.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.core.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui.widget.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.ui.datepicker.js') ?>"></script>
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand visible-lg" href="#">
		<img src="<?php echo base_url('assets/img/mwenge.gif');?>"class="imge" height="35">
		POSTGRADUATE INFORMATION SYSTEM
	  </a>
	  <a class="navbar-brand hidden-lg" href='#'>
	    <img src="<?php echo base_url('assets/img/mwenge.gif');?>"class="imge" height="35">PGIS</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
              <?php
              if(!isset($lisubmited)){
              ?>
            <li><a href="<?php echo site_url('application/apply');?>"><span class="glyphicon glyphicon-edit"></span>
	    Application form</a></li>
            <?php }?>
            <li><a href="<?php echo site_url('application/details_preview');?>">
	    <span class="glyphicon glyphicon-book"></span> Preview details</a></li>
            <li><a href="<?php echo site_url('messages');?>">
                    <span class="glyphicon glyphicon-envelope"></span> Messages</a>
            </li>
	    <li><a href="<?php echo site_url('change_form');?>"><span class="glyphicon glyphicon-wrench"></span>
	    Change password</a></li>
            <li><a href="<?php echo site_url('logout');?>"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
            
          </ul>
	  
	  <ul class="nav navbar-nav navbar-right navbar-user">
	    <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<span class="glyphicon glyphicon-user"></span>
		<?php
		 if($this->session->userdata('logged_in')){
		    echo $this->session->userdata('userid');
		}
		?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                
              </ul>
            </li>
           
            <li class="dropdown messages-dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="glyphicon glyphicon-envelope"></span>
                    Messages
                    <span class="badge">
                        <?php
                        $this->db->where('receiver',$this->session->userdata('userid'));
                        $this->db->where('status','unchecked');
                        $this->db->from('tb_messeges');
                        $newsmg=$this->db->count_all_results();
                        
                        echo  $newsmg;
                        ?>
                    </span>
                <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li class="dropdown-header"> <?php echo $newsmg;?> New Messages</li>
                    <?php
                    $this->db->where('receiver',$this->session->userdata('userid'));
                    $query = $this->db->get_where('tb_messeges', array('status' => 'unchecked'),3);
                    foreach ($query->result() as $messg){
                       echo '<li class="message-preview">
                        <a href="'.site_url('messages/opensms/'.$messg->message_id).'">
                            <span class="avatar">
                         
                            <span class="name">'.$messg->sender.'</span>
                            <span class="message">'.$messg->subject.'</span>
                            
                        </a>
                    </li>
                    '; 
                    }
                    ?>
                </ul>
                </li>
              </ul>
	  
        </div><!-- /.navbar-collapse -->
      </nav>
      
