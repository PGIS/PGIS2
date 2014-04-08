<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Finance_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function finance_insert($application_id,$registration,$rgistration_amount,$registration_receipt,
            $payment,$payment_date,$imageName){
            $array_data=array(
            'registration_id'=>$application_id,
            'payment_details'=>$registration,
            'amount_paid'=>$rgistration_amount,
            'receipt_no'=>$registration_receipt,
            'mode_payment'=>$payment,
            'date_payment'=>$payment_date,
            'suporting_doc'=>$imageName,
        );
        $res=$this->db->get_where('tb_finance',array('registration_id'=>  $this->session->userdata('userid')));
        if($res->num_rows()===1){
        $this->db->update('tb_finance',$array_data);
        }  else {
        $result= $this->db->insert('tb_finance',$array_data);
        return $result;  
        }
    }
    public function display(){
        $query=$this->db->get_where('tb_finance',array('registration_id'=>  $this->session->userdata('userid')));
        if($this->db->affected_rows()==1){
        return $query->result();
        }  else {
           return FALSE; 
        }
    }
    public function show_result(){
        $result=  $this->db->get_where('tb_studentReg',array('regist_name'=>  $this->session->userdata('userid')));
        if($result->affected_rows()===1){
         return $result->result();   
        }  else {
            return FALSE;
        }
    }

    public function registration_data($sn,$postponement,$date_postponement){
        $reg_data=array(
            'regist_name'=>$sn,
            'postponement'=>$postponement,
            'date_postponement'=>$date_postponement,
        );
        $res=$this->db->get_where('tb_studentReg',array('regist_name'=>  $this->session->userdata('userid')));
        if($res->num_rows()===1){
            $this->db->update('tb_studentReg',$reg_data);
        }else{
            $this->db->insert('tb_studentReg',$reg_data);
        }
    }
    public function register_remained($sn,$freezing,$freez_date,$freez_resume){
        $reg_rem=array(
            'regist_name'=>$sn,
            'freezing'=>$freezing,
            'date_freezing'=>$freez_date,
            'date_resume'=>$freez_resume
        );
        $result=  $this->db->get_where('tb_studentReg',array('regist_name'=>  $this->session->userdata('userid')));
        if($result->num_rows()===1){
            $this->db->update('tb_studentReg',$reg_rem);
        }  else {
            $this->db->insert('tb_studentReg',$reg_rem);
        }
    }
    public function register_extension($sn,$extension,$ext_date,$period){
        $reg_ext=array(
            'regist_name'=>$sn,
            'extension'=>$extension,
            'date_extension'=>$ext_date,
            'month_extension'=>$period
        );
        $query=  $this->db->get_where('tb_studentReg',array('regist_name'=>  $this->session->userdata('userid')));
        if($query->num_rows()===1){
            $this->db->update('tb_studentReg',$reg_ext);
        }  else {
           $this->db->insert('tb_studentReg',$reg_ext);
        }
    }
    
    function application_fee(){
        $details=array(
            'userid'=>$this->session->userdata('userid'),
            'recept_no'=>'',
            'payment_date'=>'',
            'supporting_doc'=>''
        );  
    }
    }

