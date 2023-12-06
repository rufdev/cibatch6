<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $db = \Config\Database::connect();
        $builder = $db->table('authors');

        // $query = $builder->get(); 
        // SELECT * FROM authors;

        // $query = $builder->getWhere(['id' => 1]);
        // SELECT * FROM authors WHERE id = 1;

        // $query = $builder->select('id, first_name')->get();
        // SELECT id, first_name FROM authors;

        $query = $builder->select('id,first_name,last_name, CONCAT(first_name, " ", last_name) as fullname')->get();



        $result = $query->getResult();
        return json_encode($result);
        
        
        


        return view('welcome_message');
    }
}
