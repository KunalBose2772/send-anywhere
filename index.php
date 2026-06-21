<?php
// index.php - Unified home page with WebRTC file transfer client and SEO content
require_once __DIR__ . '/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Anywhere - Fast, Secure & Free P2P File Transfer Online</title>
    <meta name="description" content="Use Send Anywhere to transfer large files directly from device to device without storing them on any server. Free, unlimited, and fully end-to-end encrypted.">
    <meta name="keywords" content="send anywhere, send anywhere online, file transfer, share files, file share online, send anywhere pc, peer to peer file transfer, p2p file sharing, free file sharing, we transfer, share large files">
    <link rel="canonical" href="https://send-anywhere.in/" />
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://send-anywhere.in/">
    <meta property="og:title" content="Send Anywhere - Fast, Secure & Free P2P File Transfer Online">
    <meta property="og:description" content="Use Send Anywhere to transfer large files directly from device to device without storing them on any server. Free, unlimited, and fully end-to-end encrypted.">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://send-anywhere.in/">
    <meta property="twitter:title" content="Send Anywhere - Fast, Secure & Free P2P File Transfer Online">
    <meta property="twitter:description" content="Use Send Anywhere to transfer large files directly from device to device without storing them on any server. Free, unlimited, and fully end-to-end encrypted.">
    
    <link rel="stylesheet" href="style.css">
    
    <!-- FAQ Schema Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Is it safe to transfer files with Send Anywhere?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes, it is completely secure. The connection uses WebRTC data channels, which are encrypted end-to-end using DTLS and SRTP. Because files are streamed directly between browsers, no file data is ever stored on our server, eliminating any risk of cloud data breaches."
          }
        },
        {
          "@type": "Question",
          "name": "What is the maximum file size limit?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "There is no file size limit! Since files stream directly device-to-device and are not held on a server, we do not impose artificial limits. You can send files of 1GB, 10GB, 50GB, or more as long as both devices have stable internet connections."
          }
        },
        {
          "@type": "Question",
          "name": "Do I need to install an app or register an account?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "No installation or account registration is required. The entire file transfer process runs natively inside your web browser on desktop, laptop, mobile, or tablet devices."
          }
        },
        {
          "@type": "Question",
          "name": "Do both devices need to be online at the same time?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. Because Send Anywhere is a direct device-to-device transfer, both the sender and receiver must keep their web browsers open and connected to the page until the file transfer reaches 100%."
          }
        },
        {
          "@type": "Question",
          "name": "How long does the 6-digit key remain active?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "The generated 6-digit key remains active for exactly 10 minutes. If the receiver does not input the PIN and establish a connection within this window, the session will automatically expire for security, and a new key must be generated."
          }
        }
      ]
    }
    </script>
