<?php
    include '../config.php';
    $output = '';

    if(isset($_POST['query'])) {
        $search = $_POST['query'];
        $stmt = $conn->prepare("SELECT * FROM payments WHERE order_id LIKE CONCAT('%',?,'%') OR transaction_id LIKE CONCAT('%',?,'%') OR created_at LIKE CONCAT('%',?,'%')");
        $stmt->bind_param("sss", $search, $search, $search);
    }
    else {
        $stmt = $conn->prepare("SELECT * FROM payments");
    }
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows>0) {
        $output = "<thead>
                    <tr>
                        <th>ID</th>  
                        <th>Order ID</th>  
                        <th>Failed</th>
                        <th>Transaction ID</th>   
                        <th>Created at</th>
                        <th>Updated at</th>   
                    </tr> 
                    </thead>
                <tbody>";
                while($row = $result->fetch_assoc()) {
                    $output .="
                    <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['order_id']."</td>
                        <td>".$row['failed']."</td>
                        <td>".$row['transaction_id']."</td>
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