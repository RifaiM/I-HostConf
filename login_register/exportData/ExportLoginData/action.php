<?php
    include '../configLogin.php';
    $output = '';

    if(isset($_POST['query'])) {
        $search = $_POST['query'];
        $stmt = $conn->prepare("SELECT * FROM register WHERE name LIKE CONCAT('%',?,'%') OR email LIKE CONCAT('%',?,'%') OR token LIKE CONCAT('%',?,'%')");
        $stmt->bind_param("sss", $search, $search, $search);
    }
    else {
        $stmt = $conn->prepare("SELECT * FROM register");
    }
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows>0) {
        $output = "<thead>
                    <tr>
                        <th>ID</th>  
                        <th>Name</th>  
                        <th>Email</th>
                        <th>Password</th>   
                        <th>Token</th>  
                        <th>Status</th>   
                    </tr> 
                    </thead>
                <tbody>";
                while($row = $result->fetch_assoc()) {
                    $output .="
                    <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['password']."</td>
                        <td>".$row['token']."</td>
                        <td>".$row['status']."</td>
                    </tr>";
                }
                $output .= "</tbody>";
                echo $output;
    }
    else {
        echo "<h3>No record found</h3>";
    }
?>