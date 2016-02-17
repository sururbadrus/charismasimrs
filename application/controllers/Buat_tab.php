
<?php
 
class Buat_tab extends CI_Controller {

  
	
    private $controllername; // controller name
    private $fname; // form name
    
	private $model_other_name='m_global';
    private $listviewname;
    private $create_viewname;
	private $header = 'design/header';
    private $footer = 'design/footer';
    private $header_data = '';
    private $footer_data = 'footer';
	private $link_tab;
	private $link_tab_label;
	private $a_link_tab=array();
	private $a_link_tab_label=array();
	private $library_list = array("form_validation", "session");
    private $helper_list = array("url","array");
	private $gen_id = '';

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

    
    public function index() {

        $data = '';
        $this->form_validation->set_rules('cname', 'Controller Name', 'required|xss_clean');
        $this->form_validation->set_rules('link_tab', 'Tab List', 'required|xss_clean');
         $this->form_validation->set_rules('link_tab_label', 'Tab List Label', 'required|xss_clean');
        if ($this->form_validation->run() === FALSE) {
            
        } else {
           	$this->link_tab = strtolower(trim($this->input->post("link_tab")));
			$this->a_link_tab = explode(',',$this->link_tab);
			$this->link_tab_label = strtolower(trim($this->input->post("link_tab_label")));
			$this->a_link_tab_label = explode(',',$this->link_tab_label);
            
           $this->gen_id=gmdate("s",mktime(date("H")+7));
            $cname = strtolower($this->input->post("cname"));
			$this->controllername = str_replace(' ', '_', $cname);
			$this->create_viewname = 'v_'.str_replace(' ', '_', $cname);
            $data['controllername'] = $this->controllername;
            $data['create_viewname'] = $this->create_viewname;
			
			$this->controller_data = $controller = $this->build_controller();
            $this->create_data = $view_create = $this->build_view_create();
			
			
            $data['controller'] = $controller;
            $data['view_create'] = $view_create;
           
            if (isset($_POST['download'])) {
              
                $this->download();
            }
        }

		$data_header["tampil_menu"]=''; 
		$data_header["profil"] ='';
		$this->load->view('design/header',$data_header);
        $this->load->view('buat_tab', $data);
        $this->load->view('design/footer');
		
        
    }

   
    function build_controller() {
		
		$library_list = $this->library_list;
        $helper_list = $this->helper_list;
		$model_other_name= $this->model_other_name;
        $controller = '
	<?php if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');
	   class ' . ucfirst($this->controllername) . ' extends CI_Controller {
        public function __construct() {
                parent::__construct();
				';
        $controller .= '
		$this->load->model(\'' . $this->model_other_name . '\');
        }
		
    function index(){
		$data_header["tampil_menu"]=\'\'; 
		$data_header["profil"] =\'\';
		';
		$controller .= '
		$this->load->view(\'' . $this->header . '\',$data_header);
        $this->load->view(\'' . $this->create_viewname. '\',$data);
        $this->load->view(\'' . $this->footer . '\');
    }';
		$controller .= '  
		}';
        return $controller;
    }

function build_view_create() {
		$view='';
        $view .= '
			
		<div class="row">
			<ul class="nav nav-tabs" id="'.trim($this->controllername).'">
				';
					  for($i=0; $i<count($this->a_link_tab); $i++){
						  if($i==0){$active="active";}else{$active="";}
				$view .= '
				<li class="'.$active.'"><a href="#'.trim($this->a_link_tab[$i]).$this->gen_id.'" data-url="'.base_url(trim($this->a_link_tab[$i])).'">'.ucwords(trim($this->a_link_tab_label[$i])).'</a></li>
					  ';
					  }
					  $view .= '	
			</ul>
					  
					
		</div> ';
			 $view .= '
		<div class="tab-content">';
			for($i=0; $i<count($this->a_link_tab); $i++){
				  if($i==0){$active="active";}else{$active="";}
			$view .= '
			<div class="tab-pane '.$active.'" id="'.trim($this->a_link_tab[$i]).$this->gen_id.'">This is the home pane...</div>';
			}
			$view.='
		</div>
		
		
		
		<script>
			
			 $(document).ready(function () {
				$("#'.trim($this->controllername).' a").click(function (e) {
					e.preventDefault();
				  	var url = $(this).attr("data-url");
					var href = this.hash;
					var pane = $(this);
					
					// ajax load from data-url
					$(href).load(url,function(result){      
						pane.tab("show");
					});
				});
				
				// load first tab content
				$("#'.trim($this->controllername).'").load($(".active a").attr("data-url"),function(result){
				  $(".active a").tab("show");
				});


			 })
			 		
		</script>
		
		';
        return $view;
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
        $listview_file_name = 'views/' . $this->listviewname . '.php';



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
