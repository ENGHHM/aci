<?php

defined('BASEPATH') OR exit('No direct script access allowed');

///////////////////////// Arabic Codeigniter //////////////////////////////////////////
////////////////////////2018///////////////////////////////
///////////////////SWE HHM //////////////////////////////////////
class Acilang  {
    protected $CI;


   public $defualt_lang_prfix ="english";
   private $settings_tbl_name = "site_settings";
   private $lang_tbl_name="langs";
   private  $lang_str_tbl_name="lang_strs";
    function __construct() {
        $this->CI =& get_instance();
    }
    public function get_site_settings()
    {


        $this ->CI-> db -> select('*');
        $this ->CI-> db -> from($settings_tbl_name);
        $this ->CI-> db -> where('lang_short',$this->get_lang());

        $query = $this ->CI-> db -> get();
        $this ->CI-> db -> limit(1);

        if($query -> num_rows() == 1)
        {
            $swe= $query->row_array();

            return $swe;        }


    }
    public function chk_site_status()
    {
        $this ->CI-> db -> select('*');
        $this ->CI-> db -> from($settings_tbl_name);
        $this ->CI-> db -> where('lang_short',$this->get_lang());

        $query = $this ->CI-> db -> get();
        $this ->CI-> db -> limit(1);

        if($query -> num_rows() == 1)
        {
            $final = $query->row();
            return $final->site_status;
        }

    }
    public function get_close_resson()
    {
        $this ->CI-> db -> select('*');
        $this ->CI-> db -> from($settings_tbl_name);
        $this ->CI-> db -> where('lang_short',$this->get_lang());

        $query = $this ->CI-> db -> get();
        $this ->CI-> db -> limit(1);

        if($query -> num_rows() == 1)
        {
            $final = $query->row();
            return $final->close_reson;
        }

    }
    public function get_langs_db()
    {
        $this ->CI-> db -> select('*');
        $this ->CI-> db -> from($lang_tbl_name);
        $query = $this ->CI-> db -> get();
        if($query -> num_rows() >= 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    public function set_lang($lang)
    {
        $this->CI->session->set_userdata(array(
            'def_lang'       => $lang
                   ));
    }
    public function get_lang()
    {
      //  $this->CI->load->library('session');

        $d_lang   = $this->CI->session->userdata('def_lang');
        if($d_lang=="" || $d_lang == null)
        {
            $this->set_lang($this->defualt_lang_prfix);
            return $this->defualt_lang_prfix;

        }

        else{
            return $d_lang;
        }}
    public function get_langs_data()
    {
        $fields = $this->CI->db->list_fields(''.$this->lang_str_tbl_name.'');


      return $fields;
    }
    public function get_lang_str($main_str)
    {


            $this ->CI-> db -> select('*');
            $this ->CI-> db -> from($this->lang_str_tbl_name);
            $this ->CI-> db -> where('LOWER(english)', strtolower($main_str));
           // $this ->CI-> db -> where('lang_short',$this->get_lang());
            $this ->CI-> db -> limit(1);

            $query = $this ->CI-> db -> get();

            if($query -> num_rows() >= 1)
            {
                $final = $query->row();

                $defprx=$this->get_lang();
                return $final->$defprx;
            }
            else{
                return $main_str;
            }


    }
    public function get_style_setting()
    {

        $this ->CI-> db -> select('*');
        $this ->CI-> db -> from($this->lang_tbl_name);
        $this-> CI-> db -> where('LOWER(lang_name)', strtolower($this->get_lang()));
        $this ->CI-> db -> limit(1);

        $query = $this ->CI-> db -> get();

        if($query -> num_rows() == 1)
        {
            $final = $query->row();
            return $final->files_dir;
        }

    }
    public function set_redirect()
    {
    $currentURL = current_url();
$params   = $_SERVER['QUERY_STRING'];
        $this->CI->session->set_userdata(array(
            'redir'       =>  $params
        ));
    }
    public function get_redirect()
    {
        //  $this->CI->load->library('session');

        $diru   = $this->CI->session->userdata('redir');

            return $diru;
        }

    function chk_for_val_in_db($tbl,$row,$val)
    {
        $this -> CI-> db -> select('*');
        $this ->CI-> db -> from($tbl);
        $this ->CI-> db -> where($row, $val);
        $query = $this -> CI->db -> get();

        if($query -> num_rows() >= 1)
        {

            return false;
        }
        else
        {
            return true;
        }


    }




}
?>
