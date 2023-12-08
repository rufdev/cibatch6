<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $ticketModel = new \App\Models\Ticket();
        $officeModel = new \App\Models\Office();
        $data['totaltickets'] = $ticketModel->countAll();
        $data['totalpending'] = $ticketModel->where('state','PENDING')->countAllResults();
        $data['totalprocessing'] = $ticketModel->where('state','PROCESSING')->countAllResults();
        $data['totalresolved'] = $ticketModel->where('state','RESOLVED')->countAllResults();

        $data['totallow'] = $ticketModel->where('severity','LOW')->countAllResults();
        $data['totalmedium'] = $ticketModel->where('severity','MEDIUM')->countAllResults();
        $data['totalhigh'] = $ticketModel->where('severity','HIGH')->countAllResults();
        $data['totalcritical'] = $ticketModel->where('severity','CRITICAL')->countAllResults();

        $data['barchartdata1'] = $officeModel->select("offices.code AS office_name, COUNT(tickets.id) AS ticket_count")
        ->join("tickets","tickets.office_id = offices.id")
        ->groupBy("offices.id")
        ->findAll();

        $data['barchartdata2'] = $ticketModel->select("severity, COUNT(id) AS ticket_count")
        ->groupBy("severity")
        ->findAll();



        return view('pages/dashboard',$data);
    }
}
