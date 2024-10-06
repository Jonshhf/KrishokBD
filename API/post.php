<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy/Sell Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <!-- Create Post Form -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Create Post</h4>
                </div>
                <div class="card-body">
                    <form id="postForm">
                        <div class="form-group mb-3">
                            <label for="postType">Type</label>
                            <select id="postType" class="form-control" required>
                                <option value="">Select Type</option>
                                <option value="buy">Buy</option>
                                <option value="sell">Sell</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <input type="text" id="status" class="form-control" placeholder="What's on your mind?" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Image</label>
                            <input type="file" id="image" class="form-control" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Recent Posts -->
        <div class="col-md-8">
            <h4>Recent Posts</h4>
            <div class="row" id="postList">
                <!-- Posts will be shown here dynamically -->
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Fetch posts on page load
        fetchPosts();

        $('#postForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData();
            formData.append('type', $('#postType').val());
            formData.append('status', $('#status').val());
            formData.append('image', $('#image')[0].files[0]);

            $.ajax({
                url: 'API/add_post.php',  // Backend script
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert('Post added successfully!');
                    fetchPosts(); // Reload posts
                }
            });
        });

        function fetchPosts() {
            $.get('API/get_posts.php', function(data) {
                $('#postList').html('');
                data.forEach(function(post) {
                    if(post.image){
                    $('#postList').append(`
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <img src="${post.image}" class="card-img-top" height="300px;" alt="Post Image">
                                <div class="card-body">
                                    <h5 class="card-title">${post.author} (${post.type})</h5>
                                    <p class="card-text">${post.status}</p>
                                    <br>
                                    <small class="text-muted">${post.interested} People Interested</small>
                                    <br>
                                    <small class="text-muted">${post.date}</small>
                                    <br>
                                    <button class="btn btn-success mt-2" onclick="AddInterest(${post.id})">Interested</button>
                                </div>
                            </div>
                        </div>
                    `);
                    }
                    else{
                        $('#postList').append(`
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">${post.author} (${post.type})</h5>
                                    <p class="card-text">${post.status}</p>
                                    <br>
                                    <small class="text-muted">${post.interested} People Interested</small>
                                    <br>
                                    <small class="text-muted">${post.date}</small>
                                    <br>
                                    <button class="btn btn-success mt-2" onclick="AddInterest(${post.id})">Interested</button>
                                </div>
                            </div>
                        </div>
                    `);
                    }
                });
            }, 'json');
        }
    });
</script>
</body>
</html>
