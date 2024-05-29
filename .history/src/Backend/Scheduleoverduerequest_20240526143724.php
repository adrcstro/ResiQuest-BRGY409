<?php
$filter = $_POST['filter'];

if ($filter == 'set_schedule') {
    // Generate table content for Set Schedule
    echo '<table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Column 1</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Column 2</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Column 3</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Your rows go here -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Data 1</td>
                    <td class="px-6 py-4 whitespace-nowrap">Data 2</td>
                    <td class="px-6 py-4 whitespace-nowrap">Data 3</td>
                </tr>
            </tbody>
          </table>';
} elseif ($filter == 'future_schedule') {
    // Generate table content for Future Schedule
    echo '<table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Column 1</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Column 2</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Column 3</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Your rows go here -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Data 4</td>
                    <td class="px-6 py-4 whitespace-nowrap">Data 5</td>
                    <td class="px-6 py-4 whitespace-nowrap">Data 6</td>
                </tr>
            </tbody>
          </table>';
} elseif ($filter == 'today_schedule') {
    // Generate table content for Today's Schedule
    echo '<table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Column 1</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Column 2</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Column 3</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Your rows go here -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Data 7</td>
                    <td class="px-6 py-4 whitespace-nowrap">Data 8</td>
                    <td class="px-6 py-4 whitespace-nowrap">Data 9</td>
                </tr>
            </tbody>
          </table>';
} elseif ($filter == 'overdue_schedule') {
    // Generate table content for Overdue Schedule
    echo '<table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Column 1</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Column 2</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Column 3</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Your rows go here -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Data 10</td>
                    <td class="px-6 py-4 whitespace-nowrap">Data 11</td>
                    <td class="px-6 py-4 whitespace-nowrap">Data 12</td>
                </tr>
            </tbody>
          </table>';
}
?>
