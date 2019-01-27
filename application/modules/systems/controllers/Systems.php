<?php 
defined("BASEPATH") || exit('No Way Through');



class Systems extends MX_Controller {


    public function __construct()
    {
        
        $this->load->model('System');

        $this->load->model('Api');
    }

    public function routes($town=null)
    {
    
        $routes = $this->api->routes($town);

        echo json_encode($routes);
    
    }

    public function api($var, $value = null)
    {

        echo json_encode($this->Api->$var($value));

    }


    public function combo($table, ...$where)
    {
        $field = array_shift($where);

        echo json_encode($this->System->combo($table,$field,$where));
    }


    public function tests($param = 'dashboard') { serve('developer/'.$param); }


    public function tabloPrinter() { $this->System->tabloPrinter(); }


    public function customPrinter() { $this->System->customPrinter(); }


    private static function args(){ return explode(',',implode(',',func_get_args())); }


    public function divPrinter() { $_SESSION["divPrint"] = current($_POST); }


    public function out($param=null)
    {
    
        if(!is_null($param)){

            $this->load->view('print/header');

            $this->load->view('print/'.$param) ;

            $this->load->view('print/footer');

        }
    
    }

    public function data()
    {
        serve('datalist');
    }

    public function about()
    {
        echo "Bomba Services &copy 2018";
    }

}