<?php
defined('BASEPATH') or exit('No direct script allowed');

class Customers extends MY_Controller
{
    /**
     * Show a list of resources
     * @return string html view
     */
    public function index()
    {
        $this->load->view('pages/customers/list');
    }

     /**
     * Show a resource
     * html view
     */
    public function view(int $id = null)
    {
        $member = $this->member->find($id);
        if(!$member) show_404();

        $data = [
            'member' => $member,
        ];
        $this->load->view('pages/customers/detail', $data);
    }

     /**
     * Show a form page for creating resource
     * html view
     */
    public function create()
    {
        $data = [
            'id_card_types' => $this->idcardtype->all()->get()->result(),
            'acc_types' => $this->acctype->all()->get()->result(),
        ];
        $this->load->view('pages/customers/edit', $data);
    }

     /**
     * Show a form page for updating resource
     * html view
     */
    public function edit(int $id = null)
    {
        $member = $this->member->find($id);
        if(!$member) show_404();

        $data = [
            'id_card_types' => $this->idcardtype->all()->get()->result(),
            'acc_types' => $this->acctype->all()->get()->result(),
            'member' => $member,
        ];
        $this->load->view('pages/customers/edit', $data);
    }

    /**
     * Store a resource
     * print json Response
     */
    public function store ()
    {
        $record = $this->input->post();
        $member  = $this->member->create($record);
        
        if($member){
            $error = $this->session->flashdata('error_message').$this->session->flashdata('warning_message');
            $out = [
                'data' => $member,
                'input' => $this->input->post(),
                'status' => true,
                'message' => 'Customer created successfully! '.$error
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Customer couldn't be created!"
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
        
        $record = $this->input->post();
        $member = $this->member->update($id, $record);
        if($member){
            $error = $this->session->flashdata('error_message').$this->session->flashdata('warning_message');
            $out = [
                'data' => $member,
                'status' => true,
                'input' => $this->input->post(),
                'message' => 'Member data updated successfully! '.$error
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Loan data couldn't be update!"
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
        if($this->member->delete($id)){
            $out = [
                'status' => true,
                'message' => 'Customer data deleted successfully!'
            ];
        }
        else {
            $out = [
                'status' => false,
                'message' => "Customer data couldn't be deleted!"
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

        $out = datatable($this->member->all(),$start, $length, $draw, $inputs);
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

        $total = $this->member->all()->get()->num_rows();
        
        $records = $this->member->all()->select('members.id, concat(members.firstname," ",ifnull(members.lastname,"")) as text', false)
                    ->like('firstname', $term)
                    ->or_like('lastname', $term)
                    ->or_like('othername', $term)
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