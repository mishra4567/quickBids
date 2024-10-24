<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind CSS Table with DataTables</title>
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="../src/css/style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> -->
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="../src/vendor/datatable/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> -->
    <!-- jQuery -->
    <script src="../src/vendor/jquery/jjquery-3.7.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- DataTables jQuery -->
    <script src="../src/vendor/dataTable/jquery.dataTables.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> -->
</head>

<body class="bg-gray-100">

    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-semibold leading-tight mb-4">Employee Table</h2>
        <div class="overflow-x-auto">
            <table id="employeeTable" class="min-w-full bg-white table-auto">
                <thead>
                    <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Position</th>
                        <th class="py-3 px-6 text-left">Office</th>
                        <th class="py-3 px-6 text-left">Age</th>
                        <th class="py-3 px-6 text-left">Start Date</th>
                        <th class="py-3 px-6 text-left">Salary</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <!-- Repeat data for 100 rows -->
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">Airi Satou</td>
                        <td class="py-3 px-6 text-left">Accountant</td>
                        <td class="py-3 px-6 text-left">Tokyo</td>
                        <td class="py-3 px-6 text-left">33</td>
                        <td class="py-3 px-6 text-left">2008/11/28</td>
                        <td class="py-3 px-6 text-left">$162,700</td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">Angelica Ramos</td>
                        <td class="py-3 px-6 text-left">Chief Executive Officer (CEO)</td>
                        <td class="py-3 px-6 text-left">London</td>
                        <td class="py-3 px-6 text-left">47</td>
                        <td class="py-3 px-6 text-left">2009/10/09</td>
                        <td class="py-3 px-6 text-left">$1,200,000</td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">Ashton Cox</td>
                        <td class="py-3 px-6 text-left">Junior Technical Author</td>
                        <td class="py-3 px-6 text-left">San Francisco</td>
                        <td class="py-3 px-6 text-left">66</td>
                        <td class="py-3 px-6 text-left">2009/01/12</td>
                        <td class="py-3 px-6 text-left">$86,000</td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">Bradley Greer</td>
                        <td class="py-3 px-6 text-left">Software Engineer</td>
                        <td class="py-3 px-6 text-left">London</td>
                        <td class="py-3 px-6 text-left">41</td>
                        <td class="py-3 px-6 text-left">2012/10/13</td>
                        <td class="py-3 px-6 text-left">$132,000</td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">Brenden Wagner</td>
                        <td class="py-3 px-6 text-left">Software Engineer</td>
                        <td class="py-3 px-6 text-left">San Francisco</td>
                        <td class="py-3 px-6 text-left">28</td>
                        <td class="py-3 px-6 text-left">2011/06/07</td>
                        <td class="py-3 px-6 text-left">$206,850</td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">Brielle Williamson</td>
                        <td class="py-3 px-6 text-left">Integration Specialist</td>
                        <td class="py-3 px-6 text-left">New York</td>
                        <td class="py-3 px-6 text-left">61</td>
                        <td class="py-3 px-6 text-left">2012/12/02</td>
                        <td class="py-3 px-6 text-left">$372,000</td>
                    </tr>
                    <!-- Repeat similar pattern for 100 rows -->
                    <!-- Sample of additional data -->
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">Haley Kennedy</td>
                        <td class="py-3 px-6 text-left">Marketing Director</td>
                        <td class="py-3 px-6 text-left">London</td>
                        <td class="py-3 px-6 text-left">43</td>
                        <td class="py-3 px-6 text-left">2012/12/18</td>
                        <td class="py-3 px-6 text-left">$313,500</td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">Gloria Little</td>
                        <td class="py-3 px-6 text-left">Systems Administrator</td>
                        <td class="py-3 px-6 text-left">New York</td>
                        <td class="py-3 px-6 text-left">59</td>
                        <td class="py-3 px-6 text-left">2009/04/10</td>
                        <td class="py-3 px-6 text-left">$237,500</td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">Gloria Little</td>
                        <td class="py-3 px-6 text-left">Systems Administrator</td>
                        <td class="py-3 px-6 text-left">New York</td>
                        <td class="py-3 px-6 text-left">59</td>
                        <td class="py-3 px-6 text-left">2009/04/10</td>
                        <td class="py-3 px-6 text-left">$237,500</td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">Gloria Little</td>
                        <td class="py-3 px-6 text-left">Systems Administrator</td>
                        <td class="py-3 px-6 text-left">New York</td>
                        <td class="py-3 px-6 text-left">59</td>
                        <td class="py-3 px-6 text-left">2009/04/10</td>
                        <td class="py-3 px-6 text-left">$237,500</td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">Gloria Little</td>
                        <td class="py-3 px-6 text-left">Systems Administrator</td>
                        <td class="py-3 px-6 text-left">New York</td>
                        <td class="py-3 px-6 text-left">59</td>
                        <td class="py-3 px-6 text-left">2009/04/10</td>
                        <td class="py-3 px-6 text-left">$237,500</td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">Gloria Little</td>
                        <td class="py-3 px-6 text-left">Systems Administrator</td>
                        <td class="py-3 px-6 text-left">New York</td>
                        <td class="py-3 px-6 text-left">59</td>
                        <td class="py-3 px-6 text-left">2009/04/10</td>
                        <td class="py-3 px-6 text-left">$237,500</td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">Gloria Little</td>
                        <td class="py-3 px-6 text-left">Systems Administrator</td>
                        <td class="py-3 px-6 text-left">New York</td>
                        <td class="py-3 px-6 text-left">59</td>
                        <td class="py-3 px-6 text-left">2009/04/10</td>
                        <td class="py-3 px-6 text-left">$237,500</td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">Gloria Little</td>
                        <td class="py-3 px-6 text-left">Systems Administrator</td>
                        <td class="py-3 px-6 text-left">New York</td>
                        <td class="py-3 px-6 text-left">59</td>
                        <td class="py-3 px-6 text-left">2009/04/10</td>
                        <td class="py-3 px-6 text-left">$237,500</td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">Gloria Little</td>
                        <td class="py-3 px-6 text-left">Systems Administrator</td>
                        <td class="py-3 px-6 text-left">New York</td>
                        <td class="py-3 px-6 text-left">59</td>
                        <td class="py-3 px-6 text-left">2009/04/10</td>
                        <td class="py-3 px-6 text-left">$237,500</td>
                    </tr>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left">Gloria Little</td>
                        <td class="py-3 px-6 text-left">Systems Administrator</td>
                        <td class="py-3 px-6 text-left">New York</td>
                        <td class="py-3 px-6 text-left">59</td>
                        <td class="py-3 px-6 text-left">2009/04/10</td>
                        <td class="py-3 px-6 text-left">$237,500</td>
                    </tr>

                    <!-- Add up to 100 rows by repeating this pattern with different values -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#employeeTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "pageLength": 10,
                // "language": {
                //     "paginate": {
                //         "previous": "<span class='px-2 py-1 bg-gray-200 rounded-md'>Previous</span>",
                //         "next": "<span class='px-2 py-1 bg-gray-200 rounded-md'>Next</span>"
                //     }
                // }
            });
        });
    </script>

</body>

</html>