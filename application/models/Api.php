<?php 

class Api extends CI_Model {


    public function routes($param=null)
    {
    
        /* if param is null return all routes */
        $where = $param ? ' = '.$param : ' > 1';
        
        return get('select id, ucase(names) names from routes where town '.$where);
       
    }


    public function cars($var = null)
    {
        return get('select s.id, ucase(concat(c.name, " LEAVING ", st.names, " AT ", s.dept_time)) names 
                    from schedules s 
                    left join cars c on c.id = s.car 
                    left join stages st on st.id = s.dept_stage
                    where s.route =  '.$var);
    }

    public function schedule($var = null)
    {
        return $this->db->query('select s.id, ucase(c.name) car, r.fare, st.names stage, ucase(r.names) route, s.dept_time, c.seat capacity, s.dated
                    from schedules s 
                    left join cars c on c.id = s.car 
                    inner join routes r on r.id = s.route 
                    left join stages st on st.id = s.dept_stage
                    where s.id =  '.$var)->row();
    }

    public function towns($param=null)
    {
    
        return get('select id, ucase(names) names from regions');
    
    }
}