<?php

use SebastianBergmann\Type\TypeName;

use function PHPSTORM_META\type;

defined('BASEPATH') or exit('No direct script access allowed');

require_once BASEPATH . '/database/DB.php';


if (!function_exists('datatable')) {
    /**
     * @param mixed $query
     * @param int $page page number
     * @param int $per_page number of results per page
     * @return array structure for datatables
     */
    function datatable($query, int $page = 1, int $per_page = 2)
    {
        $start = ($page - 1) * $page;
        $take = $per_page;
        $total = 0;

        $ci = (object)get_instance();

        if($query instanceof CI_DB_driver){
            $query = (object) $query;

            $total = $query->get()->num_rows();
            $query = $ci->db->last_query();
            $result = $ci->db->query($query." limit $start, $take");
            return datatable_array($result,$total, $page, $per_page);
        }
        else if(gettype($query) === 'string'){
            $result = $ci->db->query($query);
            $total = $result->num_rows();
            $result = $ci->db->query($query." limit $start, $take");
            return datatable_array($result, $total, $page, $per_page);
        }
        throw new InvalidArgumentException('$query must be of type string or an instance of CI_DB_driver', 0);
    }

    function datatable_array(CI_DB_mysqli_result $result, $total)
    {
        if(!$result) return []; // for invalid result
        $data = [
            'draw' => 1,
            'recordsTotal' => $total,
            'recordsFiltered' => $result->num_rows(),
            'data' => $result->result(),
        ];
        return $data;
    }
    /**
     * @param array|object $data
     * Output result to http response as application/json content type
     */
    function httpResponseJson($data)
    {
        $ci = (object)get_instance();
        $ci->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
    }

}
