<?php

    // require db parameters
    require_once("db-parameters.php");

    // db class
    class DBCon{

        protected $username = USERNAME;
        protected $password = PASSWORD;
        protected $dns = DNS;
        protected $db_conn = null;
        protected $db_transaction;
        protected $db_status;


        public function __construct(){

            $this->db_conn = $this->connectionString();

        }

        public function connectionString(){

            try {

                $this->db_transaction = new PDO($this->dns, $this->username, $this->password);
                $this->db_transaction->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $this->db_status = [
                    'status' => 'success',
                    'msg' => 'Connection to DB successful done',
                    'error' => null
                ];

            } catch (\PDOException $th) {

                $this->db_status = [
                    'status' => 'failed',
                    'msg' => 'Connection to DB failed to be created',
                    'error' => $th->getMessage()
                ];
                $this->db_transaction = null;
            }
            // return json_encode($this->db_status);
            return $this->db_transaction;
        }



    }