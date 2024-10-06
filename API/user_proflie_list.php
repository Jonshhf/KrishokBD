<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style>
    .menu-card {
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        transition: transform 0.3s, background-color 0.3s;
        text-align: center;
        padding: 30px;
        margin-bottom: 20px;
    }

    .menu-card:hover {
        transform: translateY(-10px);
    }

    .menu-card.active {
        background-color:#581845;
        color: white !important;
    }

    .menu-card.active h3{
        color: white !important;
    }

    .menu-card.active p{
        color: white !important;
    }

    .user-card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        transition: transform 0.3s;
    }

    .user-card:hover {
        transform: translateY(-10px);
    }

    .request-contact {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s;
    }

    .request-contact:hover {
        background-color: #0056b3;
    }

    .card-title {
        font-weight: bold;
        font-size: 1.25rem;
        color: #333;
    }

    .card-text {
        color: #555;
    }

    .section-title {
        font-size: 1.75rem;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
        color: #343a40;
    }

    #farmerList, #businessmanList {
        display: none;
    }

    /* Make user cards display side by side on larger screens */
    @media (min-width: 768px) {
        #farmerList .col-md-4,
        #businessmanList .col-md-4 {
            display: inline-block;
            width: 30%;
        }
    }
</style>

<div class="container mt-5">
    <!-- Menu Cards -->
    <div class="row mb-5">
        <div class="col-md-6">
            <div id="showFarmers" class="card menu-card">
                <h3 class="card-title"><span class="material-icons">people</span> View Farmers</h3>
                <p class="card-text">Click to view our registered farmers.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div id="showBusinessmen" class="card menu-card">
                <h3 class="card-title"><span class="material-icons">people</span> View Businessmen</h3>
                <p class="card-text">Click to view our registered businessmen.</p>
            </div>
        </div>
    </div>

    <!-- Farmer and Businessmen Lists -->
    <div class="section-title" id="listTitle"></div>
    <div id="farmerList" class="row"></div>
    <div id="businessmanList" class="row"></div>
</div>

<script>
$(document).ready(function() {
    // Fetch data for both categories when the page loads
    fetchUserData('farmer');
    fetchUserData('businessman');

    // Hide lists initially
    $('#farmerList').hide();
    $('#businessmanList').hide();

    // Show farmers on click and make the card active
    $('#showFarmers').click(function() {
        $('#businessmanList').hide();
        $('#farmerList').show();
        $('#listTitle').text('Our Farmers');
        setActiveCard($(this));
    });

    // Show businessmen on click and make the card active
    $('#showBusinessmen').click(function() {
        $('#farmerList').hide();
        $('#businessmanList').show();
        $('#listTitle').text('Our Businessmen');
        setActiveCard($(this));
    });

    // Function to set active menu card
    function setActiveCard(card) {
        $('.menu-card').removeClass('active');
        card.addClass('active');
    }

    // Function to fetch user data
    function fetchUserData(userType) {
        $.ajax({
            url: 'API/get_users.php',
            method: 'POST',
            data: { user_type: userType },
            success: function(response) {
                var data = JSON.parse(response);
                var html = '';
                $.each(data, function(index, user) {
                    html += `
                        <div class="col-md-4 mb-4">
                            <div class="card user-card">
                                <div class="card-body">
                                    <h5 class="card-title">${user.name}</h5>
                                    <p class="card-text">Mobile: ${user.mobile}</p>
                                    <br>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
