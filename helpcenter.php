<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Help Center</title>
  <link rel="icon" type="image/x-icon" href="icon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Roboto', sans-serif;
      background-color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .chat-container {
      width: 400px;
      height: 600px;
      border: 1px solid #ddd;
      border-radius: 10px;
      display: flex;
      flex-direction: column;
      background-color: #f9f9f9;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .chat-header {
      background-color: #0d1c34;
      color: white;
      padding: 10px 20px;
      font-size: 18px;
      font-weight: bold;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .chat-header i {
      cursor: pointer;
    }

    .chat-messages {
      flex: 1;
      overflow-y: auto;
      padding: 15px;
      background-color: #ffffff;
    }

    .chat-message {
      margin-bottom: 15px;
      display: flex;
      align-items: flex-end;
    }

    .chat-message.user {
      justify-content: flex-end;
    }

    .message-content {
      max-width: 70%;
      padding: 10px;
      border-radius: 10px;
      font-size: 14px;
      line-height: 1.4;
    }

    .message-content.bot {
      background-color: #f1f1f1;
      color: #333;
      border-top-left-radius: 0;
    }

    .message-content.user {
      background-color: #0d1c34;
      color: white;
      border-top-right-radius: 0;
    }

    .chat-input {
      display: flex;
      padding: 10px;
      border-top: 1px solid #ddd;
      background-color: #f9f9f9;
    }

    .chat-input input {
      flex: 1;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 20px;
      outline: none;
      font-size: 14px;
    }

    .chat-input button {
      margin-left: 10px;
      padding: 10px 15px;
      background-color: #0d1c34;
      color: white;
      border: none;
      border-radius: 50%;
      cursor: pointer;
      font-size: 16px;
      outline: none;
    }

    .chat-input button:hover {
      background-color: #092542;
    }

    /* Add a scrollbar for the chat messages */
    .chat-messages::-webkit-scrollbar {
      width: 5px;
    }

    .chat-messages::-webkit-scrollbar-thumb {
      background-color: #0d1c34;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="chat-container">
    <div class="chat-header">
      Help Center
      <i class="fas fa-comments"></i>
    </div>
    <div class="chat-messages" id="chatMessages"></div>
    <div class="chat-input">
      <input type="text" id="chatInput" placeholder="Tulis pesan...">
      <button onclick="sendMessage()"><i class="fas fa-paper-plane"></i></button>
    </div>
  </div>

  <script>
    const chatMessages = document.getElementById("chatMessages");
    const chatInput = document.getElementById("chatInput");

    // Fungsi untuk menambah pesan baru ke dalam kotak pesan
    function addMessage(content, sender) {
      const messageElement = document.createElement("div");
      messageElement.classList.add("chat-message", sender);

      const messageContent = document.createElement("div");
      messageContent.classList.add("message-content", sender);
      messageContent.textContent = content;

      messageElement.appendChild(messageContent);
      chatMessages.appendChild(messageElement);
      chatMessages.scrollTop = chatMessages.scrollHeight; // Scroll otomatis ke bawah
    }

    // Fungsi untuk mengirim pesan
    function sendMessage() {
      const message = chatInput.value.trim();
      if (message === "") return;

      // Tambahkan pesan user
      addMessage(message, "user");
      chatInput.value = "";

      // Balasan otomatis dari "bot"
      setTimeout(() => {
        const botResponse = generateBotResponse(message);
        addMessage(botResponse, "bot");
      }, 1000); // Tunda 1 detik
    }

    // Fungsi untuk menghasilkan balasan bot sederhana
    function generateBotResponse(message) {
      const lowerMessage = message.toLowerCase();
      if (lowerMessage.includes("halo")) {
        return "Halo! Ada yang bisa saya bantu?";
      } else if (lowerMessage.includes("terima kasih")) {
        return "Sama-sama! 😊";
      } else {
        return "Maaf, sekarang bukan sedang jam operasional kami. tapi jangan sungkan untuk meninggalkan pertanyaan di sini ya! Admin akan membalas setelah jam operasional.";
      }
    }

    // Kirim pesan dengan menekan Enter
    chatInput.addEventListener("keydown", (event) => {
      if (event.key === "Enter") {
        sendMessage();
      }
    });
  </script>
</body>
</html>
