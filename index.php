<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link   rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
            <img src="../images/mylogo.svg" id="logo" onclick="showSection('home')" style="cursor: pointer;"></img>
            <button class="navbarbuttons" onclick="showSection('create')"> Create </button>
            <button class="navbarbuttons" onclick="showSection('read')"> Read </button>
            <button class="navbarbuttons" onclick="showSection('update')"> Update </button>
            <button class="navbarbuttons" onclick="showSection('delete')"> Delete </button>
    </nav>
    <section id="home" class="homecontent"> 
        <h1 class="splash">Welcome to Student Management System</h1>
        <h2 class="splash">A Project in Integrative Programming Technologies</h2>
    </section>
    
    <section id="create" class="content" style="display: none;">
        <h1 class="contenttitle"> Insert New Student </h1>

    <form action="../includes/insert.php" method="POST">
        <label for="surname" class="label">Surname</label>
        <input type="text" name="surname" id="surname" class="field" required><br/>

        <label for="name" class="label">Name</label>
        <input type="text" name="name" id="name" class="field" required><br/>

        <label for="middlename" class="label">Middle name</label>
        <input type="text" name="middlename" id="middlename" class="field"><br/>

        <label for="address" class="label">Address</label>
        <input type="text" name="address" id="address" class="field"><br/>

        <label for="contact" class="label">Mobile Number</label>
        <input type="text" name="contact" id="contact" class="field"><br/>

        <div id="btncontainer">
            <button type="button" id="clrbtn" class="btns">Clear Fields</button><br/>
            <button type="submit" id="savebtn" class="btns">Save</button>
        </div>

        <div id="success-toast" class="toast-hidden">
            Registration Successful!
        </div>
        <div id="update-toast" class="toast-hidden">
            Record Updated Successfully!
        </div>
        <div id="delete-toast" class="toast-hidden">
            Record Deleted Successfully!
        </div>
    </form>   

    </section>

<br/><br/><br/><br/>

    <section id="read" class="content" style="display: none;"> 
        <h1 class="contenttitle"> View Students </h1>
        <div class="table-container">
        <table class="student-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Surname</th>
                    <th>Name</th>
                    <th>Middle Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                require_once '../includes/read.php';
                foreach ($students as $student): 
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($student['id']); ?></td>
                    <td><?php echo htmlspecialchars($student['surname']); ?></td>
                    <td><?php echo htmlspecialchars($student['name']); ?></td>
                    <td><?php echo htmlspecialchars($student['middlename']); ?></td>
                    <td><?php echo htmlspecialchars($student['address']); ?></td>
                    <td><?php echo htmlspecialchars($student['contact_number']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </section>
    <section id="update" class="content" style="display: none;"> 
        <h1 class="contenttitle"> Update Student Records </h1>
        <form action="../includes/update.php" method="POST">
            <label for="update-id" class="label">Student ID</label>
            <input type="number" name="id" id="update-id" class="field" required><br/>

            <label for="update-surname" class="label">Surname</label>
            <input type="text" name="surname" id="update-surname" class="field" required><br/>

            <label for="update-name" class="label">Name</label>
            <input type="text" name="name" id="update-name" class="field" required><br/>

            <label for="update-middlename" class="label">Middle Name</label>
            <input type="text" name="middlename" id="update-middlename" class="field"><br/>

            <label for="update-address" class="label">Address</label>
            <input type="text" name="address" id="update-address" class="field"><br/>

            <label for="update-contact" class="label">Mobile Number</label>
            <input type="text" name="contact" id="update-contact" class="field"><br/>

            <div id="btncontainer">
                <button type="button" id="clrbtn" class="btns" onclick="clearUpdateFields()">Clear Fields</button><br/>
                <button type="submit" id="updbtn" class="btns">Update</button>
            </div>
        </form>
        <div id="update-toast" class="toast-hidden">Record Updated Successfully!</div>
    </section>
    <section id="delete" class="content" style="display: none;"> 
        <h1 class="contenttitle"> Remove Student Records </h1>
        <form action="../includes/delete.php" method="POST">
            <label for="delete-id" class="label">Student ID</label>
            <input type="number" name="id" id="delete-id" class="field" required><br/>

            <div id="btncontainer">
                <button type="button" id="clrbtn" class="btns" onclick="document.getElementById('delete-id').value=''">Clear Fields</button><br/>
                <button type="submit" id="delbtn" class="btns" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
            </div>
        </form>
        <div id="delete-toast" class="toast-hidden">Record Deleted Successfully!</div>
    </section>



    <script src="script.js"></script>
</body>
</html>