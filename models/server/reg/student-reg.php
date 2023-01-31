<?php

    // session start
    session_start();

    // require sanitize function
    require("../../constants.php");

    if(isset($_POST['student-name']) && isset($_POST['student-id']) && isset($_POST['student-level']) && isset($_POST['student-program']) && isset($_POST['student-hall']) && isset($_POST['student-contact']) && isset($_FILES["student-picture"])){

        $data = [];

        $student_name = SanitizeInput(filter_input(INPUT_POST, 'student-name', FILTER_SANITIZE_SPECIAL_CHARS));
        $student_id = SanitizeInput(filter_input(INPUT_POST, 'student-id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $student_level = SanitizeInput(filter_input(INPUT_POST, 'student-level', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $student_program = SanitizeInput(filter_input(INPUT_POST, 'student-program', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $student_hall = SanitizeInput(filter_input(INPUT_POST, 'student-hall', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $student_contact = SanitizeInput(filter_input(INPUT_POST, 'student-contact', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $student_profile_dir = "../../../student-profiles/";
        $validExtension = array("jpg", "png", "jpeg");

        if(empty($student_name) || $student_name == ""){

            $data = [
                'status' => 'failed',
                'msg' => 'Your name is required',
                'error' => null
            ];

        }
        elseif(empty($student_id) || $student_id == ""){

            $data = [
                    'status' => 'failed',
                    'msg' => 'Student ID is required',
                    'error' => null
                ];
        }
        elseif(empty($student_level) || $student_level == ""){

            $data = [
                    'status' => 'failed',
                    'msg' => 'Your Level is required',
                    'error' => null
                ];
        }
        elseif(empty($student_program) || $student_program == ""){

            $data = [
                    'status' => 'failed',
                    'msg' => 'Your Program is required',
                    'error' => null
                ];
        }
        elseif(empty($student_hall) || $student_hall == ""){

            $data = [
                    'status' => 'failed',
                    'msg' => 'Your Hall/Hostel is required',
                    'error' => null
                ];
        }
        elseif(empty($student_contact) || $student_contact == ""){

            $data = [
                    'status' => 'failed',
                    'msg' => 'Your Contact is required',
                    'error' => null
                ];
        }
        elseif(empty($_FILES["student-picture"]["name"]) || ($_FILES["student-picture"]["name"] == "")){

            $data = [
                    'status' => 'failed',
                    'msg' => 'Your Picture is required',
                    'error' => null
                ];
        }
        else{



            // let get member profile picture
            $profile_picture_name = $_FILES["student-picture"]["name"];
            $profile_picture_temp = $_FILES["student-picture"]["tmp_name"];
            $profile_picture_Extension = explode(".", $profile_picture_name);
            $profile_picture_NExtension = strtolower(end($profile_picture_Extension));

            if(in_array($profile_picture_NExtension, $validExtension)){

                $student_profile = $student_id . time() . "." . $profile_picture_NExtension;

                require('../../../db/DBClass.php');
                require('../../../models/server/reg/RegistrationClass.php');

                $studentRecordInsert = new StudentRegistration;

                $response = $studentRecordInsert->StudentReg($student_name, $student_id, $student_level, $student_program, $student_hall, $student_contact, $student_profile);

                $data = json_decode($response, TRUE);

                move_uploaded_file($profile_picture_temp, $student_profile_dir . $student_profile);

                $source = $student_profile_dir . $student_profile;
                $compress = $student_profile_dir . $student_profile;

                ImageCompression($source, $compress);

            }else{

                $data = [
                    'status' => 'failed',
                    'msg' => 'Invalid Picture Format. Preferred Format: jpg, jpeg, png',
                    'error' => null
                ];

            }

        }

        echo json_encode($data);


    }
