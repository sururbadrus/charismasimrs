<?php
 
class Crud extends CI_Controller {
    private $controllername; // controller name
    private $fname; // form name
    private $form_title; // form tite
    private $modelname;// model tite
	private $listviewname;
	private $javascript_name;
    private $create_viewname;
	private $tselect;
	private $a_tselect=array();
	private $hselect;
	private $a_hselect=array();
	private $jqgrid;
	private $a_jqgrid=array();
	private $ugrid;
	private $a_ugrid=array();
	private $loopfield='';
	private $sql='';
	private $loopfield_='';
	private $loopfield_s='';
	private $jdl_jqgrid='';
	private $desc_asc='';
	private $orderby='';
	private $join_s_id='';
	private $form_tampil = '';
	private $form_hiden =  '';
	private	$tipe_field =  '';
	private	$load_field =  '';
	private $caption_field_a=array();
	private	$form_tampil_a = array();
	private	$form_hiden_a = array();
	private	$tipe_field_a = array();
	private	$load_field_a = array();
	private	$join_field_form = array();
	
	private	$arr_aso_hselect= array();
	private	$arr_aso_tselect= array();
	
	private $tbl_insert='';
	private $field_insert='';
	private $tbl_update='';
	private $field_update='';
	private $id_update='';
	private $tbl_delete='';
	private $id_delete='';
	
	private $full_q;
	private $tbl_pk;
    private $first_min_no = 5;
    private $style_col = 4;
    private $auther = "Shabeeb";
    private $auther_mail = "mail@shabeebk.com";
    private $created_date;
    private $header = 'header';
    private $footer = 'footer';
    private $header_data = '';
    private $footer_data = 'footer';
    private $controller_data = '';
    private $model_data = '';
    private $create_data = '';
    private $js = '';
 	private $gen_id = '';
	private $dd = array();
	private $dp = array();
	private $ac = array();
	private $penggunaan=1;

    public function __construct() {

        parent::__construct();

        $this->load->library('form_validation');
        $this->load->database();
        $this->load->library('zip');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('file');
		$this->load->helper('security');
        $this->load->helper('download');
        $this->created_date = date('Y-m-d ');
		$this->load->helper('array');
    }

