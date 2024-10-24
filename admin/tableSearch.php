<?php
include_once("./inc/db.php");
include_once("./inc/functions.php");
include_once("./inc/sql.php");
// include_once("./inc/activeDeactiveDelete.php");

if (isset($_POST['query'])) {
    $searchQuery = get_safe_value($con, $_POST['query']);

    // Prepare the SQL query with placeholders for name, id, and email
    $stmt = $con->prepare(" SELECT qb_dash_user.*, qb_dash_manage.name AS manage_name FROM qb_dash_user 
                            LEFT JOIN qb_dash_manage ON qb_dash_user.manage = qb_dash_manage.id 
                            WHERE qb_dash_user.rolle='1' AND qb_dash_user.trash='0'
                            AND (qb_dash_user.name LIKE ? OR qb_dash_user.id = ? OR qb_dash_user.email LIKE ?)
                        ");
    // Bind parameters
    $searchParam = "%" . $searchQuery . "%"; // For LIKE condition
    $stmt->bind_param("sis", $searchParam, $searchQuery, $searchParam); // 's' for string, 'i' for id (int), 's' for email

    // Debugging SQL (to see what is executed)
    // $debugSql = "SELECT qb_dash_user.*, qb_dash_manage.name AS manage_name FROM qb_dash_user 
                            // LEFT JOIN qb_dash_manage ON qb_dash_user.manage = qb_dash_manage.id 
                            // WHERE qb_dash_user.rolle='1' AND qb_dash_user.trash='0'
                            // AND (qb_dash_user.name LIKE ? OR qb_dash_user.id = ? OR qb_dash_user.email LIKE ?)";
    // echo $debugSql;

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    $output = "";
    if ($result->num_rows > 0) {
        $output = '   
        <thead>
            <tr>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    # &nbsp; &nbsp;ID
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Name
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Title
                </th>
                <th
                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                    Status
                </th>
                <th
                    class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
            </tr>
        </thead>
        <tbody class="bg-white" id="employeeTableBody">';
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            $output .= renderUserRow($row, $isAdmin, $i);
            $i++;
        }
        $output .= '</tbody>';
    } else {
        $output = "<tr><td colspan='6' class='py-3 px-6 text-center'>No data found</td></tr>";
    }

    $stmt->close();
    mysqli_close($con);
    echo $output;
} else {
    echo "<tr><td colspan='6' class='py-3 px-6 text-center'>Please enter a search query</td></tr>";
}
