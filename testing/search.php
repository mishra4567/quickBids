<?php
$pageValue = isset($_POST["profile"]) ? $_POST["profile"] : '';

require_once("../database/db.php");
require_once("./inc/functions.php");

// Check if profile and searchQuery exist
$searchValue = isset($_POST["searchQuery"]) ? $_POST["searchQuery"] : '';

if (!empty($searchValue)) {
    // echo $searchValue;
    $sql = "SELECT * FROM qb_dash_user WHERE name LIKE '%$searchValue%' OR email LIKE '%$searchValue%'";
    $selecVendor = mysqli_query($con, $sql) or die("SQL Query Failed");

    $output = "";
    if (mysqli_num_rows($selecVendor) > 0) {
        $output = '<tbody class="bg-white" id="employeeTableBody">';
        $i = 1;
        while ($row = mysqli_fetch_assoc($selecVendor)) {
            $output .= '<tr>
                    <td class="whitespace-no-wrap border-b border-gray-200">
                        <div class="flex flex-row items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium leading-5 text-gray-900">' . $i++ . '</div>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm leading-5 text-gray-500">' . $row['id'] . '</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-10 h-10">
                                <img class="w-10 h-10 rounded-full" src="../src/img/photo-1472099645785-5658abf4ff4e.avif" alt="" />
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium leading-5 text-gray-900">' . $row['name'] . '</div>
                                <div class="text-sm leading-5 text-gray-500">' . $row['email'] . '</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="text-sm leading-5 text-gray-900">';

            $manageId = $row["manage"];
            $displayVendorName = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM qb_dash_manage WHERE id='$manageId'"));
            $output .= $displayVendorName['name'];

            $output .= '</div>
                    </td>';

            if ($row['status'] == 1) {
                $output .= '<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <a ';
                if ($isAdmin) {
                    $output .= "href='?type=status&use=profile&operation=deactive&id=" . $row['id'] . "'";
                }
                $output .= ' class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</a>
                    </td>';
            } else {
                $output .= '<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <a ';
                if ($isAdmin) {
                    $output .= "href='?type=status&use=profile&operation=active&id=" . $row['id'] . "'";
                }
                $output .= 'class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 bg-orange-100 rounded-full">Deactive</a>
                    </td>';
            }

            $output .= '<td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">';
            if ($isAdmin) {
                $output .= '<a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>';
            } else {
                $output .= '<a class="text-indigo-600 hover:text-indigo-900">/</a>';
            }
            $output .= '&nbsp;&nbsp;';
            if ($isAdmin) {
                $output .= '<a href="?type=trash&use=profile&id=' . $row['id'] . '" class="text-red-500 hover:text-green-500">Delete</a>';
            }
            $output .= '</td>
                </tr>';
        }
        $output .= '</tbody>';
    } else {
        $output = "<tr>
                <td colspan='6' class='py-3 px-6 text-center'>No data found</td>
            </tr>";
    }
    mysqli_close($con);
    echo $output;
} else {
    echo "<tr>
            <td colspan='6' class='py-3 px-6 text-center'>Please enter a search query</td>
        </tr>";
}







// if (!empty($searchValue)) {
//     $stmt = $con->prepare("SELECT * FROM qb_dash_user WHERE name LIKE CONCAT('%', ?, '%') OR email LIKE CONCAT('%', ?, '%')");
//     $stmt->bind_param("ss", $searchValue, $searchValue);
//     $stmt->execute();
//     $selecVendor = $stmt->get_result();

//     $output = "";
//     if ($selecVendor->num_rows > 0) {
//         $output = '<tbody class="bg-white" id="employeeTableBody">';
//         $i = 1;
//         while ($row = $selecVendor->fetch_assoc()) {
//             $output .= '<tr>
//                     <td class="whitespace-no-wrap border-b border-gray-200">
//                         <div class="flex flex-row items-center">
//                             <div class="ml-4">
//                                 <div class="text-sm font-medium leading-5 text-gray-900">' . $i++ . '</div>
//                             </div>
//                             <div class="ml-4">
//                                 <div class="text-sm leading-5 text-gray-500">' . $row['id'] . '</div>
//                             </div>
//                         </div>
//                     </td>
//                     <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
//                         <div class="flex items-center">
//                             <div class="flex-shrink-0 w-10 h-10">
//                                 <img class="w-10 h-10 rounded-full" src="../src/img/photo-1472099645785-5658abf4ff4e.avif" alt="" />
//                             </div>
//                             <div class="ml-4">
//                                 <div class="text-sm font-medium leading-5 text-gray-900">' . $row['name'] . '</div>
//                                 <div class="text-sm leading-5 text-gray-500">' . $row['email'] . '</div>
//                             </div>
//                         </div>
//                     </td>
//                     <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
//                         <div class="text-sm leading-5 text-gray-900">';

//             $manageId = $row["manage"];
//             $displayVendorName = $con->query("SELECT * FROM qb_dash_manage WHERE id='$manageId'")->fetch_assoc();
//             $output .= $displayVendorName['name'];

//             $output .= '</div>
//                     </td>';

//             if ($row['status'] == 1) {
//                 $output .= '<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
//                         <a ';
//                 if ($isAdmin) {
//                     $output .= "href='?type=status&use=profile&operation=deactive&id=" . $row['id'] . "'";
//                 }
//                 $output .= ' class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Active</a>
//                     </td>';
//             } else {
//                 $output .= '<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
//                         <a ';
//                 if ($isAdmin) {
//                     $output .= "href='?type=status&use=profile&operation=active&id=" . $row['id'] . "'";
//                 }
//                 $output .= ' class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 bg-orange-100 rounded-full">Deactive</a>
//                     </td>';
//             }

//             $output .= '<td class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">';
//             if ($isAdmin) {
//                 $output .= '<a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>';
//             } else {
//                 $output .= '<a class="text-indigo-600 hover:text-indigo-900">/</a>';
//             }
//             $output .= '&nbsp;&nbsp;';
//             if ($isAdmin) {
//                 $output .= '<a href="?type=trash&use=profile&id=' . $row['id'] . '" class="text-red-500 hover:text-green-500">Delete</a>';
//             }
//             $output .= '</td>
//                 </tr>';
//         }
//         $output .= '</tbody>';
//     } else {
//         $output = "<tr>
//                 <td colspan='6' class='py-3 px-6 text-center'>No data found</td>
//             </tr>";
//     }
//     mysqli_close($con);
//     echo $output;
// } else {
//     echo "<tr>
//             <td colspan='6' class='py-3 px-6 text-center'>Please enter a search query</td>
//         </tr>";
// }



if ($pageValue === 'user') {
    // Ensure the $searchValue is not empty

}
