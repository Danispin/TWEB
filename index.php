<?php

session_start();

if (isset($_SESSION['username'])) {
    echo "Hello, " . $_SESSION['username'] . "! You are logged in.";
} else {
    echo "You are not logged in.";
}


     $title = "Site";
    $navLinks = [
        "index.php" => "Home",
        "experts.php" => "Experts",
        "products.php" => "Products",
        "contact.php" => "Contact"
    ];
    
    $profiles = [
        ["id" => "profile1", "name" => "Serious Guy", "price" => "5$/Visit", "experience" => "5 years", "location" => "Chisinau", "preferences" => "Cats, Dogs", "image" => "css/avatars/profile1/avatar1.png"],
        ["id" => "profile2", "name" => "Glasses Nerd", "price" => "Vet", "image" => "css/avatars/profile2/avatar1.png"],
        ["id" => "profile3", "name" => "Girl in a Jacket", "price" => "10$/Visit", "experience" => "2 years", "location" => "Chisinau", "image" => "css/avatars/profile3/avatar1.png"],
        ["id" => "profile4", "name" => "Black Guy", "price" => "5$/Visit", "experience" => "3 years", "location" => "Chisinau", "preferences" => "Dogs", "image" => "css/avatars/profile4/avatar1.png"]
    ];
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/mystyle.css">
</head>
<body>
    <header>
        <nav class="topnav">
            <br>
            <a href = "login.php">
            <img src="css/logos/logo.png" alt="Logo" class="logo">

            </a>
            <?php foreach ($navLinks as $link => $name): ?>
                <a href="<?php echo $link; ?>"><?php echo $name; ?></a>
            <?php endforeach; ?>
        </nav>
        <br>
        <h1 class="welcome">Leave Your Pet in Safe Hands – Expert Animal Care While You’re Away</h1>
    </header>
    <main>
        <h2 style="text-align: center; width: 50%; margin: auto;">
            Going on vacation? Busy with work? Our trusted pet sitters provide top-quality care for your furry (or feathery) friend while you're away. Because your pet deserves the best!
        </h2>
        <br><br>
        <div class="HIW">
            <h2>How It Works</h2>
            <ul>
                <li><strong>Tell Us About Your Pet:</strong> Let us know what kind of care your pet needs.</li>
                <li><strong>Get Matched with a Trusted Sitter:</strong> We connect you with experienced pet sitters.</li>
                <li><strong>Relax While We Care for Your Pet:</strong> Get updates and photos straight to your phone.</li>
            </ul>
        </div>
        <br><br>
        <div class="WCU">
            <h2>Why Choose Us?</h2>
            <ul>
                <li><strong>Experienced & Loving Sitters:</strong> Our sitters are carefully vetted.</li>
                <li><strong>Safe & Comfortable Environment:</strong> Stress-free setting for your pet.</li>
                <li><strong>Regular Updates & Check-ins:</strong> Receive photos, videos, and updates.</li>
                <li><strong>Emergency Support:</strong> Sitters have basic pet first aid training.</li>
            </ul>
        </div>
    </main>
    <br><br>
    <div class="contact">
        <?php foreach ($profiles as $profile): ?>
            <a href="html/<?php echo $profile['id']; ?>.html">
                <img src="<?php echo $profile['image']; ?>" alt="<?php echo $profile['name']; ?>">
            </a>
        <?php endforeach; ?>
    </div>
    <br><br>
    <?php foreach ($profiles as $profile): ?>
        <div id="<?php echo $profile['id']; ?>" class="profile-box">
            <h3><?php echo $profile['name']; ?></h3>
            <?php if (isset($profile['price'])): ?><p><?php echo $profile['price']; ?></p><?php endif; ?>
            <?php if (isset($profile['experience'])): ?><p>Experience: <?php echo $profile['experience']; ?></p><?php endif; ?>
            <?php if (isset($profile['location'])): ?><p>Location: <?php echo $profile['location']; ?></p><?php endif; ?>
            <?php if (isset($profile['preferences'])): ?><p>Preferences: <?php echo $profile['preferences']; ?></p><?php endif; ?>
            <img src="<?php echo $profile['image']; ?>">
        </div>
    <?php endforeach; ?>
    <div class="testimonials">
        <h2>What Our Clients Say</h2>
        <ul>
            <li>I was nervous about leaving my dog, but the sitter sent me daily pictures and updates. - Emma J.</li>
            <li>My cat bonded with the sitter immediately. I’ll definitely use this service again! - Mark T.</li>
        </ul>
    </div>
    <br><br>
    <div class="form">
        <h2>Subscribe to news</h2>
        <form action="send_email.php" method="post">
            <label for="email">Your Email:</label>
            <br><br>
            <input type="email" id="email" name="email" required>
            <br><br>
            <button type="submit">Subscribe!</button>
            <br><br>
        </form>
    </div>
    <br><br>
    <footer>
        <div class="links">
            <a href="https://www.facebook.com" target="_blank">
                <img class="logos" src="css/logos/Facebook_Logo_Primary.png" alt="Facebook">
            </a>
            <a href="https://www.instagram.com" target="_blank">
                <img class="logos" src="css/logos/Instagram_Glyph_Gradient.png" alt="Instagram">
            </a>
            <a href="https://www.youtube.com" target="_blank">
                <img class="logos" src="css/logos/yt_logo_rgb_light.png" alt="YouTube">
            </a>
        </div>
    </footer>
    <script src="./js/profileSlider.js"></script>
</body>
</html> 


