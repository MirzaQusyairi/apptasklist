<?php
session_start();
$users= $_SESSION['nama'];

        // Deklarasi variable untuk koneksi ke database.
        
		$host     = "10.35.105.228";        // Server database
        $username = "apptasklist";             // Username database
        $password = "apptasklist@123@";       // Password database
        $database = "dbtasklist";     			// Nama database

        // Koneksi ke database.
        $conn = mysql_connect($host, $username, $password);
		$db = mysql_select_db($database);
		
		
		
        // Deklarasi variable keyword buah.
        $nama = $_GET["query"];
		//$nama = "a";
		$arr = array();
        // Query ke database.
        $query = mysql_query("SELECT * FROM tb_task WHERE project_name LIKE '%$nama%' && pic='$users' GROUP BY project_name DESC")
		or die (mysql_error());
		
		//echo json_encode(mysql_num_rows($query));
		while($result = mysql_fetch_array($query))
		{
			//array_push($arr,array("value"=>"test","nama"=>"test"))
			array_push($arr,array("value"=>$result["project_name"],"nama"=>$result["project_name"]));
		//	echo json_encode("arr");
		}
		
		$output = array("suggestions"=>$arr);
	
        // Format bentuk data untuk autocomplete.
        /*foreach($result as $data)
        {
            $output['suggestions'][] = [
                'value' => $data['project_name'],
                'nama'  => $data['project_name']
            ];
        }*/
		echo json_encode($output);
		
		?>
