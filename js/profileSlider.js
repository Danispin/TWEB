let currentProfileIndex = 0;
let profilesData = [];

document.addEventListener("DOMContentLoaded", () => {
    loadProfiles(); // Load profiles when the page loads

    // Refresh profiles when the button is clicked
    document.getElementById("refreshBtn").addEventListener("click", () => {
        loadProfiles();
    });

    // Arrow navigation
    document.getElementById("prevBtn").addEventListener("click", () => {
        if (currentProfileIndex > 0) {
            currentProfileIndex -= 4; // Move 4 profiles back
            displayProfiles();
        }
    });

    document.getElementById("nextBtn").addEventListener("click", () => {
        if (currentProfileIndex + 4 < profilesData.length) {
            currentProfileIndex += 4; // Move 4 profiles forward
            displayProfiles();
        }
    });
});

// Load profiles from the API
function loadProfiles() {
    fetch("https://randomuser.me/api/?results=20&nat=md")
        .then(res => res.json())
        .then(data => {
            profilesData = data.results; // Store profiles data
            currentProfileIndex = 0; // Reset index
            displayProfiles(); // Display the first set of profiles
        })
        .catch(err => {
            console.error("Failed to fetch users:", err);
        });
}

// Display profiles starting from currentProfileIndex
function displayProfiles() {
    const container = document.getElementById("ajaxProfiles");
    container.innerHTML = ""; // Clear current profiles

    const end = Math.min(currentProfileIndex + 4, profilesData.length); // Get up to 4 profiles

    for (let i = currentProfileIndex; i < end; i++) {
        const user = profilesData[i];
        const price = `${Math.floor(Math.random() * 30) + 10} MDL/hour`;
        const experience = `${Math.floor(Math.random() * 11)} years`;
        const prefs = ["Cooking", "Companionship", "Exercise", "Crafts", "Reading"];
        const preference = prefs[Math.floor(Math.random() * prefs.length)];
        const idSuffix = i; // Use profile index for ID

        const profileBox = document.createElement("div");
        profileBox.className = "profile-box";
        profileBox.id = `profile-box${idSuffix}`;
        profileBox.style.display = "none";
        profileBox.style.position = "absolute";
        profileBox.innerHTML = `
            <h3>${user.name.first} ${user.name.last}</h3>
            <p>${price}</p>
            <p>Experience: ${experience}</p>
            <p>Location: ${user.location.city}, ${user.location.country}</p>
            <p>Preferences: ${preference}</p>
        `;

        const img = document.createElement("img");
        img.src = user.picture.large;
        img.alt = `${user.name.first} ${user.name.last}`;
        img.id = `profile-img${idSuffix}`;

        img.addEventListener("mouseover", (event) => {
            showProfile(event, `profile${idSuffix}`);
        });

        img.addEventListener("mouseleave", () => {
            hideProfile(`profile${idSuffix}`);
        });

        container.appendChild(img);
        container.appendChild(profileBox);
    }
}

// Show profile when hovering over the image
function showProfile(event, profileId) {
    if (currentProfile && currentProfile !== profileId) {
        hideProfile(currentProfile);
    }

    let profileBox = document.getElementById(`profile-box${profileId.slice(-1)}`);
    if (!profileBox) return;

    profileBox.style.display = "block";
    profileBox.style.left = event.pageX + "px";
    profileBox.style.top = event.pageY + "px";

    currentProfile = profileId;

    let imgElement = document.getElementById(`profile-img${profileId.slice(-1)}`);
    if (imgElement) {
        imgElement.style.transform = "scale(1.1)";
    }

    profileBox.onmouseleave = () => hideProfile(profileId);
}

// Hide profile when mouse leaves
function hideProfile(profileId) {
    const suffix = profileId.slice(-1);
    const profileBox = document.getElementById(`profile-box${suffix}`);
    const img = document.getElementById(`profile-img${suffix}`);

    if (profileBox) {
        profileBox.style.display = "none";
    }

    if (img) {
        img.style.transform = "scale(1)";
    }

    if (currentProfile === profileId) {
        currentProfile = null;
    }
}
