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


        // $builder->select("posts.*, CONCAT(authors.first_name, ' ', authors.last_name) as fullname");
        // $builder->join("posts", "posts.author_id = authors.id");
        // $query = $builder->get();

        // SELECT posts.*, CONCAT(authors.first_name, ' ', authors.last_name) as author_name FROM authors JOIN posts ON posts.author_id = authors.id;

        // $builder->select('*');
        // $builder->where('first_name','Luisa');
        // $query = $builder->get();
        // SELECT * FROM authors WHERE first_name = 'Luisa';

        // $builder->select('*');
        // $builder->where('first_name','Luisa');
        // $builder->where('last_name','Hyatt');
        // $query = $builder->get();
        // SELECT * FROM authors WHERE first_name = 'Luisa' AND last_name = 'Hyatt';

        // $builder->select('*');
        // $builder->where('first_name','Luisa');
        // $builder->orWhere('last_name','Hyatt');
        // $query = $builder->get();
        // SELECT * FROM authors WHERE first_name = 'Luisa' OR last_name = 'Hyatt';

        // $builder->select('*');
        // $builder->where('id',1);
        // $builder->orWhere('id',3);
        // $query = $builder->get();
        // SELECT * FROM authors WHERE id = 1 OR id = 3;

        // $builder->select('*');
        // $builder->where('id >',1);
        // $query = $builder->get();
        // SELECT * FROM authors WHERE id > 1;

        // $builder->select('*');
        // $builder->where('id >=',1);
        // $query = $builder->get();
        // SELECT * FROM authors WHERE id >= 1;

        // $builder->select('*');
        // $builder->where('id <=',2);
        // $query = $builder->get();
        // SELECT * FROM authors WHERE id <= 2;

        // $builder->select('*');
        // $builder->whereIn('id',[1,2,3]);
        // $query = $builder->get();
        // SELECT * FROM authors WHERE id IN (1,2,3);

        // $builder->select('*');
        // $builder->whereNotIn('id',[1,2,3]);
        // $query = $builder->get();
        // SELECT * FROM authors WHERE id NOT IN (1,2,3);

        // $builder->select('*');
        // $builder->like('first_name','ama');
        // $query = $builder->get();
        // SELECT * FROM authors WHERE first_name LIKE '%ama%';

        // $builder->select('*');
        // $builder->like('first_name','art');
        // $builder->orLike('last_name','art');
        // $query = $builder->get();
        // SELECT * FROM authors WHERE first_name LIKE '%ama%' OR last_name LIKE '%ama%';

        // $builder->select('*');
        // $builder->orderBy('id','DESC'); //ASC
        // $query = $builder->get();
        // SELECT * FROM authors ORDER BY id DESC;

        // $builder->select('last_name, COUNT(*) as total');
        // $builder->groupBy('last_name'); //ASC
        // $query = $builder->get();
        // SELECT last_name, COUNT(*) as total FROM authors GROUP BY last_name;

        $data = [
            'first_name' => 'RUFINO JOHN',
            'last_name' => 'AGUILAR',
            'email' => 'aguilarufino@gmail.com',
            'birthdate' => '1990-01-01',
            'added' => date('Y-m-d H:i:s')  
        ];

        $builder->insert($data);

        $builder->select('*');
        $builder->where('first_name','RUFINO JOHN');
        $query = $builder->get();
      



        $result = $query->getResult();
        return json_encode($result);
        
        
        


        return view('welcome_message');
    }
}
