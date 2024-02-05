<!DOCTYPE html>
<html>

<head>
    <title>Roomer-Home</title>
    <link rel="stylesheet" href="Assets/css/reusable.css">
    <link rel="stylesheet" href="Assets/css/style.css">
    <link rel="stylesheet" href="Assets/css/chat.css">
    <style>
        .main_page{
            height: auto;
        }
    </style>
</head>

<body>
    <div class="left-menu" id="leftMenu"></div>
    <script>
        // Fetch and inject the component into the container
        fetch('./components/leftIndex.html')
            .then(response => response.text())
            .then(menubar => {
                document.getElementById('leftMenu').innerHTML = menubar;
            });
    </script>

    <div class="main_page">
        <div id="chat-container">
            <div id="message-container"></div>
            <div id="input-container">
                <input type="text" id="message-input" placeholder="Type your message..." >
                <button id="send-button" onclick="sendMessage()">Send</button>
            </div>
        </div>

        <script>
            var currentUser = 1; // Initial user
            function sendMessage() {
                var messageInput = document.getElementById('message-input');
                var messageContainer = document.getElementById('message-container');

                var messageText = messageInput.value.trim();

                if (messageText !== '') {
                    var messageElement = document.createElement('div');
                    messageElement.className = 'message user' + currentUser;
                    messageElement.textContent = messageText;

                    messageContainer.appendChild(messageElement);
                    messageInput.value = '';
                    messageContainer.scrollTop = messageContainer.scrollHeight;

                    // Switch user for the next message
                    currentUser = 3 - currentUser; // Switch between 1 and 2
                }
            }
        </script>
    </div>

</body>

</html>