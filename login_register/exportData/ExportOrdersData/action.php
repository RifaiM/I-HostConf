<?php
    include '../config.php';
    $output = '';

    if(isset($_POST['query'])) {
        $search = $_POST['query'];
        $stmt = $conn->prepare("SELECT * FROM orders WHERE hash LIKE CONCAT('%',?,'%') OR total LIKE CONCAT('%',?,'%') OR created_at LIKE CONCAT('%',?,'%')");
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
                        <th>Order ID</th>  
                        <th>Total</th>
                        <th>Address ID</th>   
                        <th>Status</th>  
                        <th>Customer ID</th>
                        <th>Created at</th>
                        <th>Updated at</th>   
                    </tr> 
                    </thead>
                <tbody>";
                while($row = $result->fetch_assoc()) {
                    $output .="
                    <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['hash']."</td>
                        <td>".$row['total']."</td>
                        <td>".$row['address_id']."</td>
                        <td>".$row['paid']."</td>
                        <td>".$row['customer_id']."</td>
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