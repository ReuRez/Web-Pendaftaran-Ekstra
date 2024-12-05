<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - Manage Activities</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header>
        <h1>Admin - Manage Activities</h1>
        <button onclick="openAddModal()">Add Activity</button>
    </header>

    <main>
        <table id="activities-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Teacher</th>
                    <th>Schedule</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="activities-body">
                <!-- Activities will be dynamically inserted here -->
            </tbody>
        </table>
    </main>

    <!-- Modal for Adding Activity -->
    <div id="add-modal" class="modal">
        <div class="modal-content">
            <span class="close-button" onclick="closeAddModal()">&times;</span>
            <h2>Add Activity</h2>
            <form id="add-activity-form">
                <input type="hidden" id="add-activity-id">
                <label for="add-activity-name">Name:</label>
                <input type="text" id="add-activity-name" required>
                <label for="add-activity-description">Description:</label>
                <textarea id="add-activity-description" required></textarea>
                <label for="add-activity-image">Image URL:</label>
                <input type="text" id="add-activity-image" required>
                <label for="add-activity-teacher">Teacher:</label>
                <input type="text" id="add-activity-teacher" required>
                <label for="add-activity-schedule">Schedule:</label>
                <textarea id="add-activity-schedule" required></textarea>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    <!-- Modal for Editing Activity -->
    <div id="edit-modal" class="modal">
        <div class="modal-content">
            <span class="close-button" onclick="closeEditModal()">&times;</span>
            <h2>Edit Activity</h2>
            <form id="edit-activity-form">
                <input type="hidden" id="edit-activity-id">
                <label for="edit-activity-name">Name:</label>
                <input type="text" id="edit-activity-name" required>
                <label for="edit-activity-description">Description:</label>
                <textarea id="edit-activity-description" required></textarea>
                <label for="edit-activity-image">Image URL:</label>
                <input type="text" id="edit-activity-image" required>
                <label for="edit-activity-teacher">Teacher:</label>
                <input type="text" id="edit-activity-teacher" required>
                <label for="edit-activity-schedule">Schedule:</label>
                <textarea id="edit-activity-schedule" required></textarea>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', fetchActivities);

        function fetchActivities() {
            fetch('fetch_activities.php')
                .then(response => response.json())
                .then(data => {
                    const tbody = document.getElementById('activities-body');
                    tbody.innerHTML = '';
                    data.forEach(activity => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${activity.id}</td>
                            <td>${activity.name}</td>
                            <td>${activity.description}</td>
                            <td><img src="${activity.image}" alt="${activity.name}" width="100"></td>
                            <td>${activity.teacher}</td>
                            <td>${activity.schedule}</td>
                            <td>
                                <button onclick="editActivity(${activity.id})">Edit</button>
                                <button onclick="deleteActivity(${activity.id})">Delete</button>
                            </td>
                        `;
                        tbody.appendChild(row);
                    });
                })
                .catch(error => console.error('Error fetching activities:', error));
        }

        function openAddModal() {
            document.getElementById('add-modal').style.display = 'block';
            document.getElementById('add-activity-form').reset();
        }

        function closeAddModal() {
            document.getElementById('add-modal').style.display = 'none';
        }

        function openEditModal(activity) {
            document.getElementById('edit-modal').style.display = 'block';
            document.getElementById('edit-activity-id').value = activity.id;
            document.getElementById('edit-activity-name').value = activity.name;
            document.getElementById('edit-activity-description').value = activity.description;
            document.getElementById('edit-activity-image').value = activity.image;
            document.getElementById('edit-activity-teacher').value = activity.teacher;
            document.getElementById('edit-activity-schedule').value = activity.schedule;
        }

        function closeEditModal() {
            document.getElementById('edit-modal').style.display = 'none';
        }

        function editActivity(id) {
            fetch(`fetch_activity.php?id=${id}`)
                .then(response => response.json())
                .then(activity => openEditModal(activity))
                .catch(error => console.error('Error fetching activity:', error));
        }

        function deleteActivity(id) {
            if (confirm('Are you sure you want to delete this activity?')) {
                fetch(`delete_activity.php?id=${id}`, { method: 'DELETE' })
                    .then(response => {
                        if (response.ok) {
                            fetchActivities();
                        } else {
                            throw new Error('Error deleting activity');
                        }
                    })
                    .catch(error => console.error('Error deleting activity:', error));
            }
        }

        document.getElementById('add-activity-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            fetch('add_activity.php', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (response.ok) {
                        closeAddModal();
                        fetchActivities();
                    } else {
                        throw new Error('Error adding activity');
                    }
                })
                .catch(error => console.error('Error adding activity:', error));
        });

        document.getElementById('edit-activity-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            fetch('edit_activity.php', {
                method: 'POST',
                body: formData
            })
                .then(response => {
                    if (response.ok) {
                        closeEditModal();
                        fetchActivities();
                    } else {
                        throw new Error('Error editing activity');
                    }
                })
                .catch(error => console.error('Error editing activity:', error));
        });
    </script>
</body>
</html>