<?php 

class Admin extends MX_Controller {

    public function index(){
        
        $this->dash();

    }


    // public function cars(){

    //     $this->dash('cars');
    // }

    // public function routes(){

    //     $this->dash('routes');
    // }

    // public function stages(){

    //     $this->dash('stages');
    // }

    // public function regions(){

    //     $this->dash('regions');
    // }

    // public function booking(){

    //     $this->dash('booking');
    // }

    public function modx($mod)
    {
        if(in_array($mod,$this->modules())){ 

            $this->dash($mod);

        }else{

            $this->$mod();

        }
    }


    public function dash($active='cars')
    {
    
        $data = $this->mods($active);

        serve("admin/dashboard",$data); 
    
    }

    protected function mods($active= 'cars'){
        $mods = $this->modules();
        
        $active = $active;

        return ["mods"=>$mods,"active"=>$active];
    }


    protected function modules()
    {
        return [
            "cars",
            "rush_hours",
            "regions",
            "routes",
            "stages",
            "bind_routes",
            "schedule",
            "booking",
        ];
    }


    public function config(){
        // serve('config');
        pf('testing');
    }
}