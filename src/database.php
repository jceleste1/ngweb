<?php
class Database{
 
    // specify your own database credentials
	
    private $host;
    private $db_name ;
    private $username;
    private $password;
    public $conn;
  
  
    function Database(){
		Global $RDS_URL,$RDS_DB,$RDS_user,$RDS_pwd;
	    $this->host = $RDS_URL;
        $this->db_name = $RDS_DB;
        $this->username = $RDS_user;
        $this->password = $RDS_pwd;
		$this->conn = $this->getConnection();
	}

       
   	 // get the database connection
   	 public function getConnection(){

        	$conn =  mysql_connect( $this->host, $this->username, $this->password);
         	if(  mysql_error() ) {
	     		echo  mysql_error() ;
             		$msg = "ERRO NO BANCO DE DADOS" + NMDATABASE;
					
             		mail("jceleste1@gmail.com",$msg,$msg);
            		 echo "Erro na conexão com MySql "+ mysql_error() ;
           		   //   exit;
      		   }

		return $conn;
   	 }

    public function result($qry){

         mysql_select_db( $this->db_name, $this->conn );

		 $result = mysql_query(  $qry,  $this->conn );
		 if( mysql_error() ){
				 $msg = "ERRO NA QUERY BRASIL FORTE\n\n $qry ".mysql_error() ;
				 echo $msq;
				 mail("jceleste1@gmail.com","$msg",$msg);
				
		  }
			return $result;
    }
	
	function  getConn(){
		return 	$this->conn; 
	}	
}
?>