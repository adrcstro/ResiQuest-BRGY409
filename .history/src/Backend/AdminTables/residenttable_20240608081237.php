<?php
include __DIR__ .'/../Connection.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo "Database connection error" . mysqli_connect_error();
}

$ID = $_SESSION["AdminID"];
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch total number of records
$count_query = "SELECT COUNT(*) as total FROM users INNER JOIN admintbl ON admintbl.AdminID = users.ID WHERE admintbl.AdminID = $ID";
$count_result = mysqli_query($conn, $count_query);
$count_row = mysqli_fetch_assoc($count_result);
$total_records = $count_row['total'];
$total_pages = ceil($total_records / $limit);

$query = "SELECT users.*, admintbl.* 
FROM users 
INNER JOIN admintbl ON admintbl.AdminID = users.ID 
WHERE admintbl.AdminID = ?
LIMIT ? OFFSET ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("iii", $ID, $limit, $offset);
$stmt->execute();
$result = $stmt->get_result();
?>

<div id="table-container">
    <?php if ($result->num_rows > 0): ?>
        <div class="overflow-x-auto h-screen">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class=" ...">Residents ID</th>
                        <th scope="col" class=" ...">Residents Name</th>
                        <th scope="col" class=" ...">Age</th>
                        <th scope="col" class=" ...">Gender</th>
                        <th scope="col" class=" ...">Account Status</th>
                        <th scope="col" class=" ...">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td class="..."><?php echo htmlspecialchars($row["ID"]); ?></td>
                            <td class="..."><?php echo htmlspecialchars($row["fname"]) . ' ' . htmlspecialchars($row["Mname"]) . ' ' . htmlspecialchars($row["lname"]); ?></td>
                            <td class="..."><?php echo htmlspecialchars($row["Age"]); ?></td>
                            <td class="..."><?php echo htmlspecialchars($row["Gender"]); ?></td>
                            <td class="... <?php echo $statusBgColor; ?>"><?php echo htmlspecialchars($row["Status"]); ?></td>
                            <td class="...">
                                <div class="dropdown ...">
                                    <div tabindex="0" ...>Action Details<svg ...></svg></div>
                                    <ul ...>
                                        <li class="open-resident-details-modal-btn" data-Residents-id="<?php echo htmlspecialchars($row["ID"]); ?>"><a><svg ...></svg>View Details</a></li>
                                        <li class="edit-residents-btn" data-Residents-id="<?php echo htmlspecialchars($row["ID"]); ?>" data-Residents-profile="<?php echo htmlspecialchars($row["Profile"]); ?>" ...><a><svg ...></svg>Edit Residents</a></li>
                                        <li class="delete-residents-btn" data-Residents-id="<?php echo htmlspecialchars($row["ID"]); ?>" ...><a><svg ...></svg>Delete Residents</a></li>
                                        <li class="delete-verify-btn" data-Residents-id="<?php echo htmlspecialchars($row["ID"]); ?>" ...><a><svg ...></svg>Verify Residents</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="mx-auto text-center mt-8" style="width: 200px;">
            <img src="/Images/norequest.svg" alt="Illustration" class="w-30 h-auto">
            <p class="text-lg font-semibold text-center">No Residents Found</p>
        </div>
    <?php endif; ?>
</div>

<div class="mt-4">
    <nav class="flex justify-center">
        <ul class="inline-flex items-center -space-x-px">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li>
                    <a href="javascript:void(0);" class="pagination-link px-3 py-2 mx-1 rounded <?php echo ($i == $page) ? 'bg-blue-500 text-white' : 'bg-gray-200'; ?>" data-page="<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>

<?php
$stmt->close();
$conn->close();
?>
