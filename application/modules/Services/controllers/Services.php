<?php 


class Services extends MX_Controller {


    function booking($sched)
    {
        $data['id'] = $sched;

        $data['bk'] = $bl = $this->bookingDetails($sched);;

        $data['toto'] = $this->db->query("select count(id) i from bookings where sched = $sched")->row("i");

        serve('booking',$data);
    }


    public function bookingDetails($sched)
    {
    
        return $this->db->query("select 
        sc.id, sc.dated, st.names stage, sc.dept_time origin,
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
}