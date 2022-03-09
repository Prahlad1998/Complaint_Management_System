<?php
    class users
    {
        private $db;

        function __construct($conn)
         {
            $this->db=$conn;
         }
         public function insert($username,$email,$password,$fname,$lname,$fathername,$ano,$address,$cno,$pin)
         {
            try{
                $email=$_POST['email'];
                $results=$this->getUserbyUsername($username,$email);
                if($results['num']>0)
                {
                    
                    return false;
                }
                else
                {
                    $sql = "INSERT INTO users(username,email,password,first_name,last_name,father_name,aadhar_no,address,cno,pin) VALUES (:username,:email,:password,:fname,:lname,:fathername,:ano,:address,:cno,:pin)";

                    $stmt = $this->db->prepare($sql);
                    $stmt ->bindparam(':username',$username);
                    $stmt ->bindparam(':email',$email);
                    $stmt ->bindparam(':password',$password);
                    $stmt ->bindparam(':fname',$fname);
                    $stmt ->bindparam(':lname',$lname);
                    $stmt ->bindparam(':fathername',$fathername);
                    $stmt ->bindparam(':ano',$ano);
                    $stmt ->bindparam(':address',$address);
                    $stmt ->bindparam(':cno',$cno);
                    $stmt ->bindparam(':pin',$pin);
                    $stmt->execute();
                    return true;

                }
            }catch (PDOException $e) 
                {
                    echo $e->getmessage();
                    return false;  
                }
         }

        //for login
        public function getuser($username,$password){
            try {
                $sql="select * from users where username=:username AND password=:password";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':username',$username);
                $stmt->bindparam(':password',$password);
                $stmt->execute();
                $result=$stmt->fetch();
                return $result;
                }
            catch (PDOException $e) {
                echo $e->getmessage();
                return false;  
                }
        } 
        //For Office Login
        public function getofficeuser($department,$username,$password){
            try {
                $sql="select * from Office where (office_department = :Department AND office_user =:username AND office_password=:password)";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':Department',$department);
                $stmt->bindparam(':username',$username);
                $stmt->bindparam(':password',$password);
                $stmt->execute();
                $result=$stmt->fetch();
                return $result;
                }
            catch (PDOException $e) {
                echo $e->getmessage();
                return false;  
                }
        } 
        // For Admin Lohgin

        public function getadmin($username,$password){
            try {
                $sql="select * from admin where admin_user=:username AND admin_pass=:password";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':username',$username);
                $stmt->bindparam(':password',$password);
                $stmt->execute();
                $result=$stmt->fetch();
                return $result;
                }
            catch (PDOException $e) {
                echo $e->getmessage();
                return false;  
                }
        } 
        public function  getUserbyUsername($username,$email)
        {
            try {
                $sql="select count(*) as num from users where username=:username OR email=:email";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':username',$username);
                $stmt->bindparam(':email',$email);
                
        
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
        public function viewuser($id){
            $sql="select * from users where reg_id = :id"; //a inner join is always come before the where
            $stmt=$this->db->prepare($sql); // prepare the sql statement
            $stmt->bindparam(':id',$id); //bind the parameter with ihe placeholder
            $stmt->execute(); //make the result as the execute
            $result=$stmt->fetch(); //fetch the records into one variable 
            return $result;
        }
        public function viewuserforadmin($id){
            $sql="select * from comp_reg where comp_id = :id"; //a inner join is always come before the where
            $stmt=$this->db->prepare($sql); // prepare the sql statement
            $stmt->bindparam(':id',$id); //bind the parameter with ihe placeholder
            $stmt->execute(); //make the result as the execute
            $result=$stmt->fetch(); //fetch the records into one variable 
            return $result;
        }
        public function edituser($id,$fname,$lname,$fathername,$ano,$address,$cno,$pin)
        {
            try {
                $sql = "UPDATE `users` SET `first_name`=:fname,`last_name`= :lname,`father_name`= :fathername,`aadhar_no`= :ano,`address`=:address,`cno`=:cno,`pin`=:pin WHERE reg_id=:id ";
                $stmt=$this->db->prepare($sql);
                $stmt ->bindparam(':id',$id);
                $stmt ->bindparam(':fname',$fname);
                $stmt ->bindparam(':lname',$lname);
                $stmt ->bindparam(':fathername',$fathername);
                $stmt ->bindparam(':ano',$ano);
                $stmt ->bindparam(':address',$address);
                $stmt ->bindparam(':cno',$cno);
                $stmt ->bindparam(':pin',$pin);

                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;  
            }
           
        }
        public function editcompreport($id,$comp_id,$official_status,$solved_report,$solved_date)
        {
            try {
                $sql = "UPDATE `comp_reg` SET `comp_id`=:comp_id,`official_status`= :status,`solved_report`= :solved_report,`solved_date`= :solved_date  WHERE comp_id=:id ";
                $stmt=$this->db->prepare($sql);
                $stmt ->bindparam(':id',$id);
                $stmt ->bindparam(':comp_id',$comp_id);
                $stmt ->bindparam(':status',$official_status);
                $stmt ->bindparam(':solved_report',$solved_report);
                $stmt ->bindparam(':solved_date',$solved_date);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;  
            }
           
        }
        public function updatepassword($username,$new_password)
        {
            try {
                $sql = "UPDATE `users` SET `password`= :new_password WHERE username=:username ";
                $stmt=$this->db->prepare($sql);
                $stmt ->bindparam(':username',$username);
                $stmt ->bindparam(':new_password',$new_password);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;  
            }
           
        }
        public function reject($id,$comp_id,$status,$official_status,$rejection_reason)
        {
            try {
                $sql = "UPDATE `comp_reg` SET `comp_id`= :comp_id,`status`= :status,`official_status`= :official_status,`rejection_reason`= :rejection_reason WHERE comp_id=:id ";
                $stmt=$this->db->prepare($sql);
                $stmt ->bindparam(':id',$id);
                $stmt ->bindparam(':comp_id',$comp_id);
                $stmt ->bindparam(':status',$status);
                $stmt ->bindparam(':official_status',$official_status);
                $stmt ->bindparam(':rejection_reason',$rejection_reason);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;  
            }
           
        }
        public function solved($id,$comp_id,$status,$solved_report,$solved_date)
        {
            try {
                $sql = "UPDATE `comp_reg` SET `comp_id`= :comp_id,`official_status`= :status,`solved_report`= :solved_report,`solved_date`= :solved_date WHERE comp_id=:id ";
                $stmt=$this->db->prepare($sql);
                $stmt ->bindparam(':id',$id);
                $stmt ->bindparam(':comp_id',$comp_id);
                $stmt ->bindparam(':status',$status);
                $stmt ->bindparam(':solved_report',$solved_report);
                $stmt ->bindparam(':solved_date',$solved_date);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;  
            }
           
        }

        public function forwardtoaccept($id)
        {
            try {
                $sql = "UPDATE `comp_reg` SET `status`='processing',`official_status`='processing' where comp_id=:id";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;  
            }
        }
        public function pendingtoforward($id)
        {
            try {
                $sql = "UPDATE `comp_reg` SET `official_status`='Forwarded' where comp_id=:id";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;  
            }
        }
        // for office 

        public function pendingtoforwarded($id,$department)
        {
            try {
                $sql = "UPDATE `comp_reg` SET `status`='processing' where comp_id=:id and Department=:department";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':department',$department);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;  
            }
        }
        public function processtosolved($id)
        {
            try {
                $sql = "UPDATE `comp_reg` SET `status`='solved',`official_status`='solved' where comp_id=:id";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;  
            }
        }




        public function compinsert($reg_id,$comp_sub,$Department,$comp_summary,$comp_locality,$comp_address,$comp_district,$comp_sdo)
        {
            try{

                $sql="INSERT INTO `comp_reg`(`reg_id`,`comp_sub`,`Department`, `comp_summary`, `locality`, `address`, `district`, `sub_div`) VALUES (:reg_id,:comp_sub,:Department,:comp_summary,:comp_locality,:comp_address,:comp_district,:comp_sdo)";

                $stmt = $this->db->prepare($sql);
                $stmt ->bindparam(':reg_id',$reg_id);
                $stmt ->bindparam(':comp_sub',$comp_sub);
                $stmt ->bindparam(':Department',$Department);
                $stmt ->bindparam(':comp_summary',$comp_summary);
                $stmt ->bindparam(':comp_locality',$comp_locality);
                $stmt ->bindparam(':comp_address',$comp_address);
                $stmt ->bindparam(':comp_district',$comp_district);
                $stmt ->bindparam(':comp_sdo',$comp_sdo);
                $stmt ->execute();
                return true;


            }catch (PDOException $e) {
                echo $e->getmessage();
                return false;
            }
        }
        public function getcomprecords($id)
        {
            $sql = "select * from `comp_reg` where reg_id=:id";
            $stmt=$this->db->prepare($sql); 
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            return $stmt;
        }
        public function getcomprecordsbycompautoid($id)
        {
            $sql = "select * from `comp_reg` where id =:id";
            $stmt=$this->db->prepare($sql); 
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $result=$stmt->fetch();
            return $result;
           
        }
        public function getcomprecordsbycompid($id)
        {
            $sql = "select * from `comp_reg` where comp_id =:id";
            $stmt=$this->db->prepare($sql); 
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            $result=$stmt->fetch();
            return $result;
           
        }
        public function getallcomprecords()
        {
            $sql = "select * from `comp_reg` ";
            $stmt=$this->db->prepare($sql); 
            $stmt->execute();
            return $stmt;
        }
        public function getpendingcomprecords()
        {
            $sql = "select * from `comp_reg` where status='pending...' ";
            $stmt=$this->db->prepare($sql); 
            $stmt->execute();
            return $stmt;
        }
        public function getacceptcomprecords()
        {
            $sql = "select * from `comp_reg` where status='processing' ";
            $stmt=$this->db->prepare($sql); 
            $stmt->execute(); 
            return $stmt;
           
        }
        public function getsolvedcomprecords()
        {
            $sql = "select * from `comp_reg` where status='solved' ";
            $stmt=$this->db->prepare($sql); 
            $stmt->execute(); 
            return $stmt;
           
        }
        public function  numberoftotalcomplains()
        {
            try {
                $sql="select count(*) as num from comp_reg " ;
                $stmt=$this->db->prepare($sql);
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
        public function  numberofallpending()
        {
            try {
                $sql="select count(*) as num from comp_reg where status='pending...'" ;
                $stmt=$this->db->prepare($sql);
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
      
        public function  numberofallprocessing()
        {
            try {
                $sql="select count(*) as num from comp_reg where status='processing'" ;
                $stmt=$this->db->prepare($sql);
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
        public function  numberofallsolved()
        {
            try {
                $sql="select count(*) as num from comp_reg where status='solved'" ;
                $stmt=$this->db->prepare($sql);
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
        public function singlecomprecords($id)
        {

            // store the sql code in a varibale
            $sql = "SELECT * FROM `comp_reg` a inner join users s on a.reg_id=s.reg_id where comp_id=:comp_id";
             
            // Inner join combine records from two tables whenever there are matching values in a field common to both tables.
            // now we have to store the value of this sql statement

            $stmt=$this->db->prepare($sql); 
            $stmt->bindparam(':comp_id',$id); 
            $stmt->execute();
            $results=$stmt->fetch(); 
            return $results;
           
        }
        public function getusers(){
            $sql="SELECT * FROM `users`;";
            $result =$this->db->query($sql);
            return $result;
        }
        public function getusersbyregid($id){
            $sql= " SELECT * FROM `users` where reg_id = :reg_id ";
            $stmt = $this->db->query($sql);
            $stmt->bindparam(':reg_id',$id); 
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }
        public function  numberofallusers()
        {
            try {
                $sql="select count(*) as num from users" ;
                $stmt=$this->db->prepare($sql);
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
        public function  numberofcomplainbyuser($id)
        {
            try {
                $sql="select count(*) as num from users where reg_id=:id" ;
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result=$stmt->fetch();
                return $stmt;
                } 
            catch (PDOException $e) 
                {
                    echo $e->getmessage();
                    return false;  
                }
        }
           
            
        public function getallusers()
        {
            // store the sql code in a varibale
            $sql = "SELECT * FROM `users` ";
            // Inner join combine records from two tables whenever there are matching values in a field common to both tables.
            // now we have to store the value of this sql statement
            $result=$this->db->query($sql); //here the conn.php is embeded in db where db is a private variable
            return $result;
        }

        // Pending Complains
        // ELECTRICITY
        public function  numberofpendingbyElectricity()
        {
            try {
                $sql="select count(*) as num from comp_reg where status='Pending...' and Department='Electricity'" ;
                $stmt=$this->db->prepare($sql);
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

        // PWD
        public function  numberofpendingbyPWD()
        {
            try {
                $sql="select count(*) as num from comp_reg where status='Pending...' and Department='PWD'" ;
                $stmt=$this->db->prepare($sql);
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
        // HEALTH
        public function  numberofpendingbyHealth()
        {
            try {
                $sql="select count(*) as num from comp_reg where status='Pending...' and Department='Health'" ;
                $stmt=$this->db->prepare($sql);
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
        // EDUCATION
        public function  numberofpendingbyEducation()
        {
            try {
                $sql="select count(*) as num from comp_reg where status='Pending...' and Department='Education'" ;
                $stmt=$this->db->prepare($sql);
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
        // FINANCE
        public function  numberofpendingbyFinance()
        {
            try {
                $sql="select count(*) as num from comp_reg where status='Pending...' and Department='Finance'" ;
                $stmt=$this->db->prepare($sql);
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
        // FOOD & SUPPLY
        public function  numberofpendingbyFood_supply()
        {
            try {
                $sql="select count(*) as num from comp_reg where status='Pending...' and Department='Food_supply'" ;
                $stmt=$this->db->prepare($sql);
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
        // OTHERS
        public function  numberofpendingbyOthers()
        {
            try {
                $sql="select count(*) as num from comp_reg where status='Pending...' and Department='Others'" ;
                $stmt=$this->db->prepare($sql);
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

        // get comp record by Department
        public function comprecordsbydepartment($department)
        {
            $sql = "SELECT * FROM `comp_reg` where Department=:department and status='Pending...'";
            $stmt=$this->db->prepare($sql); 
            $stmt->bindparam(':department',$department); 
            $stmt->execute();
            return $stmt;
           
        }
        // get comp record by Department which are forwarded by admin
        public function numberofpendingtoforward($department)
        {
            try {
                $sql="select count(*) as num from comp_reg where (Department=:department and official_status='Forwarded')";
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':department',$department); 
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
        public function getforwardedcomprecords($department)
        {
            $sql = "select * from `comp_reg` where official_status='Forwarded' and Department=:department ";
            $stmt=$this->db->prepare($sql); 
            $stmt->bindparam(':department',$department);
            $stmt->execute();
            return $stmt;
        }
        public function getcomprecordsbystatus($status)
        {
            $sql = "select * from `comp_reg` where (official_status=:status and official_status=:status) ";
            $stmt=$this->db->prepare($sql); 
            $stmt->bindparam(':status',$status);
            $stmt->execute();
            return $stmt;
        }
        public function getcomprecordsbydept($department)
        {
            $sql = "select * from `comp_reg` where Department=:department ";
            $stmt=$this->db->prepare($sql); 
            $stmt->bindparam(':department',$department);
            $stmt->execute();
            return $stmt;
        }
        public function getforwardedcomprecordsbyoffice($department,$status)
        {
            $sql = "select * from `comp_reg` where Department=:department and official_status=:status";
            $stmt=$this->db->prepare($sql); 
            $stmt->bindparam(':department',$department);
            $stmt->bindparam(':status',$status);
            $stmt->execute();
            // $result=$stmt->fetch();
            return $stmt;
        }
        public function getforwardedcomprecordsbyadmin($department,$status)
        {
            $sql = "select * from `comp_reg` where Department=:department and status=:status";
            $stmt=$this->db->prepare($sql); 
            $stmt->bindparam(':department',$department);
            $stmt->bindparam(':status',$status);
            $stmt->execute();
            // $result=$stmt->fetch();
            return $stmt;
        }
        public function  numberofcompsbystatus($status,$department)
        {
            try {
                $sql="select count(*) as num from comp_reg where (official_status=:status and Department=:department)" ;
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':status',$status);
                $stmt->bindparam(':department',$department);
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
        public function  numberofcompsbystatusbyadmin($status,$department)
        {
            try {
                $sql="select count(*) as num from comp_reg where (status=:status and Department=:department)" ;
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':status',$status);
                $stmt->bindparam(':department',$department);
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
        public function  numberofallcompsbystatus($status)
        {
            try {
                $sql="select count(*) as num from comp_reg where (official_status=:status and status=:status )" ;
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':status',$status);
                // $stmt->bindparam(':department',$department);
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
        public function  numberofallcompsbystatusbyadmin($status)
        {
            try {
                $sql="select count(*) as num from comp_reg where status=:status" ;
                $stmt=$this->db->prepare($sql);
                $stmt->bindparam(':status',$status);
                // $stmt->bindparam(':department',$department);
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
        public function getlastvalueofid(){
            $sql = "SELECT id FROM comp_reg ORDER BY id DESC LIMIT 1";
            $stmt=$this->db->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetch();
            return $result;

        }
        public function updateid($id,$comp_id)
        {
            try {
                $sql = "UPDATE `comp_reg` SET `comp_id`= :comp_id WHERE id=:id ";
                $stmt=$this->db->prepare($sql);
                $stmt ->bindparam(':comp_id',$comp_id);
                $stmt ->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;  
            }
           
        }
        public function updateuserid($id,$reg_id)
        {
            try {
                $sql = "UPDATE `users` SET `reg_id`= :reg_id WHERE id=:id ";
                $stmt=$this->db->prepare($sql);
                $stmt ->bindparam(':reg_id',$reg_id);
                $stmt ->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getmessage();
                return false;  
            }
           
        }
        public function userdetails($username,$email){
            try{
                $sql="select * from users where username =:username AND email=:email";
            $stmt=$this->db->prepare($sql);
            $stmt->bindparam(':username',$username);
            $stmt->bindparam(':email',$email);
            $stmt->execute();
            $result=$stmt->fetch();
            return $result;

            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
    }
}

?>