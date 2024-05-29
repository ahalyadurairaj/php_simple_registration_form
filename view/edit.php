<?php

require('../model/db_connection.php');
require('../config.php');



$databaseConnection = new DatabaseConnection($config);
$conn = $databaseConnection->getConnection();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch the current data for the record
    $query = "SELECT * FROM `registration_data` WHERE `id` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $record = $result->fetch_assoc();
    $stmt->close();
} else {
    echo "No record ID provided.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Edit</title>
</head>
<body>

<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 id="register" class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Edit Account
                </h1>
                <form action="../controller/editfun.php" class="space-y-4 md:space-y-6" method="post">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                    <div>
                        <label for="uname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User name</label>
                        <input type="text" name="u_name" id="uname" value="<?php echo htmlspecialchars($record['name']); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($record['email']); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($record['password']); ?>" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <div>
                        <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                        <input type="password" name="confirm-password" id="confirm-password" value="<?php echo htmlspecialchars($record['password']); ?>" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <div>
                        <label for="course" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select course</label>
                        <select id="course" name="course" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="HTML" <?php if ($record['coursename'] == 'HTML') echo 'selected'; ?>>HTML</option>
                            <option value="CSS" <?php if ($record['coursename'] == 'CSS') echo 'selected'; ?>>CSS</option>
                            <option value="JavaScript" <?php if ($record['coursename'] == 'JavaScript') echo 'selected'; ?>>JavaScript</option>
                            <option value="Data Science" <?php if ($record['coursename'] == 'Data Science') echo 'selected'; ?>>Data Science</option>
                            <option value="Java" <?php if ($record['coursename'] == 'Java') echo 'selected'; ?>>Java</option>
                            <option value="Python" <?php if ($record['coursename'] == 'Python') echo 'selected'; ?>>Python</option>
                            <option value="RDBMS" <?php if ($record['coursename'] == 'RDBMS') echo 'selected'; ?>>RDBMS</option>
                        </select>
                    </div>
                    <button type="submit" name="updatebtn" id="btn" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Update</button>
                </form>
            </div>
        </div>
    </div>
</section>

</body>
</html>
