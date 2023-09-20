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

        <div id="chats" style="border: 1px solid black; height: 400px; width: 100%; overflow-y: scroll;">

        </div>

        <br>

        <div>
            <form method="POST" action="{{ route('create-chat') }}" enctype="multipart/form-data">
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


    function fetchChats() {

        $.ajax({
            type: "GET",
            url: "http://localhost:80/chats", // Replace with your API endpoint
            success: function(response) {

                console.log('response: ', response)

                // Handle the API response here
                const userData = response.chats


                var chats = $('#chats');

                // Clear any existing content in the div
                chats.empty();

                userData.forEach(function(chat) {

                    let avatar = $('<img>').attr('src', '/storage/avatar/'+chat.user.username+'.jpg').attr('alt', 'User Image').attr('height', 40).attr('width', 40);

                    let username = $('<span>').text(chat.user.username);

                    let chatData = $('<p>').text(chat.chat).css({
                        'margin-top': '0px',
                        'margin-bottom': '5px'
                    });
               

                    const date = new Date(chat.created_at)

                    let time = $('<p>').text(date).css({
                        'margin-top': '0px',
                        'font-size': '12px',
                        'color': '#c2c2c2'
                    });
                    
                    let space = $('<br>');
                    
                    let chatList = $('<div>').css({
                        'padding': '10px'
                    }).append(avatar).append(username).append(chatData)

                    if(chat.img_path) {
                        let image = $('<img>').attr('src', 'storage/'+chat.img_path).attr('alt', 'img Image').css({
                            'max-height': '200px',
                            'max-width': '200px'
                        });

                        chatList.append(image)
                    }

                    chatList.append(time).append(space);
                        
                    // Append the list to the div
                    chats.append(chatList);
                });

            }
        });
    }

    // Call the fetchData function initially
    fetchChats();

    // Set up a setInterval to call fetchData every 3 seconds (5000 milliseconds)
    setInterval(fetchChats, 3000);
</script>

@endsection
