<!DOCTYPE html>
<html>
<head>
    <title>Voice Chat</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f7fa;
            color: #333;
        }
        
        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .voice-container {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 50px;
            cursor: pointer;
            display: block;
            margin: 0 auto 30px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(52, 152, 219, 0.3);
        }
        
        .btn:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(52, 152, 219, 0.4);
        }
        
        .btn:active {
            transform: translateY(0);
        }
        
        .btn.listening {
            background-color: #e74c3c;
            animation: pulse 1.5s infinite;
            box-shadow: 0 4px 8px rgba(231, 76, 60, 0.3);
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .result-box {
            background-color: #f8f9fa;
            border-left: 4px solid #3498db;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            min-height: 60px;
        }
        
        .result-label {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
            display: block;
        }
        
        .status {
            text-align: center;
            margin-top: 15px;
            font-style: italic;
            color: #7f8c8d;
        }
        
        .mic-icon {
            display: inline-block;
            margin-right: 8px;
            vertical-align: middle;
        }
        
        @media (max-width: 600px) {
            .voice-container {
                padding: 20px;
            }
            
            .btn {
                padding: 10px 20px;
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="voice-container">
        <h2>Voice Chat Interface</h2>
        
        <button id="listenBtn" class="btn" onclick="startListening()">
            <svg class="mic-icon" width="16" height="24" viewBox="0 0 16 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 15C10.21 15 12 13.21 12 11V5C12 2.79 10.21 1 8 1C5.79 1 4 2.79 4 5V11C4 13.21 5.79 15 8 15Z" fill="white"/>
                <path d="M15 11C15 14.53 12.39 17.44 9 17.93V21H7V17.93C3.61 17.44 1 14.53 1 11H3C3 13.76 5.24 16 8 16C10.76 16 13 13.76 13 11H15Z" fill="white"/>
            </svg>
            Start Listening
        </button>
        
        <div class="result-box">
            <span class="result-label">Recognized Text:</span>
            <span id="output">Waiting for your voice input...</span>
        </div>
        
        <p id="status" class="status">Press the button and speak clearly</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   <!-- <script>
    let recognition;
    let isListening = false;

    function startListening() {
        const listenBtn = document.getElementById('listenBtn');
        const statusElement = document.getElementById('status');

        if (isListening) {
            recognition.stop();
            listenBtn.classList.remove('listening');
            listenBtn.innerHTML = `<svg class="mic-icon" width="16" height="24" viewBox="0 0 16 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 15C10.21 15 12 13.21 12 11V5C12 2.79 10.21 1 8 1C5.79 1 4 2.79 4 5V11C4 13.21 5.79 15 8 15Z" fill="white"/><path d="M15 11C15 14.53 12.39 17.44 9 17.93V21H7V17.93C3.61 17.44 1 14.53 1 11H3C3 13.76 5.24 16 8 16C10.76 16 13 13.76 13 11H15Z" fill="white"/></svg> Start Listening`;
            statusElement.textContent = 'Ready to listen';
            isListening = false;
            return;
        }

        recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
        recognition.lang = 'en-US';
        recognition.interimResults = false;

        listenBtn.classList.add('listening');
        listenBtn.innerHTML = `<svg class="mic-icon" width="16" height="24" viewBox="0 0 16 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 15C10.21 15 12 13.21 12 11V5C12 2.79 10.21 1 8 1C5.79 1 4 2.79 4 5V11C4 13.21 5.79 15 8 15Z" fill="white"/><path d="M15 11C15 14.53 12.39 17.44 9 17.93V21H7V17.93C3.61 17.44 1 14.53 1 11H3C3 13.76 5.24 16 8 16C10.76 16 13 13.76 13 11H15Z" fill="white"/></svg> Stop Listening`;
        statusElement.textContent = 'Listening... Speak now';
        isListening = true;

        recognition.start();

        recognition.onresult = function (event) {
            const transcript = event.results[0][0].transcript;
            document.getElementById('output').innerText = transcript;
            statusElement.textContent = 'Processing your request...';

            // Send voice text to Laravel backend
            fetch("{{ route('voice.input') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ text: transcript })
            })
            .then(response => response.json())
            .then(data => {
                console.log("Response from server:", data);
                statusElement.textContent = 'Response: ' + data.reply;

                // Speak the reply using Speech Synthesis
                const synth = window.speechSynthesis;
                const utterance = new SpeechSynthesisUtterance(data.reply);
                utterance.lang = 'en-US';
                synth.speak(utterance);
            })
            .catch(error => {
                console.error("Error:", error);
                statusElement.textContent = 'Error processing request';
            });
        };

        recognition.onerror = function (event) {
            console.error("Speech recognition error", event.error);
            listenBtn.classList.remove('listening');
            listenBtn.innerHTML = 'Start Listening';
            statusElement.textContent = 'Error: ' + event.error;
            isListening = false;
        };

        recognition.onend = function () {
            if (isListening) {
                recognition.start(); // Keep listening if needed
            }
        };
    }
</script> -->
<script>
    let recognition;
    let isListening = false;

    function startListening() {
        const listenBtn = $('#listenBtn');
        const statusElement = $('#status');

        if (isListening) {
            recognition.stop();
            listenBtn.removeClass('listening').html(`
                <svg class="mic-icon" width="16" height="24" viewBox="0 0 16 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 15C10.21 15 12 13.21 12 11V5C12 2.79 10.21 1 8 1C5.79 1 4 2.79 4 5V11C4 13.21 5.79 15 8 15Z" fill="white"/>
                    <path d="M15 11C15 14.53 12.39 17.44 9 17.93V21H7V17.93C3.61 17.44 1 14.53 1 11H3C3 13.76 5.24 16 8 16C10.76 16 13 13.76 13 11H15Z" fill="white"/>
                </svg> Start Listening`);
            statusElement.text('Ready to listen');
            isListening = false;
            return;
        }

        recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
        recognition.lang = 'en-US';
        recognition.interimResults = false;

        listenBtn.addClass('listening').html(`
            <svg class="mic-icon" width="16" height="24" viewBox="0 0 16 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 15C10.21 15 12 13.21 12 11V5C12 2.79 10.21 1 8 1C5.79 1 4 2.79 4 5V11C4 13.21 5.79 15 8 15Z" fill="white"/>
                <path d="M15 11C15 14.53 12.39 17.44 9 17.93V21H7V17.93C3.61 17.44 1 14.53 1 11H3C3 13.76 5.24 16 8 16C10.76 16 13 13.76 13 11H15Z" fill="white"/>
            </svg> Stop Listening`);
        statusElement.text('Listening... Speak now');
        isListening = true;

        recognition.start();

        recognition.onresult = function (event) {
            const transcript = event.results[0][0].transcript;
            $('#output').text(transcript);
            statusElement.text('Processing your request...');

            // jQuery AJAX to Laravel
            $.ajax({
                url: "{{ route('voice.input') }}",
                type: "POST",
                contentType: "application/json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify({ text: transcript }),
                success: function (data) {
                    console.log("Server response:", data);
                    statusElement.text('Response: ' + data.reply);

                    // Speak the reply using Speech Synthesis
                    const synth = window.speechSynthesis;
                    const utterance = new SpeechSynthesisUtterance(data.reply);
                    utterance.lang = 'en-US';
                    synth.speak(utterance);
                },
                error: function (xhr, status, error) {
                    console.error("Error:", error);
                    statusElement.text('Error processing request');
                }
            });
        };

        recognition.onerror = function (event) {
            console.error("Speech recognition error", event.error);
            listenBtn.removeClass('listening').text('Start Listening');
            statusElement.text('Error: ' + event.error);
            isListening = false;
        };

        recognition.onend = function () {
            if (isListening) {
                recognition.start(); // Auto-restart if still listening
            }
        };
    }
</script>


</body>
</html>