<?php
include('includes/config.php');

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * FROM category WHERE categoryName LIKE '%$search%' ORDER BY category_id DESC";

    $result = mysqli_query($bd, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $categoryId = htmlentities($row['category_id']);
            $categoryName = htmlentities($row['categoryName']);
            $categoryDescription = htmlentities($row['categoryDescription']);
            $creationDate = htmlentities($row['creationDate']);

            $highlightedName = preg_replace('/(' . preg_quote($search, '/') . ')/i', '<span class="highlight"><strong>$1</strong></span>', $categoryName);
?>
            <tr <?php echo stripos($categoryName, $search) !== false ? 'style="font-weight:bold;"' : ''; ?>>
                <td><?php echo $categoryId; ?></td>
                <td><?php echo $highlightedName; ?></td>
                <td><?php echo $categoryDescription; ?></td>
                <td><?php echo $creationDate; ?></td>
                <!-- <td><?php echo htmlentities($row['updationDate']); ?></td> -->
                <td>
                    <a href="edit-category.php?category_id=<?php echo $row['category_id'] ?>"><i class="glyphicon glyphicon-pencil icon-spacing"></i></a>
                    <a href="category.php?category_id=<?php echo $row['category_id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
<?php
        }
    } else {
        echo '<tr><td colspan="6"><div class="alert alert-warning">No matching records found.</div></td></tr>';
    }
}
?>

<style>
    .highlight {
        background-color: lime;
        font-weight: bold;
    }
</style>
