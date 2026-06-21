<?php
// product.php - Send Anywhere Product Page: All Platforms & Apps
require_once __DIR__ . '/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Anywhere Product - Free File Transfer App for Android, iOS, Windows & More</title>
    <meta name="description" content="Send Anywhere product page: download the free file transfer app for Android, iOS, Windows, macOS, Linux, Chrome, Gmail & Outlook. Share files across all devices instantly.">
    <meta name="keywords" content="send anywhere product, send anywhere app, send anywhere download, send anywhere android, send anywhere ios, send anywhere windows, file transfer app, share files free">
    <link rel="canonical" href="https://send-anywhere.in/product" />

    <!-- Hreflang Tags for SEO Localization -->
    <link rel="alternate" hreflang="x-default" href="https://send-anywhere.in/product" />
    <link rel="alternate" hreflang="en-in" href="https://send-anywhere.in/product" />
    <link rel="alternate" hreflang="en" href="https://send-anywhere.in/product" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://send-anywhere.in/product">
    <meta property="og:title" content="Send Anywhere Product - Free File Transfer App for Android, iOS, Windows & More">
    <meta property="og:description" content="Get Send Anywhere on any device. Free file transfer apps for Android, iOS, Windows, macOS, Linux, Chrome, Gmail & Outlook. Zero server storage, instant sharing.">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://send-anywhere.in/product">
    <meta property="twitter:title" content="Send Anywhere Product - Free File Transfer App for Android, iOS, Windows & More">
    <meta property="twitter:description" content="Get Send Anywhere on any device. Free file transfer apps for Android, iOS, Windows, macOS, Linux, Chrome, Gmail & Outlook.">

    <!-- Schema.org Structured Data: SoftwareApplication for each platform -->
    <script type="application/ld+json">
    [
        {
            "@context": "https://schema.org",
            "@type": "SoftwareApplication",
            "name": "Send Anywhere for Android",
            "operatingSystem": "ANDROID",
            "applicationCategory": "UtilitiesApplication",
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "4.8",
                "ratingCount": "267000"
            },
            "offers": { "@type": "Offer", "price": "0", "priceCurrency": "INR" },
            "downloadUrl": "https://play.google.com/store/apps/details?id=com.estmob.android.sendanywhere"
        },
        {
            "@context": "https://schema.org",
            "@type": "SoftwareApplication",
            "name": "Send Anywhere for iOS",
            "operatingSystem": "iOS",
            "applicationCategory": "UtilitiesApplication",
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "4.8",
                "ratingCount": "69000"
            },
            "offers": { "@type": "Offer", "price": "0", "priceCurrency": "INR" },
            "downloadUrl": "https://apps.apple.com/app/send-anywhere-file-transfer/id596642855"
        },
        {
            "@context": "https://schema.org",
            "@type": "SoftwareApplication",
            "name": "Send Anywhere for Windows",
            "operatingSystem": "Windows",
            "applicationCategory": "UtilitiesApplication",
            "offers": { "@type": "Offer", "price": "0", "priceCurrency": "INR" },
            "downloadUrl": "https://send-anywhere.in/product"
        }
    ]
    </script>

    <link rel="stylesheet" href="style.css">
    <style>
        /* Product Page Specific Styles */
        .product-hero {
            background: linear-gradient(135deg, var(--primary-purple) 0%, #2d1b6e 100%);
            padding: 80px 40px 110px;
            color: var(--text-white);
            text-align: center;
            position: relative;
        }
        .product-hero::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 50px;
            background: var(--bg-light);
            clip-path: polygon(0 100%, 100% 100%, 100% 0);
        }
        .product-hero h1 {
            font-size: 46px;
            font-weight: 800;
            max-width: 800px;
            margin: 0 auto 20px;
            line-height: 1.2;
        }
        .product-hero h1 span { color: #ffd054; }
        .product-hero p {
            font-size: 18px;
            color: rgba(255,255,255,0.85);
            max-width: 650px;
            margin: 0 auto 40px;
        }
        .hero-cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background-color: var(--accent-red);
            color: var(--text-white);
            padding: 16px 34px;
            border-radius: 12px;
            font-size: 17px;
            font-weight: 700;
            text-decoration: none;
            transition: var(--transition-smooth);
        }
        .hero-cta-btn:hover {
            background-color: var(--accent-red-hover);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 59, 92, 0.4);
        }

        /* Platform Grid */
        .platform-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 28px;
            margin-bottom: 50px;
        }
        .platform-card {
            background: var(--bg-card);
            border-radius: var(--border-radius);
            padding: 36px 30px;
            box-shadow: var(--shadow-card);
            text-align: center;
            transition: var(--transition-smooth);
            border: 1px solid rgba(77, 50, 160, 0.05);
            position: relative;
            overflow: hidden;
        }
        .platform-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-purple), var(--accent-red));
            opacity: 0;
            transition: var(--transition-smooth);
        }
        .platform-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(77, 50, 160, 0.15);
        }
        .platform-card:hover::before { opacity: 1; }
        .platform-icon {
            font-size: 52px;
            margin-bottom: 18px;
            display: block;
        }
        .platform-card h3 {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 12px;
        }
        .platform-card p {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 22px;
        }
        .platform-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: var(--primary-purple);
            color: var(--text-white);
            padding: 10px 22px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition-smooth);
        }
        .platform-btn:hover {
            background-color: var(--primary-purple-dark);
            transform: scale(1.04);
        }
        .platform-btn.web-btn {
            background-color: var(--accent-red);
        }
        .platform-btn.web-btn:hover {
            background-color: var(--accent-red-hover);
        }

        /* Stats Bar */
        .stats-bar {
            background: linear-gradient(135deg, var(--primary-purple), #5a3cc4);
            border-radius: 20px;
            padding: 40px 50px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-bottom: 60px;
            box-shadow: 0 15px 40px rgba(77, 50, 160, 0.25);
            color: var(--text-white);
        }
        .stat-item { text-align: center; }
        .stat-value {
            font-size: 42px;
            font-weight: 800;
            color: #ffd054;
            line-height: 1;
        }
        .stat-label {
            font-size: 14px;
            color: rgba(255,255,255,0.8);
            margin-top: 6px;
            font-weight: 500;
        }
        .stat-divider {
            width: 1px;
            height: 60px;
            background: rgba(255,255,255,0.2);
        }

        /* Features Comparison Table */
        .compare-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            font-size: 15px;
        }
        .compare-table th {
            background-color: var(--primary-purple);
            color: var(--text-white);
            padding: 16px 20px;
            text-align: left;
            font-weight: 700;
        }
        .compare-table th:first-child { border-radius: 10px 0 0 0; }
        .compare-table th:last-child { border-radius: 0 10px 0 0; }
        .compare-table td {
            padding: 14px 20px;
            border-bottom: 1px solid #eef0f6;
            color: var(--text-muted);
        }
        .compare-table tr:last-child td { border-bottom: none; }
        .compare-table tr:hover td { background-color: #faf9ff; }
        .compare-table td:first-child { font-weight: 600; color: var(--text-dark); }
        .check { color: #22c55e; font-size: 18px; font-weight: 700; }
        .cross { color: #ef4444; font-size: 18px; }

        @media (max-width: 768px) {
            .product-hero h1 { font-size: 32px; }
            .stats-bar { flex-direction: column; gap: 28px; padding: 30px 20px; }
            .stat-divider { width: 80px; height: 1px; }
        }
    </style>
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
            <li><a href="file-transfer">File Transfer</a></li>
            <li><a href="product" style="color:#fff; border-bottom: 2px solid rgba(255,255,255,0.5);">Product</a></li>
        </ul>
    </header>

    <!-- Quick P2P Transfer Bar (on every sub-page) -->
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

    <!-- Product Hero -->
    <section class="product-hero">
        <h1>Send Anywhere: <span>One App, Every Device</span></h1>
        <p>Transfer files of any size, instantly and for free. Available on Android, iOS, Windows, macOS, Linux, Chrome, Gmail, and Outlook. No account needed.</p>
        <a href="index.php" class="hero-cta-btn">
            🚀 Start Transferring Now — It's Free
        </a>
    </section>

    <!-- Platform Grid Section -->
    <section class="seo-section" style="padding-top: 60px;">
        <div style="max-width: 1100px; margin: 0 auto; padding: 0 20px;">

            <!-- Stats Bar -->
            <div class="stats-bar">
                <div class="stat-item">
                    <div class="stat-value">300M+</div>
                    <div class="stat-label">Downloads Worldwide</div>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <div class="stat-value">4.8★</div>
                    <div class="stat-label">Avg. User Rating</div>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <div class="stat-value">8+</div>
                    <div class="stat-label">Supported Platforms</div>
                </div>
                <div class="stat-divider"></div>
                <div class="stat-item">
                    <div class="stat-value">∞</div>
                    <div class="stat-label">File Size Limit</div>
                </div>
            </div>

            <!-- Platform Cards -->
            <h2 style="font-size: 32px; font-weight: 800; color: var(--primary-purple); margin-bottom: 30px; text-align: center;">Download Send Anywhere for Your Platform</h2>

            <div class="platform-grid">

                <!-- Android -->
                <div class="platform-card">
                    <span class="platform-icon">🤖</span>
                    <h3>Send Anywhere for Android</h3>
                    <p>The most popular mobile platform for Send Anywhere. Transfer photos, videos, APKs, and large files directly from your Android smartphone or tablet using our fast P2P engine.</p>
                    <a href="https://play.google.com/store/apps/details?id=com.estmob.android.sendanywhere" target="_blank" rel="noopener" class="platform-btn">
                        ↗ Google Play Store
                    </a>
                </div>

                <!-- iOS -->
                <div class="platform-card">
                    <span class="platform-icon">🍎</span>
                    <h3>Send Anywhere for iPhone & iPad</h3>
                    <p>Available on the Apple App Store for iPhone, iPad, and iPod Touch. Share files between iOS and Android devices with the same simple 6-digit key, no iCloud needed.</p>
                    <a href="https://apps.apple.com/app/send-anywhere-file-transfer/id596642855" target="_blank" rel="noopener" class="platform-btn">
                        ↗ Apple App Store
                    </a>
                </div>

                <!-- Web (our best feature) -->
                <div class="platform-card">
                    <span class="platform-icon">🌐</span>
                    <h3>Send Anywhere Web (Browser)</h3>
                    <p>No download required. Use Send Anywhere directly in any modern browser — Chrome, Firefox, Edge, or Safari. The fastest way to share files right now, for free.</p>
                    <a href="index.php" class="platform-btn web-btn">
                        ⚡ Use Now — No Install Needed
                    </a>
                </div>

                <!-- Windows -->
                <div class="platform-card">
                    <span class="platform-icon">🪟</span>
                    <h3>Send Anywhere for Windows</h3>
                    <p>The Windows desktop app lets you send files from your PC to any device. Drag and drop files, get a key, and share with any iOS or Android user in seconds.</p>
                    <a href="https://update.send-anywhere.com/downloads/SendAnywhereSetup.exe" target="_blank" rel="noopener" class="platform-btn">
                        ⬇ Download for Windows
                    </a>
                </div>

                <!-- macOS -->
                <div class="platform-card">
                    <span class="platform-icon">💻</span>
                    <h3>Send Anywhere for macOS</h3>
                    <p>Transfer files from your Mac without cables or cloud sync. Get the native macOS app and send photos, documents, and large archives to any connected device instantly.</p>
                    <a href="https://update.send-anywhere.com/osx_downloads/Send%20Anywhere.dmg" target="_blank" rel="noopener" class="platform-btn">
                        ⬇ Download for macOS
                    </a>
                </div>

                <!-- Linux -->
                <div class="platform-card">
                    <span class="platform-icon">🐧</span>
                    <h3>Send Anywhere for Linux</h3>
                    <p>Send Anywhere provides a Linux-compatible package for Ubuntu and Debian distributions. Developers and power users can share files directly from the command line or desktop.</p>
                    <a href="https://send-anywhere.com/file-transfer" target="_blank" rel="noopener" class="platform-btn">
                        ↗ Learn More
                    </a>
                </div>

                <!-- Chrome Extension -->
                <div class="platform-card">
                    <span class="platform-icon">🔷</span>
                    <h3>Send Anywhere Chrome Extension</h3>
                    <p>Add Send Anywhere to your Chrome browser for even faster sharing. Send files from any webpage without switching tabs. Perfect for web developers and power users.</p>
                    <a href="https://chrome.google.com/webstore/detail/amjmjholfoknokffkiolahocokcaecnc" target="_blank" rel="noopener" class="platform-btn">
                        ↗ Chrome Web Store
                    </a>
                </div>

                <!-- Gmail Add-on -->
                <div class="platform-card">
                    <span class="platform-icon">📧</span>
                    <h3>Send Anywhere Gmail Add-on</h3>
                    <p>Send large attachments directly from your Gmail compose window. Bypass Gmail's 25MB attachment limit by sharing files of any size securely through Send Anywhere.</p>
                    <a href="https://workspace.google.com/marketplace/app/send_anywhere/index" target="_blank" rel="noopener" class="platform-btn">
                        ↗ Gmail Add-on
                    </a>
                </div>

                <!-- Outlook Add-in -->
                <div class="platform-card">
                    <span class="platform-icon">📮</span>
                    <h3>Send Anywhere Outlook Add-in</h3>
                    <p>Integrate Send Anywhere with Microsoft Outlook on Windows. Share large files as transfer links directly from your email client — no more attachment size restrictions.</p>
                    <a href="https://appsource.microsoft.com/en-us/product/office/WA104380492" target="_blank" rel="noopener" class="platform-btn">
                        ↗ Microsoft AppSource
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- SEO Long-Form Content Section -->
    <section class="seo-section" style="padding-top: 0;">
        <div class="seo-card">

            <h2 id="about-product">What is the Send Anywhere Product?</h2>
            <p>The <strong><a href="index.php">Send Anywhere</a></strong> product is a cross-platform, peer-to-peer file transfer ecosystem that lets you share files of any size, across any device, without cloud storage. Whether you are on a Windows PC, an Android smartphone, a Mac laptop, or simply browsing in Chrome, Send Anywhere provides a native-quality experience tailored specifically for each platform. This single, unified platform approach means that a file can start its journey on a Linux server and arrive on an iPhone in seconds — without touching a single cloud server disk.</p>

            <p>Our product philosophy is rooted in three pillars: <strong>speed, privacy, and universal compatibility</strong>. Unlike cloud storage tools like Google Drive or Dropbox, which require you to upload files to external servers (where they can be stored, scanned, or accessed), <a href="index.php">Send Anywhere</a> creates a direct, encrypted connection between the sender's device and the receiver's device. Your files travel through the internet, not to a server on it.</p>

            <h2 id="cross-platform">Why Cross-Platform Support Matters</h2>
            <p>In today's world, people use a mix of devices — an iPhone at home, a Windows laptop at work, an Android tablet for travel, and a Linux server for development. Traditional <a href="file-transfer">file transfer</a> tools often require both devices to be on the same operating system or the same ecosystem (e.g., AirDrop only works between Apple devices). This is a fundamental limitation that <strong>Send Anywhere solves</strong>.</p>

            <p>With Send Anywhere, a user on an Android phone can send a 4K video to someone on a macOS MacBook, and a Windows user can receive a project file from a Linux server — all using the same 6-digit key system or direct link. This universality is one of the core reasons Send Anywhere has been downloaded over 300 million times worldwide and continues to be the go-to solution for cross-device <a href="file-transfer">file transfer</a>.</p>

            <h2 id="web-vs-app">Web vs. App: Which Should You Use?</h2>
            <p>The <strong>Web version of <a href="index.php">Send Anywhere</a></strong> (available right on this website) is the fastest way to get started. You can transfer files from your browser without installing anything. This is ideal for:</p>
            <ul>
                <li>One-time transfers where you don't want to install software</li>
                <li>Sending files to someone else who has no app installed</li>
                <li>Quick browser-to-browser file sharing between two computers on the same desk</li>
                <li>Corporate environments where software installation is restricted</li>
            </ul>

            <p>The <strong>Native Apps</strong> (Android, iOS, Windows, macOS, Linux) offer additional capabilities like background transfers, direct Wi-Fi sharing on the same local network for maximum speed, device clipboard history, and persistent transfer logs. For power users and professionals who transfer large files regularly, the native apps provide a richer, more seamless experience.</p>

            <h2 id="how-key-works">How the 6-Digit Key System Works Across All Platforms</h2>
            <p>One of the most elegant features of <a href="index.php">Send Anywhere</a> is the universal 6-digit key system. No matter which platform or device you are on, the process is identical:</p>
            <ol style="padding-left: 22px; color: var(--text-muted); margin-bottom: 20px;">
                <li style="margin-bottom: 10px; font-size: 16px;"><strong>Sender selects file(s):</strong> Whether in the web browser, the Android app, or the Windows desktop — the sender taps or clicks to select files for transfer.</li>
                <li style="margin-bottom: 10px; font-size: 16px;"><strong>A 6-digit key is generated:</strong> The sender's client communicates with our signaling server to generate a unique, time-limited 6-digit key. The key expires after 10 minutes for security.</li>
                <li style="margin-bottom: 10px; font-size: 16px;"><strong>Receiver enters the key:</strong> The receiver enters the key on any Send Anywhere client — web, mobile, or desktop — and clicks receive.</li>
                <li style="margin-bottom: 10px; font-size: 16px;"><strong>Direct P2P connection established:</strong> A WebRTC data channel or direct socket connection is established between the two devices. Files stream directly from sender to receiver.</li>
                <li style="margin-bottom: 10px; font-size: 16px;"><strong>Transfer completes:</strong> The receiver's device compiles the received data and saves the file(s) to the local storage. No copy is ever stored on our servers.</li>
            </ol>

            <h2 id="email-integrations">Email Integrations: Gmail & Outlook</h2>
            <p>Two of the most widely used email platforms — Gmail and Microsoft Outlook — have strict file attachment size limits (typically 25MB for Gmail and 20MB for Outlook). For professionals who regularly send large files — CAD drawings, video edits, high-resolution photos, or large datasets — this is a constant source of frustration.</p>

            <p>The <strong>Send Anywhere Gmail Add-on</strong> and <strong>Outlook Add-in</strong> seamlessly integrate into your email workflow. Instead of attaching a file directly to the email, <a href="index.php">Send Anywhere</a> generates a shareable link or a 6-digit key that is automatically inserted into your email draft. The recipient can then download the file through any Send Anywhere client, including the web version on our website, without hitting any size limits. This is a game-changing productivity feature for businesses of all sizes.</p>

            <h2 id="security">Security Architecture Across All Platforms</h2>
            <p>Security is not an afterthought at <strong>Send Anywhere</strong> — it is a fundamental design principle. Our security model is built on several layers:</p>
            <ul>
                <li><strong>End-to-End Encryption (E2EE):</strong> All WebRTC data channels are encrypted using DTLS (Datagram Transport Layer Security). This means your file data is encrypted before it leaves your device and can only be decrypted on the receiver's device.</li>
                <li><strong>Zero Server Storage:</strong> Our server's role is to act as a signaling intermediary only — it exchanges connection setup information between the sender and receiver but never receives or stores the actual file data.</li>
                <li><strong>Time-Limited Keys:</strong> The 6-digit key generated for each transfer session expires after 10 minutes. An expired key cannot be used to initiate a transfer, limiting the window of opportunity for unauthorized access.</li>
                <li><strong>No Mandatory Account:</strong> Since no files are stored on our servers, there is no need to create an account or log in. This means there is no centralized database of user files that could be breached.</li>
            </ul>

            <h2 id="faq">Frequently Asked Questions About Send Anywhere Products</h2>
            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-question">Is Send Anywhere completely free on all platforms?</div>
                    <div class="faq-answer">
                        Yes. The core <a href="index.php">Send Anywhere</a> feature — unlimited P2P <a href="file-transfer">file transfer</a> using a 6-digit key — is completely free on all platforms including Android, iOS, Windows, macOS, Linux, and the web browser. There are no file size limits or transfer counts on the free tier.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Can I send files between Android and iPhone using Send Anywhere?</div>
                    <div class="faq-answer">
                        Absolutely. This is one of Send Anywhere's greatest strengths. An Android user can generate a 6-digit key and share it with an iPhone user (or vice versa), and the <a href="file-transfer">file transfer</a> will proceed seamlessly using our cross-platform P2P system. There are no ecosystem restrictions.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Do I need to install an app to use Send Anywhere?</div>
                    <div class="faq-answer">
                        No. The web version of <a href="index.php">Send Anywhere</a> works directly in your browser without any installation. Simply visit this website, select your files, and generate a key. For the best long-term experience with background transfers and Wi-Fi Direct, we recommend the native apps.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">What is the maximum file size I can send?</div>
                    <div class="faq-answer">
                        There is no enforced file size limit on <a href="index.php">Send Anywhere</a>. Because files are never stored on our servers, we do not need to impose storage-based restrictions. You can theoretically send files of any size — 1GB, 10GB, or more — as long as both devices have a stable internet connection throughout the transfer.
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Can I send files through the Gmail add-on without a Send Anywhere account?</div>
                    <div class="faq-answer">
                        The Gmail add-on is designed for seamless integration. While creating a Send Anywhere account gives you additional features like transfer history and link-based sharing, the core <a href="file-transfer">file transfer</a> functionality via the 6-digit key system works without an account.
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Transfer Modal (for Quick Transfer Bar) -->
    <div class="transfer-modal" id="transfer-modal">
        <div class="modal-content">
            <span class="modal-close" id="modal-close">&times;</span>
            <div class="modal-body">
                <h3 id="modal-title" style="margin-bottom: 15px; color: var(--primary-purple);">File Transfer</h3>
                <div id="modal-sender-view" style="display: none;">
                    <p>Share this 6-digit key with the receiver:</p>
                    <div class="pin-display" id="modal-pin-code" style="font-size: 36px; margin: 10px 0;">000 000</div>
                    <div class="countdown" id="modal-sender-status">Waiting for receiver to connect...</div>
                </div>
                <div id="modal-receiver-view" style="display: none;">
                    <p id="modal-receiver-status">Connecting to sender...</p>
                </div>
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

    <!-- Footer -->
    <footer>
        <p>© <?php echo date('Y'); ?> <a href="index.php">Send Anywhere India</a> — Free P2P <a href="file-transfer">File Transfer</a> | <a href="product">Product</a> | <a href="file-transfer">How It Works</a></p>
        <p style="margin-top: 8px;">No cloud storage. No file size limits. 100% free and private.</p>
    </footer>

    <script>
        // FAQ Accordion Toggle
        document.querySelectorAll('.faq-question').forEach(q => {
            q.addEventListener('click', () => {
                const item = q.parentElement;
                item.classList.toggle('active');
            });
        });

        // ---- WebRTC Signaling & Transfer (Quick Transfer Bar) ----
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

        function showModal() { modal.style.display = 'flex'; }
        function hideModal() {
            modal.style.display = 'none';
            resetTransferState();
        }
        modalClose.addEventListener('click', hideModal);
        modal.addEventListener('click', (e) => { if (e.target === modal) hideModal(); });

        function resetTransferState() {
            if (pollInterval) clearInterval(pollInterval);
            if (localConnection) localConnection.close();
            localConnection = null; dataChannel = null; transferId = null; pollInterval = null;
            modalSenderView.style.display = 'none';
            modalReceiverView.style.display = 'none';
            modalProgressContainer.style.display = 'none';
        }

        // --- SENDER FLOW ---
        document.getElementById('quick-file-input').addEventListener('change', async function() {
            const file = this.files[0];
            if (!file) return;
            resetTransferState();
            showModal();
            modalTitle.textContent = 'Sending: ' + file.name;
            modalSenderView.style.display = 'block';
            modalSenderStatus.textContent = 'Setting up connection...';

            localConnection = new RTCPeerConnection(rtcConfig);
            dataChannel = localConnection.createDataChannel('fileTransfer');
            let receiveBuffer = [], receivedSize = 0;

            const offer = await localConnection.createOffer();
            await localConnection.setLocalDescription(offer);

            localConnection.onicecandidate = async (event) => {
                if (event.candidate) {
                    await fetch('api/signal.php', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify({ action: 'add_candidate', transfer_id: transferId, role: 'sender', candidate: event.candidate })
                    });
                }
            };

            const res = await fetch('api/signal.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({ action: 'create', sdp: offer.sdp, sdp_type: offer.type, filename: file.name, filesize: file.size })
            });
            const data = await res.json();
            if (!data.success) { alert('Failed to create transfer session.'); hideModal(); return; }
            transferId = data.transfer_id;
            const key = data.key;
            modalPinCode.textContent = key.toString().substring(0,3) + ' ' + key.toString().substring(3);
            modalSenderStatus.textContent = 'Share this key. Waiting for receiver...';

            let startTime = null, lastLoaded = 0;
            dataChannel.onopen = () => {
                modalSenderStatus.textContent = 'Connected! Sending...';
                modalProgressContainer.style.display = 'block';
                startTime = Date.now(); lastLoaded = 0;
                const chunkSize = 16384;
                const fileReader = new FileReader();
                let offset = 0;
                const readSlice = (o) => {
                    const slice = file.slice(o, o + chunkSize);
                    fileReader.readAsArrayBuffer(slice);
                };
                fileReader.onload = (e) => {
                    dataChannel.send(e.target.result);
                    offset += e.target.result.byteLength;
                    const pct = Math.round((offset / file.size) * 100);
                    modalProgressBar.style.width = pct + '%';
                    modalPercentage.textContent = pct + '%';
                    const elapsed = (Date.now() - startTime) / 1000;
                    const speed = (offset / elapsed / 1024).toFixed(1);
                    modalSpeed.textContent = speed + ' KB/s';
                    if (offset < file.size) readSlice(offset);
                    else modalSenderStatus.textContent = '✅ Transfer Complete!';
                };
                readSlice(0);
            };

            pollInterval = setInterval(async () => {
                if (!transferId) return;
                const pollRes = await fetch(`api/signal.php?action=poll&transfer_id=${transferId}&role=receiver`);
                const pollData = await pollRes.json();
                if (pollData.answer_sdp) {
                    clearInterval(pollInterval); pollInterval = null;
                    await localConnection.setRemoteDescription({ type: 'answer', sdp: pollData.answer_sdp });
                    if (pollData.candidates) {
                        for (const c of pollData.candidates) {
                            await localConnection.addIceCandidate(new RTCIceCandidate(c));
                        }
                    }
                }
            }, 1500);
        });

        // --- RECEIVER FLOW ---
        document.getElementById('btn-quick-receive').addEventListener('click', async function() {
            const key = document.getElementById('quick-receive-key').value.trim();
            if (!key || key.length !== 6) { alert('Please enter a valid 6-digit key.'); return; }
            resetTransferState();
            showModal();
            modalTitle.textContent = 'Receiving File...';
            modalReceiverView.style.display = 'block';
            modalReceiverStatus.textContent = 'Looking up transfer key...';

            const res = await fetch(`api/signal.php?action=lookup&key=${key}`);
            const data = await res.json();
            if (!data.success) { alert('Invalid or expired key.'); hideModal(); return; }
            transferId = data.transfer_id;
            modalReceiverStatus.textContent = 'Connecting to sender...';

            localConnection = new RTCPeerConnection(rtcConfig);
            await localConnection.setRemoteDescription({ type: data.sdp_type, sdp: data.sdp });
            const answer = await localConnection.createAnswer();
            await localConnection.setLocalDescription(answer);

            localConnection.onicecandidate = async (event) => {
                if (event.candidate) {
                    await fetch('api/signal.php', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify({ action: 'add_candidate', transfer_id: transferId, role: 'receiver', candidate: event.candidate })
                    });
                }
            };

            await fetch('api/signal.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({ action: 'answer', transfer_id: transferId, sdp: answer.sdp, sdp_type: answer.type })
            });

            if (data.candidates) {
                for (const c of data.candidates) await localConnection.addIceCandidate(new RTCIceCandidate(c));
            }

            let receiveBuffer = [], receivedSize = 0;
            const fileName = data.filename || 'received_file';
            const fileSize = data.filesize || 0;
            let startTime = Date.now();
            modalProgressContainer.style.display = 'block';

            localConnection.ondatachannel = (event) => {
                const receiveChannel = event.channel;
                receiveChannel.onmessage = (e) => {
                    receiveBuffer.push(e.data);
                    receivedSize += e.data.byteLength;
                    if (fileSize > 0) {
                        const pct = Math.round((receivedSize / fileSize) * 100);
                        modalProgressBar.style.width = pct + '%';
                        modalPercentage.textContent = pct + '%';
                        const elapsed = (Date.now() - startTime) / 1000;
                        modalSpeed.textContent = ((receivedSize / elapsed) / 1024).toFixed(1) + ' KB/s';
                        if (receivedSize === fileSize) {
                            const blob = new Blob(receiveBuffer);
                            const url = URL.createObjectURL(blob);
                            const a = document.createElement('a');
                            a.href = url; a.download = fileName; a.click();
                            URL.revokeObjectURL(url);
                            modalReceiverStatus.textContent = '✅ File downloaded!';
                        }
                    }
                };
            };
        });
    </script>

</body>
</html>
