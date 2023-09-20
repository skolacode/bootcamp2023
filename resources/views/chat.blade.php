@extends('app')

@section('title', 'Chat Page')

@section('content')

<div class="container">
    
    <div>
        <p style="color: #5f5f5f; font-size: 20px">User Online List:</p>

        <div id="online-users">
        </div>
    </div>

    <br>

    <div>
        <p style="color: #5f5f5f; font-size: 20px">Chats</p>

        <div id="chats" style="border: 1px solid black; height: 400px; width: 100%;">

        </div>

        <br>

        <div>
            <form method="POST">
                @csrf
                <input style="width: 40%" type="text" name="chat" id="chat">
                <input type="file" name="image" id="image" value="Image" accept="image/*">
            </form>
            <br>
            <button>Gallery</button>
        </div>
    </div>

</div>

<script>

    // Function to make the GET request
    function fetchData() {

        $.ajax({
            type: "GET",
            url: "http://localhost:80/online-users", // Replace with your API endpoint
            success: function(response) {
                // Handle the API response here
                const userData = response.users

                var userDataContainer = $('#online-users');

                // Clear any existing content in the div
                userDataContainer.empty();

                userData.forEach(function(user) {

                    console.log('user: ', user)

                    let avatar = $('<img>').attr('src', '/storage/avatar/'+user.username+'.jpg').attr('alt', 'User Image').attr('height', 40).attr('width', 40);
                    let name = $('<span>').text(' - '+user.username);
                    
                    let userList = $('<div>').append(avatar).append(name);
                        
                    
                        // Append the list to the div
                    userDataContainer.append(userList);
                });

            }
        });
    }

    // Call the fetchData function initially
    fetchData();

    // Set up a setInterval to call fetchData every 3 seconds (5000 milliseconds)
    setInterval(fetchData, 3000);
</script>

@endsection
