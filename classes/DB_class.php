<?php  
   
    class DB {  
      
        protected $db_name = "afrideals";  
        protected $db_user = "root";  
        protected $db_pass = "";  
        protected $db_host = "localhost";  
        protected $connection = '';
         
        public function connect() {  
            $this->connection = mysql_connect($this->db_host, $this->db_user, $this->db_pass);  
            mysql_select_db($this->db_name, $this->connection);  
      
            return true;  
        }
        
        public function disconnect() {  
            mysql_close($this->connection);
        }  
      
      public function query($query="") {
            $result = null;
            if(trim($query) != ''){            
                $result = mysql_query($query);            
                if(!$result){
                   $result = null;
                }
            }            
            return $result;            
        }
        
         
        public function select($table, $where, $columns ='*', $order='', $limit='') {
            
            $sql = "SELECT $columns FROM $table $where $order $limit";
            
            $result = mysql_query($sql);
            
            if($result){
                return $result;
            }else{
                return null;
            }
        }
        
        public function select_count($table, $where, $as='count') {
            
            $sql = "SELECT count(*) as $as FROM $table $where";
            
            $result = mysql_query($sql);
            
            if($result){
                return $result;
            }else{
                return null;
            }
        }
        
        
        public function select_single($table, $where, $columns='*', $order='') {
           
            $fetch_columns = "";
            $sql = "";
            
            if($columns == '*'){
                $sql = "SELECT * FROM $table $where $order";
            }else{
                foreach ($columns as $column) {  
                   $fetch_columns .= ($columns == "") ? "" : ", ";  
                   $fetch_columns .= $column;    
                }
            
                $sql = "SELECT $fetch_columns FROM $table $where $order"; 
            }
            
            $result = mysql_query($sql);
            
            if($result){
                return $result;
            }else{
                return null;
            }
        }  
      
          
        public function update($data, $table, $where) {
            $sqlString = "UPDATE $table SET ";
            foreach ($data as $key => $value) {  
                $sqlString .= "$key = '$value',";  
            }
            
            $sqlString = substr($sqlString, 0, -1);
            $sqlString .= " WHERE $where";
          
            if(mysql_query($sqlString)){
                return true;  
            }else{
                return false;
            }
            
        }  
      
        
        public function insert($data, $table) {  
      
            $columns = "";  
            $values = "";  
      
            foreach ($data as $column => $value) {  
                $columns .= ($columns == "") ? "" : ", ";  
                $columns .= $column;  
                $values .= ($values == "") ? "" : ", ";  
                $values .= $value;  
            }  
      
            $sql = "insert into $table ($columns) values ($values)";  
            
            mysql_query($sql) or die(mysql_error());  
      
            return mysql_insert_id();  
        }  
		
        public function insert2($data, $table) {  
      
            $columns = "";  
            $values = "";  
      
            foreach ($data as $column => $value) {  
				$columns .= ($columns == "") ? "" : ", ";  
                $columns .= $column;  
                $values .= ($values == "") ? "" : ", ";  
                $values .= "'".$value."'"; 
            } 
      
            $sql = "insert into $table ($columns) values ($values)";  
            
            mysql_query($sql) or die(mysql_error());  
      
            return mysql_insert_id();  
        } 
      
      
        public function delete($table, $where) {       
            
            $sql = "DELETE FROM $table WHERE $where";  
             
           if(mysql_query($sql)){            
                return true;        
           }else{
                die(mysql_error());  
           }
        }
        
    }     
	
?>