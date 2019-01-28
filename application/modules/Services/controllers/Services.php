<?php 


class Services extends MX_Controller {


	public function __construct()
	{
		$this->load->model('Api');
	}


    function booking($sched)
    {
        $data['id'] = $sched;

        $data['bk'] = $bl = $this->bookingDetails($sched);;

        $data['toto'] = $this->db->query("select count(id) i from bookings where sched = $sched")->row("i");

        serve('booking',$data);
    }


    function bookcar($sched)
    {
        $data['id'] = $sched;
        
        $data['wallet'] = $this->db->where('uid',$this->session->user_id)->get('walletPool')->row('amount');

        $data['bk'] = $bl = $this->bookingDetails($sched);;

        $data['toto'] = $this->db->query("select count(id) i from bookings where sched = $sched")->row("i");

        serve('bookcar',$data);
    }


    public function success($param=null)
    {
    
        $myMeth = 'success'.$param;

pf($myMeth);

        // $this->$myMeth();
    
    }


    public function successbooking()
    {
    
         serve('successbooking');
    
    }


    public function bookingDetails($sched)
    {
    
        return $this->db->query("select 
        sc.id, sc.dated, st.names stage, sc.dept_stage, sc.dept_time origin,
        rh.names rush, trim(rh.description) rushdata,
        rg.names town,
        rt.names route, rt.fare, rt.id routeId,
        c.name car, c.seat
        from schedules sc
        left join rush_hours rh on rh.id = sc.rushhour
        left join regions rg on rg.id = sc.town
        left join routes rt on rt.id = sc.route
        left join cars c on c.id = sc.car 
        left join stages st on st.id = sc.dept_stage 
        where sc.id = $sched
        ")->row(); 
    
    }


    public function find()
    {

        $data['routes'] = $this->Api->routes();
		
		$data['towns'] = $this->Api->towns();
    
        serve('finder', $data);
    
    }


    public function wallet()
    {
    
        serve('wallet');
    
    }


    public function topup()
    {
        $data['wallet'] = $this->db->where('uid',$this->session->user_id)->get('walletPool')->row('amount');
    
        serve('topup', $data);
    
    }


    public function statement($id)
    {
        $uid = $this->db->query('select uid from walletPool where id = '.$id)->row('uid');

        if(!$uid) redirect('wallet');
        
        $data['uid'] = $uid;
        
        serve('statement',$data);
    
    }
}