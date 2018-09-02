<?php

class Installer
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    private function prepare($name, $query)
    {
        $query = file_get_contents('resources/queries/install/'.$query.'.sql');
        return str_replace('{{{table}}}', $this->db->pre($name), $query);
    }

    public function create($name, $query)
    {
        $query = $this->prepare($name, $query);
        $pre = $this->db->pre($name);
        $ins = $this->db->ins();

        try {
            $ins->query($query);
            return 'Created the '.$pre.' table.';
        } catch(PDOException $e) {
            return 'Failed to create the '.$pre.' table.<br><b>'.$e->getMessage().'</b>';
        }
    }

    public function populate($name, $query)
    {
        $query = $this->prepare($name, $query);
        $pre = $this->db->pre($name);
        $ins = $this->db->ins();

        try {
            $ins->query($query);
            return 'Populated the '.$pre.' table.';
        } catch(PDOException $e) {
            return 'Failed to populate the '.$pre.' table.<br><b>'.$e->getMessage().'</b>';
        }
    }

    public function createAdmin($username, $password, $email, $class, $diff)
    {
        $pre = $this->db->pre('users');
        $ins = $this->db->ins();
        $query = "INSERT INTO ".$pre." SET id='1', username=?, password=?, email=?, verify='1', charclass=?, difficulty=?, regdate=NOW(), onlinetime=NOW(), authlevel='1'";

        $query = $ins->prepare($query);
        $query->execute([$username, $password, $email, $class, $diff]);
    }
}