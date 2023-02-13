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
    function datatable($query, int $start = 0, int $per_page = 2, int $draw = 1, $inputs = null)
    {
        $ci = (object)get_instance();
        $take = $per_page;
        $total = 0;

        if ($query instanceof CI_DB_driver) {
            $query = (object) $query;
            if (isset($inputs['date_from']) || isset($inputs['date_to'])) {
                if (!empty($inputs['date_from']) || !empty($inputs['date_to'])) {
                    $ci->db->group_start();
                    $ci->db->where($inputs['date_range_column'] . ' >=', $inputs['date_from']);
                    $ci->db->where($inputs['date_range_column'] . ' <=', $inputs['date_to']);
                    $ci->db->group_end();
                }
            }

            if ($inputs) {
                $ci->db->group_start();
                foreach ($inputs['columns'] as $col) {
                    $ci->db->or_like($col['name'], $inputs['search']['value'], 'both');
                }
                $ci->db->group_end();

                foreach ($inputs['order'] as $order) {
                    $ci->db->order_by($inputs['columns'][$order['column']]['name'], $order['dir']);
                }
            }

            $total = $query->get()->num_rows();
            $query = $ci->db->last_query();
            $result = $ci->db->query($query . " limit $start, $take");
            return datatable_array($result, $total, $draw);
        } else if (gettype($query) === 'string') {
            $result = $ci->db->query($query);
            $total = $result->num_rows();
            $result = $ci->db->query($query . " limit $start, $take");
            return datatable_array($result, $total, $draw);
        }
        throw new InvalidArgumentException('$query must be of type string or an instance of CI_DB_driver', 0);
    }

    function datatable_array(CI_DB_mysqli_result $result, $total, $draw = 1)
    {
        if (!$result) return []; // for invalid result
        $data = [
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
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
