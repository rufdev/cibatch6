<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\Http\Response;
class TicketController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
    }

    public function show($id = null)
    {
        $ticketModel = new \App\Models\Ticket();
        $data = $ticketModel->find($id);
        if (!$data){
            return $this->response->setStatusCode(Response::HTTP_NOT_FOUND);
        }
        return $this->response->setStatusCode(Response::HTTP_OK)->setJSON($data);
    }


    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $ticketModel = new \App\Models\Ticket();
        $data = $this->request->getPost();

        if (!$ticketModel->validate($data)){
            $response = array(
                'status' => 'error',
                'message' => $ticketModel->errors()
            );

            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)->setJSON($response);
        }

        $ticketModel->insert($data);
        $response = array(
            'status' => 'success',
            'message' => "Ticket created successfully"
        );

        return $this->response->setStatusCode(Response::HTTP_CREATED)->setJSON($response);
    }

   

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $ticketModel = new \App\Models\Ticket();
        $data = $this->request->getJSON();
   
        if (!$ticketModel->validate($data)){
            $response = array(
                'status' => 'error',
                'message' => $ticketModel->errors()
            );

            return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)->setJSON($response);
        }

        $ticketModel->update($id,$data);
        $response = array(
            'status' => 'success',
            'message' => "Ticket updated successfully"
        );

        return $this->response->setStatusCode(Response::HTTP_OK)->setJSON($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $ticketModel = new \App\Models\Ticket();
        $data = $ticketModel->find($id);

        if ($data){
            $ticketModel->delete($id);
            $response = array(
                'status' => 'success',
                'message' => 'Ticket deleted successfully'
            );

            return $this->response->setStatusCode(Response::HTTP_OK)->setJSON($response);
        }

        $response = array(
            'status' => 'error',
            'message' => "Record Not Found"
        );

        return $this->response->setStatusCode(Response::HTTP_BAD_REQUEST)->setJSON($response);
    }
}
