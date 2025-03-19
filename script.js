// Get buttons and sections
const createUserBtn = document.getElementById('createUserBtn');
const readUserBtn = document.getElementById('readUserBtn');
const createUserSection = document.getElementById('createUserSection');
const readUserSection = document.getElementById('readUserSection');

// Toggle sections when menu items are clicked
createUserBtn.addEventListener('click', () => {
    createUserSection.style.display = 'block';
    readUserSection.style.display = 'none';
});

readUserBtn.addEventListener('click', () => {
    createUserSection.style.display = 'none';
    readUserSection.style.display = 'block';
});

// Handle form submission (basic)
document.getElementById('userForm').addEventListener('submit', (e) => {
    e.preventDefault();
});

document.getElementById('userForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    let formData = new FormData();
    formData.append("firstName", document.getElementById('firstName').value);
    formData.append("lastName", document.getElementById('lastName').value);
    formData.append("phone", document.getElementById('phone').value);
    formData.append("password", document.getElementById('password').value);
    formData.append("email", document.getElementById('email').value);

    let response = await fetch("create_user.php", {
        method: "POST",
        body: formData
    });

    let result = await response.json();
    alert(result.message);
});

document.getElementById('readUserBtn').addEventListener('click', async function () {
    let response = await fetch("read_users.php");
    let users = await response.json();

    let readSection = document.getElementById('readUserSection');
    readSection.innerHTML = "<h2>Users List</h2>";

    if (users.length > 0) {
        let table = `
            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>  
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
        `;
        
        users.forEach(user => {
            table += `
                <tr>
                    <td>${user.first_name}</td>
                    <td>${user.last_name}</td>
                    <td>${user.email}</td>  
                    <td>${user.phone}</td>
                    <td>
                        <form action="edit_user.php" method="GET">
                            <input type="hidden" name="id" value="${user.id}">
                            <button type="submit">Edit</button>
                        </form>
                    </td>
                </tr>
            `;
        });

        table += `</tbody></table>`;
        readSection.innerHTML += table;
    } else {
        readSection.innerHTML += "<p>Not a single user is in our DB</p>";
    }

    document.getElementById('createUserSection').style.display = 'none';
    readSection.style.display = 'block';
});


