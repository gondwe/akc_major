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
        $data['mods'] = $this->modules();
        $data['defTown'] = $this->db->where('a','town')->get('config')->row('b');
        $data['active'] = $active;

        return $data;   
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
            "topup",
            "config",
        ];
    }


    public function save($prop,$value)
    {
        $this->db->where('a',$prop)->set('b',$value)->update('config');
        return;
    }


    public function routeBound($id=null)
    {
    
        if(is_null($id)) {echo '[{"id":"0","name":"SELECT ROUTE"}]'; }else{

        $data = $this->db->where("b.route",$id)
                ->select('c.id,ucase(c.name) name')
                ->from("bindings b")
                ->join("cars c", 'c.id = b.car')
                ->get()->result();

        echo json_encode($data);
        }
    }


    public function stageBound($id=null)
    {
    
        if(is_null($id)) {echo '[{"id":"0","name":"SELECT ROUTE"}]'; }else{

        $data = $this->db->where("stage", $id)
                ->select('c.id,ucase(c.names) name')
                ->from("stages c")
                ->get()->result();

        echo json_encode($data);
        }
    }
}