    /**
     * Functon index
     * 
     * load the form and process
     * 
     * @auther shabeeb <mail@shabeebk.com>
     * @createdon  17-06-2014
     * @
     * 
     * @param type 
     * @return type
     * exceptions
     * 
     */
    public function index() {

        $data = '';

		$data_header["edit_txt"]=true; 
		$data_header["tree"]=false; 
		$data_header["valid"]=true; 
		$data_header["jq"]=true; 
		$data_header["dt"]=true; 
		$data_header["ac"]=false; 
		$data_header["dd"]=false; 
		$data_header["dp"]=false; 
       	//$data_header["jsku"]='ubet.js'; 
		
        $this->form_validation->set_rules('cname', 'Controller Name', 'required|xss_clean');
        $this->form_validation->set_rules('fname', 'Title Name', 'required|xss_clean');
        $this->form_validation->set_rules('full_q', 'Full SQL', 'required|xss_clean');
		$this->form_validation->set_rules('tselect', 'Select Show Field Table', 'required|xss_clean');
		$this->form_validation->set_rules('hselect', 'Select Hiden Field Table', 'required|xss_clean');
		$this->form_validation->set_rules('jqgrid', 'Heading Grid', 'required|xss_clean');
		$this->form_validation->set_rules('ugrid', 'Lebar Colom', 'required|xss_clean');
		$this->form_validation->set_rules('jdl_jqgrid', 'Judul Grid', 'required|xss_clean');
		$this->form_validation->set_rules('orderby', 'Lebar Colom', 'required|xss_clean');
		
		$this->form_validation->set_rules('tbl_insert', 'Tabel Insert', 'required|xss_clean');
		$this->form_validation->set_rules('field_insert', 'Field Insert', 'required|xss_clean');
		$this->form_validation->set_rules('tbl_update', 'Tabel Update', 'required|xss_clean');
		$this->form_validation->set_rules('field_update', 'Field Update', 'required|xss_clean');
		$this->form_validation->set_rules('id_update', 'Id Update', 'required|xss_clean');
		$this->form_validation->set_rules('tbl_delete', 'Tabel Delete', 'required|xss_clean');
		$this->form_validation->set_rules('id_delete', 'Id Delete', 'required|xss_clean');
		$this->form_validation->set_rules('form_tampil', 'Tampil Form', 'required|xss_clean');
		$this->form_validation->set_rules('form_hiden', 'Hiden Form', 'required|xss_clean');
		$this->form_validation->set_rules('tipe_field', 'Tipe Field', 'required|xss_clean');
		$this->form_validation->set_rules('load_field', 'Load Field', 'required|xss_clean');
		$this->form_validation->set_rules('caption_field', 'Caption Field', 'required|xss_clean');
		
        if ($this->form_validation->run() === FALSE) {
            
        } else {
			
			
			$this->penggunaan=$this->input->post("penggunaan");
			$this->full_q = strtolower($this->input->post("full_q"));
           	$this->tselect = strtolower(trim($this->input->post("tselect")));
			$this->a_tselect = explode(',',$this->tselect);
			$this->hselect = strtolower(trim($this->input->post("hselect")));
			$this->a_hselect = explode(',',$this->hselect);
			$this->jqgrid = strtolower(trim($this->input->post("jqgrid")));
			$this->a_jqgrid = explode(',',$this->jqgrid);
			$this->ugrid = trim($this->input->post("ugrid"));
			$this->a_ugrid = explode(',',$this->ugrid);
			$this->jdl_jqgrid = trim($this->input->post("jdl_jqgrid"));
			$this->desc_asc = strtolower(trim($this->input->post("desc_asc")));
			$this->orderby = strtolower(trim($this->input->post("orderby")));
			
			$this->join_s_id = explode(',',($this->hselect.','.$this->tselect)); 
			
			$arr_aso_tselect_=array();
			for($ub=0; $ub<count($this->a_tselect); $ub++){
				
				$arr_aso_tselect_[trim($this->a_tselect[$ub])]=trim($this->a_tselect[$ub]);
				
				}
			$arr_aso_hselect_=array();	
			for($ub=0; $ub<count($this->a_hselect); $ub++){
				
				$arr_aso_hselect_[trim($this->a_hselect[$ub])]=trim($this->a_hselect[$ub]);
				
				}
			$this->arr_aso_hselect=$arr_aso_hselect_;
			$this->arr_aso_tselect=$arr_aso_tselect_;
			
			
			$this->tbl_insert = explode(',',strtolower($this->input->post("tbl_insert")));
			$this->field_insert = explode('*',strtolower($this->input->post("field_insert")));
			
			$this->tbl_update = explode(',',strtolower($this->input->post("tbl_update")));
			$this->field_update = explode('*',strtolower($this->input->post("field_update")));
			$this->id_update = explode(',',strtolower($this->input->post("id_update")));
			
			$this->tbl_delete = explode(',',strtolower($this->input->post("tbl_delete")));
			$this->id_delete = explode(',',strtolower($this->input->post("id_delete")));
			
					
			$this->form_tampil = strtolower(trim($this->input->post("form_tampil")));
			$this->form_hiden = strtolower(trim($this->input->post("form_hiden")));
			$this->tipe_field = strtolower(trim($this->input->post("tipe_field")));
			$this->load_field = strtolower(trim($this->input->post("load_field")));
			
			$this->form_tampil_a = explode(',',$this->form_tampil);
			$this->form_hiden_a = explode(',',$this->form_hiden);
			$this->tipe_field_a = explode(',',$this->tipe_field);
			$this->load_field_a = explode('|',$this->load_field);
			$this->caption_field_a = explode(',',strtolower($this->input->post("caption_field")));
			$this->join_field_form = explode(',',($this->form_tampil.','.$this->form_hiden)); 
					
			$cname = strtolower($this->input->post("cname"));
			$this->controllername = str_replace(' ', '_', $cname);
            $this->fname = strtolower($this->input->post("fname"));
            $this->modelname = $this->controllername . '_model';
			$this->javascript_name=$this->controllername.'_js';
            $this->create_viewname = 'v_' . $this->controllername;
           
		  
		   for($i=0; $i<count($this->tipe_field_a); $i++){
				if(trim($this->tipe_field_a[$i])=='dd'){
					
					$this->dd[trim($this->form_tampil_a[$i])]=trim($this->load_field_a[$i]);
					}
				else if(trim($this->tipe_field_a[$i])=='dp'){
					
					$this->dp[]=trim($this->form_tampil_a[$i]);
					}
				else if(trim($this->tipe_field_a[$i])=='ac'){
					
					$this->ac[trim($this->form_tampil_a[$i])]=trim($this->load_field_a[$i]);
					}
			}
		   
		   
            $this->controller_data = $controller = $this->build_controller();
            $this->create_data = $view_create = trim($this->build_view_create());
           	$this->model_data = $model = trim($this->build_model());
            $this->js = $javascript = trim($this->build_javascript());
			
			
           // $this->header_data = $view_header = $this->build_header($fields);
            //$this->footer_data = $view_footer = $this->build_footer($fields);
			
           // $data['model'] = $model;
            $data['controller'] = $controller;
            $data['view_create'] = $view_create;
            $data['model'] = $model;
            $data['javascript'] = $javascript;
            //$data['view_footer'] = $view_footer;

            //name for each file
            $data['controllername'] = trim($this->controllername);
            $data['modelname'] = trim($this->modelname);
            $data['javascript_name'] = trim($this->javascript_name);
            $data['create_viewname'] = trim($this->create_viewname);
           // $data['header'] = $this->header;
           // $data['footer'] = $this->footer;
           
            $data['fname'] = trim($this->fname);
            $data['full_q'] = trim($this->full_q) ;
			$data['tselect'] = trim($this->ugrid);
			$data['hselect'] = trim($this->hselect);
			$data['jqgrid'] = trim($this->jqgrid);
			$data['ugrid'] = trim($this->ugrid);
			//$data['cname'] =$this->full_q;
			
           // print_r($_POST);
            if (isset($_POST['download'])) {
              
                $this->download();
            }
        }




		$data_header["tampil_menu"]=''; 
		//$this->m_menu->tampil_menu();
		$data_header["profil"] ='';
		//$this->m_menu->tampil_profil();

        $this->load->view('design/header',$data_header);
        $this->load->view('ciig', $data);
        $this->load->view('design/footer');
		
        
    }

