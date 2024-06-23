<?php
include __DIR__ . '/../Connection.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo "Database connection error" . mysqli_connect_error();
}

$limit = 5;
$offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;

$query = "SELECT users.*, admintbl.* 
FROM users INNER JOIN admintbl ON admintbl.AdminID
WHERE admintbl.AdminID = $ID LIMIT $offset, $limit;";
$result = mysqli_query($conn, $query);
?>

<div class="overflow-x-auto h-screen">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class=" bg-gray-50 border-2 border-inherit text-center px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Residents ID
                </th>
                <th scope="col" class=" bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Residents Name
                </th>
                <th scope="col" class=" bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Age
                </th>
                <th scope="col" class=" bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Gender
                </th>
                <th scope="col" class=" bg-gray-50 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Account Status
                </th>
                <th scope="col" class=" bg-gray-100 px-6 py-3 border-2 border-inherit text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <?php
                    $statusBgColor = '';
                    switch ($row["Status"]) {
                        case 'Verified':
                            $statusBgColor = 'bg-green-400';
                            break;
                        case 'NotVerified':
                            $statusBgColor = 'bg-red-400';
                            break;
                        default:
                            $statusBgColor = ''; // No background color if status is not recognized
                    }
                    ?>
                    <tr>
                        <td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900"><?= $row["ID"] ?></td>
                        <td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900"><?= $row["fname"] . ' ' . $row["Mname"] . ' ' . $row["lname"] ?></td>
                        <td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900"><?= $row["Age"] ?></td>
                        <td class="p-3 border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900"><?= $row["Gender"] ?></td>
                        <td class="p-3 border-2 border-inherit text-center text-sm font-semibold text-gray-900">
                            <div class="flex justify-center items-center text-white px-2 py-2 <?= $statusBgColor ?> h-full rounded"><?= $row["Status"] ?></div>
                        </td>
                        <td class="p-2 flex items-center justify-center border border-inherit text-center whitespace-nowrap text-sm font-semibold text-gray-900">
                            <div class="dropdown dropdown-end">
                                <div tabindex="0" role="button" class="flex items-center justify-center text-white font-semibold btn w-40 bg-blue-400 hover:bg-blue-500">
                                    Action Details
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </div>
                                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow-2xl bg-base-100 rounded-box w-52">
                                    <li class="open-resident-details-modal-btn" data-Residents-id="<?= $row["ID"] ?>">
                                        <a>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                            View Details
                                        </a>
                                    </li>
                                    <li class="edit-residents-btn" data-Residents-id="<?= $row["ID"] ?>" data-Residents-profile="<?= $row["Profile"] ?>" data-Residents-fname="<?= $row["fname"] ?>" data-Residents-mname="<?= $row["Mname"] ?>" data-Residents-Lname="<?= $row["lname"] ?>" data-Residents-nname="<?= $row["Nickname"] ?>" data-Residents-placeofbirth="<?= $row["PlaceofBirth"] ?>" data-Residents-dateofbirth="<?= $row["Dateofbirth"] ?>" data-Residents-age="<?= $row["Age"] ?>" data-Residents-civilstat="<?= $row["CivilStatus"] ?>" data-Residents-gender="<?= $row["Gender"] ?>" data-Residents-purok="<?= $row["Purok"] ?>" data-Residents-voterstat="<?= $row["VoterStatus"] ?>" data-Residents-email="<?= $row["email"] ?>" data-Residents-occupation="<?= $row["Occupation"] ?>" data-Residents-contactnum="<?= $row["ContactNumber"] ?>" data-Residents-address="<?= $row["Address"] ?>" data-Residents-zipcode="<?= $row["Zipcode"] ?>" data-Residents-citizenship="<?= $row["Citezenship"] ?>" data-adminid-logs="<?= $row["AdminID"] ?>" data-adminusername-logs="<?= $row["Lname"] . ',' . $row["fname"] . ' ' . $row["MName"] ?>" data-adminposition-logs="<?= $row["BrgyPosition"] ?>">
                                        <a>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                            Edit Residents
                                        </a>
                                    </li>
                                    <li class="delete-residents-btn" data-Residents-id="<?= $row["ID"] ?>" data-adminid-logs="<?= $row["AdminID"] ?>" data-adminusername-logs="<?= $row["Lname"] . ',' . $row["fname"] . ' ' . $row["MName"] ?>" data-adminposition-logs="<?= $row["BrgyPosition"] ?>">
                                        <a>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m-1.022-.166a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                            Delete Residents
                                        </a>
                                    </li>
                                    <li class="delete-verify-btn" data-Residents-id="<?= $row["ID"] ?>" data-verifyResidents-profile="<?= $row["Profile"] ?>" data-Residents-fname="<?= $row["fname"] ?>" data-Residents-mname="<?= $row["Mname"] ?>" data-Residents-Lname="<?= $row["lname"] ?>" data-adminid-logs="<?= $row["AdminID"] ?>" data-adminusername-logs="<?= $row["Lname"] . ',' . $row["fname"] . ' ' . $row["MName"] ?>" data-adminposition-logs="<?= $row["BrgyPosition"] ?>">
                                        <a>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.746 3.746 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                            </svg>
                                            Verify Residents
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="p-3 text-center text-sm font-semibold text-gray-900">No Residents Found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<div class="flex justify-between mt-4">
    <button id="prevBtn" class="btn btn-primary" <?= $offset == 0 ? 'disabled' : '' ?>>Previous</button>
    <button id="nextBtn" class="btn btn-primary" <?= mysqli_num_rows($result) < $limit ? 'disabled' : '' ?>>Next</button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var offset = <?= $offset ?>;
    var limit = <?= $limit ?>;

    document.getElementById('nextBtn').addEventListener('click', function() {
        offset += limit;
        loadTable();
    });

    document.getElementById('prevBtn').addEventListener('click', function() {
        if (offset > 0) {
            offset -= limit;
            loadTable();
        }
    });

    function loadTable() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'path/to/your/php/file.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (this.status == 200) {
                document.querySelector('.overflow-x-auto').innerHTML = this.responseText;
            }
        };
        xhr.send('offset=' + offset);
    }
});
</script>
