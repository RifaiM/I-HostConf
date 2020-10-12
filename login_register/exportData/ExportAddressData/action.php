<?php
    include '../config.php';
    $output = '';

    if(isset($_POST['query'])) {
        $search = $_POST['query'];
        $stmt = $conn->prepare("SELECT * FROM addresses WHERE address1 LIKE CONCAT('%',?,'%') OR address2 LIKE CONCAT('%',?,'%') OR city LIKE CONCAT('%',?,'%') OR postal_code LIKE CONCAT('%',?,'%')");
        $stmt->bind_param("ssss", $search, $search, $search, $search);
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
                        <th>Address 1</th>  
                        <th>Address 2</th>
                        <th>City</th>   
                        <th>Postal Code</th>  
                        <th>Created at</th>
                        <th>Updated at</th> 
                    </tr> 
                    </thead>
                <tbody>";
                while($row = $result->fetch_assoc()) {
                    $output .="
                    <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['address1']."</td>
                        <td>".$row['address2']."</td>
                        <td>".$row['city']."</td>
                        <td>".$row['postal_code']."</td>
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