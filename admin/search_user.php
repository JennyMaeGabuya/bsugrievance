<?php
include('includes/config.php');

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT * 
    FROM tbstudinfo 
    JOIN tbstudcontact ON tbstudinfo.studid = tbstudcontact.studid 
    WHERE CONCAT(firstname, ' ', lastname) LIKE '%$search%' ORDER BY tbstudinfo.studid DESC";

    $result = mysqli_query($bd, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $studId = htmlentities($row['studid']);
            $fullName = htmlentities($row['firstname'] . ' ' . $row['lastname']);
            $email = htmlentities($row['email']);
            $address = htmlentities($row['address']);
            $contactNo = htmlentities($row['contact_no']);

            $highlightedName = preg_replace('/(' . preg_quote($search, '/') . ')/i', '<span class="highlight">$1</span>', $fullName);
?>
            <tr <?php echo stripos($fullName, $search) !== false ? 'style="font-weight:bold;"' : ''; ?>>
                <td style="text-align: center;"><?php echo $studId; ?></td>
                <td style="text-align: center;"><?php echo $highlightedName; ?></td>
                <td style="text-align: center;"><?php echo $email; ?></td>
                <td style="text-align: center;"><?php echo $address; ?></td>
                <td style="text-align: center;"><?php echo $contactNo; ?></td>
                <td style="text-align: center;">
                    <a href="complaint-details.php?studid=<?php echo $studId; ?>">
                        <button class="btn btn-primary">View Details</button>
                    </a>
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