    /**
     * Functon buld controller
     * 
     * it will bult structure of controller
     * 
     * @auther shabeeb <me@shabeebk.com>
     * @createdon  17-06-2014
     * @
     * 
     * @param type 
     * @return type 
     * exceptions controller name empty
     * 
     */
    function build_controller() {
      $controller = '
<?php if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');
	class ' . ucfirst($this->controllername) . ' extends CI_Controller {
        public function __construct() {
                parent::__construct();
               $this->load->model(\'' . $this->modelname . '\');
               ';
   		$this->gen_id=gmdate("s",mktime(date("H")+7));
        $controller .= '
	}
		function index(){
			$data_header=array();$data_footer=array();$data=array();
			$data_header=array("edit_txt"=>false,"tree"=>false,"valid"=>true,"jq"=>true,"dt"=>false,"ac"=>false,"dd"=>false,"dp"=>false);
			$data_header["edit_txt"]=true; 
			$data_header["tampil_menu"]=$this->session->userdata(\'menu\'); 
			$data_header["profil"] =$this->session->userdata(\'profil\'); 
			$data_footer["jsku"]=\''.$this->javascript_name.'.js\';';
			
			foreach($this->dd as $in=>$val){
				if($val!=''){
	$controller .= '
			$data["'.trim($in.$this->gen_id).'"]=$this->m_global->getcombo("'.trim($val).'","");
		';
			}else{
				$controller .= '
			$data["'.trim($in.$this->gen_id).'"]=array(1=>\'Aktif\',0=>\'Tidak Aktif\');
		';
					
				}
		}
			for($i=0; $i<count($this->dp); $i++){
			$controller .= '
			$data["'.trim($this->dp[$i].$this->gen_id).'"]=gmdate("d-m-Y",mktime(date("H")+7));	
				';
		}
		if($this->penggunaan==1){
			$controller .= '
			$this->load->view(\'design/' . trim($this->header) . '\',$data_header);
			$this->load->view(\'' . trim($this->create_viewname) . '\',$data);
			$this->load->view(\'design/' . trim($this->footer) . '\',$data_footer);
			';
			}else{
			$controller .= '
			$data["ub"]=\'\';
			$this->load->view(\'' . trim($this->create_viewname) . '\',$data);
			';}
			$controller .= '
		}';
       
        $controller .= '  
		
		function view_grid'.$this->gen_id.'(){
			return $this->'.strtolower($this->controllername).'_model->mgrid'.$this->gen_id.'();
		}

		function crud'.$this->gen_id.'() {
			return $this->'.strtolower($this->controllername).'_model->proses_simpan'.$this->gen_id.'();
		}
	}';

        return $controller;
    }




function build_view_create() {

   		$view='';
		$view .= '

<div class="row">
            <div class="row">
                 <h4 class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "><u>'.trim(ucfirst($this->fname)).'</u></h4>
			</div>
				<?php
					$attributes = array(\'class\' => \'form-group\',\'name\' => \'form_'.trim($this->controllername).$this->gen_id.'\', \'id\' => \'form_'.trim($this->controllername).$this->gen_id.'\');
					echo form_open(\'\', $attributes);
					?>
						';
								
								for($i=0; $i<count($this->form_hiden_a); $i++){
					 $view .= '   
                                   <input name="'.trim($this->form_hiden_a[$i]).$this->gen_id.'" id="'.trim($this->form_hiden_a[$i]).$this->gen_id.'" type="hidden" value="" />
								   ';
								   }
							   
		 $view .= '						   
		<div class="row">						   ';   
        $p = 0;
		for($i=0; $i<count($this->form_tampil_a); $i++){
			if(trim($this->tipe_field_a[$i])=='dd'||trim($this->tipe_field_a[$i])=='chk'||trim($this->tipe_field_a[$i])=='ta'){
				if(trim($this->tipe_field_a[$i])=='dd'){// dropdwon
					$view .= '   
						 <div class="col-xs-12 col-sm-12 col-md-'.$this->style_col.' col-lg-'.$this->style_col.'">  
					         <label>'.ucfirst(trim($this->caption_field_a[$i])).'</label>
                               <div class="field">
									<?=form_dropdown(\''.trim($this->form_tampil_a[$i].$this->gen_id).'\',$'.trim($this->form_tampil_a[$i].$this->gen_id).',\'\',\'id="'.trim($this->form_tampil_a[$i].$this->gen_id).'"  class="form-control validate[required]"\')?>
									<span class="help-block"></span>
								</div>
                         </div>';
				}
				else if(trim($this->tipe_field_a[$i])=='chk'){ //cheked
					$view .= '   
						 <div class="col-xs-12 col-sm-12 col-md-'.$this->style_col.' col-lg-'.$this->style_col.'">  
				             <label>'.ucfirst(trim($this->caption_field_a[$i])).'</label>
                                <div class="field" style="padding-top: 2.2%;">
				                    <input name="'.trim($this->form_tampil_a[$i].$this->gen_id).'" id="' . trim($this->form_tampil_a[$i].$this->gen_id) . '" type="checkbox"  class="validate[required] " placeholder="' . ucfirst(trim($this->caption_field_a[$i])) . '"  />
									<span class="help-block"></span>
									 </div>
                             </div>';
							}
							else{ //text area
					$view .= '   
						 <div class="col-xs-12 col-sm-12 col-md-'.$this->style_col.' col-lg-'.$this->style_col.'">  
					         <label>' . ucfirst(trim($this->caption_field_a[$i])) . '</label>
                    	           <div class="field">
					                   <textarea name="'.trim($this->form_tampil_a[$i].$this->gen_id). '" id="'.trim($this->form_tampil_a[$i].$this->gen_id).'"   class="validate[required] form-control" placeholder="'.ucfirst(trim($this->caption_field_a[$i])).'" ></textarea>
									   <span class="help-block"></span>
                                    </div>
                             </div>';
								
								}
				}
				else//input
				
				{
					
					
					 $view .= '   
					 
					 <div class="col-xs-12 col-sm-12 col-md-'.$this->style_col.' col-lg-'.$this->style_col.'">  
                           <label>'.ucfirst(trim($this->caption_field_a[$i])).'</label>
                                <div class="field">
										';
					if(trim($this->tipe_field_a[$i])=='dp'){
					$view .= ' 										
        	                         <input name="'.trim($this->form_tampil_a[$i].$this->gen_id).'" id="'.trim($this->form_tampil_a[$i].$this->gen_id).'" type="text"  class=" validate[required] form-control" placeholder="'.ucfirst(trim($this->caption_field_a[$i])).'" value="<?=$'.trim($this->form_tampil_a[$i].$this->gen_id).'?>" />
									 <span class="help-block"></span>
										';
										}else{
									$view .= ' 										
                                        <input name="'.trim($this->form_tampil_a[$i].$this->gen_id).'" id="'.trim($this->form_tampil_a[$i].$this->gen_id).'" type="text"  class=" validate[required] form-control" placeholder="'.ucfirst(trim($this->caption_field_a[$i])).'" value="" />
										<span class="help-block"></span>
										';
											}
										$view .= ' 
                	          </div>
                     </div>';
					
					
				}
					}
      $view .= 
			'</div>   
                        
        <br/>                                    
         <div class="row">                            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               	 <input type="button" name="simpandata'.$this->gen_id.'" id="simpandata'.$this->gen_id.'" class="btn btn-success" value="Simpan">&nbsp;&nbsp;
                 <input  type="button" name="batal'.$this->gen_id.'" id="batal'.$this->gen_id.'" class="btn btn-info" value="Batal">&nbsp;&nbsp;
                 <input  type="button" name="hpus'.$this->gen_id.'" id="hpus'.$this->gen_id.'" class="btn btn-danger" value="Hapus">&nbsp;&nbsp;
				 <!--a href=\'<?=site_url(\''.trim($this->controllername).'/export_pdf'.$this->gen_id.'\')?>\'	target=\'_blank\'  class="btn btn-success"id="tampil_pdf'.$this->gen_id.'" >
					<i class="glyphicon glyphicon-download-alt"></i>
					PDF
				</a-->&nbsp;&nbsp;
                  <!--a href=\'<?=site_url(\''.trim($this->controllername).'/excell'.$this->gen_id.'\')?>\'	target=\'_blank\' class="btn btn-success"id="tampil_excel'.$this->gen_id.'" >
					<i class="glyphicon glyphicon-download-alt"></i>
					Excel
				</a-->
            </div>
		</div>
		<input id="h_form'.$this->gen_id.'" value="" type="hidden"/>
            <?              
			echo form_close();
			?>
		
		 <div class="row ">   
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 jqGrid"  >
             	
            	  <table id="list2'.$this->gen_id.'"  cellpadding="0" cellspacing="0"></table>
                	<div id="pager2'.$this->gen_id.'"></div>
               
          		</div>
        </div>


    
		</div>';



        return $view;
    }

 function build_model() {
	$model='';
  $model = '
<?php if (!defined(\'BASEPATH\')) exit(\'No direct script access allowed\');
	class ' . trim(ucfirst($this->modelname)) . ' extends CI_Model { 
		function __construct() {
			parent::__construct();
		}';
 $model .= '  
		function mgrid'.$this->gen_id.'(){
			$page  = $this->input->post("page");
			$limit = $this->input->post("rows");
			$sidx  = $this->input->post("sidx");
			$sord  = $this->input->post("sord");
			if(!$sidx) $sidx=1;
			$wh = "";
			$searchOn = $_REQUEST["_search"];
			if($searchOn=="true") {
				$filters = $_REQUEST["filters"];
				$obj = json_decode($filters,true);
				$arr=$obj["rules"];
				foreach( $arr as $field=>$data) {
					switch($data["field"]){
						';
						$loopfield='';
						for($i=0; $i<count($this->a_tselect); $i++){
						$loopfield .= ' 
						case "'.trim($this->a_tselect[$i]).'":
							$wh .= " and LOWER('.trim($this->a_tselect[$i]).') like \'%".strtolower($data["data"])."%\'";
							break;';
						}
						$model .=$loopfield ;
						$model .= ' 
						default:
							$wh .= " and " .LOWER($data["field"])." like \'".strtolower($data["data"])."%\'";
						break;
					}
				}
			} 
		';
			$sql='
			$sql="'.$this->full_q.'  where 0=0 $wh";';
			$model .= $sql; 
			 $model .= ' 
			$count = $this->m_global->total_row($sql);
			$count > 0 ? $total_pages = ceil($count/$limit) : $total_pages = 0;
			if ($page > $total_pages) $page=$total_pages;
			$start = $limit*$page - $limit;
			if($start <0) $start = 0;
			$sql=$sql. " order by ". $sidx ." ".  $sord ." limit ". $limit." offset ". $start;
			$data1 = $this->m_global->grid_view($sql)->result_array();
			$responce = new StdClass;
			$responce->page = $page;
			$responce->total = $total_pages;
			$responce->records = $count;
			$i=0;
			$no=1;';
			$loopfield_='';
			$jml_count_fh=count($this->a_hselect)-1;
				for($i=0; $i<count($this->a_hselect); $i++){
						if($jml_count_fh>$i){
							$loopfield_ .='$line[\''.trim($this->a_hselect[$i]).'\'],';
						}
						else{
							$loopfield_ .='$line[\''.trim($this->a_hselect[$i]).'\']';
							}
						}
			$loopfield_s='';		
			$jml_count_fs=count($this->a_tselect)-1;
				for($i=0; $i<count($this->a_tselect); $i++){
						if($jml_count_fs>$i){
							$loopfield_s .='$line[\''.trim($this->a_tselect[$i]).'\'],';
						}
						else{
							$loopfield_s .='$line[\''.trim($this->a_tselect[$i]).'\']';
							}
						}
						
			$model .= '
			foreach($data1 as $line){
				$responce->rows[$i][\'id\']=array('.trim($loopfield_).');
				$responce->rows[$i][\'cell\']=array('.trim($loopfield_s).'); 
				$i++;
				$no++;
			}
			echo json_encode($responce);
			}';
			$model .= ' 
			
		function proses_simpan'.$this->gen_id.'() {
		$data = array();
		$data[\'error_string\'] = array();
		$data[\'inputerror\'] = array();
		$data[\'status\'] = TRUE;
		$data_post=$this->security->xss_clean($_POST);
		';
		for($i=0; $i<count($this->form_tampil_a); $i++){
		$model .= ' 
		$this->form_validation->set_rules(\''.trim($this->form_tampil_a[$i].$this->gen_id).'\', \''.trim($this->caption_field_a[$i]).'\', \'required\');';
		}
		
		$model .= '
		
		if ($this->form_validation->run() == FALSE) {';
		for($i=0; $i<count($this->form_tampil_a); $i++){
		$model .= '
			if(form_error(\''.trim($this->form_tampil_a[$i]).'\')){
				
				$data[\'inputerror\'][] = \''.trim($this->form_tampil_a[$i].$this->gen_id).'\';
				$data[\'error_string\'][] = \'Field '.trim($this->caption_field_a[$i]).' Harus Diisi\';
				$data[\'status\'] = FALSE;
				
				}
			';
			}
			$model .= '
			echo json_encode(array(\'dt\'=>$data));
			exit();
		}';
		
			
		$model .= '
			
			
			switch ($data_post["act"]) {
				case \'Simpan\':
				';
				for($i=0; $i<count($this->tbl_insert); $i++){
				$arr_insr_=array();
				$arr_insr = explode(',',strtolower(trim($this->field_insert[$i])));
				for($iub=0; $iub<count($arr_insr); $iub++){
					$model .= '
					$arr_insr_[\''.trim($arr_insr[$iub]).'\']=$data_post["'.trim($arr_insr[$iub].$this->gen_id).'"];
					';
				}
			$model .= '
			 $sql_q['.$i.']= $this->db->insert_string(\''.trim($this->tbl_insert[$i]).'\', $arr_insr_); 
					 ';}
			$model .= '
			$this->db->trans_begin();
			for($iub=0; $iub<count($sql_q); $iub++){
				$this->db->query($sql_q[$iub]);
			}
				if ($this->db->trans_status() === FALSE)
					{
							$this->db->trans_rollback();
							echo json_encode(array(\'ket\'=>"Gagal Insert",\'dt\'=>$data)) ;
					}
					else
					{
							$this->db->trans_commit();
							echo json_encode(array(\'ket\'=>"Penambahan Data Berhasil",\'dt\'=>$data)) ;
					}
					break;
				case \'Ubah\':
					';
					for($i=0; $i<count($this->tbl_update); $i++){
				$arr_insr_=array();
				$arr_insr = explode(',',strtolower($this->field_update[$i]));
				for($iub=0; $iub<count($arr_insr); $iub++){
				$model .= '$arr_insr_[\''.trim($arr_insr[$iub]).'\']=$data_post[\''.trim($arr_insr[$iub].$this->gen_id).'\'];
				
				';
				}
				$model .= '
				$where['.$i.'] = \''.$this->id_update[$i].' =\'.$data_post[\''.trim($this->id_update[$i].$this->gen_id).'\']; 
				$sql_q['.$i.']=  $this->db->update_string(\''.trim($this->tbl_insert[$i]).'\', $arr_insr_,$where['.$i.']); 
					 ';
				
				}
			$model .= '
				$this->db->trans_begin();
					for($iub=0; $iub<count($sql_q); $iub++){
						$this->db->query($sql_q[$iub]);
					}
				if ($this->db->trans_status() === FALSE)
					{
						$this->db->trans_rollback();
						echo json_encode(array(\'ket\'=>"Gagal Update",\'dt\'=>$data)) ;
					}
					else
					{
						$this->db->trans_commit();
						echo json_encode(array(\'ket\'=>"Update Data Berhasil",\'dt\'=>$data)) ;
					}
					 break;
				case \'Hapus\':
				';
				for($i=0; $i<count($this->tbl_delete); $i++){
					$model .= '
					$this->db->where(\''.trim($this->id_delete[$i]).'\',$data_post[\''.trim($this->id_delete[$i].$this->gen_id).'\']);
					$this->db->delete(\''.trim($this->tbl_delete[$i]).'\');
					 ';
				}
				 $model .= '
				echo json_encode(array(\'ket\'=>"Hapus Data Berhasil",\'dt\'=>$data)) ;
				break;
			}
	}';
	
		
	$model .= ' 
		
		function excell'.$this->gen_id.'(){
			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=exceldata.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			$tbl=\'\';
			$tbl.=\'
				<h3><u>'.strtoupper($this->fname).'</u></h3>
				<table border="0"  cellpadding="0" cellspacing="0" >
				 <tr >\';
				 $tbl.=\'<th  align="center" bgcolor="#359AFF" width="30" >NO</th>\';
				 ';
				 for($i=0; $i<count($this->a_jqgrid); $i++){
$model .= '$tbl.=\'<th   valign="middle" bgcolor="#359AFF" width="'.trim($this->a_ugrid[$i]).'" >'.strtoupper(trim($this->a_jqgrid[$i])).'</th>\';
					 ';
					}
$model .=' $tbl.=\'</tr>\';
				';
				$model .='$sql="'.$this->full_q.'";
				$data= $this->m_global->grid_view($sql)->result_array();
				$no=1;
				foreach($data as $row){
					$bg=$no%2;
					if($bg==0){$bg=\' bgcolor="#E1F0FF" \';}else{$bg=\' bgcolor="#FFFFFF" \';}
					
					$tbl.= \'
					<tr>
					<td \'.$bg.\'  align="center" width="30">\'.$no.\'</td>\';
					';
					
					for($i=0; $i<count($this->a_tselect); $i++){
						$model .= '
					$tbl.=\'<td \'.$bg.\'  width="'.trim($this->a_ugrid[$i]).'" >\'.$row[\''.trim($this->a_tselect[$i]).'\'].\'</td>\';
					';
								}
				$model .= '
					$tbl.=\'</tr>\';
					$no++;
				}
				
				$tbl.=\'</table>\';
				echo $tbl;
			}
		
		
		function export_pdf'.$this->gen_id.'() {
			
			$this->load->library(\'pdf\');
			ob_clean();
			$pdf = new Pdf(\'P\', \'mm\', \'A4\', true, \'UTF-8\', false);
			$tbl=\'\';
			$tbl.=\'
				<h3><u>'.strtoupper($this->fname).'</u></h3>
				<table border="0"  cellpadding="0" cellspacing="0" >
				 <tr >\';
				 $tbl.=\'<th  align="center" bgcolor="#359AFF" width="30" >NO</th>\';
				 ';
				 
				 for($i=0; $i<count($this->a_jqgrid); $i++){
					$model .= '$tbl.=\'<th   valign="middle" bgcolor="#359AFF" width="'.trim($this->a_ugrid[$i]).'" >'.strtoupper(trim($this->a_jqgrid[$i])).'</th>\';
					 ';
					}
				 
				  
				$model .=' $tbl.=\'</tr>\';
				';
				$model .='$sql="'.$this->full_q.'";
				$data= $this->m_global->grid_view($sql)->result_array();
				$no=1;
				foreach($data as $row){
					$bg=$no%2;
					if($bg==0){$bg=\' bgcolor="#E1F0FF" \';}else{$bg=\' bgcolor="#FFFFFF" \';}
					
					$tbl.= \'
					<tr>
					<td \'.$bg.\'  align="center" width="30">\'.$no.\'</td>\';
					';
					
					for($i=0; $i<count($this->a_tselect); $i++){
						$model .= '
					$tbl.=\'<td \'.$bg.\'  width="'.trim($this->a_ugrid[$i]).'" >\'.$row[\''.trim($this->a_tselect[$i]).'\'].\'</td>\';
					';
								}
			$model .= '
					$tbl.=\'</tr>\';
					$no++;
				}
				
				$tbl.=\'</table>\';
				$pdf->AddPage();
				$pdf->SetFont(\'helvetica\', \'\', 8);
				$pdf->writeHTML($tbl, true, false, false, false, \'\');
				$pdf->Output(\'example_048.pdf\', \'I\');
      }
		';
		
		foreach($this->ac as $inx=>$val){
			$model .= ' 
			function '.trim($inx).'(){
			$data=array();
			$ftr  = element(\''.trim($inx).'\',$_POST);
			$sql="'.trim($val).' where '.trim($inx).' like \'%".trim($ftr)."%\'";
			
			$hasil = $this->db->query($sql);
			 foreach ($hasil->result_array() as $row)
				 {
					$data[] = $row;
				 }
			echo json_encode($data);
			}
			';
		}
        $model .= ' }';
        return $model;
    }

	function build_javascript(){
	$javascript='';
	$hdg='';
		for($i=0; $i<count($this->a_jqgrid); $i++){
					if((count($this->a_jqgrid)-1)>$i){
						$hdg .='\''.trim($this->a_jqgrid[$i]).'\',';
					}
					else{
						
						$hdg .='\''.trim($this->a_jqgrid[$i]).'\'';
						}
					}
	 $javascript .= ' 
		$(document).ready(function () {
		var mygrid'.$this->gen_id.'=jQuery("#list2'.$this->gen_id.'").jqGrid({
					url: base_js+"/index.php/'.trim(strtolower($this->controllername)).'/view_grid'.$this->gen_id.'", 
					datatype: "json", 
					height: "300", 
					//postData: { id: \'0\' },
					mtype: "POST",
					colNames: ['.strtoupper(trim($hdg)).'],
					colModel: [
						//{name:\'\', index:\'\',width:50,align:\'center\'},';
						
						for($i=0; $i<count($this->a_tselect); $i++){
						
						$javascript .= '
						{name:\''.trim($this->a_tselect[$i]).'\',width:'.trim($this->a_ugrid[$i]).',index:\''.trim($this->a_tselect[$i]).'\',editable:false},';
						
						}
						
						$javascript .= '
					],
					
					rowNum: 20,
					rowList: [20,30,50],
					pager: \'#pager2'.$this->gen_id.'\',
					sortname: \''.trim($this->orderby).'\',
					viewrecords: true,
					sortorder: "'.trim($this->desc_asc).'",
					autowidth: false,
					multiselect: false, 
					rownumbers: true,
					rownumWidth:40,
					caption: "'.ucfirst(trim($this->jdl_jqgrid)).'", 
					beforeRequest: function() {
            			responsive_jqgrid($(".jqGrid"));
        			}				
				});
				
				jQuery("#list2'.$this->gen_id.'").jqGrid(\'navGrid\',\'#pager2'.$this->gen_id.'\',{view:false,edit:false,add:false,del:false,search:false,refresh:true});	

		jQuery("#list2'.$this->gen_id.'").jqGrid(\'navButtonAdd\',"#pager2'.$this->gen_id.'",{caption:"Cari",title:"Cari", buttonicon :\'ui-icon-search\', onClickButton:function(){ mygrid'.$this->gen_id.'[0].toggleToolbar() } }); 
		
		jQuery("#list2'.$this->gen_id.'").jqGrid(\'filterToolbar\',{
            stringResult: true,
            searchOnEnter : true
        });
		mygrid'.$this->gen_id.'[0].toggleToolbar();
		jQuery("#list2'.$this->gen_id.'").setGridParam({onSelectRow:function(id){
		var data_'.$this->gen_id.'=id.split(\',\');
			$(\'#simpandata'.$this->gen_id.'\').val(\'Ubah\');
			';
				$hsl__='';
					for($i=0; $i<count($this->join_field_form); $i++){
						$hsl__=element(trim($this->join_field_form[$i]), $this->arr_aso_tselect);
					  if(is_null($hsl__)){
						  $hsl__=element(trim($this->join_field_form[$i]), $this->arr_aso_hselect);
						  if(is_null($hsl__)){
							  $javascript .= '
							  $("#'.trim($this->join_field_form[$i].$this->gen_id).'").val(data_'.$this->gen_id.'[0]);
							  ';	
						  }else{
							  for($iu=0; $iu<count($this->a_hselect); $iu++){
								  if(trim($this->a_hselect[$iu])==trim($hsl__)){
									  $javascript .= '
										  $("#'.trim($hsl__.$this->gen_id).'").val(data_'.$this->gen_id.'['.$iu.']);			
						  ';
								  }
							  }
						  }
					}else{
						if($this->tipe_field_a[$i]=='chk'){
								$javascript .= '
							if(jQuery("#list2'.$this->gen_id.'").jqGrid(\'getCell\',id,\''.trim($hsl__).'\')==\'1\'){
								$("#'.trim($hsl__.$this->gen_id).'").prop("checked", true);
							}else{
								$("#'.trim($hsl__.$this->gen_id).'").prop("checked", false);
									
							}
						';
						}else{
							$javascript .= '
							$("#'.trim($hsl__.$this->gen_id).'").val(jQuery("#list2'.$this->gen_id.'").jqGrid(\'getCell\',id,\''.trim($hsl__).'\'));
						';
						}
					}
				}
			$javascript .= '
			} 
					});  
		 function responsive_jqgrid(jqgrid) {
			jqgrid.find(\'.ui-jqgrid\').addClass(\'clear-margin\').css(\'width\', \'\');
			jqgrid.find(\'.ui-jqgrid-view\').addClass(\'clear-margin \').css(\'width\', \'\');
			jqgrid.find(\'.ui-jqgrid-view > div\').eq(1).addClass(\'clear-margin\').css(\'width\', \'\').css(\'min-height\', \'0\');
			jqgrid.find(\'.ui-jqgrid-view > div\').eq(2).addClass(\'clear-margin\').css(\'width\', \'\').css(\'min-height\', \'0\');
			jqgrid.find(\'.ui-jqgrid-sdiv\').addClass(\'clear-margin\').css(\'width\', \'\');
			jqgrid.find(\'.ui-jqgrid-pager\').addClass(\'clear-margin\').css(\'width\', \'\');
	
		}
		 $("input").change(function(){
				$(this).parent().parent().removeClass(\'has-error\');
				$(this).next().empty();
			});
			$("textarea").change(function(){
				$(this).parent().parent().removeClass(\'has-error\');
				$(this).next().empty();
			});
			$("select").change(function(){
				$(this).parent().parent().removeClass(\'has-error\');
				$(this).next().empty();
			});
		
		';
		
		$javascript .= '
			$("#form_'.trim($this->controllername).$this->gen_id.'").validationEngine({promptPosition : "topRight", scroll: false});
			
			$("#simpandata'.$this->gen_id.'").click(function(){
					$("#h_form'.$this->gen_id.'").val($("#simpandata'.$this->gen_id.'").val());
					$("#form_'.trim($this->controllername).$this->gen_id.'").trigger("submit");
				})
			$("#hpus'.$this->gen_id.'").click(function(){
				$("#h_form'.$this->gen_id.'").val($("#hpus'.$this->gen_id.'").val())
				$("#form_'.trim($this->controllername).$this->gen_id.'").trigger("submit");
			});
			
			
			 $("#form_'.trim($this->controllername).$this->gen_id.'").submit(function() { 
		  var act=$("#h_form'.$this->gen_id.'").val();
		   $(this).ajaxSubmit({
			data:{"act":act},
			beforeSubmit:  function (formData, jqForm, options) { 
							if($("#form_'.trim($this->controllername).$this->gen_id.'").validationEngine("validate")){
								var conf = confirm("Yakin Akan "+act+" Data Ini?");
								if(conf) return true; else return false;
								
							}else{
								return false;
							}
						} ,
			success:       function(data)  { 
			
							if(data.dt.status) 
							{
								$("#simpandata'.$this->gen_id.'").val("Simpan");
								$("#form_'.trim($this->controllername).$this->gen_id.'").resetForm();
								$("#form_'.trim($this->controllername).$this->gen_id.'").clearForm();
								jQuery("#list2'.$this->gen_id.'").trigger("reloadGrid");
								$("#batal'.$this->gen_id.'").trigger(\'click\');
								alert(data.ket);
								
							}
							else
							{
								for (var i = 0; i < data.dt.inputerror.length; i++) 
								{
									
									$(\'[name="\'+data.dt.inputerror[i]+\'"]\').parent().parent().addClass(\'has-error\'); 
									$(\'[name="\'+data.dt.inputerror[i]+\'"]\').next().text(data.dt.error_string[i]); 
								}
							}
							
						} ,
	 
			url:base_js+\'index.php/'.trim($this->controllername).'/crud'.$this->gen_id.'\',
			type:"post",       
			dataType:"JSON",   
				 
			}); 
	 
			return false; 
		}); 
			
			
		
		$("#batal'.$this->gen_id.'").click(function(){
			
			$("#form_'.trim($this->controllername).$this->gen_id.'").validationEngine(\'hideAll\');
			$(\'#simpandata'.$this->gen_id.'\').val(\'Simpan\');
			$("#h_form'.$this->gen_id.'").val("")
			';
			
			for($i=0; $i<count($this->form_hiden_a); $i++){
						$javascript .= '
						
						$(\'#'.trim($this->form_hiden_a[$i].$this->gen_id).'\').val(\'\');';
							
						
						}
						
			for($i=0; $i<count($this->form_tampil_a); $i++){
						
						if(trim($this->tipe_field_a[$i])=='chk'){
						$javascript .= '
							$("#'.trim($this->form_tampil_a[$i].$this->gen_id).'").prop("checked", false);
						';
						}else if(trim($this->tipe_field_a[$i])=='dd'){
						$javascript .= '
							
							$("select#'.trim($this->form_tampil_a[$i].$this->gen_id).'").prop(\'selectedIndex\', 0);
						';
						}else{
						$javascript .= '
							$(\'#'.trim($this->form_tampil_a[$i].$this->gen_id).'\').val(\'\');
						';	
							
							
							
						}
						
						}
			
			
			$javascript .= '
			})
			';
			
			for($i=0; $i<count($this->dp); $i++){
			
				$javascript .= '
							$( "#'.trim($this->dp[$i].$this->gen_id).'" ).datepicker({
							dateFormat : \'dd-mm-yy\',
							onClose: function (){
								
							}
							});
							';			
			}
			
			$ubi=0;
			
			foreach($this->ac as $inx=>$val){
			
			$javascript .= ' 
			
			$(\'#'.trim($inx).$this->gen_id.').autocomplete({
				minLength : 1,
				source: function(request, response) {
					$.ajax({
						type : \'POST\',
						url: base_js+\'/index.php/'.trim($this->controllername).'/'.trim($inx).',
						dataType: "json",
						data: {						
								\''.trim($inx).'\' : $("#'.trim($inx.$this->gen_id).'").val()
						 },
						success: function(data) {
							response( $.map( data, function( item ) {							
								return {
									label: item.nama,
									value: item.nama,
									allData : item
								}
							}));						
						}
					});
				},
				select : function(event, ui){
					// $("#'.trim($inx.$this->gen_id.$ubi).'").val(ui.item.allData.id);
				   
				}
			});
			
			';
		$ubi++;
		
		}
		$javascript .= '
		})
		
		';	
		return $javascript;
		} 
    function download() {

        //$this->controller_data = $controller = $this->build_controller($fields);
        //// $this->create_data = $view_create = $this->build_view_create($fields);
        /// $this->model_data = $model = $this->build_model($fields);
        // $this->list_data



        $this->load->library('zip');
        $controller_date = $this->controller_data;
        $model_date = $this->model_data;
        $create_view_date = $this->create_data;
        $create_list_date = $this->list_data;
        $header_date = $this->header_data;
        $footer_date = $this->footer_data;

        $controller_file_name = 'controllers/' . $this->controllername . '.php';
        $model_file_name = 'models/' . $this->modelname . '.php';
        $createview_file_name = 'views/' . $this->create_viewname . '.php';
        $listview_file_name = 'views/' . $this->create_viewname . '.php';



        $header_file_name = 'views/' . $this->header . '.php';
        $footer_file_name = 'views/' . $this->footer . '.php';
        $this->zip->add_data($controller_file_name, $controller_date);
        $this->zip->add_data($model_file_name, $model_date);
        $this->zip->add_data($createview_file_name, $create_view_date);
        $this->zip->add_data($listview_file_name, $create_list_date);

        //header and footer
        $this->zip->add_data($header_file_name, $header_date);
        $this->zip->add_data($footer_file_name, $footer_date);

// Write the zip file to a folder on your server. Name it "my_backup.zip"
        $this->zip->archive('temp/' . $this->controllername . '.zip');

// Download the file to your desktop. Name it "my_backup.zip"
        $this->zip->download($this->controllername . '.zip');
        //force_download($name, $data);
    }

}

?>
