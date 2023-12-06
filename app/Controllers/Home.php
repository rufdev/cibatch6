<?php

namespace App\Controllers;

use CodeIgniter\Database\RawSql;

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

        // $query = $builder->select('id,first_name,last_name, CONCAT(first_name, " ", last_name) as fullname')->get();
        // $query = $builder->select('id,first_name,last_name, CONCAT(first_name, " ", last_name) as fullname')->where('id', 1)->get();

        // $sql = "CONCAT(first_name, ' ', last_name) as fullname";

        // $builder->select(new RawSql($sql));
        // $query = $builder->get();
        // SELECT CONCAT(first_name, ' ', last_name) as fullname FROM authors;

        // MAX, MIN, AVG, COUNT, SUM
        // $builder->selectMax('id');
        // $query = $builder->get();
        // SELECT MAX(id) FROM authors;

        // $builder->selectMin('id');
        // $query = $builder->get();
        // SELECT MIN(id) FROM authors;

        // $builder->selectAvg('id');
        // $query = $builder->get();
        // SELECT AVG(id) FROM authors;

        // $builder->selectSum('id');
        // $query = $builder->get();
        // SELECT SUM(id) FROM authors;

        // $builder->selectCount('id');
        // $query = $builder->get();
        // SELECT COUNT(id) FROM authors;



        $result = $query->getResult();
        return json_encode($result);
        
        
        


        return view('welcome_message');
    }
}
