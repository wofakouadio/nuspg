<?php

    class StudentRegistration extends DBCon{

        protected $studentName;
        protected $studentID;
        protected $studentLevel;
        protected $studentProgram;
        protected $studentHall;
        protected $studentContact;
        protected $studentProfile;

        public function StudentReg($studentName, $studentID, $studentLevel, $studentProgram, $studentHall, $studentContact, $studentProfile){

            // initialization
            $this->studentName = $studentName;
            $this->studentID = $studentID;
            $this->studentLevel = $studentLevel;
            $this->studentProgram = $studentProgram;
            $this->studentHall = $studentHall;
            $this->studentContact = $studentContact;
            $this->studentProfile = $studentProfile;

            // db connection
            $connection = $this->connectionString();

            // check if student has his/her information in db
            $studentCheck_sql = "SELECT * FROM `nupsg-students` WHERE `student_id` = :student_id";
            $stmt_check = $connection->prepare($studentCheck_sql);
            $stmt_check->bindValue(":student_id", $studentID, PDO::PARAM_STR);
            $stmt_check->execute();

            if($stmt_check->rowCount() > 0){

                $data = [
                    'status' => 'failed',
                    'msg' => $studentName . ' already exists',
                    'error' => null
                ];

            }else{

                try {

                    $studentInsert_sql = "INSERT INTO `nupsg-students`(`student_id`,`student_name`, `student_level`, `student_program`, `student_hall`, `student_contact`, `student_profile`)VALUES(:student_id, :student_name, :student_level, :student_program, :student_hall, :student_contact, :student_profile)";
                    $stmt_insert = $connection->prepare($studentInsert_sql);
                    $stmt_insert->bindValue(":student_id", $studentID, PDO::PARAM_STR);
                    $stmt_insert->bindValue(":student_name", $studentName, PDO::PARAM_STR);
                    $stmt_insert->bindValue(":student_level", $studentLevel, PDO::PARAM_STR);
                    $stmt_insert->bindValue(":student_program", $studentProgram, PDO::PARAM_STR);
                    $stmt_insert->bindValue(":student_hall", $studentHall, PDO::PARAM_STR);
                    $stmt_insert->bindValue(":student_contact", $studentContact, PDO::PARAM_STR);
                    $stmt_insert->bindValue(":student_profile", $studentProfile, PDO::PARAM_STR);
                    $stmt_insert->execute();

                    $data = [
                    'status' => 'success',
                    'msg' => $studentName . ' registered successfully',
                    'error' => null
                ];

                } catch (\PDOException $th) {
                    $data = [
                        'status' => 'failed',
                        'msg' => 'Something went wrong.',
                        'error' => $th->getMessage()
                    ];
                }

            }

            return json_encode($data);

        }


    }