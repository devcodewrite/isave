<?php
defined('BASEPATH') or exit('No direct script allowed');

class Associations extends CI_Controller
{
    /**
     * Show a list of resources
     * @return string html view
     */
    public function index()
    {
        $this->load->view('pages/associations/list');
    }

     /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $data = [
        'association' => $this->association->find($id),
        ];
        $this->load->view('pages/associations/detail', $data);
    }

     /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $data = [
            'communities' => $this->association->communities(), // replace with a query of existing coummnunities in associations table
            'clusterOfficeAddresses' => $this->association->clusterOffices(),  // replace with a query of existing cluter office address in associations table
        ];
        $this->load->view('pages/associations/edit', $data);
    }

     /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $data = [
            'association' => null, //This is an example replace with actual model
        ];
        $this->load->view('pages/associations/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store ()
    {
        # code...
       $association  = null; // replace created record object
       if($association){
           $out = [
               'data' => $association,
               'status' => true,
               'message' => 'Association created successfully!'
           ];
       }
       else {
           $out = [
               'status' => false,
               'message' => "Association couldn't be created!"
           ];
       }
       httpResponseJson($out);
    }

    /**
     * Update a resource
     * print json Response
     */
    public function update (int $id = null)
    {
       
        $accounts = null; // replace created record object
        if($accounts){
            $out = [
                'status' => true,
                'message' => 'Association data updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Association data couldn't be updated!"
            ];
        }
        httpResponseJson($out);
    }

    /**
     * Delete a resource
     * print json Response
     */
    public function delete (int $id = null)
    {
        
        $accounts =null; // replace created record object
        if($accounts){
            $out = [
                'status' => true,
                'message' => 'Association data updated successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Association data couldn't be updated!"
            ];
        }
        httpResponseJson($out);
    }

    public function datatables()
    {
        $start = $this->input->get('start', true);
        $length = $this->input->get('length', true);
        $draw = $this->input->get('draw', true);
        $inputs = $this->input->get();

        $out = datatable($this->association->all(),$start, $length, $draw, $inputs);
        $out = array_merge($out, [
            'input' => $this->input->get(),
        ]);
        httpResponseJson($out);
    }

    public function select2()
    {
        $term = trim($this->input->get('term'));
        $take = 10;
        $page = $this->input->get('page', true)?$this->input->get('page', true):1;
        $skip = ($page - 1 )*$take;

        $total = $this->association->all()->get()->num_rows();
        
        $records = $this->association->all()->select('id, name as text')
                    ->like('name', $term)
                    ->limit($take, $skip)
                    ->get()
                    ->result();

        $out = [
            'results' => $records,
            'pagination' => [
               'more' => ($skip + $take < $total),
               'page' => intval($page),
               'totalRows' => $total,
               'totalPages' => intval($total/$take + ($total%$take > 0?1:0))
            ]
        ];

        return httpResponseJson($out);
    }
}