</head>
<body>

    <!-- Header Navigation -->
    <header>
        <a href="index.php" class="logo">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="fill: var(--accent-red)">
                <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 16.5V7.5L16 12L10 16.5Z"/>
            </svg>
            send<span>anywhere</span>.in
        </a>
        <ul class="nav-links">
            <li><a href="#how-it-works">Transfer</a></li>
            <li><a href="#technology">Technology</a></li>
            <li><a href="#faqs">FAQ</a></li>
        </ul>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            
            <!-- Left: Card UI -->
            <div class="cards-stack">
                
                <!-- Send Card -->
                <div class="card" id="send-card">
                    <div class="card-title">Send</div>
                    
                    <!-- File drop zone -->
                    <div class="drop-zone" id="drop-zone" onclick="document.getElementById('file-input').click()">
                        <span class="plus-icon">+</span>
                        <p>Drag and drop files here or click to browse</p>
                        <input type="file" id="file-input">
                    </div>
                    
                    <!-- Selected file info -->
                    <div class="file-list" id="selected-files" style="display: none;">
                        <!-- JS renders selected file here -->
                    </div>
                    
                    <button class="btn" id="btn-send" style="display: none;">Send File</button>
                    
                    <!-- Sending Screen / PIN display -->
                    <div class="transfer-state" id="sender-state">
                        <p>Share this 6-digit key with the receiver:</p>
                        <div class="pin-display" id="pin-code">000 000</div>
                        <div class="countdown" id="pin-timer">Waiting for receiver to connect...</div>
                        
                        <div class="progress-container" id="send-progress" style="display: none;">
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill" id="send-progress-bar"></div>
                            </div>
                            <div class="progress-stats">
                                <span id="send-percentage">0%</span>
                                <span id="send-speed">0 KB/s</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Receive Card -->
                <div class="card" id="receive-card">
                    <div class="card-title">Receive</div>
                    <div class="input-group" id="receiver-input-group">
                        <input type="text" class="input-key" id="receive-key" maxlength="6" placeholder="Input 6-digit key" autocomplete="off">
                        <button class="btn-receive" id="btn-receive" title="Download">
                            <svg viewBox="0 0 24 24">
                                <path d="M5 20h14v-2H5v2zm7-18L5.33 11h4V16h5.34v-5h4L12 2z"/>
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Receiving Screen -->
                    <div class="transfer-state" id="receiver-state">
                        <p id="receiver-status-text">Connecting to peer...</p>
                        <div class="progress-container" id="receive-progress" style="display: none;">
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill" id="receive-progress-bar"></div>
                            </div>
                            <div class="progress-stats">
                                <span id="receive-percentage">0%</span>
                                <span id="receive-speed">0 KB/s</span>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="hero-content">
                <div class="hero-tag">⚡ Direct Device-to-Device Transfer</div>
                <h1>Send Anywhere: Send Large Files Instantly Without Upload Limits</h1>
                <p>Send Anywhere establishes a direct, secure tunnel between devices. Your files never pass through or rest on our servers. Enjoy absolute privacy, maximum network speeds, and zero storage limits.</p>
                
                <div class="mockup-illustrations">
                    <div class="mockup-badge">📁 Any File Format</div>
                    <div class="mockup-badge">🔒 End-to-End Encrypted</div>
                    <div class="mockup-badge">🚀 No Size Limits</div>
                </div>
            </div>

        </div>
    </section>

    <!-- SEO Content Section -->
    <section class="seo-section" id="how-it-works">
        <div class="seo-card">
            
            <h2>Send Anywhere: Fast, Secure & Free P2P File Transfer Online</h2>
            <p>Welcome to <strong>Send Anywhere</strong>, the premier online platform designed for transferring files directly between devices in real-time. Whether you need to share a massive 50GB video file, project folders, documents, or photos, our direct transport system enables high-speed transfers without limits. Traditional cloud storage services require uploading files to a remote server first, which compromises privacy, consumes storage quotas, and takes twice as long. Send Anywhere bypasses the middleman, creating a secure, direct path from sender to receiver.</p>

            <h2>How It Works: Real-Time Peer-to-Peer File Sharing</h2>
            <p>Our service utilizes cutting-edge web technologies to achieve true serverless file sharing. When you select a file, the platform generates a unique, single-use 6-digit key. Once the receiver inputs this key, a handshake is negotiated via our lightweight signaling server. After the handshake, the signaling server drops out completely, and a direct WebRTC connection is opened between the two browsers. The file data is streamed locally from one machine to another. Your data is never saved on any hosting drive, meaning your server remains empty and your private information is never compromised when you send anywhere.</p>

            <h3>Step-by-Step Guide to Send and Receive Files</h3>
            <p>Getting started with Send Anywhere is incredibly simple and requires no software installation or user registration:</p>
            <ul>
                <li><strong>Step 1: Choose Your File</strong> - Click on the "+" icon inside the Send Card or drag-and-drop the file you wish to send. The file details will display instantly.</li>
                <li><strong>Step 2: Generate the Transfer PIN</strong> - Click the "Send File" button. Our system will generate a temporary 6-digit pin. Keep this page open.</li>
                <li><strong>Step 3: Enter the Key to Download</strong> - Give the 6-digit PIN to the receiver. They will input the key on their device's Receive Card and click the download arrow.</li>
                <li><strong>Step 4: Real-Time Transfer</strong> - Watch the file progress bar fill up on both screens. The download will begin automatically as soon as the transfer finishes.</li>
            </ul>

            <h2 id="technology">The Technical Powerhouse: WebRTC Data Channels</h2>
            <p>At the core of Send Anywhere is WebRTC (Web Real-Time Communication), an open-source standard supported by major browsers like Google Chrome, Mozilla Firefox, Apple Safari, and Microsoft Edge. WebRTC is designed to facilitate voice, video, and raw data transmission directly between peer browsers. By leveraging WebRTC's <code>RTCDataChannel</code>, our web application reads files locally, breaks them down into binary chunks, and streams them securely across the network. Because WebRTC features built-in DTLS (Datagram Transport Layer Security) and SRTP (Secure Real-time Transport Protocol), every single byte sent is encrypted end-to-end. Eavesdropping by third parties, ISPs, or hackers is mathematically impossible.</p>

            <h3>Why Direct Device-to-Device Sharing is Superior</h3>
            <p>Most file-sharing websites (like WeTransfer or Dropbox) act as intermediate staging zones. You upload your file to their server, they save it, and then send a download link to your recipient. This standard system poses several disadvantages:</p>
            <ul>
                <li><strong>Slower Speed:</strong> You must wait for the upload to complete 100% before the receiver can start downloading. With P2P, the stream is immediate.</li>
                <li><strong>Storage Space Quotas:</strong> Servers have limits. If you upload a large file, you run out of free space. Our P2P system consumes 0MB of server storage, keeping hosting costs low.</li>
                <li><strong>Data Breaches:</strong> Stored files are susceptible to hacks and data breaches. Because our server never saves your files, there is nothing for hackers to steal.</li>
            </ul>

            <h2>Comparison: P2P vs. Traditional Cloud and Web Uploads</h2>
            <p>Below is a comparative breakdown showing why peer-to-peer file sharing via Send Anywhere is the superior option for quick, secure digital assets transport:</p>

            <table style="width: 100%; border-collapse: collapse; margin: 25px 0; font-size: 15px; text-align: left;">
                <thead>
                    <tr style="background-color: var(--primary-purple); color: var(--text-white); border-bottom: 2px solid rgba(0,0,0,0.1)">
                        <th style="padding: 12px 15px;">Feature</th>
                        <th style="padding: 12px 15px;">Send Anywhere</th>
                        <th style="padding: 12px 15px;">Cloud Storage (Drive/Dropbox)</th>
                        <th style="padding: 12px 15px;">Traditional Web Upload</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid #eef0f6">
                        <td style="padding: 12px 15px; font-weight: 600;">Server Storage Used</td>
                        <td style="padding: 12px 15px; color: green; font-weight: 500;">0 MB (None)</td>
                        <td style="padding: 12px 15px;">Permanent Allocation</td>
                        <td style="padding: 12px 15px;">Temporary (7-14 Days)</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #eef0f6">
                        <td style="padding: 12px 15px; font-weight: 600;">Transfer Speed</td>
                        <td style="padding: 12px 15px; color: green; font-weight: 500;">Direct Link (Maximum)</td>
                        <td style="padding: 12px 15px;">Two-way Delay (Upload + Download)</td>
                        <td style="padding: 12px 15px;">Throttled / Restricted</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #eef0f6">
                        <td style="padding: 12px 15px; font-weight: 600;">File Size Limits</td>
                        <td style="padding: 12px 15px; color: green; font-weight: 500;">Unlimited</td>
                        <td style="padding: 12px 15px;">Capped by Storage Quota</td>
                        <td style="padding: 12px 15px;">Typically 2GB - 5GB Capped</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #eef0f6">
                        <td style="padding: 12px 15px; font-weight: 600;">Security & Privacy</td>
                        <td style="padding: 12px 15px; color: green; font-weight: 500;">End-to-End Encrypted (No logs)</td>
                        <td style="padding: 12px 15px;">Decrypted on Provider's Cloud</td>
                        <td style="padding: 12px 15px;">Saved as Unencrypted Files</td>
                    </tr>
                </tbody>
            </table>

            <h2 id="faqs">Frequently Asked Questions (FAQ)</h2>
            <div class="faq-container">
                
                <div class="faq-item">
                    <div class="faq-question">Is it safe to transfer files with Send Anywhere?</div>
                    <div class="faq-answer">
                        Yes, it is completely secure. The connection uses WebRTC data channels, which are encrypted end-to-end using DTLS and SRTP. Because files are streamed directly between browsers, no file data is ever stored on our server, eliminating any risk of cloud data breaches.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">What is the maximum file size limit?</div>
                    <div class="faq-answer">
                        There is no file size limit! Since files stream directly device-to-device and are not held on a server, we do not impose artificial limits. You can send files of 1GB, 10GB, 50GB, or more as long as both devices have stable internet connections.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">Do I need to install an app or register an account?</div>
                    <div class="faq-answer">
                        No installation or account registration is required. The entire file transfer process runs natively inside your web browser on desktop, laptop, mobile, or tablet devices.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">Do both devices need to be online at the same time?</div>
                    <div class="faq-answer">
                        Yes. Because Send Anywhere is a direct device-to-device transfer, both the sender and receiver must keep their web browsers open and connected to the page until the file transfer reaches 100%.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">How long does the 6-digit key remain active?</div>
                    <div class="faq-answer">
                        The generated 6-digit key remains active for exactly 10 minutes. If the receiver does not input the PIN and establish a connection within this window, the session will automatically expire for security, and a new key must be generated.
                    </div>
                </div>
                
            </div>
            
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date('Y'); ?> <a href="index.php">sendanywhere.in</a>. All rights reserved. Peer-to-Peer file transfers powered by WebRTC.</p>
    </footer>

    <!-- WebRTC JavaScript Client -->
    <script>
        const rtcConfig = {
            iceServers: [
                { urls: 'stun:stun.l.google.com:19302' },
                { urls: 'stun:stun1.l.google.com:19302' }
            ]
        };

        let localConnection = null;
        let dataChannel = null;
        let transferId = null;
        let pollInterval = null;
        let selectedFile = null;
        const CHUNK_SIZE = 16384; // 16KB chunks

        // UI Selectors
        const dropZone = document.getElementById('drop-zone');
        const fileInput = document.getElementById('file-input');
        const selectedFilesDiv = document.getElementById('selected-files');
        const btnSend = document.getElementById('btn-send');
        const senderState = document.getElementById('sender-state');
        const pinCode = document.getElementById('pin-code');
        const pinTimer = document.getElementById('pin-timer');
        const sendProgress = document.getElementById('send-progress');
        const sendProgressBar = document.getElementById('send-progress-bar');
        const sendPercentage = document.getElementById('send-percentage');
        const sendSpeed = document.getElementById('send-speed');

        const receiveKey = document.getElementById('receive-key');
        const btnReceive = document.getElementById('btn-receive');
        const receiverState = document.getElementById('receiver-state');
        const receiverStatusText = document.getElementById('receiver-status-text');
        const receiverInputGroup = document.getElementById('receiver-input-group');
        const receiveProgress = document.getElementById('receive-progress');
        const receiveProgressBar = document.getElementById('receive-progress-bar');
        const receivePercentage = document.getElementById('receive-percentage');
        const receiveSpeed = document.getElementById('receive-speed');

        // Drag & Drop handlers
        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, (e) => {
                e.preventDefault();
                dropZone.classList.add('dragover');
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, (e) => {
                e.preventDefault();
                dropZone.classList.remove('dragover');
            }, false);
        });

        dropZone.addEventListener('drop', (e) => {
            const dt = e.dataTransfer;
            const files = dt.files;
            if (files.length > 0) {
                handleFileSelection(files[0]);
            }
        });

        fileInput.addEventListener('change', (e) => {
            if (fileInput.files.length > 0) {
                handleFileSelection(fileInput.files[0]);
            }
        });

        function handleFileSelection(file) {
            selectedFile = file;
            selectedFilesDiv.innerHTML = `
                <div class="file-item">
                    <span class="file-name">${escapeHtml(file.name)}</span>
                    <span class="file-size">${formatBytes(file.size)}</span>
                </div>
            `;
            selectedFilesDiv.style.display = 'block';
            btnSend.style.display = 'block';
        }

        // --- SENDER LOGIC ---
        btnSend.addEventListener('click', async () => {
            if (!selectedFile) return;

            btnSend.style.display = 'none';
            dropZone.style.pointerEvents = 'none';
            
            try {
                localConnection = new RTCPeerConnection(rtcConfig);
                
                // Create Data Channel
                dataChannel = localConnection.createDataChannel('fileTransfer', { ordered: true });
                setupSenderChannelEvents(dataChannel);

                // Collect ICE Candidates
                const iceCandidatesList = [];
                localConnection.onicecandidate = async (event) => {
                    if (event.candidate && transferId) {
                        await sendIceCandidate(transferId, 1, event.candidate);
                    }
                };

                // Create Offer
                const offer = await localConnection.createOffer();
                await localConnection.setLocalDescription(offer);

                // Register Offer to Signaling DB
                const response = await fetch('api/create.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ offer: offer.sdp })
                });
                const data = await response.json();

                if (data.success) {
                    transferId = data.transfer_id;
                    pinCode.textContent = formatPin(data.pin);
                    senderState.style.display = 'block';
                    
                    // Poll for receiver's answer
                    startAnswerPolling();
                } else {
                    alert('Error creating transfer session: ' + data.error);
                    resetSenderUI();
                }

            } catch (err) {
                console.error(err);
                alert('An error occurred during peer initialization.');
                resetSenderUI();
            }
        });

        function setupSenderChannelEvents(channel) {
            channel.onopen = () => {
                console.log('Sender data channel opened!');
                pinTimer.style.display = 'none';
                sendProgress.style.display = 'block';
                sendFileData(channel);
            };

            channel.onclose = () => {
                console.log('Sender data channel closed.');
            };
        }

        function startAnswerPolling() {
            let attempts = 0;
            pollInterval = setInterval(async () => {
                attempts++;
                if (attempts > 300) { // 10 minutes max timeout
                    clearInterval(pollInterval);
                    alert('Session expired. Receiver did not join in time.');
                    resetSenderUI();
                    return;
                }

                const response = await fetch('api/get_answer.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ transfer_id: transferId })
                });
                const data = await response.json();

                if (data.success && data.answer) {
                    clearInterval(pollInterval);
                    
                    // Set Remote Description
                    await localConnection.setRemoteDescription(
                        new RTCSessionDescription({ type: 'answer', sdp: data.answer })
                    );
                    
                    // Start candidate polling to import receiver's candidates
                    startIcePolling(transferId, 0); // Poll for receiver (0) candidates
                }
            }, 2000);
        }

        async function sendFileData(channel) {
            // Send file metadata first
            channel.send(JSON.stringify({
                type: 'metadata',
                name: selectedFile.name,
                size: selectedFile.size,
                mime: selectedFile.type
            }));

            const reader = new FileReader();
            let offset = 0;
            let startTime = Date.now();

            const readSlice = (o) => {
                const slice = selectedFile.slice(o, o + CHUNK_SIZE);
                reader.readAsArrayBuffer(slice);
            };

            reader.onload = (e) => {
                const buffer = e.target.result;
                
                // Handle backpressure: if data channel is buffering too much data, wait
                if (channel.bufferedAmount > 1048576) { // > 1MB buffered
                    channel.onbufferedamountlow = () => {
                        channel.onbufferedamountlow = null;
                        channel.send(buffer);
                        offset += buffer.byteLength;
                        updateProgress(offset);
                    };
                } else {
                    channel.send(buffer);
                    offset += buffer.byteLength;
                    updateProgress(offset);
                }
            };

            function updateProgress(bytesSent) {
                const pct = Math.round((bytesSent / selectedFile.size) * 100);
                sendProgressBar.style.style = `width: ${pct}%`; // fallback
                sendProgressBar.style.width = `${pct}%`;
                sendPercentage.textContent = `${pct}%`;
                
                const timeElapsed = (Date.now() - startTime) / 1000;
                const speedBytes = bytesSent / timeElapsed;
                sendSpeed.textContent = `${formatSpeed(speedBytes)}`;

                if (bytesSent < selectedFile.size) {
                    readSlice(offset);
                } else {
                    sendSpeed.textContent = 'Transfer Complete!';
                }
            }

            // Start reading the first slice
            readSlice(offset);
        }


        // --- RECEIVER LOGIC ---
        btnReceive.addEventListener('click', async () => {
            const pinVal = receiveKey.value.replace(/\s+/g, '');
            if (pinVal.length !== 6 || isNaN(pinVal)) {
                alert('Please enter a valid 6-digit key.');
                return;
            }

            receiverInputGroup.style.display = 'none';
            receiverState.style.display = 'block';

            try {
                // Fetch sender offer
                const joinResp = await fetch('api/join.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ pin: pinVal })
                });
                const joinData = await joinResp.json();

                if (!joinData.success) {
                    alert(joinData.error);
                    resetReceiverUI();
                    return;
                }

                transferId = joinData.transfer_id;
                
                localConnection = new RTCPeerConnection(rtcConfig);
                
                // Collect ICE candidates
                localConnection.onicecandidate = async (event) => {
                    if (event.candidate && transferId) {
                        await sendIceCandidate(transferId, 0, event.candidate);
                    }
                };

                // Listen for inbound Data Channels
                localConnection.ondatachannel = (event) => {
                    setupReceiverChannelEvents(event.channel);
                };

                // Set Remote Offer
                await localConnection.setRemoteDescription(
                    new RTCSessionDescription({ type: 'offer', sdp: joinData.offer })
                );

                // Create Answer
                const answer = await localConnection.createAnswer();
                await localConnection.setLocalDescription(answer);

                // Send Answer SDP
                const ansResp = await fetch('api/answer.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ transfer_id: transferId, answer: answer.sdp })
                });
                const ansData = await ansResp.json();

                if (ansData.success) {
                    receiverStatusText.textContent = 'Connecting to sender...';
                    // Start candidate polling to import sender's candidates
                    startIcePolling(transferId, 1); // Poll for sender (1) candidates
                } else {
                    alert('Signaling error: ' + ansData.error);
                    resetReceiverUI();
                }

            } catch (err) {
                console.error(err);
                alert('Connection failure. Session might have expired.');
                resetReceiverUI();
            }
        });

        function setupReceiverChannelEvents(channel) {
            let receivedChunks = [];
            let fileMetadata = null;
            let bytesReceived = 0;
            let startTime = null;

            channel.onopen = () => {
                receiverStatusText.textContent = 'Connected! Transfer starting...';
                receiveProgress.style.display = 'block';
                startTime = Date.now();
            };

            channel.onmessage = (event) => {
                if (typeof event.data === 'string') {
                    // Metadata string received
                    fileMetadata = JSON.parse(event.data);
                    receiverStatusText.textContent = `Receiving: ${escapeHtml(fileMetadata.name)}`;
                    receivedChunks = [];
                    bytesReceived = 0;
                } else {
                    // Binary chunk received
                    receivedChunks.push(event.data);
                    bytesReceived += event.data.byteLength;

                    if (fileMetadata) {
                        const pct = Math.round((bytesReceived / fileMetadata.size) * 100);
                        receiveProgressBar.style.width = `${pct}%`;
                        receivePercentage.textContent = `${pct}%`;

                        const timeElapsed = (Date.now() - startTime) / 1000;
                        const speedBytes = bytesReceived / timeElapsed;
                        receiveSpeed.textContent = `${formatSpeed(speedBytes)}`;

                        if (bytesReceived === fileMetadata.size) {
                            receiverStatusText.textContent = 'Saving file...';
                            
                            // Trigger automatic browser download
                            const blob = new Blob(receivedChunks, { type: fileMetadata.mime || 'application/octet-stream' });
                            const url = URL.createObjectURL(blob);
                            const a = document.createElement('a');
                            a.href = url;
                            a.download = fileMetadata.name;
                            document.body.appendChild(a);
                            a.click();
                            document.body.removeChild(a);
                            
                            receiveSpeed.textContent = 'Download completed successfully!';
                            channel.close();
                            localConnection.close();
                        }
                    }
                }
            };

            channel.onclose = () => {
                console.log('Receiver data channel closed.');
            };
        }


        // --- COMMON SIGNALING LOGIC ---
        async function sendIceCandidate(transferId, sender, candidate) {
            await fetch('api/candidate.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'send',
                    transfer_id: transferId,
                    sender: sender,
                    candidate: candidate
                })
            });
        }

        function startIcePolling(transferId, targetSender) {
            const addedCandidateIds = new Set();
            
            const iceInterval = setInterval(async () => {
                if (!localConnection || localConnection.signalingState === 'closed') {
                    clearInterval(iceInterval);
                    return;
                }

                try {
                    const response = await fetch('api/candidate.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({
                            action: 'get',
                            transfer_id: transferId,
                            sender: targetSender
                        })
                    });
                    const data = await response.json();

                    if (data.success && data.candidates) {
                        for (let item of data.candidates) {
                            if (!addedCandidateIds.has(item.id)) {
                                addedCandidateIds.add(item.id);
                                if (item.candidate) {
                                    await localConnection.addIceCandidate(new RTCIceCandidate(item.candidate));
                                }
                            }
                        }
                    }
                } catch (e) {
                    console.error('Candidate polling error:', e);
                }
            }, 2000);
        }

        // --- ACCORDIONS LOGIC ---
        document.querySelectorAll('.faq-question').forEach(q => {
            q.addEventListener('click', () => {
                const item = q.parentElement;
                item.classList.toggle('active');
            });
        });

        // --- HELPER FUNCTIONS ---
        function formatBytes(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        function formatSpeed(bytesPerSec) {
            if (bytesPerSec === 0 || isNaN(bytesPerSec)) return '0 KB/s';
            const k = 1024;
            const speedKB = bytesPerSec / k;
            if (speedKB < 1024) {
                return speedKB.toFixed(1) + ' KB/s';
            }
            return (speedKB / k).toFixed(1) + ' MB/s';
        }

        function formatPin(pin) {
            const pinStr = String(pin);
            return pinStr.substring(0, 3) + ' ' + pinStr.substring(3);
        }

        function resetSenderUI() {
            selectedFile = null;
            btnSend.style.display = 'none';
            dropZone.style.pointerEvents = 'auto';
            selectedFilesDiv.style.display = 'none';
            senderState.style.display = 'none';
            sendProgress.style.display = 'none';
            if (pollInterval) clearInterval(pollInterval);
        }

        function resetReceiverUI() {
            receiverInputGroup.style.display = 'flex';
            receiverState.style.display = 'none';
            receiveProgress.style.display = 'none';
            receiveKey.value = '';
        }

        function escapeHtml(text) {
            return text
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#039;");
        }
    </script>
</body>
</html>
