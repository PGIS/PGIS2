<?php include_once 'Headerlogincal.php'; ?>
<div id="page-wrapper">
    <div class="well well-sm"><p align="center"><b>Seminar Registration in a Week</b></p></div>
    <div id="regform">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><center>Seminar register</center></h3>
            </div>
            <div class="panel-body">
                <p>The table below shows the seminars with respective day and hours,be carefully to chose and registering your seminar day 
                day goes with respective hour indicate,be carefully otherwise you will not be enrolled the what mistake you have done. Thanks!</p>
                <?php echo form_open('seminary/seminary_form'); ?>
                <table border="1" width="90%" align="center" class="table table-striped table-bordered">
                <tr><td width="30%" align="center">Courses</td><td width="30%" align="center">Day</td><td width="30%" align="center">Hour</td></tr>
                <tr class="td1">
                    <td rowspan="2" align="center" id="main">IS 654&nbsp;<input type="radio" name="day" value="IS 654"></td>
                    <td align="center" id="yes">Monday&nbsp;<input type="radio" name="day1" value="Monday"></td>
                    <td align="center" id="yes1">0700-0800&nbsp;<input type="radio" name="data" value="0700-0800"><br>
                        1100-1200&nbsp;<input type="radio" name="data" value="1100-1200"></td>
                    </tr>
                    <tr class="td1">
                        <td align="center" id="no">Tuesday&nbsp;<input type="radio" name="day1" value="Tuesday"></td>
                        <td align="center" id="no1">1000-1100&nbsp;<input type="radio" name="data" value="1000-1100"><br>
                            1400-1500<input type="radio" name="data" value="1400-1500"></td>
                    </tr>
                    <tr class="td">
                        <td rowspan="2" align="center" id="main1">IS 643&nbsp<input type="radio" name="day" value="IS 643"></td>
                        <td align="center" id="sel">Monday&nbsp;<input type="radio" name="day1" value="Monday"></td>
                        <td align="center" id="sel1">1000-1100&nbsp;<input type="radio" name="data" value="1000-1100"><br>                     
                            1600-1700&nbsp;<input type="radio" name="data" value="1600-1700">
                   </tr>
                   <tr class="td">
                       <td align="center" id="sev">Friday&nbsp;<input type="radio" name="day1" value="Friday"></td>
                       <td align="center" id="sev1">1000-1100&nbsp;<input type="radio" name="data" value="1000-1100"><br>                     
                           1400-1500&nbsp;<input type="radio" name="data" value="1400-1500">
                   </tr></table><br>
                   <table style="margin-left: 400px;"><tr><td colspan="3"><input type="submit" name="sub" value="Register" class="btn btn-primary lc"></td></tr></table>
                <?php echo form_close();?>
                   <div id="load"></div>
            </div>
            
        </div>
    </div>
</div>
    <script>
        $(document).ready(function(){
            $('.td').hide();
           $('.lc').click(function(){
               $('form').submit(function(e){
                  $('#load').html('<img src="<?php echo base_url('assets/img/moving .gif');?>">');
                  var postdata=$(this).serializeArray();
                  var formurl=$(this).attr('action');
                   if(postdata!==''){
                  $.ajax({
                      url:formurl,
                      type:"POST",
                      data:postdata,
                      success:function(data,textstastus,jqXHR){
                         $('#load').html('<p class="alert alert-success">Thanks</p>').fadeOut(4000);
                          var tb1=$('.td1').hide();
                          if(tb1){
                           $('.td').show('slow');
                            }
                         
                          $('#load').html('<font class="alert alert-success">Thanks.!please continue</font>').fadeOut(4000);
                          
                          
                      },
                      error:function(jqXHR,textstatus,errorThrown){
                          $('#load').html('<font class="alert alert-danger">Oops.! Failled textstatus='+textstatus+',errorThrown='+errorThrown+'</font>');
                      }
                  });
                  e.preventDefault();
                  e.unbind();
                  e.exit();
                   }else{
                       $('#load').html('<p class="alert alert-danger">Cant be empty</p>').fadeOut(4000);
                   }
               });
               $('form').submit();
                
           });
           $("#yes").show();
           $("#yes1").show();
           $("#no").show();
           $("#no1").show();
           $("#yes").click(function(){
           $("#no").hide();
           $("#no1").hide(); 
           });
           $("#yes1").click(function(){
           $("#no").hide();
           $("#no1").hide(); 
           });
           $("#no").click(function(){
           $("#yes").hide();
           $("#yes1").hide();
        });
           $("#no1").click(function(){
           $("#yes").hide();
           $("#yes1").hide();
        });
        
           $("#main").click(function(){
           $("#yes").show();
           $("#yes1").show();
           $("#no").show();
           $("#no1").show();
        });
           $("#main1").click(function(){
           $("#sel").show();
           $("#sel1").show();
           $("#sev").show();
           $("#sev1").show();
        });
         
           $("#sel").click(function(){
           $("#sev").hide();
           $("#sev1").hide();
        });
        
           $("#sel1").click(function(){
           $("#sev").hide();
           $("#sev1").hide();
        });
           
           $("#sev").click(function(){
           $("#sel").hide();
           $("#sel1").hide();
        });
        
           $("#sev1").click(function(){
           $("#sel").hide();
           $("#sel1").hide();
        });
       $('.lc').click(function(){
           
        });
    });
    </script>
    <?php include'footer.php';
    