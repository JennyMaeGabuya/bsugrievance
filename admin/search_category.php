<?php
include('includes/config.php');

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM category WHERE categoryName LIKE '%$search%' ORDER BY category_id DESC";
    $result = mysqli_query($bd, $query);
    $output = '';
    $cnt = 1;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output .= '<tr>';
            $output .= '<td>' . htmlentities($row['category_id']) . '</td>';
            $output .= '<td>' . htmlentities($row['categoryName']) . '</td>';
            $output .= '<td>' . htmlentities($row['categoryDescription']) . '</td>';
            $output .= '<td>' . htmlentities($row['creationDate']) . '</td>';
            $output .= '<td>' . htmlentities($row['updationDate']) . '</td>';
            $output .= '<td>';
            $output .= '<a href="edit-category.php?category_id=' . $row['category_id'] . '"><i class="glyphicon glyphicon-pencil icon-spacing"></i></a>';
            $output .= '<a href="category.php?category_id=' . $row['category_id'] . '&del=delete" onClick="return confirm(\'Are you sure you want to delete?\')"><i class="glyphicon glyphicon-trash"></i></a>';
            $output .= '</td>';
            $output .= '</tr>';
            $cnt++;
        }
        echo $output;
    } else {
        echo '<b><tr><td colspan="6"><div class="alert alert-warning">No matching records found.</div></td></tr></b>';
    }    
}
?>
