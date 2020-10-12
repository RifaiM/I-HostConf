<?php
    include '../config.php';
    $output = '';

    if(isset($_POST['query'])) {
        $search = $_POST['query'];
        $stmt = $conn->prepare("SELECT * FROM customers WHERE name LIKE CONCAT('%',?,'%') OR email LIKE CONCAT('%',?,'%') OR created_at LIKE CONCAT('%',?,'%')");
        $stmt->bind_param("sss", $search, $search, $search);
    }
    else {
        $stmt = $conn->prepare("SELECT * FROM addresses");
    }
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows>0) {
        $output = "<thead>
                    <tr>
                        <th>ID</th>  
                        <th>Name</th>  
                        <th>Email</th>
                        <th>Created at</th>
                        <th>Updated at</th>   
                    </tr> 
                    </thead>
                <tbody>";
                while($row = $result->fetch_assoc()) {
                    $output .="
                    <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['created_at']."</td>
                        <td>".$row['updated_at']."</td>
                    </tr>";
                }
                $output .= "</tbody>";
                echo $output;
    }
    else {
        echo "<h3>No record found</h3>";
    }
?>