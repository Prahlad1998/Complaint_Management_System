<?php
    class crud
    {
        private $db;

        function __construct($conn)
         {
            $this->db=$conn;
         }
         public function insert($fname,$lname,$fathername,$dob,$aadhar,$address,$dist,$subdiv,$pin,$contact,$email,$password)
         {
            try{

                $sql = "INSERT INTO user(firstname,lastname,fathername,dob,aadharno,address,dist,subdiv,pin,cno,email,password) VALUES (:firstname,:lastname,:fathername,:dob,:ano,:address,:dist,:subdiv,:pin,:cno,:email,:password)";

                $stmt = $this->db->prepare($sql);

                $stmt ->bindparam(':firstname',$fname);
                $stmt ->bindparam(':lastname',$lname);
                $stmt ->bindparam(':fathername',$fathername);
                $stmt ->bindparam(':dob',$dob);
                $stmt ->bindparam(':ano',$aadhar);
                $stmt ->bindparam(':address',$address);
                $stmt ->bindparam(':dist', $dist);
                $stmt ->bindparam(':subdiv',$subdiv);
                $stmt ->bindparam(':pin',$pin);
                $stmt ->bindparam(':cno',$contact);
                $stmt ->bindparam(':email',$email);
                $stmt ->bindparam(':password',$password);

                $stmt->execute();
                return true;


            }catch (PDOException $e) 
                {
                    echo $e->getmessage();
                    return false;  
                }
         }

        //for login
        public function getuser($username,$password){
            try
            {
                $sql="SELECT * FROM `user` WHERE email=':username' AND password=':password'";
                $stmt = $this->db->prepare($sql);
                $stmt-> bindparam(':username',$username);
                $stmt-> bindparam(':password',$password);
                $stmt-> prepare();
                $results = $stmt->fetch();
                return $results;

            }catch (PDOException $e){

                echo $e->getmessage();
                return false;  
            }
        }  
        public function  getUserbyUsername($username)
        {
            try {
                $sql="select count(*) as num from user where email=:username";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':username',$username);
                $stmt->execute();
                $result=$stmt->fetch();
                return $result;
                
                } 
            catch (PDOException $e) 
                {
                    echo $e->getmessage();
                    return false;  
                }
        }


    }



?>