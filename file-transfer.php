<?php
// file-transfer.php - Subpage detailing P2P file transfers
require_once __DIR__ . '/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Anywhere File Transfer - Fast, Secure & Free P2P Sharing</title>
    <meta name="description" content="Learn how Send Anywhere file transfer lets you send large files directly from browser to browser. Free, secure, encrypted, and unlimited.">
    <meta name="keywords" content="send anywhere file transfer, send anywhere, file transfer, online file share, share large files, free file transfer">
    <link rel="canonical" href="https://send-anywhere.in/file-transfer" />
    
    <!-- Hreflang Tags for SEO Localization -->
    <link rel="alternate" hreflang="x-default" href="https://send-anywhere.in/file-transfer" />
    <link rel="alternate" hreflang="en-in" href="https://send-anywhere.in/file-transfer" />
    <link rel="alternate" hreflang="en" href="https://send-anywhere.in/file-transfer" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://send-anywhere.in/file-transfer">
    <meta property="og:title" content="Send Anywhere File Transfer - Fast, Secure & Free P2P Sharing">
    <meta property="og:description" content="Discover how Send Anywhere file transfer offers direct device-to-device document and data sharing. Zero server storage, zero logs, completely private.">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://send-anywhere.in/file-transfer">
    <meta property="twitter:title" content="Send Anywhere File Transfer - Fast, Secure & Free P2P Sharing">
    <meta property="twitter:description" content="Discover how Send Anywhere file transfer offers direct device-to-device document and data sharing. Zero server storage, zero logs, completely private.">

    <link rel="stylesheet" href="style.css">
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
            <li><a href="index.php">Transfer</a></li>
            <li><a href="#understanding-p2p">P2P Guide</a></li>
            <li><a href="#faq">FAQ</a></li>
        </ul>
    </header>

    <!-- Quick P2P Transfer Bar -->
    <div class="quick-transfer-bar">
        <div class="quick-transfer-title">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="fill: var(--primary-purple)">
                <path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/>
            </svg>
            Quick P2P Transfer:
        </div>
        <div>
            <button class="quick-send-btn" onclick="document.getElementById('quick-file-input').click()">
                📁 Choose File to Send
            </button>
            <input type="file" id="quick-file-input" style="display: none;">
        </div>
        <div class="quick-receive-group">
            <input type="text" class="quick-receive-input" id="quick-receive-key" maxlength="6" placeholder="6-digit Key">
            <button class="quick-receive-btn" id="btn-quick-receive">Receive</button>
        </div>
    </div>

    <!-- Subpage Main Content Area -->
    <section class="seo-section" style="padding-top: 50px;">
        <div class="seo-card">
            
            <!-- Single H1 tag for the page -->
            <h1>Send Anywhere File Transfer: Fast & Private Direct Sharing</h1>
            
            <p>In the digital age, sharing information has become a core part of everyday life. Whether you are a professional photographer sending high-resolution RAW images to a client, a developer sharing large code repositories, or a user sending holiday videos to family, finding a reliable method is crucial. This is where <strong><a href="index.php">Send Anywhere</a></strong> comes into play. Unlike typical services that require you to upload your files to a cloud server first, our platform facilitates a direct <a href="index.php">file transfer</a> between devices in real-time, delivering maximum speed, safety, and efficiency.</p>

            <h2 id="understanding-p2p">What is a P2P File Transfer and How Does It Work?</h2>
            <p>Peer-to-peer (P2P) file sharing is a decentralized communication model where two parties connect directly to exchange data. In traditional systems, you upload files to a third-party server (like Google Drive or Dropbox), and the recipient downloads them later. This process introduces latency, consumes server space, and leaves your private files sitting on a hard drive somewhere in the cloud.</p>
            <p>With a <a href="index.php">send anywhere file transfer</a>, the process is streamlined. When you select a file to send, your web browser reads it locally. A secure handshake is negotiated via a signaling server, and a direct tunnel is established between the sender's and receiver's browsers. The file data is broken down into small, manageable binary chunks and streamed directly from one device to the other. Since no intermediate server stores the data, the process is extremely secure and uses zero cloud space.</p>

            <h2>The Core Benefits of Serverless File Sharing</h2>
            <p>Opting for a direct device-to-device transport mechanism over conventional cloud-based options offers several major advantages:</p>
            <ul>
                <li><strong>No Storage Limits:</strong> Because files are never saved on our servers, there are no storage caps. You can transfer massive files, such as 10GB, 50GB, or even 100GB, as long as both devices have a stable internet connection.</li>
                <li><strong>Maximum Network Speed:</strong> Traditional methods require you to upload the file first (which takes time) and then have the receiver download it (taking more time). A P2P <a href="index.php">file transfer</a> streams data directly, cutting the total transfer time in half. Your speed is limited only by your internet bandwidth.</li>
                <li><strong>Absolute Privacy and Confidentiality:</strong> When you upload private data to the cloud, you trust a third party to keep it safe. By using <a href="index.php">send anywhere</a>, your files never rest on a physical server disk. They stream directly from browser to browser, leaving no digital footprint.</li>
                <li><strong>E2E Encryption by Default:</strong> All WebRTC connections utilize Datagram Transport Layer Security (DTLS) and Secure Real-time Transport Protocol (SRTP). This ensures that every byte of data sent is encrypted end-to-end and cannot be intercepted.</li>
            </ul>

            <h2>Step-by-Step Tutorial: How to Initiate a Direct File Transfer</h2>
            <p>To transfer files securely using <a href="index.php">send anywhere</a>, follow these simple steps:</p>
            <h3>1. Prepare Your Files for Transfer</h3>
            <p>Navigate to our home page. Click on the "+" icon in the Send Card or drag-and-drop your files directly into the dashed drop zone. Our client-side code will analyze the files locally and list their details on your screen.</p>
            <h3>2. Generate the 6-Digit Key</h3>
            <p>Click the "Send File" button to begin the signaling process. Our server will generate a random, temporary 6-digit key (active for 10 minutes) and prepare a secure connection offer. Keep your browser window open.</p>
            <h3>3. Connect the Receiver</h3>
            <p>Share the 6-digit key with your recipient. They should open our home page, enter the key into the Receive Card, and click the download button. The browsers will perform a quick handshake and connect directly.</p>
            <h3>4. Monitor the Real-Time Stream</h3>
            <p>Once connected, the sender's browser will start reading the file in chunks and sending them across the WebRTC connection. A progress bar on both screens will show the current percentage, transfer speed, and completion status. Once finished, the receiver's browser will compile the chunks and prompt a direct download.</p>

            <h2>WebRTC Technology: The Engine Behind Send Anywhere</h2>
            <p>WebRTC (Web Real-Time Communication) is the industry standard that makes browser-to-browser P2P communication possible. Supported by Google Chrome, Firefox, Safari, and Edge, WebRTC allows web developers to build real-time communication tools without third-party plugins.</p>
            <p>By using WebRTC’s <code>RTCDataChannel</code>, <a href="index.php">send anywhere</a> creates a high-performance pipeline for binary data transfer. When a connection is initiated, the signaling server helps exchange connection details (session descriptions and network candidates). Once the direct path is resolved, the signaling server drops out, and the browsers communicate directly, bypassing any firewalls using STUN/TURN servers.</p>

            <h2>Why Direct Transfers Beat Traditional Web Uploads</h2>
            <p>Let's examine how <a href="index.php">send anywhere</a> compares to traditional file-sharing and cloud providers:</p>
            <ul>
                <li><strong>Decentralization:</strong> Traditional sites are centralized hubs that can go offline or be hacked. P2P transfers rely only on the connection between the two peers, eliminating the central point of failure.</li>
                <li><strong>Cost-Efficiency:</strong> Hosting gigabytes of user files is expensive, which is why services like WeTransfer charge for larger files. By keeping our servers free of file storage, we can offer unlimited P2P file transfers completely free of charge.</li>
                <li><strong>No Account Required:</strong> Most cloud services require you to sign up, log in, and manage storage quotas. Our system is designed for quick, anonymous, and straightforward sharing without any login friction.</li>
            </ul>

            <h2 id="faq">Frequently Asked Questions About Send Anywhere File Transfer</h2>
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">What happens if the sender closes the browser?</div>
                    <div class="faq-answer">
                        Because this is a direct peer-to-peer connection, both browsers must remain open and active on the page. If the sender closes their tab before the transfer reaches 100%, the transfer will fail and must be restarted.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Can I send folders or multiple files?</div>
                    <div class="faq-answer">
                        Yes! For the best experience and performance, we recommend compressing multiple files or folders into a single ZIP archive before initiating the transfer.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Does the transfer consume mobile data?</div>
                    <div class="faq-answer">
                        Yes. Because the files are sent directly between devices over the internet, both uploading (sender) and downloading (receiver) will consume data. We recommend using a Wi-Fi connection for large file transfers.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Is there a limit on how many files I can send?</div>
                    <div class="faq-answer">
                        No. You can run as many separate transfer sessions as you like. Our system is fully unlimited, free, and designed to scale to your sharing needs.
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- P2P Transfer Progress Modal -->
    <div class="transfer-modal" id="transfer-modal">
        <div class="modal-content">
            <span class="modal-close" id="modal-close">&times;</span>
            <div class="modal-body">
                <h3 id="modal-title" style="margin-bottom: 15px; color: var(--primary-purple);">File Transfer</h3>
                
                <!-- Sender View -->
                <div id="modal-sender-view" style="display: none;">
                    <p>Share this 6-digit key with the receiver:</p>
                    <div class="pin-display" id="modal-pin-code" style="font-size: 36px; margin: 10px 0;">000 000</div>
                    <div class="countdown" id="modal-sender-status">Waiting for receiver to connect...</div>
                </div>

                <!-- Receiver View -->
                <div id="modal-receiver-view" style="display: none;">
                    <p id="modal-receiver-status">Connecting to sender...</p>
                </div>

                <!-- Progress Bar -->
                <div class="progress-container" id="modal-progress-container" style="display: none; margin-top: 20px;">
                    <div class="progress-bar-bg">
                        <div class="progress-bar-fill" id="modal-progress-bar"></div>
                    </div>
                    <div class="progress-stats">
                        <span id="modal-percentage">0%</span>
                        <span id="modal-speed">0 KB/s</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // FAQ Accordions Toggle
        document.querySelectorAll('.faq-question').forEach(q => {
            q.addEventListener('click', () => {
                const item = q.parentElement;
                item.classList.toggle('active');
            });
        });

        // WebRTC Signaling & transfer client
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
        const CHUNK_SIZE = 16384;

        // UI Selectors
        const modal = document.getElementById('transfer-modal');
        const modalClose = document.getElementById('modal-close');
        const modalTitle = document.getElementById('modal-title');
        const modalSenderView = document.getElementById('modal-sender-view');
        const modalReceiverView = document.getElementById('modal-receiver-view');
        const modalPinCode = document.getElementById('modal-pin-code');
        const modalSenderStatus = document.getElementById('modal-sender-status');
        const modalReceiverStatus = document.getElementById('modal-receiver-status');
        const modalProgressContainer = document.getElementById('modal-progress-container');
        const modalProgressBar = document.getElementById('modal-progress-bar');
        const modalPercentage = document.getElementById('modal-percentage');
        const modalSpeed = document.getElementById('modal-speed');

        const quickFileInput = document.getElementById('quick-file-input');
        const quickReceiveKey = document.getElementById('quick-receive-key');
        const btnQuickReceive = document.getElementById('btn-quick-receive');

        // Close Modal
        modalClose.addEventListener('click', () => {
            closeTransferSession();
        });

        function closeTransferSession() {
            modal.style.display = 'none';
            if (pollInterval) clearInterval(pollInterval);
            if (dataChannel) dataChannel.close();
            if (localConnection) localConnection.close();
            resetWidgetUI();
        }

        function resetWidgetUI() {
            selectedFile = null;
            quickFileInput.value = '';
            quickReceiveKey.value = '';
            modalProgressContainer.style.display = 'none';
            modalSenderView.style.display = 'none';
            modalReceiverView.style.display = 'none';
        }

        // --- SENDER ---
        quickFileInput.addEventListener('change', async (e) => {
            if (quickFileInput.files.length === 0) return;
            selectedFile = quickFileInput.files[0];

            modalTitle.textContent = "Sending File";
            modalSenderView.style.display = 'block';
            modalReceiverView.style.display = 'none';
            modalProgressContainer.style.display = 'none';
            modal.style.display = 'flex';

            try {
                localConnection = new RTCPeerConnection(rtcConfig);
                dataChannel = localConnection.createDataChannel('fileTransfer', { ordered: true });
                
                dataChannel.onopen = () => {
                    modalSenderStatus.style.display = 'none';
                    modalProgressContainer.style.display = 'block';
                    sendFileData(dataChannel);
                };

                localConnection.onicecandidate = async (event) => {
                    if (event.candidate && transferId) {
                        await sendIceCandidate(transferId, 1, event.candidate);
                    }
                };

                const offer = await localConnection.createOffer();
                await localConnection.setLocalDescription(offer);

                const response = await fetch('api/create.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ offer: offer.sdp })
                });
                const data = await response.json();

                if (data.success) {
                    transferId = data.transfer_id;
                    modalPinCode.textContent = formatPin(data.pin);
                    startAnswerPolling();
                } else {
                    alert('Error creating transfer session: ' + data.error);
                    closeTransferSession();
                }
            } catch (err) {
                console.error(err);
                alert('Initialization error.');
                closeTransferSession();
            }
        });

        function startAnswerPolling() {
            let attempts = 0;
            pollInterval = setInterval(async () => {
                attempts++;
                if (attempts > 300) {
                    clearInterval(pollInterval);
                    alert('Session expired.');
                    closeTransferSession();
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
                    await localConnection.setRemoteDescription(
                        new RTCSessionDescription({ type: 'answer', sdp: data.answer })
                    );
                    startIcePolling(transferId, 0);
                }
            }, 2000);
        }

        async function sendFileData(channel) {
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
                if (channel.bufferedAmount > 1048576) {
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
                modalProgressBar.style.width = `${pct}%`;
                modalPercentage.textContent = `${pct}%`;
                
                const timeElapsed = (Date.now() - startTime) / 1000;
                const speedBytes = bytesSent / timeElapsed;
                modalSpeed.textContent = `${formatSpeed(speedBytes)}`;

                if (bytesSent < selectedFile.size) {
                    readSlice(offset);
                } else {
                    modalSpeed.textContent = 'Transfer Complete!';
                }
            }

            readSlice(offset);
        }

        // --- RECEIVER ---
        btnQuickReceive.addEventListener('click', async () => {
            const pinVal = quickReceiveKey.value.replace(/\s+/g, '');
            if (pinVal.length !== 6 || isNaN(pinVal)) {
                alert('Please enter a valid 6-digit key.');
                return;
            }

            modalTitle.textContent = "Receiving File";
            modalSenderView.style.display = 'none';
            modalReceiverView.style.display = 'block';
            modalReceiverStatus.textContent = "Connecting to sender...";
            modalProgressContainer.style.display = 'none';
            modal.style.display = 'flex';

            try {
                const joinResp = await fetch('api/join.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ pin: pinVal })
                });
                const joinData = await joinResp.json();

                if (!joinData.success) {
                    alert(joinData.error);
                    closeTransferSession();
                    return;
                }

                transferId = joinData.transfer_id;
                localConnection = new RTCPeerConnection(rtcConfig);

                localConnection.onicecandidate = async (event) => {
                    if (event.candidate && transferId) {
                        await sendIceCandidate(transferId, 0, event.candidate);
                    }
                };

                localConnection.ondatachannel = (event) => {
                    setupReceiverChannelEvents(event.channel);
                };

                await localConnection.setRemoteDescription(
                    new RTCSessionDescription({ type: 'offer', sdp: joinData.offer })
                );

                const answer = await localConnection.createAnswer();
                await localConnection.setLocalDescription(answer);

                const ansResp = await fetch('api/answer.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ transfer_id: transferId, answer: answer.sdp })
                });
                const ansData = await ansResp.json();

                if (ansData.success) {
                    startIcePolling(transferId, 1);
                } else {
                    alert('Signaling error: ' + ansData.error);
                    closeTransferSession();
                }
            } catch (err) {
                console.error(err);
                alert('Connection failure.');
                closeTransferSession();
            }
        });

        function setupReceiverChannelEvents(channel) {
            let receivedChunks = [];
            let fileMetadata = null;
            let bytesReceived = 0;
            let startTime = null;

            channel.onopen = () => {
                modalReceiverStatus.textContent = 'Connected! Transfer starting...';
                modalProgressContainer.style.display = 'block';
                startTime = Date.now();
            };

            channel.onmessage = (event) => {
                if (typeof event.data === 'string') {
                    fileMetadata = JSON.parse(event.data);
                    modalReceiverStatus.textContent = `Receiving: ${escapeHtml(fileMetadata.name)}`;
                    receivedChunks = [];
                    bytesReceived = 0;
                } else {
                    receivedChunks.push(event.data);
                    bytesReceived += event.data.byteLength;

                    if (fileMetadata) {
                        const pct = Math.round((bytesReceived / fileMetadata.size) * 100);
                        modalProgressBar.style.width = `${pct}%`;
                        modalPercentage.textContent = `${pct}%`;

                        const timeElapsed = (Date.now() - startTime) / 1000;
                        const speedBytes = bytesReceived / timeElapsed;
                        modalSpeed.textContent = `${formatSpeed(speedBytes)}`;

                        if (bytesReceived === fileMetadata.size) {
                            modalReceiverStatus.textContent = 'Saving file...';
                            
                            const blob = new Blob(receivedChunks, { type: fileMetadata.mime || 'application/octet-stream' });
                            const url = URL.createObjectURL(blob);
                            const a = document.createElement('a');
                            a.href = url;
                            a.download = fileMetadata.name;
                            document.body.appendChild(a);
                            a.click();
                            document.body.removeChild(a);
                            
                            modalSpeed.textContent = 'Download completed successfully!';
                            channel.close();
                            localConnection.close();
                        }
                    }
                }
            };
        }

        // --- UTILS ---
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
                    console.error(e);
                }
            }, 2000);
        }

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
