<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Tabs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <ul class="nav nav-tabs" id="userTypeTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="farmer-tab" data-bs-toggle="tab" data-bs-target="#farmer" type="button" role="tab" aria-controls="farmer" aria-selected="true">Farmer</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="businessman-tab" data-bs-toggle="tab" data-bs-target="#businessman" type="button" role="tab" aria-controls="businessman" aria-selected="false">Businessman</button>
        </li>
    </ul>

    <div class="tab-content mt-3" id="myTabContent">
        <div class="tab-pane fade show active" id="farmer" role="tabpanel" aria-labelledby="farmer-tab">
            <div id="farmerList" class="row"></div>
        </div>
        <div class="tab-pane fade" id="businessman" role="tabpanel" aria-labelledby="businessman-tab">
            <div id="businessmanList" class="row"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Fetch data when the page loads
        fetchUserData('farmer');
        fetchUserData('businessman');

        // Function to fetch user data
        function fetchUserData(userType) {
            $.ajax({
                url: 'API/get_users.php',
                method: 'POST',
                data: {user_type: userType},
                success: function(response) {
                    var data = JSON.parse(response);
                    var html = '';
                    $.each(data, function(index, user) {
                        html += `
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">${user.name}</h5>
                                        <p class="card-text">Mobile: ${user.mobile}</p>
                                        <button class="btn btn-primary request-contact" data-id="${user.id}">Request to Contact</button>
                                    </div>
                                </div>
                            </div>`;
                    });
                    $('#' + userType + 'List').html(html);
                }
            });
        }

        // Event handler for "Request to Contact" button
        $(document).on('click', '.request-contact', function() {
            var userId = $(this).data('id');
            alert('Contact request sent for user ID: ' + userId);
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
